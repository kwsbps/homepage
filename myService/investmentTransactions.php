<?php include('../include/incTop.php'); ?>
<body>
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
						<h1>투자 거래내역<span>나의 투자내역을 확인 할 수 있습니다.</span></h1>
					</div><!-- .simple-heading end -->
					<ul class="breadcrumb">
						<li><a href="/index.php">Home</a></li>
						<li>MY 서비스</li>
						<li><span class="active">투자거래내역</span></li>
					</ul><!-- .breadcrumb end -->
				</div><!-- .col-md-12 end -->
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div><!-- .page-content end -->
	<!-- //visual -->
	<div class="cont-type1 bg-type5">
		<div class="container2">
			<div class="box-cont2">
				<p class="copy5"><strong class="name">***</strong> 회원님 반갑습니다.</p>

				<h4 class="tit05">나의 예치금 계좌</h4>
				<div class="tbl-type6">
					<dl>
						<dt>은행명/계좌</dt>
						<dd>우리은행/1002-904-804935</dd>
					</dl>
					<dl>
						<dt>예금주</dt>
						<dd>30CUT ***</dd>
					</dl>
				</div>
				<ul class="list-type2 mt-20">
					<li>- 예치금 입금안내 : 입금 후 1-2분 내로 보유 잔액에 적용됩니다.</li>
				</ul>

				<h4 class="tit05">나의 환급 계좌</h4>
				<div class="tbl-type7">
					<dl>
						<dt>은행명/계좌</dt>
						<dd>우리은행/1002-904-804935</dd>
					</dl>
					<div class="btn-area">
						<a class="btn btn-medium btn-centered btn-type2" href="/myService/integratedQuery.php#myInvestMoney">
							<span>예치금 출금신청</span>
						</a>
					</div>
				</div>

				<ul class="list-type2 mt-20">
					<li>- 관리자문의 : admin@30cut.com / 전화번호 : 1661-0301</li>
				</ul>
				
				<h4 class="tit05">거래하신 내용</h4>
				<div class="tbl-type5">
					<dl>
						<dt>채권</dt>
						<dd>-</dd>
					</dl>
					<dl>
						<dt>상환일</dt>
						<dd>-</dd>
					</dl>
					<dl>
						<dt>차수 / 만기</dt>
						<dd>-</dd>
					</dl>
					<dl>
						<dt>금리 (연환산)</dt>
						<dd>-</dd>
					</dl>
					<dl>
						<dt>입금액</dt>
						<dd>-</dd>
					</dl>
				</div>

				<h4 class="tit05">거래하신 내용</h4>
				<div class="tbl-type5 no-data">
					<p class="no-data-copy">거래하신 내용이 없습니다.</p>	
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
