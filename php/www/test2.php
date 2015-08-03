<?php 
header("content-type:text/html;charset=utf-8"); 
ini_set("magic_quotes_runtime",0); 
require 'classes/class.phpmailer.php'; 
include'classes/class.smtp.php';
try 
{
$mail = new PHPMailer(true); 
$mail->IsSMTP(); 
$mail->SMTPSecure = 'tls';
$mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码 
$mail->SMTPAuth = true; //开启认证 
$mail->Port =25 ; 
$mail->Host = "smtp.hp.com"; 
$mail->Username = "aaron.chou@hp.com"; 
$mail->Password = "libeibei0903!"; 
//$mail->IsSendmail(); //如果没有sendmail组件就注释掉，否则出现“Could not execute: /var/qmail/bin/sendmail ”的错误提示 
$mail->AddReplyTo("aaron.chou@hp.com","aaron");//回复地址 
$mail->From = "aaron.chou@hp.com"; 
$mail->FromName = "398410215"; 
$to = "aaron.chou@hp.com"; 
$mail->Body = "<h1>phpmail</h1>what's that for test（<font color=red>www.phpddt.com</font>）test content"; 
$mail->AddAddress($to); 
$mail->Subject = "phpmailer title"; 
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略 
$mail->WordWrap = 80; // 设置每行字符串的长度 
//$mail->AddAttachment("f:/test.png"); //可以添加附件 
$mail->IsHTML(true); 
$mail->Send(); 
echo 'successfull'; 
}
catch (phpmailerException $e)
{
echo "fail：".$e->errorMessage(); 
var_dump ($mail);
}
?> 
