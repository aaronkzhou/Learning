<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller 
{
    public function index()
	{
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function Uploadfile()
	{
		if (!empty($_FILES))

			import('ORG.Net.UploadFile');
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize  = 31457280 ;// 设置附件上传大小
			$upload->exts     = array('jpg');// 设置附件上传类型
			$upload->rootPath =      './buyerteam/Home/View/Prekit1/pics/'; // 设置附件上传根目录
			$upload->savePath =  '';// 设置附件上传目录
			$upload->thumbRemoveOrigin = true;
			$upload->saveName = array('','');
			if(!$upload->upload())
			{
            $this->error($upload->getError());
			}
			else
			{
            $this->success('upload successfully');
           //获取上传文件的信息
            foreach($info as $file)
			{
			echo $file['savepath'].$file['savename'];
			}
			}
	}
}