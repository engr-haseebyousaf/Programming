<?php
include "config.php";
$id = $_GET['id'];
$cat_id = $_GET['catid'];
$sql1 = "SELECT * FROM post WHERE post_id = $id;";
$result = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result);
unlink("upload/".$row['post_img']);
$sql = "DELETE FROM post WHERE post_id = $id;";
$sql .= "UPDATE category SET post = post - 1 WHERE category_id = $cat_id;";
if (mysqli_multi_query($conn,$sql)) {
    header("Location: http://localhost/php/news-template/admin/post.php");
}else {
    echo "<p class='alert alert-danger'>Failed to delete post!</p>";
}
?>