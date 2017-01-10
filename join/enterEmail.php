<?php include('../include/incTop.php'); ?>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
<?php include('../include/incHeader.php'); ?>

<? session_start(); ?>

<meta charset="utf-8">
<?php
include_once "../comm/db_info.php";
	


$email=$_POST[email];

if($email != "") {
	$check_email=preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email);
	//$check_email=preg_match("/^.*(?=^.{6,15}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/", $email);
	
///^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{6,16}$/
		if($check_email==false)
	{
		echo"
		<script>
		window.alert('잘못된 이메일 형식입니다.');
	    location.href = '/join/enterEmail.php'; 
	   </script>
		";
	
	}

	$sql = "select mb_email from member where mb_email = '$email'";
	$result = mysql_query($sql, $conn);
	
	if($get_result = mysql_fetch_array($result)){
	echo("
		<script>
	     window.alert('이미 존재하는 이메일입니다.');
	    location.href = '/join/enterEmail.php'; 
	   </script>
		");
	}

	if(!($_POST[email]) || !($_POST[password])) {
		echo("
		<script>
	     window.alert('이메일과 비밀번호 모두 입력하십시요');
	     location.href = '/join/enterEmail.php'; 
	   </script>
		");
	} 


	
	$sql1 = "select max(mb_id + 1) as max_mb_id from member";
	$result1 = mysql_query($sql1, $conn) or die('첫번째 쿼리 실패입니다.');
	$get_result1 = mysql_fetch_array($result1);
	

	$mb_id = $get_result1[max_mb_id];
	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
	$mb_pass = $_POST['password'];
	
 if(preg_match("/^.*(?=^.{8,15}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/",$mb_pass)){

 }else{

   echo("
		<script>
	     window.alert('암호는 최소 8자에서 최대15까지의 영문자와 특수문자가 포함된 조합이어야 합니다.');
	     location.href = '/join/enterEmail.php'; 
	   </script>
		");	
  }

if(!($get_result = mysql_fetch_array($result)) && preg_match("/^.*(?=^.{8,15}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/",$mb_pass)){
    $mb_mail = $email;
	$sql = "insert into member (mb_id, mb_password, mb_email, mb_datetime)";
	$sql .= " values('$mb_id', '$mb_pass', '$mb_mail',  '$regist_day') ";
		
		
	mysql_query($sql, $conn) or die('글을 저장하는데 실패하였습니다.'); 
	mysql_close();                // DB 연결 끊기

	 echo "
	   <script>
	location.href = '/join/joinComplete.php'; 
	   </script>
	"; 
	}
} else{

?>

<!-- sub-wrap -->
<div class="sub-wrap join">
	<!-- visual -->
	<!-- .page-content start -->
	<div class="page-content dark custom-img-background page-title-1 page-title sub-visual">
		<div class="container">
			<!-- .row start -->
			<div class="row">
				<!-- .col-md-12 start -->
				<div class="col-md-12 triggerAnimation animated" data-animate='fadeInUp'>
					<!-- .simple-heading start -->
					<div class="simple-heading mb-30">
						<h1>회원가입</span></h1>
					</div><!-- .simple-heading end -->
					<ul class="breadcrumb">
						<li><a href="/index.php">Home</a></li>
						<li><span class="active">회원가입</span></li>
					</ul><!-- .breadcrumb end -->
				</div><!-- .col-md-12 end -->
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div><!-- .page-content end -->
	<!-- //visual -->

	<!-- .page-content start -->
	<div class="cont-type1 bg-type2 centered">
		<div class="container">
			<!-- .row start -->
			<div class="row mb-30">
				<!-- .col-md-12 start -->
				<div class="col-md-12 triggerAnimation animated" data-animate='fadeInUp'>
					<section class="simple-heading">
						<h2>30CUT 회원가입</h2>
					</section>
				</div><!-- .col-md-12 end -->
			</div><!-- .row end -->
			<!-- .row start -->
			<div class="row">
				<div class="login-cont">
					<div class="login-area">
						<!--<div class="btn-area centered">
							<a class="btn btn-big btn-centered btn-facebook" href="javascript:checkLoginState();">
								<span>페이스북 계정으로 가입</span>
							</a>
						</div>
						<p>
						또는</p>-->
						 <!-- form start -->
						<form class="wpcf7" method="post" name="frm" id="frm">

							<fieldset>
								<span class="wpcf7-form-control-wrap your-email">
									<input type="text" name="email" class="wpcf7-text" id="email" placeholder="Email 주소"  required style="border-bottom:1px solid #f26c5e">
								</span>
							</fieldset>

							<fieldset>
								<span class="wpcf7-form-control-wrap subject">
									<input type="text" class="wpcf7-text" id="password" name="password" placeholder="비밀번호" required style="border-bottom:1px solid #f26c5e">
								</span>
							</fieldset>
							<!-- <p class="copypoint">잘못 된 형식의 메일 주소입니다.</p> -->
							
						
							<div class="btn-area">
								<a class="btn btn-big btn-centered btn-type1" onclick="submit_account()">
									<span>회원가입</span>
								</a>
							</div>

							<p class="copypoint">문자와 특수문자가 각각 하나 이상 포함된 8자 이상 15자 이하의 비밀번호를 입력하세요. </p>
							<p>회원가입을 하시면 <a href="/etc/terms.php">이용약관</a>과<br /> <a href="/etc/privacy.php">개인정보취급방침</a>에 동의하게 됩니다.</p>
						</form><!-- .wpcf7 end -->
					</div>
					

					<div class="forget-area">
						<dl>
							<dt>이미 회원이세요?</dt>
							<dd><a href="/login/login.php">로그인</a></dd>
						</dl>
						<dl>
							<dt>회원정보를 잊으셨나요?</dt>
							<dd><a href="/login/findID.php">회원정보 찾기</a></dd>
						</dl>
						<!--<dl>
							<dt>아이디를 잊으셨나요?</dt>
							<dd><a href="/login/findID.php">아이디 찾기</a></dd>
						</dl>
						<dl>
							<dt>비밀번호를 잊으셨나요?</dt>
							<dd><a href="/login/findPW.php">비밀번호 찾기</a></dd>
						</dl>-->
						<p>관리자문의 : admin@30cut.com<br />전화번호 : 1661-0301</p>
					</div>
				</div>
			</div><!-- .row end -->
		   
		</div><!-- .container end -->
	</div><!-- .page-content end -->

</div>
<!-- // sub-wrap -->
<?
}
?>
<?php include('../include/incFooter.php'); ?>

<script src="/js/jquery-2.1.4.min.js"></script><!-- jQuery library -->
<script src="/js/bootstrap.min.js"></script><!-- .bootstrap script -->
<script src="/js/jquery.scripts.min.js"></script><!-- modernizr, retina, stellar for parallax -->  
<script src='/owl-carousel/owl.carousel.min.js'></script><!-- Carousels script -->
<script src="/js/jquery.dlmenu.min.js"></script><!-- for responsive menu -->
<script src="/js/include.js"></script><!-- custom js functions -->
<script>
function submit_account(){
document.frm.action="enterEmail.php";
document.frm.submit();	
}
</script>
<script>


	/* <![CDATA[ */
	jQuery(document).ready(function ($) {
		'use strict';

		$('#owl-testimonial').owlCarousel({
			items: 5,
			navigation: true,
			pagination: false,
			navigationText: ["", ""],
			itemsCustom: [
				[0, 1],
				[600, 1],
				[800, 1],
				[1000, 2],
				[1200, 2]
			]
		});

		// CLIENTS CAROUSEL START
		$('#client-carousel').owlCarousel({
			items: 5,
			navigation: true,
			pagination: false,
			navigationText: ["", ""],
			itemsCustom: [
				[0, 2],
				[600, 3],
				[1000, 5],
				[1200, 5]
			]
		});

	});
	/* ]]> */
</script>





</body>
</html>
