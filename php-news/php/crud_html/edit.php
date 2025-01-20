<?php include 'header.php'; ?>

<div id="main-content">
    <h2>Update Record</h2>
    <?php 
    $id = $_GET['id'];
    $conn = mysqli_connect('localhost','root','','crud') or die("connection failed");
    $sql = "select * from students where students.sid = $id" or die("query failed");
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result)
    ?>
    <form class="post-form" action="updatedata.php" method="post">
      <div class="form-group">
          <label>Name</label>
          <input type="hidden" name="sid" value="<?php echo $id ?>"/>
          <input type="text" name="sname" value="<?php echo $row['sname'] ?>"/>
      </div>
      <div class="form-group">
          <label>Address</label>
          <input type="text" name="sadress" value="<?php echo $row['sadress'] ?>"/>
      </div>
      <div class="form-group">
          <label>Class</label>
          
            <?php 
            $sql1 = "select * from studentClass" or die("query failed");
            $result1 = mysqli_query($conn, $sql1);
            if(mysqli_num_rows($result1) > 0) {
                echo "<select name='sclass'>";
            while($row1 = mysqli_fetch_assoc($result1)) {
                if($id == $row1['cid']){
                    $selection = "selected";
                }
                else{
                    $selection = "";
                }
                echo "<option $selection value='1'>".$row1['cclass']."</option>";
            }
            echo "</select>";
        }
        
        
            ?>
                     
      </div>
      <div class="form-group">
          <label>Phone</label>
          <input type="text" name="sphone" value="<?php echo $row['sphone'] ?>"/>
      </div>
      <input class="submit" type="submit" value="Update"/>
    </form>
    <?php
    }else{
        echo 'Connection is failed';
    }
    mysqli_close($conn);

    ?>
</div>
</div>
</body>
</html>