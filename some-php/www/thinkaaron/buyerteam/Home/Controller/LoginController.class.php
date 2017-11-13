<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller 
{

    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function Login()
	{
		{
			$Login=D('Login');
			$data['username']=I('post.username');
			$username=$data['username'];
			$data['password']=I('post.password');
			$password=$data['password'];
			if (false !== $Login->create())
			{
			var_dump($Login);
			//echo $username;
			$result=$Login->where("username='$username'And password='$password'")->select();
			$count=count($result);
				if($count==1)
				{
				session('test','test');
				header("Location: http://16.187.224.112:8080/THINKAARON/homepage/Pages/hello.html");				
				}
				else
				{
				$output="wrong username or password";
				$this->assign('output',$output);
				$this->display();
				}
			
			// 如果创建失败 表示验证没有通过 输出错误提示信息
			}
			else
			{
			$output=($Login->getError());
			$this->assign('output',$output);
			$this->display();
			// 验证通过 可以进行其他数据操作
			}
		}
         
    }

}
?>