<?
set_time_limit(0);
include "config.php";
include_once "../comm/db_info.php";

$LogName = date("Ymd") . "_360_req.log";
$LogName_rev = date("Ymd") . "_360_res.log";
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
$birthday = trim($_REQUEST['ssn11']);
$handphoone = str_pad(trim($_REQUEST['ph21']),4, " ",STR_PAD_RIGHT).trim($_REQUEST['ph22']).trim($_REQUEST['ph23']);
//$handphoone = trim($_REQUEST['ph21']).trim($_REQUEST['ph22']).trim($_REQUEST['ph23']);
$mangnum = $birthday.$handphoone;
$sex = (trim($_REQUEST['gunpil']) == "M")? "1" : "2";
$ap_name = iconv("UTF-8","CP949",$_REQUEST['name']);
$ip=$_SERVER['REMOTE_ADDR'];

$o = array( 'ap_sex'=>$s_send8);
$birthday="19".$birthday;

//echo json_encode($o);
//exit;
//$conn

/*
$birthday="19851019";
$sex="2";
$handphoone="01029775700";
$_REQUEST['ap_name']="노현주";

$birthday="19810811";
$sex="2";
$handphoone="01046208225";
$_REQUEST['ap_name']="정예서";



$birthday="19".$birthday;
$sex="2";
$handphoone="01029775700";
$_REQUEST['ap_name']="노현주";

2155711 


$birthday="19851019";
$sex="2";
$handphoone="01029775700";
$ap_name=iconv("UTF-8","CP949","노현주");
*/


$rs_count=mysql_query("SELECT max(s_no) s_no FROM scd_360 ",$conn);
$rs_row=mysql_fetch_row($rs_count);
$s_no = $rs_row[0]+1;




$s_mno = trim($s_no).trim($handphoone);
//공통부
//$param  = "    ";//송수신 전문길이(TCP/IP) Binary 4
$param  .= str_pad("SCDEV", 9, " ",STR_PAD_RIGHT);//1 Transaction Code AN 9 9 O
$param  .= str_pad("X0004000", 8, " ",STR_PAD_RIGHT);//2 이용자번호 AN 8 17 O
$param  .= str_pad("0100", 4, " ",STR_PAD_RIGHT);//3 전문종별코드 AN 4 21 O
$param  .= str_pad("360", 3, " ",STR_PAD_RIGHT);//4 업무구분코드 AN 3 24 O
$param  .= str_pad("B", 1, "0",STR_PAD_LEFT);//5 송수신 Flag A 1 25 O
$param  .= str_pad(" ", 4, " ",STR_PAD_RIGHT);//6 응답코드 AN 4 29 O
$param  .= str_pad("0000000", 7, "0",STR_PAD_LEFT);//7 KCB 전문 관리번호 N 7 36
$param  .= str_pad("00000000000000", 14, "0",STR_PAD_LEFT);//8 KCB 전문 전송시간 N 14 50
$param  .= str_pad("$s_no", 7, "0",STR_PAD_LEFT);//9 회원사 전문 관리번호 N 7 57 O
$param  .= str_pad("$s_send", 14, "0",STR_PAD_LEFT);//10 회원사 전문전송 시간 N 14 71 O
$param  .= str_pad(" ", 16, " ",STR_PAD_RIGHT);//11 KCB System 정보 AN 16 87
$param  .= str_pad(" ", 43, " ",STR_PAD_RIGHT);//12 FILLER AN 43 130 O

//요청정보부
$param .= str_pad("1000001230", 10, " ",STR_PAD_RIGHT);//1 제휴사코드 AN 10 10 O
$param .= str_pad("371", 10, " ",STR_PAD_RIGHT);//2 서비스코드 AN 10 20 O  370 상세보고서 371 종합보고서 372 맞춤보고서 
$param .= str_pad("$s_mno", 20, " ",STR_PAD_RIGHT);//3 관리번호 AN 20 40 O
$param .= str_pad($ap_name, 50, " ",STR_PAD_RIGHT);//4 성명 AN 50 90 O
$param .= str_pad(" ", 13, " ",STR_PAD_RIGHT);//5 주민번호 AN 13 103 O
$param .= str_pad($birthday, 8, " ",STR_PAD_RIGHT);//6 생년월일 AN 8 111 O
$param .= str_pad($sex, 2, " ",STR_PAD_RIGHT);//7 성별 AN 2 113 O
$param .= str_pad($handphoone, 12, " ",STR_PAD_RIGHT);//8 휴대폰 AN 12 125 O
$param .= str_pad($s_send8, 8, " ",STR_PAD_RIGHT);//9 신청일자 AN 8 133 O
$param .= str_pad("Y", 1, " ",STR_PAD_RIGHT);//10 본인인증 위탁동의여부 AN 1 134 O
$param .= str_pad("0100360", 10, " ",STR_PAD_RIGHT);//11 업무구분코드 AN 10 144 O
$param .= str_pad("100", 10, " ",STR_PAD_RIGHT);//12 메뉴구분코드 AN 10 154 O   100:PC   200:모바일
$param .= str_pad("s07036972703", 20, " ",STR_PAD_RIGHT);//13 화면구분코드 AN 20 174 O  s07036972703 : PC    s08160933241 : 모바일   
$param .= str_pad($ip, 15, " ",STR_PAD_RIGHT);//14 요청IP AN 15 189 O
$param .= str_pad("www.30cut.com", 50, " ",STR_PAD_RIGHT);//15 요청도메인 AN 50 239 O
$param .= str_pad(" ", 100, " ",STR_PAD_RIGHT);//16 FILLER AN 100 339 O



