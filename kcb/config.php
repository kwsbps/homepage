<?php

$EXEC_PATH_NAME	= "/home/hsj/public_html/src/HsjClient";

$SERVER_IP			=	"219.255.136.242";
$CREDIT_REAL_PORT	=	"43300";	//리얼  
$CREDIT_TEST_PORT	=	"43300";	//테스트
$ASP_REAL_PORT		=	"43300";	    //리얼  
$ASP_TEST_PORT		=	"43300";	    //테스트
$LOG_DIR			=	"/home/test/kcb/log/";
/*
$SERVER_IP			=	"219.255.136.241";
$CREDIT_REAL_PORT	=	"43300";	//리얼  
$CREDIT_TEST_PORT	=	"43300";	//테스트
$ASP_REAL_PORT		=	"43300";	    //리얼  
$ASP_TEST_PORT		=	"43300";	    //테스트
$LOG_DIR			=	"/home/test/kcb/log/";
*/

$_DB_USER = '30cut';
$_DB_PASS = '30cut1@#';
$_DB_HOST = '172.30.1.198';//58.229.234.52
$_DB_NAME = '30cut';

$conn = mysql_connect("$_DB_HOST","$_DB_USER","$_DB_PASS") or die(mysql_error()); 
mysql_select_db("$_DB_NAME",$conn) or die("데이터베이스를 선택할 수 없습니다."); 
@mysql_query("set names euckr");
//mysql_query("SET NAMES utf8"); 


function WriteLog($path_name, $str, $opt="") {
	if (!is_file($path_name)) {
		$fp = fopen($path_name, "a");
		chmod($path_name, 0777);
		fclose($fp);
	}
	
	
	if ($opt == "S") $StrHead = "[SEND]";
	else if ($opt == "R") $StrHead = "[RECV]";
	else $StrHead = "";
	
	if ($StrHead) $StrLen = "[" . strlen($str) . "]";
	else $StrLen = "";

	$StrTmp = "\n[" . date("Y.m.d H:i:s") . "]" . $StrHead.$StrLen . "[" . $str . "]";

	
	$fp = fopen($path_name, "a");
	fwrite ($fp, $StrTmp);
	fclose ($fp);
}

function get_age($ssn) {
	$bornyear = substr($ssn, 0, 2)+1900;
	$bornmonth =  substr($ssn, 2, 2);
	$bornday = substr($ssn, 4, 2);

	$age = date("Y") - $bornyear;

	if(date("m")<$bornmonth) {
			$age--;
	}
	else if(date("m")==$bornmonth) {
			if(date("d")<$bornday) {
					$age--;
			}
	}
	return $age;
}

function get_korea_age($ssn) {
	$bornyear = substr($ssn, 0, 2) + 1900;
	$bornmonth =  substr($ssn, 2, 2);
	$age = (date("Y") - $bornyear)+1;
	return $age;
}

function get_sex($ssn) {
	$tmp=substr($ssn,0,1);
	if ($tmp=="2") {
		$sex="W";
	} else {
		$sex="M";
	}
	return $sex;
}

function socket($address, $port, $param) {
	set_time_limit(0);
	$time_start = microtime(1);

	$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP); 
	socket_connect($sock, $address, $port);

	$param = str_replace("_", " ", $param);
	$param = str_replace("@", "_", $param);

	$msg = $param;

	socket_write($sock, $msg, strlen($msg));
	while ($out = socket_read($sock, 1448)) {
	    $receive_msg .= $out;

		if (strlen($out) < 1448) break;
	}
	socket_close($sock);

	return $receive_msg;

}

function socket_1f007($address, $port, $param) {
	set_time_limit(0);
	$time_start = microtime(1);



	$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP); 
	
	$on = socket_connect($sock, $address, $port);

	if($on){
	//echo $sock.$address.$port."-1";
	}else{
    //echo $sock.$address.$port."-2";
	}
	
//	$param = str_replace("_", " ",$param);
//	$param = str_replace("@", "_",$param);

	$msg = $param;

	socket_write($sock, $msg, strlen($msg));
	while ($out = socket_read($sock, 1448)) {
	    $receive_msg .= $out;

		if (strlen($out) < 1448) break;
	}
	socket_close($sock);

	return $receive_msg;

}

