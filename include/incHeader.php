<?php
session_start();


?>
		<!-- .header-wrapper start -->
        <div id="header-wrapper" >
            <!-- #header.dark start -->
            <header id="header" class="dark">

                <!-- Main navigation and logo container -->
                <div class="header-inner">
                    <!-- .container start -->
                    <div class="container">
                        <!-- .main-nav start -->
                        <div class="main-nav">
                            <!-- .row start -->
                            <div class="row">
                                <div class="col-md-12 triggerAnimation animated" data-animate='fadeInDown'>
                                    <!-- .navbar.pi-mega start -->
                                    <nav class="navbar navbar-default nav-left pi-mega">									

                                        <!-- .navbar-header start -->
                                        <div class="navbar-header">
                                            <!-- .logo start -->
                                            <div class="logo">
                                                <a href="/">
                                                    <img src="/img/30cut_logo.png" alt="30CUT">
                                                </a>
                                            </div><!-- logo end -->
                                        </div><!-- .navbar-header end -->

                                        <!-- Collect the nav links, forms, and other content for toggling -->
                                        <div class="collapse navbar-collapse">
                                            <ul class="nav navbar-nav pi-nav">

                                                <li class="dropdown">
                                                    <a href="/loan/loanInfo.php">대출</a>                                          
                                                </li>

												

												 <li class="dropdown">
                                                    <a href="/clinic/clinicInfo.php">부채클리닉</a>                                          
                                                </li>

												<li class="dropdown"><a href="/#" data-toggle="dropdown" class="dropdown-toggle">회사소개</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="/aboutUs/30Cut.php">30CUT 소개</a></li>
                                                        <li><a href="/aboutUs/company.php">기업소개</a></li>
														<li><a href="/aboutUs/news_board.php?pageflag=1">공지사항</a></li> 
														<li><a href="/aboutUs/news_board.php?pageflag=2">뉴스센터</a></li>
                                                    </ul>
                                                </li>

												<li class="dropdown"><a href="/#" data-toggle="dropdown" class="dropdown-toggle">고객지원</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="/customer/faqLoan.php">자주하는 질문</a></li>
                                                        <li><a href="/customer/contact.php">연락하시는 곳</a></li>
														<li><a href="/customer/invest_qna.php">투자/제휴 문의</a></li>
                                                    </ul>
                                                </li>

												<li class="dropdown">
                                                    <a href="/invest/investInfo.php">투자</a>                                          
                                                </li>

												<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">내 서비스</a>
                                                    <ul class="dropdown-menu">
                                                       <?php
														if($_SESSION['user_email']) {
														?>
														
														<li><a href="/myService/privacyAccount.php">정보/비밀번호 변경</a></li>
														<!-- javascript:Frameset('/myService/privacyAccount.php')  onclick="javascript:layer_open12('layer221');return false;"-->
														
                                                         <li><a href="/myService/integratedQuery.php">통합조회</a></li>
                                                        <!--<li><a href="/myService/investmentTransactions.php">투자거래내역</a></li>
                                                        <li><a href="#" onclick="javascript:layer_open12('layer221');return false;"">통합조회</a></li>  -->
                                                       <!--  <li><a href="#" onclick="javascript:layer_open12('layer221');return false;"">투자거래내역</a></li> -->
														
                                                      <!--   <li><a href="#" onclick="javascript:layer_open12('layer221');return false;"">통합조회</a></li><!--  -->
														<?}?>
                                                    </ul>
                                                </li>
<?php

