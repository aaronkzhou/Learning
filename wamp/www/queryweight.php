
<html>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<div style="text-align:center;color:#CE0000;">
 <h1 style="font-family:simhei">查询BOXID的前后50条重量记录</h1>
</div>
<table width="40%" border="1" cellspacing="0" cellpadding="0"
style="width:60%;margin-left:280px;font-family: sans-serif">
<tr>
<th>BOXID</th>
<th>重量</th>
<?php 

	error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); 
	ignore_user_abort();//关掉浏览器，PHP脚本也可以继续执行.
    set_time_limit(0);// 通过set_time_limit(0)可以让程序无限制的执行下去
	$tag=$_POST['boxid'];
	$tag=trim($tag);
	$hostname="16.187.224.111"; //MSSQL服务器的IP地址 或 服务器的名字 
	$dbuser="keren"; //MSSQL服务器的帐号 
	$dbpasswd="keren123"; //MSSQL服务器的密码 
	$dbname="PLOdb"; //数据库的名字
	$conn = mssql_connect($hostname,$dbuser,$dbpasswd); //连接MSSQL 
	mssql_select_db($dbname); /*连接要访问的数据库 这里也可以写做 $db=mssql_select_db($dbname,$conn);*/ 
	$sql = "select MEMBERID
	from dbo.KitWeight 
	where Name='$tag'
	"; //sql语句 
	$result = mssql_query($sql);
	$ID=mssql_result($result,0,0);
	$before=$ID-50;
	$after=$ID+50;
	$sql="select Name, Weight
	from dbo.kitWeight
	where MEMBERID<'$after'AND MEMBERID>'$before'";
	$result=mssql_query($sql);
while($row1=mssql_fetch_assoc($result))
{
extract($row1);
echo "<tr>";
echo "<th>$Name</th>";
echo "<th>$Weight</th>";
echo "</tr>";
}
?>
</table>
