<?php
include "config.php";
$post_id = $_POST['post_id'];
$post_title = $_POST['post_title'];
$post_description = $_POST['postdesc'];
$post_category = $_POST['category'];
$old_category = $_POST['old_category'];
if(empty($_FILES['new-image']['name'])) {
    $post_image_name = $_POST['old-image'];
    $sql = "UPDATE post SET title = '$post_title', description = '$post_description', category = $post_category, post_img = '$post_image_name'
    WHERE post_id = $post_id;";
    if ($post_category != $old_category) {
        $sql .= "UPDATE category SET post = post - 1 WHERE category_id = $old_category;";
        $sql .= "UPDATE category SET post = post + 1 WHERE category_id = $post_category;";
    }
    if(mysqli_multi_query($conn,$sql)) {
        header("Location: http://localhost/php/news-template/admin/post.php");
    }else {
        echo "<p class='alert alert-danger'>Failed to insert post!</p>";
    }
}else {
    $post_image_name = $_FILES['new-image']['name'];
    $errors = array();
    $file_name = $_FILES['new-image']['name'];
    $file_temp_name = $_FILES['new-image']['tmp_name'];
    $file_size = $_FILES['new-image']['size'];
    $file_size = $_FILES['new-image']['size'];
    $file_type = $_FILES['new-image']['type'];
    $file_name_list = explode(".",$file_name);
    $file_ext = strtolower(end($file_name_list));
    $extensions = array("jpg","jpeg","png");
    if(in_array($file_ext,$extensions)===false) {
        $errors[] = "This file extension is not allowed, <br>please select the .png,jpg or jpeg format";
    }
    if ($file_size > 2097152) {
        $errors[] = "Please select the file less than 2mb";
    }
    if(empty($errors)==true){
        move_uploaded_file($file_temp_name, "upload/".$file_name);
        $sql1 = "UPDATE post SET title = '$post_title', description = '$post_description', category = $post_category, post_img = '$post_image_name' WHERE post_id = $post_id;";
        if ($post_category != $old_category) {
            $sql1 .= "UPDATE category SET post = post - 1 WHERE category_id = $old_category;";
            $sql1 .= "UPDATE category SET post = post + 1 WHERE category_id = $post_category;";
        }
        
        if (mysqli_multi_query($conn,$sql1)) {
            header("Location: http://localhost/php/news-template/admin/post.php");
            unlink("upload/".$_POST['old-image']);
        }else {
            echo "<p class='alert alert-danger'>Failed to insert post!</p>";
        }
    }else{
        echo "<pre>";
        print_r($errors);
        echo "</pre>";
        die();
    }
}
?>