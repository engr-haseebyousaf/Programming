<?php
$file_url = "json/dynamic.json";
if (file_exists($file_url) && is_readable($file_url)) {
    $current_data_json = file_get_contents($file_url);
    $current_data_array = json_decode($current_data_json);
    if ($_POST["id"] == "" || $_POST["name"] == "" || $_POST["dob"] == "") {
        echo "All fields are required";
    }else {
        $updated_data_array = array(
            "id" => $_POST["id"],
            "name" => $_POST["name"],
            "dob" => $_POST["dob"]
        );
        $current_data_array[] = $updated_data_array;
        $updated_data_json = json_encode($current_data_array, JSON_PRETTY_PRINT);
        if (file_put_contents($file_url,$updated_data_json)) {
            echo "File Inserted successfully";
        }
    }
}else{
    echo "File Not Found.";
}
