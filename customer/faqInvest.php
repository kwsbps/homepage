<?php include('../include/incTop.php'); ?>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
<?php include('../include/incHeader.php'); ?>

<!-- sub-wrap -->
<div class="sub-wrap contact">
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
						<h1>자주하는 질문<span><strong>30CUT</strong> 이용 고객들이 자주 묻는 질문과 답을 확인할 수 있습니다. </span></h1>
					</div><!-- .simple-heading end -->
					<ul class="breadcrumb">
						<li><a href="/index.php">Home</a></li>
						<li>고객지원</li>
						<li><span class="active">자주하는 질문</span></li>
					</ul><!-- .breadcrumb end -->
				</div><!-- .col-md-12 end -->
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div><!-- .page-content end -->
	<!-- //visual -->

	<!-- .page-content start -->
	<div class="tab-type1 bg-type1">
		<!-- .container start -->
		<div class="container"> 
				<ul>
					<li><a href="/customer/faqLoan.php"><span>대출부분</span></a></li>
					<li class="on"><a href="/customer/faqInvest.php"><span>투자부분</span></a></li>
				</ul>
		</div>
	</div><!-- .page-content end -->
	
	<!-- .page-content start -->
	<div class="cont-type2 bg-type2">
		<!-- .container start -->
		<div class="container"> 
			<!-- .row start -->
			<div class="row">
				<div class="col-md-12">
					<!-- .accordion default faq start -->
					<div class="accordion faq">
						<div class="title active">
							<a href='#'>30cut에 대한 기관투자자는 누구 인가요?</a>
						</div><!-- .title end -->

						<div class="content">
							<p>
								증권회사, 자산운용사 등 제도권 기관 투자자 입니다.
							</p>
						</div><!-- .content end -->

						<div class="title">
							<a href='#'>일반 개인 투자자는 언제, 어떤 방식으로 투자가 이루어지나요?</a>
						</div><!-- .title end -->

						<div class="content">
							<p>
							   30CUT은 투자전문 기관투자자로부터 자금을 모집 투자하여 platform의 안정성과 수익률 검증을 거친 후 일반 투자자에게도 open 될 예정이며, open 시에 투자 방식에 대하여도 자세히 설명될 예정입니다.
							</p>
						</div><!-- .content end -->

						<div class="title">
							<a href='#'>투자 수익률은 몇 % 인가요?</a>
						</div><!-- .title end -->

						<div class="content">
							<p>
								투자는 대출에 대한 포트폴리오 투자로서 각 대출이자율은 다를 수 있으나, 제시 될 투자수익률은 투자대상 대출채권의 포트폴리오가 확정되면 일정하게 제시될 예정입니다. 
							</p>
						</div><!-- .content end -->

						<div class="title">
							<a href='#'>투자자 보호 장치가 있나요?</a>
						</div><!-- .title end -->

						<div class="content">
							<p>
								30cut은 투자자의 보호를 위하여 대출 포트폴리오에 대한 손실보전 준비금을 부담함으로써 미연에 투자자 손실 보호를 도모할 예정입니다.
							</p>
						</div><!-- .content end -->

					</div><!-- .accordion.default.faq end -->
				</div><!-- .col-md-12 end -->
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
