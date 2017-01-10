<?
set_time_limit(0);

include "config.php";
include_once "../comm/db_info.php";

$LogName = date("Ymd") . "_361_req.log";
$LogName_rev = date("Ymd") . "_361_res.log";
$LOG_DIR = $LOG_DIR . "scd1/";


//변수 목록
$loan_period = "000"; //대출기간
$loan_money = ""; //대출금액
$return_method = "";//상환방법

$worker_id = str_pad("SYSTEM", 10, " ",STR_PAD_RIGHT);

$times = mktime();
$s_send = date("Ymdhis", $times);
$s_send8 = date("Ymd", $times);
$birthday = trim($_REQUEST['ap_year']).trim($_REQUEST['ap_month']).trim($_REQUEST['ap_day']);
$handphoone = str_pad(trim($_REQUEST['ap_hp1']),4, " ",STR_PAD_RIGHT).trim($_REQUEST['ap_hp2']).trim($_REQUEST['ap_hp3']);
$mangnum = $birthday.$handphoone;
$sex = (trim($_REQUEST['ap_sex']) == "1")? "1" : "2";
$ip=$_SERVER['REMOTE_ADDR'];
$_REQUEST['ap_name']="정예서";

$ap_name = $_REQUEST['ap_name'];
$o = array( 'ap_sex'=>$s_send8);
//echo json_encode($o);

//$conn


$skn = $_REQUEST['skn'];

$rs_st=mysql_query("select s_key,s_bps_no from scd_360 where s_kcb_no='$skn' order by s_datetime desc limit 1",$conn);
$row_st=mysql_fetch_row($rs_st);
$s_key = $row_st[0];
$s_bps_no = $row_st[1];


//공통부
//$param = str_pad("", 4, " ", STR_PAD_RIGHT);// 송수신 전문길이(TCP/IP)      Binary      4      O
$param = str_pad("SCDEV", 9, " ", STR_PAD_RIGHT);// Transaction Code      AN      9      9      O
$param .= str_pad("X0004000", 8, " ", STR_PAD_RIGHT);// 이용자번호      AN      8      17      O
$param .= str_pad("0100", 4, " ", STR_PAD_RIGHT);// 전문종별코드      AN      4      21      O
$param .= str_pad("361", 3, " ", STR_PAD_RIGHT);// 업무구분코드      AN      3      24      O
$param .= str_pad("B", 1, " ", STR_PAD_RIGHT);// 송수신 Flag      A      1      25      O
$param .= str_pad(" ", 4, " ", STR_PAD_RIGHT);// 응답코드      AN      4      29      
$param .= str_pad("0000000", 7, " ", STR_PAD_RIGHT);// KCB 전문 관리번호      N      7      36      
$param .= str_pad("00000000000000", 14, " ", STR_PAD_RIGHT);// KCB 전문 전송시간      N      14      50      
$param .= str_pad("1", 7, " ", STR_PAD_RIGHT);// 회원사 전문 관리번호      N      7      57      O
$param .= str_pad("$s_send", 14, " ", STR_PAD_RIGHT);// 회원사 전문전송 시간      N      14      71      O
$param .= str_pad(" ", 16, " ", STR_PAD_RIGHT);// KCB System 정보      AN      16      87      
$param .= str_pad(" ", 43, " ", STR_PAD_RIGHT);// FILLER      AN      43      130      O



//요청정보부
$param .= str_pad("1000001230", 10, " ", STR_PAD_RIGHT);//1      제휴사코드      AN      10      10      O
$param .= str_pad("370", 10, " ", STR_PAD_RIGHT);//2      서비스코드      AN      10      20      O
$param .= str_pad("1", 20, " ", STR_PAD_RIGHT);//3      관리번호      AN      20      40      O
$param .= str_pad("$s_key", 20, " ", STR_PAD_RIGHT);//4      신청키      AN      20      60      O
$param .= str_pad($s_send8, 8, " ", STR_PAD_RIGHT);//5      신청일자      AN      8      68      O
$param .= str_pad("Y", 1, " ", STR_PAD_RIGHT);//6      조회동의여부      AN      1      69      O
$param .= str_pad("beyond1005", 30, " ", STR_PAD_RIGHT);//7      SCD조회자ID      AN      30      99      O
$param .= str_pad("", 100, " ", STR_PAD_RIGHT);//8      FILLER      AN      100      199      O

$param1 = sprintf("%010d", strlen($param)) . $param;
$tcpip = str_pad(strlen($param), 4, "0",STR_PAD_LEFT);
$param2 = $tcpip.$param;

WriteLog($LOG_DIR . $LogName, str_pad($param2, 4, "0",STR_PAD_RIGHT).$param2, "S");
$msg=socket_1f007($SERVER_IP, $CREDIT_REAL_PORT, $param2);

/////////////파일로그 기록/////////////////////
if ($msg)	WriteLog($LOG_DIR.$LogName_rev,$msg,"R");
// 공통부, 개별응답부, 응답정보부 나누기



