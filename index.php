<?php session_start();
include_once('dbconnection.php');
     
  if(isset($_SESSION['islogin']))
    {
    $id=$_SESSION['stu_id'];
    $result=$conn->query("SELECT stu_img FROM student WHERE stu_id=$id");
    $row=$result->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Curiosity</title>
</head>

<body>
    <!-- HEADER -->
    <header class="header">
        <a class="logo" href="/"><img src="images/main_logo.png" alt="curiosity"></a>

        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="#c_sec">Courses</a></li>
                <li><a href="#fe_sec">FeedBack</a></li>
                <li><a href="#fo_sec">Contact Us</a></li>
            </ul>
        </nav>

        <div class="account">
            <?php 
            if(isset($_SESSION['islogin']))
            {
            ?>
             <a id="pic" href="student/studentProfile.php"><img src="<?php echo $row['stu_img']?>" alt=""></a>
             <?php
            }
            else
            {
            ?>
            <a id="signin" href="#">SIGN IN</a>
            <?php
            }
            ?>
            
        </div>
    </header>
    <!-- HEADER -->
    <!-- HERO -->
    <section class="hero">
        <div class="hero_image"></div>
        <div class="hero_text">
            <h1><span style="color: red;">Next</span> generation Explorer</h1>
            <p>Learn <span style="color:red">Physics</span>, <span style="color:red">Computer Science</span> and
                other <span style="color:red">Enginnering</span> Subjects
            </p>
            <?php
             if(isset($_SESSION['islogin']))
            {
            ?>
                <a href="student/studentProfile.php">My Profile</a>
            <?php
            }
            else
            {
            ?>
                <a id="getstarted" href="#">Get Started</a>
            <?php
            }
            ?>
            
        </div>
    </section>
    <!-- HERO -->
    <!-- COURSES -->
    <section class="courses" id="c_sec">
        <h1>Popular Courses</h1>
        <div class="courses_container">
            <?php  
                $resu=$conn->query("SELECT c_id,c_name,c_desc,c_img FROM course ORDER BY n_enroll DESC LIMIT 3");  
                
                while($r=$resu->fetch_assoc())
                {?> 
                <div class="c_card">
                <img class="c_image" 
                src="<?php echo str_replace("..","",$r['c_img']); ?>" alt="">
                <h3><?php  echo $r['c_name'];  ?></h3>
                <p><?php  echo $r['c_desc'];  ?></p>
                <a href="coursedetails.php?course_id=<?php echo $r['c_id'] ?>">Enroll</a>
                </div>
                <?php
                }
                ?>
        </div>
        <a id="viewallC" href="./courses.php">View All Courses</a>
    </section>
    <!-- COURSES -->
    <!-- FeedBack -->
    <section class="feedback" id="fe_sec">
  
    </section>
    <!-- FeedBack -->
     <!-- Footer -->
     <footer class="footer" id="fo_sec">
         <h2>Stay Updated</h2>
        <div class="social">
            <span class="s_icons"><img src="images/facebook.svg" alt=""></span>
            <span class="s_icons"><img src="images/twitter.svg" alt=""></span>
            <span class="s_icons"><img src="images/whatsapp.svg" alt=""></span>
            <span class="s_icons"><img src="images/instagram.svg" alt=""></span>
        </div>
        <div class="f_card_container">
            <div class="f_card f_card1">
                <h3>About Us</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis, magni? Voluptas dignissimos ea iusto eveniet?</p>
                
            </div>
            <div class="f_card f_card2">
                <h3>Category</h3>
                <a href="">Web Development</a><br>
                <a href="">Web Desiging</a><br>
                <a href="">Android App Dev</a><br>
                <a href="">iOS Development</a><br>
                <a href="">Data Analysis</a>
            </div>
            <div class="f_card f_card3">
                <h3>Contact Us</h3>
                <p>e-curiosity Pvt Ltd<br>
                    New Police Camp 4 <br>
                    Bokaro, Jharkhand <br>
                    ph. 8452390252
                </p>
            </div>
        </div>

        <div class="copyright">
            <p>Copyright <span>&copy;</span> 2020 | Designed by E-curiosity || <?php 
            if(isset($_SESSION['isadminlogin']))
            {
                ?>
                <a href="/admin/admin_dashboard.php">Admin Panel</a>
                <?php
            }
            else
            {   
                ?>
                <a id="adm_log" href="#">Admin login</a>
                <?php
            }
                ?>
            </p>
        </div>
    </footer>
    <!-- Footer -->
    <!-- Modal -->
    <?php require 'modal.php'; ?>
    <?php require 'ad_modal.php'; ?>
    
    <!-- Modal -->
    <!-- ***********************SCRIPTS*********************-->
    <script src="/js/app.js"></script>
    <script src="/js/ajaxrequest.js"></script>
</body>

</html>
