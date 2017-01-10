<?php include('../include/incTop.php'); ?>
<body>
<?php include('../include/incHeader.php'); ?>
<?
@extract($_GET);
@extract($_POST);
@extract($_SERVER);

include "../comm/class.member.php";
include "../comm/var.inc.php";
include "../comm/function.inc.php";
include "../comm/db_info.php";

$array_total_return_method3 = Array("12"=>"원리금균등12", "24"=>"원리금균등24", "36"=>"원리금균등36" );

$out_money = str_replace(",", "", $out_money);
if ($out_money > 0 && $return_cnt > 0 && $normal_ratio > 0) {
	$aaa = ceil(PMT($normal_ratio, $return_cnt, $out_money) / 1000) * 1000;
	$return_money = number_format($aaa);
}

if(!$contract_date) $contract_date = date("Y-m-d");

$contract_date_day = substr($contract_date,-2,2);
//$month = $contract_date.getDate();

//$year = $contract_date.getYear();
$year = substr($contract_date,0,4);
$month = substr($contract_date,5,2);

//echo $year.' '.$month.' '.$contract_date_day.$lastday;




?>


<!-- sub-wrap -->
<div class="sub-wrap aboutUs">
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
						<h1>대출이자계산기</span></h1>
					</div><!-- .simple-heading end -->
					<ul class="breadcrumb">
						<li><a href="/index.php">Home</a></li>
						<li><span class="active">대출이자계산기</span></li>
					</ul><!-- .breadcrumb end -->
				</div><!-- .col-md-12 end -->
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div><!-- .page-content end -->
	<!-- //visual -->

	<!-- .page-content start -->
	<div class="cont-type1 bg-type4">
		<div class="container">
			<section class="simple-heading centered">
				<h2 class="type2">대출이자 계산기</h2>
			</section>
			<style>
			input{
				text-align:right;
			}
			.btn-grayborder{
				border:solid gray 1px;
			}
			.table-bordered>tbody>tr>td{
				padding: 4px 0px 4px 0px;
				text-align: center;
			}
			</style>

	<div id="nav_container">
		<div id="nav_content">

			<!--body-->
			<div class="container">
				<div>
					<ul class="nav nav-pills nav-justified">
						<li id="nav1" role="presentation" class="active"><a href="#" style="border:1px solid #f26c5e;background-color:#f26c5e">원리금균등상환</a></li>
						<!-- <li id="nav2" role="presentation"><a href="#" style="border:1px solid #EEEEEE">원금균등상환</a></li>
						<li id="nav3" role="presentation"><a href="#" style="border:1px solid #EEEEEE">원금만기일시상환</a></li> -->
					</ul>
					<hr>
				</div>
				<form name=form method=post onsubmit="sendit(); return false;">
		        <input type="hidden" name="action" value="OK">
				<div class="box1s" style="padding:5px 5px">
					<div class="form-group">
						<label class="col-sm-2 control-label">대출금(원)</label>
						<div class="col-sm-9">
							<div class="input-group">
								<input id="out_money" name="out_money" class="form-control" type="number" value="0">
														
							</div>
							<div id="loan_han"></div>
							<div class="input-group">
								<input type="button" id="loan_del_btn" class="btn btn-warning" value="Del"/>
								<input type="button" id="loan_1000000_btn" class="btn btn-default" value="100만원"/>
								<input type="button" id="loan_5000000_btn" class="btn btn-default" value="500만원"/>
								<input type="button" id="loan_10000000_btn" class="btn btn-default" value="1,000만원"/>
								<input type="button" id="loan_50000000_btn" class="btn btn-default" value="5,000만원"/>
								
							</div>
						</div>
					</div>
				</div>

				<div class="box1s" style="padding:5px 5px">
					<div class="form-group">
						<label class="col-sm-2 control-label">대출금리(%)</label>
						<div class="col-sm-9">
							<div class="input-group">
								<input id="normal_ratio" name="normal_ratio" class="form-control" type="number" value="0">
								<div class="input-group-addon"> </div>
							</div>
							<div class="input-group">
								<input type="button" id="rate_del_btn" class="btn btn-warning" value="Del"/>
								<input type="button" id="rate_10_btn" class="btn btn-default" value="10.0%"/>
								<input type="button" id="rate_11_btn" class="btn btn-default" value="11.0%"/>
								<input type="button" id="rate_12_btn" class="btn btn-default" value="12.0%"/>
								<input type="button" id="rate_13_btn" class="btn btn-default" value="13.0%"/>
								<input type="button" id="rate_14_btn" class="btn btn-default" value="14.0%"/>
								<input type="button" id="rate_15_btn" class="btn btn-default" value="15.0%"/>
								<input type="button" id="rate_16_btn" class="btn btn-default" value="16.0%"/>
								<input type="button" id="rate_17_btn" class="btn btn-default" value="17.0%"/>
								 
							</div>
						</div>
					</div>
				</div>

				<div class="box1s" style="padding:3px">
					<div class="form-group">
						<label class="col-sm-2 control-label">대출기간(개월)</label>
						<div class="col-sm-9">
							<div class="input-group">
									<input id="return_cnt" name="return_cnt" class="form-control" type="number" value="0"> 
								<div class="input-group-addon"> </div>
							</div>
							<div class="input-group">
								<input type="button" id="period_del_btn" class="btn btn-warning" value="Del"/>
								<input type="button" id="period_1_btn" class="btn btn-default" value="1년"/>
								<input type="button" id="period_2_btn" class="btn btn-default" value="2년"/>
								<input type="button" id="period_3_btn" class="btn btn-default" value="3년"/>
		
							</div>
						</div>
					</div>
				</div>

               <div class="box1s" style="padding-bottom:30px">
					<div class="form-group">
						<label class="col-sm-2 control-label">계약일</label>
						<div class="col-sm-9">
							<div class="input-group">
									<input id="contract_date" name="contract_date" class="form-control" type="number"  value="<?=$contract_date?>" readonly> 
									<input type="hidden"  style="width:70px" name="return_money" value="<?=$return_money?>" onkeyup="checkOnlyNumber();">
									<input id="contract_day" name="contract_day" class="form-control" type="hidden"  value="<?=$contract_date_day?>" readonly> 
									
								<div class="input-group-addon"> </div>
								<div class="input-group">
									
					                <input id="reset_btn" class="btn btn-warning" onclick="location.href='<?=$PHP_SELF?>'" type="button" value="초기화">
									<input id="cal_btn" class="btn btn-primary" type="submit" value="이자계산하기"> 
								
							    </div>

							</div>
						</div>
					</div>
				</div>

				

				</form>

               

				<div class="form-group">
			
					<div  style="padding:5px 5px">
					<?

