<?php 

	error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); 
	ignore_user_abort();//关掉浏览器，PHP脚本也可以继续执行.
    set_time_limit(0);// 通过set_time_limit(0)可以让程序无限制的执行下去
	$hostname="16.187.224.110"; //MSSQL服务器的IP地址 或 服务器的名字 
	$dbuser="sa"; //MSSQL服务器的帐号 
	$dbpasswd="123456"; //MSSQL服务器的密码 
	$dbname="rework"; //数据库的名字
	$conn = mssql_connect($hostname,$dbuser,$dbpasswd); //连接MSSQL 
	mssql_select_db($dbname); /*连接要访问的数据库 这里也可以写做 $db=mssql_select_db($dbname,$conn);*/ 
	$sql = "select PLO,Family,Convert(varchar,WIPdate,111)+' '+substring(Convert(varchar,WIPdate,22),10,5) as WIPdate
	from rework.dbo.LineType"; //sql语句 
	$data = mssql_query($sql); //把查询的值集合在变量$data
	$conn1=mysql_connect("localhost","root","");
	mysql_select_db("picklist",$conn1);
	mysql_query("SET NAMES 'UTF8'",$conn1);
	$sql1="truncate table linetype";
	$result=mysql_query($sql1);
	//var_dump($result);
	while($Arr = mssql_fetch_object($data))//循环初始的集合$Arr
	{
		$PLO=$Arr->PLO;
		$WIPdate=$Arr->WIPdate;	
		//$WIPdate=date("Y/m/d H:i",$WIPdate);
		$family=$Arr->Family;
		$sql2="insert into linetype(PLO,UpdateTime,family) values('$PLO','$WIPdate','$family')";
		mysql_query($sql2);
		//echo $WIPdate;
	}
	/* echo $WIPdate;
	echo strtotime('0x0000A30E000DC9B0');
	echo ',';
	echo date("Y/m/d H:i",'0x0000A30E000DC9B0'); */
?>