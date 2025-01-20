<?php
include 'header.php';
if (isset($_POST['deletebtn'])) {
    $id = $_POST["sid"];
    include("config.php");
    $sql = "delete from students where sid = $id" or die("query failed");
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header("location: http://localhost/php/CRUD_HTML/index.php");
    mysqli_close($conn);
}
?>


<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</div>
</body>
</html>
