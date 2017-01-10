
<?php include('../include/incTop.php'); ?>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
<?php include('../include/incHeader.php'); 

session_start();
include_once "../comm/db_info.php";

$user_email = $_SESSION['user_email'];
$pass = $_POST[password];
$new_pass = $_POST[new_password];
$chk_pass = $_POST[check_password];
if($pass) {

if($new_pass == $chk_pass) {

$sql = "select mb_email, mb_password from member where mb_email = '$user_email' and mb_password ='$pass'";
$result = mysql_query($sql, $conn) or die("sql 입력실패1");
$get_result = mysql_fetch_array($result);

if($get_result[mb_email]) {
$sql1 = "update member set mb_password = '$new_pass' where mb_email = '$user_email'";
$result1 = mysql_query($sql1, $conn) or die("sql 입력실패2");

echo "<script>alert('비밀번호 변경 완료');location.href='/individual/indiAccountComplete.php';</script>";

}else{
echo "<script>alert('입력하신 비밀번호가 틀립니다.');location.href = '/join/privacyAccount.php';</script>";
}

}else{
echo "<script>alert('새로운 비밀번호가 일치하지 않습니다.');location.href = '/join/privacyAccount.php';</script>";
}

mysql_close();


}else if($user_email){
?>

<!-- sub-wrap -->
<div class="sub-wrap myService">
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
						<h1>개인정보 및 계좌정보<span>개인정보 및 계좌정보를 확인 할 수 있습니다.</span></h1>
					</div><!-- .simple-heading end -->
					<ul class="breadcrumb">
						<li><a href="/index.php">Home</a></li>
						<li>MY 서비스</li>
						<li><span class="active">개인정보 및 계좌정보 입력</span></li>
					</ul><!-- .breadcrumb end -->
				</div><!-- .col-md-12 end -->
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div><!-- .page-content end -->
	<!-- //visual -->

	<div class="cont-type1 bg-type5">
		<div class="container">

			<form id="frm" method="post" action="privacyAccount.php">
			<div class="box-cont2 mt-40">
				<h3 class="tit04">계정정보</h3>
				<p class="copy4">기존 비밀번호와 변경하실 비밀번호를 입력하십시요. </p>
				<div class="form-wrap form-type1">
					<dl>
						<dt><strong>*</strong> 이메일</dt>
						<dd><span class="inblock"><?=$user_email?></span></dd>
					</dl>
					<dl>
						<dt><strong>*</strong> 기존 비밀번호</dt>
						<dd><input type="password" id="password" name ="password" placeholder="기존 비밀번호" />
						

						</dd>
					</dl>
					<dl>
						<dt><strong>*</strong> 비밀번호 변경</dt>
						<dd><input type="password" id="new_password" name ="new_password"placeholder="새로운 비밀번호" /></dd>
					</dl>
					<dl>
						<dt><strong>*</strong> 비밀번호 확인</dt>
						 <dd><input type="password" id="check_password" name="check_password" placeholder="새로운 비밀번호 확인" />
							<!--<p><span class="inblock"><input type="checkbox" /> 이메일 수신</span><span class="inblock"><input type="checkbox" /> SMS 수신</span></p> -->
						</dd>
					</dl>
				</div>
				<div class="btn-area">
					<a class="btn btn-big btn-centered btn-type1" onclick ="submit_account()">
						<span>계정정보 저장하기</span>
					</a>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- // sub-wrap -->

<?
} else {

echo "<script>
alert('로그인이 필요한 서비스입니다.');
location.href = '/login/login.php';
</script>";

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
document.getElementById('frm').submit();
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

