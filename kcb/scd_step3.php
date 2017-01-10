<?
set_time_limit(0);

include "config.php";
include_once "../comm/db_info.php";

$LogName = date("Ymd") . "_361_req.log";
$file_name = $_POST[file_name].".log";;
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

$o = array( 'ap_sex'=>$s_send8);
//echo json_encode($o);

//$conn

/*
$birthday="19851019";
$sex="2";
$handphoone="010 29775700";
$_REQUEST['ap_name']="노현주";


$birthday="19810811";
$sex="2";
$handphoone="010 46208225";
$_REQUEST['ap_name']="정예서";

$birthday="19851019";
$sex="2";
$handphoone="01029775700";
$_REQUEST['ap_name']="노현주";

$ap_name = $_REQUEST['ap_name'];

$rs_st=mysql_query("select s_key,s_bps_no from scd_360 order by s_datetime desc limit 1",$conn);
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
echo $msg;

if ($msg)	WriteLog($LOG_DIR.$LogName_rev,$msg,"R");
*/


$st_sw = trim($st_sw);
$today = date("Y-m-d");
	// 공통부, 개별응답부, 응답정보부 나누기
	//$block=div_block($msg);

	//공통부 세분화
	//$common_block=div_common($block[0]);
	//print_r($common_block);
    //개별응답부 세분화
	//$personal_block=div_personal($block[1]);
    //print_r($personal_block);
    
    $times_1 = mktime();
	$s_send_1 = date("Ymdhis", $times_1);
	$s_send8_1 = date("Ymd", $times_1);
    $aaa = $_POST[aaa];
	$s_bps_no = $_POST[s_bps_no];
	$v1 = str_pad($_POST[v1], 12, " ",STR_PAD_RIGHT);
	$msg21 = $_POST[msg2];
	$s_bps_no = str_pad($_POST[s_bps_no], 7, " ", STR_PAD_RIGHT);
	$re_017 = $_POST[re_017];
	$re_018 = $_POST[re_018];
	$re_019 = $_POST[re_019];
	$re_020 = $_POST[re_020];
	$re_023 = $_POST[re_023];
	$re_024 = $_POST[re_024];
	$re_025 = $_POST[re_025];
	$re_026 = $_POST[re_026];
	$re_027 = $_POST[re_027];
	$re_028 = $_POST[re_028];
	$re_029 = $_POST[re_029];
	$re_031 = $_POST[re_031];
	$re_032 = $_POST[re_032];
	$re_033 = $_POST[re_033];
	$re_035 = $_POST[re_035];
	$re_036 = $_POST[re_036];
	$re_037 = $_POST[re_037];
	$re_038 = $_POST[re_038];
	$re_039 = $_POST[re_039];
	$re_103 = $_POST[re_103];


	


	if($_POST[retry_num]){
		
		$retry_num = $_POST[retry_num];
		$retry_num_next = $retry_num+1;

	}else{

        $retry_num = "1";     
	}



	//$aaa = "7847457377";
	//공통부
	//$param = str_pad("", 4, " ", STR_PAD_RIGHT);// 송수신 전문길이(TCP/IP)      Binary      4      O
	$param_361 = str_pad("SCDEV", 9, " ", STR_PAD_RIGHT);// Transaction Code      AN      9      9      O
	$param_361 .= str_pad("X0004000", 8, " ", STR_PAD_RIGHT);// 이용자번호      AN      8      17      O
	$param_361 .= str_pad("0500", 4, " ", STR_PAD_RIGHT);// 전문종별코드      AN      4      21      O   0500재요청
	$param_361 .= str_pad("371", 3, " ", STR_PAD_RIGHT);// 업무구분코드      AN      3      24      O
	$param_361 .= str_pad("B", 1, " ", STR_PAD_RIGHT);// 송수신 Flag      A      1      25      O
	$param_361 .= str_pad(" ", 4, " ", STR_PAD_RIGHT);// 응답코드      AN      4      29      
	$param_361 .= str_pad("0000000", 7, " ", STR_PAD_RIGHT);// KCB 전문 관리번호      N      7      36      
	$param_361 .= str_pad("00000000000000", 14, " ", STR_PAD_RIGHT);// KCB 전문 전송시간      N      14      50      
	$param_361 .= str_pad("$s_bps_no", 7, " ", STR_PAD_RIGHT);// 회원사 전문 관리번호      N      7      57      O
	$param_361 .= str_pad("$s_send_1", 14, " ", STR_PAD_RIGHT);// 회원사 전문전송 시간      N      14      71      O
	$param_361 .= str_pad(" ", 16, " ", STR_PAD_RIGHT);// KCB System 정보      AN      16      87      
	$param_361 .= str_pad(" ", 43, " ", STR_PAD_RIGHT);// FILLER      AN      43      130      O

	$param_361  .= str_pad("$v1", 12, " ",STR_PAD_RIGHT);//1          001          인증번호          AN          12          12          
	$param_361  .= str_pad("$retry_num", 2, "0",STR_PAD_LEFT);//2          003          재요청횟수          N          2          14          
	$param_361  .= str_pad("77", 2, " ",STR_PAD_RIGHT);//3          006          조회목적코드          AN          2          16          
	$param_361  .= str_pad("BEYOND", 20, " ",STR_PAD_RIGHT);//4          009          조회지점명          AN          20          36          
	$param_361  .= str_pad("beyond1005", 15, " ",STR_PAD_RIGHT);//5          010          담당자ID          AN          15          51          
	$param_361  .= str_pad("$aaa", 13, " ",STR_PAD_RIGHT);//6          012          대체키          N          13          64          
	
	$param_361  .= str_pad("$re_017", 3, "0",STR_PAD_LEFT);//7          017          신상정보 총수신건수          N          3          67          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//8          017          신상정보 요청건수          N          2          69          
	$param_361  .= str_pad("$re_018", 3, "0",STR_PAD_LEFT);//9          018          신용평점 총수신건수          N          3          72          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//10         018          신용평점 요청건수          N          2          74          
	$param_361  .= str_pad("$re_019", 3, "0",STR_PAD_LEFT);//11         019          신용평점 연간 이력 총수신건수          N          3          77          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//12         019          신용평점 연간 이력 요청건수          N          2          79          
	$param_361  .= str_pad("$re_020", 3, "0",STR_PAD_LEFT);//13         020          신용평점 영향 요소 총수신건수          N          3          82          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//14         020          신용평점 영향 요소 요청건수          N          2          84          
	$param_361  .= str_pad("$re_023", 3, "0",STR_PAD_LEFT);//15         023          대출개설정보(KFB) 총수신건수          N          3          87          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//16         023          대출개설정보(KFB) 요청건수          N          2          89          
	$param_361  .= str_pad("$re_024", 3, "0",STR_PAD_LEFT);//17         024          대출개설정보(KCB) 총수신건수          N          3          92          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//18         024          대출개설정보(KCB) 요청건수          N          2          94          
	$param_361  .= str_pad("$re_025", 3, "0",STR_PAD_LEFT);//19         025          연간대출 실적 요약(KCB) 총수신건수          N          3          97          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//20         025          연간대출 실적 요약(KCB) 요청건수          N          2          99          
	$param_361  .= str_pad("$re_026", 3, "0",STR_PAD_LEFT);//21         026          현금서비스정보(KFB) 총수신건수          N          3          102          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//22         026          현금서비스정보(KFB) 요청건수          N          2          104          
	$param_361  .= str_pad("$re_027", 3, "0",STR_PAD_LEFT);//23         027          카드개설정보(KFB) 총수신건수          N          3          107          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//24         027          카드개설정보(KFB) 요청건수          N          2          109          
	$param_361  .= str_pad("$re_028", 3, "0",STR_PAD_LEFT);//25         028          카드실적/연체이력정보(KCB) 총수신건수          N          3          112          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//26         028          카드실적/연체이력정보(KCB) 요청건수          N          2          114          
	$param_361  .= str_pad("$re_029", 3, "0",STR_PAD_LEFT);//27         029          연체정보(KCB) 총수신건수          N          3          117          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//28         029          연체정보(KCB) 요청건수          N          2          119          
	$param_361  .= str_pad("$re_031", 3, "0",STR_PAD_LEFT);//29         031          대지급정보 총수신건수          N          3          122          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//30         031          대지급정보 요청건수            N          2          124
	$param_361  .= str_pad("$re_032", 3, "0",STR_PAD_LEFT);//31         032          채무불이행정보(KFB) 총수신건수   N          3          127
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//32         032          채무불이행정보(KFB) 요청건수   N          2          129
	$param_361  .= str_pad("$re_033", 3, "0",STR_PAD_LEFT);//33         033          채무불이행정보(KCB) 총수신건수          N          3          132          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//34         033          채무불이행정보(KCB) 요청건수          N          2          134          
	$param_361  .= str_pad("$re_035", 3, "0",STR_PAD_LEFT);//35         035          공공정보 및 금융질서문란 정보 총수신건수          N          3          137          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//36         035          공공정보 및 금융질서문란 정보 요청건수          N          2          139          
	$param_361  .= str_pad("$re_036", 3, "0",STR_PAD_LEFT);//37         036          연대보증정보(KFB) 총수신건수          N          3          142          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//38         036          연대보증정보(KFB) 요청건수          N          2          144          
	$param_361  .= str_pad("$re_037", 3, "0",STR_PAD_LEFT);//39         037          지급보증정보(KCB) 총수신건수          N          3          147          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//40         037          지급보증정보(KCB) 요청건수          N          2          149          
	$param_361  .= str_pad("$re_038", 3, "0",STR_PAD_LEFT);//41         038          연대보증 상세 내역(KCB) 총수신건수          N          3          152          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//42         038          연대보증 상세 내역(KCB) 요청건수          N          2          154          
	$param_361  .= str_pad("$re_039", 3, "0",STR_PAD_LEFT);//43         039          신용회복위원회정보 총수신건수          N          3          157          
	$param_361  .= str_pad("99", 2, "0",STR_PAD_LEFT);//44         039          신용회복위원회정보 요청건수          N          2          159          
	$param_361  .= str_pad("$re_103", 3, "0",STR_PAD_LEFT);//45         103          CPS 총수신건수          N          3          162          
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
$param_361  .= str_pad("L10210300", 9, " ",STR_PAD_RIGHT);

