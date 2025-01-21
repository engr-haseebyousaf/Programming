<?php
$name = $_POST["name"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$country = $_POST["country"];
$conn = mysqli_connect("localhost","root","","mysql-crud");
$sql = "INSERT INTO students2 (name, age, gender,country) VALUES ('".$name."',".$age.",'".$gender."','".$country."');";
if (mysqli_query($conn, $sql)) {
    echo "Hello, ".$name." Your data is inserted";
}else {
    echo "Failed to insert data";
}