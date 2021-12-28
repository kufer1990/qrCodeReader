<?php 
session_start();
unset($_SESSION['users']);
session_destroy();
header("location: panel_log.php");
?>