<?php include('../include/incTop.php'); ?>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
<?php include('../include/incHeader.php'); ?>

<!-- sub-wrap -->
<div class="sub-wrap invest">
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
						<h1>투자<span>30CUT의 대출에 누가 자금을 공급할까요 ?</span></h1>
					</div><!-- .simple-heading end -->
					<ul class="breadcrumb">
						<li><a href="/index.php">Home</a></li>
						<li>투자</li>
						<li><span class="active">투자 신청서</span></li>
					</ul><!-- .breadcrumb end -->
				</div><!-- .col-md-12 end -->
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div><!-- .page-content end -->
	<!-- //visual -->

	<div class="cont-type1 bg-type2 invest-apply-cont1">
		<div class="container2 centered">
			<section class="simple-heading">
				<h2 class="type2">30CUT 투자 신청서</h2>
			</section>
			<div class="box-cont2">
				<h3 class="tit04">30CUT 제1호 Cut-201512-A</h3>
				<div class="tbl-type4">
					<dl>
						<dt>채권</dt>
						<dd>Cut-201512-A</dd>
					</dl>
					<dl>
						<dt>투자기간</dt>
						<dd>12개월</dd>
					</dl>
					<dl>
						<dt>금리(연환산)</dt>
						<dd>7.5%</dd>
					</dl>
					<dl>
						<dt>총 투자금액</dt>
						<dd>100,000,000 원</dd>
					</dl>
				</div>

				<dl class="dl-info">
					<dt>투자 위험 안내</dt>
					<dd>당사는 원금 및 수익을 보장하지 않습니다. 다만, 채권 추심에 도의적 책임을 다합니다</dd>
					<dd class="agree"><strong><input type="checkbox" /> 위의 투자위험을 확인하고 인지하였습니다.(필수항목)</strong></dd>
				</dl>
				<ul class="agree-list">
					<li><input type="checkbox" /> <strong>전체동의</strong></li>
					<li><input type="checkbox" /> <a href="#">개인정보 취급방침</a>에 동의합니다.(필수)</li>
					<li><input type="checkbox" /> 투자자 <a href="#">이용약관</a>에 동의합니다.(필수)</li>
					<li><input type="checkbox" /> 투자상환금을 '예치금 계좌'로 상환받는 것에 동의합니다.(선택)</li>
				</ul>
				<div class="box-type1">
					<dl class="account">
						<dt>나의 예치금 계좌</dt>
						<dd>100,000,000 원</dd>
					</dl>
					<div class="tbl-type6">
						<dl>
							<dt>은행명/계좌</dt>
							<dd>우리은행/1002-904-804935</dd>
						</dl>
						<dl>
							<dt>예금주</dt>
							<dd>30CUT 박상희</dd>
						</dl>
					</div>
				</div>
				<p class="copy">예치금 충전후 투자에 참여하실 수 있습니다.</p>
			</div>
			
			<div class="btn-area centered">
				<a class="btn btn-big btn-centered btn-type1" href="/invest/investComplete.php">
					<span>투자 신청하기</span>
				</a>
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