//$param1 = str_pad(strlen($param), 10, "0",STR_PAD_LEFT).$param;
$param1 = sprintf("%010d", strlen($param)) . $param;
//echo "insert into getmngnum(id,name,jumin,birthday,sex,phone,app_datetime) values ();";

$tcpip = str_pad(strlen($param), 4, "0",STR_PAD_LEFT);
$param2 = $tcpip.$param;
$s_no_v = str_pad("$s_no", 7, "0",STR_PAD_LEFT);

$query = "insert into scd_360 (s_name, s_birth, s_tel, s_sex ,s_datetime , s_ip, s_kcb_no, s_bps_no, s_mno, s_key) values ('$ap_name','$birthday','$handphoone','$sex',now(),'$ip','','$s_no_v','$s_mno','')";
mysql_query($query, $conn) or die('글을 저장하는데 실패하였습니다.');

$rs_count1=mysql_query("SELECT s_birth FROM scd_360 order by s_no desc limit 1",$conn);
$rs_row1=mysql_fetch_row($rs_count1);

WriteLog($LOG_DIR . $LogName, str_pad($param2, 4, "0",STR_PAD_RIGHT).$param2, "S");
//echo $param2."<br>";
//echo $SERVER_IP, $CREDIT_TEST_PORT, $param1;
$msg=socket_1f007($SERVER_IP, $CREDIT_REAL_PORT, $param2);

/////////////파일로그 기록/////////////////////
if ($msg)	WriteLog($LOG_DIR.$LogName_rev,$msg,"R");
// 공통부, 개별응답부, 응답정보부 나누기
function div_block($string)
{
	$string=substr($string,4);					      //앞자리 10개 제외 시킨다
	$result[0]=substr($string, 0, 130);			  //공통부
	$result[1]=substr($string, 130, 520);		  //응답정보부
	//$result[2]=substr($string, 300);				//응답정보부
	return $result;
}

//공통부 세분화
function div_common($string)
{
    $result[1] = substr($string,0,9);//     Transaction Code      AN      9      9      O
	$result[2] = substr($string,9,8);//     이용자번호      AN      8      17      O
	$result[3] = substr($string,17,4);//     전문종별코드      AN      4      21      O
	$result[4] = substr($string,21,3);//     업무구분코드      AN      3      24      O
	$result[5] = substr($string,24,1);//     송수신 Flag      A      1      25      O
	$result[6] = substr($string,25,4);//     응답코드      AN      4      29      O
	$result[7] = substr($string,29,7);//     KCB 전문 관리번호      N      7      36      O
	$result[8] = substr($string,36,14);//     KCB 전문 전송시간      N      14      50      O
	$result[9] = substr($string,50,7);//     회원사 전문 관리번호      N      7      57      
	$result[10]= substr($string,57,14);//      회원사 전문전송 시간      N      14      71      
	$result[11]= substr($string,71,16);//      KCB System 정보      AN      16      87      O
	$result[12]= substr($string,87,43);//      FILLER      AN      43      130      O


	return $result;
}

//개별응답부 세분화
function div_personal($string)
{
    $result[1]=substr($string,0,10);//	제휴사코드	AN	10	10	O
	$result[2]=substr($string,10,10);//	서비스코드	AN	10	20	O
	$result[3]=substr($string,20,20);//	관리번호	AN	20	40	O
	$result[4]=substr($string,40,20);//	신청키	AN	20	60	O
	$result[5]=substr($string,60,10);//	프로토콜	AN	10	70	O
	$result[6]=substr($string,70,50);//	도메인	AN	50	120	O
	$result[7]=substr($string,120,200);//	URI	AN	200	320	O
	$result[8]=substr($string,320,100);//	암호화파라미터	AN	100	420	O
	$result[9]=substr($string,420,100);//	FILLER	AN	100	520	O

  
	/*$result[4]=($result[4])?$result[4]:0;
	$result[5]=($result[5])?$result[5]:0;
	$result[6]=($result[6])?$result[6]:0;
	$result[7]=($result[7])?$result[7]:0;
	$result[8]=($result[8])?$result[8]:0;
	$result[9]=($result[9])?$result[9]:0;
	$result[10]=($result[10])?$result[10]:0;
	$result[11]=($result[11])?$result[11]:0;
	$result[12]=($result[12])?$result[12]:0;
	$result[13]=($result[13])?$result[13]:0;
	$result[14]=($result[14])?$result[14]:0;*/

	return $result;
}


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
    $kcb_url = trim($personal_block[5]).trim($personal_block[6]).trim($personal_block[7]).urlencode(trim($personal_block[8])).'&RTN_URL=http://test.30cut.com/move2.html?skn='.$common_block[8];

 		
				   
	$sql_98  = "update scd_360 set s_kcb_no = '$common_block[8]', s_key = '$personal_block[4]' where s_no = '$common_block[9]' ";
	//echo $sql_98;
	mysql_query($sql_98, $conn) or die('글을 저장하는데 실패하였습니다.');





//WriteLog($LOG_DIR . $LogName, $param, "S");
echo "MOVING TO KCB PAGE ......";

pg_close();
?>


<script language="javascript">
alert("<?=$kcb_url?>");
location.href="<?=$kcb_url?>";

</script>