$st_sw = trim($st_sw);
$today = date("Y-m-d");
	// 공통부, 개별응답부, 응답정보부 나누기
	$block=div_block($msg);

	//공통부 세분화
	$common_block=div_common($block[0]);
	//print_r($common_block);
    //개별응답부 세분화
	$personal_block=div_personal($block[1]);
    //print_r($personal_block);
    
    $times_1 = mktime();
	$s_send_1 = date("Ymdhis", $times_1);
	$s_send8_1 = date("Ymd", $times_1);
    $aaa = trim($personal_block[5]);
	//$aaa = "7847457377";
	//공통부
	//$param = str_pad("", 4, " ", STR_PAD_RIGHT);// 송수신 전문길이(TCP/IP)      Binary      4      O
	$param_361 = str_pad("SCDEV", 9, " ", STR_PAD_RIGHT);// Transaction Code      AN      9      9      O
	$param_361 .= str_pad("X0004000", 8, " ", STR_PAD_RIGHT);// 이용자번호      AN      8      17      O
	$param_361 .= str_pad("0100", 4, " ", STR_PAD_RIGHT);// 전문종별코드      AN      4      21      O
	$param_361 .= str_pad("371", 3, " ", STR_PAD_RIGHT);// 업무구분코드      AN      3      24      O
	$param_361 .= str_pad("B", 1, " ", STR_PAD_RIGHT);// 송수신 Flag      A      1      25      O
	$param_361 .= str_pad(" ", 4, " ", STR_PAD_RIGHT);// 응답코드      AN      4      29      
	$param_361 .= str_pad("0000000", 7, " ", STR_PAD_RIGHT);// KCB 전문 관리번호      N      7      36      
	$param_361 .= str_pad("00000000000000", 14, " ", STR_PAD_RIGHT);// KCB 전문 전송시간      N      14      50      
	$param_361 .= str_pad("$s_bps_no", 7, " ", STR_PAD_RIGHT);// 회원사 전문 관리번호      N      7      57      O
	$param_361 .= str_pad("$s_send_1", 14, " ", STR_PAD_RIGHT);// 회원사 전문전송 시간      N      14      71      O
	$param_361 .= str_pad(" ", 16, " ", STR_PAD_RIGHT);// KCB System 정보      AN      16      87      
	$param_361 .= str_pad(" ", 43, " ", STR_PAD_RIGHT);// FILLER      AN      43      130      O

	$param_361  .= str_pad("000000000000", 12, " ",STR_PAD_RIGHT);//1          001          인증번호          AN          12          12          
	$param_361  .= str_pad("0", 2, "0",STR_PAD_LEFT);//2          003          재요청횟수          N          2          14          
	$param_361  .= str_pad("77", 2, " ",STR_PAD_RIGHT);//3          006          조회목적코드          AN          2          16          
	$param_361  .= str_pad("BEYOND", 20, " ",STR_PAD_RIGHT);//4          009          조회지점명          AN          20          36          
	$param_361  .= str_pad("beyond1005", 15, " ",STR_PAD_RIGHT);//5          010          담당자ID          AN          15          51          
	$param_361  .= str_pad("$aaa", 13, " ",STR_PAD_RIGHT);//6          012          대체키          N          13          64          
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//7          017          신상정보 총수신건수          N          3          67          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//8          017          신상정보 요청건수          N          2          69          
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//9          018          신용평점 총수신건수          N          3          72          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//10         018          신용평점 요청건수          N          2          74          
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//11         019          신용평점 연간 이력 총수신건수          N          3          77          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//12         019          신용평점 연간 이력 요청건수          N          2          79          
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//13         020          신용평점 영향 요소 총수신건수          N          3          82          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//14         020          신용평점 영향 요소 요청건수          N          2          84          
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//15         023          대출개설정보(KFB) 총수신건수          N          3          87          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//16         023          대출개설정보(KFB) 요청건수          N          2          89          
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//17         024          대출개설정보(KCB) 총수신건수          N          3          92          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//18         024          대출개설정보(KCB) 요청건수          N          2          94          
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//19         025          연간대출 실적 요약(KCB) 총수신건수          N          3          97          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//20         025          연간대출 실적 요약(KCB) 요청건수          N          2          99          
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//21         026          현금서비스정보(KFB) 총수신건수          N          3          102          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//22         026          현금서비스정보(KFB) 요청건수          N          2          104          
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//23         027          카드개설정보(KFB) 총수신건수          N          3          107          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//24         027          카드개설정보(KFB) 요청건수          N          2          109          
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//25         028          카드실적/연체이력정보(KCB) 총수신건수          N          3          112          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//26         028          카드실적/연체이력정보(KCB) 요청건수          N          2          114          
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//27         029          연체정보(KCB) 총수신건수          N          3          117          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//28         029          연체정보(KCB) 요청건수          N          2          119          
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//29         031          대지급정보 총수신건수          N          3          122          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//30         031          대지급정보 요청건수            N          2          124
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//31         032          채무불이행정보(KFB) 총수신건수   N          3          127
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//32         032          채무불이행정보(KFB) 요청건수   N          2          129
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//33         033          채무불이행정보(KCB) 총수신건수          N          3          132          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//34         033          채무불이행정보(KCB) 요청건수          N          2          134          
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//35         035          공공정보 및 금융질서문란 정보 총수신건수          N          3          137          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//36         035          공공정보 및 금융질서문란 정보 요청건수          N          2          139          
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//37         036          연대보증정보(KFB) 총수신건수          N          3          142          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//38         036          연대보증정보(KFB) 요청건수          N          2          144          
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//39         037          지급보증정보(KCB) 총수신건수          N          3          147          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//40         037          지급보증정보(KCB) 요청건수          N          2          149          
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//41         038          연대보증 상세 내역(KCB) 총수신건수          N          3          152          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//42         038          연대보증 상세 내역(KCB) 요청건수          N          2          154          
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//43         039          신용회복위원회정보 총수신건수          N          3          157          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//44         039          신용회복위원회정보 요청건수          N          2          159          
	$param_361  .= str_pad("0", 3, "0",STR_PAD_LEFT);//45         103          CPS 총수신건수          N          3          162          
	$param_361  .= str_pad("047", 3, "0",STR_PAD_LEFT);//46         103          CPS 요청건수          N          3          165       

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("C1L120078", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("C1L120168", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("C1N2CRW01", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("C1P000002", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("C1Z000009", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("C1N13U001", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("S91000000", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("S91101000", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("S83001000", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("S83101000", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D20110000", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D30110000", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D10210D00", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D24210000", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D30000001", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D24110000", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D10110600", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D1021060C", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D1021060F", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D10210600", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D10232600", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D10187000", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D10110003", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D1017500K", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D10110006", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D1017500N", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D1017500T", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D1Z000109", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D1011000C", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D21210000", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D2111000F", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("D10132D0T", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("G10210000", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("L1K220000", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("C1N228000", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("L10220000", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("L10210003", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("L1K110003", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("L1021A000", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("L1523C000", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("L1423C000", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("L1623C000", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("C1N238000", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("L10210800", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("L90210300", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("C1M210003", 9, " ",STR_PAD_RIGHT);

    $param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
    $param_361  .= str_pad("C1M220000", 9, " ",STR_PAD_RIGHT);       
    
    $tcpip = str_pad(strlen($param_361), 4, "0",STR_PAD_LEFT);
    $param_361 = $tcpip.$param_361;

	$LogName2 = date("Ymd") . "_".$aaa."_req.log";
	$LogName_rev2 = date("YmdHis") . "_".$aaa."_res.log";
    //echo $param_361."</br>";//str_pad($param_361, 4, "0",STR_PAD_RIGHT).
    WriteLog($LOG_DIR . $LogName2, $param_361, "S");
	$msg2=socket_1f007($SERVER_IP, $CREDIT_REAL_PORT, $param_361);

	echo $msg2;
    
    if ($msg2)	WriteLog($LOG_DIR.$LogName_rev2,$msg2,"R");
	echo "<br>**************************".date("Ymd") . "_".$aaa."_res"."*********************<br>";
	$file_name = substr($LogName_rev2,0,29);
	$sql_98  = "update scd_360 set files = '$file_name' where s_bps_no = '$s_bps_no' ";
	@mysql_query($sql_98, $conn);


    $msg2len = strlen($msg2);
	$block2=div_block2($msg2);
    
    
    //응답정보부 세분화
	function div_info($string)
	{	
		global $personal_block;

		// 활용 scheme수
		if($personal_block[3]) {
			$length13=(20)*$personal_block[3];
			$result[0]=substr($string, 0, $length13);
		} else $result[0]="";


		// 활용 rule 개수
		if($personal_block[4]) {
			$length14=(40)*$personal_block[4];
			$result[1]=substr($string,$length13, $length14);									
		} else $result[1]="";


		return $result;	
	}

    
    

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
	$re_017 = $common_personal2[6];
	$re_018 = $common_personal2[9];
	$re_019 = $common_personal2[12];
	$re_020 = $common_personal2[15];
	$re_023 = $common_personal2[18];
	$re_024 = $common_personal2[21];
	$re_025 = $common_personal2[24];
	$re_026 = $common_personal2[27];
	$re_027 = $common_personal2[30];
	$re_028 = $common_personal2[33];
	$re_029 = $common_personal2[36];
	$re_031 = $common_personal2[39];
	$re_032 = $common_personal2[42];
	$re_033 = $common_personal2[45];
	$re_035 = $common_personal2[48];
	$re_036 = $common_personal2[51];
	$re_037 = $common_personal2[54];
	$re_038 = $common_personal2[57];
	$re_039 = $common_personal2[60];
	$re_103 = $common_personal2[63];

	$rep_017 = (1)*$common_personal2[5];	
	$str_017 = 245;
	$str_017_len = $rep_017*$str_017;
    $start_spot_next = $start_spot + ($rep_017*$str_017);
 

	if($str_017_len > 0){
		$i_017 = $rep_017;
		@mysql_query( "delete from div_017 where savekey = '".$aaa."'" );
		while($i_017 > 0){
	       
		   $sss = substr($b_str_div,$start_spot,$start_spot + $str_017);
		   
		   $c_017=div_017($sss);
  
           $start_spot = $start_spot + $str_017;
		
            $column_017 = array();
			$r = mysql_query( "DESC div_017" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_017[] = $d[0];
			}	

			$sql_017  = "insert into div_017 ( ";
			$sql_017 .= "  savekey, ";

			for($x = 2; $x < count($column_017)-1; $x++) {
			  $sql_017 .= "$column_017[$x]".",";
			}
			$sql_017 .= "  e_datetime ";
			$sql_017 .= "  ) values ( ";
			$sql_017 .= "  '".$aaa."', ";
			foreach ($c_017 as  $k => $v) { 
					$sql_017 .= "  '".$v."', ";
			} 
			$sql_017 .= " now() ";
			$sql_017 .= "  );";

			@mysql_query( $sql_017 );
			//echo $sql_017."<br>";
			$i_017--;
		}
	}

	
    
	$rep_018 = (1)*$common_personal2[8];
	$str_018 = 9;
	$str_018_len = $rep_018*$str_018;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_018*$str_018);
    $i_018 = $rep_018;

	if($str_018_len > 0){
		   @mysql_query( "delete from div_018 where savekey = '".$aaa."'" );
		   while($i_018 > 0){
			   
			   $sss = substr($b_str_div,$start_spot_1,$str_018);		
			   echo $start_spot."<br>";
			   $c_018=div_018($sss);
			   			  
			   $start_spot = $start_spot + $str_018;

				$column_018 = array();
				$r = mysql_query( "DESC div_018" );
				while ( $d = mysql_fetch_array( $r ) ) {
					$column_018[] = $d[0];
				}	
				
				$sql_018  = "insert into div_018 ( ";
				$sql_018 .= "  savekey, ";

				for($x = 2; $x < count($column_018)-1; $x++) {
				  $sql_018 .= "$column_018[$x]".",";
				}
				$sql_018 .= "  e_datetime "; 
				$sql_018 .= "  ) values ( ";
				$sql_018 .= "  '".$aaa."', ";
				foreach ($c_018 as  $k => $v) { 
						$sql_018 .= "  '".$v."', ";
				} 
				$sql_018 .= " now() ";
				$sql_018 .= "  );";

				mysql_query( $sql_018 );
                //echo $sql_018."<br>";
				$i_018--;
		    }
	}
    
	$rep_019 = (1)*$common_personal2[11];
	$str_019 = 75;
    $str_019_len= $rep_019*$str_019;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_019*$str_019);
    $i_019 = $rep_019;

	if($str_019_len > 0){
	@mysql_query( "delete from div_019 where savekey = '".$aaa."'" );
		 while($i_019 > 0){
			 
		   $sss = substr($b_str_div,$start_spot,$str_019);		   
		   $c_019=div_019($sss);       
		   //print_r($c_019);
           $start_spot = $start_spot + $str_019;

            $column_019 = array();
			$r = mysql_query( "DESC div_019" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_019[] = $d[0];
			}	

			$sql_019  = "insert into div_019 ( ";
			$sql_019 .= "  savekey, ";

			for($x = 2; $x < count($column_019)-1; $x++) {
			  $sql_019 .= "$column_019[$x]".",";
			}
			$sql_019 .= "  e_datetime "; 
			$sql_019 .= "  ) values ( ";
			$sql_019 .= "  '".$aaa."', ";
			foreach ($c_019 as  $k => $v) { 
					$sql_019 .= "  '".$v."', ";
			} 
			$sql_019 .= " now() ";
			$sql_019 .= "  );";

			mysql_query( $sql_019 );
            $i_019--; 
		 }

	}

	$rep_020 = (1)*$common_personal2[14];
	$str_020 = 39;
    $str_020_len= $rep_020*$str_020;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_020*$str_020);
    $i_020 = $rep_020;

	if($str_020_len > 0){
	@mysql_query( "delete from div_020 where savekey = '".$aaa."'" );
		 while($i_020 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_020);		   
		   $c_020=div_020($sss);       
		   
           $start_spot = $start_spot + $str_020;

		    $column_020 = array();
			$r = mysql_query( "DESC div_020" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_020[] = $d[0];
			}	

			$sql_020  = "insert into div_020 ( ";
			$sql_020 .= "  savekey, ";

			for($x = 2; $x < count($column_020)-1; $x++) {
			  $sql_020 .= "$column_020[$x]".",";
			}
            $sql_020 .= "  e_datetime "; 
			$sql_020 .= "  ) values ( ";
			$sql_020 .= "  '".$aaa."', ";
			foreach ($c_020 as  $k => $v) { 
					$sql_020 .= "  '".$v."', ";
			} 
			$sql_020 .= " now() ";
			$sql_020 .= "  );";

			mysql_query( $sql_020 );
			$i_020--; 
		 }

	}

	$rep_023 = (1)*$common_personal2[17];
	$str_023 = 133;
    $str_023_len= $rep_023*$str_023;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_023*$str_023);
    $i_023 = $rep_023;

	if($str_023_len > 0){
	@mysql_query( "delete from div_023 where savekey = '".$aaa."'" );
		 while($i_023 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_023);		   
		   $c_023=div_023($sss);       
		   //print_r($c_023);
           $start_spot = $start_spot + $str_023;

            $column_023 = array();
			$r = mysql_query( "DESC div_023" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_023[] = $d[0];
			}	

			$sql_023  = "insert into div_023 ( ";
			$sql_023 .= "  savekey, ";

			for($x = 2; $x < count($column_023)-1; $x++) {
			  $sql_023 .= "$column_023[$x]".",";
			}
			$sql_023 .= "  e_datetime "; 
			$sql_023 .= "  ) values ( ";
			$sql_023 .= "  '".$aaa."', ";
			foreach ($c_023 as  $k => $v) { 
					$sql_023 .= "  '".$v."', ";
			} 
			$sql_023 .= " now() ";
			$sql_023 .= "  );";

			mysql_query( $sql_023 );
            $i_023--; 
		 }

	}

	$rep_024 = (1)*$common_personal2[20];
	$str_024 = 74;
    $str_024_len= $rep_024*$str_024;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_024*$str_024);
    $i_024 = $rep_024;

	if($str_024_len > 0){
	@mysql_query( "delete from div_024 where savekey = '".$aaa."'" );
		 while($i_024 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_024);		   
		   $c_024=div_024($sss);       
		   //print_r($c_024);
           $start_spot = $start_spot + $str_024;

		    $column_024 = array();
			$r = mysql_query( "DESC div_024" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_024[] = $d[0];
			}	

			$sql_024  = "insert into div_024 ( ";
			$sql_024 .= "  savekey, ";
       
			for($x = 2; $x < count($column_024)-1; $x++) {
			  $sql_024 .= "$column_024[$x]".",";
			}
			$sql_024 .= "  e_datetime "; 
			$sql_024 .= "  ) values ( ";
			$sql_024 .= "  '".$aaa."', ";
			foreach ($c_024 as  $k => $v) { 
					$sql_024 .= "  '".$v."', ";
			} 
			$sql_024 .= " now() ";
			$sql_024 .= "  );";

			mysql_query( $sql_024 );
			$i_024--; 
		 }

	}

	$rep_025 = (1)*$common_personal2[23];
	$str_025=519;
    $str_025_len= $rep_025*$str_025;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_024*$str_024);
    $i_025 = $rep_025;

	if($str_025_len > 0){
	@mysql_query( "delete from div_025 where savekey = '".$aaa."'" );
		 while($i_025 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_025);		   
		   $c_025=div_025($sss);       
		   //print_r($c_025);
           $start_spot = $start_spot + $str_025;

		    $column_025 = array();
			$r = mysql_query( "DESC div_025" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_025[] = $d[0];
			}	

			$sql_025  = "insert into div_025 ( ";
			$sql_025 .= "  savekey, ";

			for($x = 2; $x < count($column_025)-1; $x++) {
			  $sql_025 .= "$column_025[$x]".",";
			}
			$sql_025 .= "  e_datetime ";
			$sql_025 .= "  ) values ( ";
			$sql_025 .= "  '".$aaa."', ";
			foreach ($c_025 as  $k => $v) { 
					$sql_025 .= "  '".$v."', ";
			} 
			$sql_025 .= " now() ";
			$sql_025 .= "  );";

			mysql_query( $sql_025 );
			$i_025--; 
		 }

	}

	$rep_026 = (1)*$common_personal2[26];
	$str_026=58;
    $str_026_len= $rep_026*$str_026;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_026*$str_026);
    $i_026 = $rep_026;

	if($str_026_len > 0){
	@mysql_query( "delete from div_026 where savekey = '".$aaa."'" );
		 while($i_026 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_026);		   
		   $c_026=div_026($sss);       
		   //print_r($c_026);
           $start_spot = $start_spot + $str_026;

		    $column_026 = array();
			$r = mysql_query( "DESC div_026" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_026[] = $d[0];
			}	

			$sql_026  = "insert into div_026 ( ";
			$sql_026 .= "  savekey, ";

			for($x = 2; $x < count($column_026)-1; $x++) {
			  $sql_026 .= "$column_026[$x]".",";
			}
			$sql_026 .= "  e_datetime ";
			$sql_026 .= "  ) values ( ";
			$sql_026 .= "  '".$aaa."', ";
			foreach ($c_026 as  $k => $v) { 
					$sql_026 .= "  '".$v."', ";
			} 
			$sql_026 .= " now() ";
			$sql_026 .= "  );";

			mysql_query( $sql_026 );
			$i_026--; 
		 }

	}


	$rep_027 = (1)*$common_personal2[29];
	$str_027=85;
    $str_027_len= $rep_027*$str_027;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_027*$str_027);
    $i_027 = $rep_027;

	if($str_027_len > 0){
	@mysql_query( "delete from div_027 where savekey = '".$aaa."'" );
		 while($i_027 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_027);		   
		   $c_027=div_027($sss);       
		   //print_r($c_027);
           $start_spot = $start_spot + $str_027;

		    $column_027 = array();
			$r = mysql_query( "DESC div_027" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_027[] = $d[0];
			}	

			$sql_027  = "insert into div_027 ( ";
			$sql_027 .= "  savekey, ";

			for($x = 2; $x < count($column_027)-1; $x++) {
			  $sql_027 .= "$column_027[$x]".",";
			}
			$sql_027 .= "  e_datetime ";
			$sql_027 .= "  ) values ( ";
			$sql_027 .= "  '".$aaa."', ";
			foreach ($c_027 as  $k => $v) { 
					$sql_027 .= "  '".$v."', ";
			} 
			$sql_027 .= " now() ";
			$sql_027 .= "  );";

			@mysql_query( $sql_027 );
			$i_027--; 
		 }

	}

	$rep_028 = (1)*$common_personal2[32];
	$str_028=663;
    $str_028_len= $rep_028*$str_028;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_028*$str_028);
    $i_028 = $rep_028;

	if($str_028_len > 0){
	@mysql_query( "delete from div_028 where savekey = '".$aaa."'" );
		 while($i_028 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_028);		   
		   $c_028=div_028($sss);       
		   //print_r($c_028);
           $start_spot = $start_spot + $str_028;

		    $column_028 = array();
			$r = mysql_query( "DESC div_028" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_028[] = $d[0];
			}	

			$sql_028  = "insert into div_028 ( ";
			$sql_028 .= "  savekey, ";

			for($x = 2; $x < count($column_028)-1; $x++) {
			  $sql_028 .= "$column_028[$x]".",";
			}
			$sql_028 .= "  e_datetime ";
			$sql_028 .= "  ) values ( ";
			$sql_028 .= "  '".$aaa."', ";
			foreach ($c_028 as  $k => $v) { 
					$sql_028 .= "  '".$v."', ";
			} 
			$sql_028 .= " now() ";
			$sql_028 .= "  );";

			mysql_query( $sql_028 );
			$i_028--; 
		 }

	}
	
	$rep_029 = (1)*$common_personal2[35];
	$str_029=125;
    $str_029_len= $rep_029*$str_029;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_029*$str_029);
    $i_029 = $rep_029;

	if($str_029_len > 0){
	@mysql_query( "delete from div_029 where savekey = '".$aaa."'" );
		 while($i_029 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_029);		   
		   $c_029=div_029($sss);       
		   //print_r($c_029);
           $start_spot = $start_spot + $str_029;

		    $column_029 = array();
			$r = mysql_query( "DESC div_029" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_029[] = $d[0];
			}	

			$sql_029  = "insert into div_029 ( ";
			$sql_029 .= "  savekey, ";

			for($x = 2; $x < count($column_029)-1; $x++) {
			  $sql_029 .= "$column_029[$x]".",";
			}
			$sql_029 .= "  e_datetime ";
			$sql_029 .= "  ) values ( ";
			$sql_029 .= "  '".$aaa."', ";
			foreach ($c_029 as  $k => $v) { 
					$sql_029 .= "  '".$v."', ";
			} 
			$sql_029 .= " now() ";
			$sql_029 .= "  );";

			mysql_query( $sql_029 );
			$i_029--; 
		 }

	}

	$rep_031 = (1)*$common_personal2[38];
	$str_031=107;
    $str_031_len= $rep_031*$str_031;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_031*$str_031);
    $i_031 = $rep_031;

	if($str_031_len > 0){
	@mysql_query( "delete from div_031 where savekey = '".$aaa."'" );
		 while($i_031 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_031);		   
		   $c_031=div_031($sss);       
		   //print_r($c_031);
           $start_spot = $start_spot + $str_031;

		    $column_031 = array();
			$r = mysql_query( "DESC div_031" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_031[] = $d[0];
			}	

			$sql_031  = "insert into div_031 ( ";
			$sql_031 .= "  savekey, ";

			for($x = 2; $x < count($column_031)-1; $x++) {
			  $sql_031 .= "$column_031[$x]".",";
			}
			$sql_031 .= "  e_datetime ";
			$sql_031 .= "  ) values ( ";
			$sql_031 .= "  '".$aaa."', ";
			foreach ($c_031 as  $k => $v) { 
					$sql_031 .= "  '".$v."', ";
			} 
			$sql_031 .= " now() ";
			$sql_031 .= "  );";

			mysql_query( $sql_031 );
			$i_031--; 
		 }

	}

	$rep_032 = (1)*$common_personal2[41];
	$str_032=113;
    $str_032_len= $rep_032*$str_032;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_032*$str_032);
    $i_032 = $rep_032;

	if($str_032_len > 0){
	@mysql_query( "delete from div_032 where savekey = '".$aaa."'" );
		 while($i_032 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_032);		   
		   $c_032=div_032($sss);       
		   //print_r($c_032);
           $start_spot = $start_spot + $str_032;

		    $column_032 = array();
			$r = mysql_query( "DESC div_032" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_032[] = $d[0];
			}	

			$sql_032  = "insert into div_032 ( ";
			$sql_032 .= "  savekey, ";

			for($x = 2; $x < count($column_032)-1; $x++) {
			  $sql_032 .= "$column_032[$x]".",";
			}
			$sql_032 .= "  e_datetime ";
			$sql_032 .= "  ) values ( ";
			$sql_032 .= "  '".$aaa."', ";
			foreach ($c_032 as  $k => $v) { 
					$sql_032 .= "  '".$v."', ";
			} 
			$sql_032 .= " now() ";
			$sql_032 .= "  );";

			mysql_query( $sql_032 );
			$i_032--; 
		 }

	}

	$rep_033 = (1)*$common_personal2[44];
	$str_033=80;
    $str_033_len= $rep_033*$str_033;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_033*$str_033);
    $i_033 = $rep_033;

	if($str_033_len > 0){
	@mysql_query( "delete from div_033 where savekey = '".$aaa."'" );
		 while($i_033 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_033);		   
		   $c_033=div_033($sss);       
		   //print_r($c_033);
           $start_spot = $start_spot + $str_033;

		    $column_033 = array();
			$r = mysql_query( "DESC div_033" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_033[] = $d[0];
			}	

			$sql_033  = "insert into div_033 ( ";
			$sql_033 .= "  savekey, ";

			for($x = 2; $x < count($column_033)-1; $x++) {
			  $sql_033 .= "$column_033[$x]".",";
			}
			$sql_033 .= "  e_datetime ";
			$sql_033 .= "  ) values ( ";
			$sql_033 .= "  '".$aaa."', ";
			foreach ($c_033 as  $k => $v) { 
					$sql_033 .= "  '".$v."', ";
			} 
			$sql_033 .= " now() ";
			$sql_033 .= "  );";

			mysql_query( $sql_033 );
			$i_033--; 
		 }

	}

	$rep_035 = (1)*$common_personal2[47];
	$str_035=115;
    $str_035_len= $rep_035*$str_035;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_035*$str_035);
    $i_035 = $rep_035;

	if($str_035_len > 0){
	@mysql_query( "delete from div_035 where savekey = '".$aaa."'" );
		 while($i_035 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_035);		   
		   $c_035=div_035($sss);       
		   ////print_r($c_035);
           $start_spot = $start_spot + $str_035;

		    $column_035 = array();
			$r = mysql_query( "DESC div_035" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_035[] = $d[0];
			}	

			$sql_035  = "insert into div_035 ( ";
			$sql_035 .= "  savekey, ";

			for($x = 2; $x < count($column_035)-1; $x++) {
			  $sql_035 .= "$column_035[$x]".",";
			}
			$sql_035 .= "  e_datetime ";
			$sql_035 .= "  ) values ( ";
			$sql_035 .= "  '".$aaa."', ";
			foreach ($c_035 as  $k => $v) { 
					$sql_035 .= "  '".$v."', ";
			} 
			$sql_035 .= " now() ";
			$sql_035 .= "  );";

			mysql_query( $sql_035 );
			$i_035--; 
		 }

	}

	$rep_036 = (1)*$common_personal2[50];
	$str_036=58;
    $str_036_len= $rep_036*$str_036;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_036*$str_036);
    $i_036 = $rep_036;

	if($str_036_len > 0){
	@mysql_query( "delete from div_036 where savekey = '".$aaa."'" );
		 while($i_036 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_036);		   
		   $c_036=div_036($sss);       
		   //print_r($c_036);
           $start_spot = $start_spot + $str_036;

		    $column_036 = array();
			$r = mysql_query( "DESC div_036" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_036[] = $d[0];
			}	

			$sql_036  = "insert into div_036 ( ";
			$sql_036 .= "  savekey, ";

			for($x = 2; $x < count($column_036)-1; $x++) {
			  $sql_036 .= "$column_036[$x]".",";
			}
			$sql_036 .= "  e_datetime ";
			$sql_036 .= "  ) values ( ";
			$sql_036 .= "  '".$aaa."', ";
			foreach ($c_036 as  $k => $v) { 
					$sql_036 .= "  '".$v."', ";
			} 
			$sql_036 .= " now() ";
			$sql_036 .= "  );";

			mysql_query( $sql_036 );
			$i_036--; 
		 }

	}


	$rep_037 = (1)*$common_personal2[53];
	$str_037=124;
    $str_037_len= $rep_037*$str_037;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_037*$str_037);
    $i_037 = $rep_037;

	if($str_037_len > 0){
	@mysql_query( "delete from div_037 where savekey = '".$aaa."'" );
		 while($i_037 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_037);		   
		   $c_037=div_037($sss);       
		   //print_r($c_037);
           $start_spot = $start_spot + $str_037;

		    $column_037 = array();
			$r = mysql_query( "DESC div_037" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_037[] = $d[0];
			}	

			$sql_037  = "insert into div_037 ( ";
			$sql_037 .= "  savekey, ";

			for($x = 2; $x < count($column_037)-1; $x++) {
			  $sql_037 .= "$column_037[$x]".",";
			}
			$sql_037 .= "  e_datetime ";
			$sql_037 .= "  ) values ( ";
			$sql_037 .= "  '".$aaa."', ";
			foreach ($c_037 as  $k => $v) { 
					$sql_037 .= "  '".$v."', ";
			} 
			$sql_037 .= " now() ";
			$sql_037 .= "  );";

			mysql_query( $sql_037 );
			$i_037--; 
		 }

	}

	$rep_038 = (1)*$common_personal2[56];
	$str_038=61;
    $str_038_len= $rep_038*$str_038;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_038*$str_038);
    $i_038 = $rep_038;

	if($str_038_len > 0){
	@mysql_query( "delete from div_038 where savekey = '".$aaa."'" );
		 while($i_038 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_038);		   
		   $c_038=div_038($sss);       
		   //print_r($c_038);
           $start_spot = $start_spot + $str_038;

		    $column_038 = array();
			$r = mysql_query( "DESC div_038" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_038[] = $d[0];
			}	

			$sql_038  = "insert into div_038 ( ";
			$sql_038 .= "  savekey, ";

			for($x = 2; $x < count($column_038)-1; $x++) {
			  $sql_038 .= "$column_038[$x]".",";
			}
			$sql_038 .= "  e_datetime ";
			$sql_038 .= "  ) values ( ";
			$sql_038 .= "  '".$aaa."', ";
			foreach ($c_038 as  $k => $v) { 
					$sql_038 .= "  '".$v."', ";
			} 
			$sql_038 .= " now() ";
			$sql_038 .= "  );";

			mysql_query( $sql_038 );
			$i_038--; 
		 }

	}

	$rep_039 = (1)*$common_personal2[59];
	$str_039=73;
    $str_039_len= $rep_039*$str_039;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_039*$str_039);
    $i_039 = $rep_039;

	if($str_039_len > 0){
	@mysql_query( "delete from div_039 where savekey = '".$aaa."'" );
		 while($i_039 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_039);		   
		   $c_039=div_039($sss);       
		   //print_r($c_039);
           $start_spot = $start_spot + $str_039;

		    $column_039 = array();
			$r = mysql_query( "DESC div_039" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_039[] = $d[0];
			}	

			$sql_039  = "insert into div_039 ( ";
			$sql_039 .= "  savekey, ";
        
			for($x = 2; $x < count($column_039)-1; $x++) {
			  $sql_039 .= "$column_039[$x]".",";
			}
			$sql_039 .= "  e_datetime ";
			$sql_039 .= "  ) values ( ";
			$sql_039 .= "  '".$aaa."', ";
			foreach ($c_039 as  $k => $v) { 
					$sql_039 .= "  '".$v."', ";
			} 
			$sql_039 .= " now() ";
			$sql_039 .= "  );";

			mysql_query( $sql_039 );
			$i_039--; 
		 }

	}
