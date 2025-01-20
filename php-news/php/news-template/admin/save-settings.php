<?php
include "config.php";
if (!empty($_POST['website_name']) && !empty($_POST['website_description'])) {
    
$web_name = $_POST['website_name'];
$website_descroption = $_POST['website_description'];
if(empty($_FILES['website_logo']['name'])) {
    $post_image_name = $_POST['old_logo'];
    $sql = "UPDATE setting1 SET web_name = '$web_name', web_footer = '$website_descroption', web_img = '$post_image_name';";
    if(mysqli_query($conn,$sql)) {
        header("Location: http://localhost/php/news-template/admin/setting.php");
    }else {
        echo "<p class='alert alert-danger'>Failed to update setting!</p>";
    }
}else {
    $post_image_name = $_FILES['website_logo']['name'];
    $errors = array();

    $file_temp_name = $_FILES['website_logo']['tmp_name'];
    $file_size = $_FILES['website_logo']['size'];
    $file_size = $_FILES['website_logo']['size'];
    $file_type = $_FILES['website_logo']['type'];
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
        move_uploaded_file($file_temp_name, "images/".$post_image_name);
        $sql = "UPDATE setting1 SET web_name = '$web_name', web_footer = '$website_descroption', web_img = '$post_image_name';";
        if (mysqli_query($conn,$sql)) {
            header("Location: http://localhost/php/news-template/admin/setting.php");
            unlink("images/".$_POST['old_logo']);
        }else {
            echo "<p class='alert alert-danger'>Failed to update setting1!</p>";
        }
    }else{
        echo "<pre>";
        print_r($errors);
        echo "</pre>";
        die();
    }
}
}else {
    header("Location: http://localhost/php/news-template/admin/setting1.php");
}
?>