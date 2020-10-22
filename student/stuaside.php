<aside>
      <?php 
        $id=$_SESSION['stu_id'];
        $result=$conn->query("SELECT stu_img FROM student WHERE stu_id=$id");
        $row=$result->fetch_assoc();
      ?>
      <img src="<?php echo $row['stu_img'] ?>" alt="">
      <a id="Profile" href="studentProfile.php">Profile</a>
      <a id="Courses" href="myCourses.php">My Courses</a>
      <a id="FeedBack" href="stufeedBack.php">FeedBack</a>
      <a id="Change Password" href="stuChangePass.php">Change Password</a>
      <a id="Logout" href="stu_logout.php">Logout</a>
    </aside>
    <script>
      document.getElementById(document.title).style.backgroundColor="blue";
    </script>
</body>
</html>