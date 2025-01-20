<?php
echo $id = $_GET["id"];
include("config.php");
$sql = "DELETE FROM students where sid = $id" or die("query failed");
$result = mysqli_query($conn, $sql);
header("location: http://localhost/php/CRUD_HTML/index.php");
mysqli_close($conn);
?>