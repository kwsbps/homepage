<?php include('../include/incTop.php'); ?>
<body>
<?php include('../include/incHeader.php'); ?>
<?
session_start();
$user_name = $_SESSION[user_email];
include_once "../comm/db_info.php";
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
						<h1>통합조회<span>나의 투자내역과 상환 스케줄을 확인 할 수 있습니다.</span></h1>
					</div><!-- .simple-heading end -->
					<ul class="breadcrumb">
						<li><a href="/index.php">Home</a></li>
						<li>MY 서비스</li>
						<li><span class="active">통합조회</span></li>
					</ul><!-- .breadcrumb end -->
				</div><!-- .col-md-12 end -->
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div><!-- .page-content end -->
	<!-- //visual -->


	<div class="cont-type1 bg-type5">
		<div class="container2">
			<div class="box-cont2">
				<p class="copy5"><strong class="name"><?=$user_name?></strong> 회원님 반갑습니다.</p>
				<div class="tbl-type7">
					<dl class="line1" id="myInvestMoney">
						<dt>30cut에 글남기기</dt>
						<form method="post" name="saveform" action="save_action.php">
						<dd><select name="subject"><option value="1">칭찬</option><option value="2">건의</option><option value="3">불만</option><option value="4">기타</option></select>&nbsp;<input type="text" style="width:400px" name="comment">&nbsp;<input type="submit" value="저장" ></dd></form>
					</dl>
				</div>
				<div class="btn-absol">
					<!--<a class="btn btn-medium btn-centered btn-type4" href="/individual/enterAccount.php">-->
					<a class="btn btn-medium btn-centered btn-type4" href="/myService/privacyAccount.php">
						<span>정보수정</span>
					</a>
				</div>
	<?
	$sql = "select * from board where id='$user_name'";
	$result = mysql_query($sql, $conn);
	while($fetch_array = mysql_fetch_array($result)) { 
		$a =	$fetch_array[content];
		$b =	$fetch_array[subject];
		$c =	$fetch_array[num];

		switch($b) {
			case 1:
				$b = "칭찬";
				break;
			case 2:
				$b = "건의";
				break;
			case 3:
				$b = "불만";
				break;
			case 4:
				$b = "기타";
				break;
		}
	
	?>
	<form method="post" name="delform1">
	<div style="margin:5px;"><span style="font-size:18px;margin-left:5%;margin-right:10%;float:left;"><?=$b?></span><span style="color:black;font-size:18px;flaot:left;"><?=$a?></span><a style="float:right;margin-right:5%;" href="delete_action.php?number=<?=$c?>">X</a></div>
	<input type="hidden" value="<?=$c?>" name="number">
	</form>

	<?
	}
	
	?>

				
			</div>

	
	