/*
	$rep_103 = (1)*$common_personal2[62];
	$str_103=21;
    $str_103_len= $rep_103*$str_103;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_103*$str_103);
    $i_103 = $rep_103;

	if($str_103_len > 0){
	@mysql_query( "delete from div_103 where savekey = '".$aaa."'" );
		 while($i_103 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_103);		   
		   $c_103=div_103($sss);       
		   print_r($c_103);
           $start_spot = $start_spot + $str_103;

		    $column_103 = array();
			$r = mysql_query( "DESC div_103" );
			while ( $d = mysql_fetch_array( $r ) ) {
				$column_103[] = $d[0];
			}	

			$sql_103  = "insert into div_103 ( ";
			$sql_103 .= "  savekey, ";

			for($x = 2; $x < count($column_103)-1; $x++) {
			  $sql_103 .= "$column_103[$x]".",";
			}
			$sql_103 .= "  e_datetime ";
			$sql_103 .= "  ) values ( ";
			$sql_103 .= "  '".$aaa."', ";
			foreach ($c_103 as  $k => $v) { 
					$sql_103 .= "  '".$v."', ";
			} 
			$sql_103 .= " now() ";
			$sql_103 .= "  );";

			mysql_query( $sql_103 );
			$i_103--; 
		 }

	}
	*/
