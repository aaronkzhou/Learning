<?php
namespace Home\Controller;
header("Content-Type: text/html; charset=utf-8");
use Think\Controller;
class RegisterController extends Controller 
{
	public function Register()
	{
		$Register=D('Register');
		$data['username']=I('post.username');
		$data['password']=I('post.password');
		if (false !== $Register->create())
		{
		$Register->add($data);
		$output="register success";
		$this->assign('output',$output);
		$this->display();
		// 如果创建失败 表示验证没有通过 输出错误提示信息
		}
		else
		{
		$output=($Register->getError());
		$this->assign('output',$output);
		// 验证通过 可以进行其他数据操作
		$this->display();
		}
		
    }
	
	public function index()
	{	
	$Register=D("Register");
	//echo I('post.username');
	}
}
?>