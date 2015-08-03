<?php 
	error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); 
	$hostname="16.187.224.110"; //MSSQL服务器的IP地址 或 服务器的名字 
	$dbuser="sa"; //MSSQL服务器的帐号 
	$dbpasswd="123456"; //MSSQL服务器的密码 
	$dbname="dbo.rework"; //数据库的名字
	$conn = mssql_connect($hostname,$dbuser,$dbpasswd); //连接MSSQL 
	mssql_select_db($dbname); /*连接要访问的数据库 这里也可以写做 $db=mssql_select_db($dbname,$conn); */ 
	$sql = 
	"select * from linetype"; //sql语句 
	$data = mssql_query($sql); //把查询的值集合在变量$data
	while($Arr = mssql_fetch_object($data)) //循环初始的集合$Arr
	{ 
		$Airport=$Arr->Airport;
		$citycode=$Arr->citycode;
		$Chinesecityname=$Arr->Chinesecityname;
		$Chinesecityjp=$Arr->Chinesecityjp;
		$english=$Arr->english;
		$countrycode=$Arr->countrycode;
		$countryfullname=$Arr->countryfullname;
		$Chauname=$Arr->Chauname;
		//echo $code;
		$conn=mysql_connect("localhost","root","aaron");//连接数据库的帐号和端口号
		mysql_query("SET NAMES 'UTF8'",$conn);
		mysql_select_db("rework",$conn);// 加载数据库
		//$sql="update internationcode set jp='$aa' where Code='$Code'";
		$sql1="insert into internationcode(Airport,citycode,Chinesecityname,Chinesecityjp,english,countrycode,countryfullname,Chauname) values('$Airport','$citycode','$Chinesecityname','$Chinesecityjp','$english','$countrycode','$countryfullname','$Chauname')";
		//echo $sql."<br>";
		$result=mysql_query($sql1); 
	} 
	//mssql_close($conn); //关闭数据库
?>