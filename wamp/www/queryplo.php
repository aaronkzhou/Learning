<?php
error_reporting(E_ALL^E_NOTICE^E_DEPRECATED^E_WARNING);
set_time_limit(0);// 通过set_time_limit(0)可以让程序无限制的执行下去
header("Content-Type:text/html;charset=utf-8");
date_default_timezone_set('Asia/Shanghai');
$time=date('Y/m/d H:i');
$tag=$_POST['plolist'];
$row=explode("\n",$tag);
$db=mysql_connect('localhost','root','') or die('unable to connect.Pls check your connection prameters.');
mysql_select_db('calculate',$db) or die(mysql_error($db));
$count=count($row);
$query1='truncate table calculateforqueryplo';
mysql_query($query1,$db);

for($j=0;$j<$count;$j++)
{
$PLO=$row[$j];
$PLO=trim($PLO);
//echo $PLO;
$html = file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/DefaultQueryReport?maxDefaultQueryRows=20000&fromDueDate=&toDueDate=&operations_m=none&fromBirthStamp=&toBirthStamp=&fromShippedDate=&toShippedDate=&fromWoid=&toWoid=&fromSerialNo=&toSerialNo=&coaStatus=All&salesOrderPattern=&bpoPattern=&revisionNo=&plannedOrderPattern='.$PLO.'&legacyOrderPattern=&masterProductPattern=&skuPattern=&materialNoPattern=&shipRef=&queryType=default&sortBy=Master+Product&consolidated=wo&logic=and');
$preg="/WorkObject\?object=([B-C|0]\w\w\w\w\w\w)\"/U";
preg_match_all($preg,$html,$result1);
//var_dump($result1);
$html1=file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/QuickSearch?object='.$result1[1][0].'&search=Overview');

if(strstr($html1,'BF20_TSG_CUSQUEUE'))
{
$IFFE2='Y';
}
else
{
$IFFE2='N';
}
$html = file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/DefaultQueryReport?maxDefaultQueryRows=20000&fromDueDate=&toDueDate=&operations_m=none&fromBirthStamp=&toBirthStamp=&fromShippedDate=&toShippedDate=&fromWoid=&toWoid=&fromSerialNo=&toSerialNo=&coaStatus=All&salesOrderPattern=&bpoPattern=&revisionNo=&plannedOrderPattern='.$PLO.'&legacyOrderPattern=&masterProductPattern=&skuPattern=&materialNoPattern=&shipRef=&queryType=default&sortBy=Master+Product&consolidated=wo&logic=and');
$preg="/DisplayOrder\?bpo=.*&revisionNo=1/U";
$preg1="/G\d\d\d\d\d\d\d\d-000000/U";
preg_match($preg,$html,$result1);
preg_match($preg1,$html,$result3);

$BPO=$result3[0];

$html=file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/'.$result1[0]);
$preg="/align=left.*\n.*td.*object=(.*)\"\>.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*P_SHIPPED.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*\n.*mergingGroup=(.*)\"\>.*\n.*\n.*boxId=(.*)\"\>/U";
preg_match_all($preg,$html,$result2);
$countboxid=count($result2);
$newbpo=array_keys($result2[2],$BPO);
$countnew=count($newbpo);
$newwo=array();
$newboxid=array();
for($k=0;$k<$countnew;$k++)
{
$m=$newbpo[$k];
array_push($newwo,$result2[1][$m]);
array_push($newboxid,$result2[3][$m]);
}
$maxid=array_search(max($newboxid),$newboxid);
$WO=$newwo[$maxid];
//echo $WO=$result2[1][$maxid];
$query=
"
insert into calculateforqueryplo(PLO,IFFE2,LASTBOXID,PENDING) values('$PLO','$IFFE2','$WO','1')
";
mysql_query($query,$db);
}
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<div style="text-align:center;color:#CE0000;">
 <h1 style="font-family:simhei">query by plo</h1>
</div>
<table width="40%" border="1" cellspacing="0" cellpadding="0"
style="width:60%;margin-left:280px;font-family: sans-serif">
<tr>
<th>PLO</th>
<th>if FE2</th>
<th>last WO</th>
<?php

$db=mysql_connect('localhost','root','') or die('unable to connect.check your connection prameters.');
mysql_select_db('calculate',$db) or die(mysql_error($db));
$query2='select * from calculateforqueryplo where PLO<>""';
$result=mysql_query($query2,$db);
while($row1=mysql_fetch_assoc($result))
{
extract($row1);
echo "<tr>";
echo "<th>$PLO</th>";
echo "<th>$IFFE2</th>";
echo "<th>$LASTBOXID</th>";
echo "</tr>";
}
?>
</table>
