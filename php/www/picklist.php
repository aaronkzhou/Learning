<?php
error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); 
header('Content-Type:text/html;charset=UTF-8');
header('fontbase family="SimHei"');

//connect to mysql_affected_rows
$db=mysql_connect('localhost','root','aaron') or die('unable to connect.check your connection prameters.');
mysql_select_db('picklist',$db) or die(mysql_error($db));
$query5='
select count(PLO),sum(Qty)
from sfng
where PLO not in (select PLO from picklistdata)
order by PLO
';
$result5=mysql_query($query5,$db);
$PLO5=mysql_result($result5,0,0);
$Qty5=mysql_result($result5,0,1);
$query1='
select count(picklistdata.PLO),sum(picklistdata.Qty)
from picklistdata left outer join linetype ON picklistdata.PLO=linetype.PLO
where material_end_time="" and production_start_time="" and preparationend="" and picklistdata.remark not like"%cancel%" and picklistdata.status not like"%close%" and picklistdata.status not like"%cancel%"
';
$result1=mysql_query($query1,$db);
$PLO1=mysql_result($result1,0,0);
$Qty1=mysql_result($result1,0,1);
$query2='
select count(PLO),sum(Qty)
from picklistdata
where(material_end_time<>"" and production_start_time="" and preparationend=""and picklistdata.remark not like"%cancel%")and status not like"%close%"and picklistdata.status not like"%cancel%"
';
$result2=mysql_query($query2,$db);
$PLO2=mysql_result($result2,0,0);
$Qty2=mysql_result($result2,0,1);
$query3='
select count(picklistdata.PLO),sum(Qty)
from
picklistdata left outer join linetype ON picklistdata.PLO=linetype.PLO
where(material_end_time<>"" and production_start_time<>"" and preparationend=""and UpdateTime="" and picklistdata.remark not like"%cancel%")and status not like"%close%"and picklistdata.status not like"%cancel%"
';
$result3=mysql_query($query3,$db);
$PLO3=mysql_result($result3,0,0);
$Qty3=mysql_result($result3,0,1);
$query4='
select count(picklistdata.PLO),sum(Qty)
from 
picklistdata left outer join linetype ON picklistdata.PLO=linetype.PLO
where(material_end_time<>"" and production_start_time<>"" and preparationend<>"" and UpdateTime=""and picklistdata.remark not like"%cancel%")and status not like"%close%"and picklistdata.status not like"%cancel%"
';
$result4=mysql_query($query4,$db);
$PLO4=mysql_result($result4,0,0);
$Qty4=mysql_result($result4,0,1);


//retrieve information
$query=
'select
picklistdata.batchnum,picklistdata.PLO,picklistdata.Qty,picklistdata.material_end_time,picklistdata.production_start_time,picklistdata.preparationend,linetype.UpdateTime,linetype.family,picklistdata.status
from
picklistdata left outer join linetype ON picklistdata.PLO=linetype.PLO
where
( UpdateTime="") and preparationend="" and picklistdata.remark not like"%cancel%" and picklistdata.production_start_time<>"" and status not like"%close%" and picklistdata.status not like"%cancel%"
';
mysql_query("SET NAMES utf8");
$result=mysql_query($query,$db)or die(mysql_error($db));

//determine number of rows in returned result
$countrows=mysql_num_rows($result);
$countqty=0;
for($i=0;$i<$countrows;$i++)
{
$countqty=$countqty+mysql_result($result,$i,2);
}
$result=mysql_query($query,$db)or die(mysql_error($db));
?>
<table >
<form action="querybypreparationend.php" method="post" ><input type="text" name="date11" /><?php echo "月";?><input type="text" name="date12" /><?php echo "日";?><input type="text" name="date13" /><?php echo "时";?>&nbsp<?php echo "至";?>&nbsp <input type="text" name="date21" /><?php echo "月";?><input type="text" name="date22" /><?php echo "日";?><input type="text" name="date23" /><?php echo "时";?> &nbsp &nbsp <input type="submit" name="submit" value="按产线备料结束时间查询"/></td>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
</table >
<table border="7" cellpadding="1" cellspacing="1"
style="width:90%;margin-left:0px;font-family: sans-serif">
<tr>
<th> &nbsp&nbsp&nbsp </th>
<th><a href="5.php">待处理订单</a href> </th>
<th><a href="1.php">仓库备料中</a href> </th>
<th><a href="2.php">产线待接收</a href></th>
<th><a href="3.php">产线备料中</a href></th>
<th><a href="4.php">等待上线组装</a href></th>
<td><form action="submit.php" method="post" style="margin:0px" ><input type="text" name="Remark1" /><input type="submit" name="submit" value="按批次号更新备料时间"/><form action="submit1.php" method="post" style="margin:0px" ><input type="text" name="Remark2" /><input type="submit" name="submit" value="按PLO更新备料时间"/></td>
</tr>
<tr>
<th>PLO</th>
<th><?php echo $PLO5;?></th>
<th><?php echo $PLO1;?></th>
<th><?php echo $PLO2;?></th>
<th><?php echo $PLO3;?></th>
<th><?php echo $PLO4;?></th>
</tr>
<tr>
<th>Qty</th>
<th><?php echo $Qty5;?></th>
<th><?php echo $Qty1;?></th>
<th><?php echo $Qty2;?></th>
<th><?php echo $Qty3;?></th>
<th><?php echo $Qty4;?></th>
</style>
</table>
<div style="text-align:center;color:#CE0000;">
 <h1 style="font-family:simhei"> 待备料清单</h1>
 <table border="7" cellpadding="2" cellspacing="2"
  style="width: 100%;height:auto;margin-right:auto;margin-left:auto">
  <tr>
  <th>备料批次号</th>
  <th>PLO<?php echo '(';echo $countrows;echo '套)'?></th>
  <th>Qty<?php echo '(';echo $countqty;echo '台)'?></th>
  <th>机型</th>
  <th>仓库结束备料时间</th>
  <th>产线开始备料时间</th>
  <th>产线备料结束时间</th>
  <th>&nbsp WIP时间&nbsp </th>
  
  </tr>
</div> 
 <?php 
 //loop through the results

 while($row=mysql_fetch_assoc($result))
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
