<?php
ini_set("memory_limit","10240M");
set_time_limit(0);// ͨ��set_time_limit(0)�����ó��������Ƶ�ִ����ȥ
while(1)
{
require_once('updatepicklittomysql.php');
require_once('updatetime.php');
require_once('testforsteal.php');
require_once('updatefe2.php');
}
?>