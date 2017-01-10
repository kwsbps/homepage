<?php include('../include/incTop.php'); ?>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
<?php include('../include/incHeader.php'); ?>


<div class="sub-wrap clinic">
	<!-- visual -->
	<!-- .page-content start -->
	<div class="page-content dark custom-img-background page-title-1 page-title sub-visual">
		<div class="container">
			<!-- .row start -->
			<div class="row">
				<!-- .col-md-12 start -->
				<div class="col-md-12 triggerAnimation animated" data-animate='fadeInUp'>
					<!-- .simple-heading start -->
					<div class="simple-heading mb-30" style="margin-top:30px;">
						<h1>부채클리닉<span>부담스러운 고금리 대출, 혼자 고민하지 마세요. 30CUT과 제휴기관이 함께 합니다.</span></h1>
					</div><!-- .simple-heading end -->
					<ul class="breadcrumb">
						<li><a href="/index.php">Home</a></li>
						<li><span class="active">부채클리닉</span></li>
					</ul><!-- .breadcrumb end -->
				</div><!-- .col-md-12 end -->
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div><!-- .page-content end -->
	<!-- //visual -->

<? 
	if( $_POST[action] == 'OK' ){
		for($i=1; $i<16; $i++){

			$result_sum += $_POST[q.$i];
		}		
	}
 
