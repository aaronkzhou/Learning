<?php
/*
 * Created by aaron
 * Date: 14-11-07
 */
include'Classes/13jinzhi.php';
error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); 
header('Content-Type:text/html;charset=UTF-8');
set_time_limit(0);// 通过set_time_limit(0)可以让程序无限制的执行下去
$con=mysql_connect("localhost","root","aaron");
mysql_select_db('picklist',$con);
$row1=mysql_query('select count(PLO)from sfng');
$row=mysql_result($row1,0,0);
$row1=mysql_query('select * from sfng');
$PLO=mysql_result($row1,$row-1,0);
echo $PLO;
$html = file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/QuickSearch?object='.$PLO.'&search=Overview');//进入第一个网页
$preg="/revisionNo\=1\"\>(.*)\<\/a\>/U";
preg_match($preg,$html,$result1);
var_dump($result1);
$html1=file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/DisplayOrder?bpo='.$result1[1].'&revisionNo=1');
$preg1="/object=(B\w\w\w\w\w\w)\"/U";
preg_match($preg1,$html1,$result2);
$WO=$result2[1];
echo $WO;
$code = new Code(); 
$value = $code->decodeID($WO,0);
//echo $value.',';
$value1=$value+20000;
//echo $value1.',';
$value2=$code->encodeID($value1,0);
//echo $value2.',';
$value3=$value-20000;
//echo $value3.',';
$value4=$code->encodeID($value3,0);
//echo $value4;

	$preg='/.*\<\/font\>\n\<\/td\>\n.*\>CN\<\/font\>\n\<\/td\>\n.*\<\/font\>\n\<\/td\>\n.*\<\/font\>\n\<\/td\>\n\<.*\<\/font\>/U';
	$html= file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/DefaultQueryReport?maxDefaultQueryRows=20000&fromDueDate=&toDueDate=&operations_m=none&fromBirthStamp=&toBirthStamp=&fromShippedDate=&toShippedDate=&fromWoid='.$value4.'&toWoid='.$value2.'&fromSerialNo=&toSerialNo=&coaStatus=All&salesOrderPattern=&product_family_pattern_m=TSG_BLD_PF&product_family_pattern_m=TSG_BLD_PF&product_family_pattern_m=TSG_ENCL_PF&product_family_pattern_m=TSG_ENCL_PF&product_family_pattern_m=TSG_MLDL_PF&product_family_pattern_m=TSG_MLDL_PF&product_family_pattern_m=TSG_MLTPRT_PF&product_family_pattern_m=TSG_MLTPRT_PF&product_family_pattern_m=TSG_OEM_BLD_PF&product_family_pattern_m=TSG_OEM_ENCL_PF&product_family_pattern_m=TSG_OEM_MLDL_PF&product_family_pattern_m=TSG_OEM_PF_MLDL&bpoPattern=&revisionNo=&plannedOrderPattern=&legacyOrderPattern=&masterProductPattern=&skuPattern=&materialNoPattern=&shipPoint=BF40&shipRef=&queryType=omOpen&sortBy=Backplane+Delivery&consolidated=wo&logic=and');
	$count=preg_match_all($preg,$html,$result);
	//var_dump($result);
	//echo $count;
	//echo $html;
	$con=mysql_connect("localhost","root","aaron");
	mysql_select_db("picklist",$con);
	
	for($i=0;$i<$count;$i++)
	{
		$preg1='/\<td valign\=top colspan.*\"-2\"\>(.*)\<\/font\>/U';
		preg_match_all($preg1,$result[0][$i],$result1);
		$Qty=$result1[1][0];
		$PLO=$result1[1][2];
		$FAMILY=$result1[1][4];
		//echo $PLO;
		//echo ",";
		//echo $FAMILY;
		//echo ",";
	$html = file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/QuickSearch?object='.$PLO.'&search=Overview');

	if (strstr($html,'TST'))
	{
	}
	else
	{
		mysql_query("INSERT INTO sfng(PLO,FAMILY,Qty)
		VALUES('$PLO','$FAMILY','$Qty')");
	}
	}

?>
