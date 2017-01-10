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
			<div class="box-cont2">
				<h3 class="tit04">회원정보</h3>
				<p class="copy4">개인정보 및 계좌정보를 입력 하셔야 대출 및 투자가 가능합니다.</p>
				<p class="top-copy"><strong>*</strong> 필수 입력사항</p>
				<div class="form-wrap form-type1">
					
					<dl>
						<dt><strong>*</strong> 이름</dt>
						<dd><input type="text" placeholder="본인의 실명을 기입해주세요" /> 
							<input type="checkbox" /> 외국인
						</dd>
					</dl>
					<dl>
						<dt><strong>*</strong> 주민등록번호</dt>
						<dd><input type="text" /> <span class="copy">주민등록상의 번호를 정확하게 입력해주세요.</dd>
					</dl>
					<dl>
						<dt><strong>*</strong> 휴대전화</dt>
						<dd><input type="text" /></dd>
					</dl>
					<dl>
						<dt><strong>*</strong> 주소</dt>
						<dd>
							<input type="text" placeholder="도, 시, 구, 군" />
							<input type="text" class="mt-10" placeholder="상세 주소" />
						</dd>
					</dl>				
				</div>
				<div class="copy-box2">
					<ul class="list-type3 ">
						<li>주민번호와 주소 정보는 현행 세법상 원천징수 납부에 사용되며, 현행 세법상 내부의 투자는 이용하실 수 없습니다. <br />
						사이트 탈퇴 시, 모든 개인정보는 즉시 삭제됩니다. <br />
						참고: 개인정보보호법, 소득세법</li>
					</ul>	
				</div>
		
				<h3 class="tit04">MY 은행 정보</h3>
				<p class="copy4">투자의 원리금을 수취할  본인명의의 은행 계좌 정보를 입력해주세요.</p>
				</ul>
				<div class="form-wrap form-type1">
					
					<dl>
						<dt class="no_required">은행명</dt>
						<dd><select class="select-type1">
								<option>선택</option>
							</select>
							<span class="copy">은행을 선택해주세요.(반드시 본인 계좌 선택)</span>
						</dd>
					</dl>
					<dl>
						<dt class="no_required">계좌번호</dt>
						<dd><input type="text" /> <span class="copy">계좌번호를 정확하게 입력해주세요.</span>
						<p class="mt-20"><input type="checkbox" /> 투자 관심 회원</p>
						<p class="mt-10">기관투자자와 같이 참여할 의사가 있는 개인투자자는 투자 관심 회원으로 등록하시면, 투자 정보를 알려드립니다.</p>
						</dd>
					</dl>
				</div>
				<div class="btn-area">
					<a class="btn btn-big btn-centered btn-type1" href="#">
						<span>개인정보 저장</span>
					</a>
				</div>
			</div>
			<div class="box-cont2 mt-40">
				<h3 class="tit04">나의 예치금 입금계좌</h3>
				<p class="copy4">예치금 계좌는 한번 발급 후 변경이 불가능합니다.</p>
				<div class="form-wrap form-type1 ">
					<select>
						<option>은행 선택</option>
					</select>
					<span class="btn-area">
						<a class="btn btn-medium btn-centered btn-type2" href="/individual/accountComplete.php">
							<span>예치금 계좌 만들기</span>
						</a>
					</span>
				</div>
			</div>

			<div class="box-cont2 mt-40">
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
						<dd><input type="password" placeholder="새로운 비밀번호 확인" />
							<p><span class="inblock"><input type="checkbox" /> 이메일 수신</span><span class="inblock"><input type="checkbox" /> SMS 수신</span></p>
						</dd>
					</dl>
				</div>
				<div class="btn-area">
					<a class="btn btn-big btn-centered btn-type1" href="/individual/indiAccountComplete.php">
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
