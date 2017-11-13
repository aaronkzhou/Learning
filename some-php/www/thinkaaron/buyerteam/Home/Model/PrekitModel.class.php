<?php
namespace Home\Model;
use Think\Model;
class PrekitModel extends Model
{	
	protected $tableName = 'Prekit'; 
	protected $_validate = array
	(
      array('PLO','require', 'PLO is a must'),  
      //array('username','checklen','用户名长度过长或过短',0,'callback'),  
      array('SO','require','SO is a must'),  
      array('HDD_KMAT_PART','require','HDD_KMAT_PART is a must'),  
      array('ITEM_NO','require','ITEM_NO is a must'),  
      array('KITTED_DRIVE_QTY','require','KITTED_DRIVE_QTY is a must'),  
      array('PRE_KITDATE','require','PRE_KITDATE is a must'),
	  array('PLO','','the PLO is already exist',0,'unique',1),
      array('KITTED_DRIVE_QTY','number','Pls input number for QTY'),  
      //array('useremail','email','邮箱格式不正确'),
    );
}
?>