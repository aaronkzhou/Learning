<?php
namespace Home\Model;
use Think\Model;
class LoginModel extends Model

{	
	protected $tableName = 'register'; 
	protected $_validate = array
	(
      array('username', 'require', 'username is a must'),  
      //array('username','checklen','�û������ȹ��������',0,'callback'),  
      array('password','require','password is a must'),  
      //array('userage','number','������Ĳ�������'),  
      //array('useremail','email','�����ʽ����ȷ'),
    );
}
?>