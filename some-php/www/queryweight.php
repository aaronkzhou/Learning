
<html>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<div style="text-align:center;color:#CE0000;">
 <h1 style="font-family:simhei">��ѯBOXID��ǰ��50��������¼</h1>
</div>
<table width="40%" border="1" cellspacing="0" cellpadding="0"
style="width:60%;margin-left:280px;font-family: sans-serif">
<tr>
<th>BOXID</th>
<th>����</th>
<?php 

	error_reporting(E_ALL ^ E_NOTICE^E_DEPRECATED^E_WARNING); 
	ignore_user_abort();//�ص��������PHP�ű�Ҳ���Լ���ִ��.
    set_time_limit(0);// ͨ��set_time_limit(0)�����ó��������Ƶ�ִ����ȥ
	$tag=$_POST['boxid'];
	$tag=trim($tag);
	$hostname="16.187.224.111"; //MSSQL��������IP��ַ �� ������������ 
	$dbuser="keren"; //MSSQL���������ʺ� 
	$dbpasswd="keren123"; //MSSQL������������ 
	$dbname="PLOdb"; //���ݿ������
	$conn = mssql_connect($hostname,$dbuser,$dbpasswd); //����MSSQL 
	mssql_select_db($dbname); /*����Ҫ���ʵ����ݿ� ����Ҳ����д�� $db=mssql_select_db($dbname,$conn);*/ 
	$sql = "select MEMBERID
	from dbo.KitWeight 
	where Name='$tag'
	"; //sql��� 
	$result = mssql_query($sql);
	$ID=mssql_result($result,0,0);
	$before=$ID-50;
	$after=$ID+50;
	$sql="select Name, Weight
	from dbo.kitWeight
	where MEMBERID<'$after'AND MEMBERID>'$before'";
	$result=mssql_query($sql);
while($row1=mssql_fetch_assoc($result))
{
extract($row1);
echo "<tr>";
echo "<th>$Name</th>";
echo "<th>$Weight</th>";
echo "</tr>";
}
?>
</table>
