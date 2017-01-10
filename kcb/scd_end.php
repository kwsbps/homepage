<?php
session_start();

include_once "../comm/db_info.php";
//$_GET[savekey] = "7847457377";
//$_GET[skn] = "0000397";
//test.30cut.com/kcb/scd_end.php?savekey=7847457377&skn=0000397

$query = "select totmaxcash1,totmaxcash2,totmaxcash3,totmaxcash4,totmaxcash5,totmaxcash6,totmaxcash7,totmaxcash8,totmaxcash9,totmaxcash10,totmaxcash11,totmaxcash12,cashuseamt1,cashuseamt2,cashuseamt3,cashuseamt4,cashuseamt5,cashuseamt6,cashuseamt7,cashuseamt8,cashuseamt9,cashuseamt10,cashuseamt11,cashuseamt12,usecard1,totmaxamt1,totmaxamt2,totmaxamt3,totmaxamt4,totmaxamt5,totmaxamt6,totmaxamt7,totmaxamt8,totmaxamt9,totmaxamt10,totmaxamt11,totmaxamt12,totmaxcash1,totmaxcash2,totmaxcash3,totmaxcash4,totmaxcash5,totmaxcash6,totmaxcash7,totmaxcash8,totmaxcash9,totmaxcash10,totmaxcash11,totmaxcash12,totuseamt1,totuseamt2,totuseamt3,totuseamt4,totuseamt5,totuseamt6,totuseamt7,totuseamt8,totuseamt9,totuseamt10,totuseamt11,totuseamt12,maxlateday1,maxlateday2,maxlateday3,maxlateday4,maxlateday5,maxlateday6,maxlateday7,maxlateday8,maxlateday9,maxlateday10,maxlateday11,maxlateday12 from div_028 where savekey='$_GET[savekey]' order by id desc limit 1";
//echo $query;
$result = mysql_query($query, $conn);
while($row=mysql_fetch_array($result))
{

   $d0281 = (int)((((int)$row[totmaxcash1]+(int)$row[totmaxcash2]+(int)$row[totmaxcash3]+(int)$row[totmaxcash4]+(int)$row[totmaxcash5]+(int)$row[totmaxcash6]+(int)$row[totmaxcash7]+(int)$row[totmaxcash8]+(int)$row[totmaxcash9]+(int)$row[totmaxcash10]+(int)$row[totmaxcash11]+(int)$row[totmaxcash12])-((int)$row[cashuseamt1]+(int)$row[cashuseamt2]+(int)$row[cashuseamt3]+(int)$row[cashuseamt4]+(int)$row[cashuseamt5]+(int)$row[cashuseamt6]+(int)$row[cashuseamt7]+(int)$row[cashuseamt8]+(int)$row[cashuseamt9]+(int)$row[cashuseamt10]+(int)$row[cashuseamt11]+(int)$row[cashuseamt12])));

   $d0282 = (int)$row[cashcard1];

   $d0283_1 = (int)$row[totmaxamt1]+(int)$row[totmaxamt2]+(int)$row[totmaxamt3]+(int)$row[totmaxamt4]+(int)$row[totmaxamt5]+(int)$row[totmaxamt6]+(int)$row[totmaxamt7]+(int)$row[totmaxamt8]+(int)$row[totmaxamt9]+(int)$row[totmaxamt10]+(int)$row[totmaxamt11]+(int)$row[totmaxamt12];

   
   $d0283_2 = (int)$row[totuseamt1]+(int)$row[totuseamt2]+(int)$row[totuseamt3]+(int)$row[totuseamt4]+(int)$row[totuseamt5]+(int)$row[totuseamt6]+(int)$row[totuseamt7]+(int)$row[totuseamt8]+(int)$row[totuseamt9]+(int)$row[totuseamt10]+(int)$row[totuseamt11]+(int)$row[totuseamt12];

   //echo $d0283."<br>";

   $arr_028 = max((int)$row[maxlateday1],(int)$row[maxlateday2],(int)$row[maxlateday3],(int)$row[maxlateday4],(int)$row[maxlateday5],(int)$row[maxlateday6],(int)$row[maxlateday7],(int)$row[maxlateday8],(int)$row[maxlateday9],(int)$row[maxlateday10],(int)$row[maxlateday11],(int)$row[maxlateday12]);
   //echo $arr_028."<br>";

$ffff=$row[totmaxcash1];
}

if($d0281*1000 < 500000){
    $d0281_v = 0;
}else if($d0281*1000 >= 500000 && $d0281*1000 < 2000000){
    $d0281_v = 58;  

}else if($d0281*1000 >= 2000000){
    $d0281_v = 96;
}

