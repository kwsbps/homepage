<?

include_once "../comm/db_info.php"; 
$filename = "aaa" . date("YmdHis") . ".xls";
/*
header("Content-type: application/octet-stream");
header( "Content-type: application/vnd.ms-excel; charset=ecu-kr" ); 
header("Cache-Control: cache, must-revalidate");
header("Content-Disposition: attachment; filename=" . $filename);
header("Pragma: no-cache");
header("Expires: 0");
*/
//$sql = "select r_name, r_tel, r_datetime,r_content from reservation where call_state = '' or call_state = 0 or call_state = null or call_state = 11";
//$sql = "select r_name, r_tel, r_datetime,r_content from reservation where call_state = null";
$sql = "select r_name, r_tel, r_datetime,r_content from reservation where (call_state != 1 or call_state != 2 or call_state != 3 or call_state != 4 or call_state != 5 or call_state != 6 or call_state != 7 or call_state != 8 or call_state != 9 or call_state != 10)"; 
$result = mysql_query($sql, $conn) or die($sql);
//58.229.234.52172.30.1.198
$re = array();
$i = 0;
while($v = mysql_fetch_array($result))
{
	
	
	$a = explode("-", $v[r_datetime]);

	if($a[0] > 2015)
	{
		///echo $a[0].'<br>'; 
		//$b = substr($a[1] ,1,1);
		//echo $a[1].' '.$b.' '.$v[r_datetime].'<br>';
		if($a[1] >= 7)
		{ 
			$re[] = $v;
			$i++;
			echo $i.'<br>';
		}
	}
	//echo $v[r_name].' '.$a[0].'-'.$a[1].'-'.$a[2].' <br>';
	//echo $v[r_name].' '.$v[r_datetime].' '.$v[r_content];
	//print_r($v);
	//echo '<br>';
}
//echo count($re);
//print_r($re);


//echo sizeof($re);
//print_r($re);
sort($re);
?>
<table>
<?
foreach($re as $key => $value)
{ $aa=(string)$value[r_tel];
?>
<tr><td><?=$value[r_name]?></td>
<td><?=$aa?></td>
<td><?=$value[r_datetime]?></td>
<td><?=$value[r_content]?></td></tr>
<?
}

?>
</table>
