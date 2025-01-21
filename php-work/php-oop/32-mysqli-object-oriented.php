<?php
use FTP\Connection;
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "students";
$conn = new mysqli($serverName, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Error : " . $conn->connect_error);
}
$query = "SELECT * FROM students2";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "{$row["id"]} - {$row["name"]} - {$row["age"]} - {$row["class"]}<br>";
    }
}