<?php
namespace Home\Model;
use Think\Model;
class LoginModel extends Model

{	
	protected $tableName = 'register'; 
	protected $_validate = array
	(
      array('username', 'require', 'username is a must'),  
      //array('username','checklen','用户名长度过长或过短',0,'callback'),  
      array('password','require','password is a must'),  
      //array('userage','number','您输入的不是数字'),  
      //array('useremail','email','邮箱格式不正确'),
    );
}
?>