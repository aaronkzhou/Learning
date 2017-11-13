<?php
$db = mysql_connect("localhost","root","");
header("Content-Type:text/html;charset=gb2312");
mysql_select_db('picklist'); //选择数据库 ，并建表格
$sql="
UPDATE picklistdata
SET transfer='Y'
where PLO in(
select plo 
from
(select
picklistdata.plo
from
picklistdata left outer join linetype ON picklistdata.PLO=linetype.PLO
where
(UpdateTime='') and preparationend='' and picklistdata.remark not like'%cancel%' and picklistdata.production_start_time<>'' and status not like'%close%' and picklistdata.status not like'%cancel%') as a)";
mysql_query("SET NAMES utf8");//输出中文 
mysql_query($sql,$db)or die(mysql_error($db));
echo "<script>alert('交接成功');window.parent.location.href='picklist.php'</script>";
?>