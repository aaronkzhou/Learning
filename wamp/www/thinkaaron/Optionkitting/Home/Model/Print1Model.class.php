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
      //array('username','checklen','�û������ȹ��������',0,'callback'),  
      //array('userage','number','������Ĳ�������'),  
      //array('useremail','email','�����ʽ����ȷ'),
    );
}
?>