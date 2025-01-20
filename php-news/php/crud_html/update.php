<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>
    <?php
    if (isset($_POST['showbtn'])) {
        $id = $_POST['sid'];
        $conn = mysqli_connect('localhost','root','','crud') or die("connection failed");
        $sql = "select * from students where sid=$id" or die("query failed");
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result)
    ?>
    <form class="post-form" action="updatedata.php" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="sid"  value="<?php $row['sid'] ?>" />
            <input type="text" name="sname" value="<?php echo $row['sname'] ?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" value="<?php echo $row['sadress'] ?>" />
        </div>
        <div class="form-group">
        <label>Class</label>
        <?php 
            $sql1 = "select * from studentClass" or die("query failed");
            $result1 = mysqli_query($conn, $sql1);
            if(mysqli_num_rows($result1) > 0) {
                echo "<select name='sclass'>";
                
            while($row1 = mysqli_fetch_assoc($result1)) {
                ($id == $row1['cid'])? $selection='selected': $selection= '';
                echo "<option $selection>".$row1['cclass']."</option>";
                
            }
            echo "</select>";
        }
        
        
            ?>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" value="<?php echo $row['sphone'] ?>" />
        </div>
    <input class="submit" type="submit" value="Update"  />
    </form>
    <?php
    }
}
    ?>
</div>
</div>
</body>
</html>
