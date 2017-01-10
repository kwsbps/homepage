<?php 

include_once "../comm/db_info.php";


function ErrorMessage($message, $type = "on")
{
	echo "<script> alert('$message'); ";
	if ($type == "on") echo " history.back(); ";
	echo "</script>";
	exit;
}

$ap_name =trim(strip_tags($_POST[ap_name]));
$ap_year =trim(strip_tags($_POST[ap_year]));
$ap_month =trim(strip_tags($_POST[ap_month]));
$ap_day =trim(strip_tags($_POST[ap_day]));
$ap_sex =trim(strip_tags($_POST[ap_sex]));
$ap_email =trim(strip_tags($_POST[ap_email]));
$ap_hope =trim(strip_tags($_POST[ap_hope]));
$ap_hp1 =trim(strip_tags($_POST[ap_hp1])); 
$ap_hp2 =trim(strip_tags($_POST[ap_hp2])); 
$ap_hp3 =trim(strip_tags($_POST[ap_hp3])); 
$ap_due =trim(strip_tags($_POST[ap_due]));
$ap_rb =trim(strip_tags($_POST[ap_rb]));
$ap_rb1 =trim(strip_tags($_POST[ap_rb1]));
$ap_rb2 =trim(strip_tags($_POST[ap_rb2]));
$ap_credit_1 =trim(strip_tags($_POST[ap_credit_1]));
$ap_credit_2 =trim(strip_tags($_POST[ap_credit_2]));
$ap_credit_3 =trim(strip_tags($_POST[ap_credit_3]));
$ap_card_1 =trim(strip_tags($_POST[ap_card_1]));
$ap_card_2 =trim(strip_tags($_POST[ap_card_2]));
$ap_card_3 =trim(strip_tags($_POST[ap_card_3]));
$ap_cash_1 =trim(strip_tags($_POST[ap_cash_1]));
$ap_cash_2 =trim(strip_tags($_POST[ap_cash_2]));
$ap_cash_3 =trim(strip_tags($_POST[ap_cash_3]));
$ap_house_1 =trim(strip_tags($_POST[ap_house_1]));
$ap_house_2 =trim(strip_tags($_POST[ap_house_2]));
$ap_house_3 =trim(strip_tags($_POST[ap_house_3]));
$ap_lent_1 =trim(strip_tags($_POST[ap_lent_1]));
$ap_lent_2 =trim(strip_tags($_POST[ap_lent_2]));
$ap_lent_3 =trim(strip_tags($_POST[ap_lent_3]));
$ap_loan_1 =trim(strip_tags($_POST[ap_loan_1]));
$ap_loan_2 =trim(strip_tags($_POST[ap_loan_2]));
$ap_loan_3 =trim(strip_tags($_POST[ap_loan_3]));
$ap_etc_1 =trim(strip_tags($_POST[ap_etc_1]));
$ap_etc_2 =trim(strip_tags($_POST[ap_etc_2]));
$ap_etc_3 =trim(strip_tags($_POST[ap_etc_3]));


$ip = $_SERVER["REMOTE_ADDR"];


if($ap_sex == "1"){
$sex = "남자";
}else{
$sex = "여자";
}

$rs_count=mysql_query("SELECT nextmng FROM reservation where nextmng is not null order by r_no desc ",$conn);
$rs_row=mysql_fetch_row($rs_count);

$nextmng = $rs_row[0];

if($nextmng == "kdr"){
   $nextmng_val = "BP00006";  
   $nextmng_nick = "kjs";
}else if($nextmng == "kjs"){
   $nextmng_val = "BP00016"; 
   $nextmng_nick = "nbr";
}else if($nextmng == "nbr"){
   $nextmng_val = "BP00017"; 
   $nextmng_nick = "kdr";
}


if($sex) $ap_contents = "성별:".$sex."</br>";
if($ap_year) $ap_contents .= "생년월일:".$ap_year.$ap_month.$ap_day."</br>";
if($ap_hope) $ap_contents .= "희망 대출액:".$ap_hope."</br>";
if($ap_card_2) $ap_contents .= "카드론 : ".$ap_card_2."건".$ap_card_3."만원"."</br>";
if($ap_cash_2) $ap_contents .= "현금서비스리볼빙 : ".$ap_cash_2."건".$ap_cash_3." 만원"."</br>";
if($ap_house_2) $ap_contents .= "주택담보 : ".$ap_house_2."건".$ap_house_3." 만원"."</br>";
if($ap_lent_2) $ap_contents .= "전세자금 : ".$ap_lent_2."건".$ap_lent_3." 만원"."</br>";
if($ap_credit_2) $ap_contents .= "금융권 신용대출  : ".$ap_credit_2."건".$ap_credit_3." 만원"."</br>";
if($ap_etc_2) $ap_contents .= "저축은행 캐피탈등  : ".$ap_etc_2."건".$ap_etc_3." 만원"."</br>";
if($ap_loan_2) $ap_contents .= "대부업  : ".$ap_loan_2."건".$ap_loan_3." 만원";
echo $ap_contents;


/*
$ap_contents = "성별:".$sex."</br>"."생년월일:".$ap_year.$ap_month.$ap_day."</br>"."희망 대출액액:".$ap_hope."</br>"."카드론 : ".$ap_card_2."건".$ap_card_3."만원"."</br>"."현금서비스리볼빙 : ".$ap_cash_2."건".$ap_cash_3."만원"."</br>"."주택담보 : ".$ap_house_2."건".$ap_house_3."만원"."</br>"."전세자금 : ".$ap_lent_2."건".$ap_lent_3."만원"."</br>"."금융권 신용대출  : ".$ap_credit_2."건".$ap_credit_3."만원"."</br>"."저축은행 캐피탈등  : ".$ap_etc_2."건".$ap_etc_3."만원"."</br>"."대부업  : ".$ap_loan_2."건".$ap_loan_3."만원";
*/
$ap_tel = $ap_hp1.$ap_hp2.$ap_hp3;

$sql = "insert into reservation(";
$sql .= "r_member,";
$sql .= "r_name,";
$sql .= "r_email,";
$sql .= "r_tel,";
$sql .= "r_content,";
$sql .= "r_ip,";
$sql .= "r_datetime,flag,call_sabun,nextmng) values (";
$sql .= "'1',";
$sql .= "'".$ap_name."',";
$sql .= "'".$ap_email."',";
$sql .= "'".$ap_tel."',";
$sql .= "'".$ap_contents."',";
$sql .= "'$ip',now(),'1','$nextmng_val','$nextmng_nick')";
$rs_1=mysql_query($sql,$conn)or die(' 저장하는데 실패하였습니다.');

if($rs_1){
?>
 <meta http-equiv='refresh' content='0;url=/loan/loanComplete.php'>
<?php
}else{
 ErrorMessage('대단히 죄송합니다. 오류로인해 다시 대출신청해주세요.');	
}
?>
