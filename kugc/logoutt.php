<?php
session_start();
session_unset();
ob_start();
header("location:login.php");
ob_end_flush();
exit();
?>