<?php
 session_start();
 if(isset($_SESSION['isadminlogin']))
 {
   include_once('../dbconnection.php'); 
   echo "<h1>welcome admin</h1>";
 }
 else
 {
   header('location: /index.php');
 }
?>