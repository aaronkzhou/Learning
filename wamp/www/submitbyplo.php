<?php
error_reporting(E_ALL^E_NOTICE^E_DEPRECATED);
header("Content-Type:text/html;charset=GB2312");
date_default_timezone_set('Asia/Shanghai');
$time=date('Y/m/d H:i');
//echo $time;
$tag=$_POST['Remark2'];
/* if (isset($_POST['submit3Y']))
{
     $update='Y';
}
else
{
}
if (isset($_POST['submit3N']))
{
     $update='N';
} */
//iconv('gbk','utf8',$tag);
//$PLO=$_POST['Remark2'];
//$ID1=$ID+1;
//echo $tag;
//echo $ID;

/** Include PHPExcel for write into excel*/ 
/*require_once 'Classes/PHPExcel.php';
//require_once 'Classes/PHPExcel/Cell.php';
require_once 'Classes/PHPExcel/Writer/Excel5.php'; 
$objPHPExcel = PHPExcel_IOFactory::load('picklist.xls');

//$objPHPExcel->getActiveSheet()->setCellValue('P'.$ID+1, $tag);
$objPHPExcel->getActiveSheet()->setCellValue('G'.$ID1, $tag);
$objPHPExcel->getActiveSheet()->setcellValue('H'.$ID1, $time);

//$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//$objWriter->save('picklist.xls');
//header('Content-Disposition: attachment;filename="'.'picklist'.'.xls"');//文件名
//header('Content-Type: application/vnd.ms-excel');
//header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('picklist.xlsx');
//$objWriter->save('php://output');*/
$db = mysql_connect("localhost","root","");
mysql_select_db('picklist'); //选择数据库 ，并建表格
$sql="
UPDATE picklistdata
SET preparationend='$time'
where PLO='$tag'";
mysql_query("SET NAMES utf8");//输出中文 
mysql_query($sql,$db)or die(mysql_error($db));
echo "<script>alert('$time');window.parent.location.href='picklist.php'</script>";
//echo "<script>alert('sucessfully');window.parent.location.href='picklist.php'</script>";
//ECHO "successfully";
?>
