
<?php include('../../include/incTop.php'); ?>
<body>
<?php include('../../include/incHeader.php'); ?>

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
            <h1>공지사항</h1>
          </div>
          <!-- .simple-heading end -->
          <ul class="breadcrumb">
            <li><a href="/index.php">Home</a></li>
           
            <li><span class="active">관리자 화면</span></li>
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
session_start(); 
include_once "../../comm/db_info.php"; 
	if ($_GET[mode]=="modify")
	{
	
		$sql = "select * from $_GET[table] where num=$_GET[num]";
		echo $sql;
		$result = mysql_query($sql, $conn);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		

		$copied_file_0 = $row[file_copied_0];
	
	}
?>

<script>
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요1");    
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
	//  document.board_form.action="news_insert.php?num=<?=$_GET[num]?>";
      document.board_form.submit();
   }
</script>



<div id="wrap">



  <div id="content">
	
	<div id="col2">       
		
		<div class="clear"></div>

		<div class="clear"></div>
<?
	if($_GET[mode]=="modify")
	{

?>
		<form  name="board_form" method="post" action="news_insert.php?mode=modify&num=<?=$_GET[num]?>&page=<?=$_GET[page]?>" enctype="multipart/form-data"> 
<?
	}
	else
	{
?>
		<form  name="board_form" method="post" action="news_insert.php?pageflag=<?=$_GET[pageflag]?>" enctype="multipart/form-data"> 
<?
	}
?>
		<div id="write_form">
			<div class="write_line"></div>
			<div id="write_row1"><div class="col1" style="color:#f26c5e"> 닉네임 </div><div class="col2">beyond</div></div>
			<div class="write_line"></div>
			<div id="write_row2"><div class="col1" style="color:#f26c5e"> 아이디   </div>
			                     <div class="col2"><input type="text" name="userid" value="beyond" ></div>
			</div>
			<div id="write_row2"><div class="col1" style="color:#f26c5e"> 제목   </div>
			                     <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row3"><div class="col1" style="color:#f26c5e"> 내용   </div>
			                     <div class="col2"><textarea rows="20" cols="100" name="content"><?=$item_content?></textarea></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row4"><div class="col1" style="color:#f26c5e"> 첨부파일1   </div>
			                     <div class="col2"><input type="file" name="upfile[]"> * 5MB까지 업로드 가능!</div>
			</div>

			<div class="write_line"></div>
			<div id="write_row5"><div class="col1" style="color:#f26c5e"> 기사용날짜   </div>
			                     <div class="col2"><input type="date" name="get_date" value="<?=$_GET[datetime]?>"></div>
			</div>

		
			<div class="clear"></div>
<? 	if ($_GET[mode]=="modify" && $item_file_0)
	{
?>
			<div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제</div>
			<div class="clear"></div>
<?
	}
?>
			
			</div>

			<div class="write_line"></div>
			<input type="hidden" name ="table" value="<?=$_GET[table]?>">
			<div class="clear"></div>
		</div>
	

		<div id="write_button" style="margin-top:30px;margin-right:30px;float:left;width:50px;"><span href="#" onclick="check_input()">글쓰기</span>&nbsp;</div>
		
		<div style="float:left;width:50px;margin-top:30px;">
		<a href="../news_board.php" >리스트 </a>
		</div>

		</form>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</div>

</body>

<?php include('../../include/incFooter.php'); ?>

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
<script>
function board_1(){
document.board_1.action = "../news_board.php";
document.board_1.submit();
}

function board_2(){
document.board_2.action = "../news_board.php";
document.board_2.submit();
}
</script>