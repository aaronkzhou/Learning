<?php
error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); //error report control
ignore_user_abort();//�ص��������PHP�ű�Ҳ���Լ���ִ��.
set_time_limit(0);// ͨ��set_time_limit(0)�����ó��������Ƶ�ִ����ȥ
$db=mysql_connect("localhost","root","aaron");
mysql_select_db('picklist');
$sql1="truncate table fe2";
mysql_query($sql1,$db);
mysql_select_db('picklist');
$sql='select PLO from test
order by PLO DESC';
$result=mysql_query($sql,$db);
$row=mysql_num_rows($result);
for ($i =0; $i<$row-1; $i++) 
{
$PLO=MYSQL_RESULT($result,$i,0);
$html = file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/QuickSearch?object='.$PLO.'&search=Overview');//�����һ����ҳ
if(strstr($html,'ACTIVE'))
{
	$preg="/G\d\d\d\d\d\d\d\d-000000/";
	preg_match($preg,$html,$result1);
    $html1=file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/DisplayOrder?bpo='.$result1[0].'&revisionNo=1');
	$preg1="/object=(B\w\w\w\w\w\w)\"/U";
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