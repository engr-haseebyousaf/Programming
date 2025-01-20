<?php
session_start();
if ($_SESSION['user_role']==0) {
    header("Location: http://localhost/php/news-template/admin/post.php");
}
$id = $_GET['id'];
include 'config.php';
$sql = "DELETE FROM user WHERE user_id = $id";
$result = mysqli_query($conn, $sql);
if (isset($result)) {
    header("Location: http://localhost/php/news-template/admin/users.php");
}
?>