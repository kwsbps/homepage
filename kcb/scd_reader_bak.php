<?
include "config.php";

header("Content-Type: text/html; charset=euc-kr"); 
$file = "./log/scd1/20160704_7847457377_res.log";
$file = "./log/scd1/".$_GET[fff].".log";
$file_para = explode("_",$_GET[fff]);
echo $file_para[1];
$fp = fopen($file, "r");

$status = fread($fp, filesize($file));

fclose($fp);


//echo "**********023대출개설정보(KFB) ~ 024대출개설정보(KCB)*********"."<br>";
//echo "**********026현금서비스정보(KFB) ~ 027카드개설정보(KFB)*********"."<br><br><br>";
//echo $status."<br><br>";
$arrs = explode("][",$status);
$iii = 0;
foreach($arrs as $vv){
	  if($iii == 3 || $iii == 6 || $iii == 9){
        //echo $vv."///".$iii."<BR><BR><BR>";
	 


$status=substr($vv,35);	

$msg2 = $vv;
$startstr  = substr(substr($msg2,323),0,3);
//echo  $startstr."<BR><BR>";

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
,'등록사유코드'         
,'대출일자'          
,'변동일자'          
,'금액'         
,'KFB대출구분코드'); 

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
$arr029 = array('029연체정보(KCB)'
,'기관명'	
,'관리점명'	
,'거래형태코드'	
,'최초연체기산일자'
,'최초연체금액'
,'연체기산일자'
,'연체금액'
,'연체상환일자'
,'상환금액'
);

$arr031 = array('031대지급정보'
,'기관명'	
,'관리점명'	
,'대지급발생일자'	
,'대지급금액'
,'대지급상환일자'
,'상환금액'
);

$arr032 = array('032채무불이행정보(KFB)'
,'기관명'	
,'관리점명'	
,'발생일자'	
,'등록금액'
,'연체금액'
,'해제일자'
,'해제구분 코드'
,'등록사유 코드'
);

$arr033 = array('033채무불이행정보(신용정보사)'
,'기관명'	
,'발생일자'	
,'등록금액'	
,'연체금액'
,'상환일자'
,'상환금액'
,'등록사유 코드'
);

$arr035 = array('035공공정보 및금융질서문란 정보'
,'자료구분코드'	
,'기관명'	
,'관리점명'	
,'발생일자'
,'등록금액'
,'연체금액'
,'해제일자'
,'해제구분코드'
,'등록사유코드'
);

$arr036 = array('036연대보증정보(KFB)'
,'기관명'	
,'발생일자'	
,'변동일자'	
,'금액'
);

$arr037 = array('037지급보증정보(KCB)'
,'기관명'	
,'보증상대처'	
,'보증종류코드'	
,'보증개시일자'
,'보증한도금액'
,'보증대상금액'
,'해지일자'
,'해지사유코드'
,'신용여부'
,'담보여부'
,'보증인여부'
,'대지급청구여부'
);

$arr038 = array('038연대보증 상세 내역(KCB)'
,'기관명'	
,'보증상대처'	
,'보증종류코드'	
,'보증약정일자'
,'보증대상금액'
);

$arr039 = array('039신용회복위원회정보(KFB)'
,'직업코드'	
,'직업명'	
,'신청일자'	
,'회복지원통보일자'
,'조정후최종채무액'
,'변제후잔존채무액'
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
        echo "<table  border='0' cellspacing='5' cellpadding='5'>";
		echo "<tr>";
        foreach($arr017 as $a1){
        echo "<td bgcolor='#DBDBDB'>".$a1."</td>";  
		}
        echo "</tr>";

		while($i_017 > 0){
	       
		   $sss = substr($b_str_div,$start_spot,$start_spot + $str_017);
		   
		   $c_017=div_017($sss);
		   // echo $sss."<br><br>";
  //print_r($c_017);
           $start_spot = $start_spot + $str_017;
           $jj=0;
		   echo "<tr>";
           foreach($c_017 as $v){
           echo "<td bgcolor='#ECECEC'>".$v."</td>"; 
		   //echo "[".$arr017[$jj]."]".$v."<br>";
		   $jj++;
		   }
		echo "</tr>";//echo $sss."<br><br>";
			$i_017--;
		}

		echo "</table>";
		echo "<br>";
	}

	
    
	//$rep_018 = (1)*$common_personal2[8];
	$str_018 = 9;
	$str_018_len = $rep_018*$str_018;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_018*$str_018);
    $i_018 = $rep_018;

	if($str_018_len > 0){

		echo "<table  border='0' cellspacing='5' cellpadding='5'>";
		echo "<tr>";
        foreach($arr018 as $a1){
        echo "<td align='center' bgcolor='#DBDBDB'>".$a1."</td>";  
		}
        echo "</tr>";

		   while($i_018 > 0){
			   
			   $sss = substr($b_str_div,$start_spot,$str_018);		
			   $c_018=div_018($sss);
			   //	echo "<br>".$sss."<br><br>";		  
			   $start_spot = $start_spot_1 + $str_018;
               $jj=0;
			   echo "<tr>";
			   foreach($c_018 as $v){
			   echo "<td align='center' bgcolor='#ECECEC'>".$v."</td>";
			   //echo "[".$arr018[$jj]."]".$v."<br>";
			   $jj++;
			   }
			   echo "</tr>";//echo $sss."<br><br>";
				$i_018--;
		    }
			echo "</table>";
			echo "<br>"; 
	}
   
	//$rep_019 = (1)*$common_personal2[11];
	$str_019 = 75;
    $str_019_len= $rep_019*$str_019;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_019*$str_019);
    $i_019 = $rep_019;

	if($str_019_len > 0){

		echo "<table  border='0' cellspacing='5' cellpadding='5'>";
		echo "<tr>";
        foreach($arr019 as $a1){
        echo "<td align='center' bgcolor='#DBDBDB'>".$a1."</td>";  
		}
        echo "</tr>";

		 while($i_019 > 0){
			 
		   $sss = substr($b_str_div,$start_spot,$str_019);		   
		   $c_019=div_019($sss);       
		   ///print_r($c_019);
           $start_spot = $start_spot_1 + $str_019;
           $jj=0;
		   echo "<tr>";
			   foreach($c_019 as $v){
			   echo "<td align='center' bgcolor='#ECECEC'>".$v."</td>";
			   //echo "[".$arr019[$jj]."]".$v."<br>";
			   $jj++;
			   }
			   echo "</tr>";//echo $sss."<br><br>";
            $i_019--; 
		 }
		 echo "</table>";
echo "<br>";
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

	if($str_023_len > 0){
		@mysql_query( "delete from div_023 where savekey = '".$file_para[1]."'" );
		$column_023 = array();
			$r = mysql_query( "DESC div_023" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_023[] = $d[0];
			}	
            
        echo "<table  border='0' cellspacing='5' cellpadding='5'>";
		echo "<tr>";
        foreach($arr023 as $a1){
        echo "<td align='center' bgcolor='#DBDBDB'>".$a1."</td>";  
		}
        echo "</tr>";

		 while($i_023 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_023);		   
		   $c_023=div_023($sss);   
		   
		   //print_r($c_023);
           $start_spot = $start_spot + $str_023;
		   $jj=0;
		   echo "<tr>";
		   $sql_023  = "insert into div_023 ( ";
			$sql_023 .= "  savekey, ";
            for($x = 2; $x < count($column_023)-1; $x++) {
			  $sql_023 .= "$column_023[$x]".",";
			}
			$sql_023 .= "  e_datetime "; 
			$sql_023 .= "  ) values ( ";
            $sql_023 .= "  '".$file_para[1]."', ";

           foreach($c_023 as $v){
		   echo "<td align='center' bgcolor='#ECECEC'>".$v."</td>";
		   //echo "[".$arr023[$jj]."]".$v."<br>";
		   $sql_023 .= "  '".$v."', ";
		   $jj++;
		   }
		    $sql_023 .= " now() ";
		    $sql_023 .= "  );";
            mysql_query( $sql_023 );
		echo "</tr>";//echo $sql_023."<br><br>";
            $i_023--; 
		 }
         echo "</table>";
	
echo "<br>";	
	}

	
			

	//$rep_024 = (1)*$common_personal2[20];
	$str_024 = 74;
    $str_024_len= $rep_024*$str_024;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_024*$str_024);
    $i_024 = $rep_024;

	if($str_024_len > 0){

		echo "<table  border='0' cellspacing='5' cellpadding='5'>";
		echo "<tr>";
        foreach($arr024 as $a1){
        echo "<td align='center' bgcolor='#DBDBDB'>".$a1."</td>";  
		}
        echo "</tr>";

		 while($i_024 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_024);		   
		   $c_024=div_024($sss);   
		   
		   //print_r($c_024);
           $start_spot = $start_spot + $str_024;
           $jj=0;
		   echo "<tr>";
           foreach($c_024 as $v){
		   echo "<td align='center' bgcolor='#ECECEC'>".$v."</td>";
		   //echo "[".$arr024[$jj]."]".$v."<br>";
		   $jj++;
		   } 
		   echo "</tr>";//echo $sss."<br><br>";
			$i_024--; 
		 }
         echo "</table>";
		 
