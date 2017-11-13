<?php
namespace Home\Controller;
use Think\Controller;
class PrekitController extends Controller 
{

    public function index()
	{
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function Prekit()
	{
		
		$Prekit=D('Prekit');
		date_default_timezone_set('Asia/Shanghai');
		$RECORDTIME=date('Y-m-d H:i');
		$data['PLO']=I('post.PLO');
		$data['SO']=I('post.SO');
		$data['HDD_KMAT_PART']=I('post.HDD_KMAT_PART');
		$data['ITEM_NO']=I('post.ITEM_NO');
		$data['KITTED_DRIVE_QTY']=I('post.KITTED_DRIVE_QTY');
		$data['RAW_DRIVE']=I('post.RAW_DRIVE');
		$data['BUYER']=I('post.BUYER');
		$data['PRE_KITDATE']=I('post.PRE_KITDATE');
		$data['RECORDTIME']=$RECORDTIME;
		if($data['PLO']=='')
		{
		$output="PLO is a must";
		$this->assign('output',$output);
		$this->display();
		exit();
		}
			
		if (false !== $Prekit->create())
		{
		$Prekit->add($data);
		$output="insert successfully";
		$this->assign('output',$output);
		$this->display();
		}
		else
		{
		$output=($Prekit->getError());
		$this->assign('output',$output);
		$this->display();
		}
		
    }
	
	public function query()
	{
	
		header("Content-Type:text/html;charset=UTF-8");
		$Prekit=M('Prekit');
		$data['PLO']=file_get_contents('php://input', 'r');
		$PLO=$data['PLO'];
		$result=$Prekit->where("PLO='$PLO'")->select();
		$count=count($result);
		if($count==1)
		{
		echo "此订单HDD已做PREKIT";
		}
		else
		{
		}
		/* if (false !== $Prekit->create())
		{
		//echo $username;
		$result=$Prekit->where("PLO='$PLO'")->select();
		$count=count($result);
			if($count==1)
			{
			echo "此订单HDD已做pre-kit";
			}
			else
			{
			echo "don't exist";
			} */
		// 如果创建失败 表示验证没有通过 输出错误提示信息
		//}
	}
}
?>