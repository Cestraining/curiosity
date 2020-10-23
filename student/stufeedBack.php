<?php require 'stuheader.php'; ?>
<?php
    
    if(isset($_POST['submit']))
    {   
        $mess="";
        $feed=$_POST['feed'];
        $id=$_SESSION['stu_id'];
        if($feed=="")
        {
            $mess="data not set";
        }
        else
        {
            $result=$conn->query("SELECT f_id FROM feedBack WHERE  s_id='$id'");
            if($result->num_rows == 1)
            {
                $conn->query("UPDATE feedBack SET content='$feed' WHERE s_id='$id'");
                $mess="submitted successfully";
            }
            else
            {
                $conn->query("INSERT INTO feedBack(content,s_id) VALUES 
                ('$feed','$id')");
                $mess="submitted succesfully !!";
            }
            
        }

    }

?>
<section>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
        <label>Student ID</label><br>
        <input type="text" value="<?php echo $_SESSION['stu_id']; ?>" disabled><br>
        <label for="feedback">Write FeedBack</label><br>
        <textarea style="resize: vertical;" name="feed" id="feedback" cols="60" rows="7"></textarea><br>
        <input type="submit" value="Submit" name="submit">
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
