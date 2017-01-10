<? session_start(); ?>

<meta charset="utf-8">
<?



	 include_once "../../comm/db_info.php";      // dconn.php 파일을 불러옴

	if(!$_POST[userid]) {
		echo("
		<script>
	     window.alert('로그인 후 이용해 주세요.')
	     history.go(-1)
	   </script>
		");
		exit;
	}
	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

	$userid = 'beyond';
    $username = 'beyond';
    $usernick = 'beyond';
    //$userlevel = $_SESSION['userlevel'];
	

	// 다중 파일 업로드
	$files = $_FILES["upfile"];
	$count = count($files["name"]);	
	$upload_dir = './data/';

	for ($i=0; $i<$count; $i++)
	{
		$upfile_name[$i]     = $files["name"][$i];
		$upfile_tmp_name[$i] = $files["tmp_name"][$i];
		$upfile_type[$i]     = $files["type"][$i];
		$upfile_size[$i]     = $files["size"][$i];
		$upfile_error[$i]    = $files["error"][$i];
      
		$file = explode(".", $upfile_name[$i]);
		$file_name = $file[0];
		$file_ext  = $file[1];

		if (!$upfile_error[$i])
		{
			$new_file_name = date("Y_m_d_H_i_s");
			$new_file_name = $new_file_name."_".$i;
			$copied_file_name[$i] = $new_file_name.".".$file_ext;      
			$uploaded_file[$i] = $upload_dir.$copied_file_name[$i];

			if( $upfile_size[$i]  > 5000000 ) {
				echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(5MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)
				</script>
				");
				exit;
			}
echo $upfile_tmp_name[$i]."///////////<br>".$uploaded_file[$i];

			if (!move_uploaded_file($upfile_tmp_name[$i], $uploaded_file[$i]) )
			{
				echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
				exit;
			}
		}
	}
	
	if ($_GET[mode]=="modify")
	{
		echo "----3----";
		$num_checked = count($_POST['del_file']);
		$position = $_POST['del_file'];

		for($i=0; $i<$num_checked; $i++)                      // delete checked item
		{
			$index = $position[$i];
			$del_ok[$index] = "y";
		}

		$sql = "select * from $_POST[table] where num=$_GET[num]";   // get target record
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
echo "-----중단점2----";
		for ($i=0; $i<$count; $i++)					// update DB with the value of file input box
		{
			$field_org_name = "file_name_".$i;
			$field_real_name = "file_copied_".$i;

			$org_name_value = $upfile_name[$i];
			$org_real_value = $copied_file_name[$i];
			echo "-----중단점3----";
			if ($del_ok[$i] == "y")
			{
				
				$delete_field = "file_copied_".$i;
				$delete_name = $row[$delete_field];				
				$delete_path = "./data/".$delete_name;
				unlink($delete_path);

				$sql = "update $_POST[table] set $field_org_name = '$org_name_value', $field_real_name = '$org_real_value'  where num=$_GET[num]";
				
				mysql_query($sql, $conn);  // $sql 에 저장된 명령 실행
			}
			else
			{echo "-----중단점4----";
				if (!$upfile_error[$i])
				{
					$sql = "update $_POST[table] set $field_org_name = '$org_name_value', $field_real_name = '$org_real_value'  where num=$_GET[num]";
					echo $sql;
					mysql_query($sql, $conn);  // $sql 에 저장된 명령 실행				
				}
			}
		} echo "-----중단점5----";
		$sql = "update $_POST[table] set subject='$_POST[subject]', content='$_POST[content]',get_date = '$_POST[get_date]' where num=$_GET[num]";
		echo $sql.'<br>';
		mysql_query($sql, $conn) or die('실패입니다.');  // $sql 에 저장된 명령 실행
	}
	else
	{
		 echo "-----중단점6----";

		 
		$clean_content = htmlspecialchars($_POST[content], ENT_QUOTES);

		$clean_content = str_replace("\r\n","<br/>",$clean_content); //줄바꿈 처리

		$clean_content = str_replace("\u0020","&nbsp;",$clean_content); // 스페이스바 처리
		$sql = "insert into board ( id, name, nick, subject, content, regist_day, hit, ";
		$sql .= " file_name_0, file_type_0, file_copied_0,  flag, get_date) ";
		$sql .= " values ('$userid', '$username', '$usernick', \"$_POST[subject]\", \"$clean_content\", '$regist_day', 0, ";
		$sql .= " '$upfile_name[0]', '$upfile_type[0]', '$copied_file_name[0]' , $_GET[pageflag], $_POST[get_date]) ";
	
		echo $sql;
		mysql_query($sql, $conn) or die('글을 저장하는데 실패하였습니다.');  // $sql 에 저장된 명령 실행
		
		echo "----4----";
	}
	mysql_close();                // DB 연결 끊기

echo "----5----";
	echo "
	   <script>
	  location.href = '../news_board.php'; 
	   </script>";
?>

  
