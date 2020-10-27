<?php
  session_start();
  if(isset($_SESSION['isadminlogin']))
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
  $tile=str_replace("/admin/","",$_SERVER['PHP_SELF']);
  switch($tile)
  {
      case 'admin_dashboard.php':
        echo "Dashboard";
      break;
      case 'admin_courses.php':
        echo "Courses";
      break;
      case 'admin_lessons.php':
        echo "Lessons";
      break;
      case 'admin_stu.php':
        echo "Students";
      break;
      case 'enroll_report.php':
        echo "Enrolls";
      break;
      case 'admin_feed.php':
        echo "Feedbacks";
      break;
      case 'admin_chPass.php':
        echo "Change Password";
      break;
      default:
        echo 'Curiosity'; 
  }
  ?></title>
</head>
<body>
    <header class="noprint">
      <a href="/"><img src="../images/main_logo.png" alt=""></a>
      
    </header>