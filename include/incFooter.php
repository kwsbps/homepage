<!-- #footer-wrapper start -->
<div id="footer-wrapper" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<!-- #footer start -->
	<footer id="footer">
		<div class="container">
		  <div class="row row2">
		   
			<ul class="sns">

				<li><a href="https://www.facebook.com/30cut" target="_blank"><img src="/img/common/icoFacebook.png" alt="" /></a></li>
				<li><a href="http://blog.naver.com/30cut" target="_blank"><img src="/img/common/icoBlog.png" alt="" /></a></li>
				<li><a href="http://p2plending.or.kr/page_msgp52"><img  class="footer_op3" src="/img/main/footer_p2p_1.png" alt="" /></a></li>
			</ul>
			<ul class="foot-menu">
				<li class="footer_op2"><a href="/aboutUs/30Cut.php">30CUT 소개</a></li>
				<!-- <li><a href="/etc/terms.php">이용약관</a></li> -->
				<li><a href="/etc/privacy.php">개인정보취급방침</a></li>
			</ul>
			
			<div class="footer_op" style="float:left;width:160px;height:180px;" >
			<img src="/img/main/footer_p2pmark.png" style="width:80%">
			</div>
			<div  class="col-md-4" style="padding-left:0px">
			<p class="foot-info">
			비욘드플랫폼서비스 (주)<br />
			대표이사 서준섭 <span>사업자등록번호 761-81-00195</span><br />
			전화번호 1661.0301 E-mail ask@30cut.com  <br />
			서울시 강남구 봉은사로 437 소암빌딩 3F  <br />
			© Copyright 2015. 30CUT Inc. All rights reserved.
			</p>
			
			</div>
			<div  class="col-md-4">
			<p class="foot-info">
			<!-- [여신기관]<BR> NH농협<br />
			대표이사 김병원 <BR>사업자등록번호 104-82-07072<br />
			서울시 중구 새문안로  --> 
			</p>
			
			</div>
			
           </div>
		</div>
	</footer>                
	<a href="/#" class="scroll-up">UP</a>
</div><!-- #footer-wrapper end -->
<style type="text/css">

.layer551 {display:none; position:fixed; _position:absolute; top:0; left:0; width:100%; height:100%; z-index:100;}
.layer551 .bg {position:absolute; top:0; left:0; width:100%; height:100%; background:#000; opacity:.5; filter:alpha(opacity=50);}
.layer551 .pop-layer221 {display:block;}
.pop-layer221 {display:none; position: absolute; top: 40%; left: 50%; width: 410px; height:110px;  background-color:#fff; border: 5px solid #3571B5; z-index: 10;}  
.pop-layer221 .pop-container221 {padding: 20px 25px;}
.pop-layer221 .btn-r {width: 100%; margin:0px 0 0px; padding-top: 1px; border-top: 0px solid #DDD; text-align:right;}
a.cbtn1 {display:inline-block; height:25px; padding:0 14px 0; border:1px solid #304a8a; background-color:#3f5a9d; font-size:13px; color:#fff; line-height:25px;} 
a.cbtn1:hover {border: 0px solid #091940; background-color:#1f326a; color:#fff;}
.footer_op2 {margin-left:160px;}


@media screen and (max-width: 480px) 
{

.footer_op {display:none;}
.footer_op2 {margin-left:0px;}
.footer_op3 {width:85pt !important;}
.layer551 {display:none; position:fixed; _position:absolute; top:0; left:0; width:100%; height:100%; z-index:100;}
.layer551 .bg {position:absolute; top:0; left:0; width:100%; height:100%; background:#000; opacity:.5; filter:alpha(opacity=50);}
.layer551 .pop-layer221 {display:block;}
.pop-layer221 {display:none; position: absolute; top: 40%; left: 50%; width: 360px; height:110px;  background-color:#fff; border: 5px solid #3571B5; z-index: 10;}  
.pop-layer221 .pop-container221 {padding: 20px 25px;}
.pop-layer221 .btn-r {width: 100%; margin:0px 0 0px; padding-top: 1px; border-top: 0px solid #DDD; text-align:right;}
a.cbtn1 {display:inline-block; height:25px; padding:0 14px 0; border:1px solid #304a8a; background-color:#3f5a9d; font-size:13px; color:#fff; line-height:25px;} 
a.cbtn1:hover {border: 0px solid #091940; background-color:#1f326a; color:#fff;}

}

</style>
<SCRIPT LANGUAGE="JavaScript"> 
		function Frameset(page) { 
			
			framecode = "<frameset rows='1*'>" 
+ "<frame name=main src='" + page + "'>" 
+ "</frameset>"; 


document.write(framecode); 
document.close(); 
} 

 function btnclc(){
   document.form_signup.submit();
 }
 function layer_open1(el){

	var temp = $('#' + el);
	var bg = temp.prev().hasClass('bg'); 

	if(bg){
		$('.layer55').fadeIn();
	}else{
		temp.fadeIn();
	}

	if (temp.outerHeight() < $(document).height() ){
	    temp.css('margin-top', '-'+temp.outerHeight()/2+'px');
	}else{
	    temp.css('top', '0px');
	}

	if (temp.outerWidth() < $(document).width() ){
		temp.css('margin-left', '-'+temp.outerWidth()/2+'px');
	}else{
		temp.css('left', '0px');
	}

	temp.find('a.cbtn').click(function(e){

		if(bg){
			$('.layer55').fadeOut();
	}else{

		temp.fadeOut();
	}
		e.preventDefault();
	});

	$('.layer55 .bg').click(function(e){
	$('.layer55').fadeOut();
	e.preventDefault();
	});

}         

 function layer_open12(el){

	var temp = $('#' + el);
	var bg = temp.prev().hasClass('bg'); 

	if(bg){
		$('.layer551').fadeIn();
	}else{
		temp.fadeIn();
	}

	if (temp.outerHeight() < $(document).height() ){
	    temp.css('margin-top', '-'+temp.outerHeight()/2+'px');
	}else{
	    temp.css('top', '0px');
	}

	if (temp.outerWidth() < $(document).width() ){
		temp.css('margin-left', '-'+temp.outerWidth()/2+'px');
	}else{
		temp.css('left', '0px');
	}

	temp.find('a.cbtn1').click(function(e){

		if(bg){
			$('.layer551').fadeOut();
	}else{

		temp.fadeOut();
	}
		e.preventDefault();
	});

	$('.layer551 .bg').click(function(e){
	$('.layer551').fadeOut();
	e.preventDefault();
	});

}         


</script>



<div class="layer551">
<div class="bg"></div>
<div class="pop-layer221" id="layer221">

<div class="pop-container221">


<p class="ctxt mb20">서비스 준비중입니다.</p>
<div class="btn-r">
<a class="cbtn1" href="#">Close</a>

</div>

</div>
</div>
</div>