$param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
$param_361  .= str_pad("C1M210003", 9, " ",STR_PAD_RIGHT);

$param_361  .= str_pad("103", 3, " ",STR_PAD_RIGHT);
$param_361  .= str_pad("C1M220000", 9, " ",STR_PAD_RIGHT);
      
    
    $tcpip = str_pad(strlen($param_361), 4, "0",STR_PAD_LEFT);
    $param_361 = $tcpip.$param_361;




	$LogName2 = date("Ymd") . "_".$aaa."_req.log";
	$LogName_rev2 = $_POST[file_name].".log";

    WriteLog($LOG_DIR . $LogName2, $param_361, "S");
	$msg2=socket_1f007($SERVER_IP, $CREDIT_REAL_PORT, $param_361);
	$msgchek = $msg2;
    
	$LogName_rev2 = $_POST[file_name].".log";
    if ($msg2)	WriteLog($LOG_DIR.$LogName_rev2,$msg2,"R");
	echo "<br>**************************".$_POST[file_name]."*********************<br>";
	$file_name = $_POST[file_name];
	$sql_98  = "update scd_360 set files = '$file_name' where s_bps_no = '$s_bps_no' ";
	@mysql_query($sql_98, $conn);

	$startstr  = substr(substr($msg2,323),0,3);



    $msg2len = strlen($msg2);
	$block2=div_block2($msg2);

	//공통부 세분화
	$common_block2=div_common2($block2[0]);
	//print_r($common_block2);

	$common_personal2=div_personal2($block2[1]);
	//print_r($common_personal2);
    

	$start_spot = 0;
    
    $b_str_div = $block2[2];

	$block_chk = div_block2($msgchek);
	$block_chk2=div_personal2($block_chk[1]);

	$resend = trim($block_chk2[2]);
    $v1 = $block_chk2[1];