echo "<br>";
	}


	//$rep_025 = (1)*$common_personal2[23];
	$str_025=519;
    $str_025_len= $rep_025*$str_025;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_024*$str_024);
    $i_025 = $rep_025;

	if($str_025_len > 0){

        echo "<table  border='0' cellspacing='5' cellpadding='5'>";
		echo "<tr>";
        foreach($arre as $a1){
        echo "<td align='center' bgcolor='#DBDBDB'>".$a1."</td>";  
		}
        echo "</tr>";

		 while($i_025 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_025);		   
		   $c_025=div_025($sss);       
		   //echo "<br>".$sss."<br><br>";
		   $jj = 0;
		   echo "<tr>";
		   //print_r($c_025);
		   $start_spot = $start_spot + $str_025;
		   foreach($c_025 as $v){
           echo "<td align='center' bgcolor='#ECECEC'>".$v."</td>"; 
		   //echo "[".$arre[$jj]."]".$v."<br>";
		   $jj++;
		   }
           echo "</tr>";

			$i_025--; 
		 }
          echo "</table>";
		  echo "<br>";
	}

	//$rep_026 = (1)*$common_personal2[26];
	$str_026=58;
    $str_026_len= $rep_026*$str_026;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_026*$str_026);
    $i_026 = $rep_026;

	if($str_026_len > 0){
		echo "<table  border='0' cellspacing='5' cellpadding='5'>";
		echo "<tr>";
        foreach($arr026 as $a1){
        echo "<td align='center' bgcolor='#DBDBDB'>".$a1."</td>";  
		}
        echo "</tr>";

		 while($i_026 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_026);		   
		   $c_026=div_026($sss);       
		   //print_r($c_026);
           $start_spot = $start_spot + $str_026;
           $jj=0;
		   echo "<tr>";
           foreach($c_026 as $v){
		   echo "<td align='center' bgcolor='#ECECEC'>".$v."</td>"; 
		   //echo "[".$arr026[$jj]."]".$v."<br>";
		   $jj++;
		   } 
		   echo "</tr>";//echo $sss."<br><br>";
			$i_026--; 
		 }
       echo "</table>";
	   echo "<br>";
	}


	//$rep_027 = (1)*$common_personal2[29];
	$str_027=85;
    $str_027_len= $rep_027*$str_027;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_027*$str_027);
    $i_027 = $rep_027;

	if($str_027_len > 0){

		echo "<table  border='0' cellspacing='5' cellpadding='5'>";
		echo "<tr>";
        foreach($arr027 as $a1){
        echo "<td align='center' bgcolor='#DBDBDB'>".$a1."</td>";  
		}
        echo "</tr>";

		 while($i_027 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_027);		   
		   $c_027=div_027($sss);       
		   //print_r($c_027);
           $start_spot = $start_spot + $str_027;
           $jj=0;
		   echo "<tr>";
           foreach($c_027 as $v){
           echo "<td align='center' bgcolor='#ECECEC'>".$v."</td>"; 
		   //echo "[".$arr027[$jj]."]".$v."<br>";
		   $jj++;
		   } 
		   echo "</tr>";//echo $sss."<br><br>";

			$i_027--; 
		 }
 echo "</table>";
 echo "<br>";
	}

	//$rep_028 = (1)*$common_personal2[32];
	$str_028=663;
    $str_028_len= $rep_028*$str_028;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_028*$str_028);
    $i_028 = $rep_028;
	if($str_028_len > 0){
		
		echo "<table  border='0' cellspacing='5' cellpadding='5'>";
		echo "<tr>";
        foreach($arru as $a1){
        echo "<td align='center' bgcolor='#DBDBDB'>".$a1."</td>";  
		}
        echo "</tr>";

		 while($i_028 > 0){
		  
		   $sss = substr($b_str_div,$start_spot,$str_028);		   
		   $c_028=div_028($sss);       
		   //print_r($c_028);
		  
           $start_spot = $start_spot + $str_028;
		   $jj=0;
		   echo "<tr>";
           foreach($c_028 as $v){
		   echo "<td align='center' bgcolor='#ECECEC'>".$v."</td>"; 
		   //echo "[".$arru[$jj]."]".$v."<br>";
		   $jj++;
		   }
		   echo "</tr>";
			$i_028--; 
		 }
      echo "</table>";
	  echo "<br>";
	}
	
	//$rep_029 = (1)*$common_personal2[35];
	$str_029=125;
    $str_029_len= $rep_029*$str_029;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_029*$str_029);
    $i_029 = $rep_029;

	if($str_029_len > 0){

		echo "<table  border='0' cellspacing='5' cellpadding='5'>";
		echo "<tr>";
        foreach($arr029 as $a1){
        echo "<td align='center' bgcolor='#DBDBDB'>".$a1."</td>";  
		}
        echo "</tr>";

		 while($i_029 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_029);		   
		   $c_029=div_029($sss);       
		   //print_r($c_029);
           $start_spot = $start_spot + $str_029;
           $jj=0;
		   echo "<tr>";
           foreach($c_029 as $v){
		   echo "<td align='center' bgcolor='#ECECEC'>".$v."</td>"; 
		   $jj++;
		   }
		   echo "</tr>";

			$i_029--; 
		 }
	   echo "</table>";
	   echo "<br>";
	}

	//$rep_031 = (1)*$common_personal2[38];
	$str_031=107;
    $str_031_len= $rep_031*$str_031;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_031*$str_031);
    $i_031 = $rep_031;

	if($str_031_len > 0){

		echo "<table  border='0' cellspacing='5' cellpadding='5'>";
		echo "<tr>";
        foreach($arr031 as $a1){
        echo "<td align='center' bgcolor='#DBDBDB'>".$a1."</td>";  
		}
        echo "</tr>";


		 while($i_031 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_031);		   
		   $c_031=div_031($sss);       
		   //print_r($c_031);
           $start_spot = $start_spot + $str_031;
		   $jj=0;
		   echo "<tr>";
           foreach($c_031 as $v){
		   echo "<td align='center' bgcolor='#ECECEC'>".$v."</td>"; 
		   $jj++;
		   }
		   echo "</tr>";

			$i_031--; 
		 }
        echo "</table>";
		echo "<br>";
	}

	//$rep_032 = (1)*$common_personal2[41];
	$str_032=113;
    $str_032_len= $rep_032*$str_032;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_032*$str_032);
    $i_032 = $rep_032;

	if($str_032_len > 0){

		echo "<table  border='0' cellspacing='5' cellpadding='5'>";
		echo "<tr>";
        foreach($arr032 as $a1){
        echo "<td align='center' bgcolor='#DBDBDB'>".$a1."</td>";  
		}
        echo "</tr>";

		 while($i_032 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_032);		   
		   $c_032=div_032($sss);       
		   //print_r($c_032);
           $start_spot = $start_spot + $str_032;
           $jj=0;
		   echo "<tr>";
           foreach($c_032 as $v){
		   echo "<td align='center' bgcolor='#ECECEC'>".$v."</td>"; 
		   $jj++;
		   }

		   echo "</tr>";


			$i_032--; 
		 }
		  echo "</table>";
