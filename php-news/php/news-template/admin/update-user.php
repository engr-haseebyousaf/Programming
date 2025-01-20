<?php include "header.php";

if ($_SESSION['user_role']==0) {
    header("Location: http://localhost/php/news-template/admin/post.php");
}
$id = $_GET['id'];
include 'config.php';
$sql = "SELECT * FROM user WHERE user_id = $id";
$result = mysqli_query($conn, $sql);

if (isset($_POST["submit"])) {
    $u_id = $_POST['user_id'];
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $sql = "UPDATE user SET first_name='$fname', last_name='$lname', username='$username',role=$role";
    if (mysqli_query($conn, $sql)) {
        header("Location: http://localhost/php/news-template/admin/users.php");
    } else {
        echo "<p style='color:red; text-align:center; margin:10px 0'>Failed to update record</p>";
    }
    
}

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)) {
    ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $row['user_id'] ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name'] ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name'] ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username'] ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                          <?php 
                            if ($row['user_id']==0) {
                            echo '<option selected value="0">normal User</option>
                            <option value="1">Admin</option>';
                          } else {
                            echo '<option value="0">normal User</option>
                            <option selected value="1">Admin</option>';
                          }
                        }
                           ?>
                              
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php } include "footer.php"; ?>
