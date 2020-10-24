<?php
session_start();
unset($_SESSION['islogin']);
unset($_SESSION['stu_id']);
header('location: /index.php');
?>
