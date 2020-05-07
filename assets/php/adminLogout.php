<?php
ob_start();
session_start();
require "config.php";
require_once "functions.php";
$user = new login_registration_class();
$user->adminLogout();
header('Location: ../../index.php');
exit();
ob_end_flush();
?>
