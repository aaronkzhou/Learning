<?php

namespace Home\Model;
use Think\Model;
class InsertModel extends Model
{
    protected $connection = array
	(
        'DB_TYPE'   => 'mssql', // ���ݿ�����
		'DB_HOST'   => 'localhost', // ��������ַ
		'DB_NAME'   => 'CPMOData1', // ���ݿ���
		'DB_USER'   => 'sa', // �û���
		'DB_PWD'    => 'support', // ����
		'DB_PORT'   => 3306, // �˿�
		'DB_PREFIX' => '', // ���ݿ��ǰ׺ 
		'DB_CHARSET'=> 'utf8', // �ַ���
		'DB_DEBUG'  =>  TRUE, // ���ݿ����ģʽ ��������Լ�¼SQL��־ 3.2.3����
    );
}
?>