if(!isset($_SESSION['user_email'])) {

?>
												<li class="dropdown" >
                                                    <a href="/login/login.php"><img src="/img/common/ico_login.png" style="padding:21px 0"></a>                                          
                                                </li>

												<!--<li class="dropdown" ><!-- /join/enterEmail.php') 
                                                    <a href="#" onclick="javascript:layer_open12('layer221');return false;"><img src="/img/common/ico_member.png" style="padding:21px 0"></a>
                                                </li>-->
												<li class="dropdown" >
                                                    <a href="/join/enterEmail.php"><img src="/img/common/ico_member.png" style="padding:21px 0"></a>
                                                </li>
<?
}else{
$user_email = $_SESSION['user_email'];
?>   
												<li class="dropdown">
                                                        <a href="../login/logout.php">로그아웃</a><!-- /join/enterEmail.php -->
														
                                                </li><!-- Contact li end -->

												
<?}?>
                                            </ul><!-- .nav.navbar-nav.pi-nav end -->

											<!-- Responsive menu start -->
                                            <div id="dl-menu" class="dl-menuwrapper">
                                                <button class="dl-trigger">Open Menu</button>

                                                <ul class="dl-menu">

												   <li>
                                                        <a href="/loan/loanInfo.php">대출</a>
                                                   </li><!-- Services li end -->
                                                   
                                                   <li class="dropdown">
                                                    <a href="/clinic/clinicInfo.php">부채클리닉</a>                                          
                                                   </li>                                                   

													<li>
                                                        <a href="/#">회사소개</a>
                                                        <ul class="dl-submenu">
                                                            <li><a href="/aboutUs/30Cut.php">30 Cut 소개</a></li>
															<li><a href="/aboutUs/company.php">기업소개</a></li>
                                                        </ul><!-- .dl-submenu end -->
                                                    </li><!-- Mega menu li end -->

													<li>
                                                        <a href="/#">고객지원</a>
                                                        <ul class="dl-submenu">
                                                           <li><a href="/customer/faqLoan.php">자주하는 질문</a></li>
                                                        <li><a href="/customer/contact.php">연락하시는 곳</a></li>
                                                        </ul><!-- .dl-submenu end -->
                                                    </li><!-- Mega menu li end -->

													<li>
                                                        <a href="/invest/investInfo.php">투자</a>
                                                   </li><!-- News li end -->

													<li>
                                                        <a href="/myService/privacy.php">내 서비스</a>
                                                        <ul class="dl-submenu">
															 <li><a href="#" onclick="javascript:layer_open12('layer221');return false;">정보/비밀번호 변경</a></li><!-- /myService/privacyAccount.php -->
															<li><a href="#" onclick="javascript:layer_open12('layer221');return false;">통합조회</a></li><!-- /myService/integratedQuery.php -->
															<!-- <li><a href="">투자거래내역</a></li> --><!-- /myService/investmentTransactions.php -->
                                                        </ul><!-- .dl-submenu end -->
                                                    </li><!-- About company li end -->

                                                    <li>
                                                         <a href="/login/login.php"><img src="/img/common/ico_login.png"></a>
                                                    </li><!-- Pricing li end -->

                                                    <li>
                                                        <a  href="#" onclick="javascript:layer_open12('layer221');return false;"><img src="/img/common/ico_member.png"></a>
                                                    </li><!-- Contact li end href="/join/enterEmail.php"-->

                                                </ul><!-- .dl-menu end -->
                                            </div><!-- (Responsive menu) #dl-menu end -->

                                            <!-- #search start 
                                            <div id="search" class="search-type-1">
                                                <form action="#" method="get">
                                                    <span class="search-submit-wrapper"><input class="search-submit" type="submit" /></span>
                                                    <div id="search-box">
                                                        <input id="m_search" name="s" type="text" placeholder="Search" />
                                                        <input class="inner-search-submit" type="submit" value="" />
                                                        <a href="/#" class="close-search"></a>
                                                    </div>
                                                </form>
                                            </div>--><!-- #search end -->
                                        </div><!-- .navbar.navbar-collapse end --> 
                                    </nav><!-- .navbar.pi-mega end -->
                                </div><!-- .col-md-12 end -->
                            </div><!-- .row end -->            
                        </div><!-- .main-nav end -->
                    </div><!-- .container end -->
                </div><!-- .header-inner end -->
            </header><!-- #header.dark end -->
        </div><!-- #header-wrapper end -->



<form method="post" id="logout" name="logout">
<input type="hidden" name="logout" value="1">
</form>

<script>
function send_tbinfo(){
document.tbinfo.action ="/aboutUs/news_board.php?board_num=1";
document.tbinfo.submit();
}

function send_uninfo(){
document.uninfo.action ="/aboutUs/news_board.php?board_num=1";
document.uninfo.submit();
}

function log_out(){
	document.logout.submit();
document.location.reload();
}
</script>

		