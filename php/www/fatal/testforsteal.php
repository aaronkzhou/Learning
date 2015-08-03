<?php
$interval=60;
/**
 * Created by PhpStorm.
 * User: aaron
 * Date: 14-10-24
 * Time: 下午2:15
 */
header('Content-Type:text/html;charset=UTF-8');
set_time_limit(0);// 通过set_time_limit(0)可以让程序无限制的执行下去
//$preg='/\<td valign\=top colspan.*\"-2\"\>(.*)\<\/font\>/U';
$preg='/\<td valign\=top colspan.*\"-2\"\>(.*)\<\/font\>/U';
$html=file_get_contents('http://shopfloor.sgp.hp.com/sfweb/DefaultQueryReport?maxDefaultQueryRows=20000&fromDueDate=&toDueDate=&operations_m=none&fromBirthStamp=2014-10-24+00%3A00&toBirthStamp=2014-10-24+12%3A00&fromShippedDate=&toShippedDate=&fromWoid=&toWoid=&fromSerialNo=&toSerialNo=&coaStatus=All&salesOrderPattern=&bpoPattern=&revisionNo=&plannedOrderPattern=&legacyOrderPattern=&masterProductPattern=&skuPattern=&materialNoPattern=&shipPoint=BF40&shipRef=&queryType=omOpen&sortBy=Backplane+Delivery&consolidated=wo&logic=and');
//$html = file_get_contents('http://baidu.com');
//$html = file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/QuickSearch?object=1114830956&search=Overview');//进入第一个网页
echo $html;

//echo '匹配的AAAAA个数'.preg_match_all($preg,$html,$result);
//echo "<pre>";
//print_r($result);
//echo $result[1][7];
//echo "</pre>";

?>