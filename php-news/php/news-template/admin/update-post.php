<?php include "header.php";
include "config.php";
if (isset($_GET['id']) && isset($_GET['catid'])) {

$post_id = $_GET['id'];
$cat_id = $_GET['catid'];

if ($_SESSION['user_role'] == 0) {
    $sql2 = "SELECT * FROM post WHERE post_id = $post_id;";
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2)>0) {
        $row2 = mysqli_fetch_assoc($result2);
        if ($_SESSION["user_id"] != $row2['author']) {
            header("Location: http://localhost/php/news-template/admin/post.php");
        }
    }
}

$sql = "SELECT * FROM post
LEFT JOIN category ON post.category = category.category_id
LEFT JOIN user ON post.author = user.user_id
WHERE post.post_id = $post_id";
if ($result = mysqli_query($conn, $sql)) {
    while ($row = mysqli_fetch_array($result)) {
?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <form action="save-update-post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row['post_id']; ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['title']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5">
                <?php echo $row['description'] ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                    <?php
                    $sql1 = "SELECT * FROM category;" or die("Query Failed : ".mysqli_error($conn));
                    $result1 = mysqli_query($conn,$sql1);
                    if (mysqli_num_rows($result1)>0) {
                      while ($row1 = mysqli_fetch_assoc($result1)) {
                        if ($row1['category_id']==$cat_id) {
                            $selected = "selected";
                        }else {
                            $selected = "";
                        }
                        echo "<option $selected value='".$row1['category_id']."'>".$row1['category_name']."</option>";
                      }
                    }
                    ?>
                </select>
                <input type="hidden" name="old_category" value="<?php echo $row['category']; ?>">
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="upload/<?php echo $row['post_img']; ?>" height="150px">
                <input type="hidden" name="old-image" value="<?php echo $row['post_img'] ?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <?php 
    }
}
}else {
    header("Location: http://localhost/php/news-template/admin/post.php");
}
        ?>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>