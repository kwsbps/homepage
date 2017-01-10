<?
function getCrypt($str, $opt = "E") {
	$from = "L2inoEvtwDTqaCgJfk0sGuyRBH3KFSrb7jOY9Pzl5VdZU8pAI4mxhN16XQMceW";
	$to = "NTpeGxviCjhyASZJqdkOb3WXc0r58VanFstgMRPY2uB1z7w4KfLED9oQ6UHIlm";

	if ($opt == "E") {
		$str = base64_encode($str);
		$str = strtr($str, $from, $to);
	} else {
		$str = strtr($str, $to, $from);
		$str = base64_decode($str);
	}
	return $str;
}

function getCrypt2($str) {
	$tmp = explode(".", $_SERVER[REMOTE_ADDR]);
	$str = md5($tmp[3] . $str . $tmp[0]);
	return $str;
}

function funcFilter($filter)
{

	$filter=htmlspecialchars($filter); 

	$filter=strip_tags($filter);

	$filter=addslashes($filter);


	return $filter;
}

function config_query($category, $pg_conn="") {
	if (!$pg_conn) {
		$pg_conn = pg_connect("host=58.229.234.53 user=postgres dbname=metroerp");
	}
	$result = pg_query($pg_conn, "select category, no, case when account_no is null or account_no = '' then title else title||'-'||account_no end title from config_value where save_status='Y' and category in (".$category.") order by order_no ");
	while ($v = pg_fetch_array($result)) {
		$config_array[$v[category]][$v[no]] = $v[no] . "." . $v[title];
	}
	return $config_array;
}

function config_query_ups($category, $pg_conn="") {
	if (!$pg_conn) {
		$pg_conn = pg_connect("host=58.229.234.53 user=postgres dbname=ups");
	}
	$result = pg_query($pg_conn, "select category, no, title from config_value where save_status='Y' and category in (".$category.") order by order_no ");
	while ($v = pg_fetch_array($result)) {
		$config_array[$v[category]][$v[no]] = $v[no] . "." . $v[title];
	}
	return $config_array;
}

function config_query_ups_new($category, $pg_conn="") {
	if (!$pg_conn) {
		$pg_conn = pg_connect("host=58.229.234.53 user=postgres dbname=ups");
	}
	$result = pg_query($pg_conn, "select category, no, title from config_value where  category in (".$category.") order by order_no ");
	while ($v = pg_fetch_array($result)) {
		$config_array[$v[category]][$v[no]] = $v[no] . "." . $v[title];
	}
	return $config_array;
}

function config_marquee($category, $pg_conn="") {
	if (!$pg_conn) {
		$pg_conn = pg_connect("host=58.229.234.53 user=postgres dbname=ups");
	}

	$result = pg_query($pg_conn, "select category, no, title from config_value where save_status='Y' and category in (".$category.") order by order_no ");
	while ($v = pg_fetch_array($result)) {
		$config_array[$v[category]][] = $v[no] . "." . $v[title];
	}
	return $config_array;
}

function permit_check($my_type, $alllow_type) {
	if (!$my_type) {
		//alert_back("접근권한이 없는페이지입니다.");
		//exit;
	}

	if (!substr_count($alllow_type, $my_type)) {
		//alert_back("접근권한이 없는페이지입니다.");
		//exit;
	}
}
function alert_target_move($url,$msg) {
	echo "<script> alert('".$msg."'); </script>";
	echo "<meta http-equiv='Refresh' content='0; url=".$url."'>";
}

function url_move($url) {
	echo "<meta http-equiv='Refresh' content='0; url=" . $url . "'>";
}

function alert_back($msg) {
	echo "<script> alert('".$msg."'); history.go(-1); </script>";
}

function alert_test($msg) {
	echo "<script> alert('".$msg."'); history.go(-1); </script>";
	f.note.value == '<?=$note?>';
}

function cut($string,$limit_length) {
	$string_length = strlen($string);
	if ($limit_length <= $string_length) {		

		$string = mb_substr($string,0,$limit_length,'UTF-8');
		$han_char = 0;
		for($i = $limit_length-1; $i>=0; $i--)
		{
			$lastword = ord(mb_substr($string,$i,1,'UTF-8'));
			if(127 > $lastword) break;
			else $han_char++;
		}
	}
	if ($han_char % 2 == 1) {
		$string = substr($string,0,$limit_length-1);
		$string = $string . "..";
	}
	return $string;
}


function print_order($f) {
	global $order_field, $order_type;
	if ($f == $order_field) {
		$print_type = ( $order_type == "asc" || $order_type == "ASC" )  ? "↑" : "↓" ;
		echo "$print_type";
	}
}

function print_order2($f) {
	global $order_field, $order_type;
	if ($f == $order_field) {
		$print_type = ( $order_type == "asc" || $order_type == "ASC" )  ? "↑" : "↓" ;
		return "$print_type";
	}
}

function print_option_with_select($arr, $ob_name="", $combo_bg_style="style='background:#d3d3d3'") {
	if ($arr) {
		foreach($arr as $key => $val) {
			$val = trim($val);
			if($ob_name!="") {
				echo "<option value='$key'";
				is_select($ob_name, $key);
				echo " $combo_bg_style>$val</option>";
			} else {
				echo("<option value='$key' $combo_bg_style> $val </option>");
			}
		}
	}
}

function print_option_with_select_ex($arr, $exval, $ob_name="", $combo_bg_style="style='background:#d3d3d3'") {
	if ($arr) {
		foreach($arr as $key => $val) {
			$val=trim($val);
			if ($key != $exval) {
				if ($ob_name != "") {
					echo "<option value='$key'";
					is_select($ob_name, $key);
					echo " $combo_bg_style>$val</option>";
				} else {
					echo("<option value='$key' $combo_bg_style> $val </option>");
				}
			}
		}
	}
}

function IconvArr ($ar, $f='EUC-KR', $t='UTF-8') { 
    foreach($ar as &$v) { $v = iconv($f, $t, $v); } 
    return $ar; 
}

function is_select($c1, $c2) {
	if(!strcmp($c1, $c2)) echo " selected ";
}

function is_check($c1, $c2) {
	if(!strcmp($c1, $c2)) echo " checked ";
}

