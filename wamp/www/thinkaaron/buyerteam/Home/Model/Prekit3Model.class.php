<?php
namespace Home\Model;
use Think\Model;
class Prekit1Model extends Model
{	
	protected $tableName = 'Prekit3'; 
	protected $_validate = array
	(
      array('ZMODPN','require', 'ZMOD PN# is a must'),  
	  array('KEYPN','require', 'KEYMAT PN# is a must'), 
      //array('username','checklen','�û������ȹ��������',0,'callback'),  
      //array('RAWPN1','require','RAWPN is a must'),  
      //array('PERCENTAGE','require','PERCENTAGE is a must'),
      //array('useremail','email','�����ʽ����ȷ'),
    );
}
?>