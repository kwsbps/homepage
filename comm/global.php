<?php

$EXEC_PATH_NAME	= "/home/30cut/src/HsjClient";
$SERVER_IP			=	"219.255.136.242";
$CREDIT_REAL_PORT	=	"43300";	//리얼  
$CREDIT_TEST_PORT	=	"43300";	//테스트
$ASP_REAL_PORT		=	"43300";	    //리얼  
$ASP_TEST_PORT		=	"43300";	    //테스트
$LOG_DIR			=	"/home/30cut/log/";

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

?>