class pageClass {
	var $ROWS_PER_PAGE = 10;
	var $PAGE_MOVE_NUM_LIMIT = 20;
	var $START_LINE;
	var $PAGE_MOVE_START_NUM;
	var $PAGE_MOVE_END_NUM;
	var $PAGENUM;
	var $TOTAL;
	var $PAGE_STRING;

	function startPage($pagenum) {
		$v_que_find_count = $this->TOTAL;
		if ($pagenum <= 0 ) $pagenum = 1 ;

		$this->PAGE_MOVE_START_NUM = ceil($pagenum - $this->PAGE_MOVE_NUM_LIMIT / 2);
		if ($this->PAGE_MOVE_START_NUM<=0) $this->PAGE_MOVE_START_NUM = 1;

		if ($this->PAGE_MOVE_START_NUM > ceil($v_que_find_count / $this->ROWS_PER_PAGE)  ) {
			$this->PAGE_MOVE_END_NUM = ceil($v_que_find_count/ $this->ROWS_PER_PAGE);
			$this->PAGE_MOVE_START_NUM =  $this->PAGE_MOVE_END_NUM - $this->PAGE_MOVE_NUM_LIMIT;
			if ($this->PAGE_MOVE_START_NUM <= 0) $this->PAGE_MOVE_START_NUM = 1;
			$pagenum = $this->PAGE_MOVE_END_NUM;
		} else {
			$this->PAGE_MOVE_END_NUM = $this->PAGE_MOVE_START_NUM + $this->PAGE_MOVE_NUM_LIMIT -1 ;

			if($this->PAGE_MOVE_END_NUM > ceil($v_que_find_count / $this->ROWS_PER_PAGE)) {
				$this->PAGE_MOVE_END_NUM = ceil($v_que_find_count / $this->ROWS_PER_PAGE)  ;
			}
		}

		$start_row_num = ($pagenum-1) * $this->ROWS_PER_PAGE;
		$this->START_LINE = ($start_row_num>0) ? $start_row_num : 0;
		$this->PAGENUM = $pagenum;
		$this->pageString();
	}

	function pageString() {
		for ($j = $this->PAGE_MOVE_START_NUM;$j <= $this->PAGE_MOVE_END_NUM;$j++) {
			if ($this->PAGENUM == $j) {
				$pageStringElementOne .= "&nbsp;<a href=\"javascript:page_move($j);\"><b>$j</b></a>";
			} else {
				$pageStringElementOne .= "&nbsp;[<a href=\"javascript:page_move($j);\">$j</a>]";
			}
		}

		$page_move_before_num = $this->PAGENUM - $this->PAGE_MOVE_NUM_LIMIT ;
		$page_move_next_num = $this->PAGENUM + $this->PAGE_MOVE_NUM_LIMIT;
		$pageStringElementTwo = "&nbsp;[<a href=javascript:page_move($page_move_before_num);>이전</a>]&nbsp;[<a href=javascript:page_move($page_move_next_num);>다음</a>] ";

		$img_pre = "<img src='http://ups.pay-save.com/erp_root/img/top/pre.gif' style='height:14; cursor:hand;' border='0' align='center' alt='이전' title='이전'>";

		$img_next = "<img src='http://ups.pay-save.com/erp_root/img/top/next.gif' style='height:14; cursor:hand;' border='0' align='center' alt='다음' title='다음'>";
		
		$pageStringElementTwo = "&nbsp;<a href=javascript:page_move($page_move_before_num);>".$img_pre."</a>&nbsp;&nbsp;<a href=javascript:page_move($page_move_next_num);>".$img_next."</a> ";
		

		$this->PAGE_STRING = $pageStringElementOne . $pageStringElementTwo;
	}
}

function window_action($type) {
	switch ($type) {
		case "mother_submit_close":
				$echo_string="
				window.opener.document.forms[0].submit();
				window.close();
				";
				break;
		case "mother_submit_parent_close":
				$echo_string="
				parent.opener.document.forms[0].submit();
				parent.close();
				";
				break;
		case "close":
				$echo_string = "window.close();";
				break;
		case "mother_submit":
				$echo_string="window.opener.document.forms[0].submit();";
				break;
		case "mother_submit_parent":
				$echo_string="parent.opener.document.forms[0].submit();";
				break;
		case "mother_reload":
				$echo_string="opener.location.reload();
				window.close();
				";
				break;
	}
	echo "
	<SCRIPT LANGUAGE=\"JavaScript\">
	<!--
		$echo_string
	//-->
	</SCRIPT>
	";
}

function alert($msg) {
	echo "<script> alert('".$msg."'); </script>";
}

function alert_close($msg) {
	echo "<script> alert('".$msg."'); window.close(); </script>";
}

function date_term($s_date, $e_date) {
	$s_time=date2unixtime($s_date);
	$e_time=date2unixtime($e_date);
	return intval(($e_time-$s_time)/(60*60*24));
}

function date2unixtime($date) {
	if (strlen($date) == 6) {
		$yr = substr($date, 0, 2);
		$mo = substr($date, 2, 2);
		$da = substr($date, 4, 2);
	} else {
		$pattern = "[/.-]"; 
		//list ($yr, $mo, $da) = split ('[/.-]', $date);
		//list ($yr, $mo, $da) = preg_split('[/.-]', $date);

		if(strpos($date, "/")){
			list ($yr, $mo, $da) = explode ('/', $date);
		}else{
			list ($yr, $mo, $da) = preg_split('/[-,.]/', $date);
		}
	}  
	return @mktime(0,0,0, $mo, $da, $yr);
}

function get_myname($id) {
	$sql  = "select name from member ";
	$sql .= "where id = '" . $id . "' ";
	$result = pg_exec($sql);
	if ($v = pg_fetch_array($result)) {
	} else {
		$v[name] = 'SYSTEM';
	}

	return $v[name];
}

function selected_box($box1, $box2, $string) {
	return ($box1==$box2) ? "<font color=red>".$string."</font>" : $string ;
}

function number_format_color($i) {
	$i = str_replace(",","",$i);
	if ($i<0) {
		$i*=-1;
		return "<font color=red>".number_format($i)."</font>";
	} else {
		return number_format($i);
	}
}

