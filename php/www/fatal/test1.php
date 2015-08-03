<?php

require("classes/PHPMailer/PHPMailerAutoload.php");
require("classes/phpmail/class.phpmailer.php"); 
header('Content-Type:text/html;charset=UTF-8');
$mail = new PHPMailer(); //建立邮件发送类
$address ="398410215@qq.com";
$mail->Host = "smtp.qq.com"; // 您的企业邮局域名
$mail->SMTPAuth = true; // 启用SMTP验证功能
$mail->Username = "398410215@qq.com"; // 邮局用户名(请填写完整的email地址)
$mail->Password = "Wangjiawei0903"; // 邮局密码
$mail->Port=25;
$mail->From = "398410215@qq.com"; //邮件发送者email地址
$mail->FromName = "aaronchou";
$mail->IsSMTP(); // 使用SMTP方式发送
$mail->AddAddress($address);//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
//$mail->AddReplyTo("", "");
//$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
//$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
$mail->Subject = "PHPMailer测试邮件"; //邮件标题
$mail->Body = "Hello,这是测试邮件"; //邮件内容
echo $mail->send();
if(!$mail->Send())
{
echo "邮件发送失败.<p>";
echo "错误原因: " . $mail->ErrorInfo;
}
echo "邮件发送成功";
//echo $mail->SMTPDebug;
?>
<FONT FACE = "sans-serif" > 设定字型 </FONT>
<body style='font-family="sans-serif"'>
