<?php

namespace Home\Model;
use Think\Model;
class PrintModel extends Model
{
    protected $connection = array
	(
        'DB_TYPE'   => 'mssql', // ���ݿ�����
		'DB_HOST'   => 'localhost', // ��������ַ
		'DB_NAME'   => 'CPMOData1', // ���ݿ���
		'DB_USER'   => 'sa', // �û���
		'DB_PWD'    => 'support', // ����
		'DB_PORT'   => 1433, // �˿�
		'DB_PREFIX' => '', // ���ݿ��ǰ׺ 
		'DB_CHARSET'=> 'utf8', // �ַ���
		'DB_DEBUG'  =>  TRUE, // ���ݿ����ģʽ ��������Լ�¼SQL��־ 3.2.3����
    );
	protected $_validate = array
	(
      array('PN', 'require', 'part number is a must'),  
      //array('username','checklen','�û������ȹ��������',0,'callback'),  
      //array('userage','number','������Ĳ�������'),  
      //array('useremail','email','�����ʽ����ȷ'),
    );
}
?>