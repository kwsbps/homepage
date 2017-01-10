<?php include('../include/incTop.php'); ?>
<body>
<?php include('../include/incHeader.php'); ?>

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
			<!-- .row start -->
			<div class="row">
				<div class="login-cont">
					<div class="login-area">
						<div class="btn-area centered">
							<a class="btn btn-big btn-centered btn-facebook" href="#">
								<span>페이스북 계정으로 로그인</span>
							</a>
						</div>
						<p>또는</p>
						 <!-- form start -->
						<form class="wpcf7">

							<fieldset>
								<span class="wpcf7-form-control-wrap your-email">
									<input type="email" name="email" class="wpcf7-text" id="email" placeholder="Email 주소">
								</span>
							</fieldset>

							<fieldset>
								<span class="wpcf7-form-control-wrap subject">
									<input type="password" class="wpcf7-text" id="password" placeholder="비밀번호">
								</span>
							</fieldset>
							
							<p class="copypoint">로그인 정보가 올바르지 않습니다.</p>

							<div class="btn-area">
								<a class="btn btn-big btn-centered btn-type1" href="#">
									<span>로그인</span>
								</a>
							</div>
						</form><!-- .wpcf7 end -->
					</div>

					<div class="forget-area">
						<dl>
							<dt>아이디를 잊으셨나요?</dt>
							<dd><a href="/login/findID.php">아이디 찾기</a></dd>
						</dl>
						<dl>
							<dt>비밀번호를 잊으셨나요?</dt>
							<dd><a href="/login/findPW.php">비밀번호 찾기</a></dd>
						</dl>
						<p>관리자문의 : admin@30cut.com<br />전화번호 : 1661-0301</p>
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
