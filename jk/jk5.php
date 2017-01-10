
<DOCTYPE>
<html>
<head>
<meta charset="utf-8">
<title>테스트 화면</title>
<script>

function getmode()
{
	document.form.mode.value ="up";
	document.form.submit();
}

function checkmode()
{	
	if(document.form.mode.value == "")
	{
		document.form.mode.value = "list";
	}
	alert(document.form.mode.value);
	
}

function setmode()
{	
	if(document.form.mode.value == "")
	{
		document.form.mode.value = "list";		
	}
}



</script>
</head>
<body>
<form name="form" action="<?=$_SERVER['PHP_SELF']?>" method="post" style="border-bottom:1px solid black;padding-bottom:30px;" enctype="multipart/form-data">
	<input type="hidden" name="mode" value="<?=$val?>">
	<div style="color:#f26c5e"> 첨부파일 </div>
	<input type="file" name="upfile">
	<input type="button" onclick="getmode();" value="upload">
	<input type="button" onclick="checkmode();" value="checkmode">
	<input type="submit"  value="submit">
</form>
</body>
</html>

<?php
echo 'MODE : '.$_POST[mode];
//if(isset($_POST[mode]))
if($_POST[mode] == "up")
{
	include "./Classes/PHPExcel.php";
	$UpFile	= $_FILES["upfile"];
	echo '<-- up file : '.$UpFile.' -->';
	$UpFileName = $UpFile["name"];
	echo '<br>(1)'.$UpFile["name"].' (2) '.$_FILES["upfile"]["name"].'<br> '; 
	$UpFilePathInfo = pathinfo($UpFileName);
	$UpFileExt		= strtolower($UpFilePathInfo["extension"]);
	echo ' 1 '.$UpFileExt.' 2 '.$UpFilePathInfo.' 3 '.$UpFilePathInfo["extension"];
	print_r($UpFilePathInfo);
	if($UpFileExt != "xls" && $UpFileExt != "xlsx") {
		echo "<br>엑셀파일만 업로드 가능합니다. (xls, xlsx 확장자의 파일포멧)";
		exit;
	}

	//-- 읽을 범위 필터 설정 (아래는 A열만 읽어오도록 설정함  => 속도를 중가시키기 위해)
	class MyReadFilter implements PHPExcel_Reader_IReadFilter
	{
		public function readCell($column, $row, $worksheetName = '') {
			// Read rows 1 to 7 and columns A to E only
			if (in_array($column, range('A','H'))) 
			{
				return true;
			}
			return false;
		}
	}
	$filterSubset = new MyReadFilter();

	//업로드된 엑셀파일을 서버의 지정된 곳에 옮기기 위해 경로 적절히 설정
	//$upload_path = $_SERVER["DOCUMENT_ROOT"]."/Uploads/Excel_".date("Ymd");
	$upload_path = "./Uploads";
	//echo '<br>document root : '.$_SERVER["DOCUMENT_ROOT"].' //// path : '.$upload_path.'<br>';
	$upfile_path = $upload_path."/".date("Ymd")."_1_".$UpFileName;
	$get_num = extract("_" , $upfile_path );
	echo '<br>$upfile_path : '.$upfile_path.'<br>';

	if(is_uploaded_file($UpFile["tmp_name"])) {

		if(!move_uploaded_file($UpFile["tmp_name"],$upfile_path)) {
			echo "업로드된 파일을 옮기는 중 에러가 발생했습니다.";
			exit;
		}

		//파일 타입 설정 (확자자에 따른 구분)
		$inputFileType = 'Excel2007';
		if($UpFileExt == "xls") {
			$inputFileType = 'Excel5';	
		}

		//엑셀리더 초기화
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);

		//데이터만 읽기(서식을 모두 무시해서 속도 증가 시킴)
		$objReader->setReadDataOnly(true);	

		//범위 지정(위에 작성한 범위필터 적용)
		$objReader->setReadFilter($filterSubset);

		//업로드된 엑셀 파일 읽기
		$objPHPExcel = $objReader->load($upfile_path);

		//첫번째 시트로 고정
		$objPHPExcel->setActiveSheetIndex(0);

		//고정된 시트 로드
		$objWorksheet = $objPHPExcel->getActiveSheet();

	  //시트의 지정된 범위 데이터를 모두 읽어 배열로 저장
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		$total_rows = count($sheetData);
		echo $total_rows.'<br>';
		print_r($sheetData);
		echo '<br>';
		echo '0000000'.$sheetData[1][A].'111111';
		$array_grade = array("1"=>"C", "2"=>"C", "3"=>"C","4"=>"D","5"=>"E","6"=>"F", "7"=>"G", "8"=>"G", "9"=>"G", "10"=>"G" );
		$str_L = "카드론";
		$str_C = "현금서비스";
		$cnt = "0";
		echo '<br>';

		foreach($sheetData as $rows) 
		{
			if($cnt == "0") 
			{
				$cnt++; 
				continue;
			}
			
			$bank = $rows[A];

			if(strpos($rows[B], $str_L))
			{
				$loan_kind = "L";
				//test loan kind L 
				echo $loan_kind.'<br>';
			}
			else if(strpos($rows[B], $str_C))
			{
				$loan_kind = "C";
				//test loan kind R
				echo $loan_kind.'<br>';
			}

			for($i = 1; $i <= 10; $i++)
			{
				$sql = "insert fin_com_ratio set bank = '$bank', grade =".$i.", ";
				$sql .= "ratio =".$rows[$array_grade[$i]].", ";
				$sql .= "loan_kind='".$loan_kind."'";
				echo $sql.'<br>'; 
				//쿼리실행문 입력
			}
			echo print_r($rows);
			echo '<br>';
		}
	}
}
else if ($_POST[mode] == "list")
{
	include "./Classes/PHPExcel.php";
	$UpFile	= $_FILES["upfile"];
	echo '<-- up file : '.$UpFile.' -->';
	$UpFileName = $UpFile["name"];
	echo '<br>(1)'.$UpFile["name"].' (2) '.$_FILES["upfile"]["name"].'<br> '; 
	$UpFilePathInfo = pathinfo($UpFileName);
	$UpFileExt		= strtolower($UpFilePathInfo["extension"]);
	echo ' 1 '.$UpFileExt.' 2 '.$UpFilePathInfo.' 3 '.$UpFilePathInfo["extension"];
	print_r($UpFilePathInfo);
	if($UpFileExt != "xls" && $UpFileExt != "xlsx") 
	{
		echo "<br>엑셀파일만 업로드 가능합니다. (xls, xlsx 확장자의 파일포멧)";
	//	exit;
	}

	//-- 읽을 범위 필터 설정 (아래는 A열만 읽어오도록 설정함  => 속도를 중가시키기 위해)
	class MyReadFilter implements PHPExcel_Reader_IReadFilter
	{
		public function readCell($column, $row, $worksheetName = '') 
		{
			// Read rows 1 to 7 and columns A to E only
			if (in_array($column, range('A','H'))) 
			{
				return true;
			}
			return false;
		}
	}
	$filterSubset = new MyReadFilter();

	//업로드된 엑셀파일을 서버의 지정된 곳에 옮기기 위해 경로 적절히 설정
	//$upload_path = $_SERVER["DOCUMENT_ROOT"]."/Uploads/Excel_".date("Ymd");
	$upload_path = "./Uploads";
	
	//리스트 값을 뿌리기 위해 update_flag  최대값을 가져와야함 _1_ 부분에 맥스값
	//$upfile_path = $upload_path."/".date("Ymd")."_1_".$UpFileName;
	$upfile_path = $upload_path."/".date("Ymd")."_1_abb1.xlsx";
	$get_num = extract("_" , $upfile_path );
	echo '<br>$upfile_path : '.$upfile_path.'<br>';

	//if(is_uploaded_file($UpFile["tmp_name"])) 
	//{
		echo 'in';
		
		/*
		리스트를 가져오는 것으로 옮길 필요 x
		if(!move_uploaded_file($UpFile["tmp_name"],$upfile_path)) {
			echo "업로드된 파일을 옮기는 중 에러가 발생했습니다.";
			exit;
		}
		*/

		//파일 타입 설정 (확자자에 따른 구분)
		$inputFileType = 'Excel2007';
		//if($UpFileExt == "xls") {
		//	$inputFileType = 'Excel5';	
		//}

		//엑셀리더 초기화
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);

		//데이터만 읽기(서식을 모두 무시해서 속도 증가 시킴)
		$objReader->setReadDataOnly(true);	

		//범위 지정(위에 작성한 범위필터 적용)
		$objReader->setReadFilter($filterSubset);

		//업로드된 엑셀 파일 읽기
		$objPHPExcel = $objReader->load($upfile_path);

		//첫번째 시트로 고정
		$objPHPExcel->setActiveSheetIndex(0);

		//고정된 시트 로드
		$objWorksheet = $objPHPExcel->getActiveSheet();

	  //시트의 지정된 범위 데이터를 모두 읽어 배열로 저장
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		$total_rows = count($sheetData);
		echo $total_rows.'<br>';
		print_r($sheetData);
		echo '<br>';
		
		$array_grade = array("1"=>"C", "2"=>"C", "3"=>"C","4"=>"D","5"=>"E","6"=>"F", "7"=>"G", "8"=>"G", "9"=>"G", "10"=>"G" );
		$str_L = "카드론";
		$str_C = "현금서비스";
		$cnt = "0";
		echo '<br>';

		foreach($sheetData as $rows) 
		{
			echo $rows[A].' '.$rows[B].' '.$rows[C].' '.$rows[D].' '.$rows[E].' '.$rows[F].' '.$rows[G].' '.$rows[H]; 

			echo '<br>';
			
			echo '<br>';
		}
	//}
}
//보관
/*
	//if(isset($_POST[mode]))
if($_POST[mode] == "up")
{
	include "./Classes/PHPExcel.php";
	$UpFile	= $_FILES["upfile"];
	echo '<-- up file : '.$UpFile.' -->';
	$UpFileName = $UpFile["name"];
	echo '<br>(1)'.$UpFile["name"].' (2) '.$_FILES["upfile"]["name"].'<br> '; 
	$UpFilePathInfo = pathinfo($UpFileName);
	$UpFileExt		= strtolower($UpFilePathInfo["extension"]);
	echo ' 1 '.$UpFileExt.' 2 '.$UpFilePathInfo.' 3 '.$UpFilePathInfo["extension"];
	print_r($UpFilePathInfo);
	if($UpFileExt != "xls" && $UpFileExt != "xlsx") {
		echo "<br>엑셀파일만 업로드 가능합니다. (xls, xlsx 확장자의 파일포멧)";
		exit;
	}

	//-- 읽을 범위 필터 설정 (아래는 A열만 읽어오도록 설정함  => 속도를 중가시키기 위해)
	class MyReadFilter implements PHPExcel_Reader_IReadFilter
	{
		public function readCell($column, $row, $worksheetName = '') {
			// Read rows 1 to 7 and columns A to E only
			if (in_array($column, range('A','H'))) 
			{
				return true;
			}
			return false;
		}
	}
	$filterSubset = new MyReadFilter();

	//업로드된 엑셀파일을 서버의 지정된 곳에 옮기기 위해 경로 적절히 설정
	//$upload_path = $_SERVER["DOCUMENT_ROOT"]."/Uploads/Excel_".date("Ymd");
	$upload_path = "./Uploads";
	//echo '<br>document root : '.$_SERVER["DOCUMENT_ROOT"].' //// path : '.$upload_path.'<br>';
	$upfile_path = $upload_path."/".date("Ymd_His")."_".$UpFileName;
	//$upfile_path = "https://www.30cut.com/jk/Uploads/".date("Ymd_His")."_".$UpFileName;
	echo '<br>$upfile_path : '.$upfile_path.'<br>';
	if(is_uploaded_file($UpFile["tmp_name"])) {

		if(!move_uploaded_file($UpFile["tmp_name"],$upfile_path)) {
			echo "업로드된 파일을 옮기는 중 에러가 발생했습니다.";
			exit;
		}

		//파일 타입 설정 (확자자에 따른 구분)
		$inputFileType = 'Excel2007';
		if($UpFileExt == "xls") {
			$inputFileType = 'Excel5';	
		}

		//엑셀리더 초기화
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);

		//데이터만 읽기(서식을 모두 무시해서 속도 증가 시킴)
		$objReader->setReadDataOnly(true);	

		//범위 지정(위에 작성한 범위필터 적용)
		$objReader->setReadFilter($filterSubset);

		//업로드된 엑셀 파일 읽기
		$objPHPExcel = $objReader->load($upfile_path);

		//첫번째 시트로 고정
		$objPHPExcel->setActiveSheetIndex(0);

		//고정된 시트 로드
		$objWorksheet = $objPHPExcel->getActiveSheet();

	  //시트의 지정된 범위 데이터를 모두 읽어 배열로 저장
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		$total_rows = count($sheetData);
		echo $total_rows.'<br>';
		print_r($sheetData);
		echo '<br>';
		echo '0000000'.$sheetData[1][A].'111111';
		$array_grade = array("1"=>"C", "2"=>"C", "3"=>"C","4"=>"D","5"=>"E","6"=>"F", "7"=>"G", "8"=>"G", "9"=>"G", "10"=>"G" );
		$str_L = "카드론";
		$str_C = "현금서비스";
		$cnt = "0";
		echo '<br>';

		foreach($sheetData as $rows) 
		{
			if($cnt == "0") 
			{
				$cnt++; 
				continue;
			}
			
			$bank = $rows[A];

			if(strpos($rows[B], $str_L))
			{
				$loan_kind = "L";
				//test loan kind L 
				echo $loan_kind.'<br>';
			}
			else if(strpos($rows[B], $str_C))
			{
				$loan_kind = "C";
				//test loan kind R
				echo $loan_kind.'<br>';
			}

			for($i = 1; $i <= 10; $i++)
			{
				$sql = "insert fin_com_ratio set bank = '$bank', grade =".$i.", ";
				$sql .= "ratio =".$rows[$array_grade[$i]].", ";
				$sql .= "loan_kind='".$loan_kind."'";
				echo $sql.'<br>'; 
				//쿼리실행문 입력
			}
			echo print_r($rows);
			echo '<br>';
		
			
		}
	}
}
		
*/
//로직 짜놓기
//1. 로우값 구하기

//2. 등록시 최근 이자율 값이 반영
//function revise ()
//{
	/*모두 삭제한 후
	

	$sql = "delete from fin_com_ration";
	쿼리 실행 하고 다시 업데이트
	로우값(은행명) 만큼 포문. 이중포문으로 컬럼값 반영. 인서트문 동시실행?
	for(var i = 0; i < row_length; i++)
	{
		//은행명으로 순서데로 ex 첫번째
		rows[a][i]
		$bank = rows[a];
		//컬럼값 반영
		for	(var j = 0; j < col_length; j++)
		{
			//enum혹은 배열 형태로 c~h값을 지정해서 row[c~h]로 접근
			rows[c][ratio][j]
			$sql = " insert into fin_com_ratio set 
			bank = 			=	'$bank',
			ratio		=	'$ratio[$i]'";
		}
	}
	*/
//}


//3. 업데이트별 목록 보여주기
function listShow ()
{
	
}

//삭제하기
function fincom_list ()
{
	
}




?>
<script>
window.addEventListener("load", setmode());
</script>