if ($_POST[action] == "OK") {
	?>
	<table cellpadding=3 cellspacing=1 bgcolor="#f26c5e" width="99%">
	<tr bgcolor=#f26c5e>
	<td align=center><B>회차</B></td>
	<td align=center><B>입금날짜</B></td>
	<td align=right><B>상환금</B></td>
	<td align=right><B>이자일수</B></td>
	<td align=right><B>납입이자</B></td>
	<td align=right><B>납입원금</B></td>
	<td align=right><B>대출잔액</B></td>	
	
	</tr>
	<?

	$result = mysql_query("select * from day_conf where type='B'") or die('died');
	while($v = mysql_fetch_array($result)) 
	{
		//$holiday1[$v[day]] = $v[type];
		$holiday[] = $v[day];
	}
	
	//날짜, 데이
	$contract[$contract_date] = $contract_day;

	if ($no_interest_term) {
		$ratio[$contract_date][N] = 0;
		$ratio[$contract_date][D] = 0;
		$re_contract_date = AddDate($contract_date, ($no_interest_term+1));
		$ratio[$re_contract_date][N] = $normal_ratio;
		$ratio[$re_contract_date][D] = $delay_ratio;
	} else {
		$ratio[$contract_date][N] = $normal_ratio;
	
		$ratio[$contract_date][D] = $delay_ratio;
	}
	
	$out_money = str_replace(",", "", $out_money);
	$settle_interest = ($settle_interest) ? str_replace(",", "", $settle_interest) : 0 ;
	$m = new member($contract, $ratio, 0, "", 0, 0, $contract_date, $holiday, 0, 0);
	$m->OutOfMoney($contract_date, $out_money, true, $settle_interest, $no_interest_term);

	if ($settle_interest) {
		$m->SettleMember($contract_date);
	}

	$return_date = $m->return_date->getReturnDate();

	if ($return_cnt) {
		$return_money = getReturnMoney($contract, $ratio, $contract_date, $holiday, $out_money, $settle_interest, $no_interest_term, $return_cnt, $normal_ratio);
	} else {
		$return_money = str_replace(",", "", $return_money);
	}

	$cnt = 0;
	$trade_date = $m->return_date->getReturnDate();
	$money = $return_money;
	while($m->balance > 0) {
		$cnt++;
		$interest_info = $m->interest->getInterest($m->balance, $m->return_date->getReturnDate(), $m->last_trade_date, $trade_date);
		$result = $m->ReceiptOfMoney($trade_date, $money, $total[money],$type);

		if ($m->balance == 0) {
			$money = $result[0] + $result[1];
		}

		?>
		<tr bgcolor=FFFFFF align=right>
		<td align=center><?=$cnt?></td>
		<td align=center><?=$trade_date?></td>
		<td align=right><?=number_format($money)?></td>
		<td align=right><?=$result[5]?>일</td>
		<td align=right><?=number_format($result[0])?></td>
		<td align=right><?=number_format($result[1])?></td>
		<td align=right><?=number_format($m->balance)?></td>
		
		</tr>
		<?

		$trade_date = $m->return_date->getReturnDate();
		$total[money] += $money;
		$total[2] += $result[2];
		$total[3] += $result[3];
		$total[0] += $result[0];
		$total[1] += $result[1];

		if ($cnt >= 500) {
			echo "<font color=red>※ 상환회차가 500회가 넘었습니다!!</font>";
			break;
		}
	}

	?>
	<tr bgcolor=#FFCC00 align=right>
	<td align=center>합계</td>
	<td align=center>-</td>
	<td><?=number_format($total[money])?></td>
	<td><?=number_format($total[2])?></td>
	<td><?=number_format($total[3])?></td>
	<td><?=number_format($total[0])?></td>
	<td><?=number_format($total[1])?></td>


	</tr>
	</table>
	
	<table cellpadding=3 cellspacing=1 bgcolor="#f26c5e" width="99%">
	<tr bgcolor=#f26c5e>
	<td align=center><B>회차</B></td>
	<td align=center><B>입금날짜</B></td>
	<td align=right><B>상환금</B></td>
	<td align=right><B>이자일수</B></td>
	<td align=right><B>납입이자</B></td>
	<td align=right><B>납입원금</B></td>
	<td align=right><B>대출잔액</B></td>	
	
	</tr>
	<?

	//$result = pg_query("select * from day_conf where type='B'");
	//while($v = pg_fetch_array($result)) $holiday[] = $v[day];
	//날짜, 데이
	//$contract[$contract_date] = $contract_day;
	
		
//echo $return_cnt.'gggggggggggggggggggggdddddd';
		// 마지막 일수 뽑아내는 기능 만들기 !!
		// 휴일 뽑아내는 기능 만들기 !!
		// 납기일 뽑아내는 기능만들기 (휴일꺼만 따로 뽑음. 합치는 기능추가해야됨)
		// 이자 일수 뽑아내는 기능 만들기 
		// 이자일수와 원금 잔액에 따른 납입이자 뽑아내는 기능 만들기 
		// 시작해서 a가 나오는 시점까지 카운팅하는 어레이 구하기 
		
		//foreach($getDate as $a => $b)
		//{
		//	echo $a.' '.$b.'<br>';
		//}
	
		function get_lastday($month, $year, $cnt) 
		{
			 
			$cnt_adjust = 0;
			for($i = 0; $i < $cnt; $i++) 
			{
				
				$month += 1;
				if ($month > 12) 
				{
					$year++;
					$month = 1;
				}
					$array_lastday[$cnt_adjust] = date(t ,mktime( 0, 0, 1, $month, 1, $year ));
					//테스트용 출력문
					//echo '<br>'.$array_lastday[$cnt_adjust].' '.$cnt_adjust.' 이어 : '.$year.' 몬스 : '.$month.'<br>';
					//$array_lastday[$year][$month] = = date(t ,mktime( 0, 0, 1, $month, 1, $year ));
					$cnt_adjust++;
			}
			return $array_lastday;
		}

		function dateDiff($date1, $date2)
		{ 
			$_date1 = explode("-",$date1); 
			$_date2 = explode("-",$date2); 

			$tm1 = mktime(0,0,0,$_date1[1],$_date1[2],$_date1[0]); 
			$tm2 = mktime(0,0,0,$_date2[1],$_date2[2],$_date2[0]);

			return ($tm1 - $tm2) / 86400;
		}

		
		function get_differ($array_lastday)
		{
			$cnt = 0;
			
			for($i=0; $i < sizeof($array_lastday); $i++) 
			{
				//테스트용 출력문
				//echo $array_day[$cnt].' '.$cnt.' '.$array_lastday[$cnt].'<br>';

				switch($array_lastday[$cnt]) 
				{
					case '28':
					$array_day[$cnt] = 28;
					$cnt++;
					break;

					case '29':
					$array_day[$cnt] = 29;
					$cnt++;
					break;

					case '30':
					$array_day[$cnt] = 30;
					$cnt++;
					break;

					case '31':
					$array_day[$cnt] = 31;
					$cnt++;
					break;
				}
			}
		}
		$differ = $lastday - number_format($contract_date_day);
	
		$arr = get_lastday( $month, $year, $return_cnt );
		
		get_differ($arr);

		function dateAdd($orgDate, $mth)
		{ 
			//$cd = $orgDate;
			//$mth +=1;
			//echo $mth.'mth 값<br>';
			$cd = strtotime($orgDate); 
			$retDAY = date('Y-m-d', mktime(0,0,0,date('m',$cd),date('d',$cd)+$mth,date('Y',$cd))); 
			//echo $retDAY.'연산 투데이 참고<br>';
			 return $retDAY; 
		} 


		function get_days($array_payDay, $today)
		{
			$cnt = 0;
			$date3 = array();
			$re_today = strtotime($today);

			for($i=0; $i < sizeof($array_payDay); $i++) 
			{
				$date1 = $array_payDay[$i];
				//echo $date1.'페이데이<br>';
				$date2 = $today;
				//echo $date2.'연산 투데이<br>';
				
				$pp = strtotime($date1);
				$gg = strtotime($date2);
				
				$date3[$i] = $pp - $gg;
				$date3[$i] = floor($date3[$i]/86400);
				
				if($cnt==0 )
				{
					$today = dateAdd($date2, $date3[$i]);
				} else
				{
					$today = dateAdd($date1, $date3[$i]);
				}
			}
			return $date3;
		}

		function adjust_holly( $holly, $today, $year, $month, $day, $count) 
		{
			$cnt = 0;
			foreach($holly as $key => $value) 
			{
				if($today <= $value)
				{
					if($day == substr($value, -2, 2))
					{
						$array_get_key[] = $key;
						//$array_get_date[] = $value;
					} 
				}
			}
			//return $array_get_date;
			return $array_get_key;
		}

		function chk_holly($value ,$holiday) 
		{
			$gg = strtotime($value);
			$value = date("Y-m-d", $gg);
			if(in_array($value ,$holiday))
			{
				return true;
			}
				return false;
		}	
		
		$a =adjust_holly($holiday, $contract_date, $year, $month, $contract_date_day, $return_cnt );
		foreach($a as $key => $value) 
		{

			$g = explode("-", $holiday[$value]);
				
			$get[$value] = $holiday[$value];
	
			while(chk_holly( $get[$value] ,$holiday))
			{
				$get[$value] = $g[0].'-'.$g[1].'-'.(++$g[2]);
			//	echo 'value : '.$value.' '.$get[$value].' ////<br>';
			}
				$getDate[] = $get[$value];
			//echo $key.' '.$value.' '.$g[1].' '.($g[2]).' //<br>';
		}
	
		function get_payDay($today, $cnt, $holiday, $chk_holly) 
		{
			$getDate = explode("-", $today);
			$payDay = $getDate[2];
			$payMonth = $getDate[1];
			$payYear = $getDate[0];
			$cnt_adjust=0;
			for($i = 0; $i < $cnt; $i++) 
			{
				
				$payMonth += 1;
				if ($payMonth > 12) 
				{
					$payYear++;
					$payMonth = 1;
				}
				
				$unionDate = $payYear.'-'.$payMonth.'-'.$payDay;
				//echo $unionDate.'....!!!<br>';
				$unionDate = strtotime($unionDate);
				$unionDate = date("Y-m-d", $unionDate);
				//echo $unionDate.'....<br>';
				
				if(chk_holly($unionDate ,$holiday))
				{
					//echo $cnt_adjust.' '.$chk_holly[$cnt_adjust].'chkkkk////<br>';
					$payDate[] = $chk_holly[$cnt_adjust];
					$cnt_adjust++;
					
					continue;
				}
				
				$payDate[] = $unionDate;
				//echo $unionDate.'payyyyy/////<br>';
			}
			return $payDate;
		}
		
		$paydays_regular = get_payDay($contract_date, $return_cnt, $holiday, $getDate);
		$interest_days_regular=get_days($paydays_regular, $contract_date);
		$money_regular = PMTP_regular($cnt, $out_money);
		$reamining_regular = PMT_remaining($cnt, $out_money);
		
		for($j=0; $j<$cnt; $j++) 
		{
?>
		<tr bgcolor=FFFFFF align=right>
		<td align=center><?=($j+1)?></td>
		<td align=center><?=$paydays_regular[$j]?></td>
		<td align=right><?=number_format($money_regular)?></td>
		<td align=right><?=$interest_days_regular[$j]?>일</td>
		<td align=right><?=number_format($result[0])?></td>
		<td align=right><?=number_format($money_regular)?></td>
		<td align=right><?=number_format(round($reamining_regular[$j]))?></td>
		</tr>
		
<?
		}
?>
</table>

<?	}