function number_format_sosu($i, $pos=2) {
	$tmp = explode(".", round($i, $pos));

	return ($tmp[1]) ? number_format($tmp[0]).".".$tmp[1] : number_format($tmp[0]);
}

function change_date_format($date) {
	if (!ereg("^[0-9]{4}-[0-9]{2}-[0-9]{2}$", $date)) {
		return false;
	}

	$ymd = explode("-", $date);
	return $ymd[0]."년 ".($ymd[1]*1)."월 ".($ymd[2]*1)."일";
}

function get_mybranch($id) {
	$sql = "select branch_code from member where id='$id'";
	$temp_branch=pg_exec($sql);
	$v = pg_fetch_array($temp_branch);
	return $v[branch_code];
}

function add_year($today, $year) {
	$ymd = explode("-", $today);
	$ymd[0] += $year;

	$today = date("Y-m-d", mktime(0, 0, 0, $ymd[1], $ymd[2], $ymd[0]) - 86400);
	return $today;
}

function add_month($today, $month) {
	$ymd = explode("-", $today);
	for ($i = 1;$i <= $month;$i++) {
		$ymd[1]++;
		if ($ymd[1] == 13) {
			$ymd[0] += 1;
			$ymd[1] = "01";
		}
	}
	$today = date("Y-m-d", mktime(0, 0, 0, $ymd[1], $ymd[2], $ymd[0]) - 86400);
	return $today;
}

function minus_month($today, $month) {
	$ymd = explode("-", $today);
	for ($i = 1;$i <= $month;$i++) {
		$ymd[1]--;
		if ($ymd[1] == 13) {
			$ymd[0] -= 1;
			$ymd[1] = "01";
		}
	}
	$today = date("Y-m-d", mktime(0, 0, 0, $ymd[1], $ymd[2], $ymd[0]) - 86400);
	return $today;
}

function date2unixtime2($date,$hour,$min) {
  if(strlen($date) == 6) {
	 $yr = substr($date, 0, 2);
	 $mo = substr($date, 2, 2);
	 $da = substr($date, 4, 2);
  }
  else
	 list ($yr, $mo, $da) = split ('[/.-]', $date);

  return mktime($hour,$min,0, $mo, $da, $yr);
}

function date2unixtimeE($date){

  if(!$date){
	  return "";
  }else if(strlen($date) == 6){

	 $yr = substr($date, 0, 2);
	 $mo = substr($date, 2, 2);
	 $da = substr($date, 4, 2);
  }
  else
	 list ($yr, $mo, $da) = split ('[/.-]', $date);

  return mktime(23,59,59, $mo, $da, $yr);
}

function table_sum(&$sum, $v) {
	foreach( $v as $key => $value ) {
		if(is_numeric($value)) {
			$sum[$key]+= $value;
		}
	}
}

function get_hot_key() {
	$file = "/home/jumbo_system/importantShare/HOT_KEY";
	$text = file($file);
	$hot_key = explode("-", $text[0]);

	unset($array_ip);   //송암타워(3)층
	for ($i = 65;$i <= 126;$i++) $array_ip[] = "110.92.255." . $i;
	if (in_array($_SERVER[REMOTE_ADDR], $array_ip)) $v[0] = trim($hot_key[0]);

	unset($array_ip);   //송암타워(3)층
	for ($i = 1;$i <= 254;$i++) $array_ip[] = "172.16.1." . $i;
	if (in_array($_SERVER[REMOTE_ADDR], $array_ip)) $v[0] = trim($hot_key[0]);

	unset($array_ip);   //구로지점
	for ($i = 193;$i <= 254;$i++) $array_ip[] = "112.214.39." . $i;
	if (in_array($_SERVER[REMOTE_ADDR], $array_ip)) $v[0] = trim($hot_key[1]);

	unset($array_ip);   //구로지점
	for ($i = 1;$i <= 254;$i++) $array_ip[] = "172.16.3." . $i;
	if (in_array($_SERVER[REMOTE_ADDR], $array_ip)) $v[0] = trim($hot_key[1]);

	unset($array_ip);   //장안동지점
	for ($i = 10;$i <= 89;$i++) $array_ip[] = "124.197.210." . $i;
	if (in_array($_SERVER[REMOTE_ADDR], $array_ip)) $v[0] = trim($hot_key[2]);

	unset($array_ip);   //장안동지점
	for ($i = 1;$i <= 254;$i++) $array_ip[] = "172.16.11." . $i;
	if (in_array($_SERVER[REMOTE_ADDR], $array_ip)) $v[0] = trim($hot_key[2]);

	unset($array_ip);   //부산지점
	for ($i = 1;$i <= 61;$i++) $array_ip[] = "61.100.242." . $i;
	if (in_array($_SERVER[REMOTE_ADDR], $array_ip)) $v[0] = trim($hot_key[3]);

	unset($array_ip);   //부산지점
	for ($i = 1;$i <= 254;$i++) $array_ip[] = "172.16.6." . $i;
	if (in_array($_SERVER[REMOTE_ADDR], $array_ip)) $v[0] = trim($hot_key[3]);

	unset($array_ip);   //대구지점
	for ($i = 1;$i <= 62;$i++) $array_ip[] = "27.118.105." . $i;	
	if (in_array($_SERVER[REMOTE_ADDR], $array_ip)) $v[0] = trim($hot_key[4]);

	unset($array_ip);   //대구지점
	for ($i = 1;$i <= 254;$i++) $array_ip[] = "172.16.8." . $i;	
	if (in_array($_SERVER[REMOTE_ADDR], $array_ip)) $v[0] = trim($hot_key[4]);

	unset($array_ip);   //광주지점
	for ($i = 1;$i <= 63;$i++) $array_ip[] = "211.235.194." . $i;
	if (in_array($_SERVER[REMOTE_ADDR], $array_ip)) $v[0] = trim($hot_key[5]);

	unset($array_ip);   //광주지점
	for ($i = 1;$i <= 254;$i++) $array_ip[] = "172.16.9." . $i;
	if (in_array($_SERVER[REMOTE_ADDR], $array_ip)) $v[0] = trim($hot_key[5]);

	unset($array_ip);   //윤재철pc
	for ($i = 0;$i < 1;$i++) $array_ip[] = "172.16.1.2";
	if (in_array($_SERVER[REMOTE_ADDR], $array_ip)) $v[0] = trim($hot_key[6]);

	unset($array_ip);   //김원석pc
	for ($i = 0;$i < 1;$i++) $array_ip[] = "172.16.1.3";
	if (in_array($_SERVER[REMOTE_ADDR], $array_ip)) $v[0] = trim($hot_key[7]);

	unset($array_ip);   //이경미pc
	for ($i = 0;$i < 1;$i++) $array_ip[] = "172.16.1.4";
	if (in_array($_SERVER[REMOTE_ADDR], $array_ip)) $v[0] = trim($hot_key[8]);

	unset($array_ip);   //이승준pc
	for ($i = 0;$i < 1;$i++) $array_ip[] = "172.16.1.10";
	if (in_array($_SERVER[REMOTE_ADDR], $array_ip)) $v[0] = trim($hot_key[9]);

	unset($array_ip);   //류기하pc
	for ($i = 0;$i < 1;$i++) $array_ip[] = "172.16.1.59";
	if (in_array($_SERVER[REMOTE_ADDR], $array_ip)) $v[0] = trim($hot_key[10]);

	return $v[0];
}