?>

	 <!-- .page-content start -->
	<div class="loan-cont1 cont-type1 bg-type1" style="border-bottom:1px solid #666666">
		<div class="container">
			<!-- .row start -->
			<div class="row row1" id="LUMP13" <?if( $_POST[action] == 'OK' ){?>
			 style="display:none;"<?}else{?>
			 style="display:block;"
			 
			 <?}?>>
				<form name="form" method ='post' action="loan_check.php" onsubmit="sendit(); return false;">
			     <input type="hidden" name="action" value="OK">
                  <section class="simple-heading ">
						<h2>대출 위험도 체크리스트</h2>
				  </section>
				  <p class="bottom-copy"><strong>*</strong> 금융위원회에서 제공한 자료입니다.</p>
				  <div class="form-wrap form-type1">

					<ul id="ult">
						<li>1. 미래에 가정에서 돈을 써야 할 내용(재무목표)에 대해서 계획을 세워 본 적이 있습니까?</li>
                        <ul id="ult">
							<li><input type="radio" id = 'q1_0' name ='q1' value ='0' /></span>&nbsp;<label for="q1_0"> 생각해 본적이 전혀 없다. (0점)</li>
							<li><input type="radio" id = 'q1_1' name ='q1' value ='1' /></span>&nbsp;<label for="q1_1"> 5년 이내 단기간에 써야 할 곳은 구체적으로 생각해 보았지만 그 이상은 막연하게만 생각해 보았다. (1점)</li>
							<li><input type="radio" id = 'q1_2' name ='q1' value ='2' /></span>&nbsp;<label for = "q1_2"> 돈을 써야 할 곳에 대해 장기/중기/단기로 나누어 구체적으로 계획을 세우고 있다. (2점)</li>	
						</ul>
					</ul>
					<ul id="ult">
						<li>2. 가정에서 준비하고 있는 비상자금 규모는 어느 정도입니까?</li>
						<ul id="ult">
							<li><input type="radio" id = 'q2_0' name ='q2' value ='0' /></span>&nbsp;<label for = "q2_0"> 마이너스통장, 신용카드, 약관대출 등을 사용할 예정이다. (0점)</li>
							<li><input type="radio" id = 'q2_1' name ='q2' value ='1' /></span>&nbsp;<label for = "q2_1"> 준비하고 있는 비상자금이 월 소득의 300% 미만이다. (1점)</li>
							<li><input type="radio" id = 'q2_2' name ='q2' value ='2' /></span>&nbsp;<label for = "q2_2"> 준비하고 있는 비상자금이 월 소득의 300% 이상이다. (2점)</li>
                        </ul>
					</ul>

					<ul id="ult">
					<li>3. 현재 대출을 사용하고 있습니까?</li>
						<ul id="ult">
							<li><input type="radio"  id = 'q3_0' name ='q3' value ='0' /></span>&nbsp;<label for = "q3_0"> 매월 소득의 30% 이상이 대출이자로 지출되고 있다. (0점)</li>
							<li><input type="radio"  id = 'q3_1' name ='q3' value ='1' /></span>&nbsp;<label for = "q3_1"> 매월 소득의 20% 이상이 대출이자로 지출되고 있다. (1점)</li>
							<li><input type="radio"  id = 'q3_2' name ='q3' value ='2' /></span>&nbsp;<label for = "q3_2"> 매월 소득의 10% 이상이 대출이자로 지출되고 있다. (2점)</li>
							<li><input type="radio"  id = 'q3_3' name ='q3' value ='3' /></span>&nbsp;<label for = "q3_3"> 매월 소득의 10% 미만이 대출이자로 지출되고 있다. (3점)</li>
						</ul>
					</ul>
					<ul id="ult">
					<li>4. 대출을 사용하고 있다면 어떤 대출을 사용하고 있습니까?</li>
						<ul id="ult">
							<li><input type="radio" id = 'q4_0' name ='q4' value ='0' /></span>&nbsp;<label for = "q4_0"> 현금서비스, 카드론 또는 대부업체 및 개인사채 등 이자율 20% 이상의 대출을 일부 사용하고 있거나 사용할 예정이다. (0점)</li>
							<li><input type="radio" id = 'q4_1' name ='q4' value ='1' /></span>&nbsp;<label for = "q4_1"> 은행 등 제1·2금융권의 이자율 10% 미만의 대출을 사용하고 있다. (1점)</li>
							<li><input type="radio" id = 'q4_2' name ='q4' value ='2' /></span>&nbsp;<label for = "q4_2"> 대출을 사용하고 있지 않다. (2점)</li>
						</ul>
					</ul>
					<ul id="ult">
					<li>5. 현재 대출을 사용하고 있다면 대출 금액을 정확하게 알고 있습니까?</li>
						<ul id="ult">
							<li><input type="radio" id = 'q5_0' name ='q5' value ='0' /></span>&nbsp;<label for = "q5_0"> 대출금액을 정확하게 알고 있지 않다. (0점)</li>
							<li><input type="radio" id = 'q5_1' name ='q5' value ='1' /></span>&nbsp;<label for = "q5_1"> 신용카드 현금서비스를 제외한 대출금액을 알고 있다. (1점)</li>
							<li><input type="radio" id = 'q5_2' name ='q5' value ='2' /></span>&nbsp;<label for = "q5_2"> 현금서비스를 포함한 대출금액을 알고 있다. (2점)</li>
							<li><input type="radio" id = 'q5_3' name ='q5' value ='3' /></span>&nbsp;<label for = "q5_3"> 대출을 사용하고 있지 않다. (3점)</li>
						</ul>
					</ul>
					<ul id="ult">
					<li>6. 마이너스 통장을 가지고 있습니까?</li>
						<ul id="ult">
							<li><input type="radio" id = 'q6_0' name ='q6' value ='0' /></span>&nbsp;<label for = "q6_0"> 마이너스 통장을 가지고 있고 자주 사용하고 있다. (0점)</li>
							<li><input type="radio" id = 'q6_1' name ='q6' value ='1' /></span>&nbsp;<label for = "q6_1"> 마이너스 통장을 가지고 있지만 사용하지 않는다. (1점)</li>
							<li><input type="radio" id = 'q6_2' name ='q6' value ='2' /></span>&nbsp;<label for = "q6_2"> 마이너스 통장을 가지고 있지 않다. (2점)</li>
						</ul>
					</ul>
					<ul id="ult">
					<li>7. 배우자 또는 가족이 모르는 대출(현금서비스 포함)을 받고 있습니까?</li>
						<ul id="ult">
							<li><input type="radio" id = 'q7_0' name ='q7' value ='0' /></span>&nbsp;<label for = "q7_0"> 가족이 모르게 대출을 받고 있다. (0점)</li>
							<li><input type="radio" id = 'q7_1' name ='q7' value ='1' /></span>&nbsp;<label for = "q7_1"> 모든 대출에 대해 가족과 함께 상의하고, 가족도 내역을 알고 있다. (1점)</li>
						</ul>
					</ul>
					<ul id="ult">
					<li>8. 금융회사에서 대출 받을 때 대출이자도 흥정을 할 수 있다고 생각하십니까?</li>
						<ul id="ult">
							<li><input type="radio"  id = 'q8_0' name ='q8' value ='0' /></span>&nbsp;<label for = "q8_0"> 백화점 정찰제처럼 금융회사 대출이자는 흥정의 대상이 아니다. (0점)</li>
							<li><input type="radio"  id = 'q8_1' name ='q8' value ='1' /></span>&nbsp;<label for = "q8_1"> 잘 흥정을 하면 규정된 할인 이외에 추가 할인도 가능하다. (1점)</li>
						</ul>
					</ul>
                <ul id="ult">
				<li>9. 대출상품 또는 펀드와 같은 금융상품을 선택할 때 선택기준은 무엇입니까?</li>
					<ul id="ult">
						<li><input type="radio"  id = 'q9_0' name ='q9' value ='0' /></span>&nbsp;<label for = "q9_0"> 대부분 금융회사 직원이 추천하는 상품과 조건을 선택한다. (0점)</li>
						<li><input type="radio"  id = 'q9_1' name ='q9' value ='1' /></span>&nbsp;<label for = "q9_1"> 친구, 직장동료 등 지인의 이야기를 듣고 선택한다. (1점)</li>
						<li><input type="radio"  id = 'q9_2' name ='q9' value ='2' /></span>&nbsp;<label for = "q9_2"> 스스로 인터넷이나 관련 자료를 찾아서 선택한다. (2점)</li>
					</ul>
				</ul>
                <ul id="ult">
				<li>10. 금융회사에서 대출을 이용하고 있다면 대출 조건을 잘 알고 있습니까?</li>
					<ul id="ult">
						<li><input type="radio" id = 'q10_0' name ='q10' value ='0' /></span>&nbsp;<label for = "q10_0"> 대출을 사용하고 있지만 조건에 대해서 잘 모른다. (0점)</li>
						<li><input type="radio" id = 'q10_1' name ='q10' value ='1' /></span>&nbsp;<label for = "q10_1"> 대출을 사용하고 있고 조건에 대해서도 잘 알고 있다. (1점)</li>
						<li><input type="radio" id = 'q10_2' name ='q10' value ='2' /></span>&nbsp;<label for = "q10_2"> 대출을 사용하고 있지 않다. (2점)</li>
					</ul>
				</ul>
                <ul id="ult">
				<li>11. 담보로 제공할 부동산(아파트, 토지 등)이나 금융자산(예: 적금 등)이 있음에도 불구하고 신용대출을 이용하고 있습니까?</li>
					<ul id="ult">
						<li><input type="radio" id = 'q11_0' name ='q11' value ='0' /></span>&nbsp;<label for = "q11_0"> 신용대출이 편리하여 신용대출을 이용하거나 이용한 적이 있다. (0점)</li>
						<li><input type="radio" id = 'q11_1' name ='q11' value ='1' /></span>&nbsp;<label for = "q11_1"> 절차가 복잡해도 담보대출 이자율이 싸기 때문에 담보대출을 이용한다. (1점)</li>
						<li><input type="radio" id = 'q11_2' name ='q11' value ='2' /></span>&nbsp;<label for = "q11_2"> 대출을 사용하지 않고 있다. (2점)</li>
					</ul>
				</ul>
                <ul id="ult">
				<li>12. 대출이자 이상의 수익을 위하여 대출을 사용하고 있습니까? (예: 아파트나 주식 등 투자를 위해서 과감히 대출을 이용하고 있다.)</li>
					<ul id="ult">
						<li><input type="radio" id = 'q12_0' name ='q12' value ='0' /></span>&nbsp;<label for = "q12_0"> 투자를 위하여 과감히 대출을 이용하는 것이 바람직하다. (0점)</li>
						<li><input type="radio" id = 'q12_1' name ='q12' value ='1' /></span>&nbsp;<label for = "q12_1"> 불확실한 투자 수익률 때문에 대출을 받는 것은 바람직하지 않다. (1점)</li>
					</ul>
				</ul>
                <ul id="ult">
				<li>13. 현재 대출을 사용하고 있다면 대출 상환 계획을 세워 본 적이 있습니까?</li>
					<ul id="ult">
						<li><input type="radio" id = 'q13_0' name ='q13' value ='0' /></span>&nbsp;<label for = "q13_0"> 상환 계획을 세워 본 적이 전혀 없다. (0점)</li>
						<li><input type="radio" id = 'q13_1' name ='q13' value ='1' /></span>&nbsp;<label for = "q13_1"> 상환 계획을 세워 실천하려고 하고 있다. (1점)</li>
						<li><input type="radio" id = 'q13_2' name ='q13' value ='2' /></span>&nbsp;<label for = "q13_2"> 대출을 사용하고 있지 않다. (2점)</li>
					</ul>
				</ul>
                <ul id="ult">
				<li>14. 대부업체에서 ‘1개월 동안 무이자’로 대출을 해준다고 하는 TV광고가 있다면 어떻게 생각하십니까?</li>
					<ul id="ult">
						<li><input type="radio" id = 'q14_0' name ='q14' value ='0' /></span>&nbsp;<label for = "q14_0"> 대출 받아서 1개월 안에 갚는다면 무조건 이득이다. (0점)</li>
						<li><input type="radio" id = 'q14_1' name ='q14' value ='1' /></span>&nbsp;<label for = "q14_1"> 1개월 무이자의 이득 이상으로 향후 불이익이 있을 수 있다고 생각한다. (1점)</li>
					</ul>
				</ul>
                <ul id="ult">
				<li>15. 지인이 보증을 부탁해서 가족 몰래 보증을 섰거나 서 준 경험이 있습니까?</li>
					<ul id="ult">
						<li><input type="radio" id = 'q15_0' name ='q15' value ='0' /></span>&nbsp;<label for = "q15_0"> 가족 몰래 보증을 서고 있거나 서 준 경험이 있다. (0점)</li>
						<li><input type="radio" id = 'q15_1' name ='q15' value ='1' /></span>&nbsp;<label for = "q15_1"> 보증을 서 주었지만 가족과 상의한 후 보증을 섰다. (1점)</li>
						<li><input type="radio" id = 'q15_2' name ='q15' value ='2' /></span>&nbsp;<label for = "q15_2"> 보증은 서 준 적도 없고, 앞으로도 보증을 서지 않을 것이다. (2점)</li>
					</ul>
				</ul>
				<div class="btn-area">
			      <a class="btn1 btn-big green btn-centered" href="javascript:sendit();"><!-- /loan/loanApply.php -->
						<span>결과보기</span>
				</a>
				</div>

				</div>
		    </div>
			
		 </form>


			 <?
				
				 if( $_POST[action] == 'OK' ){
					 
				?>
			 <FIELDSET style="width:99%; height:200px; padding:10px; border:1px solid Orange;">
				<legend style="color:Orange">[대출 위험도 체크리스트 결과보기]&nbsp;</legend>
			

				<center><font size ='3'><font color = '000000'><?=$result_sum?> 점 </font></font><br><br>
				<?if ($result_sum >= 1 && $result_sum <= 10){?>
				

				<b>1~10점 : </b>대출 이후 그 금액이 눈덩이처럼 불어 가족 모두가 불행에 빠질 위험이 있습니다. <BR>대출의 악순환 탈출이 혼자서 어렵다면 재무설계전문가의 도움을 받는 것도 좋은 방법입니다.  
				<?}else if ($result_sum >= 11 && $result_sum <= 20){?>

				<b>11~20점 : </b>대출과 관련해 대체적으로 양호한 사고방식을 갖고 있으나 방심한다면	 심각한 위험을 초래할 수 있습니다. 	<BR>돈에 대한 계획을 미리미리 세워보세요.
				<?}else if ($result_sum >= 21 && $result_sum <= 28){?>	

				<b>21~28점 : </b>대출에 대한 건강한 습관과 생각을 지녀 부자가 될 자격을 갖췄다는 	의미입니다! <BR>재무건전성을 점검하면서 가족과 함께 미래를 계획하면 이미 돈을 통제할 수 있는 부자라고 볼 수 있습니다.  
				<?}?>
				
            
				</center>
			 </FIELDSET>
			 <div class="btn-area">
			      <a class="btn1 btn-big green btn-centered" href="loan_check.php"><!-- /loan/loanApply.php -->
						<span>다시하기</span>
				</a>
				</div>
			 <?}?>
				    
			</div><!-- .row end -->
			

			
		</div>
	</div><!-- .page-content end -->

