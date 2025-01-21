<?php
include "config.php";
if (isset($_POST["insert"])) {
    $teacher_name = mysqli_real_escape_string($conn, $_POST["teacher_name"]);
    $sql = "INSERT INTO `primary_key_teacher` (`teacher_name`) VALUES ('$teacher_name')";
    if (mysqli_query($conn, $sql)) {
        $msg = "<div class='alert alert-success'>Successfully Inserted</div>";
        header("Refresh:1,./student-show.php");
    } else {
        $msg = "<div class='alert alert-danger'>Un Successfully Inserted</div>";

    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Insert Teacher</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="row">
            <?php echo @$msg ?>
        </div>
    </div>
    <div class="container bg-warning py-3 my-3">
        <form method="post">
            <div class="mb-3 row">
                <label for="teacher_name" class="col-4 col-form-label">teacher_name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="teacher_name" id="teacher_name" placeholder="teacher_name" />
                </div>
            </div>
            <div class="row">
                <div class="col-8 offset-sm-4">
                    <input type="submit" value="Insert" name="insert" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

</html>