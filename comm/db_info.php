<?php
    $_DB_USER = '30cut';
	$_DB_PASS = '30cut1@#';
	$_DB_HOST = '172.30.1.198';
	$_DB_NAME = '30cut';

	$conn = mysql_connect("$_DB_HOST","$_DB_USER","$_DB_PASS") or die(mysql_error()); 
	mysql_select_db("$_DB_NAME",$conn) or die("데이터베이스를 선택할 수 없습니다."); 
	@mysql_query("set names euckr");
    mysql_query("SET NAMES utf8"); 



?>