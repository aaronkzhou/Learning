<?php
error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); 
require_once 'classes/reader.php'; 
header('Content-Type:text/html;charset=UTF-8');
header('fontbase family="SimHei"');
//connect to mysql_affected_rows
$db=mysql_connect('localhost','root','aaron') or die('unable to connect.check your connection prameters.');
mysql_select_db('picklist',$db) or die(mysql_error($db));
//retrieve information
$query='select *
from test ,linetype
where test.PLO = linetype.PLO AND production_start_time<>""
order by test.production_start_time DESC';
mysql_query("SET NAMES utf8");
$result=mysql_query($query,$db)or die(mysql_error($db));

//determine number of rows in returned result
$num_movies=mysql_num_rows($result);
?>
<div style="text-align:center;color:#CE0000;">
 <h1> picklist history</h1>
 <table border="7" cellpadding="1" cellspacing="1"
  style="width: 70%;margin-left:auto;margin-right:auto;">
  <tr>
  <th>PLO</th>
  <th>production start time</th>
  <th>updatetime</th>
  <th>Remark</th>
  <th>submit</th>
  </tr>
 <?php 
 //loop through the results

 while($row=mysql_fetch_assoc($result))
{

extract($row);
echo'<tr>';
echo'<td>'.$PLO.'</td>';
echo'<td>'.$production_start_time.'</td>';
echo'<td>'.$UpdateTime.'</td>';
echo'<td>'.$Remark.'<form action="submit1.php" method="post" style="margin:0px" ><input type="text" name="Remark1" /><input type="hidden" name="Remark2" value="'.$PLO.'"/>'.'</td>';
echo'<td>'.'<input type="submit" name="submit" value="Submit"/>
</form>'.'</td>';
echo'</tr>';

}
 ?>
 </table>
 <p><?php echo $num_movies;?>RECORDS</p>
 </div>
