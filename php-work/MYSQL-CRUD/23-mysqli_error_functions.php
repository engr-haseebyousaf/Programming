<?php
error_reporting(E_ALL);
$conn = mysqli_connect("localhost","root1","","mysql-crud") or die("connection error : " . mysqli_error($conn));
$query = "SELECT * FROM students1"; 
$result = mysqli_query($conn, $query) or die("Query Failed");
if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['fname']." ".$row["lname"]."<br>";
    }
}
?>