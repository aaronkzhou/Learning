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
$mail->CharSet='UTF-8'; //�����ʼ����ַ����룬�����Ҫ����Ȼ�������� 
$mail->SMTPAuth = true; //������֤ 
$mail->Port =25 ; 
$mail->Host = "smtp.hp.com"; 
$mail->Username = "aaron.chou@hp.com"; 
$mail->Password = "libeibei0903!"; 
//$mail->IsSendmail(); //���û��sendmail�����ע�͵���������֡�Could not execute: /var/qmail/bin/sendmail ���Ĵ�����ʾ 
$mail->AddReplyTo("aaron.chou@hp.com","aaron");//�ظ���ַ 
$mail->From = "aaron.chou@hp.com"; 
$mail->FromName = "398410215"; 
$to = "aaron.chou@hp.com"; 
$mail->Body = "<h1>phpmail</h1>what's that for test��<font color=red>www.phpddt.com</font>��test content"; 
$mail->AddAddress($to); 
$mail->Subject = "phpmailer title"; 
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; //���ʼ���֧��htmlʱ������ʾ������ʡ�� 
$mail->WordWrap = 80; // ����ÿ���ַ����ĳ��� 
//$mail->AddAttachment("f:/test.png"); //������Ӹ��� 
$mail->IsHTML(true); 
$mail->Send(); 
echo 'successfull'; 
}
catch (phpmailerException $e)
{
echo "fail��".$e->errorMessage(); 
var_dump ($mail);
}
?> 