if($resend == "N"){  
echo "<br><br><br>";	
            $rep_017 = (1)*$common_personal2[7];
			$str_017 = 245;
			$str_017_len = $rep_017*$str_017;
	if($str_017_len > 0 ){
			echo $startstr."<br>";
			$start_spot_next = $start_spot + ($rep_017*$str_017);

			$i_017 = $rep_017;
		
		while($i_017 > 0){
	       
		   $sss = substr($b_str_div,$start_spot,$start_spot + $str_017);
		   echo $sss."<br>";
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

	
   
	    $rep_018 = (1)*$common_personal2[10];
		$str_018 = 9;
		$str_018_len = $rep_018*$str_018;
echo "========018 start "."<br>";

	if($str_018_len > 0){
		echo $startstr."<br>";
		$start_spot_1 = $start_spot_next;
		$start_spot_next = $start_spot_next + ($rep_018*$str_018);
		$i_018 = $rep_018;
		   
		   while($i_018 > 0){
			   
			   $sss = substr($b_str_div,$start_spot_1,$str_018);		
			   echo $b_str_div."<br>";
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

				mysql_query( $sql_018 ) or die ("sql_018");
			//echo $sql_018."<br>";
				$i_018--;
		    }
	}



    
	$rep_019 = (1)*$common_personal2[13];
	$str_019 = 75;
    $str_019_len= $rep_019*$str_019;
echo "========019 start "."<br>";	

	if($str_019_len > 0){
		echo $startstr."<br>";
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_019*$str_019);
    $i_019 = $rep_019;
		 while($i_019 > 0){
			 
		   $sss = substr($b_str_div,$start_spot,$str_019);		   
		   $c_019=div_019($sss);       
		   
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

			mysql_query( $sql_019 ) or die ("sql_019");
			//echo $sql_019."<br>";
            $i_019--; 
		 }

	}

	$rep_020 = (1)*$common_personal2[16];
	$str_020 = 39;
    $str_020_len= $rep_020*$str_020;
echo "========020 start "."<br>";	

	if($str_020_len > 0){
		echo $startstr."<br>";
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_020*$str_020);
    $i_020 = $rep_020;
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

			mysql_query( $sql_020 ) or die ("sql_020");
			//echo $sql_020."<br>";
			$i_020--; 
		 }

	}

	$rep_023 = (1)*$common_personal2[19];
	$str_023 = 133;
    $str_023_len= $rep_023*$str_023;
