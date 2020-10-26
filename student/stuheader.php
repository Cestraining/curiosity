<?php
  session_start();
  if(isset($_SESSION['islogin']))
  {
    include_once('../dbconnection.php'); 
  }
  else
  {
    header('location: /index.php');
  }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style2.css">
  <title><?php 
  $tile=str_replace("/student/","",$_SERVER['PHP_SELF']);
  switch($tile)
  {
      case 'admin_dashboard.php':
        echo "Dashboard";
      break;
      case 'myCourses.php':
        echo "Courses";
      break;
      case 'stufeedBack.php':
        echo "FeedBack";
      break;
      case 'stuChangePass.php':
        echo "Change Password";
      break;
      case 'studentProfile.php':
        echo "Profile";
      break;
      default:
        echo 'Curiosity'; 
  }
  ?></title>
</head>
<body>
    <header>
      <a href="/"><img src="../images/main_logo.png" alt=""></a>
    </header>