$query5 = "select count(*) from div_023 where savekey='$_GET[savekey]' and sayoucode = '37'";
//echo $query5;
$result5 = mysql_query($query5, $conn);
while($row5=mysql_fetch_array($result5))
{
   $d023_ = $row5[0];
}
$d028_2 = $d0282 + $d023_;

if( $d028_2 >=0 && $d028_2 <=2){
    $d0282_v=66;
}else if( $d028_2 = 3){
    $d0282_v=22;
}else if( $d028_2 >=4){
    $d0282_v=0;
}

if( $d023_ >=3){
    $d023_v= 0;
}else if( $d023_ == 2){
    $d023_v= 25;
	
}else if( $d023_ <=1){
    $d023_v= 41;

}else{
    $d023_v= 41;
}

//echo $d0283_2 . "/" . $d0283_1;

$d0283_ = $d0283_2/$d0283_1*100;

if( $d0283_ >=70){
    $d0283_v=0;
}else if( $d0283_ >=50 && $d0283_ < 70){
    $d0283_v=20;
}else if( $d0283_ >=20 && $d0283_ < 50){
    $d0283_v=49;
}else if( $d0283_ < 20){
    $d0283_v=108;
}

if($arr_028 >= 30){
    $d0285_v = 0;
}else if($arr_028 >= 15 && $arr_028 < 30){
     $d0285_v = 64;
}else if($arr_028 >= 1 && $arr_028 < 15){
    $d0285_v = 116;
}else {
$d0285_v = 146;
}

$query1 = "select latedate from div_029 where savekey='$_GET[savekey]' order by id desc limit 1";
//echo $query1;
$result1 = mysql_query($query1, $conn);
while($row1=mysql_fetch_array($result1))
{

   $tm1 = strtotime(date("Y-m-d"));

   $tm2 = strtotime($row[totmaxamt8]);
   $dayc =  $tm1- $tm2;
   if($dayc > 90){
     $d029 = 0;

   }else{

      $d029 = 1;
   }

}

if($d029 == 1){
    $d029_v = 0;
}else {
$d029_v = 104;
}

$ii = 0;
$query2= "select onepengjum,twopengjum,threepengjum,fourpengjum,fivepengjum,sixpengjum from div_019 where savekey='$_GET[savekey]' order by id desc limit 1";
$result2 = mysql_query($query2, $conn);
while($row2=mysql_fetch_array($result2))
{


   if((int)$row2[sixpengjum] > (int)$row2[fivepengjum]){
      $ii++;
   }
   if((int)$row2[fivepengjum] > (int)$row2[fourpengjum]){
      $ii++;
   }
   if((int)$row2[fourpengjum] > (int)$row2[threepengjum]){
      $ii++;   
   }
   if((int)$row2[threepengjum] > (int)$row2[twopengjum]){
      $ii++;   
   }
   if((int)$row2[twopengjum] > (int)$row2[onepengjum]){
      $ii++;   
   }


}
//echo $ii;
if($ii >= 2){
   $d019_v = 0;
}else if($ii == 1){
   $d019_v = 46;
}else{
   $d019_v = 75;
}



$query7 = "select count(*) from div_032 where savekey='$_GET[savekey]' and (segment is not null and segment <> '')";
$result7 = mysql_query($query7, $conn);
while($row7=mysql_fetch_array($result7))
{
   $d032_v = $row7[0];
}
$query8 = "select count(*) from div_033 where savekey='$_GET[savekey]' and (segment is not null and segment <> '')";
$result8 = mysql_query($query8, $conn);
while($row8=mysql_fetch_array($result8))
{
   $d033_v = $row8[0];
}

$query9 = "select count(*) from div_035 where savekey='$_GET[savekey]' and (segment is not null and segment <> '')";
$result9 = mysql_query($query9, $conn);
while($row9=mysql_fetch_array($result9))
{
   $d035_v = $row9[0];
}

$d03v_ = $d032_v + $d033_v + $d035_v;

if($d03v_ > 0){
   $d03v_v = 0;
}else{
   $d03v_v = 132;
}	


$totttt =  $d0281_v+$d0282_v +$d0283_v+$d023_v+$d0285_v+$d029_v + $d03v_v + $d019_v  + 112 ;




$query3 = "select grade from div_018 where savekey='$_GET[savekey]' order by id desc limit 1";
$result3 = mysql_query($query3, $conn);
while($row3=mysql_fetch_array($result3))
{
   $gradee =  $row3[grade];
}


if($totttt >= 0 && $totttt < 579){
  $ingrade = 10;
}else if($totttt >= 580 && $totttt < 639){
$ingrade = 9;
}else if($totttt >= 640 && $totttt < 679){
$ingrade = 8;
}else if($totttt >= 680 && $totttt < 714){
$ingrade = 7;
}else if($totttt >= 715 && $totttt < 737){
$ingrade = 6;
}else if($totttt >= 738 && $totttt < 761){
$ingrade = 5;
}else if($totttt >= 762 && $totttt < 780){
$ingrade = 4;
}else if($totttt >= 781 && $totttt < 814){
$ingrade = 3;
}else if($totttt >= 815 && $totttt < 844){
$ingrade = 2;
}else if($totttt >= 845 && $totttt < 999){
$ingrade = 1;
}