echo "========023 start "."<br>";	

	if($str_023_len > 0){
		echo $startstr;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_023*$str_023);
    $i_023 = $rep_023;
		 while($i_023 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_023);		   
		   $c_023=div_023($sss);       
		   
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

			mysql_query( $sql_023 ) or die ("sql_023");
			//echo $sql_023."<br>";
            $i_023--; 
		 }

	}

	$rep_024 = (1)*$common_personal2[22];
	$str_024 = 74;
    $str_024_len= $rep_024*$str_024;
echo "========024 start "."<br>";	

	if($str_024_len > 0){
		echo $startstr;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_024*$str_024);
    $i_024 = $rep_024;
		 while($i_024 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_024);		   
		   $c_024=div_024($sss);       
		   
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

			mysql_query( $sql_024 )  or die ("sql_024");
			//echo $sql_024."<br>";
			$i_024--; 
		 }

	}

	$rep_025 = (1)*$common_personal2[25];
	$str_025=519;
    $str_025_len= $rep_025*$str_025;
echo "========025 start "."<br>";	

	if($str_025_len > 0){
		echo $startstr;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_024*$str_024);
    $i_025 = $rep_025;
		 while($i_025 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_025);		   
		   $c_025=div_025($sss);       
		   
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

			mysql_query( $sql_025 ) or die ("sql_025");
			//echo $sql_025."<br>";
			$i_025--; 
		 }

	}

	$rep_026 = (1)*$common_personal2[28];
	$str_026=58;
    $str_026_len= $rep_026*$str_026;
echo "========026 start "."<br>";


	if($str_026_len > 0){
		echo $startstr;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_026*$str_026);
    $i_026 = $rep_026;
		 while($i_026 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_026);		   
		   $c_026=div_026($sss);       
		   
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

			mysql_query( $sql_026 ) or die ("sql_026");
			//echo $sql_026."<br>";
			$i_026--; 
		 }

	}


	$rep_027 = (1)*$common_personal2[31];
	$str_027=85;
    $str_027_len= $rep_027*$str_027;
	
echo "========027 start "."<br>";
	if($str_027_len > 0){
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_027*$str_027);
    $i_027 = $rep_027;
		 while($i_027 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_027);		   
		   $c_027=div_027($sss);       
		   
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
			//echo $sql_027."<br>";
			$i_027--; 
		 }
         
	}
	$rep_028 = (1)*$common_personal2[34];
	$str_028=663;
    $str_028_len= $rep_028*$str_028;
echo "========028 start "."<br>";	

	if($str_028_len > 0){
		
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_028*$str_028);
    $i_028 = $rep_028;
		 while($i_028 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_028);		   
		   $c_028=div_028($sss);       
		   
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

			@mysql_query( $sql_028 );
			//echo $sql_028."<br>";
			$i_028--; 
		 }

	}

	$rep_029 = (1)*$common_personal2[37];
	$str_029=125;
    $str_029_len= $rep_029*$str_029;
echo "========029 start "."<br>";	

	if($str_029_len > 0){
		echo $startstr."<br>";
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_029*$str_029);
    $i_029 = $rep_029;
		 while($i_029 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_029);		   
		   $c_029=div_029($sss);       
		
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

			@mysql_query( $sql_029 );
			//echo $sql_029."<br>";
			$i_029--; 
		 }

	}

	$rep_031 = (1)*$common_personal2[40];
	$str_031=107;
    $str_031_len= $rep_031*$str_031;
