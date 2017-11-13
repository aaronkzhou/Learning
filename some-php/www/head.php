<?php
ini_set("memory_limit","10240M");
set_time_limit(0);// 通过set_time_limit(0)可以让程序无限制的执行下去
while(1)
{
require_once('updatepicklittomysql.php');
require_once('updatetime.php');
require_once('testforsteal.php');
require_once('updatefe2.php');
}
?>