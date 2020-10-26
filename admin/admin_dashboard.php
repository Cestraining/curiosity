<?php require 'adminheader.php'; ?>
<section>
<div class="dash_box">
    <div class="card">
        <p>Courses</p><br>
        <h3><?php echo $conn->query("SELECT c_id FROM course")->num_rows ?></h3><br>
        <a href="admin_courses.php">View</a>
    </div>
    <div class="card">
        <p>Students</p><br>
        <h3><?php echo $conn->query("SELECT stu_id FROM student")->num_rows ?></h3><br>
        <a href="admin_stu.php">View</a>
    </div>
    <div class="card">
        <p>Enrolls</p><br>
        <?php 
         ?>
        <h3><?php echo $conn->query("SELECT cn_id FROM course_enroll")->num_rows ?></h3><br>
        <a href="enroll_report.php">View</a>
    </div>
</div>
<p class="t_title">Course Enrolled</p>
<table>
    <tr>
    <th>Enroll ID</th>
    <th>Course ID</th>
    <th>Student Email</th>
    <th>Enroll Date</th>
    <th>Action</th>
    </tr>
    <?php
        if(isset($_GET['delete']))
        {
            $id=$_GET['delete'];
            $sql="DELETE FROM course_enroll WHERE cn_id='$id'";
            if($conn->query($sql))
            {
                $mess="course deleted from student account successfully";
            }
            else
            {
                $mess="Can't delete course from student account right now !!";
            }
        }
     $sql="SELECT cn_id,c_id,s_email,e_date FROM course_enroll";
     $result=$conn->query($sql);
    while($row=$result->fetch_assoc())
    {?>
        <tr>
        <th><?php echo $row['cn_id'] ?></th>
        <td><?php echo $row['c_id'] ?></td>
        <td><?php echo $row['s_email'] ?></td>
        <td><?php echo $row['e_date'] ?></td>
        <td class="ac"><a href="<?php echo $_SERVER['PHP_SELF'].'?delete='.$row['cn_id']; ?>"><img class="icons" src="../images/trash-alt.svg"></img></a></td>
        </tr>
        <?php
    }
    ?>
    </table>
    <span><?php if(isset($mess)){echo $mess;} ?></span>
</section>
<?php require 'adminaside.php'; ?>
