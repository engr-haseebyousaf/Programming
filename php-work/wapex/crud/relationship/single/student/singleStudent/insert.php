<?php
include "connect.php";
if (isset($_POST["studentInsert"])) {
    $studentFirstName = mysqli_real_escape_string($conn, $_POST["studentFirstName"]);
    $studentLastName = mysqli_real_escape_string($conn, $_POST["studentLastName"]);
    $studentTeacher = mysqli_real_escape_string($conn, $_POST["studentTeacher"]);
    $studentClass = mysqli_real_escape_string($conn, $_POST["studentClass"]);
    $studentPhone = mysqli_real_escape_string($conn, $_POST["studentPhone"]);
    $studentEmail = mysqli_real_escape_string($conn, $_POST["studentEmail"]);
    $studentCNIC = mysqli_real_escape_string($conn, $_POST["studentCNIC"]);
    $studentPic = $_FILES["studentPic"]["name"];
    if (empty($studentFirstName) || empty($studentLastName) || empty($studentEmail) || empty($studentPhone) || empty($studentCNIC) || empty($studentPic)) {
        $msg = "<div class='alert alert-danger'>Please Fill All Values</div>";
    } else {
        $fileExt = pathinfo($studentPic, PATHINFO_EXTENSION);
        $allowedExtensions = ["jpg","jpeg","png"];
        if (in_array($fileExt, $allowedExtensions)) {
            $studentPicName = date("H-m-i") . "-" . random_int(100000, 999999) . "." . $fileExt;
            $insert_sql = "INSERT INTO `relationshipStudent` (`studentFirstName`,`studentLastName`,`studentTeacher`,`studentClass`,`studentPhone`,`studentEmail`,`studentCNIC`,`studentPic`) VALUES ('$studentFirstName','$studentLastName','$studentTeacher','$studentClass','$studentPhone','$studentEmail','$studentCNIC','$studentPicName')";
            if (mysqli_query($conn, $insert_sql)) {
                move_uploaded_file($_FILES["studentPic"]["tmp_name"], "./images/$studentPicName");
                $msg = "<div class='alert alert-success'>Student Data Inserted Successfully</div>";
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
    <title>Single Student | Insert Data</title>
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
            <h2 class="text-center py-3">Student Insert</h2>
        </div>
    </div>
</div>

<body>
    <div class="container bg-info py-3">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="studentFirstName" class="col-4 col-form-label"><b>studentFirstName</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" name="studentFirstName" id="studentFirstName"
                        placeholder="studentFirstName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentLastName" class="col-4 col-form-label"><b>studentLastName</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" name="studentLastName" id="studentLastName"
                        placeholder="studentLastName" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="studentTeacher" class="col-4 col-form-label"><b>studentTeacher</b></label>
                <div class="col-8">
                        <select class="form-select" name="studentTeacher" id="studentTeacher">
                            <?php
                            $teacher_sql = "SELECT `teacherId`, `teacherFirstName`, `teacherLastName` FROM `relationshipTeacher`";
                            $teacher_res = mysqli_query($conn, $teacher_sql);
                            while ($teacher_row = mysqli_fetch_assoc($teacher_res)) {
                            ?>
                            <option value="<?php echo $teacher_row["teacherId"] ?>"><?php echo $teacher_row["teacherFirstName"] . " " . $teacher_row["teacherLastName"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
            </div>
            <div class="row mb-3">
                <label for="studentClass" class="col-4 col-form-label"><b>studentClass</b></label>
                <div class="col-8">
                    <select class="form-select" name="studentClass" id="studentClass">
                        <?php
                        $student_class_sql = "SELECT `classTimeId`, `classTime` FROM `class_time`";
                        $student_class_res = mysqli_query($conn, $student_class_sql);
                        while ($student_class_row = mysqli_fetch_assoc($student_class_res)) {
                        ?>
                        <option value="<?php echo $student_class_row["classTimeId"] ?>"><?php echo $student_class_row["classTime"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentEmail" class="col-4 col-form-label"><b>studentEmail</b></label>
                <div class="col-8">
                    <input type="email" class="form-control" name="studentEmail" id="studentEmail"
                        placeholder="studentEmail" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentPhone" class="col-4 col-form-label"><b>studentPhone</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" name="studentPhone" id="studentPhone"
                        placeholder="studentPhone" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentCNIC" class="col-4 col-form-label"><b>studentCNIC</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" name="studentCNIC" id="studentCNIC"
                        placeholder="studentCNIC" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="studentPic" class="col-4 col-form-label"><b>studentPic</b></label>
                <div class="col-8">
                    <input type="file" class="form-control" name="studentPic" id="studentPic"
                        placeholder="studentPic" />
                </div>
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" name="studentInsert" class="btn btn-primary">
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