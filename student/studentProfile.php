<?php require 'stuheader.php'; ?>
<?php
    $id=$_SESSION['stu_id'];
    if(isset($_POST['submit']))
    {   
        $status=1;
        $stu_name=$_POST['stu_name'];
        $stu_occ=$_POST['stu_occ'];
        $target_dir="../images/stu_images/";
        $target_file=$target_dir . basename($_FILES['fileToUpload']['name']);
        
        if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file))
        {
            $status++;
            $conn->query("UPDATE student SET stu_img='$target_file' WHERE stu_id=$id");
        } 
        $sql="UPDATE student SET stu_name='$stu_name',
         stu_occ='$stu_occ' WHERE stu_id=$id";

        if($conn->query($sql))
        {
            $status++;
        }
        
    }
    $sql="SELECT stu_id,stu_email,stu_name,stu_occ FROM student
    WHERE stu_id=$id";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();

?>
<section>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <label>Student ID</label><br>
    <input type="text" value="<?php echo $row['stu_id'] ?>" disabled><br>
    <label>Email</label><br>
    <input type="text" value="<?php echo $row['stu_email'] ?>" disabled><br>
    <label for="stu_name">Name</label><br>
    <input type="text" name="stu_name" id="stu_name" value="<?php echo $row['stu_name'] ?>"><br>
    <label for="stu_occ">Occupation</label><br>
    <input type="text" name="stu_occ" id="stu_occ" value="<?php echo $row['stu_occ'] ?>"><br>
    <label for="up_img">Upload Image</label><br>
    <input type="file" name="fileToUpload" id="up_img"><br>
    <input type="submit" value="Update" name="submit"><br>
</form>
    <span>
        <?php
        if(isset($status))
        {
            if($status > 1)
            {
                echo "Updated Successfully !!";
            }
            else
            {
                echo "Can't Update right now :(";
            }
           
        }
        ?>
    </span>
</section>
<?php require 'stuaside.php'; ?>