function metro_sms($worker_id, $branch_code, $branch_addr, $branch_tel, $member_list_no, $contract_info_no, $to, $from, $msg, $sms_div, $sms_code, $tran_date, $type, $amou, $sigak, $pg_conn, $pg_sms, $my_sms) {

	$hour = substr($tran_date, 11, 2);
	if (date("Hi") < '0830' || date("Hi") > '2030') exit;
	if ($hour < '08' || $hour >= '21') exit;

	if (strlen($sms_code) > 0) {
		$preset = "Y";
	} else {
		$preset = "";
	}
	if (!$contract_info_no) $contract_info_no = 'NULL';
	if (!$member_list_no) $member_list_no = 'NULL';

	$pos_a = strpos($msg, "[팀장]");
	$pos_b = strpos($msg, "[계약일]");
	$pos_c = strpos($msg, "[만기일]");

	if ($member_list_no == '192365') {		
		if (strpos($msg,"초과입금분") !== false) {
			exit;
		}
	}

	if ($pos_a >= 1) {
		$sql_99  = "select name from member ";
		$sql_99 .= "where branch_code = '$branch_code' ";
		$sql_99 .= "and member_respons = 'B' ";
		$sql_99 .= "and save_status = 'Y' ";
		$rel_99 = pg_query($pg_conn, $sql_99);
		if ($val_99 = pg_fetch_array($rel_99)) {
			$team_jang = $val_99[name] . "팀장";
		} else {
			$team_jang = '';
		}
	} else {
		$team_jang = '';
	}

	if ($pos_b >= 1) {
		$sql_99  = "select contract_date from contract_info ";
		$sql_99 .= "where no = '$contract_info_no' ";		
		$sql_99 .= "and save_status = 'Y' ";
		$rel_99 = pg_query($pg_conn, $sql_99);
		if ($val_99 = pg_fetch_array($rel_99)) {
			$contract_date = date("Y년 m월 d일",strtotime($val_99[contract_date]));
		} else {
			$contract_date = '';
		}
	} else {
		$contract_date = '';
	}

	if ($pos_c >= 1) {
		$sql_99  = "select contract_date_e from contract_info ";
		$sql_99 .= "where no = '$contract_info_no' ";		
		$sql_99 .= "and save_status = 'Y' ";
		$rel_99 = pg_query($pg_conn, $sql_99);
		if ($val_99 = pg_fetch_array($rel_99)) {
			$contract_date_e = date("Y년 m월 d일",strtotime($val_99[contract_date_e]));
		} else {
			$contract_date_e = '';
		}
	} else {
		$contract_date_e = '';
	}

	if($member_list_no > 0 ){
	$sql_7  = "select agree_ok_reg_memo from member_list ";
	$sql_7 .= "where no = '$member_list_no' and save_status ='Y' ";
	$result_7 = @pg_query($pg_conn,$sql_7) or die("등기번호 에러");
	while($v_7 = pg_fetch_array($result_7)) {
		if($v_7[agree_ok_reg_memo]){
			$reg_memo = trim($v_7[agree_ok_reg_memo]);
		}else{
			$reg_memo = trim($v_7[agree_ok_reg_memo]);
		}
	}
	}

	if ($type == "C") {
		$msg = new_msg_parse($msg, $contract_info_no, $branch_addr, $branch_tel, $type, $amou, $sigak, $pg_sms, $team_jang, $reg_memo, $contract_date, $contract_date_e);
	} else if ($type == "M") {
		$msg = new_msg_parse($msg, $member_list_no, $branch_addr, $branch_tel, $type, $amou, $sigak, $pg_sms, $team_jang, $reg_memo, $contract_date, $contract_date_e);
	} else {
		$msg = $msg;
	}

	$to = $to;
	$from = $from;
	$save_time = time();

	$sql_log = "insert into sms_".date("Ym")." ( worker_id , save_time, member_list_no, contract_info_no, sms_cat_no, send_time, send_phone, receive_phone, message,  success_flag, preset,sms_div,branch_code ) values('".$worker_id."','".$save_time."',".$member_list_no.", ".$contract_info_no.", '0', '".$save_time."' ,'".$from."', '".$to."', '".$msg."','N', '".$preset."','".$sms_div."','".$branch_code."' )";
	$result_log =pg_query($pg_sms, $sql_log);

	if (!$result_log) { 		
		$alert_msg = "SMS를 보낼수 없습니다. 관리자에게 문의하세요.".$sql_log; 	 
	}

	$v222 = pg_fetch_array(pg_query($pg_sms, "select currval('sms_".date("Ym")."_no_seq')"));
	$key=$v222[0];		
		
	
	$tran_id="KJI";	
	

	$sql_insert="	insert into sms.em_tran(tran_date, tran_phone, tran_callback, tran_status,tran_msg, tran_id,tran_refkey,tran_etc1,tran_type) Values ('$tran_date','$to','$from','1','$msg','$tran_id','$key','N','4')";
	mysql_query("set character set euckr",$my_sms);
	$result = mysql_query($sql_insert,$my_sms) or die($$sql_insert);

	if ($result) {
		$alert_msg = "정상적으로 전송되었습니다.";
	} else {
		$alert_msg = "통신문제로 정상 발송이 되지 않았습니다. 관리자에게 문의하세요.".$sql_insert;
	}
	
	if ($member_list_no) {
		//if ($to != '01089278755') {
			$table_name = "communication_" . substr($member_list_no, strlen($member_list_no)-2, 2);
			$posmsg = strpos($msg, "초과납입");
			$posmsg2 = strpos($msg, "초과입금분");
			if ($posmsg > 0 || $posmsg2 > 0) {
				$memo_sql  = "insert into ".$table_name." ( ";
				$memo_sql .= "worker_id, member_list_no, contract_info_no, note, save_status ,save_time,type) values(";
				$memo_sql .= "'".$worker_id."', $member_list_no, $contract_info_no, '[sms] ".$msg."', 'Y' ,".time();
				$memo_sql .= ",'6_1')";
			} else {
				$memo_sql  = "insert into ".$table_name." ( ";
				$memo_sql .= "worker_id, member_list_no, contract_info_no, note, save_status ,save_time) values(";
				$memo_sql .= "'".$worker_id."', $member_list_no, $contract_info_no, '[sms] ".$msg."', 'Y' ,".time();
				$memo_sql .= ")";
			}
			pg_query($pg_conn, $memo_sql);
		//}
	}	
	return $alert_msg;
}

