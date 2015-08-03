<?php
error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); 
require_once 'classes/reader.php'; 
header('Content-Type:text/html;charset=UTF-8');
header('fontbase family="SimHei"');
//ignore_user_abort();//关掉浏览器，PHP脚本也可以继续执行.
//set_time_limit(0);// 通过set_time_limit(0)可以让程序无限制的执行下去
//$interval=300;// 每隔300s运行
//do
//{
// ExcelFile($filename, $encoding); 
$data = new PHPExcel();  
// Set output Encoding
$data->setOutputEncoding('UTF-8'); //读取excel规则
//”data.xls”是指要导入到mysql中的excel文件 
$data = PHPExcel_IOFactory::createReader('Excel2007')->load("picklist.xlsx");
//$db = mysql_connect("localhost","root","aaron");
//mysql_select_db('picklist',$db);
//mysql_query("drop database picklist");
//mysql_close($db);
$db = mysql_connect("localhost","root","aaron");
if (!$db)
{
	die('Could not connect: ' . mysql_error());
}
mysql_query("SET NAMES utf8");
/*if (mysql_query("CREATE DATABASE picklist DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci",$db))//建立数据库，并用utf8进行编码
{
	echo "";
}
else
{
	echo "Error creating database: " . mysql_error();
}
mysql_query("SET NAMES utf8");//输出中文 
mysql_select_db('picklist'); //选择数据库 ，并建表格

$query='CREATE TABLE test(
ID INT NOT NULL AUTO_INCREMENT,
PLO INT NOT NULL,
material_end_time	varchar(255),
production_start_time	varchar(255),
TAT decimal(6,1),
time_difference decimal(5,1),
Remark varchar(255) default null,
PRIMARY KEY (ID)
)
ENGINE=MyISAM';

mysql_query($query,$db)or die(mysql_error($db));*/
mysql_select_db('picklist');
$alldata=mysql_query('select * from test');
//$all=mysql_fetch_assoc($alldata);

//mysql_fetch_array($alldata,MYSQL_ASSOC);
//while($all=mysql_fetch_array($alldata,MYSQL_ASSOC))
//{
//var_dump($all);
//}


for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) 
{
//以下注释的for循环打印excel表数据 
/* 
for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) { 
echo """.$data->sheets[0]['cells'][$i][$j]."","; 
} 
echo "n"; 
*/ 
//
//echo mysql_result($alldata,$i-2,0);
//echo "".$data->sheets[0]['cells'][$i][1].""; 
if ($data->sheets[0]['cells'][$i][1]!=mysql_result($alldata,$i-2,0))
{
$sql = "INSERT INTO test VALUES('". 
$data->sheets[0]['cells'][$i][5]."','".
$data->sheets[0]['cells'][$i][9]."','".
$data->sheets[0]['cells'][$i][11]."','".
$data->sheets[0]['cells'][$i][10]."','".
$data->sheets[0]['cells'][$i][20]."')"; 
mysql_query($sql,$db)or die(mysql_error($db));
}
else
{
//echo "unmatch";
}
}
//sleep($interval);
//}while(true);
?>