if($resend != "Y"){
   ?>
<script language="javascript">

location.href = "scd_end.php?savekey=<?=$aaa?>&skn=<?=$s_bps_no?>&file_name=<?=$file_name?>";



</script>
<?
}else{
?>
<html>
	<head>
		<title>PaySave 30CUT</title>
	</head>
<body>
<form name="form2" method="post">

	
	<input type="hidden" name="aaa" value="<?=$aaa?>">	
    <input type="hidden" name="v1" value="<?=$v1?>">
	<input type="hidden" name="file_name" value="<?=$file_name?>">
	<input type="hidden" name="s_bps_no" value="<?=$s_bps_no?>">
	<input type="hidden" name="re_017" value="<?=$re_017?>">
	<input type="hidden" name="re_018" value="<?=$re_018?>">
	<input type="hidden" name="re_019" value="<?=$re_019?>">
	<input type="hidden" name="re_020" value="<?=$re_020?>">
	<input type="hidden" name="re_023" value="<?=$re_023?>">
	<input type="hidden" name="re_024" value="<?=$re_024?>">
	<input type="hidden" name="re_025" value="<?=$re_025?>">
	<input type="hidden" name="re_026" value="<?=$re_026?>">
	<input type="hidden" name="re_027" value="<?=$re_027?>">
	<input type="hidden" name="re_028" value="<?=$re_028?>">
	<input type="hidden" name="re_029" value="<?=$re_029?>">
	<input type="hidden" name="re_031" value="<?=$re_031?>">
	<input type="hidden" name="re_032" value="<?=$re_032?>">
	<input type="hidden" name="re_033" value="<?=$re_033?>">
	<input type="hidden" name="re_035" value="<?=$re_035?>">
	<input type="hidden" name="re_036" value="<?=$re_036?>">
	<input type="hidden" name="re_037" value="<?=$re_037?>">
	<input type="hidden" name="re_038" value="<?=$re_038?>">
	<input type="hidden" name="re_039" value="<?=$re_039?>">
	<input type="hidden" name="re_103" value="<?=$re_103?>">

</form>
	</body>
</html>
<script language="javascript">

document.form2.action = "scd_step3.php";

document.form2.submit();
</script>


<?


}

