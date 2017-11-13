<?php
namespace Home\Controller;
use Think\Controller;
class Prekit1Controller extends Controller 
{

    public function index()
	{
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	
	public function Prekit1()
	{
		
		$Prekit1=D('Prekit1');
		date_default_timezone_set('Asia/Shanghai');
		$RECORDTIME=date('Y-m-d H:i');
		$data['ZMODPN']=I('post.ZMODPN');
		$data['RAWPN']=I('post.RAWPN');
		$data['COMPN']=I('post.COMPN');
		$data['SCREWPN']=I('post.SCREWPN');
		$data['CARRIERPN']=I('post.CARRIERPN');
		$data['HOLDERPN']=I('post.HOLDERPN');
		$RECORDTIME=date('Y-m-d H:i');
		$data['RECORDTIME']=$RECORDTIME;
		if($data['ZMODPN']=='')
		{
		$output="ZMOD PN# is a must";
		$this->assign('output',$output);
		$this->display();
		exit();
		}
		if($data['RAWPN']=='')
		{
		$output="RAW PN# is a must";
		$this->assign('output',$output);
		$this->display();
		exit();
		}
		if($data['COMPN']=='')
		{
		$output="Composite label PN# is a must";
		$this->assign('output',$output);
		$this->display();
		exit();
		}
		if($data['SCREWPN']=='')
		{
		$output="Screw PN# is a must";
		$this->assign('output',$output);
		$this->display();
		exit();
		}
		if($data['CARRIERPN']=='')
		{
		$output="Carrier PN# is a must";
		$this->assign('output',$output);
		$this->display();
		exit();
		}
		if (false !== $Prekit1->create())
		{
		$find=M("Prekit1");
		$condition['ZMODPN'] = $data['ZMODPN'];
		$list=$find->where($condition)->find();
		if ($list['ZMODPN']=='')
		{
		$Prekit1->add($data);
		$output="insert successfully";
		$this->assign('output',$output);
		$this->display();
		}
		else
		{
		$ZMODPN1=$data['ZMODPN'];
		ECHO $ZMODPN1;
		$Prekit1->where("ZMODPN='$ZMODPN1'")->save($data);
		VAR_DUMP($data);
		$output="update successfully";
		$this->assign('output',$output);
		$this->display();
		}
		}
		else
		{
		$output=($Prekit1->getError());
		$this->assign('output',$output);
		$this->display();
		}
		
    }
	public function Prekit2()
	{
		/* if(isset($_REQUEST['query']))
		{
        echo '确定';
		}
		if(isset($_REQUEST['update']))
		{
        echo '取消';
		} */
		$Prekit1=D('Prekit1');
		date_default_timezone_set('Asia/Shanghai');
		$RECORDTIME=date('Y-m-d H:i');
		$data['KEYPN']=I('post.KEYPN');
		$keypn=$data['KEYPN'];
		$keypn=strtoupper($keypn);
		//echo $keypn;
		If($keypn=='')
		{
		$output1="";
		$this->assign('output1',$output1);
		$this->display();
		exit();
		}
		
		$hostname="16.187.224.112"; //MSSQL服务器的IP地址 或 服务器的名字 
		$dbuser="sa"; //MSSQL服务器的帐号 
		$dbpasswd="support"; //MSSQL服务器的密码 
		$dbname="CPMOData1"; //数据库的名字
		$conn = mssql_connect($hostname,$dbuser,$dbpasswd); //连接MSSQL
		mssql_select_db($dbname); 
		$sql = "
		select ZMODPN 
		from CPMOData1.dbo.Prekit3
		where KEYPN='$keypn'
		"; //sql语句 
		$result=mssql_query($sql);	
		$ZMODPN=mssql_result($result,0,0);//把查询的值集合在变量
		$ZMODPN1=mssql_result($result,1,0);//把查询的值集合在变量
		$Prekit1=D('Prekit1');
		$data['ZMODPN']=$ZMODPN;
		$data['RECORDTIME']=$RECORDTIME;
		$output=$Prekit1->where("ZMODPN='$ZMODPN'")->select();
		$this->assign('output',$output);
		If($ZMODPN1!='')
		{
		$data['ZMODPN']=$ZMODPN1;
		$data['RECORDTIME']=$RECORDTIME;
		$output1=$Prekit1->where("ZMODPN='$ZMODPN1'")->select();
		$this->assign('output1',$output1);
		//VAR_DUMP($output1);
		 }
		$this->display();
		//echo $keypn;
    }
	public function Prekit3()
	{
		$Prekit3=D('Prekit3');
		$data['KEYPN']=I('post.KEYPN');
		$data['KEYPN']=trim($data['KEYPN']);
		$data['ZMODPN']=I('post.ZMODPN');
		$data['ZMODPN']=trim($data['ZMODPN']);
		$keypn=$data['KEYPN'];
		if($data['KEYPN']=='')
		{
		$output="KEYPN is a must";
		$this->assign('output',$output);
		$this->display();
		exit();
		}
		if($data['ZMODPN']=='')
		{
		$output="ZMODPN is a must";
		$this->assign('output',$output);
		$this->display();
		exit();
		}
		if (false !== $Prekit3->create())
		{
		$Prekit3->add($data);
		$output="insert successfully";
		$this->assign('output',$output);
		$this->display();
		exit();
		}
		else
		{
		$output=($Prekit3->getError());
		$this->assign('output',$output);
		$this->display();
		}
		/* $output=$Prekit1->where("KEYPN='$keypn'")->select();
		$this->assign('output',$output);
		$this->display(); */
    }
	public function Option_GPN()
	{
	//$RAW1=I('post.GPNS');
	//$RAW1=trim($RAW1);
	ECHO $RAW1;
	echo '<script>
	var otar="HTTP://pdmweb.usa.hp.com/bomlookup_HPE/MultiLevelBOMDetail.aspx?PartNumber=785226-002&partRev=&SiteId=Corporate%5bCORP%5d&PlantName=Corporate%5bCORP%5d&BomUse=[1]&AltBom=1&src=GPG";
	var ntar = otar.replace(/&amp;/g, "&");
    var star = encodeURIComponent(ntar);	
	</script>';
	$var="<script>document.write(star);</script>";
	//echo $var;
	$test='https://onehp-idp.external.hp.com/idp/startSSO.ping?PartnerSpId=smemppartner&TargetResource='.$var;
	$test1='http://shopfloor.asiapac.hp.com/sfweb/';
	echo $test;
	$RAW=file_get_contents($test);
	echo $RAW;
	//try{
		$RAW=file_get_contents($test);
	//}
	//catch (Exception $e){
		//throw new Exception( 'Something really gone wrong', 0, $e); 
//	}
	
	

	}


}
?>