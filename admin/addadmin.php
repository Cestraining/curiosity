<?php
   session_start();
   include_once('../dbconnection.php'); 

  if (isset($_POST['xC']))
  {

       $obj=json_decode($_POST['xC'],false);
       $ad_email=$obj->ad_email;
       $ad_pass=$obj->ad_pass;

      $sql= "SELECT a_id FROM admin WHERE a_email='$ad_email' AND a_pass='$ad_pass'";

      $result=$conn->query($sql);

       if($result->num_rows > 0)
      {    

          $row=$result->fetch_assoc();
          $_SESSION["isadminlogin"]=true;
          $_SESSION["a_id"]=$row['a_id'];
          $mess = array(
              0 => "login successful",
              1 => "success",
          );
          $jsonwa= json_encode($mess);
          echo $jsonwa;
       }
       else
      {
          $mess = array(
              0 => "login failed",
              1 => "failed",
          );
          $jsonwa= json_encode($mess);
          echo $jsonwa;
      }

  }


  ?>