$query10 = "select ratio from in_ratio where ingrade='$ingrade' and kcbgrade='$gradee'";
$result10 = mysql_query($query10, $conn);
while($row10=mysql_fetch_array($result10))
{
   $ratio_v =  $row10[ratio];
}


$sql_98  = "update scd_360 set savekey = '$_GET[savekey]', s_grade = '$ingrade', s_pengjum = '$totttt', s_kcbgrade = '$gradee', s_ratio = '$ratio_v'  where s_bps_no = '$_GET[skn]' ";

mysql_query($sql_98, $conn) or die('글을 저장하는데 실패하였습니다.');

?>

<TABLE  width="800" border="0" cellspacing="5" cellpadding="5">
<TR>
	<TD bgcolor="#DBDBDB">KCB등급</TD>
	<TD bgcolor="#ECECEC"><?=$gradee?></TD>
</TR>
<TR>
	<TD bgcolor="#DBDBDB">30CUT 내부등급</TD>
	<TD bgcolor="#ECECEC"><?=$ingrade?></TD>
</TR>
<TR>
	<TD bgcolor="#DBDBDB">평점</TD>
	<TD bgcolor="#ECECEC"><?=$ratio_v?>%&nbsp;&nbsp;<?=$totttt?>점</TD>
</TR>
<TR>
	<TD bgcolor="#DBDBDB">[ CB거래실적(카드)]현금서비스유효한도평균금액
</TD>
	<TD bgcolor="#ECECEC"><?=$d0281_v?></TD>
</TR>
<TR>
	<TD bgcolor="#DBDBDB">[현금서비스 및 카드론]미상환카드론,CA 및 리볼빙잔액 보유 기관수</TD>
	<TD bgcolor="#ECECEC"><?=$d0282_v?></TD>
</TR>
<TR>
	<TD bgcolor="#DBDBDB">[ CB거래실적(카드)]최근12개월내 신용카드 평균 유효이용잔액한도소진율(15일기준)</TD>
	<TD bgcolor="#ECECEC"><?=$d0283_v?></TD>
</TR>
<TR>
	<TD bgcolor="#DBDBDB">[ CB거래개설(대출)]카드론대출총기관수</TD>
	<TD bgcolor="#ECECEC"><?=$d023_v?></TD>
</TR>
<TR>
	<TD bgcolor="#DBDBDB">[ CB연체]최장 연체경험기간(해제후1년경과건제외)</TD>
	<TD bgcolor="#ECECEC"><?=$d0285_v?></TD>
</TR>
<TR>
	<TD bgcolor="#DBDBDB">[ CB연체]최근3개월내 연체 총 건수 (최초연체발생일기준)</TD>
	<TD bgcolor="#ECECEC"><?=$d029_v?></TD>
</TR>
<TR>
	<TD bgcolor="#DBDBDB">[채무불이행정보](채무불이행/공공+금융질서문란 3년내관리기간외포함)등록총 건수</TD>
	<TD bgcolor="#ECECEC"><?=$d03v_v?></TD>
</TR>
<TR>
	<TD bgcolor="#DBDBDB">[신용정보]최근 6개월간 CB평점 연속 최대 하향개월수(RK0400_000)</TD>
	<TD bgcolor="#ECECEC"><?=$d019_v?></TD>
</TR>
<TR>
	<TD bgcolor="#DBDBDB">가산점</TD>
	<TD bgcolor="#ECECEC">112</TD>
</TR>
<TR>
	<TD bgcolor="#DBDBDB">파일보기[<?=$_GET[file_name]?>]</TD>
	<TD bgcolor="#ECECEC">
	
	<?
	$rs_st=mysql_query("select files from scd_360 where savekey='$_GET[savekey]' and s_bps_no = '$_GET[skn]' order by s_datetime desc limit 1",$conn);
	//echo "select files from scd_360 where savekey='$_GET[savekey]' and s_bps_no = '$_GET[skn]' order by s_datetime desc limit 1";
	$row_st=mysql_fetch_array($rs_st) or die("333");
	$file_name = $row_st[files];
	
	?>
	<a href="http://test.30cut.com/kcb/scd_reader.php?fff=<?=$file_name?>" target="_blank">파일열기</a></TD>
</TR>

</TABLE>
<TABLE>
<TR>
	<TD><input type="button" value="닫 기" onclick="javascript:window.close()"></TD>
</TR>
</TABLE>