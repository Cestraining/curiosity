<?php require 'adminheader.php'; ?>
<?php 
    $sql="SELECT stu_id,stu_name,stu_email,stu_pass,stu_occ FROM student";
    $result=$conn->query($sql);
?>
<section>
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
</section>
<?php require 'adminaside.php'; ?>
