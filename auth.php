<?php
session_start();

// التحقق من تسجيل الدخول
if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['user'];
?>