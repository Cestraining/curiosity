<?php 
    session_start();
    include_once('../dbconnection.php'); 
    

        if (isset($_POST['x']))
        {
            $obj=json_decode($_POST['x'],false);
            $stuname=$obj->name;
            $stuemail=$obj->email;
            $stupass=$obj->stupass;

            $sql= "INSERT INTO student(stu_name,stu_email,stu_pass) VALUES 
            ('$stuname','$stuemail','$stupass');";

            if($conn->query($sql) == TRUE)
            {   
                $mess = array(
                    0 => "account created successfully !!",
                    1 => "success",
                );
                $jsonwa= json_encode($mess);
                echo $jsonwa;
            }
            else
            {
                $mess = array(
                    0 => "unable to create account",
                    1 => "failed",
                );
                $jsonwa= json_encode($mess);
                echo $jsonwa;
            }

        }

        if (isset($_POST['xC']))
        {

             $obj=json_decode($_POST['xC'],false);
             $stuemailC=$obj->emailC;
             $stupassC=$obj->passC;

            $sql= "SELECT stu_id from student where stu_email='$stuemailC' AND stu_pass='$stupassC'";

            $result=$conn->query($sql);

             if($result->num_rows > 0)
            {    

                $row=$result->fetch_assoc();
                $_SESSION["islogin"]=true;
                $_SESSION["stu_id"]=$row['stu_id'];
                $_SESSION["stu_email"]=$stuemailC;
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