echo "<br>";
	}


	//$rep_033 = (1)*$common_personal2[44];
	$str_033=80;
    $str_033_len= $rep_033*$str_033;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_033*$str_033);
    $i_033 = $rep_033;

	if($str_033_len > 0){

        echo "<table  border='0' cellspacing='5' cellpadding='5'>";
		echo "<tr>";
        foreach($arr033 as $a1){
        echo "<td align='center' bgcolor='#DBDBDB'>".$a1."</td>";  
		}
        echo "</tr>";

		 while($i_033 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_033);		   
		   $c_033=div_033($sss);       
		   //print_r($c_033);
           $start_spot = $start_spot + $str_033;
           $jj=0;
		   echo "<tr>";
           foreach($c_033 as $v){
		   echo "<td align='center' bgcolor='#ECECEC'>".$v."</td>"; 
		   $jj++;
		   }

		   echo "</tr>";

			$i_033--; 
		 }

		echo "</table>";
echo "<br>"; 
	}

	//$rep_035 = (1)*$common_personal2[47];
	$str_035=115;
    $str_035_len= $rep_035*$str_035;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_035*$str_035);
    $i_035 = $rep_035;

	if($str_035_len > 0){

		echo "<table  border='0' cellspacing='5' cellpadding='5'>";
		echo "<tr>";
        foreach($arr035 as $a1){
        echo "<td align='center' bgcolor='#DBDBDB'>".$a1."</td>";  
		}
        echo "</tr>";

		 while($i_035 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_035);		   
		   $c_035=div_035($sss);       
		   //print_r($c_035);
           $start_spot = $start_spot + $str_035;
		   $jj=0;
		   echo "<tr>";
           foreach($c_035 as $v){
		   echo "<td align='center' bgcolor='#ECECEC'>".$v."</td>"; 
		   $jj++;
		   }

		   echo "</tr>";

			$i_035--; 
		 }

		 echo "</table>";
