<?php 
ob_start();
session_start();
include 'admin/config.php';
unset($_SESSION['pembeli']);
header("location: login.php"); 
?>