function ups_sms($worker_id, $counsel, $name, $member_list_no, $to, $from, $msg, $tran_date, $ups, $denyer, $pg_sms, $pg_conn3, $my_sms)
{
//	exit;
	//$tran_date=date("Y-m-d H:i:s");
	$hour=substr($tran_date,11,2);
	if (date("Hi") < '0830' || date("Hi") > '2030') exit;
	if ($hour < '08' || $hour >= '21') exit;

	global $array_total_member;

	if(!$member_list_no) $member_list_no='NULL';
	
	$msg = str_replace("[담당자]", $array_total_member[$worker_id], $msg);
	$msg = str_replace("[이름]", $name, $msg);
	$to =$to; //받는사람
	$from =$from;//보내는사람
	$save_time = time();

	if ($counsel) {
		$add_member[0] = "상담창:$name";
		$add_member[1] = ", member_list_no";
		$add_member[2] = ", $counsel";
	} else if($member_list_no) {
		$add_member[0] = "$name";
		$add_member[1] = ", member_list_no";
		$add_member[2] = ", $member_list_no";
	} else {
		$add_member[0] = "수동입력";
	}

	$sql_log = "insert into ups_sms_".date("Ym")." (name,ph, message,worker_id,insert_time,reserve,success_flag,deny_ups,ups ".$add_member[1].") values('".$add_member[0]."','".$to."','".$msg."', '".$worker_id."', '".$save_time."', '".$tran_date."' ,'N', '".$denyer."' ,'".$ups."' ".$add_member[2].")";
	$result_log = @pg_query($pg_sms,$sql_log);

	if (!$result_log) { 		
		$alert_msg = "SMS를 보낼수 없습니다. 관리자에게 문의하세요.".$sql_log; 	 
	}

	$v222 = pg_fetch_array(pg_query($pg_sms, "select currval('ups_sms_".date("Ym")."_no_seq')"));
	$key=$v222[0];		
	$tran_id="KJI_UPS";	

	$sql_insert = "insert into sms.em_tran(tran_date, tran_phone, tran_callback, tran_status,tran_msg, tran_id,tran_refkey,tran_etc1,tran_type) Values ('$tran_date','$to','$from','1','$msg','$tran_id','$key','N','4')";
	mysql_query("set character set euckr", $my_sms);
	$result = mysql_query($sql_insert, $my_sms) or die($$sql_insert);

	if ($result) {
		$alert_msg = "정상적으로 전송되었습니다.";
	} else {
		$alert_msg = "통신문제로 정상 발송이 되지 않았습니다. 관리자에게 문의하세요.".$sql_insert;
	}
	
	if($member_list_no > 0)
	{
		$sql_action = "insert into communication (member_list_no, note, worker_id, save_time, save_status, title_type) values (";
		$sql_action.= "".$member_list_no.", '[sms]\n".$msg."', '".$worker_id."',".time().",'Y', 'G')";
		pg_query($pg_conn3,$sql_action);
	}
	
	return $alert_msg;
}

//sms모듈 tim
function tim_sms($worker_id,$counsel,$name,$member_list_no,$to,$from,$msg,$tran_date,$tim,$denyer,$app_money,$pg_sms,$pg_conn9,$my_sms)
{
//	exit;
	//$tran_date=date("Y-m-d H:i:s");
	$hour = substr($tran_date,11,2);
	if (date("Hi") < '0830' || date("Hi") > '2030') exit;
	if ($hour < '08' || $hour >= '21') exit;

	global $array_total_member;

	if(!$member_list_no) $member_list_no='NULL';
	//계약별 회원별로 가는 메세지 내용이 달라서 
	
	$msg = str_replace("[담당자]", $array_total_member[$worker_id], $msg);
	$msg = str_replace("[이름]", $name, $msg);
	$msg = str_replace("[신청금액]",number_format($app_money*10000),$msg);

	$to =$to; //받는사람
	$from =$from;//보내는사람
	$save_time = time();
	

	if($counsel)
	{
		$add_member[0] = "상담창:$name";
		$add_member[1] = ", member_list_no";
		$add_member[2] = ", $counsel";
	}
	else if($member_list_no)
	{
		$add_member[0] = "$name";
		$add_member[1] = ", member_list_no";
		$add_member[2] = ", $member_list_no";
	}
	else
	{
		$add_member[0] = "수동입력";
	}

	$sql_log = "insert into tim_sms_".date("Ym")." (name,ph, message,worker_id,insert_time,reserve,success_flag,deny_tim,tim ".$add_member[1].") values('".$add_member[0]."','".$to."','".$msg."', '".$worker_id."', '".$save_time."', '".$tran_date."' ,'N', '".$denyer."' ,'".$tim."' ".$add_member[2].")";
	$result_log = @pg_query($pg_sms,$sql_log);

	if (!$result_log) { 		
		$alert_msg = "SMS를 보낼수 없습니다. 관리자에게 문의하세요.".$sql_log; 	 
	}

	$v222 = pg_fetch_array(pg_query($pg_sms, "select currval('tim_sms_".date("Ym")."_no_seq')"));
	$key=$v222[0];		
		
	
	$tran_id="KJI_TIM";	
	

	$sql_insert="	insert into sms.em_tran(tran_date, tran_phone, tran_callback, tran_status,tran_msg, tran_id,tran_refkey,tran_etc1,tran_type) Values ('$tran_date','$to','$from','1','$msg','$tran_id','$key','N','4')";
	mysql_query("set character set euckr",$my_sms);
	$result = mysql_query($sql_insert,$my_sms) or die($$sql_insert);

	if ($result) {
		$alert_msg = "정상적으로 전송되었습니다.";
	} else {
		$alert_msg = "통신문제로 정상 발송이 되지 않았습니다. 관리자에게 문의하세요.".$sql_insert;
	}

	if ($member_list_no) {
		$sql_action = "insert into tm_communication (tm_member_list_no, note, worker_id, save_time, save_status, title_type) values (";
		$sql_action.= "".$member_list_no.", '[sms]\n".$msg."', '".$worker_id."',".time().",'Y', 'G')";
		pg_query($pg_conn9,$sql_action);
	}
	
	return $alert_msg;
}


