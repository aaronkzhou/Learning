<?php
//include "../Classes/simple_html_dom.php";
$db=mysql_connect('localhost','root','') or die('unable to connect.check your connection prameters.');
mysql_select_db('picklist',$db) or die(mysql_error($db));
$wo=$_GET['input_wo'];
if(trim($wo)=="")
{
                echo '<script>alert(\'please input unit WO!\');</script>';
                echo '<script>window.location.href=\'homePage.php?\';</script>';
                exit();
}
$html = file_get_contents('http://shopfloor.asiapac.hp.com/sfweb/QuickSearch?object='.$wo);
if(strstr($html,'BF20_TSG_FPIA'))
{
                echo '<script>window.location.href=\'obaCheck.php?isoba=1\';</script>';
}
else
{
                //$html->clear();
                echo '<script>window.location.href=\'obaCheck.php?isoba=0\';</script>';
}

?>