<!-- 
			
			<h3 class="tit04">나의 투자 예치금 
				<a class="btn btn-medium btn-centered btn-type5" href="/myService/investmentTransactions.php">
					<span>거래내역 보기</span>
				</a>
			</h3>
			<div class="box-cont2">
				<h4 class="tit05">예치금 정보</h4>
				<div class="tbl-type4">
					<dl>
						<dt>보유금액</dt>
						<dd>-</dd>
					</dl>
					<dl>
						<dt>출금신청중</dt>
						<dd>-</dd>
					</dl>
					<dl>
						<dt>투자진행중</dt>
						<dd>-</dd>
					</dl>
					<dl>
						<dt>출금가능금액</dt>
						<dd>-</dd>
					</dl>
				</div>
				
				<h4 class="tit05">예치금 출금 요청</h4>
				<div class="form-wrap form-type1 mt-0">
					<input type="number" /> 원
					<span class="btn-area">
						<a class="btn btn-medium btn-centered btn-type2" href="/myService/depositComplete.php">
							<span>예치금 출금신청</span>
						</a>
					</span>
				</div>
				
				<ul class="list-type2 mt-20">
					<li>- 출금 신청일 기준, 다음 영업일에 일괄 입금합니다.</li>
					<li>- 예치금 출금 신청을 하시면 출금 신청 금액이 나의 환급 계좌로 입금됩니다.</li>
				</ul>

				<h4 class="tit05">예치금 입금안내</h4>
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

			<h3 class="tit04">나의 투자 상품</h3>
			<div class="box-cont2">
				<table class="tbl-type3 mb-0">
					<tr>
						<th>투자상품</th>
						<th>투자일</th>
					</tr>
					<tr>
						<td><a href="#">30CUT 1호 포트폴리오 투자 (Cut-201512-A)</a></td>
						<td>2015-12-05</td>
					</tr>
					<tr>
						<td><a href="#">30CUT 3호 포트폴리오 투자 (Cut-201512-B)</a></td>
						<td>2015-12-22</td>
					</tr>
				</table>
			</div>-->

			<h3 class="tit04">나의 대출 승인정보
				<!-- <a class="btn btn-medium btn-centered btn-type5" onclick="layer_open('layer2');return false;">
					<span>상환스케줄보기</span>
				</a> -->
			</h3>
			<?
              $sql1 = "select token_key,ratio,payday,loan_money,s_date,d_date from my_tb1 where no=2";
			  $rs1 = mysql_query($sql1, $conn);
			  while($fetch_array1 = mysql_fetch_array($rs1)) { 
                    $ratio = $fetch_array1[ratio];
					$loan_money = $fetch_array1[loan_money];
					$payday = $fetch_array1[payday];
					$s_date = $fetch_array1[s_date];
					$d_date = $fetch_array1[d_date];
			  }
			?>

			<div class="box-cont2">
				<h4 class="tit05">대출 승인정보</h4>

				<div class="tbl-type5" style="border-top:2px solid #666;">
					<dl>
						<dt>시작일자</dt>
						<dd><?=$s_date?></dd>
					</dl>
					<dl>
						<dt>만료일자</dt>
						<dd><?=$d_date?></dd>
					</dl>
					<dl>
						<dt>대출금액</dt>
						<dd><?=$loan_money?>만원</dd>
					</dl>
					<dl>
						<dt>대출금리</dt>
						<dd><?=$ratio?>%</dd>
					</dl>
					<dl>
						<dt>상환개월수</dt>
						<dd><?=$payday?>개월</dd>
					</dl>
					<dl>
						<dt>상환은행</dt>
						<dd>농협은행</dd>
					</dl>
					<dl>
						<dt>상환계좌번호</dt>
						<dd>123456789</dd>
					</dl>
				</div>
			  
				<h4 class="tit05">대환내역 <!-- <span>0</span> 건 --></h4>
				<div class="tbl-type8" style="border-top:2px solid #666;">
					<dl>
						<dt>대환기관</dt>
					</dl>
					<dl>
						<dt>대환금액</dt>
					</dl>
					<dl>
						<dt>상환계좌은행명</dt>
					</dl>
					<dl>
						<dt>계좌주이름</dt>
					</dl>
					<dl>
						<dt>가상계좌번호</dt>
					</dl>
				</div>
				<?
				  $sql2 = "select mytb_no,dae_finance_gubn,dae_finance_name,dae_finance_bank,dae_bank_ssn,dae_money,dae_bank_ssn_name,worker_id,save_time,customer_ratio,bank_name_ref from dae_finance_loan_info where mytb_no = 2 ";
				  $rs1 = mysql_query($sql2, $conn);
				  while($fetch_array2 = mysql_fetch_array($rs1)) { 
						$mytb_no = $fetch_array2[mytb_no];
						$dae_finance_gubn = $fetch_array2[dae_finance_gubn];
						$dae_finance_name = $fetch_array2[dae_finance_name];
						$dae_finance_bank = $fetch_array2[dae_finance_bank];
						$dae_bank_ssn = $fetch_array2[dae_bank_ssn];
						$dae_money = $fetch_array2[dae_money];
						$dae_bank_ssn_name = $fetch_array2[dae_bank_ssn_name];
						$worker_id = $fetch_array2[worker_id];
						$save_time = $fetch_array2[save_time];
						$customer_ratio = $fetch_array2[customer_ratio];
						$bank_name_ref = $fetch_array2[bank_name_ref];
				 
			  ?>
				<div class="tbl-type8">
					<dl>
						<dd><?=$dae_finance_name?></dd>
					</dl>
					<dl>
						<dd><?=$dae_money?>만원</dd>
					</dl>
					<dl>
						<dd><?=$dae_finance_bank?></dd>
					</dl>
					<dl>
						<dd><?=$dae_bank_ssn_name?></dd>
					</dl>
					<dl>
						<dd><?=$dae_bank_ssn?></dd>
					</dl>
				</div>
				<?}?>
				<div class="btn-area">
					<a class="btn btn-big btn-centered btn-type1">
					   <span>최종대출승인</span>
					</a>
				</div>
			</div>

           
		</div>
	</div>


</div> 
<!-- // sub-wrap -->

<?php include('../include/incFooter.php'); ?>

<div class="layer">
	<div class="bg"></div>
	<div id="layer2" class="pop-layer">
		<div class="pop-container">
			<h1 class="pop-tit">상환스케줄 보기</h1>
				<div class="pop-cont">
					<p class="copy2 mt-0">Cut-201512-B  만기일 2016-10-05</p>
					<div class="tbl-type5 mt-10">
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
					<div class="tbl-type5 mt-10">
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
					<p class="copy2">관리자문의 : admin@30cut.com<br />전화번호 : 1661-0301</p>

				<div class="btn-r">
					<a href="javascript:void(0);" class="cbtn"><img src="/img/main/pop_close.png" alt="" /></a>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="/js/jquery-2.1.4.min.js"></script><!-- jQuery library -->
<script src="/js/bootstrap.min.js"></script><!-- .bootstrap script -->
<script src="/js/jquery.scripts.min.js"></script><!-- modernizr, retina, stellar for parallax -->  
<script src='/owl-carousel/owl.carousel.min.js'></script><!-- Carousels script -->
<script src="/js/jquery.dlmenu.min.js"></script><!-- for responsive menu -->
<script src="/js/include.js"></script><!-- custom js functions -->
<script type="text/javascript">
function delete1(){	
				document.delform1.action="delete_action.php";
				document.delform1.submit();
		}

function layer_open(el){

	var temp = $('#' + el);
	var bg = temp.prev().hasClass('bg');

	if(bg){
		$('.layer').fadeIn();
	}else{
		temp.fadeIn();
	}

	if (temp.outerHeight() < $(document).height() ) temp.css('margin-top', '-'+temp.outerHeight()/2+'px');
	else temp.css('top', '0px');
	if (temp.outerWidth() < $(document).width() ) temp.css('margin-left', '-'+temp.outerWidth()/2+'px');
	else temp.css('left', '0px');

	temp.find('a.cbtn').click(function(e){
		if(bg){
			$('.layer').fadeOut();
		}else{
			temp.fadeOut();
		}
		e.preventDefault();
	});

	$('.layer .bg').click(function(e){
		$('.layer').fadeOut();
		e.preventDefault();
	});

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