?>




		
					</div>
				</div>
				</div>
			</div>

		</div>
	</div>
		</div>
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
<style>
	
	.col-sm-9 {padding-bottom:30px}
</style>

<script language="JavaScript">
<!--
	function sendit() {

		form.submit();
	}



//-->
</script>

<script>
	/* <![CDATA[ */
	jQuery(document).ready(function ($) {
	    $("#out_money").val("1000000");
		$("#normal_ratio").val("10.0");
		$("#return_cnt").val("12");

        $('#loan_1000000_btn').click(function(){
			$('#out_money').val('1000000');									
		});
		$('#loan_5000000_btn').click(function(){
		
			$('#out_money').val('5000000');									
		});
		$('#loan_10000000_btn').click(function(){
			$('#out_money').val('10000000');									
		});
		$('#loan_50000000_btn').click(function(){
			$('#out_money').val('50000000');									
		});
		$('#loan_del_btn').click(function(){
			$('#out_money').val('0');									
		});

		$('#rate_del_btn').click(function(){
			$('#normal_ratio').val('0');									
		});
								 $('#rate_10_btn').click(function(){
									 $('#normal_ratio').val('10.0');									
								 });
								 $('#rate_11_btn').click(function(){
									 $('#normal_ratio').val('11.0');									
								 });
								 $('#rate_12_btn').click(function(){
									 $('#normal_ratio').val('12.0');									
								 });
								 $('#rate_13_btn').click(function(){
									 $('#normal_ratio').val('13.0');									
								 });
								 $('#rate_14_btn').click(function(){
									 $('#normal_ratio').val('14.0');									
								 });
								 $('#rate_15_btn').click(function(){
									 $('#normal_ratio').val('15.0');									
								 });
								 $('#rate_16_btn').click(function(){
									 $('#normal_ratio').val('16.0');									
								 });
								 $('#rate_17_btn').click(function(){
									 $('#normal_ratio').val('17.0');									
								 });
        $('#period_del_btn').click(function(){
			$('#return_cnt').val('0');									
		});
		$('#period_1_btn').click(function(){
			$('#return_cnt').val('12');									
		});
		$('#period_2_btn').click(function(){
			$('#return_cnt').val('24');									
		});
		$('#period_3_btn').click(function(){
			$('#return_cnt').val('36');									
		});

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
<?

function getReturnMoney($contract, $ratio, $contract_date, $holiday, $out_money, $settle_interest, $no_interest_term, $return_cnt, $normal_ratio) {
	$return_money = ceil((PMT($normal_ratio, $return_cnt, $out_money) - 10000) / 1000) * 1000;

	while(1) {
		$m1 = new member($contract, $ratio, 0, $contract_date, 0, 0, $contract_date, $holiday, 0, 0);
		$m1->OutOfMoney($contract_date, $out_money, true, $settle_interest, $no_interest_term);
		$day = $m1->return_date->getReturnDate();

		for ($cnt = 0;$cnt < $return_cnt;$cnt++) {
			$result = $m1->ReceiptOfMoney($day, $return_money,"",$type);
			$day = $m1->return_date->getReturnDate();
		}

		if ($m1->balance > 0) {
			$return_money += 1000;
		} else {
			return $return_money;
		}
	}
}

function PMT($ratio, $cnt, $money) {
	if (!$money || !$ratio || !$cnt) return 0;

	$ratio = $ratio / 1200;
	$monthly_return_money = ( $money * $ratio * pow(1 + $ratio, $cnt)) / (pow(1 + $ratio, $cnt) - 1);
	return $monthly_return_money;
}

function PMTP_regular($cnt, $money) 
{
	$monthly_return_money = $money / $cnt;
	return $monthly_return_money;
}

function PMT_remaining($cnt, $money)
{
	$cnt_r = 0;
	$return_cnt = $cnt;
	$remaining_principal = array();
	$start_principal = $money;
	$monthly_principal = PMTP_regular($return_cnt ,$money);

	do {
		if($cnt_r == 0) {
			$remaining_principal[$cnt_r] = $start_principal - $monthly_principal;
			//echo $remaining_principal[$cnt_r].' '.$cnt_r.'<br>';
			$cnt_r++;
		} else {
			$remaining_principal[$cnt_r] = $remaining_principal[$cnt_r-1] -  $monthly_principal;
			//echo $remaining_principal[$cnt_r].' '.$cnt_r.'<br>';
			$cnt_r++;
			}
		} while ( $cnt_r != $return_cnt);
		return $remaining_principal;
}

function PMTI_regular($ratio, $cnt, $money) 
{
	if (!$money || !$ratio || !$cnt) return 0;

	$ratio = $ratio / 1200;
	$monthly_return_money = $money / $cnt;
	$start_principal = $money;
	$monthly_principal = $start_principal / $cnt;
	$remaining_principal = array();
	$monthly_interest = array();
	$cnt_r = 0;
		
		
	do {
		if($cnt_r == 0) {
			$monthly_interest[$cnt_r] = $start_principal * $ratio;
			$remaining_principal[$cnt_r] = $start_principal - $monthly_principal;
			$cnt_r++;
		} else {
			$monthly_interest[$cnt_r] = $remaining_principal[$cnt_r-1] * $ratio;
			$remaining_principal[$cnt_r] = $remaining_principal[$cnt_r-1] -  $monthly_principal;
			$cnt_r++;
			}
		} while ( $cnt_r != $cnt);
}
	
function AddDate($today, $cnt) {
	$ymd = explode("-", $today);
	return date("Y-m-d", (mktime(0, 0, 0, $ymd[1], $ymd[2], $ymd[0])+(86400*$cnt)));
}

?>