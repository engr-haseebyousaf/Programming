<?php
$update_modal_id = $_POST["updateId"];
$conn = mysqli_connect("localhost","root","","mysql-crud") or die("connection error");
$query = "SELECT * FROM students1 WHERE id = ".$update_modal_id.";";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result)>0) {
    $values = mysqli_fetch_assoc($result);
    echo "<div class='row form-group px-5'>
    <div class='col-md-4'>
        <label>First Name</label>
    </div>
    <div class='col-md-8'>
        <input type='text' name='update-lname' id='update_fname' value='".$values["fname"]."' class='form-control'>
        <input type='text' name='update-id' id='update_id' hidden value='".$values["id"]."' class='form-control'>
    </div>
</div>
<div class='row form-group px-5'>
    <div class='col-md-4'>
        <label>Last Name</label>
    </div>
    <div class='col-md-8'>
        <input type='text' name='update-lname' id='update_lname' value='".$values["lname"]."' class='form-control'>
    </div>
</div>
<div class='row form-group px-5'>
    <div class='col-md-4'>
        <label>Age</label>
    </div>
    <div class='col-md-8'>
        <input type='text' name='update-age' id='update_age' value='".$values["age"]."' class='form-control'>
    </div>
</div>
<div class='row form-group px-5'>";
}else {
    echo "<h3 id='record_not_found_modal'>Record Not Found!</h3>";
}