<?php
include "../Classes/simple_html_dom.php";
error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); //error report control
$db=mysql_connect("localhost","root","aaron");
mysql_select_db('picklist');
$sql='select * from test';
$result=mysql_query($sql,$db);
$row=fetch_array_row($result);
mysql_select_db('')
$t=1;
for ($i = 1; i<$row; $i++) 
{
$PLO=MYSQL_RESULT($result,0,$i);
/*if(trim($wo)=="")  // if we can not get the num  and do sth
{
                echo '<script>alert(\'please input unit WO!\');</script>';
                echo '<script>window.location.href=\'homePage.php?\';</script>';
                exit();
}*/
$html = file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/QuickSearch?object='.$PLO.'&search=Overview');//进入第一个网页
if(strstr($html,'Active'))
{
	$preg='/bpo=(.+)&revisionNo=1/Ums';
	preg_match($preg,$html,$result1);
    $html1=file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/DisplayOrder?bpo='.$result1.'&revisionNo=1');
	$preg1='/DisplayWorkObject?object=(.+)">/Ums';
	preg_match($preg1,$html1,$result2);
	$html2=file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/DisplayWorkObject?object='.$result2);
	if(strstr($html2,'BF20_TSG_CUSQUEUE'))
{
	$sql='insert $PLO into PLO';
	mysql_query($sql,$db);
}
}
else
{
}

{
                //$html->clear();
                echo '<script>window.location.href=\'obaCheck.php?isoba=0\';</script>';
}
?>
