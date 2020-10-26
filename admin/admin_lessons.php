<?php require 'adminheader.php'; ?>
<section>
<?php
if(!isset($_GET['action']) && !isset($_GET['edit']))
{?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="checkid" placeholder="Enter Course ID">
            <input type="submit" value="Search"><br>
        </form>

<?php
}
if(isset($_GET['delete']))
{
    $leid=$_GET['delete'];
    $sql="DELETE FROM lesson WHERE l_id='$leid'";

    if($conn->query($sql))
    {
        $mess="deleted successfully !!";
    }
    else
    {
        $mess="can't delete right now :( ";

    }

}

if(isset($_GET['checkid']))
{
    $c_id=$_GET['checkid'];
    $result=$conn->query("SELECT c_id,c_name FROM course WHERE c_id='$c_id'");
    if($result->num_rows == 0)
    {
        echo "course doesn't exit";
        
    }
    else
    {
        $row=$result->fetch_assoc();

        $lc_id=$row['c_id'];
        $lcn=$row['c_name'];
        $sql="SELECT l_id,l_name,l_link FROM lesson WHERE lc_id='$lc_id'";
        $result=$conn->query($sql);
?>
        <p class="t_title" style="text-align:start;"><?php echo "Course ID: ".$row['c_id']." Course Name: ".$row['c_name']; ?></p>

        <table>
        <tr>
        <th>Lesson ID</th>
        <th>Lesson Name</th>
        <th>Lesson Link</th>
        <th colspan="2">Action</th>
        </tr>
        <?php
        while($row=$result->fetch_assoc())
        {?>
        <tr>
        <th><?php echo $row['l_id'] ?></th>
        <td><?php echo $row['l_name'] ?></td>
        <td><?php echo $row['l_link'] ?></td>
        <td class="ac"><a href="<?php echo $_SERVER['PHP_SELF'].'?edit='.$row['l_id'].'&c='.$lc_id.'&cn='.$lcn; ?>"><img class="icons" src="../images/edit.svg"></img></a></td>
        <td class="ac"><a href="<?php echo $_SERVER['PHP_SELF'].'?delete='.$row['l_id'].'&checkid='.$lc_id; ?>"><img class="icons" src="../images/trash-alt.svg"></img></a></td>
        </tr>
        <?php
        }
        ?>
        </table>
        <span><?php if(isset($mess)){echo $mess;} ?></span><br>

        <a href="<?php echo $_SERVER['PHP_SELF'].'?action='.$lc_id; ?>" class="add" ><img style="width:50px; height:50px" src="../images/plus-square.svg" alt=""></a>

<?php
    }
}
if(isset($_GET['action']))
{
    if($_GET['action'] == "Submit")
    {       
        $mess="";
        $name=$_GET['name'];
        $link=$_GET['link'];
        $lcid=$_GET['c_id'];
        if($name == "" || $link == "")
        {
            $mess="please complete the form";
        }
        else
        {
            $sql="INSERT INTO lesson(l_name,l_link,lc_id) VALUES('$name','$link','$lcid')";
            if($conn->query($sql))
            {
                $mess="Lesson added successfully !!";
            }
            else
            {
                $mess="can't add Lesson right now :( ";
            }
        }
        $result=$conn->query("SELECT c_id,c_name FROM course WHERE c_id='$lcid'");
        $row=$result->fetch_assoc();

    }
    else
    {   
        $id=$_GET['action'];
        $result=$conn->query("SELECT c_id,c_name FROM course WHERE c_id='$id'");
        $row=$result->fetch_assoc();
    }
 
?>  

    <h1>Add New Lesson</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">

    <label>Course ID</label><br>
    <input type="text" name="c_id" value="<?php echo $row['c_id']; ?>" readonly><br>

    <label>Course Name</label><br>
    <input type="text" value="<?php echo $row['c_name'] ?>" readonly><br>

    <label for="lname">Lesson Name</label><br>
    <input type="text" name="name" id="lname"><br>

    <label for="llink">Lesson V.Link</label><br>
    <input type="text" name="link" id="llink"><br>

    <input type="submit" name="action" value="Submit"><br>
    <a href="admin_lessons.php?checkid=<?php echo $row['c_id']; ?>">Close</a>
</form>
    <span><?php if(isset($mess)){echo $mess;} ?></span>

<?php
}
if(isset($_GET['edit']))
{
    $coid=$_GET['c'];
    $coname=$_GET['cn'];
    $leid=$_GET['edit'];

    if($_GET['edit']=="Update")
    {  
        $leid=$_GET['lessonid'] ;
        $mess="";
        $name=$_GET['name'];
        $link=$_GET['link'];
        if($name == "" || $link == "")
        {
            $mess="please complete the form";
        }
        else
        {
            $sql="UPDATE lesson SET l_name='$name',l_link='$link' WHERE l_id='$leid'";
            if($conn->query($sql))
            {
                $mess="Lesson Updated successfully !!";
            }
            else
            {
                $mess="can't update Lesson right now :( ";
            }
        }
       
    }
        
        $result=$conn->query("SELECT l_id,l_name,l_link FROM lesson WHERE l_id='$leid'");
        $row=$result->fetch_assoc();
    
    

    ?>

    <h1>Update Lesson Details</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">

    <label>Course ID</label><br>
    <input type="text" name="c" value="<?php echo $coid; ?>" readonly><br>

    <label>Course Name</label><br>
    <input type="text" name="cn" value="<?php echo $coname; ?>" readonly><br>

    <label>Lesson ID</label><br>
    <input type="text" name="lessonid" value="<?php echo $row['l_id'] ?>" readonly><br>

    <label for="name">Lesson Name</label><br>
    <input type="text" value="<?php echo $row['l_name'] ?>" name="name" id="name"><br>

    <label for="link">Lesson V.Link</label><br>
    <input type="text" value="<?php echo $row['l_link'] ?>" name="link" id="link"><br><br>

     <iframe width="420px" height="200px"
     src="https://www.youtube.com/embed/<?php echo $row['l_link'];?>"
      frameborder="0">
     </iframe> <br>

    <input type="submit" name="edit" value="Update">
    <a href="admin_lessons.php?checkid=<?php echo $coid; ?>">Close</a>
</form>
    <span><?php if(isset($mess)){echo $mess;} ?></span>
<?php
}
?>
</section>
<?php require 'adminaside.php'; ?>