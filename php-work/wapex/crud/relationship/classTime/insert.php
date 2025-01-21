<?php
include "config.php";
if (isset($_POST["insert"])) {
    $classTime = mysqli_real_escape_string($conn, $_POST["classTime"]);
    $classTimeDescription = mysqli_real_escape_string($conn, $_POST["classTimeDescription"]);
    $sql = "INSERT INTO `class_time` (`classTime`,`classTimeDescription`) VALUES ('$classTime','$classTimeDescription')";
    if (mysqli_query($conn, $sql)) {
        $msg = "<div class='alert alert-success'>Successfully Inserted</div>";
        header("Refresh:1,./index.php");
    }    
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Class Time | Insert</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php echo @$msg ?>
            </div>
        </div>
    </div>
    <div class="container py-3 mt-3 bg-warning">
        <form method="post">
            <div class="mb-3 row">
                <label for="classTime" class="col-4 col-form-label"><b>classTime</b></label>
                <div class="col-8">
                    <input type="time" required class="form-control" name="classTime" id="classTime" placeholder="classTime" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="classTimeDescription" class="col-4 col-form-label"><b>classTimeDescription</b></label>
                <div class="col-8">
                    <input type="text" required class="form-control" name="classTimeDescription" id="classTimeDescription" placeholder="classTimeDescription" />
                </div>
            </div>
            
            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn btn-primary" name="insert">
                        Insert
                    </button>
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