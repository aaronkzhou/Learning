<?php
error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); 
header('Content-Type:text/html;charset=UTF-8');
$db = mysql_connect("localhost","root","aaron");
mysql_query("SET NAMES utf8");//输出中文 
mysql_select_db('picklist'); //选择数据库 ，并建表格
$query='select FE2PLO
FROM
	fe2
';
$result=mysql_query($query,$db)or die(mysql_error($db));
$num_movies=mysql_num_rows($result);
?>
<div style="text-align:center;color:#CE0000;">
 <h1> Open FE2 Order</h1>
 <table border="1" cellpadding="1" cellspacing="1"
  style="width: 60%;margin-left:auto;margin-right:auto;background-color:#F8F8FF;">
  <tr>
  <th>PLO</th>
  </tr>
 <?php 
 //loop through the results

 while($row=mysql_fetch_assoc($result))
 {
extract($row);
echo'<tr>';
echo'<td>'.$FE2PLO.'</td>';
echo'</tr>';
}
?>
</table>
<p><?php echo $num_movies;?>RECORDS</p>

