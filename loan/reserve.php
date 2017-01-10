<?php include('../include/incTop.php'); ?>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
<?php include('../include/incHeader.php'); ?>

<!-- sub-wrap -->
<div class="sub-wrap loan">
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
						<h1>대출<span>이자의 <strong>30% 인하 혜택</strong>과 함께 월 상환액을 대폭 낮출 수 있습니다.</span></h1>
					</div><!-- .simple-heading end -->
					<ul class="breadcrumb">
						<li><a href="/index.php">Home</a></li>
						<li>대출</li>
						<li><span class="active">사전예약</span></li>
					</ul><!-- .breadcrumb end -->
				</div><!-- .col-md-12 end -->
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div><!-- .page-content end -->
	<!-- //visual -->
	
	<div class="cont-type1 bg-type2">
		<div class="container">
			<h3 class="tit03">사전예약 신청서</h3>
			<ul class="list-type2">
				<li style="color:#f26c5e;font-size:15px;font-weight:bold;">※NH 30CUT론 신청으로 인한 신용조회는 신용등급에 영향을 주지 않습니다. </li>
				
			</ul>
			<p class="top-copy"><strong>*</strong> 필수 입력사항</p>
			<div class="form-wrap form-type1">
				<form class="wpcf7"  id="isform" method="post" name="isform" action="action_rev.php">
				<ul class="list-type2">
				<li>대출 사전예약 신청을 위해 아래의 고객 정보를 입력해 주십시오.</li>
				
			</ul>
				<dl>
					<dt style="font-weight:bold;"><strong class="dott">*</strong> 이름</dt>
					<dd><input type="text" name="ap_name" id="ap_name" value=""/><span class="copy">필수입력 항목입니다.</span></dd>
				</dl>
				<dl>
					<dt style="font-weight:bold;"><strong class="dott">*</strong> 생년월일</dt>
					<dd><select name="ap_year" id="ap_year" style="width: 100px">
					<option value=''>-년</optioon>
						<option value='1940'>1940년</optioon>
						<option value='1941'>1941년</optioon>
						<option value='1942'>1942년</optioon>
						<option value='1943'>1943년</optioon>
						<option value='1944'>1944년</optioon>
						<option value='1945'>1945년</optioon>
						<option value='1946'>1946년</optioon>
						<option value='1947'>1947년</optioon>
						<option value='1948'>1948년</optioon>
						<option value='1949'>1949년</optioon>
						<option value='1950'>1950년</optioon>
						<option value='1951'>1951년</optioon>
						<option value='1952'>1952년</optioon>
						<option value='1953'>1953년</optioon>
						<option value='1954'>1954년</optioon>
						<option value='1955'>1955년</optioon>
						<option value='1956'>1956년</optioon>
						<option value='1957'>1957년</optioon>
						<option value='1958'>1958년</optioon>
						<option value='1959'>1959년</optioon>
						<option value='1960'>1960년</optioon>
						<option value='1961'>1961년</optioon>
						<option value='1962'>1962년</optioon>
						<option value='1963'>1963년</optioon>
						<option value='1964'>1964년</optioon>
						<option value='1965'>1965년</optioon>
						<option value='1966'>1966년</optioon>
						<option value='1967'>1967년</optioon>
						<option value='1968'>1968년</optioon>
						<option value='1969'>1969년</optioon>
						<option value='1970'>1970년</optioon>
						<option value='1971'>1971년</optioon>
						<option value='1972'>1972년</optioon>
						<option value='1973'>1973년</optioon>
						<option value='1974'>1974년</optioon>
						<option value='1975'>1975년</optioon>
						<option value='1976'>1976년</optioon>
						<option value='1977'>1977년</optioon>
						<option value='1978'>1978년</optioon>
						<option value='1979'>1979년</optioon>
						<option value='1980'>1980년</optioon>
						<option value='1981'>1981년</optioon>
						<option value='1982'>1982년</optioon>
						<option value='1983'>1983년</optioon>
						<option value='1984'>1984년</optioon>
						<option value='1985'>1985년</optioon>
						<option value='1986'>1986년</optioon>
						<option value='1987'>1987년</optioon>
						<option value='1988'>1988년</optioon>
						<option value='1989'>1989년</optioon>
						<option value='1990'>1990년</optioon>
						<option value='1991'>1991년</optioon>
						<option value='1992'>1992년</optioon>
						<option value='1993'>1993년</optioon>
						<option value='1994'>1994년</optioon>
						<option value='1995'>1995년</optioon>
						<option value='1996'>1996년</optioon>
						<option value='1997'>1997년</optioon>
						<option value='1998'>1998년</optioon>
						<option value='1999'>1999년</optioon>
						<option value='2000'>2000년</optioon>
						<option value='2001'>2001년</optioon>
						<option value='2002'>2002년</optioon>
						<option value='2003'>2003년</optioon>
						<option value='2004'>2004년</optioon>
						<option value='2005'>2005년</optioon>
						<option value='2006'>2006년</optioon>
						<option value='2007'>2007년</optioon>
						<option value='2008'>2008년</optioon>
						</select>
						<select name="ap_month" id="ap_month" style="width: 60px">
						<option value=''>-월</optioon>
						<option value='01'>1월</optioon>
						<option value='02'>2월</optioon>
						<option value='03'>3월</optioon>
						<option value='04'>4월</optioon>
						<option value='05'>5월</optioon>
						<option value='06'>6월</optioon>
						<option value='07'>7월</optioon>
						<option value='08'>8월</optioon>
						<option value='09'>9월</optioon>
						<option value='10'>10월</optioon>
						<option value='11'>11월</optioon>
						<option value='12'>12월</optioon>

						</select>
						<select name="ap_day" id="ap_day" style="width: 60px">
						<option value=''>-일</optioon>
						<option value='01'>1일</optioon>
						<option value='02'>2일</optioon>
						<option value='03'>3일</optioon>
						<option value='04'>4일</optioon>
						<option value='05'>5일</optioon>
						<option value='06'>6일</optioon>
						<option value='07'>7일</optioon>
						<option value='08'>8일</optioon>
						<option value='09'>9일</optioon>
						<option value='10'>10일</optioon>
						<option value='11'>11일</optioon>
						<option value='12'>12일</optioon>
						<option value='13'>13일</optioon>
						<option value='14'>14일</optioon>
						<option value='15'>15일</optioon>
						<option value='16'>16일</optioon>
						<option value='17'>17일</optioon>
						<option value='18'>18일</optioon>
						<option value='19'>19일</optioon>
						<option value='20'>20일</optioon>
						<option value='21'>21일</optioon>
						<option value='22'>22일</optioon>
						<option value='23'>23일</optioon>
						<option value='24'>24일</optioon>
						<option value='25'>25일</optioon>
						<option value='26'>26일</optioon>
						<option value='27'>27일</optioon>
						<option value='28'>28일</optioon>
						<option value='29'>29일</optioon>
						<option value='30'>30일</optioon>
						<option value='31'>31일</optioon>

						</select>
						
						</dd>
				</dl>
					
				<dl>
					<dt style="font-weight:bold;"><strong class="dott">*</strong> 성별</dt>
					<dd><span class="radio-wrap"><input type="radio" name="ap_sex" id="ap_sex" value="1" checked/> 남자</span><span class="radio-wrap"><input type="radio" name="ap_sex" id="ap_sex" value="2"/> 여자</span></dd>
				</dl>
				<dl>
					<dt style="font-weight:bold;"><strong class="dott">*</strong> 휴대폰번호</dt>
					<dd><input type="text" name="ap_hp1" id="ap_hp1" style="width: 80px;height: 37px;" maxlength="3" value=""/>-<input type="text" name="ap_hp2" id="ap_hp2" style="width: 80px;height: 37px;" maxlength="4" value=""/>-<input type="text" name="ap_hp3" id="ap_hp3" style="width: 80px;height: 37px;" maxlength="4" value=""/> </dd>
				</dl>
				<dl>
					<dt style="font-weight:bold;"><strong class="dott">&nbsp;</strong> 이메일주소</dt>
					<dd><input type="email" name="ap_email" id="ap_email" value="" /></dd>
				</dl>

				<dl>
					<dt style="font-weight:bold;"><strong>&nbsp;</strong> 희망 대출액</dt>
					<dd><input type="number" name="ap_hope" value=""/> 만원</dd>
				</dl>
				<dl>
					<dt style="font-weight:bold;"><strong>&nbsp;</strong> 희망 대출 만기</dt>
					<dd><select name="ap_due">
							<option value="0">선택</option>
							<option value="1">3개월</option>
							<option value="2">6개월</option>
							<option value="3" selected>12개월</option>
							<option value="4">18개월</option>
							<option value="5">24개월</option>
							<option value="6">30개월</option>
							<option value="7">36개월</option>
							</select>
					</dd>
				</dl>
				<dl>
					<dt  style="font-weight:bold;"><strong>&nbsp;</strong> 보증재단 대출여부</dt>
					<dd style="font-size:13px;">타 보증재단(햇살론, 근로자생계보증대출(지역신용보증재단), 미소금융, 캠코소액대출, 신용회복위원회, 신용회복기금, 한마음금융) 대출이 있습니까? 
					<BR><input type="radio" name="ap_rb" value="y">&nbsp;예&nbsp;&nbsp;&nbsp;<input type="radio" name="ap_rb" value="n" checked>&nbsp;아니오
					</dd>
				</dl>
				<BR>
				<dl>
					<dt  style="font-weight:bold;"><strong>&nbsp;</strong> 신용상태여부</dt>
					<dd style="font-size:13px;">현재 고객님은 채무불이행(구 신용불량), 채무조정(신용회복, 개인회생) 상태입니까?  
					<BR><input type="radio" name="ap_rb1" value="y">&nbsp;예(신용불량)&nbsp;&nbsp;&nbsp;<input type="radio" name="ap_rb1" value="n" checked>&nbsp;아니오(정상)
					</dd>
				</dl>
				<BR>
				<dl>
					<dt style="font-weight:bold;"><strong>&nbsp;</strong> 연체 여부</dt>
					<dd style="font-size:13px;">현재 고객님은 연체 중 입니까?
					<BR><input type="radio" name="ap_rb2" value="y">&nbsp;예(연체중)&nbsp;&nbsp;&nbsp;<input type="radio" name="ap_rb2" value="n" checked>&nbsp;아니오(정상)
					</dd>
				</dl>	
				<BR>
				<dl>
					<dt class="new1"  style="font-weight:bold;"><strong>&nbsp;</strong> 금융회사 대출여부 </dt>
					<dd>
						<div class="float_selec" ><label style="width:10%;"><input type="checkbox" name="ap_card_1" value="y"></label>카드론&nbsp;&nbsp;</div><input type="text" class="wpcf9-text" style="width: 60px;height: 37px;margin-right:15px;" name="ap_card_2" value="" placeholder="총건수">&nbsp;
						<input type="text"  class="wpcf9-text" style="width: 9em;height: 37px;" name="ap_card_3" value="" placeholder="총금액">만원
						<BR>
						<div class="float_selec" ><label style="width:10%;">
						<input type="checkbox" name="ap_cash_1" value="y"></label>현금서비스 리볼빙&nbsp;</div>
						<input type="text" class="wpcf9-text" style="width: 60px;height: 37px;margin-right:15px;" name="ap_cash_2" placeholder="총건수">&nbsp;<input type="text"  class="wpcf9-text" style="width: 9em;height: 37px;" name="ap_cash_3" placeholder="총금액">만원
						<BR>
						<div class="float_selec" ><label style="width:10%;">
						<input type="checkbox" name="ap_house_1" value="y"></label>주택담보&nbsp;</div>
						<input type="text" class="wpcf9-text" style="width: 60px;height: 37px;margin-right:15px;" name="ap_house_2" placeholder="총건수">&nbsp;<input type="text"  class="wpcf9-text" style="width: 9em;height: 37px;" name="ap_house_3" placeholder="총금액">만원
						<BR>
						<div class="float_selec" ><label style="width:10%;"><input type="checkbox" name="ap_lent_1" value="y"></label>전세자금&nbsp;</div>
						<input type="text" class="wpcf9-text" style="width: 60px;height: 37px;margin-right:15px;" name="ap_lent_2" placeholder="총건수">&nbsp;<input type="text"  class="wpcf9-text" style="width: 9em;height: 37px;" name="ap_lent_3" placeholder="총금액">만원
						<BR>
						<div class="float_selec" ><label style="width:10%;"><input type="checkbox" name="ap_credit_1" value="y"></label>금융권 신용대출&nbsp;</div>
						<input type="text" class="wpcf9-text" name="ap_credit_2" style="width: 60px;height: 37px;margin-right:15px;" placeholder="총건수">&nbsp;
						<input type="text"  class="wpcf9-text" name="ap_credit_3" style="width: 9em;height: 37px;" placeholder="총금액">만원
						<BR>
						<div class="float_selec" ><label style="width:10%;"><input type="checkbox" name="ap_etc_1" value="y"></label>저축은행 캐피탈등&nbsp;</div>
						<input type="text" class="wpcf9-text" style="width: 60px;height: 37px;margin-right:15px;" name="ap_etc_2" placeholder="총건수">&nbsp;<input type="text"  class="wpcf9-text" style="width: 9em;height: 37px;" name="ap_etc_3" placeholder="총금액">만원
						<BR>
						<div class="float_selec" ><label style="width:10%;"><input type="checkbox" name="ap_loan_1" value="y"></label>대부업&nbsp;&nbsp;&nbsp;&nbsp;</div><input type="text" class="wpcf9-text" style="width: 60px;height: 37px;margin-right:15px;" name="ap_loan_2" placeholder="총건수">&nbsp;<input type="text"  class="wpcf9-text" style="width: 9em;height: 37px;" name="ap_loan_3" placeholder="총금액">만원						
					</dd>					
				</dl>
				<div class="copy-box1">
					<ul class="list-type3">
						<li>휴대폰과 이메일 주소가 정확하지 않으면 대출 진행이 불가능합니다.</li>
						<li>본인 명의의 휴대폰이 아닌 경우 대출 진행이 불가능 합니다. </li>
					</ul>	
					<p class="copy2">
						
						<div class = "check"><input type="checkbox" id="check_all1"  onclick="javascript:check_all_loan()"> 아래 내용을 확인하고 전체동의 합니다.</div><br>
						<!-- <div class = "check"><input type="checkbox" name="check_on" id="check_on1" class = "check" >서비스 이용약관에 동의합니다. [필수]<a href="javascript:openpri('/etc/terms.php');">[내용보기]</a></div><br> -->
						<div class = "check"><input type="checkbox" name="check_on" id="check_on1" class = "check" >개인신용정보 조회 동의합니다. [필수]<a href="javascript:openpri('/privacy1.html');">[내용보기]</a></div><br>
						<div class = "check"><input type="checkbox" name="check_on" id="check_on1" class = "check" >개인정보/개인신용정보 제공 동의합니다. [필수]<a href="javascript:openpri('/privacy2.html');">[내용보기]</a></div><br>
						<div class = "check"><input type="checkbox" name="check_on" id="check_on1" class = "check" >개인정보/개인신용정보 수집 및 이용 동의합니다. [필수]<a href="javascript:openpri('/privacy3.html');">[내용보기]</a></div><br>
						<div class = "check"><input type="checkbox" name="check_option" id="check_on1" class = "check" >개인정보/개인신용정보 수집 및 이용 동의합니다. [선택]<a href="javascript:openpri('/privacy4.html');">[내용보기]</a></div><br>

							
						



					<!-- 
					대출한도조회와 관련하여 귀사가 본인으로부터 취득한 개인정보를 수집ㆍ이용하고자 하는 경우에는 개인정보보호법 제15조 및 제22조, 정보통신망 이용촉진 및 정보보호 등에 관한 법률 제22조에 따라 동의를 얻어야 합니다. 이에 본인은 귀사가 아래의 내용과 같이 본인의 개인(신용)정보를 수집ㆍ이용하는데 동의합니다.<span>&nbsp;&nbsp;<a href="#">자세히보기</a></span>
					<br>
					<input type="radio" name="ap_yn" value="y">&nbsp;예&nbsp;&nbsp;&nbsp;<input type="radio" name="ap_yn" value="n" >&nbsp;아니오
					</p>
					<ul class="list-type3 mt-20">
						<li>대출상담 및 안내, 대출가능여부 및 한도 확인을 위한 상담사무, 본인여부 확인 등. </li>
						<li>개인식별정보(성명, 연락처), 직업정보(직업구분, 연소득) 등.</li>
						<li>수집된 개인정보는 이용목적 달성 시까지 보유•이용되며, 통화부재 등의 사유로 상담신청이 완료되지 못한 경우, 보유•이용기간은 최장 3개월을 초과하지 않습니다. 단, 이용목적 달성 후에는 금융사고 조사, 분쟁 해결, 민원처리, 법령상 의무이행을 위하여만 보유•이용됩니다.</li>
						<li>귀하는 동의를 거부할 권리가 있으나, 이에 대한 동의가 없을 경우 대출한도조회가 불가능 할 수 있음을 알려 드립니다.</li>
					</ul>-->	
				</div> 
			</form>
				<div class="btn-area">
					<a class="btn btn-big btn-centered btn-type1"  href="javascript:mbsubmit();"> <!-- href="/loan/loanComplete.php" -->
						<span>사전예약하기</span>
					</a>
				</div>
                <div class="listDiv"></div>
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
    function setChildValue(val){
      document.getElementById("birth_check").value = val;
	}

	function openkcb(){
		 var frm = document.isform;
         var url    ="/kcb/scd_step1.php";
		 var title  = "kcbpop";
		 var status = "toolbar=no,directories=no,scrollbars=yes,resizable=yes,status=no,menubar=no,width=480, height=590, top=0,left=20"; 
		 window.open("", title,status); 
		 frm.target = title;                 
		 frm.action = url;            
		 frm.method = "post";
		 frm.submit();     
	}

	function check_all_loan(){

			

				/*if(!document.isform.check_on1[i].checked){
					document.isform.check_on1[i].checked = true;
				} 
				}*/	

				if(document.isform.check_all1.checked){
				
				for(var j=0; j<4; j++){
					document.isform.check_on1[j].checked = true;
				}
				}else{
				for(j=0; j<4; j++){
					document.isform.check_on1[j].checked = false;
				}
			}
			

	}
	function openpri(urlvar){
		 var frm = document.isform;
         var url    = urlvar;
		 var title  = "pop";
		 var status = "toolbar=no,directories=no,scrollbars=yes,resizable=yes,status=no,menubar=no,width=680, height=700, top=0,left=20"; 
		 window.open("", title,status); 
		 frm.target = title;                 
		 frm.action = url;            
		 frm.method = "post";
		 frm.submit();     
	}

	function mbsubmit(){

		var ichk = "";

        if (document.isform.ap_name.value.length < 1) {
            alert("이름을 입력하세요.");
            document.isform.ap_name.focus();
        }else if (document.isform.ap_year.value=="" || document.isform.ap_month.value=="" || document.isform.ap_day.value=="") {
            alert("생년월일을 정확히 입력하세요.");
            document.isform.ap_year.focus();
        }else if (document.isform.ap_hp1.value=="" || (document.isform.ap_hp1.value!="010" && document.isform.ap_hp1.value!="017" && document.isform.ap_hp1.value!="019"  && document.isform.ap_hp1.value!="018")) {
            alert("휴대폰번호를 정확히 입력하세요.");
            document.isform.ap_hp1.focus();
        }else if (document.isform.ap_sex[0].checked == false && document.isform.ap_sex[1].checked == false) {
            alert("성별을 입력하세요.");
            document.isform.ap_sex.focus();
        }else if (document.isform.ap_email.value.length < 9) {
            alert("이메일을 입력하세요.");
            document.isform.ap_email.focus();
        }else if (document.isform.ap_hope.value=="") {
            alert("희망대출액을 입력하세요.");
            document.isform.ap_hope.focus();
        }else if (document.isform.ap_due.value=="") {
            alert("희망대출만기를 입력하세요.");
            document.isform.ap_due.focus();
        }else if (document.isform.ap_rb[0].checked == false && document.isform.ap_rb[1].checked == false) {
            alert("보증재단대출여부를 선택세요.");
            document.isform.ap_rb.focus();
        }else if (document.isform.ap_rb[0].checked == true && document.isform.ap_rb[1].checked == false) {
            alert("보증재단대출이 있으시면 심사진행이 안됩니다.");
            document.isform.ap_rb.focus();
        }else if (document.isform.ap_rb1[0].checked == false && document.isform.ap_rb1[1].checked == false) {
            alert("현재 고객님은 채무불이행여부를 선택세요.");
            document.isform.ap_rb1.focus();
        }else if (document.isform.ap_rb1[0].checked == true && document.isform.ap_rb1[1].checked == false) {
            alert("현재 고객님은 채무불이행 상태이시면 심사진행이 안됩니다.");
            document.isform.ap_rb1.focus();
        }else if (document.isform.ap_rb2[0].checked == false && document.isform.ap_rb2[1].checked == false) {
            alert("연체여부를 선택세요.");
            document.isform.ap_rb2.focus();
        }else if (document.isform.ap_rb2[0].checked == true && document.isform.ap_rb2[1].checked == false) {
            alert("연체중이시면 심사진행이 안됩니다.");
            document.isform.ap_rb2.focus();
        }else{
			 
				for(var i=0; i<3; i++){

				  if(!document.isform.check_on1[i].checked){

					switch(i){
					
					//case 0:	
					//	alert("서비스 이용약관에 동의하셔야 합니다.");
					//	 document.isform.check_on1[i].focus();
					//	break;
					case 0:
                        ichk = "1";
						alert("개인 신용정보 제공에 동의하셔야 합니다.");
						document.isform.check_on1[i].focus();
						break;
					case 1:
						ichk = "1";
						alert("개인(신용)수집, 이용에 동의하셔야 합니다.");
						document.isform.check_on1[i].focus();
						break;
					case 2:
						ichk = "1";
						alert("고유식별정도 처리방침에 동의하셔야 합니다. ");
						document.isform.check_on1[i].focus();
						break;
					
					}
					}
				}
	

			 var birthday=$("#ap_year").val()+$("#ap_month").val()+$("#ap_day").val();
			 var handphone=$("#ap_hp1").val()+$("#ap_hp2").val()+$("#ap_hp3").val();
			 var checkBox = document.isform.check_on1.length;
			 
			if(ichk == ""){		 
			
			    document.isform.submit();
			}
			
		}
	}

</script>
</body>
</html>
