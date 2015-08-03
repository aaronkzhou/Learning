<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING); 
session_start();
if(isset($_SESSION["test"]))
{
header("Location: http://16.187.224.112:8080/THINKAARON/homepage/Pages/hello.html");
}
else
{
}
?>
<!DOCTYPE html>
<html>  
	<link rel="stylesheet" href="../css/bird.css" type="text/css" />
	<head>
	<link rel="shortcut icon" type="image/icon" href="../img/Globe.ico" >
	<META http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<META content="IE=11.0000" http-equiv="X-UA-Compatible">
	<SCRIPT src="../js/jquery-1.9.1.min.js" type="text/javascript"></SCRIPT>
	<SCRIPT src="../js/birdanimate.js" type=text/javascript></SCRIPT>
	<META name="GENERATOR" content="MSHTML 11.00.9600.17496">
	<link rel="stylesheet" href="/CPMOENGWEB/struts/xhtml/styles.css" type="text/css"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Engineering home</title>	
	</head>
	<body>
	<div id="container" style="text-align:center">
		<DIV class="top_div"></DIV>
		
		<DIV style="background: rgb(255, 255, 255); margin: -400px auto auto; border: 1px solid rgb(231, 231, 231); border-image: none; width: 400px; height: 200px; text-align: center;">
		<form action="http://16.187.224.112:8080/thinkaaron/indexbuyer.php/home/login/login" method="post">
			<DIV style="width: 165px; height: 96px; position: absolute;">
			<DIV class="tou"></DIV>
			<DIV class="initial_left_hand" id="left_hand"></DIV>
			<DIV class="initial_right_hand" id="right_hand"></DIV>
			</DIV>
			<P style="padding: 30px 0px 10px; position: relative;">
				<SPAN class="u_logo">
				</SPAN>         
				<INPUT class="ipt" type="text" name="username" placeholder="pls input your username" value=""> 
			</P>
			<P style="position: relative;">
			<SPAN class="p_logo"></SPAN>         
			<INPUT class="ipt" id="password" type="password" name="password" placeholder="pls input your password" value="">   
			</P>
			<DIV style="height: 50px; line-height: 50px; margin-top: 30px; border-top-color: rgb(231, 231, 231); border-top-width: 1px; border-top-style: solid;">
				<P style="margin: 0px 35px 20px 45px;">
					<SPAN style="float: left;">
						<A style="color: rgb(204, 204, 204);" href="mailto://aaron.chou@hp.com">
						Forget password?
						</A>
					</SPAN>
					<SPAN style="float: right;">
						<A style="color: rgb(204, 204, 204); margin-right: 10px;" 
						href="register.html" target="main" class="documents">Register
						</A>  
						<input style="background: rgb(0, 142, 173); padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;" type="submit" name="Login" value="Login"/>
					</SPAN>         
				</P>
			</DIV>
		</DIV>
		</form>
	</div>
	
	</body>
</html>