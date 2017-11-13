<?php 
/* 
这是一个测试程序!!! 
*/ 
error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); 
date_default_timezone_set('Asia/Shanghai');
$month=date("m");
$day=date("d");
echo $month;
echo $day;
$html=file_get_contents'http://shopfloor.sgp.hp.com/sfweb/DefaultQueryReport?maxDefaultQueryRows=20000&fromDueDate=&toDueDate=&operations_m=none&fromBirthStamp=2014-'.$month.'-01+00%3A00&toBirthStamp=2014-12-31+10%3A00&fromShippedDate=&toShippedDate=&fromWoid=&toWoid=&fromSerialNo=&toSerialNo=&coaStatus=All&salesOrderPattern=&bpoPattern=&revisionNo=&plannedOrderPattern=&legacyOrderPattern=&masterProductPattern=&skuPattern=&materialNoPattern=&shipPoint=BF40&shipRef=&queryType=omOpen&sortBy=Backplane+Delivery&consolidated=wo&logic=and'
preg1="";
preg2="";
preg3="";
prea_match($preg1,$html,$result1);
prea_match($preg2,$html,$result2);
prea_match($preg3,$html,$result3);
$countPLO=count($result1);
$countPF=count($result2);
$countstatus=count($result3);
echo $result1;
echo $result2;
echo $result3;
$db=mysql_connect("localhost","root","");
mysql_select_db('picklist');
for($i=0;$i<$countPLO-1;$i++)
{
$PLO=$result1[$i];
$Family=$result2[$i];
$Status=$result3[$i];
$sql="insert into sfng（PLO,FAMILY,STATUS) 
VALUES ('$PLO','$FAMILY','$STATUS')";
mysql_query($sql,$db);
}
echo "success!!"
?>