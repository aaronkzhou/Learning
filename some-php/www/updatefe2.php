<?php
error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); //error report control
ignore_user_abort();//关掉浏览器，PHP脚本也可以继续执行.
set_time_limit(0);// 通过set_time_limit(0)可以让程序无限制的执行下去
$db=mysql_connect("localhost","root","");
mysql_select_db('picklist');
$sql1="truncate table fe2";
mysql_query($sql1,$db);
mysql_select_db('picklist');
$sql='select PLO from picklistdata
order by PLO ASC';
$result=mysql_query($sql,$db);
$row=mysql_num_rows($result);
echo $row;
for ($i =9000; $i<$row-1; $i++) 
{
$PLO=MYSQL_RESULT($result,$i,0);
$html = file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/QuickSearch?object='.$PLO.'&search=Overview');//进入第一个网页
if(strstr($html,'ACTIVE'))
{
	$preg="/revisionNo\=1\"\>(.*)\<\/a\>/U";
	preg_match($preg,$html,$result1);
    $html1=file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/DisplayOrder?bpo='.$result1[1].'&revisionNo=1');
	$preg1="/object=(C\w\w\w\w\w\w)\"/U";
	preg_match($preg1,$html1,$result2);
	$html2=file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/DisplayWorkObject?object='.$result2[1]);
	if(strstr($html2,'BF20_TSG_CUSQUEUE'))
{
	$sql="insert into fe2(FE2PLO)
	VALUES('$PLO')";
	mysql_query($sql,$db);
	unset($html2);
}
unset($html);
unset($html1);
}
unset($result1);
unset($result2);
}
?>