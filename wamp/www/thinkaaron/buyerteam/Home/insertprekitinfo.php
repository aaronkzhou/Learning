<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING); 
session_start();
if(!isset($_SESSION["test"]))
{
header("Location: http://16.187.224.112:8080/THINKAARON/homepage/Pages/login.php");
}
else
{
}
?>

<!DOCTYPE html>

<html>
	
	<head>
	<link rel="stylesheet" href="../../HOMEPAGE/css/bird.css" type="text/css" />
	<META name="GENERATOR" content="MSHTML 11.00.9600.17496">
	<META content="IE=11.0000" http-equiv="X-UA-Compatible">
	</head>
	<body>
	<div id="container">
		<DIV class="top_div"></DIV>
		<DIV style="background: rgb(255, 255, 255); margin: -525px auto auto; border: 1px solid rgb(231, 231, 231); border-image: none; width: 400px; height: 460px; text-align: center;">
		<form action="http://16.187.224.112:8080/thinkaaron/indexbuyer.php/home/prekit/prekit" method="post">
			<P style="padding: 30px 0px 10px; position: relative;">        
				<INPUT class="ipt" id="plo" name="PLO" type="text/css" placeholder="PLO#" value=""> 
			</P>
			<P style="padding: 0px 0px 10px;position: relative;">      
			<INPUT class="ipt" id="so" name="SO" type="text/css" placeholder="SO#" value="">   
			</P>
			<P style="padding: 0px 0px 10px;position: relative;">         
			<INPUT class="ipt" id="hddkmatpart" name="HDD_KMAT_PART" type="text/css" placeholder="HDD KMAT PART#" value="">   
			</P>
			<P style="padding: 0px 0px 10px;position: relative;">			
			<INPUT class="ipt" id="item" name="ITEM_NO" type="text/css" placeholder="ITEM#" value="">   
			</P>
			<P style="padding: 0px 0px 10px;position: relative;">        
			<INPUT class="ipt" id="qty" name="KITTED_DRIVE_QTY" type="text/css" placeholder="Kitted drive QTY" value="">   
			</P>
			<P style="padding: 0px 0px 10px;position: relative;">     
			<INPUT class="ipt" id="rawdrive" name="RAW_DRIVE" type="text/css" placeholder="Raw drive#" value="">   
			</P>
			<P style="padding: 0px 0px 10px;position: relative;">       
			<INPUT class="ipt" id="buyer" name="BUYER" type="text/css" placeholder="Buyer" value="">   
			</P>
			<P style="position: relative;">      
			<INPUT class="ipt" id="prekitdate" name="PRE_KITDATE" type="text/css" placeholder="Pre-kit date" value="">   
			</P>
			<DIV style="height: 50px; line-height: 50px; margin-top: 10px; border-top-color: rgb(231, 231, 231); border-top-width: 1px; border-top-style: solid;">
				<P style="margin: 0px 35px 20px 45px;">
					<SPAN style="float: left;">
						<A style="color: #B22222;" href="http://16.187.224.112:8080/thinkaaron/buyerteam/home/insertprekitinfo2.php" target="main">
						我是操作工  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</A>
					</SPAN>
					
					<SPAN style="float: left;">
						<A style="color: #00CD00;" href="http://16.187.224.112:8080/thinkaaron/buyerteam/home/insertprekitinfo1.php" target="main">
						I'm Engineer
						</A>
					</SPAN>
					<SPAN style="float: right;">
						<input style="background: rgb(0, 142, 173); padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;" type="submit" name="insert" value="Add to Database"/>
					</SPAN>         
				</P>
			</DIV>
		</form>
		</DIV>
	</div>	
	</body>
</html>
