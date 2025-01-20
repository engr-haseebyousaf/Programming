<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php 
    include 'config.php';
    $sql = "select * from students inner join studentClass on students.sclass = studentClass.cid" or die("query failed");
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
    ?>
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>
        <?php 
        
            while($row = mysqli_fetch_assoc($result)) {
    ?>
            <tr>
                <td><?php echo $row['sid'] ?></td>
                <td><?php echo $row['sname'] ?></td>
                <td><?php echo $row['sadress'] ?></td>
                <td><?php echo $row['cclass'] ?></td>
                <td><?php echo $row['sphone'] ?></td>
                <td>
                    <a href='edit.php?id=<?php echo $row['sid'] ?>'>Edit</a>
                    <a href='delete-inline.php?id=<?php echo $row['sid'] ?>'>Delete</a>
                </td>
            </tr>
            <?php } ?> 
        </tbody>
    </table>
    <?php 
    }else{
        echo "<h2>Cannot fetch records</h2>";
    }
    mysqli_close($conn);
     ?>
</div>
</div>
</body>
</html>
