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
	<link rel="stylesheet" href="../../HOMEPAGE/css/style.css" type="text/css" />
	<script  href="../../HOMEPAGE/js/jquery.min.js" type="text/javascript" ></script>
	<META name="GENERATOR" content="MSHTML 11.00.9600.17496">
	<META content="IE=11.0000" http-equiv="X-UA-Compatible">
	
	</head>
	<body>
	<div id="container">
		<DIV class="top_div"></DIV>
		<DIV style="background: rgb(255, 255, 255); margin: -525px auto auto; border: 1px solid rgb(231, 231, 231); border-image: none; width: 400px; height: 460px; text-align: center;">
		<form action="http://16.187.224.112:8080/thinkaaron/indexbuyer.php/home/prekit1/prekit1" method="post">
		
		
			<P style="padding: 30px 0px 10px; position: relative;">        
			<INPUT class="ipt" id="ZMODPN" name="ZMODPN" type="text/css" placeholder="ZMOD PN#" value=""> 
			</P>
			<P style="padding: 0px 0px 10px;position: relative;">      
			<INPUT class="ipt" id="RAWPN" name="RAWPN" type="text/css" placeholder="RAW PN#" value="">   
			</P>
			<P style="padding: 0px 0px 10px;position: relative;">      
			<INPUT class="ipt" id="COMPN" name="COMPN" type="text/css" placeholder="Composite label PN#" value="">   
			</P>
			<P style="padding: 0px 0px 10px;position: relative;">      
			<INPUT class="ipt" id="SCREWPN" name="SCREWPN" type="text/css" placeholder="Screw PN#" value="">   
			</P>
			<P style="padding: 0px 0px 10px;position: relative;">      
			<INPUT class="ipt" id="CARRIERPN" name="CARRIERPN" type="text/css" placeholder="Carrier PN#" value="">   
			</P>
			<P style="padding: 0px 0px 10px;position: relative;">      
			<INPUT class="ipt" id="HOLDERPN" name="HOLDERPN" type="text/css" placeholder="holder PN#" value="">   
			</P>
							
			<DIV style="height: 50px; line-height: 50px; margin-top: 10px; border-top-color: rgb(231, 231, 231); border-top-width: 1px; border-top-style: solid;">
				<P style="margin: 0px 35px 20px 45px;">
				
					<SPAN style="float: right;">
						<input style="background: rgb(0, 142, 173); padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;" type="submit" name="insert" value="Add to Database"/>
						
					</SPAN>
					<SPAN style="float: left;">
						<A style="background: rgb(0, 142, 173); padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;" href="http://16.187.224.112:8080/thinkaaron/buyerteam/home/insertprekitinfo3.php" target="main">
						ZMOD<-->KMAT  &nbsp;
						</A>
					</SPAN>

			</div>			
		</form>
		<br>
		<br>
		<form action="http://16.187.224.112:8080/thinkaaron/indexbuyer.php/home/User/Uploadfile" enctype="multipart/form-data" method="post" target="main">
		<input type="file" name="file" style="float: middle;  font-weight: bold;"/>
		<input type="submit" value="upload jpg" style="background: rgb(0, 142, 173); padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;">
		</form>
		</DIV>
		
	</div>
		
	</body>
			
			
</html>
