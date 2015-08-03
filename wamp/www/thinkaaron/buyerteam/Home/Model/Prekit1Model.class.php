<?php
namespace Home\Model;
use Think\Model;
class Prekit1Model extends Model
{	
	protected $tableName = 'Prekit1'; 
	protected $_validate = array
	(
      array('ZMODPN','require', 'ZMOD PN# is a must'),  
	  array('RAWPN','require', 'RAW PN# is a must'), 
	  array('COMPN','require', 'COM PN# is a must'), 
	  array('SCREWPN','require', 'SCREw PN# is a must'), 
	  array('CARRIERPN','require', 'CARRIER PN# is a must'), 
      //array('username','checklen','用户名长度过长或过短',0,'callback'),  
      //array('RAWPN1','require','RAWPN is a must'),  
      //array('PERCENTAGE','require','PERCENTAGE is a must'),
      //array('useremail','email','邮箱格式不正确'),
    );
}
?>