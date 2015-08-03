<?php
set_time_limit(0);
system('cmd/C c:\wamp\www\copy.bat');
date_default_timezone_set('PRC');
$nowtime=date("Y/m/d H:m");
error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); 
header('Content-Type:text/html;charset=UTF-8');
require_once 'Classes/PHPExcel.php'; 
$phpexcel = new PHPExcel();
$phpreader = new PHPExcel_Reader_Excel2007();
$excel = $phpreader->load("picklist.xlsx");
$sheetName = $excel->getSheetNames();
$sheetNumber = $excel->getSheetCount();
$sheet = $excel->getSheet(0);
$rowNumber = $sheet->getHighestRow(); //获取最大行数
$con = mysql_connect("localhost","root","aaron");
mysql_select_db("picklist",$con);
//echo $rowNumber;
for($r=0; $r<$rowNumber; $r++)
{
	$pd=(int)$sheet->getCellByColumnAndRow('4',$r)->getValue();
	
	if(!empty($pd))
{
	$val0=$sheet->getCellByColumnAndRow('4',$r)->getValue();
	$val1 = $sheet->getCellByColumnAndRow('10',$r)->getValue();
	if (!empty($val1))
	{
	$val1=($val1-70*365-19)*86400-8*3600;
	$val1=date("Y/m/d H:m",$val1);
	}
	$val4 = $sheet->getCellByColumnAndRow('22',$r)->getCalculatedValue();
	$val2= $sheet->getCellByColumnAndRow('12',$r)->getValue();
	if(!empty($val2))
	{
	$val2=($val2-70*365-19)*86400-8*3600;
	$val2=date("Y/m/d H:m",$val2);
	}
	else
	{
	}
	$val3 = $sheet->getCellByColumnAndRow('11',$r)->getCalculatedValue();
	$val5=$sheet->getCellByColumnAndRow('15',$r)->getCalculatedValue();
	$result=mysql_query("SELECT * FROM test where PLO='$val1' limit 1");
	if (mysql_num_rows($result))
	{
		mysql_query("UPDATE test set material_end_time='$val1',production_start_time='$val2' where PLO='$val1'");
	}
	else
	{
	mysql_query("SET NAMES utf8");
	mysql_query("INSERT INTO test (PLO,material_end_time,production_start_time,TAT,time_difference,Remark)
	VALUES ('$val0','$val1','$val2','$val3','$val4','$val5')");
	}
}
}
?>