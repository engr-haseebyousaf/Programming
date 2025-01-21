<?php
include "connect.php";

if (isset($_POST["insert"])) {
    $staffFirstName = mysqli_real_escape_string($conn, $_POST["staffFirstName"]);
    $staffLastName = mysqli_real_escape_string($conn, $_POST["staffLastName"]);
    $staffPhone = mysqli_real_escape_string($conn, $_POST["staffPhone"]);
    $staffEmail = mysqli_real_escape_string($conn, $_POST["staffEmail"]);
    $staffCNIC = mysqli_real_escape_string($conn, $_POST["staffCNIC"]);
    $staffPicNames = $_FILES["staffPic"]["name"];
    $staffPicTmpNames = $_FILES["staffPic"]["tmp_name"];
    $checkExt = true;
    
    if (empty($staffFirstName) || empty($staffLastName) || empty($staffPhone) || empty($staffEmail) || empty($staffCNIC) || empty($staffPicNames[0])) {
        $msg = "<div class='alert alert-danger'>Please Fill All Values</div>";
    } else {
        $picNewNames = [];
        foreach ($staffPicNames as $staffPicName) {
            $ext = pathinfo($staffPicName,PATHINFO_EXTENSION);
            $allowedExtensions = ["jpg","png","jpeg"];
            if (in_array($ext, $allowedExtensions)) {
                $picNewNames[] = date("H-i-s") . "-" . random_int(100000, 999999) . "." . $ext;
            } else {
                $checkExt = false;
                $picNewNames = [];
                $msg = "<div class='alert alert-danger'>Please Select Right Image Format</div>";
                break;
            }
        }
        $insertPics = serialize($picNewNames);
        $sql = "INSERT INTO `multi_staff`(`staffFirstName`, `staffLastName`, `staffPhone`, `staffEmail`, `staffCNIC`, `staffPic`) VALUES ('$staffFirstName','$staffLastName','$staffPhone','$staffEmail','$staffCNIC','$insertPics')";
        if (mysqli_query($conn, $sql)) {
            foreach ($picNewNames as $index => $picNewName) {
                move_uploaded_file($staffPicTmpNames[$index], "./images/$picNewName");
            }
            $msg = "<div class='alert alert-success'>Images Inserted Successfully</div>";
            header("Refresh:1,./index.php");
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Staff Multiple Insert </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container bg-primary text-white">
        <div class="row">
            <div class="col">
                <h2>Multi Staff Insert</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php echo @$msg ?>
            </div>
        </div>
    </div>
    <div class="container bg-primary py-3">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="staffFirstName" class="col-4 col-form-label">staffFirstName</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="staffFirstName" id="staffFirstName" placeholder="staffFirstName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staffLastName" class="col-4 col-form-label">staffLastName</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="staffLastName" id="staffLastName" placeholder="staffLastName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staffPhone" class="col-4 col-form-label">staffPhone</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="staffPhone" id="staffPhone" placeholder="staffPhone" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staffEmail" class="col-4 col-form-label">staffEmail</label>
                <div class="col-8">
                    <input type="email" class="form-control" name="staffEmail" id="staffEmail" placeholder="staffEmail" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staffCNIC" class="col-4 col-form-label">staffCNIC</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="staffCNIC" id="staffCNIC" placeholder="staffFirstName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staffPic" class="col-4 col-form-label">staffPic</label>
                <div class="col-8">
                    <input type="file" class="form-control" name="staffPic[]" multiple id="staffPic" placeholder="staffPic" />
                </div>
            </div>
            
            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <input name="insert" value="Insert" type="submit" class="btn btn-success">
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