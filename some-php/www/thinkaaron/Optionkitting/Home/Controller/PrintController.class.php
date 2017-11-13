<?php

namespace Home\Controller;
use Think\Controller;
header('Content-Type:text/html;charset=utf-8');

class Print1Controller extends Controller 
{
    public function index()
	{
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function Print1()
	{
		
		require('../../../../Classes/PHPExcel.php');
		/* $objExcel = new PHPExcel();
		$objWriter = new PHPExcel_Writer_Excel5($objExcel);
		$objProps = $objExcel->getProperties();   
		$objProps->setCreator("yuan");
		$objProps->setLastModifiedBy("yuan");
		$objProps->setTitle("excel test");   
		$objProps->setSubject("my excel test");
		$objProps->setDescription("hello world.");   
		$objProps->setKeywords("PHPExcel");
		$objProps->setCategory("EXCEL");
		$objExcel->setActiveSheetIndex(0);
		$objActSheet = $objExcel->getActiveSheet();
		$objActSheet->setTitle('TEST1'); 
		$objActSheet->setCellValue('A1', '字符串内容');
		$objActSheet->setCellValue('A2', 26);
		$objActSheet->setCellValue('A3', true);
		$objActSheet->setCellValue('A4', '=A2+A2');
		$objWriter->save('./helloworld.xls');  */  
		
		
		$Print1=D('Print1');
		$data['PN']=I('post.PN');
		$data['SN']=I('post.SN');
		if (false !== $Print1->create())
		{
		$Wrtdata=$Print1->where("PN='$PN'")->find();
		var_dump($Wrtdata);
		$PN=$Wrtdata['PN'];
		$DESCRIPTION=$Wrtdata['DESCRIPTION'];
		$CHINESEDES=$Wrtdata['CHINESEDES'];
		$WRTYEAR=$Wrtdata['WRTYEAR'];
		
		
		}
		else
		{
		$output=($Print1->getError());
		$this->assign('output',$output);
		$this->display();
		}
		//var_dump($data);
	
	}
	public function test()
	{
	$Option_View=M('Option_View');
	$query="insert into dbo.Option_view(SKU,Description,COO,Country,RMN) VALUES('','','','',NULL)";
	}
	
}
?>