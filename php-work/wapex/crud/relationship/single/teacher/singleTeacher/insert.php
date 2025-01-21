<?php
include "connect.php";
if (isset($_POST["teacherInsert"])) {
    $teacherFirstName = mysqli_real_escape_string($conn, $_POST["teacherFirstName"]);
    $teacherLastName = mysqli_real_escape_string($conn, $_POST["teacherLastName"]);
    $teacherStudent = mysqli_real_escape_string($conn, $_POST["teacherStudent"]);
    $teacherClass = mysqli_real_escape_string($conn, $_POST["teacherClass"]);
    $teacherPhone = mysqli_real_escape_string($conn, $_POST["teacherPhone"]);
    $teacherEmail = mysqli_real_escape_string($conn, $_POST["teacherEmail"]);
    $teacherPic = $_FILES["teacherPic"]["name"];
    if (empty($teacherFirstName) || empty($teacherLastName) || empty($teacherEmail) || empty($teacherPhone) || empty($teacherPic)) {
        $msg = "<div class='alert alert-danger'>Please Fill All Values</div>";
    } else {
        $fileExt = pathinfo($teacherPic, PATHINFO_EXTENSION);
        $allowedExtensions = ["jpg","jpeg","png"];
        if (in_array($fileExt, $allowedExtensions)) {
            $teacherPicName = date("H-m-i") . "-" . random_int(100000, 999999) . "." . $fileExt;
            $insert_sql = "INSERT INTO `relationshipteacher` (`teacherFirstName`,`teacherLastName`,`teacherStudent`,`teacherClass`,`teacherPhone`,`teacherEmail`,`teacherPic`) VALUES ('$teacherFirstName','$teacherLastName','$teacherStudent','$teacherClass','$teacherPhone','$teacherEmail','$teacherPicName')";
            if (mysqli_query($conn, $insert_sql)) {
                move_uploaded_file($_FILES["teacherPic"]["tmp_name"], "./images/$teacherPicName");
                $msg = "<div class='alert alert-success'>teacher Data Inserted Successfully</div>";
                header("Refresh:1,./index.php");
            }
        } else {
            $msg = "<div class='alert alert-warning'>Please Select Right Extension</div>";
        }
    }

    
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Single teacher | Insert Data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<div class="container bg-primary text-white">
    <div class="row">
        <div class="col-md-6"><?php echo @$msg ?></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center py-3">teacher Insert</h2>
        </div>
    </div>
</div>

<body>
    <div class="container bg-info py-3">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="teacherFirstName" class="col-4 col-form-label"><b>teacherFirstName</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" name="teacherFirstName" id="teacherFirstName"
                        placeholder="teacherFirstName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherLastName" class="col-4 col-form-label"><b>teacherLastName</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" name="teacherLastName" id="teacherLastName"
                        placeholder="teacherLastName" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="teacherStudent" class="col-4 col-form-label"><b>teacherStudent</b></label>
                <div class="col-8">
                        <select class="form-select" name="teacherStudent" id="teacherStudent">
                            <?php
                            $teacher_sql = "SELECT `studentId`, `studentFirstName`, `studentLastName` FROM `relationshipStudent`";
                            $teacher_res = mysqli_query($conn, $teacher_sql);
                            while ($teacher_row = mysqli_fetch_assoc($teacher_res)) {
                            ?>
                            <option value="<?php echo $teacher_row["studentId"] ?>"><?php echo $teacher_row["studentFirstName"] . " " . $teacher_row["studentLastName"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
            </div>
            <div class="row mb-3">
                <label for="teacherClass" class="col-4 col-form-label"><b>teacherClass</b></label>
                <div class="col-8">
                    <select class="form-select" name="teacherClass" id="teacherClass">
                        <?php
                        $teacher_class_sql = "SELECT `classTimeId`, `classTime` FROM `class_time`";
                        $teacher_class_res = mysqli_query($conn, $teacher_class_sql);
                        while ($teacher_class_row = mysqli_fetch_assoc($teacher_class_res)) {
                        ?>
                        <option value="<?php echo $teacher_class_row["classTimeId"] ?>"><?php echo $teacher_class_row["classTime"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherEmail" class="col-4 col-form-label"><b>teacherEmail</b></label>
                <div class="col-8">
                    <input type="email" class="form-control" name="teacherEmail" id="teacherEmail"
                        placeholder="teacherEmail" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="teacherPhone" class="col-4 col-form-label"><b>teacherPhone</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" name="teacherPhone" id="teacherPhone"
                        placeholder="teacherPhone" />
                </div>
            </div>
           
            <div class="mb-3 row">
                <label for="teacherPic" class="col-4 col-form-label"><b>teacherPic</b></label>
                <div class="col-8">
                    <input type="file" class="form-control" name="teacherPic" id="teacherPic"
                        placeholder="teacherPic" />
                </div>
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" name="teacherInsert" class="btn btn-primary">
                        Insert
                    </button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>


<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1form5P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>