function hangle_pad($input, $pad_length, $pad_string){

	$strlen = strlen($input);
	$hanlen = 0; $englen = 0;

	for($i=0; $i<$strlen; $i++){

		if(ord($input[$i]) > 127){
			$hanlen++;

		}else{
			$englen++;

		}
	}

	$hanlen = ($hanlen / 3) * 2;
	$length=$hanlen + $englen;

	return $input.str_repeat($pad_string, $pad_length - $length);
} 

   function div_block($string)
	{
		$string=substr($string,4);					      //앞자리 10개 제외 시킨다
		$result[0]=substr($string, 0, 130);			  //공통부
		$result[1]=substr($string, 130, 400);		  //응답정보부
		//$result[2]=substr($string, 300);				//응답정보부
		return $result;
	}

	//공통부 세분화
	function div_common($string)
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
	function div_personal($string)
	{
		$result[1]=substr($string,0,10);//      제휴사코드      AN      10      10      O
		$result[2]=substr($string,10,10);//      서비스코드      AN      10      20      O
		$result[3]=substr($string,20,20);//      관리번호      AN      20      40      O
		$result[4]=substr($string,40,20);//      신청키      AN      20      60      O
		$result[5]=substr($string,60,40);//      대체키      AN      40      100      O
		$result[6]=substr($string,100,64);//      중복가입확인정보      AN      64      164      O
		$result[7]=substr($string,164,12);//      식별회원사코드      AN      12      176      O
		$result[8]=substr($string,176,88);//      연계정보      AN      88      264      O
		$result[9]=substr($string,264,136);//      FILLER      AN      136      400      O

	  
		return $result;
	}


      
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




	function div_017($string){
          
       $result[1] =substr($string,0,3);//1     Segment ID      AN      3      3
	   $result[2] =substr($string,3,1);//2     정보구분코드      AN      1      4
	   $result[3] =substr($string,4,8);//3     등록일자      AN      8      12
	   $result[4] =hangle_pad(substr($string,12,100),100,'');//4     우편번호주소      AN      100      112
	   
	   $result[5] =hangle_pad(substr($string,112,100),100,'');//5     상세주소      AN      100      212
	   $result[6] =substr($string,212,12);//6     전화번호      AN      12      224
       $result[7] =substr($string,224,9);//7     연소득      N      9      233
	   $result[8] =substr($string,233,12);//8     휴대폰번호      AN      12      245

	   return $result;

	}
	/*

	CREATE TABLE div_017 (
	  id int(11) NOT NULL AUTO_INCREMENT,
	  savekey varchar(20) NOT NULL DEFAULT '',
	  segment varchar(3) NOT NULL DEFAULT '',
	  infocode varchar(1) NOT NULL DEFAULT '',
	  regdate varchar(8) NOT NULL DEFAULT '',
	  juso1 varchar(100) NOT NULL DEFAULT '',
      juso2 varchar(100) NOT NULL DEFAULT '',
	  tel varchar(12) NOT NULL DEFAULT '',
	  income varchar(9) NOT NULL DEFAULT '',
	  hp varchar(12) NOT NULL DEFAULT '',
	  e_datetime datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  PRIMARY KEY (`id`)
	) 
	*/


	function div_018($string){
          
       $result[1] =substr($string,0,3);//1     Segment ID      AN      3      3
	   $result[2] =substr($string,3,4);//2     평점      AN      4      7
	   $result[3] =substr($string,7,2);//3     등급      AN      2      9

	   return $result;

	}
	/*

	CREATE TABLE div_018 (
	  id int(11) NOT NULL AUTO_INCREMENT,
	  savekey varchar(20) NOT NULL DEFAULT '',
	  segment varchar(3) NOT NULL DEFAULT '',
	  pengjum varchar(4) NOT NULL DEFAULT '',
	  grade varchar(2) NOT NULL DEFAULT '',
	  e_datetime datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  PRIMARY KEY (`id`)
	) 
	*/

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
	/*

	CREATE TABLE div_019 (
	  id int(11) NOT NULL AUTO_INCREMENT,
	  savekey varchar(20) NOT NULL DEFAULT '',
	  segment varchar(3) NOT NULL DEFAULT '',
	  onepengjum varchar(4) NOT NULL DEFAULT '',
	  twopengjum varchar(4) NOT NULL DEFAULT '',
	  threepengjum varchar(4) NOT NULL DEFAULT '',
	  fourpengjum varchar(4) NOT NULL DEFAULT '',
	  fivepengjum varchar(4) NOT NULL DEFAULT '',
	  sixpengjum varchar(4) NOT NULL DEFAULT '',
	  sevenpengjum varchar(4) NOT NULL DEFAULT '',
	  eightpengjum varchar(4) NOT NULL DEFAULT '',
	  ninepengjum varchar(4) NOT NULL DEFAULT '',
	  tenpengjum varchar(4) NOT NULL DEFAULT '',
      elevenpengjum varchar(4) NOT NULL DEFAULT '',
	  twelvepengjum varchar(4) NOT NULL DEFAULT '',
	  onegrade varchar(2) NOT NULL DEFAULT '',
	  twograde varchar(2) NOT NULL DEFAULT '',
	  threegrade varchar(2) NOT NULL DEFAULT '',
	  fourgrade varchar(2) NOT NULL DEFAULT '',
	  fivegrade varchar(2) NOT NULL DEFAULT '',
	  sixgrade varchar(2) NOT NULL DEFAULT '',
	  sevengrade varchar(2) NOT NULL DEFAULT '',
	  eightgrade varchar(2) NOT NULL DEFAULT '',
	  ninegrade varchar(2) NOT NULL DEFAULT '',
	  tengrade varchar(2) NOT NULL DEFAULT '',
      elevengrade varchar(2) NOT NULL DEFAULT '',
	  twelvegrade varchar(2) NOT NULL DEFAULT '',
	  e_datetime datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  PRIMARY KEY (`id`)
	) 
	*/

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
	/*
	CREATE TABLE div_020 (
	  id int(11) NOT NULL AUTO_INCREMENT,
      savekey varchar(20) NOT NULL DEFAULT '',
	  segment varchar(3) NOT NULL DEFAULT '',
	  posi1 varchar(6) NOT NULL DEFAULT '',
	  posi2 varchar(6) NOT NULL DEFAULT '',
	  posi3 varchar(6) NOT NULL DEFAULT '',
	  nega1 varchar(6) NOT NULL DEFAULT '',
	  nega2 varchar(6) NOT NULL DEFAULT '',
	  nega3 varchar(6) NOT NULL DEFAULT '',
	  e_datetime datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  PRIMARY KEY (`id`)
	) 
	*/


	function div_023($string){

		$result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =hangle_pad(substr($string,3,70),100,'');//2          기관명          AN          100          103          
		$result[3] =substr($string,103,2);//3          등록사유코드          AN          2          105          
		$result[4] =substr($string,105,8);//4          대출일자          AN          8          113          
		$result[5] =substr($string,113,8);//5          변동일자          AN          8          121          
		$result[6] =substr($string,121,9);//6          금액          N          9          130          
		$result[7] =substr($string,130,3);//7          KFB대출구분코드          AN          3          133          

        return $result;       

	}
	/*
	CREATE TABLE div_023 (
	  id int(11) NOT NULL AUTO_INCREMENT,
	  savekey varchar(20) NOT NULL DEFAULT '',
	  segment varchar(3) NOT NULL DEFAULT '',
	  office varchar(6) NOT NULL DEFAULT '',
	  sayoucode varchar(6) NOT NULL DEFAULT '',
	  loandate varchar(6) NOT NULL DEFAULT '',
	  changedate varchar(6) NOT NULL DEFAULT '',
	  amount varchar(6) NOT NULL DEFAULT '',
	  kfbloancode varchar(6) NOT NULL DEFAULT '',
	  e_datetime datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  PRIMARY KEY (`id`)
	) 
	*/


	function div_024($string){

		$result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =hangle_pad(substr($string,3,30),30,'');//2          기관명          AN          30          33          
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
	/*
	CREATE TABLE div_024 (
	  id int(11) NOT NULL AUTO_INCREMENT,
	  savekey varchar(20) NOT NULL DEFAULT '',
	  segment varchar(3) NOT NULL DEFAULT '',
	  office varchar(30) NOT NULL DEFAULT '',
	  loantypecode varchar(1) NOT NULL DEFAULT '',
	  loandate varchar(8) NOT NULL DEFAULT '',
	  duedate varchar(8) NOT NULL DEFAULT '',
	  totamt varchar(9) NOT NULL DEFAULT '',
	  loanamt varchar(9) NOT NULL DEFAULT '',
	  credityn varchar(1) NOT NULL DEFAULT '',
	  collyn varchar(1) NOT NULL DEFAULT '',
	  guarantoryn varchar(1) NOT NULL DEFAULT '',
	  grouploancode varchar(1) NOT NULL DEFAULT '',
	  lateloanyn varchar(1) NOT NULL DEFAULT '',
	  recovyn varchar(1) NOT NULL DEFAULT '',
	  e_datetime datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  PRIMARY KEY (`id`)
	) 
	*/


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
    
/*
	CREATE TABLE div_025 (
	  id int(11) NOT NULL AUTO_INCREMENT,
	  savekey varchar(20) NOT NULL DEFAULT '',
	  segment varchar(3) NOT NULL DEFAULT '',
	  acctot1 varchar(3) NOT NULL DEFAULT '',
	  acctot2 varchar(3) NOT NULL DEFAULT '',
	  acctot3 varchar(3) NOT NULL DEFAULT '',
	  acctot4 varchar(3) NOT NULL DEFAULT '',
	  acctot5 varchar(3) NOT NULL DEFAULT '',
	  acctot6 varchar(3) NOT NULL DEFAULT '',
	  acctot7 varchar(3) NOT NULL DEFAULT '',
	  acctot8 varchar(3) NOT NULL DEFAULT '',
	  acctot9 varchar(3) NOT NULL DEFAULT '',
	  acctot10 varchar(3) NOT NULL DEFAULT '',
	  acctot11 varchar(3) NOT NULL DEFAULT '',
	  acctot12 varchar(3) NOT NULL DEFAULT '',
	  yaktot1 varchar(9) NOT NULL DEFAULT '',
	  yaktot2 varchar(9) NOT NULL DEFAULT '',
	  yaktot3 varchar(9) NOT NULL DEFAULT '',
	  yaktot4 varchar(9) NOT NULL DEFAULT '',
	  yaktot5 varchar(9) NOT NULL DEFAULT '',
	  yaktot6 varchar(9) NOT NULL DEFAULT '',
	  yaktot7 varchar(9) NOT NULL DEFAULT '',
	  yaktot8 varchar(9) NOT NULL DEFAULT '',
	  yaktot9 varchar(9) NOT NULL DEFAULT '',
	  yaktot10 varchar(9) NOT NULL DEFAULT '',
	  yaktot11 varchar(9) NOT NULL DEFAULT '',
	  yaktot12 varchar(9) NOT NULL DEFAULT '',
	  monreturn1 varchar(9) NOT NULL DEFAULT '',
	  monreturn2 varchar(9) NOT NULL DEFAULT '',
	  monreturn3 varchar(9) NOT NULL DEFAULT '',
	  monreturn4 varchar(9) NOT NULL DEFAULT '',
	  monreturn5 varchar(9) NOT NULL DEFAULT '',
	  monreturn6 varchar(9) NOT NULL DEFAULT '',
	  monreturn7 varchar(9) NOT NULL DEFAULT '',
	  monreturn8 varchar(9) NOT NULL DEFAULT '',
	  monreturn9 varchar(9) NOT NULL DEFAULT '',
	  monreturn10 varchar(9) NOT NULL DEFAULT '',
	  monreturn11 varchar(9) NOT NULL DEFAULT '',
	  monreturn12 varchar(9) NOT NULL DEFAULT '',
	  balanmon1 varchar(9) NOT NULL DEFAULT '',
	  balanmon2 varchar(9) NOT NULL DEFAULT '',
	  balanmon3 varchar(9) NOT NULL DEFAULT '',
	  balanmon4 varchar(9) NOT NULL DEFAULT '',
	  balanmon5 varchar(9) NOT NULL DEFAULT '',
	  balanmon6 varchar(9) NOT NULL DEFAULT '',
	  balanmon7 varchar(9) NOT NULL DEFAULT '',
	  balanmon8 varchar(9) NOT NULL DEFAULT '',
	  balanmon9 varchar(9) NOT NULL DEFAULT '',
	  balanmon10 varchar(9) NOT NULL DEFAULT '',
	  balanmon11 varchar(9) NOT NULL DEFAULT '',
	  balanmon12 varchar(9) NOT NULL DEFAULT '',
	  lateamtmon1 varchar(9) NOT NULL DEFAULT '',
	  lateamtmon2 varchar(9) NOT NULL DEFAULT '',
	  lateamtmon3 varchar(9) NOT NULL DEFAULT '',
	  lateamtmon4 varchar(9) NOT NULL DEFAULT '',
	  lateamtmon5 varchar(9) NOT NULL DEFAULT '',
	  lateamtmon6 varchar(9) NOT NULL DEFAULT '',
	  lateamtmon7 varchar(9) NOT NULL DEFAULT '',
	  lateamtmon8 varchar(9) NOT NULL DEFAULT '',
	  lateamtmon9 varchar(9) NOT NULL DEFAULT '',
	  lateamtmon10 varchar(9) NOT NULL DEFAULT '',
	  lateamtmon11 varchar(9) NOT NULL DEFAULT '',
	  lateamtmon12 varchar(9) NOT NULL DEFAULT '',
	  maxlatedaymon1 varchar(4) NOT NULL DEFAULT '',
	  maxlatedaymon2 varchar(4) NOT NULL DEFAULT '',
	  maxlatedaymon3 varchar(4) NOT NULL DEFAULT '',
	  maxlatedaymon4 varchar(4) NOT NULL DEFAULT '',
	  maxlatedaymon5 varchar(4) NOT NULL DEFAULT '',
	  maxlatedaymon6 varchar(4) NOT NULL DEFAULT '',
	  maxlatedaymon7 varchar(4) NOT NULL DEFAULT '',
	  maxlatedaymon8 varchar(4) NOT NULL DEFAULT '',
	  maxlatedaymon9 varchar(4) NOT NULL DEFAULT '',
	  maxlatedaymon10 varchar(4) NOT NULL DEFAULT '',
	  maxlatedaymon11 varchar(4) NOT NULL DEFAULT '',
	  maxlatedaymon12 varchar(4) NOT NULL DEFAULT '',
	  e_datetime datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  PRIMARY KEY (`id`)
	) 
	*/
	


    function div_026($string){

        $result[1] =substr($string,0,3);//1	Segment ID	AN	3	3	
		$result[2] =substr($string,3,30);//2	기관명	AN	30	33	
		$result[3] =substr($string,33,8);//3	발생일	AN	8	41	
		$result[4] =substr($string,41,8);//4	변동일	AN	8	49	
		$result[5] =substr($string,49,9);//5	금액	N	9	58	


        return $result;      

	}
	/*
	CREATE TABLE div_026 (
	  id int(11) NOT NULL AUTO_INCREMENT,
	  savekey varchar(20) NOT NULL DEFAULT '',
	  segment varchar(3) NOT NULL DEFAULT '',
	  office varchar(30) NOT NULL DEFAULT '',
	  s_date varchar(8) NOT NULL DEFAULT '',
	  t_date varchar(8) NOT NULL DEFAULT '',
	  amount varchar(9) NOT NULL DEFAULT '',
	  e_datetime datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  PRIMARY KEY (`id`)
	) 
	*/



	function div_027($string){

        $result[1] =substr($string,0,3);//1	Segment ID	AN	3	3	
		$result[2] =hangle_pad(substr($string,3,30),30,'');//2	기관명	AN	30	33	
		$result[3] =substr($string,33,40);//3	관리점명	AN	40	73	
		$result[4] =substr($string,73,4);//4	등록사유코드	AN	4	77	
		$result[5] =substr($string,77,8);//5	발생일자	AN	8	85	


        return $result;      

	}
	/*
	CREATE TABLE div_027 (
	  id int(11) NOT NULL AUTO_INCREMENT,
	  savekey varchar(20) NOT NULL DEFAULT '',
	  office varchar(30) NOT NULL DEFAULT '',
	  mngoffice varchar(40) NOT NULL DEFAULT '',
	  regsayou varchar(4) NOT NULL DEFAULT '',
	  s_date varchar(8) NOT NULL DEFAULT '',
	  e_datetime datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  PRIMARY KEY (`id`)
	) 
	*/

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
/*
	CREATE TABLE div_028 (
	  id int(11) NOT NULL AUTO_INCREMENT,
	  savekey varchar(20) NOT NULL DEFAULT '',
	  segment varchar(3) NOT NULL DEFAULT '',
	  buildcard1 varchar(2) NOT NULL DEFAULT '',
	  buildcard2 varchar(2) NOT NULL DEFAULT '',
	  buildcard3 varchar(2) NOT NULL DEFAULT '',
	  buildcard4 varchar(2) NOT NULL DEFAULT '',
	  buildcard5 varchar(2) NOT NULL DEFAULT '',
	  buildcard6 varchar(2) NOT NULL DEFAULT '',
	  buildcard7 varchar(2) NOT NULL DEFAULT '',
	  buildcard8 varchar(2) NOT NULL DEFAULT '',
	  buildcard9 varchar(2) NOT NULL DEFAULT '',
	  buildcard10 varchar(2) NOT NULL DEFAULT '',
	  buildcard11 varchar(2) NOT NULL DEFAULT '',
	  buildcard12 varchar(2) NOT NULL DEFAULT '',
	  usecard1 varchar(9) NOT NULL DEFAULT '',
	  usecard2 varchar(9) NOT NULL DEFAULT '',
	  usecard3 varchar(9) NOT NULL DEFAULT '',
	  usecard4 varchar(9) NOT NULL DEFAULT '',
	  usecard5 varchar(9) NOT NULL DEFAULT '',
	  usecard6 varchar(9) NOT NULL DEFAULT '',
	  usecard7 varchar(9) NOT NULL DEFAULT '',
	  usecard8 varchar(9) NOT NULL DEFAULT '',
	  usecard9 varchar(9) NOT NULL DEFAULT '',
	  usecard10 varchar(9) NOT NULL DEFAULT '',
	  usecard11 varchar(9) NOT NULL DEFAULT '',
	  usecard12 varchar(9) NOT NULL DEFAULT '',
	  cashcard1 varchar(9) NOT NULL DEFAULT '',
	  cashcard2 varchar(9) NOT NULL DEFAULT '',
	  cashcard3 varchar(9) NOT NULL DEFAULT '',
	  cashcard4 varchar(9) NOT NULL DEFAULT '',
	  cashcard5 varchar(9) NOT NULL DEFAULT '',
	  cashcard6 varchar(9) NOT NULL DEFAULT '',
	  cashcard7 varchar(9) NOT NULL DEFAULT '',
	  cashcard8 varchar(9) NOT NULL DEFAULT '',
	  cashcard9 varchar(9) NOT NULL DEFAULT '',
	  cashcard10 varchar(9) NOT NULL DEFAULT '',
	  cashcard11 varchar(9) NOT NULL DEFAULT '',
	  cashcard12 varchar(9) NOT NULL DEFAULT '',
	  totmaxamt1 varchar(9) NOT NULL DEFAULT '',
	  totmaxamt2 varchar(9) NOT NULL DEFAULT '',
	  totmaxamt3 varchar(9) NOT NULL DEFAULT '',
	  totmaxamt4 varchar(9) NOT NULL DEFAULT '',
	  totmaxamt5 varchar(9) NOT NULL DEFAULT '',
	  totmaxamt6 varchar(9) NOT NULL DEFAULT '',
	  totmaxamt7 varchar(9) NOT NULL DEFAULT '',
	  totmaxamt8 varchar(9) NOT NULL DEFAULT '',
	  totmaxamt9 varchar(9) NOT NULL DEFAULT '',
	  totmaxamt10 varchar(9) NOT NULL DEFAULT '',
	  totmaxamt11 varchar(9) NOT NULL DEFAULT '',
	  totmaxamt12 varchar(9) NOT NULL DEFAULT '',
	  totmaxcash1 varchar(9) NOT NULL DEFAULT '',
	  totmaxcash2 varchar(9) NOT NULL DEFAULT '',
	  totmaxcash3 varchar(9) NOT NULL DEFAULT '',
	  totmaxcash4 varchar(9) NOT NULL DEFAULT '',
	  totmaxcash5 varchar(9) NOT NULL DEFAULT '',
	  totmaxcash6 varchar(9) NOT NULL DEFAULT '',
	  totmaxcash7 varchar(9) NOT NULL DEFAULT '',
	  totmaxcash8 varchar(9) NOT NULL DEFAULT '',
	  totmaxcash9 varchar(9) NOT NULL DEFAULT '',
	  totmaxcash10 varchar(9) NOT NULL DEFAULT '',
	  totmaxcash11 varchar(9) NOT NULL DEFAULT '',
	  totmaxcash12 varchar(9) NOT NULL DEFAULT '',
	  totuseamt1 varchar(4) NOT NULL DEFAULT '',
	  totuseamt2 varchar(4) NOT NULL DEFAULT '',
	  totuseamt3 varchar(4) NOT NULL DEFAULT '',
	  totuseamt4 varchar(4) NOT NULL DEFAULT '',
	  totuseamt5 varchar(4) NOT NULL DEFAULT '',
	  totuseamt6 varchar(4) NOT NULL DEFAULT '',
	  totuseamt7 varchar(4) NOT NULL DEFAULT '',
	  totuseamt8 varchar(4) NOT NULL DEFAULT '',
	  totuseamt9 varchar(4) NOT NULL DEFAULT '',
	  totuseamt10 varchar(4) NOT NULL DEFAULT '',
	  totuseamt11 varchar(4) NOT NULL DEFAULT '',
	  totuseamt12 varchar(4) NOT NULL DEFAULT '',
	  cashuseamt1 varchar(4) NOT NULL DEFAULT '',
	  cashuseamt2 varchar(4) NOT NULL DEFAULT '',
	  cashuseamt3 varchar(4) NOT NULL DEFAULT '',
	  cashuseamt4 varchar(4) NOT NULL DEFAULT '',
	  cashuseamt5 varchar(4) NOT NULL DEFAULT '',
	  cashuseamt6 varchar(4) NOT NULL DEFAULT '',
	  cashuseamt7 varchar(4) NOT NULL DEFAULT '',
	  cashuseamt8 varchar(4) NOT NULL DEFAULT '',
	  cashuseamt9 varchar(4) NOT NULL DEFAULT '',
	  cashuseamt10 varchar(4) NOT NULL DEFAULT '',
	  cashuseamt11 varchar(4) NOT NULL DEFAULT '',
	  cashuseamt12 varchar(4) NOT NULL DEFAULT '',
	  lateamt1 varchar(4) NOT NULL DEFAULT '',
	  lateamt2 varchar(4) NOT NULL DEFAULT '',
	  lateamt3 varchar(4) NOT NULL DEFAULT '',
	  lateamt4 varchar(4) NOT NULL DEFAULT '',
	  lateamt5 varchar(4) NOT NULL DEFAULT '',
	  lateamt6 varchar(4) NOT NULL DEFAULT '',
	  lateamt7 varchar(4) NOT NULL DEFAULT '',
	  lateamt8 varchar(4) NOT NULL DEFAULT '',
	  lateamt9 varchar(4) NOT NULL DEFAULT '',
	  lateamt10 varchar(4) NOT NULL DEFAULT '',
	  lateamt11 varchar(4) NOT NULL DEFAULT '',
	  lateamt12 varchar(4) NOT NULL DEFAULT '',
	  maxlateday1 varchar(4) NOT NULL DEFAULT '',
	  maxlateday2 varchar(4) NOT NULL DEFAULT '',
	  maxlateday3 varchar(4) NOT NULL DEFAULT '',
	  maxlateday4 varchar(4) NOT NULL DEFAULT '',
	  maxlateday5 varchar(4) NOT NULL DEFAULT '',
	  maxlateday6 varchar(4) NOT NULL DEFAULT '',
	  maxlateday7 varchar(4) NOT NULL DEFAULT '',
	  maxlateday8 varchar(4) NOT NULL DEFAULT '',
	  maxlateday9 varchar(4) NOT NULL DEFAULT '',
	  maxlateday10 varchar(4) NOT NULL DEFAULT '',
	  maxlateday11 varchar(4) NOT NULL DEFAULT '',
	  maxlateday12 varchar(4) NOT NULL DEFAULT '',
	  e_datetime datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  PRIMARY KEY (`id`)
	) 
	*/


    function div_029($string){

        $result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =hangle_pad(substr($string,3,30),30,'');//2          기관명          AN          30          33          
		$result[3] =hangle_pad(substr($string,33,40),40,'');//3          관리점명          AN          40          73          
		$result[4] =substr($string,73,1);//4          거래형태코드          AN          1          74          
		$result[5] =substr($string,74,8);//5          최초연체기산일자          AN          8          82          
		$result[6] =substr($string,82,9);//6          최초연체금액          N          9          91          
		$result[7] =substr($string,91,8);//7          연체기산일자          AN          8          99          
		$result[8] =substr($string,99,9);//8          연체금액          N          9          108          
		$result[9] =substr($string,108,8);//9          연체상환일자          AN          8          116          
		$result[10] =substr($string,116,9);//10          상환금액          N          9          125          



        return $result;      

	}
	/*
	CREATE TABLE div_029 (
	  id int(11) NOT NULL AUTO_INCREMENT,
	  savekey varchar(20) NOT NULL DEFAULT '',
	  segment varchar(3) NOT NULL DEFAULT '',
	  office varchar(30) NOT NULL DEFAULT '',
	  mngoffice varchar(40) NOT NULL DEFAULT '',
	  dealcode varchar(1) NOT NULL DEFAULT '',
	  firstlatedate varchar(8) NOT NULL DEFAULT '',
	  firstlateamt varchar(9) NOT NULL DEFAULT '',
	  latedate varchar(8) NOT NULL DEFAULT '',
	  lateamt varchar(9) NOT NULL DEFAULT '',
	  latereturndate varchar(8) NOT NULL DEFAULT '',
	  returnamt varchar(9) NOT NULL DEFAULT '',
	  e_datetime datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  PRIMARY KEY (`id`)
	) 
	*/


	function div_031($string){

        


        return $result;      

	}

	function div_032($string){

        $result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =hangle_pad(substr($string,3,30),30,'');//2          기관명          AN          30          33          
		$result[3] =hangle_pad(substr($string,33,40),40,'');//3          관리점명          AN          40          73          
		$result[4] =substr($string,73,8);//4          발생일자          AN          8          81          
		$result[5] =substr($string,81,9);//5          등록금액          N          9          90          
		$result[6] =substr($string,90,9);//6          연체금액          N          9          99          
		$result[7] =substr($string,99,8);//7          해제일자          AN          8          107          
		$result[8] =substr($string,107,2);//8          해제구분 코드          AN          2          109          
		$result[9] =substr($string,109,4);//9          등록사유 코드          AN          4          113          

        return $result;      

	}
	/*
	CREATE TABLE div_032 (
	  id int(11) NOT NULL AUTO_INCREMENT,
	  savekey varchar(20) NOT NULL DEFAULT '',
	  segment varchar(3) NOT NULL DEFAULT '',
	  office varchar(30) NOT NULL DEFAULT '',
	  mngoffice varchar(40) NOT NULL DEFAULT '',
	  sdate varchar(8) NOT NULL DEFAULT '',
	  regamt varchar(9) NOT NULL DEFAULT '',
	  lateamt varchar(9) NOT NULL DEFAULT '',
	  latedate varchar(8) NOT NULL DEFAULT '',
	  solvecode varchar(2) NOT NULL DEFAULT '',
	  regsayou varchar(4) NOT NULL DEFAULT '',
	  e_datetime datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  PRIMARY KEY (`id`)
	) 
	*/

	function div_033($string){

        $result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =hangle_pad(substr($string,3,30),30,'');//2          기관명          AN          30          33          
		$result[3] =substr($string,33,8);//3          발생일자          AN          8          41          
		$result[4] =substr($string,41,9);//4          등록금액          N          9          50          
		$result[5] =substr($string,50,9);//5          연체금액          N          9          59          
		$result[6] =substr($string,59,8);//6          상환일자          AN          8          67          
		$result[7] =substr($string,67,9);//7          상환금액          N          9          76          
		$result[8] =substr($string,76,4);//8          등록사유 코드          AN          4          80          



        return $result;      

	}
	/*
	CREATE TABLE div_033 (
	  id int(11) NOT NULL AUTO_INCREMENT,
	  savekey varchar(20) NOT NULL DEFAULT '',
	  segment varchar(3) NOT NULL DEFAULT '',
	  office varchar(30) NOT NULL DEFAULT '',
	  sdate varchar(8) NOT NULL DEFAULT '',
	  regamt varchar(9) NOT NULL DEFAULT '',
	  lateamt varchar(9) NOT NULL DEFAULT '',
	  returndate varchar(8) NOT NULL DEFAULT '',
	  returnamt varchar(9) NOT NULL DEFAULT '',
	  regsayou varchar(4) NOT NULL DEFAULT '',
	  e_datetime datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  PRIMARY KEY (`id`)
	) 
	*/

	function div_035($string){

        $result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =substr($string,3,2);//2          자료구분코드          AN          2          5          
		$result[3] =hangle_pad(substr($string,5,30),30,'');//3          기관명          AN          30          35          
		$result[4] =hangle_pad(substr($string,35,40),40,'');//4          관리점명          AN          40          75          
		$result[5] =substr($string,75,8);//5          발생일자          AN          8          83          
		$result[6] =substr($string,83,9);//6          등록금액          N          9          92          
		$result[7] =substr($string,92,9);//7          연체금액          N          9          101          
		$result[8] =substr($string,101,8);//8          해제일자          AN          8          109          
		$result[9] =substr($string,109,2);//9          해제구분코드          AN          2          111          
		$result[10] =substr($string,111,4);//10          등록사유코드          AN          4          115    


        return $result;      

	}
	/*
	CREATE TABLE div_035 (
	  id int(11) NOT NULL AUTO_INCREMENT,
	  savekey varchar(20) NOT NULL DEFAULT '',
	  segment varchar(3) NOT NULL DEFAULT '',
	  office varchar(30) NOT NULL DEFAULT '',
	  mngoffice varchar(40) NOT NULL DEFAULT '',
	  sdate varchar(8) NOT NULL DEFAULT '',
	  regamt varchar(9) NOT NULL DEFAULT '',
	  lateamt varchar(9) NOT NULL DEFAULT '',
	  latedate varchar(8) NOT NULL DEFAULT '',
	  solvecode varchar(2) NOT NULL DEFAULT '',
	  regsayou varchar(4) NOT NULL DEFAULT '',
	  e_datetime datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  PRIMARY KEY (`id`)
	) 
	*/

	function div_036($string){

        $result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =hangle_pad(substr($string,3,30),30,'');//2          기관명          AN          30          33          
		$result[3] =substr($string,33,8);//3          발생일자          AN          8          41          
		$result[4] =substr($string,41,8);//4          변동일자          AN          8          49          
		$result[5] =substr($string,49,9);//5          금액          N          9          58          



        return $result;      

	}
	/*
	CREATE TABLE div_036 (
	  id int(11) NOT NULL AUTO_INCREMENT,
	  savekey varchar(20) NOT NULL DEFAULT '',
	  segment varchar(3) NOT NULL DEFAULT '',
	  office varchar(30) NOT NULL DEFAULT '',
	  sdate varchar(8) NOT NULL DEFAULT '',	  
	  changedate varchar(8) NOT NULL DEFAULT '',
      amount varchar(9) NOT NULL DEFAULT '',
	  e_datetime datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  PRIMARY KEY (`id`)
	) 
	*/

	function div_037($string){

        $result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =hangle_pad(substr($string,3,30),30,'');//2          기관명          AN          30          33          
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
	/*
	CREATE TABLE div_037 (
	  id int(11) NOT NULL AUTO_INCREMENT,
	  savekey varchar(20) NOT NULL DEFAULT '',
	  segment varchar(3) NOT NULL DEFAULT '',
	  office varchar(30) NOT NULL DEFAULT '',
	  guranoffice varchar(50) NOT NULL DEFAULT '',	
	  gurankindcode varchar(1) NOT NULL DEFAULT '',	
	  gurandate varchar(8) NOT NULL DEFAULT '',	
	  guranmaxamt varchar(9) NOT NULL DEFAULT '',	
	  guranabamt varchar(9) NOT NULL DEFAULT '',
	  solvedate varchar(8) NOT NULL DEFAULT '',
	  solvecode varchar(2) NOT NULL DEFAULT '',
	  credityn varchar(1) NOT NULL DEFAULT '',
	  damboyn varchar(1) NOT NULL DEFAULT '',
	  gurantoryn varchar(1) NOT NULL DEFAULT '',
	  jigupchungguyn varchar(1) NOT NULL DEFAULT '',
	  e_datetime datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  PRIMARY KEY (`id`)
	) 
	*/


	function div_038($string){

        $result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =hangle_pad(substr($string,3,30),30,'');//2          기관명          AN          30          33          
		$result[3] =substr($string,33,2);//3          보증종류 코드          AN          2          35          
		$result[4] =substr($string,35,8);//4          보증약정일자          AN          8          43          
		$result[5] =substr($string,43,9);//5          보증한도금액          N          9          52          
		$result[6] =substr($string,52,9);//6          보증대상금액          N          9          61          

        return $result;      

	}
	/*
	CREATE TABLE div_038 (
	  id int(11) NOT NULL AUTO_INCREMENT,
	  savekey varchar(20) NOT NULL DEFAULT '',
	  segment varchar(3) NOT NULL DEFAULT '',
	  office varchar(30) NOT NULL DEFAULT '',
	  gurankindcode varchar(2) NOT NULL DEFAULT '',	
	  gurandate varchar(8) NOT NULL DEFAULT '',	
	  guranamt varchar(9) NOT NULL DEFAULT '',	
	  guranabamt varchar(9) NOT NULL DEFAULT '',	
	  e_datetime datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  PRIMARY KEY (`id`)
	) 
	*/


	function div_039($string){

        $result[1] =substr($string,0,3);//1          Segment ID          AN          3          3          
		$result[2] =substr($string,3,5);//2          직업코드          AN          5          8          
		$result[3] =hangle_pad(substr($string,8,30),30,'');//3          직업명          AN          30          38          
		$result[4] =substr($string,38,8);//4          신청일자          AN          8          46          
		$result[5] =substr($string,46,9);//5          회복지원통보일자          AN          9          55          
		$result[6] =substr($string,55,9);//6          조정후최종채무액          N          9          64          
		$result[7] =substr($string,64,9);//7          변제후잔존채무액          N          9          73          

        return $result;      

	}
	/*
	CREATE TABLE div_039 (
	  id int(11) NOT NULL AUTO_INCREMENT,
	  savekey varchar(20) NOT NULL DEFAULT '',
	  segment varchar(3) NOT NULL DEFAULT '',
	  jobcode varchar(5) NOT NULL DEFAULT '',
	  jobname varchar(30) NOT NULL DEFAULT '',	
	  appdate varchar(8) NOT NULL DEFAULT '',	
	  recovdate varchar(9) NOT NULL DEFAULT '',	
	  modifylastamt varchar(9) NOT NULL DEFAULT '',	
	  afteramt varchar(9) NOT NULL DEFAULT '',	
	  e_datetime datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  PRIMARY KEY (`id`)
	) 
	*/

	function div_103($string){

        $result[1] =substr($string,0,3);//1          Segment ID('103')           AN                   3          3          
		$result[2] =substr($string,3,9);//2          CPS코드          AN          9          12          
		$result[3] =substr($string,12,9);//3          CPS결과값           AN                   9          21     


        return $result;      

	}
	/*
	CREATE TABLE div_103 (
	  id int(11) NOT NULL AUTO_INCREMENT,
	  savekey varchar(20) NOT NULL DEFAULT '',
	  segment varchar(3) NOT NULL DEFAULT '',
	  cpscode varchar(9) NOT NULL DEFAULT '',
	  cpsresult varchar(9) NOT NULL DEFAULT '',	  	  
	  e_datetime datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  PRIMARY KEY (`id`)
	) 
	*/


?> 