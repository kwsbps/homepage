<? session_start(); ?>

<meta charset="utf-8">
<?php
include_once "../comm/db_info.php";
	


	$email=$_POST[email];
	$check_email=preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email);

		if($check_email==false)
	{
		echo"
		<script>
		window.alert('잘못된 이메일 형식입니다.');
	     history.go(-1);
	   </script>
		";
	
	}
	
	$sql = "select mb_email from member where mb_email = '$_POST[email]'";
	$result = mysql_query($sql, $conn);
	
	if($get_result = mysql_fetch_array($result)){
	echo("
		<script>
	     window.alert('이미 존재하는 이메일입니다.');
	     history.go(-1);
	   </script>
		");
	}

	if(!($_POST[email]) || !($_POST[password])) {
		echo("
		<script>
	     window.alert('이메일과 비밀번호 모두 입력하십시요');
	     history.go(-1);
	   </script>
		");
	} 


	
	$sql1 = "select max(mb_id + 1) as max_mb_id from member";
	$result1 = mysql_query($sql1, $conn) or die('첫번째 쿼리 실패입니다.');
	$get_result1 = mysql_fetch_array($result1);
	



	//$mb_mail_cnt = $get_result[max_mb_email]; 
	$mb_id = $get_result1[max_mb_id];
	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
	$mb_pass = $_POST['password'];
    $mb_mail = $_POST['email'];
	
	
	//$sql2= "SELECT mb_email FROM member where mb_email = '$mb_mail'";
	//$result2 = mysql_query($sql2, $conn) or die('두번째 쿼리 실패입니다.');
		
	//	if(mysql_fetch_array($result2)){
	//	 echo "
	//   <script>
	//   alert('중복된 이메일 입니다.');
	//   location.href = 'http://test.30cut.com/join/enterEmail.php'; 
	//   </script>
	//"; 
	//}

	//$clean_content = htmlspecialchars($_POST[content], ENT_QUOTES);

	//$clean_content = str_replace("\r\n","<br/>",$clean_content); //줄바꿈 처리

	//$clean_content = str_replace("\u0020","&nbsp;",$clean_content); // 스페이스바 처리
		
	//DB안에 업데이트
		$sql = "insert into member (mb_id, mb_password, mb_email, mb_datetime)";
		$sql .= " values('$mb_id', '$mb_pass', '$mb_mail',  '$regist_day') ";
		
		
		mysql_query($sql, $conn) or die('글을 저장하는데 실패하였습니다.'); 
	
	mysql_close();                // DB 연결 끊기

	 echo "
	   <script>
	location.href = 'http://www.30cut.com/join/joinComplete.php'; 
	   </script>
	"; 

?>


<script>



</script>


