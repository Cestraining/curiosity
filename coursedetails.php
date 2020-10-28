<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style3.css">
    <title>Course Details</title>
</head>
<body>
<header>
      <a href="/"><img src="/images/main_logo.png" alt=""></a>
</header>
    <?php
        include_once('dbconnection.php');
        if(isset($_GET['enroll']))
        {
            if(isset($_SESSION['islogin']))
            {   
                $se=$_SESSION['stu_email'];
                $cid=$_GET['enroll'];

                $result=$conn->query("SELECT e_date FROM course_enroll WHERE s_email='$se' AND c_id='$cid'");

                if($result->num_rows == 1)
                {
                    $mess='you already have take this course on '.$result->fetch_assoc()['e_date'];
                }
                else
                {
                    
                    $sql1="UPDATE course SET n_enroll=n_enroll+1 WHERE c_id='$cid'";
                    $sql2="INSERT INTO course_enroll(c_id,s_email) VALUES('$cid','$se')";

                    if($conn->query($sql1) && $conn->query($sql2))
                    {
                        $mess="Course added successfully to your account !!";
                    }
                    else
                    {
                        $mess="Sorry,You Can't take this course right now";
                    }
                }
            }
            else
            {
                $mess="you need to login first !";
            }
        }



        $id=$_GET['course_id'];
        $sql="SELECT * FROM course WHERE c_id='$id'";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
    ?>
    <section>
        <div id="course" class="side">
            <img src="<?php echo $row['c_img']; ?>" alt="">
            <div>
            <h3>Course Name: <?php echo $row['c_name']; ?></h3><br>
            <p><?php echo $row['c_desc']; ?></p><br>
            <p>Duration: <?php echo $row['c_dur']; ?></p><br>
                <div class="side side_e">
                <p>Author: <?php echo $row['c_author']; ?></p>

                <a id="enroll" href="<?php echo $_SERVER['PHP_SELF'].'?course_id='.$row['c_id'].'&enroll='.$row['c_id']; ?>">Enroll Now</a>

                </div>
            </div>
        </div>
        <span><?php if(isset($mess)){ echo $mess; } 
            $sql="SELECT l_id,l_name FROM lesson WHERE lc_id='$id'";
            $result=$conn->query($sql);
        
        ?></span>
        <div id="lesson">
            <table>
            <tr>
                <th>Lesson ID</th>
                <th>Lesoon Name</th>
            </tr>
            <?php while($row=$result->fetch_assoc())
            {
            ?>
                <tr>
                <th><?php echo $row['l_id']; ?></th>
                <td><?php echo $row['l_name']; ?></td>
                </tr>

            <?php
            }
            ?>
            </table>
        </div>
    </section>
</body>
</html>