echo "<br>";
	}

	//$rep_036 = (1)*$common_personal2[50];
	$str_036=58;
    $str_036_len= $rep_036*$str_036;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_036*$str_036);
    $i_036 = $rep_036;

	if($str_036_len > 0){

		echo "<table  border='0' cellspacing='5' cellpadding='5'>";
		echo "<tr>";
        foreach($arr036 as $a1){
        echo "<td align='center' bgcolor='#DBDBDB'>".$a1."</td>";  
		}
        echo "</tr>";

		 while($i_036 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_036);		   
		   $c_036=div_036($sss);       
		   //print_r($c_036);
           $start_spot = $start_spot + $str_036;

		   $jj=0;
		   echo "<tr>";
           foreach($c_036 as $v){
		   echo "<td align='center' bgcolor='#ECECEC'>".$v."</td>"; 
		   $jj++;
		   }

		   echo "</tr>";

		   $i_036--; 

		 }

		 echo "</table>";
         echo "<br>";

	}

	//$rep_037 = (1)*$common_personal2[53];
	$str_037=124;
    $str_037_len= $rep_037*$str_037;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_037*$str_037);
    $i_037 = $rep_037;

	if($str_037_len > 0){

		echo "<table  border='0' cellspacing='5' cellpadding='5'>";
		echo "<tr>";
        foreach($arr037 as $a1){
        echo "<td align='center' bgcolor='#DBDBDB'>".$a1."</td>";  
		}
        echo "</tr>";


		 while($i_037 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_037);		   
		   $c_037=div_037($sss);       
		   //print_r($c_037);
           $start_spot = $start_spot + $str_037;

		   $jj=0;
		   echo "<tr>";
           foreach($c_037 as $v){
		   echo "<td align='center' bgcolor='#ECECEC'>".$v."</td>"; 
		   $jj++;
		   }

		   echo "</tr>";

			$i_037--; 

		 }

		 echo "</table>";
         echo "<br>";

	}
	//$rep_038 = (1)*$common_personal2[56];
	$str_038=61;
    $str_038_len= $rep_038*$str_038;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_038*$str_038);
    $i_038 = $rep_038;

	if($str_038_len > 0){

		echo "<table  border='0' cellspacing='5' cellpadding='5'>";
		echo "<tr>";
        foreach($arr038 as $a1){
        echo "<td align='center' bgcolor='#DBDBDB'>".$a1."</td>";  
		}
        echo "</tr>";

		 while($i_038 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_038);		   
		   $c_038=div_038($sss);       
		   //print_r($c_038);
           $start_spot = $start_spot + $str_038;
           $jj=0;
		   echo "<tr>";
           foreach($c_038 as $v){
		   echo "<td align='center' bgcolor='#ECECEC'>".$v."</td>"; 
		   $jj++;
		   }

		   echo "</tr>";

			$i_038--; 

		 }

		 echo "</table>";
         echo "<br>";
	}

	//$rep_039 = (1)*$common_personal2[59];
	$str_039=73;
    $str_039_len= $rep_039*$str_039;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_039*$str_039);
    $i_039 = $rep_039;

	if($str_039_len > 0){

		echo "<table  border='0' cellspacing='5' cellpadding='5'>";
		echo "<tr>";
        foreach($arr038 as $a1){
        echo "<td align='center' bgcolor='#DBDBDB'>".$a1."</td>";  
		}
        echo "</tr>";

		 while($i_039 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_039);		   
		   $c_039=div_039($sss);       
		   //print_r($c_039);
           $start_spot = $start_spot + $str_039;
           $jj=0;
		   echo "<tr>";
           foreach($c_039 as $v){
		   echo "<td align='center' bgcolor='#ECECEC'>".$v."</td>"; 
		   $jj++;
		   }

		   echo "</tr>";

			$i_039--; 

		 }

		 echo "</table>";
         echo "<br>";
	}

	//$rep_103 = (1)*$common_personal2[62];
	$str_103=21;
    $str_103_len= $rep_103*$str_103;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_103*$str_103);
    $i_103 = $rep_103;

	if($str_103_len > 0){
		 while($i_103 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_103);		   
		   $c_103=div_103($sss);       
		   //print_r($c_103);
           $start_spot = $start_spot + $str_103;


			$i_103--; 

		 }

	}


 }

$iii++;

}///////////////////////foreac end


   

?>