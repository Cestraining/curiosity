<?php require 'adminheader.php'; ?>
<?php
    $id=$_SESSION['a_id'];
    $sql="SELECT a_email FROM admin 
    WHERE a_id=$id";
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
            $conn->query("UPDATE admin SET a_pass='$nPass' WHERE a_id='$id'");
            $mess="password changed succesfully !!";
        }

    }
?>
<section>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  autocomplete="off">

    <label>Email</label><br>
    <input type="text" value="<?php echo $row['a_email'] ?>" disabled><br>

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
<?php require 'adminaside.php'; ?>
