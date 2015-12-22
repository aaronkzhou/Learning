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

<!DOCTYPE html>

<html>
	
	<head>
	<link rel="stylesheet" href="../../HOMEPAGE/css/bird.css" type="text/css" />
	<META name="GENERATOR" content="MSHTML 11.00.9600.17496">
	<META content="IE=11.0000" http-equiv="X-UA-Compatible">
	</head>
	<body>
	<div id="container">
		<DIV class="top_div"></DIV>
		<DIV style="background: rgb(255, 255, 255); margin: -525px auto auto; border: 1px solid rgb(231, 231, 231); border-image: none; width: 400px; height: 460px; text-align: center;">
		<form action="http://16.187.224.112:8080/thinkaaron/indexbuyer.php/home/prekit1/Option_GPN" method="post">
		<br>

		<h1 style="text-align:center;color:#CE0000;font-family:simhei;">Pls input your query GPNs</h1>
		<br>
			<td>
			<textarea type="text" name="GPNS" style="height:300px;width:350px;">
			</textarea>
			</td>							
			<DIV style="height: 50px; line-height: 50px; margin-top: 10px; border-top-color: rgb(231, 231, 231); border-top-width: 1px; border-top-style: solid;">
				<P style="margin: 0px 35px 20px 45px;">
					
					<SPAN style="float: right;">
						<input style="background: rgb(0, 142, 173); padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;" type="submit" name="insert" value="Add to Database"/>
					</SPAN> 
					
				</P>
			</DIV>
		</form>
		</DIV>
	</div>	
	</body>
	
	
</html>
