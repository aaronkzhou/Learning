<?php

namespace Home\Model;
use Think\Model;
class Print1Model extends Model
{
	protected $tableName = 'Print1'; 
	protected $_validate = array
	(
      array('PN', 'require', 'part number is a must'),  
	  array('SN','require','serial number is a must'),
      //array('username','checklen','用户名长度过长或过短',0,'callback'),  
      //array('userage','number','您输入的不是数字'),  
      //array('useremail','email','邮箱格式不正确'),
    );
}
?>