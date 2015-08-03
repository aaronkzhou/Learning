<?php
error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); 
header('Content-Type:text/html;charset=UTF-8');
require_once 'classes/reader.php'; 
$db = mysql_connect("localhost","root","aaron");
mysql_query("SET NAMES utf8");//输出中文 
mysql_select_db('linetype'); //选择数据库 ，并建表格
$query='select
PLO,UpdateTime,REMARK
FROM linetype
order by PLO desc'
;
mysql_query("SET NAMES utf8");
$result=mysql_query($query,$db)or die(mysql_error($db));
?>
<div style="text-align:center;color:#CE0000;">
 <h1> updatetime history</h1>
 <table border="2" cellpadding="2" cellspacing="2"
  style="width: 70%;margin-left:auto;margin-right:auto;">
  <tr>
  <th>PLO</th>
  <th>UpdateTime</th>
  <th>Remark</th>
  </tr>
 <?php 
 //loop through the results

 while($row=mysql_fetch_assoc($result))
 {
extract($row);
echo'<tr>';
echo'<td>'.$PLO.'</td>';
echo'<td>'.$UpdateTime.'</td>';
echo'<td>'.$REMARK.'</td>';
echo'</tr>';
}
 ?>
