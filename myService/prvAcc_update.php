<?php
session_start();
$user_email = $_SESSION[user_email];
$pass = $_POST[password];
$new_pass = $_POST[new_password];
$chk_pass = $_POST[check_password];
include_once "../comm/db_info.php";

echo "<script>alert($pass + ' ' +$user_email);</script>";
echo "<script>alert($new_pass + ' ' +$chk_pass);</script>";

if($new_pass == $chk_pass){

$sql = "select mb_email, mb_password from member where mb_email = '$user_email' and mb_password ='$pass'";
$result = mysql_query($sql, $conn) or die("sql 입력실패1");
$get_result = mysql_fetch_array($result);
echo "<script>alert($get_result[mb_email] );
alert($get_result[mb_password]);</script>";

if($get_result[mb_email]) {
$sql1 = "update member set mb_password = '$new_pass' where mb_email = '$user_email'";
$result1 = mysql_query($sql1, $conn) or die("sql 입력실패2");

echo "<script>alert('비밀번호 변경 완료');location.href='/individual/indiAccountComplete.php';</script>";

}else{
echo "<script>alert('입력하신 비밀번호가 틀립니다.');history.back();</script>";
}

}else{
echo "<script>alert('새로운 비밀번호가 일치하지 않습니다.');history.back();</script>";
}

mysql_close();


?>
