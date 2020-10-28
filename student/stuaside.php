<aside>
      <?php 
        $id=$_SESSION['stu_id'];
        $result=$conn->query("SELECT stu_img FROM student WHERE stu_id=$id");
        $row=$result->fetch_assoc();
      ?>
      <img class="profile_img" src="<?php echo $row['stu_img'] ?>" alt="">
      <a id="Profile" href="studentProfile.php"><img class="icons" src="../images/user-alt.svg"></img> Profile</a>
      <a id="Courses" href="myCourses.php"><img class="icons" src="../images/book.svg"></img> My Courses</a>
      <a id="FeedBack" href="stufeedBack.php"><img class="icons" src="../images/file-invoice.svg"></img> FeedBack</a>
      <a id="Change Password" href="stuChangePass.php"><img class="icons" src="../images/key.svg"></img> Change Password</a>
      <a href="stu_logout.php"><img class="icons" src="../images/sign-out-alt.svg"></img> Logout</a>
    </aside>
    <script>
      document.getElementById(document.title).style.backgroundColor="blue";
    </script>
</body>
</html>