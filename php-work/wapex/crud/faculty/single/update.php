<?php
include "connect.php";
$id = $_GET["uid"];
$show_sql = "SELECT * FROM `single_faculty` WHERE `facultyId` = '$id';";
$res = mysqli_query($conn, $show_sql);
$row = mysqli_fetch_assoc($res);



// Update Code
if (isset($_POST["update"])) {
    $facultyFirstName = mysqli_real_escape_string($conn, $_POST["facultyFirstName"]);
    $facultyLastName = mysqli_real_escape_string($conn, $_POST["facultyLastName"]);
    $facultyPhone = mysqli_real_escape_string($conn, $_POST["facultyPhone"]);
    $facultyEmail = mysqli_real_escape_string($conn, $_POST["facultyEmail"]);
    $facultyCNIC = mysqli_real_escape_string($conn, $_POST["facultyCNIC"]);
    if (!empty($facultyFirstName) || !empty($facultyLastName) || !empty($facultyPhone) || !empty($facultyEmail) || !empty($facultyCNIC)) {
        if (!empty($_FILES["facultyPic"]["name"])) {
            $facultyPic = $_FILES["facultyPic"]["name"];
            $ext = pathinfo($facultyPic, PATHINFO_EXTENSION);
            $allowedExtensions = ["jpg","jpeg","png"];
            if (in_array($ext, $allowedExtensions)) {
                $oldImageName = $row["facultyPic"];
                $facultyPicName = date("H-i-s") . "-" . random_int(100000, 999999) . "." . $ext;
                $facultyPicTmpName = $_FILES["facultyPic"]["tmp_name"];
                $sql = "UPDATE `single_faculty` SET `facultyFirstName`='$facultyFirstName',`facultyLastName`='$facultyLastName',`facultyPhone`='$facultyPhone',`facultyEmail`='$facultyEmail',`facultyCNIC`='$facultyCNIC',`facultyPic`='$facultyPicName' WHERE `facultyId` = $id;";
                if (mysqli_query($conn, $sql)) {
                    if (file_exists("./images/$oldImageName")) {
                        unlink("./images/$oldImageName");
                    }
                    move_uploaded_file($facultyPicTmpName, "./images/$facultyPicName");
                    $msg = "<div class='alert alert-success'>Updated Successfully</div>";
                    header("Refresh: 1, ./index.php");
                }
            } else {
                $msg = "<div class='alert alert-warning'>Please Select the right Format</div>";
            }
        } else {
            $sql = "UPDATE `single_faculty` SET `facultyFirstName`='$facultyFirstName',`facultyLastName`='$facultyLastName',`facultyPhone`='$facultyPhone',`facultyEmail`='$facultyEmail',`facultyCNIC`='$facultyCNIC' WHERE `facultyId` = $id;";
                if (mysqli_query($conn, $sql)) {
                    $msg = "<div class='alert alert-success'>Updated Successfully</div>";
                    header("Refresh: 1, ./index.php");
                }
        }
    } else {
        $msg = "<div class='alert alert-danger'>Please Fill All the values</div>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Single Faculty Memver | Update Data</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-4 bg-primary">
        <div class="row">
            <div class="col">
                <?php echo @$msg ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2 class="text-center">Faculty Member Update Data</h2>
            </div>
        </div>
    </div>
    <div class="container py-3 bg-info">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="facultyFirstName" class="col-4 col-form-label"><b>facultyFirstName</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" value="<?php echo $row["facultyFirstName"] ?>" name="facultyFirstName" id="facultyFirstName" placeholder="facultyFirstName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="facultyLastName" class="col-4 col-form-label"><b>facultyLastName</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" value="<?php echo $row["facultyLastName"] ?>" name="facultyLastName" id="facultyLastName" placeholder="facultyLastName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="facultyPhone" class="col-4 col-form-label"><b>facultyPhone</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" value="<?php echo $row["facultyPhone"] ?>" name="facultyPhone" id="facultyPhone" placeholder="facultyPhone" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="facultyEmail" class="col-4 col-form-label"><b>facultyEmail</b></label>
                <div class="col-8">
                    <input type="email" class="form-control" value="<?php echo $row["facultyEmail"] ?>" name="facultyEmail" id="facultyEmail" placeholder="facultyEmail" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="facultyCNIC" class="col-4 col-form-label"><b>facultyCNIC</b></label>
                <div class="col-8">
                    <input type="text" class="form-control" value="<?php echo $row["facultyCNIC"] ?>" name="facultyCNIC" id="facultyCNIC" placeholder="facultyCNIC" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="facultyPic" class="col-4 col-form-label"><b>facultyPic</b></label>
                <div class="col-8">
                    <input type="file" class="form-control" name="facultyPic" id="facultyPic" placeholder="facultyPic" />
                </div>
            </div>
            
            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" name="update" class="btn btn-primary">
                        Update
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