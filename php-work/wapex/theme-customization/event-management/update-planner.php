<?php
include "./includes/connection.php";
$id = $_GET["id"];
$sqls = "SELECT * FROM `planner` WHERE `plannerId`=$id";
$ress = mysqli_query($conn, $sqls);
$row = mysqli_fetch_assoc($ress);
if (isset($_POST["plannerUpdateFormSubmit"])) {
    $plannerFirstName = mysqli_real_escape_string($conn, $_POST["plannerFirstName"]);
    $plannerLastName = mysqli_real_escape_string($conn, $_POST["plannerLastName"]);
    $plannerEmail = mysqli_real_escape_string($conn, $_POST["plannerEmail"]);
    $plannerDateOfBirth = mysqli_real_escape_string($conn, $_POST["plannerDateOfBirth"]);
    $plannerGender = mysqli_real_escape_string($conn, $_POST["plannerGender"]);
    $plannerPhone = mysqli_real_escape_string($conn, $_POST["plannerPhone"]);
    $plannerDescription = mysqli_real_escape_string($conn, $_POST["plannerDescription"]);
    $plannerCountry = mysqli_real_escape_string($conn, $_POST["plannerCountry"]);
    $plannerState = mysqli_real_escape_string($conn, $_POST["plannerState"]);
    $plannerCity = mysqli_real_escape_string($conn, $_POST["plannerCity"]);
    $plannerExperiance = mysqli_real_escape_string($conn, $_POST["plannerExperiance"]);
    $plannerAchievements = mysqli_real_escape_string($conn, $_POST["plannerAchievements"]);
    $plannerSkills = mysqli_real_escape_string($conn, $_POST["plannerSkills"]);
    $plannerAddress = mysqli_real_escape_string($conn, $_POST["plannerAddress"]);
    // Checking if user inserted password
    if (!isset($_POST["plannerPassword"]) && empty($_POST["plannerPassword"])) {
        // checking if the user entered the image
        if (isset($_FILES["plannerPic"]["name"]) && !empty($_FILES["plannerPic"]["name"])) {
            $plannerPic = $_FILES["plannerPic"];
            $ext = pathinfo($plannerPic["name"],PATHINFO_EXTENSION);
            $allowed_ext = ["png","jpg","jpeg"];
            // Checking if the file type is image
            if (in_array($ext, $allowed_ext)) {
                $plannerPicName = random_int(100000, 999999) . "-" . date("Y-m-d") . "." . $ext;
                $sql = "UPDATE `planner` SET `plannerFirstName` = '$plannerFirstName', `plannerLastName` = '$plannerLastName', `plannerEmail`='$plannerEmail', `plannerDateOfBirth`='$plannerDateOfBirth', `plannerGender`='$plannerGender', `plannerPhone`='$plannerPhone', `plannerDescription`='$plannerDescription', `plannerCountry`='$plannerCountry', `plannerState`='$plannerState', `plannerCity`='$plannerCity', `plannerExperiance`='$plannerExperiance', `plannerAchievements`='$plannerAchievements', `plannerSkills`='$plannerSkills', `plannerAddress`='$plannerAddress', `plannerPic`='$plannerPicName' WHERE `plannerId`='$id';"; 
                if (mysqli_query($conn, $sql)) {
                    move_uploaded_file($plannerPic["tmp_name"], "./uploads/planners/$plannerPicName");
                    $old_img = $row["plannerPic"];
                    if (file_exists("./uploads/$old_img")) {
                        unlink("./uploads/$old_img");
                    }
                    echo "<script>alert('Planner Updated Successfully')</script>";
                    header("Refresh:3,./view-planner.php");
                }
            } else {
                echo "<script>alert('File should be of type .jpg, .png, .jpeg plannerPic')</script>";
            }
        } else {
            $sql = "UPDATE `planner` SET `plannerFirstName` = '$plannerFirstName', `plannerLastName` = '$plannerLastName', `plannerEmail`='$plannerEmail', `plannerDateOfBirth`='$plannerDateOfBirth', `plannerGender`='$plannerGender', `plannerPhone`='$plannerPhone', `plannerDescription`='$plannerDescription', `plannerCountry`='$plannerCountry', `plannerState`='$plannerState', `plannerCity`='$plannerCity', `plannerExperiance`='$plannerExperiance', `plannerAchievements`='$plannerAchievements', `plannerSkills`='$plannerSkills', `plannerAddress`='$plannerAddress' WHERE `plannerId`='$id';"; 
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Planner Updated Successfully')</script>";
                header("Refresh:3,./view-planner.php");
            }
        }
    } else {
        
        $plannerPassword = md5(mysqli_real_escape_string($conn, $_POST["plannerPassword"]));
        $plannerConfirmPassword = md5(mysqli_real_escape_string($conn, $_POST["plannerConfirmPassword"]));
        
        if (isset($_FILES["plannerPic"]["name"]) && !empty($_FILES["plannerPic"]["name"])) {
            $plannerPic = $_FILES["plannerPic"];
            if ($plannerPassword != $plannerConfirmPassword) {
                echo "<script>alert('Password Doesnot match')</script>";
            } else {
                $ext = pathinfo($plannerPic["name"],PATHINFO_EXTENSION);
                $allowed_ext = ["png","jpg","jpeg"];
                if (in_array($ext, $allowed_ext)) {
                    $plannerPicName = random_int(100000, 999999) . "-" . date("Y-m-d") . "." . $ext;
                    $sql = "UPDATE `planner` SET `plannerFirstName` = '$plannerFirstName', `plannerLastName` = '$plannerLastName', `plannerEmail`='$plannerEmail', `plannerDateOfBirth`='$plannerDateOfBirth', `plannerGender`='$plannerGender', `plannerPhone`='$plannerPhone', `plannerDescription`='$plannerDescription', `plannerCountry`='$plannerCountry', `plannerState`='$plannerState', `plannerCity`='$plannerCity', `plannerExperiance`='$plannerExperiance', `plannerAchievements`='$plannerAchievements', `plannerSkills`='$plannerSkills', `plannerPassword`='$plannerPassword', `plannerAddress`='$plannerAddress', `plannerPic`='$plannerPicName' WHERE `plannerId`='$id';"; 
                    if (mysqli_query($conn, $sql)) {
                        move_uploaded_file($plannerPic["tmp_name"], "./uploads/$plannerPicName");
                        $old_img = $row["plannerPic"];
                        if (file_exists("./uploads/planners/$old_img")) {
                            unlink("./uploads/$old_img");
                        }
                        echo "<script>alert('Planner Updated Successfully')</script>";
                        header("Refresh:3,./view-planner.php");
                    }
                } else {
                    echo "<script>alert('File should be of type .jpg, .png, .jpeg plannerPic, plannerPassword')</script>";
                }
            }
        } else {
            if ($plannerPassword != $plannerConfirmPassword) {
                echo "<script>alert('Password Doesnot match')</script>";
            } else {
                $sql = "UPDATE `planner` SET `plannerFirstName` = '$plannerFirstName', `plannerLastName` = '$plannerLastName', `plannerEmail`='$plannerEmail', `plannerDateOfBirth`='$plannerDateOfBirth', `plannerGender`='$plannerGender', `plannerPhone`='$plannerPhone', `plannerDescription`='$plannerDescription', `plannerCountry`='$plannerCountry', `plannerState`='$plannerState', `plannerCity`='$plannerCity', `plannerExperiance`='$plannerExperiance', `plannerAchievements`='$plannerAchievements', `plannerSkills`='$plannerSkills', `plannerPassword`='$plannerPassword', `plannerAddress`='$plannerAddress' WHERE `plannerId`='$id';"; 
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Planner Updated Successfully')</script>";
                    header("Refresh:3,./view-planner.php");
                }
            }
            
        }
    }
    
    
}
include "./includes/header.php";
include "./includes/sidebar.php";
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="card">
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-header">
                                <h4>Add Planner</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="plannerFirstName">First Name</label>
                                    <input type="text" value="<?php echo $row["plannerFirstName"] ?>" id="plannerFirstName" name="plannerFirstName"
                                        class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="plannerLastName">Last Name</label>
                                    <input type="text" value="<?php echo $row["plannerLastName"] ?>" id="plannerLastName" name="plannerLastName" class="form-control"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="plannerEmail">Planner Email</label>
                                    <input type="email" value="<?php echo $row["plannerEmail"] ?>" name="plannerEmail" id="plannerEmail" class="form-control"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="plannerDateOfBirth">Date Of Birth</label>
                                    <input type="date" value="<?php echo $row["plannerDateOfBirth"] ?>" name="plannerDateOfBirth" id="plannerDateOfBirth"
                                        class="form-control">
                                </div>
                                <?php
                                switch ($row["plannerGender"]) {
                                    case "male":
                                ?>
                                <div class="form-group">
                                    <label>Gender</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="plannerGender" id="male"
                                            value="male" />
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="plannerGender" id="female"
                                            value="female" />
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="plannerGender" id="other"
                                            value="other" />
                                        <label class="form-check-label" for="other">Other</label>
                                    </div>
                                </div>
                                <?php
                                break;
                                case 'female':
                                ?>
                                <div class="form-group">
                                    <label>Gender</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="plannerGender" id="male"
                                            value="male" />
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="plannerGender" id="female"
                                            value="female" />
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="plannerGender" id="other"
                                            value="other" />
                                        <label class="form-check-label" for="other">Other</label>
                                    </div>
                                </div>
                                <?php
                                break;
                                case 'other':
                                ?>
                                <div class="form-group">
                                    <label>Gender</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="plannerGender" id="male"
                                            value="male" />
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="plannerGender" id="female"
                                            value="female" />
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="plannerGender" id="other"
                                            value="other" />
                                        <label class="form-check-label" for="other">Other</label>
                                    </div>
                                </div>
                                <?php
                                break;
                                }
                                ?>
                                <div class="form-group">
                                    <label for="plannerPhone">Phone</label>
                                    <input type="text" id="plannerPhone" value="<?php echo $row["plannerPhone"] ?>" name="plannerPhone" class="form-control"
                                        required="">
                                </div>

                                <div class="form-group mb-0">
                                    <label>Description</label>
                                    <textarea class="form-control" name="plannerDescription" required=""><?php echo $row["plannerDescription"] ?></textarea>
                                </div>
                                <div class="form-group mt-4">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label for="plannerCountry">Select Country</label>
                                                <input type="text" value="<?php echo $row["plannerCountry"] ?>" id="plannerCountry" name="plannerCountry"
                                                    class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label for="plannerState">Select State</label>
                                                <input type="text" value="<?php echo $row["plannerState"] ?>" id="plannerState" name="plannerState"
                                                    class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label for="plannerCity">Select City</label>
                                                <input type="text" value="<?php echo $row["plannerCity"] ?>" id="plannerCity" name="plannerCity"
                                                    class="form-control" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="plannerExperiance">Experiance</label>
                                    <input type="text" value="<?php echo $row["plannerExperiance"] ?>" id="plannerExperiance" name="plannerExperiance"
                                        class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="plannerAchievements">Achievements</label>
                                    <input type="text" value="<?php echo $row["plannerAchievements"] ?>" id="plannerAchievements" name="plannerAchievements"
                                        class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="plannerSkills">Skills</label>
                                    <input type="text" id="plannerSkills" value="<?php echo $row["plannerSkills"] ?>" name="plannerSkills" class="form-control"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="plannerPassword">Password</label>
                                    <input type="password" id="plannerPassword" name="plannerPassword"
                                        class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="plannerConfirmPassword">Confirm Password</label>
                                    <input type="password" id="plannerConfirmPassword" name="plannerConfirmPassword"
                                        class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="plannerAddress">Address</label>
                                    <input type="text" value="<?php echo $row["plannerAddress"] ?>" id="plannerAddress" name="plannerAddress"
                                        class="form-control" required="">
                                </div>
                                <div class="mb-3">
                                    <label for="plannerPic" class="form-label">planner Pic</label>
                                    <input type="file" class="form-control" name="plannerPic" id="plannerPic"/>
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <input type="submit" name="plannerUpdateFormSubmit" value="Add Planner" class="btn btn-primary">
                            </div>
                     </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
</div>
<?php
  include "./includes/footer.php";
  ?>
</body>


</html>