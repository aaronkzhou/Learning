<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING); 
session_start();
if(!isset($_SESSION["test"]))
{
header("Location: http://16.187.224.112:8080/THINKAARON/homepage/Pages/login.php");
}
else
{
}
?>
<html>
<head>
<title>Insert Option Records</title>
<link rel="shortcut_icon" href="/panda.ico"> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<div style="text-align:center;color:#CE0000;font-family:simhei;">
<h1>Insert Option Records</h1>
<h3>Format example(666666-001,DIMM,CN,China)</h3>
<table width="40%" border="0" style="text-align:center;margin:auto">
<form action="http://16.187.224.112:8080/thinkaaron/index.php/home/index/insert1" method="post" style="text-align:center">
<td>
<textarea type="text" name="optionlist" style="height:200px;width:900px;">
</textarea>
</td>
</table>
<b><input type="submit" name="submit" value="Insert" style="height:50px;width:150px;color:#000000"/></b>
</form>
</div>
</html>
