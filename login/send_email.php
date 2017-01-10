<?php include('../include/incTop.php'); ?>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
<?php include('../include/incHeader.php'); ?>

<?
include_once "../comm/db_info.php";
$query = "select * from member where mb_email = '$_POST[info2]' ";
$result = mysql_query($query, $conn );

if ($row = mysql_fetch_array($result)) {
$check = $_POST[info1];
$from = 'admin@30cut.com';
$content = '인증번호는'.$_POST[info1].'입니다. 정확히 입력하시길 바랍니다.';
$subject = '30cut 비밀번호 찾기 인증메일';
$email = $_POST[info2];

$nan = getString();
$nan = substr($nan,0,8);
$password = $nan;

$query ="update member set mb_password = '$password' where  mb_email = '$email'";
mysql_query($query, $conn );
mail($email, $subject, $content, 'from : '.$from);


} else {
echo "<script>alert('존재하지 않거나 잘못된 이메일입니다.');history.back();</script>";
}

function getString($length = 32) { 
$text = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; 
$text = str_shuffle($text); 

$res = ''; 
$len = strlen($text) - 1; 
for($i = 0; $i < $length; $i ++) { 
$res .= $text[rand(0, $len)]; 
} 
return $res; 
}




?>
<form id="send_mail" method="post">
<input type="hidden" value="<?=$password?>" id="info1" name="info1">
<input type="hidden" value="<?=$email?>" id="info2" name="info2">
</form>

<!-- sub-wrap -->
<div class="sub-wrap aboutUs">
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
						<h1>아이디 찾기</h1>
					</div><!-- .simple-heading end -->
					<ul class="breadcrumb">
						<li><a href="/index.php">Home</a></li>
						<li>로그인</li>
						<li><span class="active">아이디 찾기</span></li>
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
						<h2>아이디 찾기</h2>
					</section>
					<p class="copy1">아이디 찾는 방법을 선택해 주세요.</p>

				</div><!-- .col-md-12 end -->
			</div><!-- .row end -->
			<!-- .row start -->
			<div class="row">
				<div class="find-id-cont">
					<div class="cont-area">
						<dl class="type2">
							<dd class="email">
								인증번호입력<input type="text" id="email_check" value="" style="margin-left:45px;" size=20/>
							</dd>
							<p id="findId_comment" style ="padding:15px;font-size:20px;text-align:center;color:#f26c5e;">인증번호를 정확하게 입력해 주세요</p>
						</dl>
					</div>
					<div class="btn-area">
						<!--<a class="btn btn-big btn-centered btn-type1" href="/login/findIDConfirm.php">-->
						<a class="btn btn-big btn-centered btn-type1" href="javascript:check_number('<?=$check?>')"  >
							<span>확인</span>
						</a>
					</div>
				</div>
			
					
					<p class="copy">관리자문의 : admin@30cut.com<br />전화번호 : 1661-0301</p>
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

		//$("#get_email").click

		//$(".option-detail").show();

		//$(':input').on('change', function() {
		//  $(".option-detail").slideUp();
		 // $(this).parent().parent('label').next('div').slideToggle(this.checked);
		});
	});

	/* ]]> */
</script>

<script type="text/javascript">

function get_confirm(){
	var mailAddress = document.getElementById("email_address").value;
	var nansu = generateRandom(100000,600000);

document.getElementById('info2').value = mailAddress;
document.getElementById('info1').value = nansu;
//alert(document.getElementById('info1').value);
document.forms["send_mail"].action = "send_email.php";
//document.forms["send_mail"].method = "POST";
document.forms["send_mail"].submit();
}

var generateRandom = function (min, max) {
	var ranNum = Math.floor(Math.random()*max) + min;
    return ranNum;
}
</script>
<script>
function check_number(e) {
var v = document.getElementById('email_check').value;

if (e == v){
	//location.href = "/login/findIDConfirm.php";
	document.forms["send_mail"].action = "/login/findIDConfirm.php"
	document.forms["send_mail"].submit();
	} else {
	document.getElementById('findId_comment').innerHTML = "잘못입력하셨습니다. 확인 후 재입력해주세요.";
	}
}


</script>


</body>
</html>
