<?php
	return array(
	'DB_TYPE'   => 'mssql', // 数据库类型
	'DB_HOST'   => '16.187.224.112', // 服务器地址
	'DB_NAME'   => 'CPMOData1', // 数据库名
	'DB_USER'   => 'sa', // 用户名
	'DB_PWD'    => 'support', // 密码
	'DB_PORT'   => 1433, // 端口
	'DB_PREFIX' => 'dbo.', // 数据库表前缀 
	'DB_CHARSET'=> 'utf8', // 字符集
	'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
	'db_charset' => 'utf8',
	'LOG_RECORD'=>true,  // 进行日志记录
	//'SESSION_NAME'=>'ThinkID',\
	'SESSION_EXPIRE'=>'600',
	);
?>