/*

    //print_r($block2);
	function div_block2($string)
	{
		$string=substr($string,4);					      //앞자리 10개 제외 시킨다
		$result[0]=substr($string, 0, 130);			  //공통부
		$result[1]=substr($string, 130, 189);		  //응답정보부
		$result[2]=substr($string, 319);		  //응답정보부
		return $result;
	}

	//공통부 세분화
	function div_common2($string)
	{
		$result[1] =substr($string,0,9);//     Transaction Code      AN      9      9      O
		$result[2] =substr($string,9,8);//     이용자번호      AN      8      17      O
		$result[3] =substr($string,17,4);//     전문종별코드      AN      4      21      O
		$result[4] =substr($string,21,3);//     업무구분코드      AN      3      24      O
		$result[5] =substr($string,24,1);//     송수신 Flag      A      1      25      O
		$result[6] =substr($string,25,4);//     응답코드      AN      4      29      O
		$result[7] =substr($string,29,7);//     KCB 전문 관리번호      N      7      36      O
		$result[8] =substr($string,36,14);//     KCB 전문 전송시간      N      14      50      O
		$result[9] =substr($string,50,7);//     회원사 전문 관리번호      N      7      57      
		$result[10]=substr($string,57,14);//       회원사 전문전송 시간      N      14      71      
		$result[11]=substr($string,71,16);//       KCB System 정보      AN      16      87      O
		$result[12]=substr($string,87,43);//       FILLER      AN      43      130      O

		return $result;
	}
    

	//개별응답부 세분화
	function div_personal2($string)
	{
		$result[1]=substr($string,0,12);//1          001        인증번호          AN          12          12          
		$result[2]=substr($string,12,1);//2          002        정보연속여부          AN          1          13          
		$result[3]=substr($string,13,2);//3          003        재요청횟수          N          2          15          
		$result[4]=substr($string,15,13);//4          012        대체키          N          13          28          
		$result[5]=substr($string,28,3);//5**          017		신상정보 총건수          N          3          31          
		$result[6]=substr($string,31,3);//6          017		신상정보 총송신건수          N          3          34          
		$result[7]=substr($string,34,2);//7          017		신상정보 응답건수          N          2          36          
		$result[8]=substr($string,36,3);//8**           018		신용평점 총건수          N          3          39          
		$result[9]=substr($string,39,3);//9          018		신용평점 총송신건수          N          3          42          
		$result[10]=substr($string,42,2);//10         018		신용평점 응답건수          N          2          44          
		$result[11]=substr($string,44,3);//11**          019		신용평점 연간 이력 총건수          N          3          47          
		$result[12]=substr($string,47,3);//12         019		신용평점 연간 이력 총송신건수          N          3          50          
		$result[13]=substr($string,50,2);//13         019		신용평점 연간 이력 응답건수          N          2          52          
		$result[14]=substr($string,52,3);//14**          020		신용평점 영향 요소 총건수          N          3          55          
		$result[15]=substr($string,55,3);//15         020		신용평점 영향 요소 총송신건수          N          3          58          
		$result[16]=substr($string,58,2);//16         020		신용평점 영향 요소 응답건수          N          2          60          
		$result[17]=substr($string,60,3);//17**          023		대출개설정보(KFB) 총건수          N          3          63          
		$result[18]=substr($string,63,3);//18         023		대출개설정보(KFB) 총송신건수          N          3          66          
		$result[19]=substr($string,66,2);//19         023		대출개설정보(KFB) 응답건수          N          2          68          
		$result[20]=substr($string,68,3);//20**          024		대출개설정보(KCB) 총건수          N          3          71          
		$result[21]=substr($string,71,3);//21         024		대출개설정보(KCB) 총송신건수          N          3          74          
		$result[22]=substr($string,74,2);//22         024		대출개설정보(KCB) 응답건수          N          2          76          
		$result[23]=substr($string,76,3);//23**          025		연간대출 실적 요약(KCB) 총건수          N          3          79          
		$result[24]=substr($string,79,3);//24         025		연간대출 실적 요약(KCB) 총송신건수          N          3          82          
		$result[25]=substr($string,82,2);//25         025		연간대출 실적 요약(KCB) 응답건수          N          2          84          
		$result[26]=substr($string,84,3);//26**          026		현금서비스정보(KFB) 총건수          N          3          87          
		$result[27]=substr($string,87,3);//27         026		현금서비스정보(KFB) 총송신건수          N          3          90          
		$result[28]=substr($string,90,2);//28         026		현금서비스정보(KFB) 응답건수          N          2          92          
		$result[29]=substr($string,92,3);//29** 	     027		카드개설정보(KFB) 총건수	N	3	95	
		$result[30]=substr($string,95,3);//30	     027		카드개설정보(KFB) 총송신건수	N	3	98	
		$result[31]=substr($string,98,2);//31	     027		카드개설정보(KFB) 응답건수	N	2	100	
		$result[32]=substr($string,100,3);//32** 	     028		카드실적/연체이력정보(KCB) 총건수	N	3	103	
		$result[33]=substr($string,103,3);//33	     028		카드실적/연체이력정보(KCB) 총송신건수	N	3	106	
		$result[34]=substr($string,106,2);//34	     028		카드실적/연체이력정보(KCB) 응답건수	N	2	108	
		$result[35]=substr($string,108,3);//35** 	     029		연체정보(KCB) 총건수	N	3	111	
		$result[36]=substr($string,111,3);//36	     029		연체정보(KCB) 총송신건수	N	3	114	
		$result[37]=substr($string,114,2);//37	     029		연체정보(KCB) 응답건수	N	2	116	
		$result[38]=substr($string,116,3);//38** 	     031		대지급정보 총건수	N	3	119	
		$result[39]=substr($string,119,3);//39	     031		대지급정보 총송신건수	N	3	122	
		$result[40]=substr($string,122,2);//40	     031		대지급정보 응답건수	N	2	124	
		$result[41]=substr($string,124,3);//41** 	     032		채무불이행정보(KFB) 총건수	N	3	127	
		$result[42]=substr($string,127,3);//42	     032		채무불이행정보(KFB) 총송신건수	N	3	130	
		$result[43]=substr($string,130,2);//43	     032		채무불이행정보(KFB) 응답건수	N	2	132	
		$result[44]=substr($string,132,3);//44** 	     033		채무불이행정보(신용정보사) 총건수	N	3	135	
		$result[45]=substr($string,135,3);//45	     033		채무불이행정보(신용정보사) 총송신건수	N	3	138	
		$result[46]=substr($string,138,2);//46	     033		채무불이행정보(신용정보사) 응답건수	N	2	140	
		$result[47]=substr($string,140,3);//47** 	     035		공공정보 및 금융질서문란 정보 총건수	N	3	143	
		$result[48]=substr($string,143,3);//48	     035		공공정보 및 금융질서문란 정보 총송신건수	N	3	146	
		$result[49]=substr($string,146,2);//49	     035		공공정보 및 금융질서문란 정보 응답건수	N	2	148	
		$result[50]=substr($string,148,3);//50** 	     036		연대보증정보(KFB) 총건수	N	3	151	
		$result[51]=substr($string,151,3);//51	     036		연대보증정보(KFB) 총송신건수	N	3	154	
		$result[52]=substr($string,154,2);//52	     036		연대보증정보(KFB) 응답건수	N	2	156	
		$result[53]=substr($string,156,3);//53** 	     037		지급보증정보(KCB) 총건수	N	3	159	
		$result[54]=substr($string,159,3);//54	     037		지급보증정보(KCB) 총송신건수	N	3	162	
		$result[55]=substr($string,162,2);//55	     037		지급보증정보(KCB) 응답건수	N	2	164	
		$result[56]=substr($string,164,3);//56** 	     038		연대보증 상세 내역(KCB) 총건수	N	3	167	
		$result[57]=substr($string,167,3);//57	     038		연대보증 상세 내역(KCB) 총송신건수	N	3	170	
		$result[58]=substr($string,170,2);//58	     038		연대보증 상세 내역(KCB) 응답건수	N	2	172	
		$result[59]=substr($string,172,3);//59** 	     039		신용회복위원회정보(KFB) 총건수	N	3	175	
		$result[60]=substr($string,175,3);//60	     039		신용회복위원회정보(KFB) 총송신건수	N	3	178	
		$result[61]=substr($string,178,2);//61	     039		신용회복위원회정보(KFB) 응답건수	N	2	180	
		$result[62]=substr($string,180,3);//62** 	     103		CPS 총건수	N	3	183	
		$result[63]=substr($string,183,3);//63	     103		CPS 총송신건수	N	3	186	
		$result[64]=substr($string,186,3);//64	     103		CPS 응답건수	N	3	189	

	  
		return $result;
	}

	function div_017($string){
          
       $result[1] =substr($string,0,3);//1     Segment ID      AN      3      3
	   $result[2] =substr($string,3,1);//2     정보구분코드      AN      1      4
	   $result[3] =substr($string,4,8);//3     등록일자      AN      8      12
	   $result[4] =substr($string,12,100);//4     우편번호주소      AN      100      112
	   $result[5] =substr($string,112,100);//5     상세주소      AN      100      212
	   $result[6] =substr($string,212,12);//6     전화번호      AN      12      224
       $result[7] =substr($string,224,9);//7     연소득      N      9      233
	   $result[8] =substr($string,233,12);//8     휴대폰번호      AN      12      245

	   return $result;

	}

	function div_018($string){
          
       $result[1] =substr($string,0,3);//1     Segment ID      AN      3      3
	   $result[2] =substr($string,3,4);//2     평점      AN      4      7
	   $result[3] =substr($string,7,2);//3     등급      AN      2      9

	   return $result;

	}

	function div_019($string){
          
        $result[1] =substr($string,0,3);//1     Segment ID      AN      3      3
		$result[2] =substr($string,3,4);//2		1개월전신용평점	AN	4	7	
		$result[3] =substr($string,7,4);//3		2개월전신용평점	AN	4	11	
		$result[4] =substr($string,11,4);//4		3개월전신용평점	AN	4	15	
		$result[5] =substr($string,15,4);//5		4개월전신용평점	AN	4	19	
		$result[6] =substr($string,19,4);//6		5개월전신용평점	AN	4	23	
		$result[7] =substr($string,23,4);//7		6개월전신용평점	AN	4	27	
		$result[8] =substr($string,27,4);//8		7개월전신용평점	AN	4	31	
		$result[9] =substr($string,31,4);//9		8개월전신용평점	AN	4	35	
		$result[10] =substr($string,35,4);//10	9개월전신용평점	AN	4	39	
		$result[11] =substr($string,39,4);//11	10개월전신용평점	AN	4	43	
		$result[12] =substr($string,43,4);//12	11개월전신용평점	AN	4	47	
		$result[13] =substr($string,47,4);//13	12개월전신용평점	AN	4	51	
		$result[14] =substr($string,51,2);//14	1개월전신용등급	AN	2	53	
		$result[15] =substr($string,53,2);//15	2개월전신용등급	AN	2	55	
		$result[16] =substr($string,55,2);//16	3개월전신용등급	AN	2	57	
		$result[17] =substr($string,57,2);//17	4개월전신용등급	AN	2	59	
		$result[18] =substr($string,59,2);//18	5개월전신용등급	AN	2	61	
		$result[19] =substr($string,61,2);//19	6개월전신용등급	AN	2	63	
		$result[20] =substr($string,63,2);//20	7개월전신용등급	AN	2	65	
		$result[21] =substr($string,65,2);//21	8개월전신용등급	AN	2	67	
		$result[22] =substr($string,67,2);//22	9개월전신용등급	AN	2	69	
		$result[23] =substr($string,69,2);//23	10개월전신용등급	AN	2	71	
		$result[24] =substr($string,71,2);//24	11개월전신용등급	AN	2	73	
		$result[25] =substr($string,73,2);//25	12개월전신용등급	AN	2	75	

	   return $result;

	}

	function div_020($string){

        $result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =substr($string,3,6);//2          긍정적요인1 코드          AN          6          9          
		$result[3] =substr($string,9,6);//3          긍정적요인2 코드          AN          6          15          
		$result[4] =substr($string,15,6);//4          긍정적요인3 코드          AN          6          21          
		$result[5] =substr($string,21,6);//5          부정적 요인1 코드          AN          6          27          
		$result[6] =substr($string,27,6);//6          부정적 요인2 코드          AN          6          33          
		$result[7] =substr($string,33,6);//7          부정적 요인3 코드          AN          6          39          

        return $result;       
      
	}


	function div_023($string){

		$result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =substr($string,3,100);//2          기관명          AN          100          103          
		$result[3] =substr($string,103,2);//3          등록사유코드          AN          2          105          
		$result[4] =substr($string,105,8);//4          대출일자          AN          8          113          
		$result[5] =substr($string,113,8);//5          변동일자          AN          8          121          
		$result[6] =substr($string,121,9);//6          금액          N          9          130          
		$result[7] =substr($string,130,3);//7          KFB대출구분코드          AN          3          133          

        return $result;       

	}


	function div_024($string){

		$result[1] =substr($string,3,3);//1          Segment ID          AN          3          3          
		$result[2] =substr($string,3,30);//2          기관명          AN          30          33          
		$result[3] =substr($string,33,1);//3          대출형태코드          AN          1          34          
		$result[4] =substr($string,34,8);//4          대출일자          AN          8          42          
		$result[5] =substr($string,42,8);//5          만기일자          AN          8          50          
		$result[6] =substr($string,50,9);//6          약정금액          N          9          59          
		$result[7] =substr($string,59,9);//7          대출금액          N          9          68          
		$result[8] =substr($string,68,1);//8          신용여부          AN          1          69          
		$result[9] =substr($string,69,1);//9          담보여부          AN          1          70          
		$result[10] =substr($string,70,1);//10          보증인여부          AN          1          71          
		$result[11] =substr($string,71,1);//11          집단대출대납구분코드          AN          1          72          
		$result[12] =substr($string,72,1);//12          연체대환대출여부          AN          1          73          
		$result[13] =substr($string,73,1);//13          신용회복지원여부          AN          1          74          

        return $result;       

	}


	function div_025($string){


		$result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =substr($string,3,3);//2          1개월전 총대출계좌수          N          3          6          
		$result[3] =substr($string,6,3);//3          2개월전 총대출계좌수          N          3          9          
		$result[4] =substr($string,9,3);//4          3개월전 총대출계좌수          N          3          12          
		$result[5] =substr($string,12,3);//5          4개월전 총대출계좌수          N          3          15          
		$result[6] =substr($string,15,3);//6          5개월전 총대출계좌수          N          3          18          
		$result[7] =substr($string,18,3);//7          6개월전 총대출계좌수          N          3          21          
		$result[8] =substr($string,21,3);//8          7개월전 총대출계좌수          N          3          24          
		$result[9] =substr($string,24,3);//9          8개월전 총대출계좌수          N          3          27          
		$result[10] =substr($string,27,3);//10          9개월전 총대출계좌수          N          3          30          
		$result[11] =substr($string,30,3);//11          10개월전 총대출계좌수          N          3          33          
		$result[12] =substr($string,33,3);//12          11개월전 총대출계좌수          N          3          36          
		$result[13] =substr($string,36,3);//13          12개월전 총대출계좌수          N          3          39          
		$result[14] =substr($string,39,9);//14          1개월전 총약정금액          N          9          48          
		$result[15] =substr($string,48,9);//15          2개월전 총약정금액          N          9          57          
		$result[16] =substr($string,57,9);//16          3개월전 총약정금액          N          9          66          
		$result[17] =substr($string,66,9);//17          4개월전 총약정금액          N          9          75          
		$result[18] =substr($string,75,9);//18          5개월전 총약정금액          N          9          84          
		$result[19] =substr($string,84,9);//19          6개월전 총약정금액          N          9          93          
		$result[20] =substr($string,93,9);//20          7개월전 총약정금액          N          9          102          
		$result[21] =substr($string,102,9);//21          8개월전 총약정금액          N          9          111          
		$result[22] =substr($string,111,9);//22          9개월전 총약정금액          N          9          120          
		$result[23] =substr($string,120,9);//23          10개월전 총약정금액          N          9          129          
		$result[24] =substr($string,129,9);//24          11개월전 총약정금액          N          9          138          
		$result[25] =substr($string,138,9);//25          12개월전 총약정금액          N          9          147          
		$result[26] =substr($string,147,9);//26          1개월전 월상환금액          N          9          156          
		$result[27] =substr($string,156,9);//27          2개월전 월상환금액          N          9          165          
		$result[28] =substr($string,165,9);//28          3개월전 월상환금액          N          9          174          
		$result[29] =substr($string,174,9);//29          4개월전 월상환금액          N          9          183          
		$result[30] =substr($string,183,9);//30          5개월전 월상환금액          N          9          192          
		$result[31] =substr($string,192,9);//31          6개월전 월상환금액          N          9          201          
		$result[32] =substr($string,201,9);//32          7개월전 월상환금액          N          9          210          
		$result[33] =substr($string,210,9);//33          8개월전 월상환금액          N          9          219          
		$result[34] =substr($string,219,9);//34          9개월전 월상환금액          N          9          228          
		$result[35] =substr($string,228,9);//35          10개월전 월상환금액          N          9          237          
		$result[36] =substr($string,237,9);//36          11개월전 월상환금액          N          9          246          
		$result[37] =substr($string,246,9);//37          12개월전 월상환금액          N          9          255   
		$result[38] =substr($string,255,9);//38	1개월전 대출잔액	N	9	264	
		$result[39] =substr($string,264,9);//39	2개월전 대출잔액	N	9	273	
		$result[40] =substr($string,273,9);//40	3개월전 대출잔액	N	9	282	
		$result[41] =substr($string,282,9);//41	4개월전 대출잔액	N	9	291	
		$result[42] =substr($string,291,9);//42	5개월전 대출잔액	N	9	300	
		$result[43] =substr($string,300,9);//43	6개월전 대출잔액	N	9	309	
		$result[44] =substr($string,309,9);//44	7개월전 대출잔액	N	9	318	
		$result[45] =substr($string,318,9);//45	8개월전 대출잔액	N	9	327	
		$result[46] =substr($string,327,9);//46	9개월전 대출잔액	N	9	336	
		$result[47] =substr($string,336,9);//47	10개월전 대출잔액	N	9	345	
		$result[48] =substr($string,345,9);//48	11개월전 대출잔액	N	9	354	
		$result[49] =substr($string,354,9);//49	12개월전 대출잔액	N	9	363	
		$result[50] =substr($string,363,9);//50	1개월전 연체금액	N	9	372	
		$result[51] =substr($string,372,9);//51	2개월전 연체금액	N	9	381	
		$result[52] =substr($string,381,9);//52	3개월전 연체금액	N	9	390	
		$result[53] =substr($string,390,9);//53	4개월전 연체금액	N	9	399	
		$result[54] =substr($string,399,9);//54	5개월전 연체금액	N	9	408	
		$result[55] =substr($string,408,9);//55	6개월전 연체금액	N	9	417	
		$result[56] =substr($string,417,9);//56	7개월전 연체금액	N	9	426	
		$result[57] =substr($string,426,9);//57	8개월전 연체금액	N	9	435	
		$result[58] =substr($string,435,9);//58	9개월전 연체금액	N	9	444	
		$result[59] =substr($string,444,9);//59	10개월전 연체금액	N	9	453	
		$result[60] =substr($string,453,9);//60	11개월전 연체금액	N	9	462	
		$result[61] =substr($string,462,9);//61	12개월전 연체금액	N	9	471	
		$result[62] =substr($string,471,4);//62	1개월전 최장연체일수	N	4	475	
		$result[63] =substr($string,475,4);//63	2개월전 최장연체일수	N	4	479	
		$result[64] =substr($string,479,4);//64	3개월전 최장연체일수	N	4	483	
		$result[65] =substr($string,483,4);//65	4개월전 최장연체일수	N	4	487	
		$result[66] =substr($string,487,4);//66	5개월전 최장연체일수	N	4	491	
		$result[67] =substr($string,491,4);//67	6개월전 최장연체일수	N	4	495	
		$result[68] =substr($string,499,4);//68	7개월전 최장연체일수	N	4	499	
		$result[69] =substr($string,503,4);//69	8개월전 최장연체일수	N	4	503	
		$result[70] =substr($string,507,4);//70	9개월전 최장연체일수	N	4	507	
		$result[71] =substr($string,511,4);//71	10개월전 최장연체일수	N	4	511	
		$result[72] =substr($string,515,4);//72	11개월전 최장연체일수	N	4	515	
		$result[73] =substr($string,519,4);//73	12개월전 최장연체일수	N	4	519	
		

        return $result;      

	}
    


    function div_026($string){

        $result[1] =substr($string,0,3);//1	Segment ID	AN	3	3	
		$result[2] =substr($string,3,30);//2	기관명	AN	30	33	
		$result[3] =substr($string,33,8);//3	발생일	AN	8	41	
		$result[4] =substr($string,41,8);//4	변동일	AN	8	49	
		$result[5] =substr($string,49,9);//5	금액	N	9	58	


        return $result;      

	}


	function div_027($string){

        $result[1] =substr($string,0,3);//1	Segment ID	AN	3	3	
		$result[2] =substr($string,3,30);//2	기관명	AN	30	33	
		$result[3] =substr($string,33,40);//3	관리점명	AN	40	73	
		$result[4] =substr($string,73,4);//4	등록사유코드	AN	4	77	
		$result[5] =substr($string,77,8);//5	발생일자	AN	8	85	


        return $result;      

	}
	function div_028($string){

        $result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =substr($string,3,2);//2          1개월전 개설카드수          N          2          5          
		$result[3] =substr($string,5,2);//3          2개월전 개설카드수          N          2          7          
		$result[4] =substr($string,7,2);//4          3개월전 개설카드수          N          2          9          
		$result[5] =substr($string,9,2);//5          4개월전 개설카드수          N          2          11          
		$result[6] =substr($string,11,2);//6          5개월전 개설카드수          N          2          13          
		$result[7] =substr($string,13,2);//7          6개월전 개설카드수          N          2          15          
		$result[8] =substr($string,15,2);//8          7개월전 개설카드수          N          2          17          
		$result[9] =substr($string,17,2);//9          8개월전 개설카드수          N          2          19          
		$result[10] =substr($string,19,2);//10          9개월전 개설카드수          N          2          21          
		$result[11] =substr($string,21,2);//11          10개월전 개설카드수          N          2          23          
		$result[12] =substr($string,23,2);//12          11개월전 개설카드수          N          2          25          
		$result[13] =substr($string,25,2);//13          12개월전 개설카드수          N          2          27          
		$result[14] =substr($string,27,2);//14          1개월전 이용카드수          N          2          29          
		$result[15] =substr($string,29,2);//15          2개월전 이용카드수          N          2          31          
		$result[16] =substr($string,31,2);//16          3개월전 이용카드수          N          2          33          
		$result[17] =substr($string,33,2);//17          4개월전 이용카드수          N          2          35          
		$result[18] =substr($string,35,2);//18          5개월전 이용카드수          N          2          37          
		$result[19] =substr($string,37,2);//19          6개월전 이용카드수          N          2          39          
		$result[20] =substr($string,39,2);//20          7개월전 이용카드수          N          2          41          
		$result[21] =substr($string,41,2);//21          8개월전 이용카드수          N          2          43          
		$result[22] =substr($string,43,2);//22          9개월전 이용카드수          N          2          45          
		$result[23] =substr($string,45,2);//23          10개월전 이용카드수          N          2          47          
		$result[24] =substr($string,47,2);//24          11개월전 이용카드수          N          2          49          
		$result[25] =substr($string,49,2);//25          12개월전 이용카드수          N          2          51          
		$result[26] =substr($string,51,2);//26          1개월전 현금서비스 이용카드수          N          2          53          
		$result[27] =substr($string,53,2);//27          2개월전 현금서비스 이용카드수          N          2          55          
		$result[28] =substr($string,55,2);//28          3개월전 현금서비스 이용카드수          N          2          57          
		$result[29] =substr($string,57,2);//29          4개월전 현금서비스 이용카드수          N          2          59          
		$result[30] =substr($string,59,2);//30          5개월전 현금서비스 이용카드수          N          2          61          
		$result[31] =substr($string,61,2);//31          6개월전 현금서비스 이용카드수          N          2          63          
		$result[32] =substr($string,63,2);//32          7개월전 현금서비스 이용카드수          N          2          65          
		$result[33] =substr($string,65,2);//33          8개월전 현금서비스 이용카드수          N          2          67          
		$result[34] =substr($string,67,2);//34          9개월전 현금서비스 이용카드수          N          2          69          
		$result[35] =substr($string,69,2);//35          10개월전 현금서비스 이용카드수          N          2          71          
		$result[36] =substr($string,71,2);//36          11개월전 현금서비스 이용카드수          N          2          73          
		$result[37] =substr($string,73,2);//37          12개월전 현금서비스 이용카드수          N          2          75          
		$result[38] =substr($string,75,9);//38          1개월전 총한도 합계금액          N          9          84          
		$result[39] =substr($string,84,9);//39          2개월전 총한도 합계금액          N          9          93          
		$result[40] =substr($string,93,9);//40          3개월전 총한도 합계금액          N          9          102          
		$result[41] =substr($string,102,9);//41          4개월전 총한도 합계금액          N          9          111          
		$result[42] =substr($string,111,9);//42          5개월전 총한도 합계금액          N          9          120          
		$result[43] =substr($string,120,9);//43          6개월전 총한도 합계금액          N          9          129          
		$result[44] =substr($string,129,9);//44          7개월전 총한도 합계금액          N          9          138          
		$result[45] =substr($string,138,9);//45          8개월전 총한도 합계금액          N          9          147          
		$result[46] =substr($string,147,9);//46          9개월전 총한도 합계금액          N          9          156          
		$result[47] =substr($string,156,9);//47          10개월전 총한도 합계금액          N          9          165          
		$result[48] =substr($string,165,9);//48          11개월전 총한도 합계금액          N          9          174          
		$result[49] =substr($string,174,9);//49          12개월전 총한도 합계금액          N          9          183          
		$result[50] =substr($string,183,9);//50          1개월전 현금서비스 한도합계금액          N          9          192          
		$result[51] =substr($string,192,9);//51          2개월전 현금서비스 한도합계금액          N          9          201          
		$result[52] =substr($string,201,9);//52          3개월전 현금서비스 한도합계금액          N          9          210          
		$result[53] =substr($string,210,9);//53          4개월전 현금서비스 한도합계금액          N          9          219          
		$result[54] =substr($string,219,9);//54          5개월전 현금서비스 한도합계금액          N          9          228          
		$result[55] =substr($string,228,9);//55          6개월전 현금서비스 한도합계금액          N          9          237          
		$result[56] =substr($string,237,9);//56          7개월전 현금서비스 한도합계금액          N          9          246          
		$result[57] =substr($string,246,9);//57          8개월전 현금서비스 한도합계금액          N          9          255          
		$result[58] =substr($string,255,9);//58          9개월전 현금서비스 한도합계금액          N          9          264          
		$result[59] =substr($string,264,9);//59          10개월전 현금서비스 한도합계금액          N          9          273          
		$result[60] =substr($string,273,9);//60          11개월전 현금서비스 한도합계금액          N          9          282          
		$result[61] =substr($string,282,9);//61          12개월전 현금서비스 한도합계금액          N          9          291          
		$result[62] =substr($string,291,9);//62          1개월전 총이용금액          N          9          300          
		$result[63] =substr($string,300,9);//63          2개월전 총이용금액          N          9          309          
		$result[64] =substr($string,309,9);//64          3개월전 총이용금액          N          9          318          
		$result[65] =substr($string,318,9);//65          4개월전 총이용금액          N          9          327          
		$result[66] =substr($string,327,9);//66          5개월전 총이용금액          N          9          336          
		$result[67] =substr($string,336,9);//67          6개월전 총이용금액          N          9          345          
		$result[68] =substr($string,345,9);//68          7개월전 총이용금액          N          9          354          
		$result[69] =substr($string,354,9);//69          8개월전 총이용금액          N          9          363          
		$result[70] =substr($string,363,9);//70          9개월전 총이용금액          N          9          372          
		$result[71] =substr($string,372,9);//71          10개월전 총이용금액          N          9          381          
		$result[72] =substr($string,381,9);//72          11개월전 총이용금액          N          9          390          
		$result[73] =substr($string,390,9);//73          12개월전 총이용금액          N          9          399          
		$result[74] =substr($string,399,9);//74          1개월전 현금서비스 이용금액          N          9          408          
		$result[75] =substr($string,408,9);//75          2개월전 현금서비스 이용금액          N          9          417          
		$result[76] =substr($string,417,9);//76          3개월전 현금서비스 이용금액          N          9          426          
		$result[77] =substr($string,426,9);//77          4개월전 현금서비스 이용금액          N          9          435          
		$result[78] =substr($string,435,9);//78          5개월전 현금서비스 이용금액          N          9          444          
		$result[79] =substr($string,444,9);//79          6개월전 현금서비스 이용금액          N          9          453          
		$result[80] =substr($string,453,9);//80          7개월전 현금서비스 이용금액          N          9          462          
		$result[81] =substr($string,462,9);//81          8개월전 현금서비스 이용금액          N          9          471          
		$result[82] =substr($string,471,9);//82          9개월전 현금서비스 이용금액          N          9          480          
		$result[83] =substr($string,480,9);//83          10개월전 현금서비스 이용금액          N          9          489          
		$result[84] =substr($string,489,9);//84          11개월전 현금서비스 이용금액          N          9          498          
		$result[85] =substr($string,498,9);//85          12개월전 현금서비스 이용금액          N          9          507          
		$result[86] =substr($string,507,9);//86          1개월전 연체금액          N          9          516          
		$result[87] =substr($string,516,9);//87          2개월전 연체금액          N          9          525          
		$result[88] =substr($string,525,9);//88          3개월전 연체금액          N          9          534          
		$result[89] =substr($string,534,9);//89          4개월전 연체금액          N          9          543          
		$result[90] =substr($string,543,9);//90          5개월전 연체금액          N          9          552          
		$result[91] =substr($string,552,9);//91          6개월전 연체금액          N          9          561          
		$result[92] =substr($string,561,9);//92          7개월전 연체금액          N          9          570          
		$result[93] =substr($string,570,9);//93          8개월전 연체금액          N          9          579          
		$result[94] =substr($string,579,9);//94          9개월전 연체금액          N          9          588          
		$result[95] =substr($string,588,9);//95          10개월전 연체금액          N          9          597          
		$result[96] =substr($string,597,9);//96          11개월전 연체금액          N          9          606          
		$result[97] =substr($string,606,9);//97          12개월전 연체금액          N          9          615          
		$result[98] =substr($string,615,4);//98          1개월전 최장연체일수          N          4          619          
		$result[99] =substr($string,619,4);//99          2개월전 최장연체일수          N          4          623          
		$result[100] =substr($string,623,4);//100          3개월전 최장연체일수          N          4          627          
		$result[101] =substr($string,627,4);//101          4개월전 최장연체일수          N          4          631          
		$result[102] =substr($string,631,4);//102          5개월전 최장연체일수          N          4          635          
		$result[103] =substr($string,635,4);//103          6개월전 최장연체일수          N          4          639          
		$result[104] =substr($string,639,4);//104          7개월전 최장연체일수          N          4          643          
		$result[105] =substr($string,643,4);//105          8개월전 최장연체일수          N          4          647          
		$result[106] =substr($string,647,4);//106          9개월전 최장연체일수          N          4          651          
		$result[107] =substr($string,651,4);//107          10개월전 최장연체일수          N          4          655          
		$result[108] =substr($string,655,4);//108          11개월전 최장연체일수          N          4          659          
		$result[109] =substr($string,659,4);//109          12개월전 최장연체일수          N          4          663          



        return $result;      

	}


    function div_029($string){

        $result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =substr($string,3,30);//2          기관명          AN          30          33          
		$result[3] =substr($string,33,40);//3          관리점명          AN          40          73          
		$result[4] =substr($string,73,1);//4          거래형태코드          AN          1          74          
		$result[5] =substr($string,74,8);//5          최초연체기산일자          AN          8          82          
		$result[6] =substr($string,82,9);//6          최초연체금액          N          9          91          
		$result[7] =substr($string,91,8);//7          연체기산일자          AN          8          99          
		$result[8] =substr($string,99,9);//8          연체금액          N          9          108          
		$result[9] =substr($string,108,8);//9          연체상환일자          AN          8          116          
		$result[10] =substr($string,116,9);//10          상환금액          N          9          125          



        return $result;      

	}


	function div_031($string){

        


        return $result;      

	}

	function div_032($string){

        $result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =substr($string,3,30);//2          기관명          AN          30          33          
		$result[3] =substr($string,33,40);//3          관리점명          AN          40          73          
		$result[4] =substr($string,73,8);//4          발생일자          AN          8          81          
		$result[5] =substr($string,81,9);//5          등록금액          N          9          90          
		$result[6] =substr($string,90,9);//6          연체금액          N          9          99          
		$result[7] =substr($string,99,8);//7          해제일자          AN          8          107          
		$result[8] =substr($string,107,2);//8          해제구분 코드          AN          2          109          
		$result[9] =substr($string,109,4);//9          등록사유 코드          AN          4          113          

        return $result;      

	}
	function div_033($string){

        $result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =substr($string,3,30);//2          기관명          AN          30          33          
		$result[3] =substr($string,33,8);//3          발생일자          AN          8          41          
		$result[4] =substr($string,41,9);//4          등록금액          N          9          50          
		$result[5] =substr($string,50,9);//5          연체금액          N          9          59          
		$result[6] =substr($string,59,8);//6          상환일자          AN          8          67          
		$result[7] =substr($string,67,9);//7          상환금액          N          9          76          
		$result[8] =substr($string,76,4);//8          등록사유 코드          AN          4          80          



        return $result;      

	}

	function div_035($string){

        $result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =substr($string,3,2);//2          자료구분코드          AN          2          5          
		$result[3] =substr($string,5,30);//3          기관명          AN          30          35          
		$result[4] =substr($string,35,40);//4          관리점명          AN          40          75          
		$result[5] =substr($string,75,8);//5          발생일자          AN          8          83          
		$result[6] =substr($string,83,9);//6          등록금액          N          9          92          
		$result[7] =substr($string,92,9);//7          연체금액          N          9          101          
		$result[8] =substr($string,101,8);//8          해제일자          AN          8          109          
		$result[9] =substr($string,109,2);//9          해제구분코드          AN          2          111          
		$result[10] =substr($string,111,4);//10          등록사유코드          AN          4          115    


        return $result;      

	}

	function div_036($string){

        $result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =substr($string,3,30);//2          기관명          AN          30          33          
		$result[3] =substr($string,33,8);//3          발생일자          AN          8          41          
		$result[4] =substr($string,41,8);//4          변동일자          AN          8          49          
		$result[5] =substr($string,49,9);//5          금액          N          9          58          



        return $result;      

	}

	function div_037($string){

        $result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =substr($string,3,30);//2          기관명          AN          30          33          
		$result[3] =substr($string,33,50);//3          보증상대처          AN          50          83          
		$result[4] =substr($string,83,1);//4          보증종류코드          AN          1          84          
		$result[5] =substr($string,84,8);//5          보증개시일자          AN          8          92          
		$result[6] =substr($string,92,9);//6          보증한도금액          N          9          101          
		$result[7] =substr($string,101,9);//7          보증대상금액          N          9          110          
		$result[8] =substr($string,110,8);//8          해지일자          AN          8          118          
		$result[9] =substr($string,118,2);//9          해지사유코드          AN          2          120          
		$result[10] =substr($string,120,1);//10          신용여부          AN          1          121          
		$result[11] =substr($string,121,1);//11          담보여부          AN          1          122          
		$result[12] =substr($string,122,1);//12          보증인여부          AN          1          123          
		$result[13] =substr($string,123,1);//13          대지급청구여부          AN          1          124          



        return $result;      

	}


	function div_038($string){

        $result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =substr($string,3,30);//2          기관명          AN          30          33          
		$result[3] =substr($string,33,2);//3          보증종류 코드          AN          2          35          
		$result[4] =substr($string,35,8);//4          보증약정일자          AN          8          43          
		$result[5] =substr($string,43,9);//5          보증한도금액          N          9          52          
		$result[6] =substr($string,52,9);//6          보증대상금액          N          9          61          

        return $result;      

	}


	function div_039($string){

        $result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =substr($string,3,5);//2          직업코드          AN          5          8          
		$result[3] =substr($string,8,30);//3          직업명          AN          30          38          
		$result[4] =substr($string,38,8);//4          신청일자          AN          8          46          
		$result[5] =substr($string,46,9);//5          회복지원통보일자          AN          9          55          
		$result[6] =substr($string,55,9);//6          조정후최종채무액          N          9          64          
		$result[7] =substr($string,64,9);//7          변제후잔존채무액          N          9          73          

        return $result;      

	}

	function div_103($string){

        $result[1] =substr($string,0,3);//1          Segment ID('103')           AN                   3          3          
		$result[2] =substr($string,3,9);//2          CPS코드          AN          9          12          
		$result[3] =substr($string,12,9);//3          CPS결과값           AN                   9          21     


        return $result;      

	}
*/

?>

