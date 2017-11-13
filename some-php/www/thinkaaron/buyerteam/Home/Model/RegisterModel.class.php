<?php
namespace Home\Model;
use Think\Model;
class RegisterModel extends Model

{	
	protected $tableName = 'register'; 
	protected $_validate = array
	(
      array('username', 'require', 'username is a must'),  
      //array('username','checklen','用户名长度过长或过短',0,'callback'),  
      array('password','require','password is a must'),  
	  array('username','','the username is already exist',0,'unique',1),
      array('repassword','require','re-password is a must'),  
      array('password','repassword','two different passwords',0,'confirm')
      //array('userage','number','您输入的不是数字'),  
      //array('useremail','email','邮箱格式不正确'),
    );
}
?>