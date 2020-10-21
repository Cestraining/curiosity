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
            <a id="signin" href="#">SIGN IN</a>
            <a id="pic" href="#"><img src="" alt=""></a>
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
            <a id="getstarted" href="#">Get Started</a>
        </div>
    </section>
    <!-- HERO -->
    <!-- COURSES -->
    <section class="courses" id="c_sec">
        <h1>Popular Courses</h1>
        <div class="courses_container">
            <div class="c_card c_card1">
                <img class="c_image" src="/images/course_img/physics.jpg" alt="">
                <h3>Learn Physics</h3>
                <p>Welcome to the Physics library! Physics the study of matter, motion, energy, and force.</p>
                <a href="">Enroll</a>
            </div>
            
                <div class="c_card c_card2">
                    <img class="c_image" src="/images/course_img/physics.jpg" alt="">
                    <h3>Learn Physics</h3>
                    <p>Welcome to the Physics library! Physics the study of matter, motion, energy, and force.</p>
                    <a href="">Enroll</a>
                </div>
            
            
                <div class="c_card c_card3">
                    <img class="c_image" src="/images/course_img/physics.jpg" alt="">
                    <h3>Learn Physics</h3>
                    <p>Welcome to the Physics library! Physics the study of matter, motion, energy, and force.</p>
                    <a href="">Enroll</a>
                </div>
            
        </div>
        <a id="viewallC" href="#">View All Courses</a>
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
            <p>Copyright <span>&copy;</span> 2020 | Designed by E-curiosity || <a href="#">Admin login</a></p>
        </div>
    </footer>
    <!-- Footer -->
    <!-- MODAL -->
    <div id="modal">
        <div id="modal_content">
            <div class="signlog">
                <button id="btnregis" >Registration</button>
                <button id="btnlog" >Log In</button>
            </div>
            <div class="forms">
                <div id="form1">
                    <h3>Student Registration</h3>

                    <form action="" autocomplete="off">
                        <label for="name"><img class="icons" src="images/user-alt.svg"></img> Name</label><br>
                        <input type="text" id="name" name="name" placeholder="Name"><br>
                        <label for="email"><img class="icons" src="images/envelope.svg"></img> Email</label><br>
                        <input type="text" id="email" name="email" placeholder="Email"><br>
                        <label for="pass"><img class="icons" src="images/key.svg"></img> New Password</label><br>
                        <input type="text" id="pass" name="pass" placeholder="Name"><br>
                    </form>
                    <button>Register</button>
                </div>
                <div id="form2">
                    <h3>Student Login</h3>
                <form action="" autocomplete="off">
                        <label for="email"><img class="icons" src="images/envelope.svg"></img> Email</label><br>
                        <input type="text" id="email" name="email" placeholder="Email"><br>
                        <label for="pass"><img class="icons" src="images/key.svg"></img>Password</label><br>
                        <input type="text" id="pass" name="pass" placeholder="Name"><br>
                </form>
                <button>Login</button>
                </div>
                
            </div>
        </div>
    </div>
    <!-- MODAL -->
    <!-- ***********************SCRIPTS*********************-->
    <script src="/js/app.js"></script>
</body>

</html>
