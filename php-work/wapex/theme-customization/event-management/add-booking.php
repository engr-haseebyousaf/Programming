<?php
include "./includes/connection.php";
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
    $sql = "INSERT INTO `booking` 
    (`bookingEventCategory`,`bookingClientName`,`bookingEmail`,`bookingContact`,`bookingOccassionTitle`,`bookingOccassionStartDate`,`bookingStartTime`,`bookingCountry`,`bookingState`,`bookingCity`,`bookingNumberOfSeat`,`bookingVenue`,`bookingOccassionDescription`,`bookingOccassionType`)
    VALUES 
    ('$bookingEventCategory','$bookingClientName','$bookingEmail','$bookingContact','$bookingOccassionTitle','$bookingOccassionStartDate','$bookingStartTime','$bookingCountry','$bookingState','$bookingCity','$bookingNumberOfSeat','$bookingVenue','$bookingOccassionDescription','$bookingOccassionType')";
    if (mysqli_query($conn ,$sql)) {
        echo "<script>alert('inserted')</script>";
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
                                        while ($catrow = mysqli_fetch_assoc($catres)) {
                                        ?>
                                        <option value="<?php echo $catrow["categoryId"] ?>">
                                            <?php echo $catrow["categoryTitle"] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="bookingClientName">Client Name</label>
                                    <input type="text" name="bookingClientName" id="bookingClientName"
                                        class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="bookingEmail">Email Address</label>
                                    <input type="email" name="bookingEmail" id="bookingEmail" class="form-control"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="bookingContact">Contact</label>
                                    <input type="text" name="bookingContact" id="bookingContact" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="bookingOccassionTitle">Occassion Title</label>
                                    <input type="text" name="bookingOccassionTitle" id="bookingOccassionTitle"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="bookingOccassiontartDate">Start Date</label>
                                    <input type="date" class="form-control" name="bookingOccassionStartDate" id="bookingOccassionStartDate" required>
                                </div>
                                <div class="form-group">
                                    <label for="bookingStartTime">Start Time</label>
                                    <input type="time" class="form-control" name="bookingStartTime" id="bookingStartTime" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bookingCountry">Country</label>
                                            <input type="text" class="form-control" name="bookingCountry" id="bookingCountry" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bookingState">State</label>
                                            <input type="text" class="form-control" name="bookingState" id="bookingState" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bookingCity">City</label>
                                            <input type="text" class="form-control" name="bookingCity" id="bookingCity">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bookingNumberOfSeat">No of Seats</label>
                                    <input type="number" class="form-control" name="bookingNumberOfSeat" id="bookingNumberOfSeat" required>
                                </div>
                                <div class="form-group">
                                    <label for="bookingVenue" class="form-label">Venue</label>
                                    <select class="form-select" name="bookingVenue" id="bookingVenue" required>
                                        <?php
                                        $vensql = "SELECT `venueId`,`venueTitle` FROM `venue`";
                                        $venres = mysqli_query($conn, $vensql);
                                        while ($venrow = mysqli_fetch_assoc($venres)) {
                                        ?>
                                        <option value="<?php echo $venrow["venueId"] ?>"><?php echo $venrow["venueTitle"] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group mb-0">
                                    <label for="bookingOccassionDescription">Occassion Description</label>
                                    <textarea class="form-control" name="bookingOccassionDescription" required></textarea>
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