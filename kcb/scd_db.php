<?
include "config.php";

header("Content-Type: text/html; charset=euc-kr"); 

$query3 = "select savekey,files from scd_360 where savekey <> '' and files <> ''";
$result3 = mysql_query($query3, $conn);
while($row3=mysql_fetch_array($result3))
{


$file = "./log/scd1/".$row3[files].".log";
$file_para = $row3[savekey];
$fp = fopen($file, "r");

$status = fread($fp, filesize($file));

fclose($fp);

echo "**********023대출개설정보(KFB) ~ 024대출개설정보(KCB)*********"."<br>";
echo "**********026현금서비스정보(KFB) ~ 027카드개설정보(KFB)*********"."<br><br><br>";
$arrs = explode("][",$status);


$iii = 0;
foreach($arrs as $vv){


	  if($iii == 3 || $iii == 6 || $iii == 9){
        //echo $vv."///".$iii."<BR><BR><BR>";
	 


$status=substr($vv,35);	

$msg2 = $vv;
$startstr  = substr(substr($msg2,323),0,3);


if($startstr <> "017"){
$start_spot_next = 0;
}
$arr017 = array('017신상정보'
,'정보구분코드' 
,'등록일자'   
,'우편번호주소' 
,'상세주소'   
,'전화번호'   
,'연소득'     
,'휴대폰번호');  

$arr018 = array('018신용평점'
,'평점'	
,'등급');

$arr019 = array('019신용평점 연간 이력' 
,'1개월전신용평점'	
,'2개월전신용평점'	
,'3개월전신용평점'	
,'4개월전신용평점'	
,'5개월전신용평점'	
,'6개월전신용평점'	
,'7개월전신용평점'	
,'8개월전신용평점'	
,'9개월전신용평점'	
,'10개월전신용평점'	
,'11개월전신용평점'	
,'12개월전신용평점'	
,'1개월전신용등급'	
,'2개월전신용등급'	
,'3개월전신용등급'	
,'4개월전신용등급'	
,'5개월전신용등급'	
,'6개월전신용등급'	
,'7개월전신용등급'	
,'8개월전신용등급'	
,'9개월전신용등급'	
,'10개월전신용등급'	
,'11개월전신용등급'	
,'12개월전신용등급');

$arr023 = array('023대출개설정보(KFB)'        
,'기관명'           
,'대출형태코드'         
,'대출일자'          
,'만기일자'          
,'약정금액'         
,'대출금액'         
,'신용여부'          
,'담보여부'          
,'보증인여부'         
,'집단대출대납구분코드'         
,'연체대환대출여부'          
,'신용회복지원여부'); 

$arr024 = array('024대출개설정보(KCB)'        
,'기관명'                     
,'대출형태코드'                
,'대출일자'                 
,'만기일자'                   
,'약정금액'               
,'대출금액'                
,'신용여부'                  
,'담보여부'                
,'보증인여부'               
,'집단대출대납구분코드'          
,'연체대환대출여부'          
,'신용회복지원여부');

$arr026 = array('026현금서비스정보(KFB)'
,'기관명'	
,'발생일'	
,'변동일'	
,'금액');	

$arre = array('025연간대출 실적 요약(KCB)','1개월전총대출계좌수',
'2개월전총대출계좌수',
'3개월전총대출계좌수',
'4개월전총대출계좌수',
'5개월전총대출계좌수',
'6개월전총대출계좌수',
'7개월전총대출계좌수',
'8개월전총대출계좌수',
'9개월전총대출계좌수',
'10개월전총대출계좌수',
'11개월전총대출계좌수',
'12개월전총대출계좌수',
'1개월전총약정금액',
'2개월전총약정금액',
'3개월전총약정금액',
'4개월전총약정금액',
'5개월전총약정금액',
'6개월전총약정금액',
'7개월전총약정금액',
'8개월전총약정금액',
'9개월전총약정금액',
'10개월전총약정금액',
'11개월전총약정금액',
'12개월전총약정금액',
'1개월전월상환금액',
'2개월전월상환금액',
'3개월전월상환금액',
'4개월전월상환금액',
'5개월전월상환금액',
'6개월전월상환금액',
'7개월전월상환금액',
'8개월전월상환금액',
'9개월전월상환금액',
'10개월전월상환금액',
'11개월전월상환금액',
'12개월전월상환금액',
'1개월전대출잔액',
'2개월전대출잔액',
'3개월전대출잔액',
'4개월전대출잔액',
'5개월전대출잔액',
'6개월전대출잔액',
'7개월전대출잔액',
'8개월전대출잔액',
'9개월전대출잔액',
'10개월전대출잔액',
'11개월전대출잔액',
'12개월전대출잔액',
'1개월전연체금액',
'2개월전연체금액',
'3개월전연체금액',
'4개월전연체금액',
'5개월전연체금액',
'6개월전연체금액',
'7개월전연체금액',
'8개월전연체금액',
'9개월전연체금액',
'10개월전연체금액',
'11개월전연체금액',
'12개월전연체금액',
'1개월전최장연체일수',
'2개월전최장연체일수',
'3개월전최장연체일수',
'4개월전최장연체일수',
'5개월전최장연체일수',
'6개월전최장연체일수',
'7개월전최장연체일수',
'8개월전최장연체일수',
'9개월전최장연체일수',
'10개월전최장연체일수',
'11개월전최장연체일수',
'12개월전최장연체일수'
);

$arr027 = array('027카드개설정보(KFB)'
,'기관명'	
,'관리점명'	
,'등록사유코드'	
,'발생일자'	);

$arru = array('028카드실적/연체이력정보(KCB)','1개월전개설카드수',
'2개월전개설카드수',
'3개월전개설카드수',
'4개월전개설카드수',
'5개월전개설카드수',
'6개월전개설카드수',
'7개월전개설카드수',
'8개월전개설카드수',
'9개월전개설카드수',
'10개월전개설카드수',
'11개월전개설카드수',
'12개월전개설카드수',
'1개월전이용카드수',
'2개월전이용카드수',
'3개월전이용카드수',
'4개월전이용카드수',
'5개월전이용카드수',
'6개월전이용카드수',
'7개월전이용카드수',
'8개월전이용카드수',
'9개월전이용카드수',
'10개월전이용카드수',
'11개월전이용카드수',
'12개월전이용카드수',
'1개월전현금서비스이용카드수',
'2개월전현금서비스이용카드수',
'3개월전현금서비스이용카드수',
'4개월전현금서비스이용카드수',
'5개월전현금서비스이용카드수',
'6개월전현금서비스이용카드수',
'7개월전현금서비스이용카드수',
'8개월전현금서비스이용카드수',
'9개월전현금서비스이용카드수',
'10개월전현금서비스이용카드수',
'11개월전현금서비스이용카드수',
'12개월전현금서비스이용카드수',
'1개월전총한도합계금액',
'2개월전총한도합계금액',
'3개월전총한도합계금액',
'4개월전총한도합계금액',
'5개월전총한도합계금액',
'6개월전총한도합계금액',
'7개월전총한도합계금액',
'8개월전총한도합계금액',
'9개월전총한도합계금액',
'10개월전총한도합계금액',
'11개월전총한도합계금액',
'12개월전총한도합계금액',
'1개월전현금서비스한도합계금액',
'2개월전현금서비스한도합계금액',
'3개월전현금서비스한도합계금액',
'4개월전현금서비스한도합계금액',
'5개월전현금서비스한도합계금액',
'6개월전현금서비스한도합계금액',
'7개월전현금서비스한도합계금액',
'8개월전현금서비스한도합계금액',
'9개월전현금서비스한도합계금액',
'10개월전현금서비스한도합계금액',
'11개월전현금서비스한도합계금액',
'12개월전현금서비스한도합계금액',
'1개월전총이용금액',
'2개월전총이용금액',
'3개월전총이용금액',
'4개월전총이용금액',
'5개월전총이용금액',
'6개월전총이용금액',
'7개월전총이용금액',
'8개월전총이용금액',
'9개월전총이용금액',
'10개월전총이용금액',
'11개월전총이용금액',
'12개월전총이용금액',
'1개월전현금서비스이용금액',
'2개월전현금서비스이용금액',
'3개월전현금서비스이용금액',
'4개월전현금서비스이용금액',
'5개월전현금서비스이용금액',
'6개월전현금서비스이용금액',
'7개월전현금서비스이용금액',
'8개월전현금서비스이용금액',
'9개월전현금서비스이용금액',
'10개월전현금서비스이용금액',
'11개월전현금서비스이용금액',
'12개월전현금서비스이용금액',
'1개월전연체금액',
'2개월전연체금액',
'3개월전연체금액',
'4개월전연체금액',
'5개월전연체금액',
'6개월전연체금액',
'7개월전연체금액',
'8개월전연체금액',
'9개월전연체금액',
'10개월전연체금액',
'11개월전연체금액',
'12개월전연체금액',
'1개월전최장연체일수',
'2개월전최장연체일수',
'3개월전최장연체일수',
'4개월전최장연체일수',
'5개월전최장연체일수',
'6개월전최장연체일수',
'7개월전최장연체일수',
'8개월전최장연체일수',
'9개월전최장연체일수',
'10개월전최장연체일수',
'11개월전최장연체일수',
'12개월전최장연체일수'
);
$msg2len = strlen($msg2);
	$block2=div_block2($msg2);
    //print_r($block2);
	

	//공통부 세분화
	$common_block2=div_common2($block2[0]);
	//print_r($common_block2);

	$common_personal2=div_personal2($block2[1]);
	//print_r($common_personal2);
    //echo "--------------------------------------++++++++++++++++++++++++++++++++".$aaa;
	$start_spot = 0;
    
    $b_str_div = $block2[2];

    $v1 =     $common_personal2[1];
    $resend = $common_personal2[2];
    $rep_017 = 0;
	$rep_018 = 0;
	$rep_019 = 0;
	$rep_020 = 0;
	$rep_023 = 0;
	$rep_024 = 0;
	$rep_025 = 0;
	$rep_026 = 0;
	$rep_027 = 0;
	$rep_028 = 0;
	$rep_029 = 0;
	$rep_031 = 0;
	$rep_032 = 0;
	$rep_033 = 0;
	$rep_035 = 0;
	$rep_036 = 0;
	$rep_037 = 0;
	$rep_038 = 0;
	$rep_039 = 0;

if($startstr == "017"){
	$rep_017 = (1)*$common_personal2[6];
	$rep_018 = (1)*$common_personal2[9];
	$rep_019 = (1)*$common_personal2[12];
	$rep_020 = (1)*$common_personal2[15];
	$rep_023 = (1)*$common_personal2[18];
	$rep_024 = (1)*$common_personal2[21];
	$rep_025 = (1)*$common_personal2[24];
	$rep_026 = (1)*$common_personal2[27];
	$rep_027 = (1)*$common_personal2[30];
	$rep_028 = (1)*$common_personal2[33];
	$rep_029 = (1)*$common_personal2[36];
	$rep_031 = (1)*$common_personal2[39];
	$rep_032 = (1)*$common_personal2[42];
	$rep_033 = (1)*$common_personal2[45];
	$rep_035 = (1)*$common_personal2[48];
	$rep_036 = (1)*$common_personal2[51];
	$rep_037 = (1)*$common_personal2[54];
	$rep_038 = (1)*$common_personal2[57];
	$rep_039 = (1)*$common_personal2[60];
}else{
    $rep_017 = (1)*$common_personal2[7];
	$rep_018 = (1)*$common_personal2[10];
	$rep_019 = (1)*$common_personal2[13];
	$rep_020 = (1)*$common_personal2[16];
	$rep_023 = (1)*$common_personal2[19];
	$rep_024 = (1)*$common_personal2[22];
	$rep_025 = (1)*$common_personal2[25];
	$rep_026 = (1)*$common_personal2[28];
	$rep_027 = (1)*$common_personal2[31];
	$rep_028 = (1)*$common_personal2[34];
	$rep_029 = (1)*$common_personal2[37];
	$rep_031 = (1)*$common_personal2[40];
	$rep_032 = (1)*$common_personal2[43];
	$rep_033 = (1)*$common_personal2[46];
	$rep_035 = (1)*$common_personal2[49];
	$rep_036 = (1)*$common_personal2[52];
	$rep_037 = (1)*$common_personal2[55];
	$rep_038 = (1)*$common_personal2[58];
	$rep_039 = (1)*$common_personal2[61];
}
	
	//$rep_017 = (1)*$common_personal2[5];	
	$str_017 = 245;
	$str_017_len = $rep_017*$str_017;
    $start_spot_next = $start_spot + ($rep_017*$str_017);
	if($str_017_len > 0){
		$i_017 = $rep_017;
		while($i_017 > 0){
	       
		   $sss = substr($b_str_div,$start_spot,$start_spot + $str_017);
		   
		   $c_017=div_017($sss);
		   // echo $sss."<br><br>";
  //print_r($c_017);
           $start_spot = $start_spot + $str_017;
           $jj=0;
           foreach($c_017 as $v){
		   //echo "[".$arr017[$jj]."]".$v."<br>";
		   $jj++;
		   }
		echo $sss."<br><br>";
			$i_017--;
		}
	}

	
    
	//$rep_018 = (1)*$common_personal2[8];
	$str_018 = 9;
	$str_018_len = $rep_018*$str_018;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_018*$str_018);
    $i_018 = $rep_018;

	if($str_018_len > 0){
		   while($i_018 > 0){
			   
			   $sss = substr($b_str_div,$start_spot,$str_018);		
			   $c_018=div_018($sss);
			   //	echo "<br>".$sss."<br><br>";		  
			   $start_spot = $start_spot_1 + $str_018;
               $jj=0;
			   foreach($c_018 as $v){
			   //echo "[".$arr018[$jj]."]".$v."<br>";
			   $jj++;
			   }
			   echo $sss."<br><br>";
				$i_018--;
		    }
	}
    
	//$rep_019 = (1)*$common_personal2[11];
	$str_019 = 75;
    $str_019_len= $rep_019*$str_019;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_019*$str_019);
    $i_019 = $rep_019;

	if($str_019_len > 0){
		 while($i_019 > 0){
			 
		   $sss = substr($b_str_div,$start_spot,$str_019);		   
		   $c_019=div_019($sss);       
		   ///print_r($c_019);
           $start_spot = $start_spot_1 + $str_019;
           $jj=0;
			   foreach($c_019 as $v){
			   //echo "[".$arr019[$jj]."]".$v."<br>";
			   $jj++;
			   }
			   echo $sss."<br><br>";
            $i_019--; 
		 }

	}

	//$rep_020 = (1)*$common_personal2[14];
	$str_020 = 39;
    $str_020_len= $rep_020*$str_020;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_020*$str_020);
    $i_020 = $rep_020;

	if($str_020_len > 0){
		 while($i_020 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_020);		   
		   $c_020=div_020($sss);       
		   
           $start_spot = $start_spot_1 + $str_020;

			$i_020--; 
		 }

	}


	//$rep_023 = (1)*$common_personal2[17];

	$str_023 = 133;
    $str_023_len= $rep_023*$str_023;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_023*$str_023);
    $i_023 = $rep_023;
