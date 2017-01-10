<?php include('../include/incTop.php'); ?>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
<?php include('../include/incHeader.php'); ?>
<?php
session_start();
include_once "../comm/db_info.php";
?>



<!-- sub-wrap -->
<div class="sub-wrap login">
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
						<h1>로그인</h1>
					</div><!-- .simple-heading end -->
					<ul class="breadcrumb">
						<li><a href="/index.php">Home</a></li>
						<li><span class="active">로그인</span></li>
					</ul><!-- .breadcrumb end -->
				</div><!-- .col-md-12 end -->
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div><!-- .page-content end -->
	<!-- //visual -->

	<!-- .page-content start -->
	<div class="cont-type1 bg-type5 centered">
		<div class="container">
			<!-- .row start -->
			<div class="row mb-30">
				<!-- .col-md-12 start -->
				<div class="col-md-12 triggerAnimation animated" data-animate='fadeInUp'>
					<section class="simple-heading">
						<h2>30CUT 로그인</h2>
					</section>
				</div><!-- .col-md-12 end -->
			</div><!-- .row end -->

<?php
if(!($_POST[email])){
?>	



	<!-- .row start -->
			<div class="row">
				<div class="login-cont">
					<div class="login-area">
						<!--<div class="btn-area centered">
							<a class="btn btn-big btn-centered btn-facebook" href="javascript:FB.login();">
								<span>페이스북 계정으로 로그인</span>
							</a>
						</div>
						<p>또는</p>-->
						 <!-- form start -->
						<form class="wpcf7" method="post" id="frm" action="login.php">

							<fieldset>
								<span class="wpcf7-form-control-wrap your-email">
									<input type="email" name="email" class="wpcf7-text" id="email" placeholder="Email 주소">
								</span>
							</fieldset>

							<fieldset>
								<span class="wpcf7-form-control-wrap subject">
									<input type="password" class="wpcf7-text" id="password" name="password" placeholder="비밀번호">
								</span>
							</fieldset>
							
							<p class="copypoint">이메일 주소와 비밀번호를 입력하세요.</p>
							
							<div class="btn-area">
								<a class="btn btn-big btn-centered btn-type1" href="#" onclick="submit_account()">
									<span>로그인</span>
								</a>
							</div>
						</form><!-- .wpcf7 end -->
					</div>

					
				

<?php
} else {


	$sql="select mb_email, mb_password from member where mb_email ='$_POST[email]'";
	$result = mysql_query($sql, $conn) or die("sql 입력실패");
	$get_result =  mysql_fetch_array($result);

if(!($get_result[mb_email])) {
 echo "<script>
	alert('존재하지 않는 이메일 입니다.');
	location.href ='login.php';
	</script> "; 
	return;
} else if (!($get_result[mb_password] == $_POST[password] )) {


echo "<script>
	alert('입력하신 비밀번호가 틀립니다.');
	location.href ='login.php';
	</script> "; 
	return;
} else if (($get_result[mb_email]==$_POST[email]) && ($get_result[mb_password]==$_POST[password])) {
	

	 $_SESSION['user_email'] = $_POST[email];
		echo "
		<script>		
		location.href ='/index.php';
		</script>";
	
	}
	else{
	echo "<script>
	alert('입력하신 정보가 정확하지 않습니다.');
	location.href ='login.php';
	</script>";
	return;
	}
}


?>



					<div class="forget-area">
						<dl>
							<dt>회원정보를 잊으셨나요?</dt>
							<dd><a href="/login/findID.php">회원정보 찾기</a></dd>
						</dl>
						<!--<dl>
							<dt>비밀번호를 잊으셨나요?</dt>
							<dd><a href="/login/findPW.php">비밀번호 찾기</a></dd>
						</dl>-->
						<p>관리자문의 : admin@30cut.com<br />전화번호 : 1661-0301</p>
						
<!--<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status">
</div>-->
					</div>
				</div>
	
			</div><!-- .row end -->
		   
		</div><!-- .container end -->
	</div><!-- .page-content end -->

</div>
<!-- // sub-wrap -->

<?php include('../include/incFooter.php'); ?>

<script src="/js/jquery-2.1.4.min.js"></script><!-- jQuery library -->
<script src="/js/bootstrap.min.js"></script><!-- .bootstrap script -->
<script src="/js/jquery.scripts.min.js"></script><!-- modernizr, retina, stellar for parallax -->  
<script src='/owl-carousel/owl.carousel.min.js'></script><!-- Carousels script -->
<script src="/js/jquery.dlmenu.min.js"></script><!-- for responsive menu -->
<script src="/js/include.js"></script><!-- custom js functions -->

<script>

function submit_account(){
	
document.getElementById('frm').submit();
}
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

<script type="text/javascript">  
//페이스북 SDK 초기화   
window.fbAsyncInit = function() {  
    FB.init({appId: '1090914850992066', status: true, cookie: true,xfbml: true});      
};  
      
(function(d){  
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];  
   if (d.getElementById(id)) {return;}  
   js = d.createElement('script'); js.id = id; js.async = true;  
   js.src = "//connect.facebook.net/en_US/all.js";  
   ref.parentNode.insertBefore(js, ref);  
 }(document));     
              
function facebooklogin() {  
    //페이스북 로그인 버튼을 눌렀을 때의 루틴.  
        FB.login(function(response) {  
            var fbname;  
            var accessToken = response.authResponse.accessToken;  
        }, {scope: 'publish_stream,user_likes'});  
}  
</script>  
<!--<div onclick="facebooklogin()" style="cursor: pointer;">  
    <img src="./res/fbloginbutton.jpg">  
</div>-->  
</body>
</html>
