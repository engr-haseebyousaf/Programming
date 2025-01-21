<?php
$bookingId = $_GET["id"];
include "./includes/connection.php";
$ssql = "SELECT * FROM `booking` WHERE `bookingId`='$bookingId'";
$sres = mysqli_query($conn, $ssql);
$srow = mysqli_fetch_assoc($sres);
if (isset($_POST["addBooking"])) {
    // print_r($_POST);
    // die();
    $bookingEventCategory = mysqli_real_escape_string($conn, $_POST["bookingEventCategory"]);
    $bookingClientName = mysqli_real_escape_string($conn, $_POST["bookingClientName"]);
    $bookingEmail = mysqli_real_escape_string($conn, $_POST["bookingEmail"]);
    $bookingContact = mysqli_real_escape_string($conn, $_POST["bookingContact"]);
    $bookingOccassionTitle = mysqli_real_escape_string($conn, $_POST["bookingOccassionTitle"]);
    $bookingOccassionStartDate = mysqli_real_escape_string($conn, $_POST["bookingOccassionStartDate"]);
    $bookingStartTime = mysqli_real_escape_string($conn, $_POST["bookingStartTime"]);
    $bookingCountry = mysqli_real_escape_string($conn, $_POST["bookingCountry"]);
    $bookingState = mysqli_real_escape_string($conn, $_POST["bookingState"]);
    $bookingCity = mysqli_real_escape_string($conn, $_POST["bookingCity"]);
    $bookingNumberOfSeat = mysqli_real_escape_string($conn, $_POST["bookingNumberOfSeat"]);
    $bookingVenue = mysqli_real_escape_string($conn, $_POST["bookingVenue"]);
    $bookingOccassionDescription = mysqli_real_escape_string($conn, $_POST["bookingOccassionDescription"]);
    $bookingOccassionType = mysqli_real_escape_string($conn, $_POST["bookingOccassionType"]);
    $sql = "UPDATE `booking` 
    SET 
    `bookingEventCategory`='$bookingEventCategory',
    `bookingClientName`='$bookingClientName',
    `bookingEmail`='$bookingEmail',
    `bookingContact`='$bookingContact',
    `bookingOccassionTitle`='$bookingOccassionTitle',
    `bookingOccassionStartDate`='$bookingOccassionStartDate',
    `bookingStartTime`='$bookingStartTime',
    `bookingCountry`='$bookingCountry',
    `bookingState`='$bookingState',
    `bookingCity`='$bookingCity',
    `bookingNumberOfSeat`='$bookingNumberOfSeat',
    `bookingVenue`='$bookingVenue',
    `bookingOccassionDescription`='$bookingOccassionDescription',
    `bookingOccassionType`='$bookingOccassionType'
    WHERE `bookingId` = '$bookingId'";
    if (mysqli_query($conn ,$sql)) {
        echo "<script>alert('Updated')</script>";
        
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
                        <form method="post">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Add Booking</h4>
                                <a href="./view-booking.php" class="btn btn-primary">View Booking</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="bookingEventCategory" class="form-label">Event Category</label>
                                    <select class="form-select" name="bookingEventCategory" id="bookingEventCategory">
                                        <?php
                                        $catsql = "SELECT `categoryTitle`,`categoryId` FROM `categories`";
                                        $catres = mysqli_query($conn, $catsql);
                                        $oldCategory = $srow["bookingCategory"];
                                        while ($catrow = mysqli_fetch_assoc($catres)) {
                                            $categoryId = $catrow["categoryId"];
                                            switch ($oldCategory) {
                                                case $categoryId:
                                                    $selected = "selected";
                                                    break;
                                                
                                                default:
                                                    $selected = "";
                                                    break;
                                            }
                                        ?>
                                        <option <?php echo $selected ?> value="<?php echo $catrow["categoryId"] ?>">
                                            <?php echo $catrow["categoryTitle"] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="bookingClientName">Client Name</label>
                                    <input value="<?php echo $srow["bookingClientName"] ?>" type="text" name="bookingClientName" id="bookingClientName"
                                        class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="bookingEmail">Email Address</label>
                                    <input value="<?php echo $srow["bookingEmail"] ?>" type="email" name="bookingEmail" id="bookingEmail" class="form-control"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="bookingContact">Contact</label>
                                    <input value="<?php echo $srow["bookingContact"] ?>" type="text" name="bookingContact" id="bookingContact" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="bookingOccassionTitle">Occassion Title</label>
                                    <input value="<?php echo $srow["bookingOccassionTitle"] ?>" type="text" name="bookingOccassionTitle" id="bookingOccassionTitle"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="bookingOccassiontartDate">Start Date</label>
                                    <input value="<?php echo $srow["bookingOccassionStartDate"] ?>" type="date" class="form-control" name="bookingOccassionStartDate" id="bookingOccassionStartDate" required>
                                </div>
                                <div class="form-group">
                                    <label for="bookingStartTime">Start Time</label>
                                    <input value="<?php echo $srow["bookingStartTime"] ?>" type="time" class="form-control" name="bookingStartTime" id="bookingStartTime" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bookingCountry">Country</label>
                                            <input value="<?php echo $srow["bookingCountry"] ?>" type="text" class="form-control" name="bookingCountry" id="bookingCountry" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bookingState">State</label>
                                            <input value="<?php echo $srow["bookingState"] ?>" type="text" class="form-control" name="bookingState" id="bookingState" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bookingCity">City</label>
                                            <input value="<?php echo $srow["bookingCity"] ?>" type="text" class="form-control" name="bookingCity" id="bookingCity">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bookingNumberOfSeat">No of Seats</label>
                                    <input value="<?php echo $srow["bookingNumberOfSeat"] ?>" type="number" class="form-control" name="bookingNumberOfSeat" id="bookingNumberOfSeat" required>
                                </div>
                                <div class="form-group">
                                    <label for="bookingVenue" class="form-label">Venue</label>
                                    <select class="form-select" name="bookingVenue" id="bookingVenue" required>
                                        <?php
                                        $vensql = "SELECT `venueId`,`venueTitle` FROM `venue`";
                                        $venres = mysqli_query($conn, $vensql);
                                        $oldVenue = $srow["bookingVenue"];
                                        while ($venrow = mysqli_fetch_assoc($venres)) {
                                            $venueId = $venrow["venueId"];
                                            switch ($oldVenue) {
                                                case $venueId:
                                                    $venueSelected = "selected";
                                                    break;
                                                
                                                default:
                                                    $venueSelected = "selected";
                                                    break;
                                            }
                                        ?>
                                        <option <?php echo $venueSelected ?> value="<?php echo $venrow["venueId"] ?>"><?php echo $venrow["venueTitle"] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group mb-0">
                                    <label for="bookingOccassionDescription">Occassion Description</label>
                                    <textarea class="form-control" name="bookingOccassionDescription" required><?php echo $srow["bookingOccassionDescription"] ?></textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <label>Occassion Type</label><br>
                                    <div class="form-check form-check-inline">
                                        <label for="public" class="form-check-label">Public</label>
                                        <input type="radio" class="form-check-input" name="bookingOccassionType" value="public" id="public" required>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label for="private" class="form-check-label">Private</label>
                                        <input type="radio" name class="form-check-input" name="bookingOccassionType" value="private" id="private">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input type="submit" value="Add Booking" class="btn btn-primary" name="addBooking">
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


</html>am