echo "-----------------<br><br>";
	if($str_023_len > 0){
		@mysql_query( "delete from div_023 where savekey = '".$file_para."'" );
		$column_023 = array();
			$r = mysql_query( "DESC div_023" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_023[] = $d[0];
			}	
            

		 while($i_023 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_023);		   
		   $c_023=div_023($sss);   
		   
		   //print_r($c_023);
           $start_spot = $start_spot + $str_023;
		   $jj=0;
		   $sql_023  = "insert into div_023 ( ";
			$sql_023 .= "  savekey, ";
            for($x = 2; $x < count($column_023)-1; $x++) {
			  $sql_023 .= "$column_023[$x]".",";
			}
			$sql_023 .= "  e_datetime "; 
			$sql_023 .= "  ) values ( ";
            $sql_023 .= "  '".$file_para."', ";

           foreach($c_023 as $v){
		   echo "[".$arr023[$jj]."]".$v."<br>";
		   $sql_023 .= "  '".$v."', ";
		   $jj++;
		   }
		    $sql_023 .= " now() ";
		    $sql_023 .= "  );";
            mysql_query( $sql_023 );
		echo $sql_023."<br><br>";
            $i_023--; 
		 }

		
	}

	


 }
 
 $iii++;
}


}///////////////////////foreac end


   

?>