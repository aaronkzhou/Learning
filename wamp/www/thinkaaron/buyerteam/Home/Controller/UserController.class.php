<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller 
{
    public function index()
	{
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "΢���ź�"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>��ӭʹ�� <b>ThinkPHP</b>��</p><br/>[ �����ڷ��ʵ���Homeģ���Index������ ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function Uploadfile()
	{
		if (!empty($_FILES))

			import('ORG.Net.UploadFile');
			$upload = new \Think\Upload();// ʵ�����ϴ���
			$upload->maxSize  = 31457280 ;// ���ø����ϴ���С
			$upload->exts     = array('jpg');// ���ø����ϴ�����
			$upload->rootPath =      './buyerteam/Home/View/Prekit1/pics/'; // ���ø����ϴ���Ŀ¼
			$upload->savePath =  '';// ���ø����ϴ�Ŀ¼
			$upload->thumbRemoveOrigin = true;
			$upload->saveName = array('','');
			if(!$upload->upload())
			{
            $this->error($upload->getError());
			}
			else
			{
            $this->success('upload successfully');
           //��ȡ�ϴ��ļ�����Ϣ
            foreach($info as $file)
			{
			echo $file['savepath'].$file['savename'];
			}
			}
	}
}