//lms모듈 tim
function tim_lms($worker_id,$counsel,$name,$member_list_no, $contract_info_no,$to,$from,$msg,$tran_date,$tim,$denyer,$app_money,$pg_sms,$pg_conn9,$my_sms, $pg_conn, $jijum_number)
{

	$hour = substr($tran_date,11,2);
	if (date("Hi") < '0830' || date("Hi") > '2030') exit;
	if ($hour < '08' || $hour >= '21') exit;
 
	global $array_total_member;

	if(!$member_list_no) $member_list_no='NULL';
	//계약별 회원별로 가는 메세지 내용이 달라서 
	
	$msg = str_replace("[담당자]", $array_total_member[$worker_id], $msg);
	$msg = str_replace("[이름]", $name, $msg);
	$msg = str_replace("[신청금액]",number_format($app_money*10000),$msg);
  $msg = str_replace("(지점번호)", "(".$jijum_number.")", $msg);

	$to =$to; //받는사람
	$from =$from;//보내는사람
	$save_time = time();
	
	if($counsel)
	{
		$add_member[0] = "상담창:$name";
		$add_member[1] = ", member_list_no";
		$add_member[2] = ", $counsel";
	}
	else if($member_list_no)
	{
		$add_member[0] = "$name";
		$add_member[1] = ", member_list_no";
		$add_member[2] = ", $member_list_no";
	}
	else
	{  

		$add_member[0] = "수동입력";
	}
  
	$sql_log = "insert into tim_lms_".date("Ym")." (name,ph, message,worker_id,insert_time,reserve,success_flag,deny_tim,tim ".$add_member[1].") values('".$add_member[0]."','".$to."','".$msg."', '".$worker_id."', '".$save_time."', '".$tran_date."' ,'N', '".$denyer."' ,'".$tim."' ".$add_member[2].")";
	
	$result_log = pg_query($pg_sms,$sql_log);

	if (!$result_log) { 		
		$alert_msg = "SMS를 보낼수 없습니다. 관리자에게 문의하세요.".$sql_log; 	 
	}

	$v222 = pg_fetch_array(pg_query($pg_sms, "select currval('tim_lms_".date("Ym")."_no_seq')"));
	$key=$v222[0];		
	$msg2 = "[SMS]\n개인(신용)정보의 수집 및 이용 동의 문자 발송되었습니다.";	
	
	$tran_id="KJI_TIM";	
	$msg1 = substr($msg,0,250);

	$sql_insert="	insert into msg_queue (msg_type,dstaddr,callback,stat,subject,text,request_time,ext_col0)
	values
	('3','$to','$from','0','[개인(신용)정보의 수집 및 이용 동의]','$msg', sysdate(),'$key')";
  mysql_select_db("sms" , $my_sms);
	mysql_query("set character set euckr",$my_sms);
	$result = mysql_query($sql_insert,$my_sms) or die($$sql_insert);

	if ($result) 
	{
		$alert_msg = "정상적으로 전송되었습니다. 10초가량 소요될 수도 있습니다.";
	}
	else 
	{
		$alert_msg = "통신문제로 정상 발송이 되지 않았습니다. 관리자에게 문의하세요.".$sql_insert;
	}

	if ($member_list_no) {
			$table_name = "communication_" . substr($member_list_no, strlen($member_list_no)-2, 2);
			
				$memo_sql  = "insert into ".$table_name." ( ";
				$memo_sql .= "worker_id, member_list_no, contract_info_no, note, save_status ,save_time) values(";
				$memo_sql .= "'".$worker_id."', $member_list_no, $contract_info_no, '[lms] 보이스피싱 주의', 'Y' ,".time();
				$memo_sql .= ")";

			pg_query($pg_conn, $memo_sql);
	}	
	
	return $alert_msg;
}




