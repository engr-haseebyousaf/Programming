<?php
$conn = mysqli_connect("localhost","root","","mysql-crud") or die("connection error");
$query = "UPDATE students1 SET age = 10 WHERE age = 0;";
$result = mysqli_query($conn, $query) or die("Query Failed");
echo "Affected rows : " . mysqli_affected_rows($conn);
?>