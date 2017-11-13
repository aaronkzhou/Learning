<html>
<head>
<fontbase family="SimHei">
<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING); 
header('Content-Type:text/html;charset=UTF-8');
header('fontbase family="SimHei"');
//connect to mysql_affected_rows
$db=mysql_connect('localhost','root','') or die('unable to connect.check your connection prameters.');
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
picklistdata.batchnum,picklistdata.PLO,picklistdata.Qty,picklistdata.material_end_time,picklistdata.production_start_time,picklistdata.preparationend,linetype.UpdateTime,linetype.family,picklistdata.status,picklistdata.transfer
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

<table>
<td>
	<form action="picklist\checkstatusbyplo.php" method="post">
	按PLO查询备料情况: 
	<input type="text" name="checkstatusbyplo"/><input type="submit" name="submit" value="submit"/>
	</form>
</td>
</table>

<table >
<td><form action="querybypreparationend.php" method="post"><input type="text" name="date11" /><?php echo "月";?><input type="text" name="date12" /><?php echo "日";?><input type="text" name="date13" /><?php echo "时";?>&nbsp<?php echo "至";?>&nbsp <input type="text" name="date21" /><?php echo "月";?><input type="text" name="date22" /><?php echo "日";?><input type="text" name="date23" /><?php echo "时";?> &nbsp &nbsp <input type="submit" name="submit1" value="按产线备料结束时间查询"/></form></td>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
</table >
<table border="1" cellpadding="0" cellspacing="0"
style="width:100%;margin-left:0px;font-family: sans-serif">
<tr>
<th> &nbsp &nbsp &nbsp </th>
<th><a href="picklist\5.php">待处理订单</a href></th>
<th><a href="picklist\1.php">仓库备料中</a href></th>
<th><a href="picklist\2.php">产线待接收</a href></th>
<th><a href="picklist\3.php">产线备料中</a href></th>
<th><a href="picklist\4.php">等待上线组装</a href></th>
<td>
<!--<form action="submitbybatchnum.php" method="post" style="margin:0px">按批次号更新备料时间:&nbsp<input type="text" name="Remark1" />&nbsp<input type="submit" name="submit2N" value="更新（未交班）"/>&nbsp &nbsp<input type="submit" name="submit2Y" value="更新（交班）"/></form>
<form action="submitbyplo.php" method="post" style="margin:0px" >按PLO号更新备料时间:&nbsp<input type="text" name="Remark2" />&nbsp<input type="submit" name="submit3N" value="更新（未交班）"/>&nbsp &nbsp<input type="submit" name="submit3Y" value="更新（交班）"/></form>-->
<form action="submitbybatchnum.php" method="post" style="margin:0px">按批次号更新备料时间:&nbsp<input type="text" name="Remark1" />&nbsp<input type="submit" name="submit2N" value="更新"/></form>
<form action="submitbyplo.php" method="post" style="margin:0px" >按PLO号更新备料时间:&nbsp<input type="text" name="Remark2" />&nbsp<input type="submit" name="submit3N" value="更新"/></form>
</td>
<td>
<form action="transfer.php" method="post" style="margin:0px" ><input type="submit" name="submit3N" value="交班" style="width: 100px; height: 60px;"/></form>
</td>
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
<table border="1" cellpadding="0" cellspacing="0"
  style="width: 100%;height:auto;margin-right:auto;margin-left:auto">
  <tr>
  <th>备料批次号</th>
  <th>PLO<?php echo '(';echo $countrows;echo '套)'?></th>
  <th>Qty<?php echo '(';echo $countqty;echo '台)'?></th>
  <th>机型</th>
  <th>产线开始备料时间</th>
  <th>产线备料结束时间</th>
  <th>备料持续时间(小时)</th>
  <th>&nbsp WIP时间&nbsp </th>
  </tr>
</div> 
<?php 
 //loop through the results
date_default_timezone_set('Asia/Shanghai');
$time=date('Y/m/d H:i');
while($row=mysql_fetch_assoc($result))
{
extract($row);
$duration=abs(strtotime($production_start_time)-strtotime($time))/60/60;
$duration=round($duration,2);
if ($transfer=='Y')
{
$withintime=7.5;
}
else
{
$withintime=4;
}
if($duration>$withintime)
{
echo'<tr>';
echo"<td style='background-color:red'>$batchnum</td>";
echo"<td style='background-color:red'>$PLO</td>";
echo"<td style='background-color:red'>$Qty</td>";
echo"<td style='background-color:red'>$family</td>";
echo"<td style='background-color:red'>$production_start_time</td>";
echo"<td style='background-color:red'>$preparationend</td>";
echo"<td style='background-color:red'>$duration</td>";
echo"<td style='background-color:red'>$UpdateTime</td>";
echo'</tr>';
}
else
{
echo'<tr>';
echo'<td>'.$batchnum.'</td>';
echo'<td>'.$PLO.'</td>';
echo'<td>'.$Qty.'</td>';
echo'<td>'.$family.'</td>';
echo'<td>'.$production_start_time.'</td>';
echo'<td>'.$preparationend.'</td>';
echo'<td>'.$duration.'</td>';
echo'<td>'.$UpdateTime.'</td>';
echo'</tr>';
}
}
//echo'<td>'.'<form action="submit.php" method="post" style="margin:0px" ><input type="text" name="Remark1" /><input type="hidden" name="Remark2" value="'.$batchnum.'"/>'.'</td>';
//echo'<td>'.'<input type="submit" name="submit" value="更新"/>
//</form>'.'</td>';
 ?>
 </table>
 </head>
 </html>
