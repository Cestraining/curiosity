<?php require 'adminheader.php'; ?>
<?php 
    $sql="SELECT stu_id,stu_name,stu_email,stu_pass,stu_occ FROM student";
    $result=$conn->query($sql);
?>
<section>
<!-- SECTION START-------------------------------------------->
<?php 
if(isset($_GET['action']))
{
// ACTION START-----------------------------------------
    if($_GET['action'] == "submit")
    {       
        $mess="";
        $name=$_GET['name'];
        $email=$_GET['email'];
        $pass=$_GET['pass'];
        $occ=$_GET['occ'];
        if($name == "" || $email == "" || $pass == "" || $occ == "")
        {
            $mess="please complete the form";
        }
        else
        {
            $sql="INSERT INTO student(stu_name,stu_email,stu_pass,stu_occ) VALUES('$name','$email','$pass','$occ')";
            if($conn->query($sql) == true)
            {
                $mess="student added successfully !!";
            }
            else
            {
                $mess="can't add student right now :( ";
            }
        }
    }
 
?>  

    <h1>Add New Student</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
    <input type="hidden" name="action" value="submit">
    <label for="name">Name</label><br>
    <input type="text" name="name" id="name"><br>
    <label for="email">Email</label><br>
    <input type="text" name="email" id="email"><br>
    <label for="pass">Password</label><br>
    <input type="text" name="pass" id="pass"><br>
    <label for="occ">Occupation</label><br>
    <input type="text" name="occ" id="occ"><br>
    <input type="submit" name="submit" value="Submit"><br>
    <a href="admin_stu.php">Close</a>
</form>
    <span><?php if(isset($mess)){echo $mess;} ?></span>
<?php
// ACTION END-----------------------------------------------
}
if(isset($_GET['edit']))
{
    
    if($_GET['edit']=="submit")
    {
        $mess="";
        $name=$_GET['name'];
        $email=$_GET['email'];
        $pass=$_GET['pass'];
        $occ=$_GET['occ'];
        $stu_id=$_GET['stu_id'];
        if($name == "" || $email == "" || $pass == "" || $occ == "")
        {
            $mess="please complete the form";
            while($row=$result->fetch_assoc())
                      {
                          if($row['stu_id'] == $_GET['stu_id'])
                          {
                              break;
                          }
                      }
        }
        else
        {
            $sql="UPDATE student SET stu_name='$name',stu_email='$email',stu_pass='$pass',stu_occ='$occ' WHERE stu_id='$stu_id'";
            if($conn->query($sql) == true)
            {   
                $sql="SELECT stu_id,stu_name,stu_email,stu_pass,stu_occ FROM student";
                $result=$conn->query($sql);
                while($row=$result->fetch_assoc())
                      {
                        
                          if($row['stu_id'] == $_GET['stu_id'])
                          {
                              break;
                          }
                      }
                $mess="student details updated successfully !!";
            }
            else
            {
                $mess="can't update student details right now :( ";
            }
        }
    }
    else
    {
        while($row=$result->fetch_assoc())
    {
        if($row['stu_id'] == $_GET['edit'])
        {
            break;
        }
    }
    }

    ?>

    <h1>Update Student Details</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
    <input type="hidden" name="edit" value="submit">
    <label>ID</label><br>
    <input type="text" name="stu_id" value="<?php echo $row['stu_id'] ?>" readonly><br>
    <label for="name">Name</label><br>
    <input type="text" value="<?php echo $row['stu_name'] ?>" name="name" id="name"><br>
    <label for="email">Email</label><br>
    <input type="text" value="<?php echo $row['stu_email'] ?>" name="email" id="email"><br>
    <label for="pass">Password</label><br>
    <input type="text" value="<?php echo $row['stu_pass'] ?>" name="pass" id="pass"><br>
    <label for="occ">Occupation</label><br>
    <input type="text" value="<?php echo $row['stu_occ'] ?>" name="occ" id="occ"><br>
    <input type="submit" value="Update">
    <a href="admin_stu.php">Close</a>
</form>
    <span><?php if(isset($mess)){echo $mess;} ?></span>
<?php
}
$mess="";
if(isset($_GET['delete']))
{   
    
    $stu_id=$_GET['delete'];
    $sql="DELETE FROM student WHERE stu_id=$stu_id";
    $result=$conn->query("SELECT stu_img FROM student WHERE stu_id=$stu_id");
    $row=$result->fetch_assoc();
    if($conn->query($sql))
    {
        if($row['stu_img']!="/images/stu_images/default.svg" && $row['stu_img'] != "")
        {
            unlink($row['stu_img']);
        }
       
        if(isset($_SESSION['islogin']))
        {
            unset($_SESSION['islogin']);
        }
        $mess="deleted successfully !!";
    }
    else
    {
        $mess="can't delete right now :( ";
    }

}
?>

<?php
if(!isset($_GET['edit']) && !isset($_GET['action']))
{
   
    $sql="SELECT stu_id,stu_name,stu_email,stu_pass,stu_occ FROM student";
    $result=$conn->query($sql);
?>


<p class="t_title" style="text-align:start;">List of Students</p>
    <table>
    <tr>
    <th>Student ID</th>
    <th>Name</th>
    <th>Email</th>
    <th colspan="2">Action</th>
    </tr>
    <?php
    while($row=$result->fetch_assoc())
    {?>
        <tr>
        <th><?php echo $row['stu_id'] ?></th>
        <td><?php echo $row['stu_name'] ?></td>
        <td><?php echo $row['stu_email'] ?></td>
        <td class="ac"><a href="<?php echo $_SERVER['PHP_SELF'].'?edit='.$row['stu_id']; ?>"><img class="icons" src="../images/edit.svg"></img></a></td>
        <td class="ac"><a href="<?php echo $_SERVER['PHP_SELF'].'?delete='.$row['stu_id']; ?>"><img class="icons" src="../images/trash-alt.svg"></img></a></td>
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
