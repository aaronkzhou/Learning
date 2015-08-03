<?php
error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); 
header('Content-Type:text/html;charset=UTF-8');
require_once 'classes/reader.php'; 
$db = mysql_connect("localhost","root","aaron");
mysql_query("SET NAMES utf8");//输出中文 
mysql_select_db('picklist'); //选择数据库 ，并建表格
$query='select
PLO,material_end_time,production_start_time,TAT,time_difference,Remark
FROM
	test
';
mysql_query("SET NAMES utf8");
$result=mysql_query($query,$db)or die(mysql_error($db));
$num_movies=mysql_num_rows($result);
?>
<div style="text-align:center;color:#CE0000;">
 <h1> picklist history</h1>
 <table border="2" cellpadding="2" cellspacing="2"
  style="width: 70%;margin-left:auto;margin-right:auto;">
  <tr>
  <th>PLO</th>
  <th>material end time</th>
  <th>production start time</th>
  <th>TAT</th>
  <th>TIME</th>
  <th>Remark</th>
  </tr>
 <?php
 //loop through the results

 while($row=mysql_fetch_assoc($result))
 {
extract($row);
echo'<tr>';
echo'<td>'.$PLO.'</td>';
echo'<td>'.$material_end_time.'</td>';
echo'<td>'.$production_start_time.'</td>';
echo'<td>'.$TAT.'</td>';
echo'<td>'.$time_difference.'</td>';
echo'<td>'.$Remark.'</td>';

echo'</tr>';
}
?>
</table>
<p><?php echo $num_movies;?>RECORDS</p>

