<!DOCTYPE HTML>
<html>

<?php include('../include/incTop.php'); ?>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
<?php include('../include/incHeader.php'); ?>
<?php include_once "../comm/db_info.php"; 

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
            <h1>비욘드플랫폼서비스<span>대한민국 No. 1 핀테크 P2P 금융 플랫폼
</span></h1>
          </div>
          <!-- .simple-heading end -->
          <ul class="breadcrumb">
            <li><a href="/index.php">Home</a></li>
            <li>30cut소개</li>
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
  </div>
  <!-- .page-content end -->
  <!-- //visual -->
  <!-- .page-content start -->


<? 
	
	session_start(); 
	
	$userid = $_SESSION['user_email'];

	$sql = "select * from $_GET[table] where num=$_GET[num] and flag=$_GET[pageflag]"; // flag value 1: 뉴스   2: 언론속에 비친 30cut
	
	
	$result = mysql_query($sql, $conn);

    $row = mysql_fetch_array($result);       

	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$file_name[0]   = $row[file_name_0];


	$file_type[0]   = $row[file_type_0];


	$file_copied[0] = $row[file_copied_0];


    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = str_replace(" ", "&nbsp;", $row[content]);
	$item_content = str_replace("\n", "<br>", $item_content);
	
	


	//내용에 엔터를 입력
	//$item_content

	$new_hit = $item_hit + 1;

	$sql = "update $_GET[table] set hit=$new_hit where num=$_GET[num]";  
	mysql_query($sql, $conn);


?>



<div id="wrap">


  <div id="content">

	<div id="col2">     
	
		<div id="view_comment"> &nbsp;</div>

		<div id="view_title" style="height:40px;">
			<div id="view_title1" ><?= $item_subject ?></div><div id="view_title2"> 조회수 :   <?= $item_hit ?>  
			               <!-- <?= $item_date ?> --> </div>	
		</div>


		<div id="view_content">
<?
	
		if ($userid && $file_copied[0])
		{
			$show_name = $file_name[0];
			$real_name = $file_copied[0];
			$real_type = $file_type[0];
			$file_path = "./boardFunc/data/".$real_name;
			$file_size = filesize($file_path);

			
			     
		}
	
?>
		    <br>
			<!-- <?php if($file_path){?> -->
			<p style = "padding-bottom:50px;"><img src="<?=$file_path?>" style="width:70%"></p>
			<!-- <?php }?> -->
			<p style = "padding-bottom:50px;font-size:16px;width:100%;word-break:break-all;margin-top:0px;"><?= $item_content ?></p>
		</div>
<?
if($_GET[pageflag] == '1'){
?>
		<div id="view_button">
				<a href="./news_board.php?pageflag=1"><img src="../img/aboutUs/board_btn.png"></a>&nbsp;
					</div>
<?
			}else{
?>
		<div id="view_button">
				<a href="./news_board.php?pageflag=2"><img src="../img/aboutUs/board_btn.png"></a>&nbsp;
					</div>
<?
				}
?>

<? 
if($userid=='1234')
{
?>
	<a href="./boardFunc/news_write.php?table=<?=$_GET[table]?>&mode=modify&num=<?=$item_num?>&page=<?=$_GET[page]?>&pageflag=<?=$_GET[pageflag]?>&
	datetime=<?=$_GET[datetime]?>">수정</a>&nbsp;

	<a href="javascript:del('./boardFunc/news_delete.php?table=<?=$_GET[table]?>&num=<?=$item_num?>&pageflag=<?=$_GET[pageflag]?>')">삭제</a>&nbsp;
<?
	}
?>
	
 

		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->
</div>

<form method="post" id="tbinfo1" name="tbinfo1">
<input type="hidden" name="pageflag" value=<?=$_GET[pageflag]?>>

</form>


<form method="post" id="modify" name="modify">
<input type="hidden" name="pageflag" value=<?=$_GET[pageflag]?>>

</form>



</body>
</html>

<?php include('../include/incFooter.php'); ?>

<script src="/js/jquery-2.1.4.min.js"></script><!-- jQuery library -->
<script src="/js/bootstrap.min.js"></script><!-- .bootstrap script -->
<script src="/js/jquery.scripts.min.js"></script><!-- modernizr, retina, stellar for parallax -->  
<script src='/owl-carousel/owl.carousel.min.js'></script><!-- Carousels script -->
<script src="/js/jquery.dlmenu.min.js"></script><!-- for responsive menu -->
<script src="/js/include.js"></script><!-- custom js functions -->


<script>
    function del(href) 
    {
        if(confirm("삭제시 복구할 수 없습니다. 정말로 삭제하시겠습니까?")) {
                document.location.href = href;
        }
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


<script>

function modify(){
document.modify.action= "./boardFunc/news_write.php?mode=modify&num="+<?=$item_num?>+"&page"+<?=$_GET[page]?>;
document.modify.submit();
}
</script>