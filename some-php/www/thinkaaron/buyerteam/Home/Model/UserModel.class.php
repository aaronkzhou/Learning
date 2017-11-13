<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model
{
protected $_validate = array(  
      array('username', 'require', '用户名必须'),  
      //array('username','checklen','用户名长度过长或过短',0,'callback'),  
      array('username', '','用户名已经存在', 0 , 'unique', self::MODEL_INSERT),  
      array('password','require','密码必填'),  
      array('repassword','require','重复密码必填'),  
      array('password','repassword','两次密码不一致',0,'confirm'),  
      //array('userage','number','您输入的不是数字'),  
      //array('useremail','email','邮箱格式不正确'),  
    );  
}

?>