</div>
<!-- // sub-wrap -->
<style> 

</style>
<?php include('../include/incFooter.php'); ?>

<script src="/js/jquery-2.1.4.min.js"></script><!-- jQuery library -->
<script src="/js/bootstrap.min.js"></script><!-- .bootstrap script -->
<script src="/js/jquery.scripts.min.js"></script><!-- modernizr, retina, stellar for parallax -->  
<script src='/owl-carousel/owl.carousel.min.js'></script><!-- Carousels script -->
<script src="/js/jquery.dlmenu.min.js"></script><!-- for responsive menu -->
<script src="/js/include.js"></script><!-- custom js functions -->
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
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
<script language="JavaScript">
	

	function sendit() {		

	
		var q1_num_temp = document.all.q1.length;
		var q2_num_temp = document.all.q2.length; 
		var q3_num_temp = document.all.q3.length;
		var q4_num_temp = document.all.q4.length; 
		var q5_num_temp = document.all.q5.length; 
		var q6_num_temp = document.all.q6.length;
		
		var q7_num_temp = document.all.q7.length;
		var q8_num_temp = document.all.q8.length; 
		var q9_num_temp = document.all.q9.length; 
		var q10_num_temp = document.all.q10.length; 

		var q11_num_temp = document.all.q11.length;
		var q12_num_temp = document.all.q12.length; 
		var q13_num_temp = document.all.q13.length; 
		var q14_num_temp = document.all.q14.length; 
		var q15_num_temp = document.all.q15.length;
		
		var q_total_sum = 0;
		var reult_text;
		
		//alert(typeof q_total_sum);


		// 1번
		for (var i=0;i<q1_num_temp ;i++) 
		{ 
		    if (document.all.q1[i].checked == true) 
			{ 
				q_total_sum += parseInt(document.getElementsByName("q1")[i].value);	
				break; 
			}
			
		} 

		if (i == q1_num_temp) 
		{ 
			alert("1번을 선택하세요");
			return false;
			
		}

		// 2번

		for (var i=0;i<q2_num_temp ;i++) 
		{ 
		    if (document.all.q2[i].checked == true) 
			{   
				q_total_sum += parseInt(document.getElementsByName("q2")[i].value);				
				break; 
			}
			
		}

		if (i == q2_num_temp) 
		{ 
			alert("2번을 선택하세요");
			return false;
			
		}
		

		// 3번

		for (var i=0;i<q3_num_temp ;i++) 
		{ 
		    if (document.all.q3[i].checked == true) 
			{ 
				q_total_sum += parseInt(document.getElementsByName("q3")[i].value);
				break; 
			}
			
		} 

		if (i == q3_num_temp) 
		{ 
			alert("3번을 선택하세요");
			return false;
		}
		
		// 4번

		for (var i=0;i<q4_num_temp ;i++) 
		{ 
		    if (document.all.q4[i].checked == true) 
			{ 
				q_total_sum += parseInt(document.getElementsByName("q4")[i].value);
				break; 
			}
			
		} 

		if (i == q4_num_temp) 
		{ 
			alert("4번을 선택하세요");
			return false;
		}
		
		// 5번

		for (var i=0;i<q5_num_temp ;i++) 
		{ 
		    if (document.all.q5[i].checked == true) 
			{ 
				q_total_sum += parseInt(document.getElementsByName("q5")[i].value);
				break; 
			}
			
		} 

		if (i == q5_num_temp) 
		{ 
			alert("5번을 선택하세요");
			return false;
		}
		
		// 6번

		for (var i=0;i<q6_num_temp ;i++) 
		{ 
		    if (document.all.q6[i].checked == true) 
			{ 
				q_total_sum += parseInt(document.getElementsByName("q6")[i].value);
				break; 
			}
			
		} 

		if (i == q6_num_temp) 
		{ 
			alert("6번을 선택하세요");
			return false;
		}
		
		// 7번

		for (var i=0;i<q7_num_temp ;i++) 
		{ 
		    if (document.all.q7[i].checked == true) 
			{ 
				q_total_sum += parseInt(document.getElementsByName("q7")[i].value);
				break; 
			}
			
		} 

		if (i == q7_num_temp) 
		{ 
			alert("7번을 선택하세요"); 
			return false;
		} 


		// 8번

		for (var i=0;i<q8_num_temp ;i++) 
		{ 
		    if (document.all.q8[i].checked == true) 
			{ 
				q_total_sum += parseInt(document.getElementsByName("q8")[i].value);
				break; 
			}
			
		} 

		if (i == q8_num_temp) 
		{ 
			alert("8번을 선택하세요"); 
			return false;
		}
		
		// 9번

		for (var i=0;i<q9_num_temp ;i++) 
		{ 
		    if (document.all.q9[i].checked == true) 
			{ 
				q_total_sum += parseInt(document.getElementsByName("q9")[i].value);
				break; 
			}
			
		} 

		if (i == q9_num_temp) 
		{ 
			alert("9번을 선택하세요"); 
			return false;
		}
		
		// 10번

		for (var i=0;i<q10_num_temp ;i++) 
		{ 
		    if (document.all.q10[i].checked == true) 
			{ 
				q_total_sum += parseInt(document.getElementsByName("q10")[i].value);
				break; 
			}
			
		} 

		if (i == q10_num_temp) 
		{ 
			alert("10번을 선택하세요"); 
			return false;
		}
		
		// 11번

		for (var i=0;i<q11_num_temp ;i++) 
		{ 
		    if (document.all.q11[i].checked == true) 
			{ 
				q_total_sum += parseInt(document.getElementsByName("q11")[i].value);
				break; 
			}
			
		} 

		if (i == q11_num_temp) 
		{ 
			alert("11번을 선택하세요"); 
			return false;
		} 


		// 12번

		for (var i=0;i<q12_num_temp ;i++) 
		{ 
		    if (document.all.q12[i].checked == true) 
			{ 
				q_total_sum += parseInt(document.getElementsByName("q12")[i].value);
				break; 
			}
			
		} 

		if (i == q12_num_temp) 
		{ 
			alert("12번을 선택하세요"); 
			return false;
		}
		
		// 13번

		for (var i=0;i<q13_num_temp ;i++) 
		{ 
		    if (document.all.q13[i].checked == true) 
			{ 
				q_total_sum += parseInt(document.getElementsByName("q13")[i].value);
				break; 
			}
			
		} 

		if (i == q13_num_temp) 
		{ 
			alert("13번을 선택하세요"); 
			return false;
		} 

		// 14번

		for (var i=0;i<q14_num_temp ;i++) 
		{ 
		    if (document.all.q14[i].checked == true) 
			{ 
				q_total_sum += parseInt(document.getElementsByName("q14")[i].value);
				break; 
			}
			
		} 

		if (i == q14_num_temp) 
		{ 
			alert("14번을 선택하세요"); 
			return false;
		} 

		// 15번

		for (var i=0;i<q15_num_temp ;i++) 
		{ 
		    if (document.all.q15[i].checked == true) 
			{ 
				q_total_sum += parseInt(document.getElementsByName("q15")[i].value);
				break; 
			}
			
		}
		
		if (i == q15_num_temp) 
		{ 
			alert("15번을 선택하세요"); 
			return false;
		} 

		

		if(q_total_sum >= 1 && 10 <= q_total_sum){

			//alert(q_total_sum + " 점 : 대출 이후 그 금액이 눈덩이처럼 불어 가족 모두가 불행에 빠질 위험 O " + " 대출의 악순환 탈출이 혼자서 어렵다면 재무설계전문가의 도움을 받는 것도 좋은 방법입니다."  );

			reult_text = q_total_sum + " 점 : 대출 이후 그 금액이 눈덩이처럼 불어 가족 모두가 불행에 빠질 위험이 있습니다." + " 대출의 악순환 탈출이 혼자서 어렵다면 재무설계전문가의 도움을 받는 것도 좋은 방법입니다.";

		}else if (q_total_sum >= 11 && 20 <= q_total_sum)
		{
			//alert(q_total_sum + " 점 : 대출과 관련해 대체적으로 양호한 사고방식을 갖고 있으나 방심한다면 심각한 위험을 초래할 수 있습니다. 돈에 대한 계획을 미리미리 세워보세요. "  );

			reult_text = q_total_sum + " 점 : 대출과 관련해 대체적으로 양호한 사고방식을 갖고 있으나 방심한다면 심각한 위험을 초래할 수 있습니다. 돈에 대한 계획을 미리미리 세워보세요. ";
		}else if (q_total_sum >= 21 && 28 <= q_total_sum){

			///alert(q_total_sum + " 점 : 대출에 대한 건강한 습관과 생각을 지녀 부자가 될 자격을 갖췄다는 의미입니다! 재무건전성을 점검하면서 가족과 함께 미래를 계획하면 이미 돈을 통제할 수 있는 부자라고 볼 수 있습니다. "  );
			
			reult_text = q_total_sum + " 점 : 대출에 대한 건강한 습관과 생각을 지녀 부자가 될 자격을 갖췄다는 의미입니다! 재무건전성을 점검하면서 가족과 함께 미래를 계획하면 이미 돈을 통제할 수 있는 부자라고 볼 수 있습니다. ";		
		}else{
			//alert("다시 선택하세요");

		}

		//LUMP13.style.display = "none";
		//LUMP15.style.display = "block";
		//LUMP14.style.display = "block";

		//form.result.value = reult_text ;
		
		form.submit();
	}

	function sendit2() {		
		
		LUMP13.style.display = "none";
		LUMP15.style.display = "block";
		LUMP14.style.display = "block";

		form.submit();

	}

	
</script>