function new_msg_parse($msg, $no, $branch_addr, $branch_tel, $type, $amou, $sigak, $pg_sms, $team_jang, $reg_memo, $contract_date, $contract_date_e) {
	global $array_total_member;
	global $pg_conn;
	
	$array_parse_char = Array(
		"[이름]" => "name",
		"[가상계좌]" => "bank",
		"[담당자]" => "manager",
		"[오늘이자]" => "interest",
		"[약정일]" => "contract_day",
		"[총금액]" => "total_money",
		"[월상환금]" => "monthly_return_money",
		"[상환이자]" => "return_date_interest",
		"[입금액]" => "amou",
		"[계번]" => "amou",
		"[등기번호2]" => "amou",
		"[등기번호]" => "reg_memo",
		"[시각]" => "sigak",
		"[납입액]" => "return_money",
		"[납입금액]" => "return_money",
		"[지점주소]" => "branch_addr",
		"[지점번호]" => "branch_tel",
		"[채권관리지점번호]" => "branch_tel",
		"[초과입금액]" => "over_money",
		"[보정기간개시일]" => "return_date_from",
		"[완납금액]"=>"wannap_money",
		"[보증인(1)이름]"=>"name",
		"[보증인(2)이름]"=>"name",
		"[금일]"=>"date_a",
		"[(1)영업일]"=>"date_a",
		"[(2)영업일]"=>"date_a",
		"[(3)영업일]"=>"date_a",
		"[(4)영업일]"=>"date_a",
		"[(5)영업일]"=>"date_a",
		"[(6)영업일]"=>"date_a",
		"[(7)영업일]"=>"date_a",
		"[(8)영업일]"=>"date_a",
		"[(9)영업일]"=>"date_a",
		"[(10)영업일]"=>"date_a",
		"[(11)영업일]"=>"date_a",
		"[(12)영업일]"=>"date_a",
		"[(13)영업일]"=>"date_a",
		"[(14)영업일]"=>"date_a",
		"[(15)영업일]"=>"date_a",
		"[(16)영업일]"=>"date_a",
		"[(17)영업일]"=>"date_a",
		"[(18)영업일]"=>"date_a",
		"[(19)영업일]"=>"date_a",
		"[(20)영업일]"=>"date_a",
		"[팀장]"=>"team_jang",
		"[연체일수]"=>"delay_term",
		"[부족금]"=>"rack_money",
		"[계약일]"=>"contract_date",
		"[만기일]"=>"contract_date_e"

	);
	
	if ($type == "C") {
		$where = "no = " . $no . " ";
	} else if ($type == "M") {
		$where = "member_list_no = " . $no . " ";
	}

	$sql  = "select name, ban_sms,  ";
	$sql .= "no, member_id, interest_sum, contract_day, tail_money, interest_sum, monthly_return_money, ";
	$sql .= "return_date_interest, return_method, bank_name, bank_ssn, paydayloan, first_return_date, ";
	$sql .= "return_date, over_money, name_b01, name_b02, status, member_list_no, ";
	$sql .= "delay_term, rack_money, law_jana ";
	$sql .= "from contract_info_sms ";
	$sql .= "where " . $where . " ";
	$sql .= "and status != 'G' ";
	$sql .= "and bank_name = '우리은행' ";
	$sql .= "order by status, no ";
	//$sql .= "order by no asc, status  ";
	$result = @pg_query($pg_sms,$sql) or die("회원정보 조회 에러");
	while($v = pg_fetch_array($result)) {
		if (strpos($msg, "보증인") === false) {
			$name = $v[name];	
		} elseif (strpos($msg, "보증인(1)이름") > 0) {
			$name = $v[name_b01];	
		} elseif (strpos($msg, "보증인(2)이름") > 0) {
			$name = $v[name_b02];	
		}

		if (!$bank) $bank = $v[bank_name] . $v[bank_ssn];
		$return_date = $v[return_date];
		$over_money = $v[over_money];

		$delay_term = $v[delay_term];
		$rack_money = $v[rack_money];

		$manager = $array_total_member[$v[member_id]];

		if ($v[status] == 'C' || $v[status] == 'D') {
			$interest += $v[monthly_return_money];
		} else {
			$interest += $v[interest_sum];
		}

		if (!$contract_day) $contract_day = $v[contract_day];
		$total_money += $v[tail_money] + $v[interest_sum] + $v[law_jana];

		if ($v[monthly_return_money] > ($v[return_date_interest] + $v[tail_money])) {
			$monthly_return_money += $v[return_date_interest]+$v[tail_money];
		} elseif ($v[interest_sum] > $v[monthly_return_money]) {
			$monthly_return_money += $v[interest_sum];
		} else {
			$monthly_return_money += $v[monthly_return_money];
		}

		$return_date_interest += $v[return_date_interest];
		if($v[member_list_no] == '113980'){
			if ($v[monthly_return_money] > ($v[return_date_interest] + $v[tail_money])) {
				$return_money += $v[return_date_interest]+$v[tail_money];
			} elseif ($v[interest_sum] > $v[monthly_return_money]) {
				$return_money += $v[interest_sum];
			} else {
				$return_money += $v[monthly_return_money];
			}	
		}else if ($v[paydayloan] == "Y" && $v[first_return_date] == $v[return_date]) {
			if ($v[interest_sum] > $v[return_date_interest]) {
				$return_money += $v[interest_sum];
			} else {
				$return_money += $v[return_date_interest];
			}	
		}else if ($v[return_method] == "1") {
			
			if ( ($v[status] == 'C' && $v[monthly_return_money] > 0 ) || ( $v[status] == 'D' && $v[monthly_return_money] > 0  ) ) {
				if ($v[monthly_return_money] > ($v[return_date_interest] + $v[tail_money])) {
					$return_money += $v[return_date_interest]+$v[tail_money];
				} elseif ($v[interest_sum] > $v[monthly_return_money]) {
					$return_money += $v[interest_sum];
				} else {
					$return_money += $v[monthly_return_money];
				}
			}else{

				if ($v[interest_sum] > $v[return_date_interest]) {
					$return_money += $v[interest_sum];
				} else {
					$return_money += $v[return_date_interest];
				}

				if ($v[interest_sum] == 0 && $v[return_date_interest] == 0) {
					if ($v[tail_money] > 0 && $v[monthly_return_money] > 0) {
						$return_money += $v[monthly_return_money];
					}
				}
			}

		} else if ($v[return_method] == "2" || $v[return_method] == "3" || $v[return_method] == "4" || $v[return_method] == "5" || trim($v[return_method]) == "") {
			if ( ($v[status] == 'C' && $v[monthly_return_money] > 0 ) || ( $v[status] == 'D' && $v[monthly_return_money] > 0  ) ) {
				if ($v[monthly_return_money] > ($v[return_date_interest] + $v[tail_money])) {
					$return_money += $v[return_date_interest]+$v[tail_money];
				}else {
					$return_money += $v[monthly_return_money];
				}				
			}else{
				if ($v[monthly_return_money] > ($v[return_date_interest] + $v[tail_money])) {
					$return_money += $v[return_date_interest]+$v[tail_money];
				} elseif ($v[interest_sum] > $v[monthly_return_money]) {
					$return_money += $v[interest_sum];
				} else {
					$return_money += $v[monthly_return_money];
				}
			}
		}

		$wannap_money += $v[tail_money] + $v[interest_sum] + $v[law_jana];
	}

	$sigak = $sigak;
	$amou = $amou;
	$branch_tel = $branch_tel;
	$interest = number_format($interest);
	$total_money = number_format($total_money);
	$monthly_return_money = number_format($monthly_return_money);
	$return_date_interest = number_format($return_date_interest);
	$return_money = number_format($return_money);
	$wannap_money = number_format($wannap_money);
	$return_date_from = date("Y-m-d", date2unixtime($return_date) - 10 * 86400);
	$rack_money = number_format($rack_money);

	if (strpos($msg, "방문예정") > 0 || strpos($msg, "방문이 취소") > 0) {
		if (strpos($msg, "금일") > 0) {
			$date_a = date("n", time()) . "월" . date("j", time()) . "일";
		} elseif (strpos($msg, "영업일") > 0) {
			if (strpos($msg, "(1)영업일") > 0) {
				$limit_coun = 1;
			} elseif (strpos($msg, "(2)영업일") > 0) {
				$limit_coun = 2;
			} elseif (strpos($msg, "(3)영업일") > 0) {
				$limit_coun = 3;
			} elseif (strpos($msg, "(4)영업일") > 0) {
				$limit_coun = 4;
			} elseif (strpos($msg, "(5)영업일") > 0) {
				$limit_coun = 5;
			} elseif (strpos($msg, "(6)영업일") > 0) {
				$limit_coun = 6;
			} elseif (strpos($msg, "(7)영업일") > 0) {
				$limit_coun = 7;
			} elseif (strpos($msg, "(8)영업일") > 0) {
				$limit_coun = 8;
			} elseif (strpos($msg, "(9)영업일") > 0) {
				$limit_coun = 9;
			} elseif (strpos($msg, "(10)영업일") > 0) {
				$limit_coun = 10;
			} elseif (strpos($msg, "(11)영업일") > 0) {
				$limit_coun = 11;
			} elseif (strpos($msg, "(12)영업일") > 0) {
				$limit_coun = 12;
			} elseif (strpos($msg, "(13)영업일") > 0) {
				$limit_coun = 13;
			} elseif (strpos($msg, "(14)영업일") > 0) {
				$limit_coun = 14;
			} elseif (strpos($msg, "(15)영업일") > 0) {
				$limit_coun = 15;
			} elseif (strpos($msg, "(16)영업일") > 0) {
				$limit_coun = 16;
			} elseif (strpos($msg, "(17)영업일") > 0) {
				$limit_coun = 17;
			} elseif (strpos($msg, "(18)영업일") > 0) {
				$limit_coun = 18;
			} elseif (strpos($msg, "(19)영업일") > 0) {
				$limit_coun = 19;
			} elseif (strpos($msg, "(20)영업일") > 0) {
				$limit_coun = 20;
			}

			$today = date("Y-m-d", time());

			$sql_99  = "select * from day_conf ";
			$sql_99 .= "where day > '$today' ";
			$sql_99 .= "and type = 'A' ";
			$sql_99 .= "order by day limit $limit_coun ";
			$rel_99 = pg_query($pg_conn, $sql_99);
			while($val_99 = pg_fetch_array($rel_99)) {
				$date_a = date("n", date2unixtime($val_99[day])) . "월" . date("j", date2unixtime($val_99[day])) . "일";
			}
		}
	}

	foreach ($array_parse_char as $old_str => $new_str) {
		$msg = str_replace($old_str, ${$new_str}, $msg);	
	}
	
	return $msg;
}

