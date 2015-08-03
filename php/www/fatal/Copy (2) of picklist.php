<?php
error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); 
require_once 'classes/reader.php'; 
header('Content-Type:text/html;charset=UTF-8');
header('fontbase family="SimHei"');

//connect to mysql_affected_rows
$db=mysql_connect('localhost','root','aaron') or die('unable to connect.check your connection prameters.');
mysql_select_db('picklist',$db) or die(mysql_error($db));
$query1='
select count(PLO),sum(Qty)
from test
where(material_end_time="" and production_start_time="" and preparationend="")
';
$result1=mysql_query($query1,$db);
$PLO1=mysql_result($result1,0,0);
$Qty1=mysql_result($result1,0,1);
$query2='
select count(PLO),sum(Qty)
from test
where(material_end_time<>"" and production_start_time="" and preparationend="")
';
$result2=mysql_query($query2,$db);
$PLO2=mysql_result($result2,0,0);
$Qty2=mysql_result($result2,0,1);
$query3='
select count(PLO),sum(Qty)
from test
where(material_end_time<>"" and production_start_time<>"" and preparationend="")
';
$result3=mysql_query($query3,$db);
$PLO3=mysql_result($result3,0,0);
$Qty3=mysql_result($result3,0,1);
$query4='
select count(PLO),sum(Qty)
from test
where(material_end_time<>"" and production_start_time<>"" and preparationend<>"")
';
$result4=mysql_query($query4,$db);
$PLO4=mysql_result($result4,0,0);
$Qty4=mysql_result($result4,0,1);


//retrieve information
$query=
'select
test.batchnum,test.PLO,test.Qty,test.material_end_time,test.production_start_time,test.preparationend,linetype.UpdateTime

from
test left outer join linetype ON test.PLO=linetype.PLO


where
(production_start_time<>"" and preparationend="")
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

<table border="7" cellpadding="1" cellspacing="1"
style="width:40%;mrgin-left:120px">
<tr>
<th> &nbsp&nbsp&nbsp </th>
<th><a href="a.php">仓库备料中</a href> </th>
<th><a href="a.php">产线待接收</a href></th>
<th><a href="a.php">产线备料中</a href></th>
<th><a href="a.php">待上线组装</a href></th>
</tr>
<tr>
<th>PLO</th>
<th><?php echo $PLO1;?></th>
<th><?php echo $PLO2;?></th>
<th><?php echo $PLO3;?></th>
<th><?php echo $PLO4;?></th>
</tr>
<tr>
<th>Qty</th>
<th><?php echo $Qty1;?></th>
<th><?php echo $Qty2;?></th>
<th><?php echo $Qty3;?></th>
<th><?php echo $Qty4;?></th>
</tr>
</table>
<div style="text-align:center;color:#CE0000;">
 <h1> 待备料清单</h1>
 <table border="7" cellpadding="1" cellspacing="1"
  style="width: 90%;margin-right:auto;margin-left:auto">
  <tr>
  <th>备料批次号</th>
  <th>PLO<?php echo '(';echo $countrows;echo '套)'?></th>
  <th>Qty<?php echo '(';echo $countqty;echo '台)'?></th>
  <th>仓库结束备料时间</th>
  <th>产线开始备料时间</th>
  <th>产线备料结束时间</th>
  <th>&nbsp机器上线时间&nbsp</th>
  <th>请输入批次号</th>
  <td><form action="submit.php" method="post" style="margin:0px" ><input type="text" name="Remark1" /><input type="submit" name="submit" value="更新备料时间"/></td>
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
