<?php
include "config.php";

if (isset($_POST["insert"])) {
    $student_name = mysqli_real_escape_string($conn, $_POST["student_name"]);
    $student_teacher = mysqli_real_escape_string($conn, $_POST["student_teacher"]);
    $ins_sql = "INSERT INTO `primary_key_student` (`student_name`,`student_teacher`) VALUES ('$student_name','$student_teacher')";
    if (mysqli_query($conn, $ins_sql)) {
        $msg = "<div class='alert alert-success'>Inserted Successfully</div>";
        header("Refresh:1,./student-show.php");
    } else {
        $msg = "<div class='alert alert-danger'>Inserted Un Successfully</div>";
    }

}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Insert Student</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container bg-success mt-3">
        <div class="row">
            <div class="col">
                <?php echo @$msg ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2>Insert Student</h2>
            </div>
        </div>
    </div>
    <div class="container bg-warning py-3">
        <form method="post">
            <div class="mb-3 row">
                <label for="student_name" class="col-4 col-form-label"><b>student_name</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" name="student_name" id="student_name"
                        placeholder="student_name" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="student_teacher" class="col-4 col-form-label"><b>student_teacher</b></label>
                <div class="col-8">
                    <select class="form-select" name="student_teacher" id="student_teacher">
                        <?php
                        $sql = "SELECT * FROM `primary_key_teacher`";
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <option value="<?php echo $row["teacher_id"] ?>"><?php echo $row["teacher_name"] ?></option>
                        <?php
                        }
                        ?>
                    </select>

                </div>
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <input type="submit" value="insert" class="btn btn-primary" name="insert">
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