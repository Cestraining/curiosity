<?php require 'adminheader.php'; ?>
<section>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input type="date" name="from">To
        <input type="date" name="to">
        <input type="submit" name="c_enroll" value="Search">
    </form>
<?php
    if(isset($_GET['c_enroll']))
{
    $from=$_GET['from'];
    $to=$_GET['to'];
    $result=$conn->query("SELECT * FROM course_enroll WHERE e_date >= '$from' AND e_date <= '$to' ");
    if($result->num_rows == 0)
    {
       $mess="No enroll between given dates";
        
    }
    else
    {
    ?>
        <p class="t_title" style="text-align:start;">Details</p>

        <table>
        <tr>
        <th>Enroll ID</th>
        <th>Course ID</th>
        <th>Student Email</th>
        <th>Enroll Date</th>
        </tr>
        <?php
        while($row=$result->fetch_assoc())
        {?>
        <tr>
        <th><?php echo $row['cn_id'] ?></th>
        <td><?php echo $row['c_id'] ?></td>
        <td><?php echo $row['s_email'] ?></td>
        <td><?php echo $row['e_date'] ?></td>
        </tr>
        <?php
        }
        ?>
        </table>
    <?php
    }
    
}        
        ?>
        
        <span><?php if(isset($mess)){echo $mess;} ?></span><br>
</section>
<?php require 'adminaside.php'; ?>
