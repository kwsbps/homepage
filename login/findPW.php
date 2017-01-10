<?php include('../include/incTop.php'); ?>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
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
						<h1>비밀번호 찾기</h1>
					</div><!-- .simple-heading end -->
					<ul class="breadcrumb">
						<li><a href="/index.php">Home</a></li>
						<li>로그인</li>
						<li><span class="active">비밀번호 찾기</span></li>
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
						<h2>비밀번호찾기</h2>
					</section>
				</div><!-- .col-md-12 end -->
			</div><!-- .row end -->
			<!-- .row start -->
			<div class="row">
				<div class="login-cont">
					<div class="login-area">
						<p>E-mail 주소를 입력하시면, <br />비밀번호 재설정 링크를 전송해드립니다.</p>
						 <!-- form start -->
						<form class="wpcf7">

							<fieldset>
								<span class="wpcf7-form-control-wrap your-email">
									<input type="email" name="email" class="wpcf7-text" id="email" placeholder="Email 주소 입력">
								</span>
							</fieldset>
				
							<div class="btn-area">
								<a class="btn btn-big btn-centered btn-type1" href="/login/mailComplete.php">
									<span>비밀번호 찾기</span>
								</a>
							</div>
							<p class="copy">관리자문의 : admin@30cut.com<br />전화번호 : 1661-0301</p>
						</form><!-- .wpcf7 end -->
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
