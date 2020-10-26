<?php require 'stuheader.php'; ?>
<section>

<?php
    $stem=$_SESSION['stu_email'];
    $sql="SELECT co.e_date,c.c_id,c.c_name,c.c_desc,c.c_author,c.c_img,c.c_dur FROM course_enroll AS co JOIN course AS c ON c.c_id = co.c_id WHERE co.s_email='$stem'";
    $result=$conn->query($sql);
    if($result->num_rows > 0)
    {
        while($row=$result->fetch_assoc())    
        {
 ?>
    <div id="sc_container">
        <div class="cardf">
            <h3><?php echo $row['c_name']; ?></h3>
            <div class="side">
                <img src="<?php echo $row['c_img']; ?>" alt="">
                <div>
                    <p><?php echo $row['c_desc']; ?></p><br>
                    <p>Duration: <?php echo $row['c_dur']; ?></p><br>
                    <p>Enroll Date: <?php echo $row['e_date']; ?></p><br>
                    <div class="side side_e">
                    <p>Author: <?php echo $row['c_author']; ?></p>
                     <a href="watchcourse.php?course_id=<?php echo $row['c_id'] ?>">Watch Course</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
   <?php
        }
    }
    else
    {
     $mess="No course availiable";
    ?>
   <?php
    }
    ?>
    <span><?php if(isset($mess)){ echo $mess; } ?></span>
</section>
<?php require 'stuaside.php'; ?>
