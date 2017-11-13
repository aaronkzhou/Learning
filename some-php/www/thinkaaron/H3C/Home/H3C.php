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
		<form action="http://16.187.224.112:8080/thinkaaron/indexH3C.php/home/index/Warrantycard" method="post">
		
			<P style="padding: 30px 0px 10px;position: relative;">      
			<INPUT class="ipt" id="HPSKU" name="HPSKU" type="text/css" placeholder="HPSKU PN#" value="">   
			</P>
			<P style="padding: 0px 0px 10px; position: relative;">        
			<INPUT class="ipt" id="H3CPID" name="H3CPID" type="text/css" placeholder="H3C Product ID" value=""> 
			</P>	
			<P style="padding: 0px 0px 10px; position: relative;">        
			<INPUT class="ipt" id="H3CBOMCODE" name="H3CBOMCODE" type="text/css" placeholder="H3C BOM CODE" value="">
			</P>				
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
