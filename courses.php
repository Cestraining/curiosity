<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style3.css">
    <title>All Courses</title>
</head>
<body>
<header>
      <a href="/"><img src="/images/main_logo.png" alt=""></a>
</header>
<h1>All Courses</h1>
<section>
<div class="courses_container">
     <?php  
        include_once('dbconnection.php');

         $resu=$conn->query("SELECT c_id,c_name,c_desc,c_img FROM course");  
            
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
</section>
<h3 id="last">That's all</h3>
</body>
</html>