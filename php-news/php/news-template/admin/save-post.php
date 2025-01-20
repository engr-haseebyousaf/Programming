<?php
if (isset($_POST['submit'])) {
    include "config.php";
    
    if (isset($_FILES['fileToUpload'])) {
        $errors = array();
        $file_name = $_FILES['fileToUpload']['name'];
        $file_temp_name = $_FILES['fileToUpload']['tmp_name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_type = $_FILES['fileToUpload']['type'];
        $file_name_list = explode(".",$file_name);
        $file_ext = strtolower(end($file_name_list));
        $extensions = array("jpg","jpeg","png");
        if (in_array($file_ext,$extensions)===false) {
            $errors[] = "This file extension is not allowed, <br>please select the .png,jpg or jpeg format";
        }
        if ($file_size > 2097152) {
            $errors[] = "Please select the file less than 2mb";
        }
        if(empty($errors)==true){
            move_uploaded_file($file_temp_name, "upload/".$file_name);
            $post_title = mysqli_real_escape_string($conn,$_POST['post_title']);
            $post_description = mysqli_real_escape_string($conn,$_POST['postdesc']);
            $post_category = mysqli_real_escape_string($conn,$_POST['category']);
            $date = date("d M, Y");
            session_start();
            $author = $_SESSION["user_id"];
            $sql = "INSERT INTO post(title,description,category,post_date,author,post_img) VALUES('$post_title','$post_description','$post_category','$date',$author,'$file_name');";
            $sql .= "UPDATE category set post = post + 1 where category_id = $post_category;";
            if (mysqli_multi_query($conn,$sql)) {
                header("Location: http://localhost/php/news-template/admin/post.php");
            }else {
                echo "<p class='alert alert-dangere'>Failed to insert post!</p>";
            }
        }else{
            echo "<pre>";
            print_r($errors);
            echo "</pre>";
            die();
        }
    }
}


?>