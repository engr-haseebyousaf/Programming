<?php
include "connect.php";
$id = $_GET["uid"];
$select_sql = "SELECT * FROM `multi_staff` WHERE `staffId`=$id";
$res = mysqli_query($conn, $select_sql);
$row = mysqli_fetch_assoc($res);

if (isset($_POST["update"])) {
    $staffFirstName = mysqli_real_escape_string($conn, $_POST["staffFirstName"]);
    $staffLastName = mysqli_real_escape_string($conn, $_POST["staffLastName"]);
    $staffPhone = mysqli_real_escape_string($conn, $_POST["staffPhone"]);
    $staffEmail = mysqli_real_escape_string($conn, $_POST["staffEmail"]);
    $staffCNIC = mysqli_real_escape_string($conn, $_POST["staffCNIC"]);
    if (empty($staffFirstName) || empty($staffLastName) || empty($staffPhone) || empty($staffEmail) || empty($staffCNIC)) {
        $msg = "<div class='alert alert-danger'>Please Fill All Values</div>";
    } else {
        if (!empty($_FILES["staffPic"]["name"][0]) ) {
            $staffPicNames = $_FILES["staffPic"]["name"];
            $staffPicTmpNames = $_FILES["staffPic"]["tmp_name"];
            $staffpicNewNames = [];
            $checkExt = true;
            foreach ($staffPicNames as $staffPicName) {
                $ext = pathinfo($staffPicName, PATHINFO_EXTENSION);
                $allowedExtensions = ["jpg","png","jpeg"];
                if (in_array($ext, $allowedExtensions)) {
                    $staffpicNewNames[] = date("H-i-s") . "-" . random_int(100000, 999999) . "." . $ext;
                    
                } else {
                    $staffpicNewNames = [];
                    $checkExt = false;
                    $msg = "<div class='alert alert-warning'>Please Enter Correct File Format</div>";
                    break;
                }
            }
            if ($checkExt) {
                $uploadPics = serialize($staffpicNewNames);
                $sql = "UPDATE `multi_staff` SET `staffFirstName`='$staffFirstName',`staffLastName`='$staffLastName',`staffPhone`='$staffPhone',`staffEmail`='$staffEmail',`staffCNIC`='$staffCNIC',`staffPic`='$uploadPics'  WHERE `staffId`=$id";
                if (mysqli_query($conn, $sql)) {
                    $oldPics = unserialize($row["staffPic"]);
                    foreach ($staffpicNewNames as $index => $name) {
                        if (is_array($oldPics) && !empty($oldPics)) {
                            $oldPic = $oldPics[$index];
                            if (file_exists("./images/$oldPic")) {
                                unlink("./images/$oldPic");
                            }
                        }
                        
                        move_uploaded_file($staffPicTmpNames[$index], "./images/$name");
                    }
                    $msg = "<div class='alert alert-success'>Updated Successfully</div>";
                    header("Refresh:1,./index.php");
                } else {
                    $msg = "<div class='alert alert-danger'>Updated Un Successfully</div>";

                }
            }
        } else {
            $sql = "UPDATE `multi_staff` SET `staffFirstName`='$staffFirstName',`staffLastName`='$staffLastName',`staffPhone`='$staffPhone',`staffEmail`='$staffEmail',`staffCNIC`='$staffCNIC' WHERE `staffId`=$id";
            if (mysqli_query($conn, $sql)) {
                $msg = "<div class='alert alert-success'>Updated Successfully</div>";
                header("Refresh:1,./index.php");
            }
        }
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Multi Staff | Update </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container bg-success text-warning">
    <div class="row">
            <div class="col">
                <?php echo @$msg ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2>Multi Staff Update</h2>
            </div>
        </div>
        
    </div>
    <div class="container bg-warning py-3">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="staffFirstName" class="col-4 col-form-label">staffFirstName</label>
                <div class="col-8">
                    <input type="text" value="<?php echo $row["staffFirstName"] ?>" class="form-control" name="staffFirstName" id="staffFirstName" placeholder="staffFirstName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staffLastName" class="col-4 col-form-label">staffLastName</label>
                <div class="col-8">
                    <input type="text" value="<?php echo $row["staffLastName"] ?>" class="form-control" name="staffLastName" id="staffLastName" placeholder="staffLastName" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staffPhone" class="col-4 col-form-label">staffPhone</label>
                <div class="col-8">
                    <input type="text" value="<?php echo $row["staffPhone"] ?>" class="form-control" name="staffPhone" id="staffPhone" placeholder="staffPhone" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staffEmail" class="col-4 col-form-label">staffEmail</label>
                <div class="col-8">
                    <input type="email" value="<?php echo $row["staffEmail"] ?>" class="form-control" name="staffEmail" id="staffEmail" placeholder="staffEmail" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staffCNIC" class="col-4 col-form-label">staffCNIC</label>
                <div class="col-8">
                    <input type="text" value="<?php echo $row["staffCNIC"] ?>" class="form-control" name="staffCNIC" id="staffCNIC" placeholder="staffCNIC" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staffPic" class="col-4 col-form-label">staffPic</label>
                <div class="col-8">
                    <input type="file" multiple class="form-control" name="staffPic[]" id="staffPic" placeholder="staffPic" />
                </div>
            </div>
            
            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <input type="submit" value="Update" name="update" class="btn btn-primary">
                    
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