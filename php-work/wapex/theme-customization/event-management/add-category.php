<?php
include "./includes/connection.php";
if (isset($_POST["addCategorySubmit"])) {
    $categoryTitle = strtolower(mysqli_real_escape_string( $conn ,$_POST["categoryTitle"]));
    $categoryDescription = mysqli_real_escape_string($conn, $_POST["categoryDescription"]);
    $categoryDate = date("Y-m-d");
    $sql = "SELECT * FROM `categories` WHERE `categoryTitle`='$categoryTitle'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res)>0) {
        echo "<script>alert('Category already exists')</script>";
    } else {
        $sqli = "INSERT INTO `categories` (`categoryTitle`,`categoryDescription`,`categoryDate`) VALUES ('$categoryTitle','$categoryDescription','$categoryDate');";
        if (mysqli_query($conn, $sqli)) {
            echo "<script>alert('Catetory Added Successfully')</script>";
        } else {
            echo "<script>alert('Can\'t add category')</script>";
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
                        <input name="categoryTitle" type="text" class="form-control" required>
                      </div>
                      <div class="form-group mb-0">
                        <label>Description</label>
                        <textarea name="categoryDescription" class="form-control" required></textarea>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <input type="submit" name="addCategorySubmit" value="Add Category" class="btn btn-primary">
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