<?php 
//����SQL server���ݿ�
$mssql=mssql_connect("16.187.224.110","sa","123456");        //����������,�û���,����
mssql_select_db("rework",$mssql);          //����sqlserver���ݿ�
//connect the mysql database
$mysql=mysql_connect("localhost","root","");    //���ط�����localhost,�û���root,����root
mysql_select_db("widdb",$mysql); 
mysql_query("SET NAMES utf8"); 
if($mssql)
{
     echo "successful1!";
}
if($mysql)
{
	 echo "successful2!";
}
$sqlserver = odbc_connect('test1', 'sa', '123456');

foreach ($tables as $tabs) {
    $sql_server="";
    //fb::log($tabs);
    $sdbtable = $tabs['ms'];        //����,sqlserver
    $mdbtable = $tabs['my'];


    $sql_server = "SELECT * FROM " . $sdbtable;
    $result_sqlserver = odbc_do($sqlserver, $sql_server) or die("SQL Error");
    $fields=null;
    for ($i = 1; $i <= odbc_num_fields($result_sqlserver); $i++) {
        $fields[$i - 1]['fieldname'] = odbc_field_name($result_sqlserver, $i);
        $fields[$i - 1]['fieldtype'] = odbc_field_type($result_sqlserver, $i);
        $fields[$i - 1]['fieldlength'] = odbc_field_len($result_sqlserver, $i);
        if ($fields[$i - 1]['fieldlength'] == 0 && $fields[$i - 1]['fieldtype'] == 'nvarchar') {
            $fields[$i - 1]['newfieldname'] = 'convert(text,' . $fields[$i - 1]['fieldname'] . ')as ' . $fields[$i - 1]['fieldname'];
        } else {
            $fields[$i - 1]['newfieldname'] = $fields[$i - 1]['fieldname'];
        }
    }
?>