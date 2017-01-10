<?php include('../include/incTop.php'); ?>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
<?php include('../include/incHeader.php'); ?>

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
					<!--<div class="cont-area">
						<label for="phone"><h3 class="tit05"><input type="radio" name="group" class="option" id="phone" checked> 회원정보에 등록한 휴대전화로 인증</h3></label>
						<div class="option-detail">
							<p class="copy4">회원정보에 등록한 휴대번호로 인증 번호를 발송합니다.</p>
							<div class="form-wrap form-type1">
								<dl class="type2">
									<dt class="no_required">이름</dt>
									<dd><input type="text" /></dd>
								</dl>
								<dl class="type2">
									<dt class="no_required">휴대전화</dt>
									<dd class="phone">
										<select>
											<option>+82</option>
										</select>
										<input type="text" />
										<span class="btn-area">
											<a class="btn btn-medium btn-centered btn-type3" href="#">
												<span>인증번호받기</span>
											</a>
										</span>
										<div class="mt-10"><input type="text" class="certi-num" placeholder="인증번호 6자리 입력" /></div>
									</dd>
								</dl>
							</div>
						</div>
					</div>-->

					<div class="cont-area">
						<label for="email"><h3 class="tit05">본인확인 이메일 인증</h3></label>
						<div class="option-detail">
							<p class="copy4">회원정보에 등록한 이메일 정보로 인증 번호를 발송합니다.</p>
							<div class="form-wrap form-type1">
								<!--<dl class="type2">
									<dt class="no_required">이름</dt>
									<dd><input type="text" /></dd>
								</dl>-->
								<dl class="type2">
									<dt class="no_required">이메일</dt>
									<dd class="email">
										<input type="text" id="email_address" value=""/>
										<span class="btn-area" id="get_email">
											<a class="btn btn-medium btn-centered btn-type3" style="background-color:#f26c5e" href="javascript:get_confirm()">
												<span>인증번호받기</span>
											</a>
										</span>
										<!--<div class="mt-10"><input type="text" class="certi-num" placeholder="인증번호 6자리 입력" /></div>-->
									</dd>
								</dl>
							</div>
						</div>
					</div>
					<p class="copy">관리자문의 : admin@30cut.com<br />전화번호 : 1661-0301</p>	
				</div>
			</div><!-- .row end -->
		   
		</div><!-- .container end -->
	</div><!-- .page-content end -->

</div>
<!-- // sub-wrap -->
<form id="send_mail" method="post">
<input type="hidden" value="" id="info1" name="info1">
<input type="hidden" value="" id="info2" name="info2">
</form>

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

</body>
</html>
