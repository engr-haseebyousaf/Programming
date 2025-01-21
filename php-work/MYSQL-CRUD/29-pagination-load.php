<?php
$conn = mysqli_connect("localhost","root","","mysql-crud") or die("connection error");
//variables used in pagination
$limit_per_page = 5;
if (isset($_POST["page"])) {
    $page = $_POST["page"];
}else{
    $page = 1;
}
$offset = ($page - 1) * $limit_per_page;
$query = "SELECT * FROM pagination LIMIT ".$offset.",".$limit_per_page.";";
$result = mysqli_query($conn,$query);

//----------------------------------
$output = "";
if (mysqli_num_rows($result)>0) {
    $output .= "<div class='container mt-2'>
    <div class='row'>
        <div class='col-md-8 mx-auto bg-warning'>
            <h1 class='text-primary'>Ajax Pagination</h1>
        </div>
        <div class='col-md-8 mx-auto'><table class='table table-striped table-hover'><thead>
    <tr>
        <th>ID</th>
        <th>NAME</th>
    </tr>
</thead>";
    while ($value = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
        <td>".$value["id"]."</td>
        <td>".$value["name"]."</td>
    </tr>";
    }
    $output .= "</table></div>
    </div>
</div>";
    $query2 = "SELECT * FROM pagination;";
    $result2 = mysqli_query($conn,$query2);
    $total_records = mysqli_num_rows($result2);
    $total_pages = ceil($total_records / $limit_per_page);
    $output .= "<div class='container' id='pagination-container'>
    <div class='row mt-auto'>
        <div class='col-md-4 mx-auto'>
            <div class='btn-group' id='pagination_button_group'>";
                for ($i=1; $i <= $total_pages; $i++) { 
                    if ($page == $i) {
                        $active = "active";
                    }else{
                        $active = "";
                    }
                    $output .= "<button class='btn btn-success ".$active."' id='".$i."'>".$i."</button>";
                }
            $output .= "</div>
        </div>
    </div>
</div>";
    echo $output;
}else{
    echo "<h2>No Record Found</h2>";
}
