<?php require 'stuheader.php'; ?>
<?php
    $id=$_SESSION['stu_id'];
    $sql="SELECT stu_email FROM student
    WHERE stu_id=$id";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    if(isset($_POST['submit']))
    {   
        $mess="";
        $nPass=$_POST['nPass'];
        if($nPass=="")
        {
            $mess="data not set";
        }
        else
        {
            $conn->query("UPDATE student SET stu_pass='$nPass' WHERE stu_id='$id'");
            $mess="password changed succesfully !!";
        }

    }
?>
<section>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  autocomplete="off">
    <label>Email</label><br>
    <input type="text" value="<?php echo $row['stu_email'] ?>" disabled><br>
    <label for="nPass">New Password</label><br>
    <input type="text" name="nPass" id="nPass"><br>
    <input type="submit" value="Update" name="submit">
    <input type="reset" value="Reset">
    </form>         
    <span>
    <?php
    if(isset($mess))
    {
        echo $mess;
    }
    
    ?>
    </span>

</section>
<?php require 'stuaside.php'; ?>
