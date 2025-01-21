<?php
include "./includes/connection.php";
$id = $_GET["categoryId"];
$sql = "SELECT * FROM `categories` WHERE `categoryId`='$id'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
if (isset($_POST["updateCategorySubmit"])) {
    $categoryTitle = strtolower(mysqli_real_escape_string( $conn ,$_POST["categoryTitle"]));
    $categoryDescription = mysqli_real_escape_string($conn, $_POST["categoryDescription"]);
    $sql2 = "SELECT * FROM `categories` WHERE `categoryTitle`='$categoryTitle'";
    $res2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($res2)>0) {
        echo "<script>alert('Category already exists')</script>";
    } else {
        $sqli = "UPDATE `categories` SET `categoryTitle`='$categoryTitle',`categoryDescription`='$categoryDescription' WHERE `categoryId`='$id';";
        if (mysqli_query($conn, $sqli)) {
            echo "<script>alert('Catetory Updated Successfully')</script>";
            header("Refresh:2,./categories.php");
        } else {
            echo "<script>alert('Can\'t Update category')</script>";
        }
    }
    
}
include "./includes/header.php";
include "./includes/sidebar.php";
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row justify-content-center">
              <div class="col-12 col-md-6 col-lg-8">
                <div class="card">
                  <form method="post">
                    <div class="card-header">
                      <h4>Add Category</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Title</label>
                        <input name="categoryTitle" value="<?php echo $row["categoryTitle"] ?>" type="text" class="form-control" required>
                      </div>
                      <div class="form-group mb-0">
                        <label>Description</label>
                        <textarea name="categoryDescription" class="form-control" required><?php echo $row["categoryDescription"] ?></textarea>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <input type="submit" name="updateCategorySubmit" value="Add Category" class="btn btn-primary">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <?php
  include "./includes/footer.php";
  ?>
</body>


</html>