echo "========031 start "."<br>";	

	if($str_031_len > 0 ){
		echo $startstr."<br>";
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_031*$str_031);
    $i_031 = $rep_031;
		 while($i_031 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_031);		   
		   $c_031=div_031($sss);       
		
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

			@mysql_query( $sql_031 );
			//echo $sql_031."<br>";
			$i_031--; 
		 }

	}

	$rep_032 = (1)*$common_personal2[43];
	$str_032=113;
    $str_032_len= $rep_032*$str_032;
echo "========032 start "."<br>";	

	if($str_032_len > 0){
		echo $startstr."<br>";
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_032*$str_032);
    $i_032 = $rep_032;
		 while($i_032 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_032);		   
		   $c_032=div_032($sss);       
		 
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

			@mysql_query( $sql_032 ) ;
			//echo $sql_032."<br>";
			$i_032--; 
		 }

	}

	$rep_033 = (1)*$common_personal2[46];
	$str_033=80;
    $str_033_len= $rep_033*$str_033;
echo "========033 start "."<br>";	

	if($str_033_len > 0){
		echo $startstr."<br>";
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_033*$str_033);
    $i_033 = $rep_033;
		 while($i_033 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_033);		   
		   $c_033=div_033($sss);       
		  
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

			@mysql_query( $sql_033 );
			//echo $sql_033."<br>";
			$i_033--; 
		 }

	}

	$rep_035 = (1)*$common_personal2[49];
	$str_035=115;
    $str_035_len= $rep_035*$str_035;
echo "========035 start "."<br>";	

	if($str_035_len > 0 ){
		echo $startstr."<br>";
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_035*$str_035);
    $i_035 = $rep_035;
		 while($i_035 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_035);		   
		   $c_035=div_035($sss);       
		   
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

			@mysql_query( $sql_035 );
			//echo $sql_035."<br>";
			$i_035--; 
		 }

	}

	$rep_036 = (1)*$common_personal2[52];
	$str_036=58;
    $str_036_len= $rep_036*$str_036;
echo "========036 start "."<br>";	

	if($str_036_len > 0 ){
		echo $startstr."<br>";
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_036*$str_036);
    $i_036 = $rep_036;
		 while($i_036 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_036);		   
		   $c_036=div_036($sss);       
		   
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

			@mysql_query( $sql_036 );
			//echo $sql_036."<br>";
			$i_036--; 
		 }

	}


	$rep_037 = (1)*$common_personal2[55];
	$str_037=124;
    $str_037_len= $rep_037*$str_037;
echo "========037 start "."<br>";

	if($str_037_len > 0 ){
		echo $startstr."<br>";
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_037*$str_037);
    $i_037 = $rep_037;

		 while($i_037 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_037);		   
		   $c_037=div_037($sss);       
		   
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

			@mysql_query( $sql_037 ) ;
			//echo $sql_037."<br>";
			$i_037--; 
		 }

	}

	$rep_038 = (1)*$common_personal2[58];
	$str_038=61;
    $str_038_len= $rep_038*$str_038;
echo "========038 start "."<br>";	

	if($str_038_len > 0 ){
		echo $startstr."<br>";
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_038*$str_038);
    $i_038 = $rep_038;
		 while($i_038 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_038);		   
		   $c_038=div_038($sss);       
		   
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

			@mysql_query( $sql_038 );
			//echo $sql_038."<br>";
			$i_038--; 
		 }

	}

	$rep_039 = (1)*$common_personal2[61];
	$str_039=73;
    $str_039_len= $rep_039*$str_039;
echo "========039 start "."<br>";	

	if($rep_039 > 0){
		echo $startstr."<br>";
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_039*$str_039);
    $i_039 = $rep_039;
		 while($i_039 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_039);		   
		   $c_039=div_039($sss);       
		   
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

			@mysql_query( $sql_039 );
			echo $sql_039."<br>";
			$i_039--; 
		 }

	}
?>

<script language="javascript">

location.href = "scd_end.php?savekey=<?=$aaa?>&skn=<?=$s_bps_no?>";

</script>


<?



/*	$rep_103 = (1)*$common_personal2[64];
	$str_103=21;
    $str_103_len= $rep_103*$str_103;
	$start_spot_1 = $start_spot_next;
	$start_spot_next = $start_spot_next + ($rep_103*$str_103);
    $i_103 = $rep_103;

	if($str_103_len > 0){
	
		 while($i_103 > 0){
		   
		   $sss = substr($b_str_div,$start_spot,$str_103);		   
		   $c_103=div_103($sss);       
		   
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

			@mysql_query( $sql_103 );
			$i_103--; 
		 }

	}*/

}
?>
<script language="javascript">

location.href = "scd_end.php?savekey=<?=$aaa?>&skn=<?=$s_bps_no?>";



</script>
