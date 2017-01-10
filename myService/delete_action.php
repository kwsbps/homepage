<?php

include_once "../comm/db_info.php";

$sql = "delete from board where num = $_GET[number]";
mysql_query($sql, $conn);
//echo $sql;
echo "
<script>
location.href='integratedQuery.php';
</script>"	
?>
