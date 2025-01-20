<?php include "header.php";
include "config.php";
$id = $_GET['id'];

$sql = "SELECT * FROM category WHERE category_id = '$id'" or die("Query Failed");
$result = mysqli_query($conn, $sql) or die("Connection Failed".mysqli_error($conn));
$row = mysqli_fetch_array($result);
if (isset($_POST['sumbit'])) {
    $cat_id = $_POST['cat_id'];
    $updated_category = $_POST['cat_name'];
    $category = $_POST['cat_name'];
    $sql = "UPDATE category SET category_name = '$updated_category' WHERE category_id = $cat_id" or die("Query Failed");
    if (mysqli_query($conn, $sql)) {
        header("Location: http://localhost/php/news-template/admin/category.php");
    } else {
        echo "<p style='color:red; text-align:center; margin:10px 0'>Failed to update record</p>";
    }
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $id ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name'] ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
