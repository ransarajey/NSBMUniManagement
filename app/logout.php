<?php
ob_start();
session_start();
require "assets/php/config.php";
require_once "assets/php/functions.php";
$user = new login_registration_class();
$user->userLogout();
header('Location: index.php');
exit();
ob_end_flush();
?>
