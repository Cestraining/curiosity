<?php require 'adminheader.php'; ?>
<section>
<p class="t_title" style="text-align:start;">List of FeedBakcs</p>
<table>
    <tr>
    <th>FeedBack ID</th>
    <th>Content</th>
    <th>Student ID</th>
    <th>Action</th>
    </tr>
    <?php
        if(isset($_GET['delete']))
        {
            $id=$_GET['delete'];
            $sql="DELETE FROM feedBack WHERE f_id='$id'";
            if($conn->query($sql))
            {
                $mess="feedback deleted successfully";
            }
            else
            {
                $mess="Can't delete feedback right now !!";
            }
        }
     $sql="SELECT f_id,content,s_id FROM feedBack";
     $result=$conn->query($sql);
    while($row=$result->fetch_assoc())
    {?>
        <tr>
        <th><?php echo $row['f_id'] ?></th>
        <td><?php echo $row['content'] ?></td>
        <td><?php echo $row['s_id'] ?></td>
        <td class="ac"><a href="<?php echo $_SERVER['PHP_SELF'].'?delete='.$row['f_id']; ?>"><img class="icons" src="../images/trash-alt.svg"></img></a></td>
        </tr>
        <?php
    }
    ?>
    </table>
    <span><?php if(isset($mess)){echo $mess;} ?></span>
</section>
<?php require 'adminaside.php'; ?>
