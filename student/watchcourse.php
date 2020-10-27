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
    <style>
        h2
        {
            text-align:center;
            padding: 10px 0px;
        }
        p
        {
          cursor: pointer;
          padding: 3px 4px;
          margin-bottom: 7px;
        }
    </style>
    <title>Document</title>
</head>
<body>
 <header>
   <a href="/"><img src="../images/main_logo.png" alt=""></a><br>
   <a id="my_c" href="myCourses.php">My Courses</a>
 </header>
 <aside style="top:113px;">
        <h2>Lessons</h2>
      <?php
        $cid=$_GET['course_id'];
        $result=$conn->query("SELECT l_link,l_name FROM lesson WHERE lc_id='$cid'");   
        while($row=$result->fetch_assoc())
        {   
            $fid=$row['l_link'];
         ?>   
            <p class="list" id="<?php echo $fid; ?>"><?php echo $row['l_name']; ?></p>
        <?php
        }
        ?>
      
    </aside>
    <section>
    <iframe id="frame" width="100%" height="360px"
     src=""
      frameborder="0">
     </iframe> <br>
    </section>
    <script src="../js/player.js"></script>
</body>
</html>
