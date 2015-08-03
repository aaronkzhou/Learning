#!/usr/bin/perl
use lib "/scripts";
use lib "/scripts/modules";

use IniFiles;
#use XML::Simple;
#use XML::XPath;
use File::Copy;
use File::Path;
use insight;
use network;
use rhombus;
#use xml;
use bom;
use process;
use custintent;
use fwdepot;
use triton;
use strict;
use datecheck;
use fwdepot;

system("mono /RemusDataClient.exe ramdrivesize val:2147483648");
my $var="";

############################### MAIN ################################

eval
{
	#datecheck::comparetime();
	sleep(2);
	logThis("Starting");

	#
	#  Pull attributes and PO files from ReMUS database
	#
	my $configCode = rhombus::getAttribute("ConfigCode");
	my $productName = rhombus::getAttribute("productname");
	my $serialNumber = rhombus::getAttribute("SerialNumber");
	chomp($serialNumber);
	my $orderNumber = rhombus::getAttribute("OrderNumber");
	chomp($orderNumber);
	my $productID = rhombus::getAttribute("ProductID");
	my $assetTag = rhombus::getAttribute("AssetTag");
	my $customPID = rhombus::getAttribute("Customer ProductID");
	my $workobjectNumber = rhombus::getAttribute("Workobject");
	chomp($workobjectNumber);
	
	my $precfgSet = rhombus::getAttribute("ClearingPreConfig");
	my $precfgAttrib = rhombus::getAttribute("PreConfig");
	my $assetTag = rhombus::getAttribute("AssetTag");
	
	if(($precfgAttrib eq "Yes") && ($precfgSet ne "Complete"))
	{
		system "./scripts/preconfig.pl";
		rhombus::setAttribute("ClearingPreconfig", "Complete");
		rhombus::rebootUUT();		
	}

	fwdepot::getDepot("UtilsDepot");
	rhombus::getTextstor("/ctohw.txt");
	rhombus::getTextstor("/cto.txt");

	logThis("Setup CompareRules");
	insight::combineRules();

	logThis("Setup Diaginfo");
	insight::setupDiaginfo();
	rhombus::getTextstor("/diaginfo.ini");
	system("cp /diaginfo.ini /diaginfo/diaginfo.ini");

	# Write serial number and order number to sn.txt
	logThis("Writing UUT information to sn.txt");
	open(F, ">/sn.txt");
	print F $serialNumber . "\n";
	print F $orderNumber . "\n";
	print F $workobjectNumber . "\n";
	close(F);

	logThis("Getting IP address ...");
	logThis("Getting IP address ...");
	network::getLanIP();

	# Setup HP Insight Diagnostics
	logThis("Setup HP Insight Diagnostics");
	insight::installDiags();

	# Prep for Test
	logThis("Prep for test");
	bom::ctohwCleanup();
	system ("cp /ctohw.txt /diaginfo/");

	# Added product name to ctohw.txt
	logThis("Adding product name: $productName to ctohw.txt");
	bom::ctoAddpart($productName,"1");

	#create pn_xlate.xml
	bom::mergePartLib($configCode,$productID);

	# Generate expected and addtest XML
	logThis("Generate expected.xml & addtest.xml");
	system ("/scripts/generateExpected.pl");

	#check and update addtest.xml for GLiS accordingly to ReMus attribute to resolve QXCR1001363380
	my $glisILOKey = rhombus::getAttribute("glisilokey");
	my $addtestFile = "/opt/hp/hpdiags/addtest.xml";
	my $addtestXML = XML::XPath->new(filename => $addtestFile);
	
	if (xml::sectionExists('//addtest/device[@class="iLO GLiS"]',$addtestFile))
	{
		if($glisILOKey ne "yes")
		{	print("update addtest.xml iLO GLiS\n");
			xml::deleteSection('//addtest/device[@class="iLO GLiS"]',$addtestFile);
		}
	}
	# Get Rom Info
	# Get systeminfo if needed
	fwdepot::getSystemInfo();


	# Delete cfgveroutput.xml if exists
	if (-e "/opt/hp/hpdiags/cfgveroutput.xml"){unlink "/opt/hp/hpdiags/cfgveroutput.xml";}

	# Call product specific script
	if (-e "/scripts/product.pl")
	{
		logThis("Calling product.pl");
		system "./scripts/product.pl";
	}

	#add firmware for flashable devices
	logThis("Adding expectedFW to Expected.xml");
	process::addexpectedFW();

	# Check for Customer Lockdowns
	custintent::getSlotInfo($configCode, $productID);

	# Update expected.ini with chassis serial number
	logThis("Updating expected.ini with serial number: $serialNumber");
	insight::chassisSerialNumber($serialNumber);

	# Update expected.ini with chassis asset tag
	insight::chassisAssetTag($assetTag);
	logThis("Adding SKU number to expected");
	if(!$customPID)
	{
		insight::skuVerify($productID);
	}
	else
	{
		insight::skuVerify($customPID);
	}

	# Get testscript from processmap
	logThis("Get Test Script");
	my $testScript = "";
	$testScript = rhombus::getAttribute("testscript");
	if ($testScript ne "")
	{
		logThis("Using test script: $testScript");
		if (($testScript =~ "redundantps.src.xml") ||($testScript =~ "io.src.xml") )
		{
			logThis("Calling addpowersupply.pl");
			system "./scripts/addpowersupply.pl";
		}

		system("cp $testScript /opt/hp/hpdiags/test.src.xml");
		logThis("Writing test.src.xml to /opt/hp/hpdiags/factorytests.txt");
		open(F, ">/opt/hp/hpdiags/fileList.xml");
		print F "test.src.xml\n";
		close(F);
	}
	logThis("capture DIMM Failures");
	insight::captureDIMMFailure();

	logThis("Store NIC Info");
	network::storeMacInfo();

	# copy ignore files
	system ("cp /ignore/ignoreiml.xml /opt/hp/hpdiags/ignoreiml.xml");
	system ("cp /ignore/ignore.xml /opt/hp/hpdiags/ignore.xml");
	system ("cp /ignore/ignorepost.xml /opt/hp/hpdiags/ignorepost.xml");

	logThis("Run Diags");
	rhombus::testUUT("Launching HP Insight Diagnostics");
	chdir '/opt/hp/hpdiags/';
	insight::runDiags();

	logThis("Retreive stored NIC Info");
	network::getMacInfo();

	logThis("Restarting Network");
	my $result = system("/scripts/restartNetwork.sh");
	if ( $result ne "0" )
	{
		sleep 1;
		logThis("Restarting Network (2nd attempt)");
		my $result = system("/scripts/restartNetwork.sh");
		if ( $result ne "0" )
		{
			logThis("Unable to restart Network.  This UUT cannot continue.");
			die("Unable to restart Network.");
		}
	}

	logThis("Check HP Insight for errors");
	system("mono /addons/InsightErrorCheck.exe");
	my $insightErrorCheck = $? >> 8;
	logThis("HP Insight Error: $insightErrorCheck");
	if ($insightErrorCheck == 1)
	{
		system ("/scripts/support.pl");
		rhombus::setTextstor("/tracking.log");
		rhombus::failUUT("","mqd");
	}
	elsif ($insightErrorCheck == 0)
	{
		rhombus::setAttribute("ClearingPreconfig", "Done");
		# send a Remus Update on our progress
		my $productName = rhombus::getAttribute("productname");
		if (($productName eq 'BL460cGen8') || ($productName eq 'WS460cGen8'))
		{	
			logThis('Reseting the ILO, may take up to 3 minutes');
			sleep 30;
			#system("hponcfg -r");
			system("hponcfg -f /scripts/Reset_RIB.xml");
			my $return = $? >> 8;
			if ($return > 0)
			{
				rhombus::failUUT("hponcfg iLO reset failed, errorcode = $return", 960126);
			}
			else
			{
				logThis('ILO Reset Finished.');
			}
			sleep 180;  #Wait of 3 minutes as per PE Request
			#End of code to Reset the ILO of the Server
		}
		logThis("CLEARING Complete");
		logThis("Clear Event Log");
		insight::clearEventLog();
		rhombus::passUUT("CLEARING COMPLETE");
	}
	else
	{
		die"InsightErrorCheck.exe application error: $insightErrorCheck";
	}
	exit;
};
if ($@)
{
	rhombus::failUUT($@, "960054");
};

sub logThis
{
	my $mesg = shift;
	my $log = "/tracking.log";
	my $scriptName = "clearing.pl";
	print "$scriptName: $mesg\n";
	open (F,">>$log");
	print F $scriptName . ": " . $mesg . "\n";
	close (F);
}

1;
