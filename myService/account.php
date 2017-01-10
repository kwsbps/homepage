<?php include('../include/incTop.php'); ?>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
<?php include('../include/incHeader.php'); ?>

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
						<li><span class="active">계좌정보</span></li>
					</ul><!-- .breadcrumb end -->
				</div><!-- .col-md-12 end -->
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div><!-- .page-content end -->
	<!-- //visual -->
	<div class="cont-type1 bg-type2">
		<div class="container">
			<div class="box-cont2">
				<h3 class="tit04">계정정보</h3>
				<p class="copy4">투자의 원리금을 수취할  본인명의의 은행 계좌 정보를 입력해주세요.</p>
				<div class="form-wrap form-type1">
					<dl>
						<dt><strong>*</strong> 이메일</dt>
						<dd><span class="inblock">psh@30cut.com</span></dd>
					</dl>
					<dl>
						<dt><strong>*</strong> 기존 비밀번호</dt>
						<dd><input type="password" placeholder="기존 비밀번호" /></dd>
					</dl>
					<dl>
						<dt><strong>*</strong> 비밀번호 변경</dt>
						<dd><input type="password" placeholder="새로운 비밀번호" /></dd>
					</dl>
					<dl>
						<dt><strong>*</strong> 비밀번호 확인</dt>
						<dd><input type="password" placeholder="새로운 비밀번호 확인" /></dd>
					</dl>

					<div class="centered">
						<input type="checkbox" /> 이메일 수신
						<input type="checkbox" /> SMS 수신
					</div>
					<div class="centered">
						<a href="#">개인정보 취급방침</a>
						<a href="#">이용약관</a>
					</div>
				</div>
				<div class="btn-area">
					<a class="btn btn-big btn-centered btn-type1" href="#">
						<span>계정정보 저장하기</span>
					</a>
				</div>
			</div>
		</div>
	</div>

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
