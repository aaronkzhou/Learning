<?php

namespace Home\Model;
use Think\Model;
class InsertModel extends Model
{
    protected $connection = array
	(
        'DB_TYPE'   => 'mssql', // 数据库类型
		'DB_HOST'   => 'localhost', // 服务器地址
		'DB_NAME'   => 'CPMOData1', // 数据库名
		'DB_USER'   => 'sa', // 用户名
		'DB_PWD'    => 'support', // 密码
		'DB_PORT'   => 3306, // 端口
		'DB_PREFIX' => '', // 数据库表前缀 
		'DB_CHARSET'=> 'utf8', // 字符集
		'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
    );
}
?>