<?php
include "./includes/connection.php";
if (isset($_POST["plannerAddFormSubmit"])) {
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
    $plannerPassword = md5(mysqli_real_escape_string($conn, $_POST["plannerPassword"]));
    $plannerConfirmPassword = md5(mysqli_real_escape_string($conn, $_POST["plannerConfirmPassword"]));
    $plannerAddress = mysqli_real_escape_string($conn, $_POST["plannerAddress"]);
    $plannerPic = $_FILES["plannerPic"];
    if ($plannerPassword != $plannerConfirmPassword) {
        echo "<script>alert('Password Doesnot match')</script>";
    } else {
        $ext = pathinfo($plannerPic["name"],PATHINFO_EXTENSION);
        $allowed_ext = ["png","jpg","jpeg"];
        if (in_array($ext, $allowed_ext)) {
            $plannerPicName = random_int(100000, 999999) . "-" . date("Y-m-d") . "." . $ext;
            $sql = "INSERT INTO `planner` (`plannerFirstName`, `plannerLastName`, `plannerEmail`, `plannerDateOfBirth`, `plannerGender`, `plannerPhone`, `plannerDescription`, `plannerCountry`, `plannerState`, `plannerCity`, `plannerExperiance`, `plannerAchievements`, `plannerSkills`, `plannerPassword`, `plannerAddress`, `plannerPic`) VALUES ('$plannerFirstName', '$plannerLastName', '$plannerEmail', '$plannerDateOfBirth', '$plannerGender', '$plannerPhone', '$plannerDescription', '$plannerCountry', '$plannerState', '$plannerCity', '$plannerExperiance', '$plannerAchievements', '$plannerSkills', '$plannerPassword', '$plannerAddress', '$plannerPicName');";
            if (mysqli_query($conn, $sql)) {
                move_uploaded_file($plannerPic["tmp_name"], "./uploads/planners/$plannerPicName");
                header("Location:./view-planner.php");
            }
        } else {
            echo "<script>alert('File should be of type .jpg, .png, .jpeg')</script>";
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
                            <div class="card-header d-flex flex-direction-row justify-content-between">
                                <h4>Add Planner</h4>
                                <a href="view-planner.php" class="btn btn-primary">View Planner</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="plannerFirstName">First Name</label>
                                    <input type="text" id="plannerFirstName" name="plannerFirstName"
                                        class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="plannerLastName">Last Name</label>
                                    <input type="text" id="plannerLastName" name="plannerLastName" class="form-control"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="plannerEmail">Planner Email</label>
                                    <input type="email" name="plannerEmail" id="plannerEmail" class="form-control"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="plannerDateOfBirth">Date Of Birth</label>
                                    <input type="date" name="plannerDateOfBirth" id="plannerDateOfBirth"
                                        class="form-control">
                                </div>
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
                                        <input class="form-check-input" type="radio" name="plannerGender" id="other"
                                            value="other" />
                                        <label class="form-check-label" for="other">Other</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="plannerPhone">Phone</label>
                                    <input type="text" id="plannerPhone" name="plannerPhone" class="form-control"
                                        required="">
                                </div>

                                <div class="form-group mb-0">
                                    <label>Description</label>
                                    <textarea class="form-control" name="plannerDescription" required=""></textarea>
                                </div>
                                <div class="form-group mt-4">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label for="plannerCountry">Select Country</label>
                                                <input type="text" id="plannerCountry" name="plannerCountry"
                                                    class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label for="plannerState">Select State</label>
                                                <input type="text" id="plannerState" name="plannerState"
                                                    class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label for="plannerCity">Select City</label>
                                                <input type="text" id="plannerCity" name="plannerCity"
                                                    class="form-control" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="plannerExperiance">Experiance</label>
                                    <input type="text" id="plannerExperiance" name="plannerExperiance"
                                        class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="plannerAchievements">Achievements</label>
                                    <input type="text" id="plannerAchievements" name="plannerAchievements"
                                        class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="plannerSkills">Skills</label>
                                    <input type="text" id="plannerSkills" name="plannerSkills" class="form-control"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="plannerPassword">Password</label>
                                    <input type="password" id="plannerPassword" name="plannerPassword"
                                        class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="plannerConfirmPassword">Confirm Password</label>
                                    <input type="password" id="plannerConfirmPassword" name="plannerConfirmPassword"
                                        class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="plannerAddress">Address</label>
                                    <input type="text" id="plannerAddress" name="plannerAddress"
                                        class="form-control" required="">
                                </div>
                                <div class="mb-3">
                                    <label for="plannerPic" class="form-label">planner Pic</label>
                                    <input type="file" class="form-control" name="plannerPic" id="plannerPic" placeholder=""/>
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <input type="submit" name="plannerAddFormSubmit" value="Add Planner" class="btn btn-primary">
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