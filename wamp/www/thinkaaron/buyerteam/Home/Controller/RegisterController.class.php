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
		// �������ʧ�� ��ʾ��֤û��ͨ�� ���������ʾ��Ϣ
		}
		else
		{
		$output=($Register->getError());
		$this->assign('output',$output);
		// ��֤ͨ�� ���Խ����������ݲ���
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