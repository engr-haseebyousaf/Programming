<?php
$conn = mysqli_connect("localhost","root","","mysql-crud") or die("connection error");
$query = "SELECT * FROM students1";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result)>0) {
    $output = "<table class=\"table table-striped table-hover table-bordered mx-0 px-0 w-100\">
    <thead class=\"table-warning\">
        <th width='100px'>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th width='100px'>Edit</th>
        <th width='100px'>Delete</th>
    </thead>
    <tbody>
    ";
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>"."<td>".$row["id"]."</td>"."<td>".$row["fname"]." ".$row["lname"]."</td>"."<td>".$row["age"]."</td>"."<td><button class='edit-btn' data-eid='".$row["id"]."'>Edit</button></td>"."<td><button class='delete-btn' data-did='".$row["id"]."'>Delete</button></td>"."</tr>";
    }
    $output .= "</tbody></table>";
    echo $output;
}else {
    "<h2>No Result Found</h2>";
}