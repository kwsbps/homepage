<?
   session_start();

   include_once "../../comm/db_info.php"; 

   $sql = "select * from $_GET[table] where num = $_GET[num]";
   $result = mysql_query($sql, $conn);

   $row = mysql_fetch_array($result);

   $copied_name[0] = $row[file_copied_0];
   $copied_name[1] = $row[file_copied_1];
   $copied_name[2] = $row[file_copied_2];

   for ($i=0; $i<3; $i++)
   {
		if ($copied_name[$i])
	   {
			$image_name = "./data/".$copied_name[$i];
			unlink($image_name);
	   }
   }

   $sql = "delete from $_GET[table] where num = $_GET[num]";
   mysql_query($sql, $conn);

   mysql_close();

   echo "
	   <script>
	    location.href = '../news_board.php';
	   </script>
	";
?>

