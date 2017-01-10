<?php include('../include/incTop.php'); ?>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false"> 
<?php include('../include/incHeader.php'); ?>
<!-- sub-wrap -->
<div class="sub-wrap join">
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
						<h1>회원가입</span></h1>
					</div><!-- .simple-heading end -->
					<ul class="breadcrumb">
						<li><a href="/index.php">Home</a></li>
						<li><span class="active">회원가입</span></li>
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
						<h2>30CUT 회원가입</h2>
					</section>
				</div><!-- .col-md-12 end -->
			</div><!-- .row end -->
			<!-- .row start -->
			<!--<div class="row">
				<div class="login-cont">
					<div class="login-area">
						<div class="btn-area centered">
							<a class="btn btn-big btn-centered btn-facebook" href="javascript:checkLoginState();">
								<span>페이스북 계정으로 가입</span>
							</a>
						</div>
						<p>
						또는</p>
						 <!-- form start -->
						<form class="wpcf7" method="post" name="frm" id="frm">

							<fieldset>
								<span class="wpcf7-form-control-wrap your-email">
									<input type="text" name="email" class="wpcf7-text" id="email" placeholder="Email 주소"  required>
								</span>
							</fieldset>

							<fieldset>
								<span class="wpcf7-form-control-wrap subject">
									<input type="text" class="wpcf7-text" id="password" name="password" placeholder="비밀번호" required>
								</span>
							</fieldset>
							<!-- <p class="copypoint">잘못 된 형식의 메일 주소입니다.</p> -->
							
							
							<div class="btn-area">
								<a class="btn btn-big btn-centered btn-type1" onclick="submit_account()">
									<span>회원가입</span>
								</a>
							</div>


							<p>회원가입을 하시면 <a href="/etc/terms.php">이용약관</a>과<br /> <a href="/etc/privacy.php">개인정보취급방침</a>에 동의하게 됩니다.</p>
						</form><!-- .wpcf7 end -->
					</div>
					

					<div class="forget-area">
						<dl>
							<dt>이미 회원이세요?</dt>
							<dd><a href="/login/login.php">로그인</a></dd>
						</dl>
						<dl>
							<dt>아이디를 잊으셨나요?</dt>
							<dd><a href="/login/findID.php">아이디 찾기</a></dd>
						</dl>
						<dl>
							<dt>비밀번호를 잊으셨나요?</dt>
							<dd><a href="/login/findPW.php">비밀번호 찾기</a></dd>
						</dl>
						<p>관리자문의 : admin@30cut.com<br />전화번호 : 1661-0301</p>
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
function submit_account(){
	
document.frm.action="mb_insert.php";
document.frm.submit();	
}


</script>


<script>
// This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
console.log('statusChangeCallback');
console.log(response);
// The response object is returned with a status field that lets the
// app know the current login status of the person.
// Full docs on the response object can be found in the documentation
// for FB.getLoginStatus().
if (response.status === 'connected') {
// Logged into your app and Facebook.
testAPI();
} else if (response.status === 'not_authorized') {
	FB.login();
// The person is logged into Facebook, but not your app.
document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
} else {
	FB.login();
// The person is not logged into Facebook, so we're not sure if
// they are logged into this app or not.
document.getElementById('status').innerHTML = 'Please log ' + 'into Facebook.';
}
}
 
// This function is called when someone finishes with the Login
// Button. See the onlogin handler attached to it in the sample
// code below.
function checkLoginState() {
FB.getLoginStatus(function(response) {
statusChangeCallback(response);
});
}
 
window.fbAsyncInit = function() {
FB.init({
appId : '542551265896685',
cookie : true, // enable cookies to allow the server to access
// the session
xfbml : true, // parse social plugins on this page
version : 'v2.0' // use version 2.0
});
 
// Now that we've initialized the JavaScript SDK, we call
// FB.getLoginStatus(). This function gets the state of the
// person visiting this page and can return one of three states to
// the callback you provide. They can be:
//
// 1. Logged into your app ('connected')
// 2. Logged into Facebook, but not your app ('not_authorized')
// 3. Not logged into Facebook and can't tell if they are logged into
// your app or not.
//
// These three cases are handled in the callback function.
 
FB.getLoginStatus(function(response) {
statusChangeCallback(response);
});
 
};
 
// Load the SDK asynchronously
(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
 
// Here we run a very simple test of the Graph API after login is
// successful. See statusChangeCallback() for when this call is made.
function testAPI() {
//console.log('Welcome! Fetching your information.... ');
		FB.api('/me', function(response) {
			$.post("./login.php",{name: response.name, id: response.id+'__fac', facebook:"facebook"},
				function(postphpdata){
				alert(postphpdata);
					
				   
				});
			//console.log('Successful login for: ' + response.name);
			//document.getElementById('status').innerHTML =
			//'Thanks for logging in, ' + response.name + '!';
			//alert(response.name);
		});

}

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
