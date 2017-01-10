


<?php include('../include/incTop.php'); ?>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
<?php include('../include/incHeader.php'); 

?>

<? 

	session_start();

	//if(!isset($_SESSION["username"])){
	//   header("Location: /bbs/login/login_form.php");
	//}

	$table = "board";
	
	$userid = $_SESSION[user_email];
	$getdate = $_POST[get_date];
	$pageflag = $_GET[pageflag];
	if(!isset($pageflag)){
		$pageflag='1';
	}
	include_once "../comm/db_info.php";
	//if($table){

	// header("Location:/news/list.php?table=$table");

?>

<?
if($pageflag == '1'){
?>
<!-- sub-wrap -->
<div class="sub-wrap company">
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
            <h1>공지사항/30CUT News</h1>
          </div>
          <!-- .simple-heading end -->
          <ul class="breadcrumb">
            <li><a href="/index.php">Home</a></li>
            <li>30CUT 소개</li>
			<li>기업소개</li>
            <li><span class="active">공지사항</span></li>
          </ul>
          <!-- .breadcrumb end -->
        </div>
        <!-- .col-md-12 end -->
      </div>
      <!-- .row end -->
    </div>
    <!-- .container end -->
  </div>
  <!-- .page-content end -->
  <!-- //visual -->
  <!-- .page-content start -->
<?
}else{
?>
<!-- sub-wrap -->
<div class="sub-wrap company">
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
            <h1>공지사항/30CUT News</h1>
          </div>
          <!-- .simple-heading end -->
          <ul class="breadcrumb">
            <li><a href="/index.php">Home</a></li>
            <li>30CUT 소개</li>
			<li>기업소개</li>
            <li><span class="active">뉴스센터</span></li>
          </ul>
          <!-- .breadcrumb end -->
        </div>
        <!-- .col-md-12 end -->
      </div>
      <!-- .row end -->
    </div>
    <!-- .container end -->
  </div>
  <!-- .page-content end -->
  <!-- //visual -->
  <!-- .page-content start -->


<?
}
?>

<?




	 $sql = "select * from $table where flag=$pageflag";
	$result = mysql_query($sql, $conn);

	$scale=30;			// 한 화면에 표시되는 글 수
  
    if ($_GET[mode]=="search")
	{
		if(!$_POST[search])
		{
			
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $_POST[find] like '%$_POST[search]%' and flag =$pageflag order by num desc ";
	}
	else
	{
	

		$sql = "select * from $table where flag = $pageflag order by regist_day desc";
	}
	
   
	
	$result = mysql_query($sql, $conn);
	echo $result[name];
	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 

		//PAGE값 초기화
		$page = $_GET[page];

	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>


<div id="wrap">
<!-- 
	<div id="header">
		
		<? include "./login/top_login.php"; ?>
	</div>  -->  <!-- end of header -->
  <div id="content">

	<div id="col2">        

		<!-- <form  name="board_form" method="post" action="news_board.php?table=<?=$table?>&mode=search&pageflag=<?=$pageflag?>"> 
		<div id="list_search">
			
			<div id="list_search3">
				<select name="find">
                    <option value='subject'>제목</option>
                    <option value='content'>내용</option>
                    <option value='nick'>별명</option>
                    <option value='name'>이름</option>
				</select></div>
			<div id="list_search4"><input type="text" name="search"></div>
			<div id="list_search5"><input type="image" src="../bbs/img/list_search_button.gif"></div>
		</div>
		</form>

		<div class="clear"></div> -->

		

		<div id="list_content">
		
		
		<!--리스트에 목록 보이기-->
<?	

	$j=0;
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];
	  $item_getdate	= $row[get_date];

      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  

	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
	$j++;

	
?>
<?
	if($j <= 2 && $pageflag == '1' ){
	
?>
			<div id="list_item">
				<div id="list_item1" style="color:#f26c5e;">공지</div>
				<div id="list_item2"><a href="news_view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>&pageflag=<?=$pageflag?>"><span style="color:#f26c5e;font-weight:bold;"><?= $item_subject ?></span></a></div>
				
				<div id="list_item4" style="color:#f26c5e;"><?= $item_date ?></div>
			</div>

<?
$number--;
}else if ($j > 2 && $pageflag == '1'){

?>
			<div id="list_item">
				<div id="list_item1"><?= $number ?></div>
				<div id="list_item2"><a href="news_view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>&pageflag=<?=$pageflag?>"><?= $item_subject ?></a></div>
				
				<div id="list_item4"><?= $item_date ?></div>
			</div>

<?
   	 $number--;  
	}else{
?>	
		<div id="list_item">
				<div id="list_item1" style="color:#f26c5e;"><?=$item_getdate?></div>
				<div id="list_item2"><a href="news_view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>&pageflag=<?=$pageflag?>&datetime=<?=$item_getdate?>"><span style="color:#f26c5e;font-weight:bold;"><?= $item_subject ?></span></a></div>
				
				
			</div>


<?
	}
   }
?>
			<div id="page_button">
				<div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='news_board.php?table=$table&page=$i'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
				</div>
				
<?			
	if($userid == '1234')
	{
?>
	<!--<a href="javascript:write_content1()">관리자 글쓰기</a>-->
	<a href="./boardFunc/news_write.php?table='<?=$table?>'&pageflag='<?=$pageflag?>'">관리자 글쓰기</a>
<?
	}
?>
			
				
		
<form name ="write1" id="write1" method ="post">
<input type="hidden" name="table" value="<?=$table?>">
<input type="hidden" name="pageflag" value="<?=$pageflag?>">
</form>



			</div> <!-- end of page_button -->
		
        </div> <!-- end of list content -->

		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->
</div>
</body>

<?php include('../include/incFooter.php'); ?>

<script src="/js/jquery-2.1.4.min.js"></script><!-- jQuery library -->
<script src="/js/bootstrap.min.js"></script><!-- .bootstrap script -->
<script src="/js/jquery.scripts.min.js"></script><!-- modernizr, retina, stellar for parallax -->  
<script src='/owl-carousel/owl.carousel.min.js'></script><!-- Carousels script -->
<script src="/js/jquery.dlmenu.min.js"></script><!-- for responsive menu -->
<script src="/js/include.js"></script><!-- custom js functions -->

<script>
function write_content1(){
document.write1.action ="./boardFunc/news_write.php";
document.write1.submit();

		}
</script>