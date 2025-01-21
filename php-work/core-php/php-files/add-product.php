<?php
include "config.php";
if (isset($_FILES["add-product-featured-image"])) {
    $featured_img = $_FILES["add-product-featured-image"]["name"];
    $featured_img_tmp = $_FILES["add-product-featured-image"]["tmp_name"];

}



if (isset($_FILES["file1"])) {
    $img1_name = $_FILES["file1"]["name"];
    $img1_tmp_name = $_FILES["file1"]["tmp_name"];
    move_uploaded_file($img1_tmp_name, "../uploads/images/$img1_name");
} else {
    $img1_name = "";
}
if (isset($_FILES["file2"])) {
    $img2_name = $_FILES["file2"]["name"];
    $img2_tmp_name = $_FILES["file2"]["tmp_name"];
    move_uploaded_file($img2_tmp_name, "../uploads/images/$img2_name");
} else {
    $img2_name = "";
}
if (isset($_FILES["file3"])) {
    $img3_name = $_FILES["file3"]["name"];
    $img3_tmp_name = $_FILES["file3"]["tmp_name"];
    move_uploaded_file($img3_tmp_name, "../uploads/images/$img3_name");
} else {
    $img3_name = "";
}


$sql = "INSERT INTO images (featured_image, side_image_one, side_image_two, side_image_three) VALUES ( '$featured_img', '$img1_name', '$img2_name', '$img3_name');";
// die($sql);
mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
    move_uploaded_file($featured_img_tmp, "../uploads/images/$featured_img");
    echo json_encode(["success"=>"inserted successfully"]);
    exit;
}