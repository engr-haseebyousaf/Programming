<?php
if (isset($_POST["Data"])) {
    $last_id = $_POST["Data"];
}else {
    $last_id = 0;
}

$conn = mysqli_connect("localhost","root","","mysql-crud") or die("connection error");
$query = "SELECT * FROM pagination LIMIT ".$last_id.", 5;";
$result = mysqli_query($conn, $query);
$output = "";
if (mysqli_num_rows($result)>0) {
    $output .= "
    
    <tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        $lid = $row["id"];
        $output .= "
            <tr>
                <td>".$row["id"]."</td>
                <td>".$row["name"]."</td>
            </tr>
        ";
    }
    $output .= "</tbody><tbody id='pagination'><tr>
    <td colspan='2'>
    <div class='col-md-8 mx-auto'>
    <button type='button' data-id='".$lid."' id='load_more_btn' class='btn btn-lg disable btn-primary mx-auto d-block'>Load More</button>
</div></td>
</tr></tbody>";
    echo $output;
}else {
    $output .= "";
}