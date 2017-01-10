<?php
session_start();
unset($_SESSION[user_email]);
echo "<script>location.href='../index.html';</script>";
?>