<?php
session_start();
include_once "../comm/db_info.php";
$user_email=$_SESSION[user_email];
//$sql = "insert board 
$regist_day = date("Y-m-d");
//echo $_POST[subject].'<br>';
//echo $_POST[comment];
$sql = "insert into board ( id, name, nick, subject, content, regist_day, hit, ";
$sql .= " file_name_0, file_type_0, file_copied_0,  flag, get_date) ";
$sql .= " values ('$user_email', '$user_email', '$user_email', '$_POST[subject]', '$_POST[comment]', '$regist_day', 0, ";
$sql .= " '', '', '' , 3, '') ";

mysql_query($sql, $conn);
//echo $sql;
echo "
<script>
location.href='integratedQuery.php';
</script>"	
?>
