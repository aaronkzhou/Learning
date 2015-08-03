<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	Public function Warrantycard(){
		$Warrantycard=D('Warrantycard');
		date_default_timezone_set('Asia/Shanghai');
		$RECORDTIME=date('Y-m-d H:i');
		$data['HPSKU']=I('post.HPSKU');
		$data['H3CPID']=I('post.H3CPID');
		$data['H3CBOMCODE']=I('post.H3CBOMCODE');
		//$data['RECORDTIME']=$RECORDTIME;
		if($data['HPSKU']=='')
		{
		$output="HPSKU PN# is a must";
		$this->assign('output',$output);
		$this->display();
		exit();
		}
		if($data['H3CPID']=='')
		{
		$output="H3C product ID is a must";
		$this->assign('output',$output);
		$this->display();
		exit();
		}
		if($data['H3CBOMCODE']=='')
		{
		$output="H3C BOMCODE is a must";
		$this->assign('output',$output);
		$this->display();
		exit();
		}
		if (false !== $Warrantycard->create())
		{
		$Warrantycard->add($data);
		$output="insert successfully";
		$this->assign('output',$output);
		$this->display();
		}
		else
		{
		$output=($Warrantycard->getError());
		$this->assign('output',$output);
		$this->display();
		}
		
	
	
	
	}
}
