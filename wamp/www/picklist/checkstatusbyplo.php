<?php
error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); 
set_time_limit(0);// 通过set_time_limit(0)可以让程序无限制的执行下去
header('fontbase family="SimHei"');
header('Content-Type:text/html;charset=GB2312');
$PLO=$_POST['checkstatusbyplo'];
//connect to mysql_affected_rows
$db=mysql_connect('localhost','root','') or die('unable to connect.check your connection prameters.');
mysql_select_db('picklist',$db) or die(mysql_error($db));
$query1="
select
picklistdata.batchnum,
picklistdata.PLO,
picklistdata.Qty,
picklistdata.material_end_time,
picklistdata.production_start_time,
picklistdata.preparationend,
linetype.UpdateTime,
linetype.family,
picklistdata.Remark
from
picklistdata left outer join linetype ON picklistdata.PLO=linetype.PLO
where picklistdata.PLO='$PLO'
";
mysql_query("SET NAMES utf8");
$result1=mysql_query($query1,$db);
$countrows=mysql_num_rows($result1);
while($row=mysql_fetch_assoc($result1))
{
$UpdateTime=trim($UpdateTime);
extract($row);
if(stristr($Remark,"short")==false)
{
$shortstatus=1;
}
else
{
$shortstatus=0;
}
if($material_end_time=='' and $production_start_time=='' and $preparationend=='' and $shortstatus==0)
{
$status='仓库备料中(缺料)';
$Remark1=stristr($Remark,"short");
}
if($material_end_time=='' and $production_start_time=='' and $preparationend=='' and $shortstatus==1)
{
$status='仓库备料中(不缺料)';
}
if($material_end_time!=='' and $production_start_time=='' and $preparationend=='')
{
$status='产线备料中';
}
if($material_end_time!=='' and $production_start_time!=='' and $preparationend=='')
{
$status='产线备料中';
}
if($material_end_time!=='' and $production_start_time!=='' and $preparationend!=='')
{
$html = file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/QuickSearch?object='.$PLO.'&search=Overview');
$preg="/revisionNo\=1\"\>(.*)\<\/a\>/U";
preg_match($preg,$html,$result1);
$html1=file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/DisplayOrder?bpo='.$result1[1].'&revisionNo=1');
$preg1="/WorkObject\?object=([B-C]\w\w\w\w\w\w)\"/U";
preg_match_all($preg1,$html1,$result2);
$count=count($result2[1]);
for($k=0;$k<$count;$k++)
{
$html = file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/DisplayWorkObject?object='.$result2[1][$k]);
$preg="/Station Id.*\n.*\n.*\n.*size\=\"-2\"\>(.*)\<\/font\>/U";
preg_match_all($preg,$html,$result);
$count1=count($result[1]);
for($j=0;$j<$count1;$j++)
{
if($result[1][$j]=='BF20_TSG_CUSQUEUE')
{
$result[1][$j]=0;
}
if($result[1][$j]=='ZJ_TSG_QUEUE')
{
$result[1][$j]=1;
}
if($result[1][$j]=='ZJ_TSG_QUEUE2')
{
$result[1][$j]=2;
}
if($result[1][$j]=='BF20_TSG_BUILD1')
{
$result[1][$j]=3;
}if($result[1][$j]=='BF20_TSG_BUILD2')
{
$result[1][$j]=4;
}
if($result[1][$j]=='BF20_TSG_BUILD3')
{
$result[1][$j]=5;
}
if($result[1][$j]=='BF20_TSG_BUILD4')
{
$result[1][$j]=6;
}
if($result[1][$j]=='PRETEST')
{
$result[1][$j]=7;
}
if($result[1][$j]=='RUNIN')
{
$result[1][$j]=8;
}
if($result[1][$j]=='S_SERVICE')
{
$result[1][$j]=8.5;
}
if($result[1][$j]=='BF20_TSG_CUSINTENT')
{
$result[1][$j]=9;
}
if($result[1][$j]=='BF20_TSG_CUSINTCHK')
{
$result[1][$j]=10;
}
if($result[1][$j]=='BF20_TSG_BUILD6')
{
$result[1][$j]=11;
}
if($result[1][$j]=='BF20_TSG_HIPOT')
{
$result[1][$j]=12;
}
if($result[1][$j]=='BF20_TSG_DOC1')
{
$result[1][$j]=13;
}
if($result[1][$j]=='BF20_TSG_PACK')
{
$result[1][$j]=14;
}
if($result[1][$j]=='BF20_TSG_DOC2')
{
$result[1][$j]=15;
}
if($result[1][$j]=='Cmplx_Integration')
{
$result[1][$j]=16;
}
if($result[1][$j]=='BF20_TSG_END')
{
$result[1][$j]=17;
}
}
}
$x=min($result[1]);
if ($x<=7)
{
$status='产线已完成备料，但还未全部通过老化';
}
if($x>7)
{
$status='产线已完成备料，并已全部通过老化';
}
}
}
if($countrows==0)
{
$status='仓库未收到备料需求';
}

//determine number of rows in returned result

mysql_query("SET NAMES utf8");
$result1=mysql_query($query1,$db)or die(mysql_error($db));
?>

<div style="text-align:center;color:#CE0000;">
 <h1>订单状态：<?php echo $status;     echo $Remark1; ?></h1>
<table border="1" cellpadding="0" cellspacing="0"
style="width: 90%;margin-right:auto;margin-left:auto">
  <tr>
  <th>备料批次号</th>
  <th>PLO<?php echo '(';echo $countrows;echo '套)'?></th>
  <th>Qty<?php echo '(';echo $countqty;echo '台)'?></th>
  <th>机型</th>
  <th>仓库结束备料时间</th>
  <th>产线开始备料时间</th>
  <th>产线备料结束时间</th>
  <th>WIP时间</th>
  </tr>
</div> 
<?php 
 //loop through the results
 while($row=mysql_fetch_assoc($result1))
{
extract($row);
echo'<tr>';
echo'<td>'.$batchnum.'</td>';
echo'<td>'.$PLO.'</td>';
echo'<td>'.$Qty.'</td>';
echo'<td>'.$family.'</td>';
echo'<td>'.$material_end_time.'</td>';
echo'<td>'.$production_start_time.'</td>';
echo'<td>'.$preparationend.'</td>';
echo'<td>'.$UpdateTime.'</td>';
echo'</tr>';
}
//echo'<td>'.'<form action="submit.php" method="post" style="margin:0px" ><input type="text" name="Remark1" /><input type="hidden" name="Remark2" value="'.$batchnum.'"/>'.'</td>';
//echo'<td>'.'<input type="submit" name="submit" value="更新"/>
//</form>'.'</td>';
?>
</table>