function ftp_function($send_file = "", $file_name = "", $type, $move_Directory = "") {
	$ftp_host = "211.196.157.100";
	$ftp_id = "kjifn";
	$ftp_pw = "zpdl(!!";
	
	$ftp = ftp_connect($ftp_host);
	if (ftp_login($ftp, $ftp_id, $ftp_pw)) {
		ftp_chdir($ftp, $move_Directory); 
		if ($type == "U") {
			ftp_put($ftp, $file_name, $send_file, FTP_BINARY);
		} elseif ($type == "D") {
			ftp_delete($ftp, $file_name);
		}
	} else {
		echo "FTP LOGIN FAIL";
	}

	ftp_close($ftp);
}

function ftp_function_temp($send_file = "", $file_name = "", $type, $move_Directory = "") {
	$ftp_host = "58.229.234.51";
	$ftp_id = "30cut";
	$ftp_pw = "30cut1@#";
	
	$ftp = ftp_connect($ftp_host);
	if (ftp_login($ftp, $ftp_id, $ftp_pw)) {
		ftp_chdir($ftp, $move_Directory); 
		if ($type == "U") {
			ftp_put($ftp, $file_name, $send_file, FTP_BINARY);
		} elseif ($type == "D") {
			ftp_delete($ftp, $file_name);
		}
	} else {
		echo "FTP LOGIN FAIL";
	}

	ftp_close($ftp);
}

function get_age($ssn) {
	$by_a = substr($ssn, 0, 2);

	if ($by_a >= '30') {
		$bornyear = substr($ssn, 0, 2) + 1900;
	} else {
		$bornyear = substr($ssn, 0, 2) + 2000;
	}

	$bornmonth =  substr($ssn, 2, 2);
	$bornday = substr($ssn, 4, 2);

	$age = date("Y") - $bornyear;

	if(date("m") < $bornmonth) {
			$age--;
	} else if (date("m") == $bornmonth) {
		if(date("d") < $bornday) {
			$age--;
		}
	}
	return $age;
}

function get_age_gijuni($ssn, $gijuni) {
	$by_a = substr($ssn, 0, 2);

	if ($by_a > '40') {
		$bornyear = substr($ssn, 0, 2) + 1900;
	} else {
		$bornyear = substr($ssn, 0, 2) + 2000;
	}

	$bornmonth =  substr($ssn, 2, 2);
	$bornday = substr($ssn, 4, 2);

	$age = date("Y", date2unixtime($gijuni)) - $bornyear;

	if (date("m", date2unixtime($gijuni)) < $bornmonth) {
		$age--;
	} elseif (date("m", date2unixtime($gijuni)) == $bornmonth) {
		if (date("d", date2unixtime($gijuni)) < $bornday) {
			$age--;
		}
	}

	return $age;
}

function AlamMessage($message, $type = "on")
{
	echo "<script> alert('$message'); ";
	//if ($type == "on") echo " history.back(); ";
	echo "</script>";
	//exit;
}
