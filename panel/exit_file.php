<?php
include_once '../functions/functions.php';
include_once '../functions/f-user.php';
echo "Logged out successfully";

session_start();
log_out($_SESSION['login_user']);
session_destroy();
header("location:../index.php");
?>