<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model
{
protected $_validate = array(  
      array('username', 'require', '�û�������'),  
      //array('username','checklen','�û������ȹ��������',0,'callback'),  
      array('username', '','�û����Ѿ�����', 0 , 'unique', self::MODEL_INSERT),  
      array('password','require','�������'),  
      array('repassword','require','�ظ��������'),  
      array('password','repassword','�������벻һ��',0,'confirm'),  
      //array('userage','number','������Ĳ�������'),  
      //array('useremail','email','�����ʽ����ȷ'),  
    );  
}

?>