<?php
session_start();
unset($_SESSION['isadminlogin']);
unset($_SESSION['a_id']);
header('location: /index.php');
?>