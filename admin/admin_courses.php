<?php require 'adminheader.php'; ?>
<section>
<!-- SECTION START-------------------------------------------->
<?php 
if(isset($_GET['action']) || isset($_POST['action']))
{
// ACTION START-----------------------------------------
    if(isset($_POST['action']))
    {       
        $mess="";
        $name=$_POST['name'];
        $desc=$_POST['desc'];
        $auth=$_POST['auth'];
        $dur=$_POST['dur'];
        $target_dir="../images/course_img/";
        
        if($name == "" || $desc == "" || $auth == "" || $dur == "" || $_FILES['fileToUpload']['name'] =="" )
        {
            $mess="please complete the form";
        }
        else
        {   
            $target_file=$target_dir . basename($_FILES['fileToUpload']['name']);

            $sql="INSERT INTO course(c_name,c_desc,c_author,c_img,c_dur) VALUES('$name','$desc','$auth','$target_file','$dur')";

            if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file) && $conn->query($sql))
            {
                $mess="course added successfully !!";

            }
            else
            {
                $mess="can't add course right now :( ";
            }
        }
    }
 
?>  

    <h1>Add New Course</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" >
    <label for="name">Course Name</label><br>
    <input type="text" name="name" id="name"><br>
    <label for="desc">Course Description</label><br>
    <input type="text" name="desc" id="desc"><br>
    <label for="auth">Author</label><br>
    <input type="text" name="auth" id="auth"><br>
    <label for="dur">Course Duration</label><br>
    <input type="text" name="dur" id="dur"><br>
    <label for="up_img">Course Image</label><br>
    <input type="file" name="fileToUpload" id="up_img"><br>
    <input type="submit" name="action" value="Submit"><br>
    <a href="admin_courses.php">Close</a>
</form>
    <span><?php if(isset($mess)){echo $mess;} ?></span>
<?php
// ACTION END-----------------------------------------------
}
if(isset($_GET['edit']) || isset($_POST['edit']) )
{
    
    if(isset($_POST['edit']))
    {
        $mess="";
        $p_img=$_POST['p_img'];
        $name=$_POST['name'];
        $desc=$_POST['desc'];
        $auth=$_POST['auth'];
        $dur=$_POST['dur'];
        $target_dir="../images/course_img/";
       
        $c_id=$_POST['c_id'];

        if($name == "" || $desc == "" || $auth == "" || $dur == "")
        {
            $mess="please complete the form";
            
        }
        else
        {
            if($_FILES['fileToUpload']['name'] != "")
            {
                $target_file=$target_dir . basename($_FILES
                ['fileToUpload']['name']);

                if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file))
                {
                    $f_name=$p_img;
                    unlink($f_name);
                    $sql="UPDATE course SET c_name='$name',c_desc='$desc',c_author='$auth',c_img='$target_file',c_dur='$dur' WHERE c_id='$c_id'";

                    if($conn->query($sql))
                    {
                        $mess="course details update successfully !!";
                    }
                    else
                    {
                        $mess="can't update student details right now :( ";
                    }

                }
                else
                {
                    $mess="can't update student details right now :( ";
                }


            }
            else
            {
                $sql="UPDATE course SET c_name='$name',c_desc='$desc',c_author='$auth',c_dur='$dur' WHERE c_id='$c_id'";
                if($conn->query($sql))
                {
                    $mess="course details update successfully !!";
                } 
                else
                {
                     $mess="can't update student details right now :( ";
                }

            }
            
        }
        $result=$conn->query("SELECT * FROM course WHERE c_id='$c_id'");
        $row=$result->fetch_assoc();
    }
    else
    {
        $id=$_GET['edit'];
        $result=$conn->query("SELECT * FROM course WHERE c_id='$id'");
        $row=$result->fetch_assoc();
    
    }

    ?>

    <h1>Update Course Details</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

    <label>Course ID</label><br>
    <input type="text" name="c_id" value="<?php echo $row['c_id'] ?>" readonly><br>

    <label for="name">Course Name</label><br>
    <input type="text" value="<?php echo $row['c_name'] ?>" name="name" id="name"><br>

    <label for="desc">Course Description</label><br>
    <input type="text" value="<?php echo $row['c_desc'] ?>" name="desc" id="desc"><br>

    <label for="auth">Author</label><br>
    <input type="text" value="<?php echo $row['c_author'] ?>" name="auth" id="auth"><br>

    <label for="dur">Course Duration</label><br>
    <input type="text" value="<?php echo $row['c_dur'] ?>" name="dur" id="dur"><br>

    <input type="hidden" name="p_img" value="<?php echo $row['c_img'] ?>">

    <img src="<?php echo $row['c_img'] ?>" alt=""><br>

    <label for="c_img">Course Image</label><br>
    <input type="file" name="fileToUpload" id="c_img"><br>

    <input type="submit" name="edit" value="Update">
    <a href="admin_courses.php">Close</a>
</form>
    <span><?php if(isset($mess)){echo $mess;} ?></span>
<?php
}
$mess="";
if(isset($_GET['delete']))
{   
    
    $c_id=$_GET['delete'];
    $sql="DELETE FROM course WHERE c_id=$c_id";
    $result=$conn->query("SELECT c_img FROM course WHERE c_id=$c_id");
    $row=$result->fetch_assoc();
    if($conn->query($sql))
    {   
        if($row['c_img']!="")
        {
            unlink($row['c_img']);

        }
        $mess="deleted successfully !!";
    }
    else
    {
        $mess="can't delete right now :( ";
    }

}
if(!isset($_GET['edit']) && !isset($_GET['action']) && !isset($_POST['action']) && !isset($_POST['edit']))
{
   
    $sql="SELECT c_id,c_name,c_author FROM course";
    $result=$conn->query($sql);
    
?>


<p class="t_title" style="text-align:start;">List of Courses</p>
    <table>
    <tr>
    <th>Course ID</th>
    <th>Name</th>
    <th>Author</th>
    <th colspan="2">Action</th>
    </tr>
    <?php
    while($row=$result->fetch_assoc())
    {?>
        <tr>
        <th><?php echo $row['c_id'] ?></th>
        <td><?php echo $row['c_name'] ?></td>
        <td><?php echo $row['c_author'] ?></td>
        <td class="ac"><a href="<?php echo $_SERVER['PHP_SELF'].'?edit='.$row['c_id']; ?>"><img class="icons" src="../images/edit.svg"></img></a></td>
        <td class="ac"><a href="<?php echo $_SERVER['PHP_SELF'].'?delete='.$row['c_id']; ?>"><img class="icons" src="../images/trash-alt.svg"></img></a></td>
        </tr>
        <?php
    }
    ?>
    </table>
    <span><?php if(isset($mess)){echo $mess;} ?></span>

    <a href="<?php echo $_SERVER['PHP_SELF'].'?action=add'; ?>" class="add" ><img style="width:50px; height:50px" src="../images/plus-square.svg" alt=""></a>

<?php
}
?>

<!-- SECTION END------------------------------------------>
</section>
<?php require 'adminaside.php'; ?>
