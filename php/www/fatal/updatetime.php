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
	$sql = "select * from LineType"; //sql语句 
	$data = mssql_query($sql); //把查询的值集合在变量$data
	$conn1=mysql_connect("localhost","root","aaron");
	mysql_select_db("picklist",$conn1);
	mysql_query("SET NAMES 'UTF8'",$conn1);
	$sql1="truncate table linetype";
	$result=mysql_query($sql1);
	while($Arr = mssql_fetch_object($data)) //循环初始的集合$Arr
	{ 
		
		$PLO=$Arr->PLO;		
		$Updatetime=$Arr->Updatetime;	
		//$Updatatime=date("Y/m/d H:m",$updatetime);
		$family=$Arr->Family;
		$sql2="insert into linetype(PLO,UpdateTime,family) values('$PLO','$Updatetime','$family')";
		mysql_query($sql2);
	    
	}
?>