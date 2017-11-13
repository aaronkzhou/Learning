<?php

namespace Home\Controller;
use Think\Controller;
header('Content-Type:text/html;charset=UTF-8');

class IndexController extends Controller 
{
    public function index()
	{
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function insert()
	{
	    header('Content-Type:text/html;charset=UTF-8');
		$all=I('post.optionlist');
		$row=explode("\n",$all);
		//var_dump($row);
		$count=count($row);
		for ($i=0;$i<$count;$i++)
		{
		//echo $row[$i];
		$array = explode(",", $row[$i]);
		//var_dump($array);
		if ($array[0]!=='')
		{
		$Option_View=M('Option_View');
		$array[0]=trim($array[0]);
		$array[1]=trim($array[1]);
		$array[2]=trim($array[2]);
		$array[3]=trim($array[3]);
		$query="insert into CPMOData1.dbo.Option_view(SKU,Description,COO,Country,RMN) VALUES('$array[0]',N'$array[1]','$array[2]',N'$array[3]',NULL)";
		echo $query;
		$query = iconv("utf-8", "gbk", $query);
		
		//mssql_query("SET NAMES GB2312");
		mssql_query($query);
		/* if(mssql_query($query))
		{}
		else{
			die(mssql_error());
		} */
		$query="insert into CPMOData1.dbo.Option_SKU(SKU,Description,COO,RMN) VALUES('$array[0]',N'$array[1]','$array[2]',NULL)";
		echo $query;
		$query = iconv("utf-8", "gbk", $query);
		//mssql_query("SET NAMES GB2312");
		mssql_query($query);
		//ECHO "DONE";
		echo "<br>";
		}
		}
	}
	public function insert1()
	{
	    header('Content-Type:text/html;charset=UTF-8');
		$all=I('post.optionlist');
		$row=explode("\n",$all);
		//var_dump($row);
		$count=count($row);
		for ($i=0;$i<$count;$i++)
		{
		//echo $row[$i];
		$array = explode(",", $row[$i]);
		//var_dump($array);
		if ($array[0]!=='')
		{
		$Option_ViewEn=M('Option_ViewEn');
		$array[0]=trim($array[0]);
		$array[1]=trim($array[1]);
		$array[2]=trim($array[2]);
		$array[3]=trim($array[3]);
		$query="insert into CPMOData1.dbo.Option_ViewEn(SKU,Description,COO,Country,RMN) VALUES('$array[0]',N'$array[1]','$array[2]',N'$array[3]',NULL)";
		echo $query;
		$query = iconv("utf-8", "gbk", $query);
		
		//mssql_query("SET NAMES GB2312");
		mssql_query($query);
		/* if(mssql_query($query))
		{}
		else{
			die(mssql_error());
		} */
		//ECHO "DONE";
		echo "<br>";
		}
		}
	}
	
	public function delete()
	{
	
		$all=I('post.PN');
	
		if($all=='')
		{
		echo $output='请输入PN';
		}
		else
		{
		
		$row=explode("\n",$all);
		$count=count($row);
		//echo $count;
		
		for ($i=0;$i<$count;$i++)
		{
		$row[$i]=trim($row[$i]);
		$Option_View=D('Option_SKU');
		$query="delete from CPMOData1.dbo.Option_View where SKU='$row[$i]'";
		$query = iconv("utf-8", "GB2312", $query);
		mssql_query($query);
		$query="delete from CPMOData1.dbo.Option_SKU where SKU='$row[$i]'";
		//$query="plo='$row[$i]' or ";
		$query = iconv("utf-8", "GB2312", $query);
		echo $query;
		mssql_query($query);
		//echo "delete successfully";
		echo "<br>";
		}
		
		}
	
	}
	public function sqltool()
	{
	
		$all=I('post.sql');
	
		if($all=='')
		{
		echo $output='请输入PN';
		}
		else
		{
		
		$row=explode("\n",$all);
		//var_dump($row);
		$count=count($row);
		echo $count;
		for ($i=0;$i<$count;$i++)
		{
		//echo $row[$i];
		//$array = explode(",", $row[$i]);
		//var_dump($array);
		//echo $count;
		
		for ($i=0;$i<$count;$i++)
		{
		
		$row[$i]=trim($row[$i]);
		
		$array = explode(",", $row[$i]);
		//var_dump($array);
		$array[0]=trim($array[0]);
		$array[1]=trim($array[1]);
		$array[2]=trim($array[2]);
		$array[3]=trim($array[3]);
		$array[4]=trim($array[4]);
		$query="insert into CPMOData1.dbo.Prekit1(ZMODPN,RAWPN,COMPN,SCREWPN,CARRIERPN,HOLDERPN) VALUES('$array[0]','$array[1]','$array[2]','$array[3]','$array[4]','')";
		$query = iconv("utf-8", "GB2312", $query);
		echo $query;
		//echo "delete successfully";
		echo "<br>";
		mssql_query($query);
		
		}
		}
		
	
		}
	}
	public function test()
	{
	$Option_View=M('Option_View');
	$query="insert into dbo.Option_view(SKU,Description,COO,Country,RMN) VALUES('','','','',NULL)";
	}
	
}
?>