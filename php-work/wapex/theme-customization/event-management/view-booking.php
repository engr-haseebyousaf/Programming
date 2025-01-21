<?php
include "./includes/connection.php";
include "./includes/header.php";
include "./includes/sidebar.php";
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                    <h4>View Booking</h4>
                    <a href="add-booking.php" class="btn btn-primary">Add Booking</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Event Category</th>
                            <th>Client Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Occassion Title</th>
                            <th>Start Date</th>
                            <th>Start Time</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>No of Seats</th>
                            <th>Venue</th>
                            <th>Occassion Description</th>
                            <th>Occassion Type</th>
                            <th>Update</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql = "SELECT * FROM `booking`  b INNER JOIN `categories` c ON b.`bookingEventCategory`=c.`categoryId`
                          INNER JOIN `venue` v ON b.`bookingVenue`=v.`venueId`";
                          if ($res = mysqli_query($conn, $sql)) {
                            if (mysqli_num_rows($res)>0) {
                              while ($row = mysqli_fetch_assoc($res)) {
                              ?>
                              <tr>
                                <td><?php echo $row["categoryTitle"] ?></td>
                                <td><?php echo $row["bookingClientName"] ?></td>
                                <td><?php echo $row["bookingEmail"] ?></td>
                                <td><?php echo $row["bookingContact"] ?></td>
                                <td><?php echo $row["bookingOccassionTitle"] ?></td>
                                <td><?php echo $row["bookingOccassionStartDate"] ?></td>
                                <td><?php echo $row["bookingStartTime"] ?></td>
                                <td><?php echo $row["bookingCountry"] ?></td>
                                <td><?php echo $row["bookingState"] ?></td>
                                <td><?php echo $row["bookingCity"] ?></td>
                                <td><?php echo $row["bookingNumberOfSeat"] ?></td>
                                <td><?php echo $row["venueTitle"] ?></td>
                                <td><?php echo $row["bookingOccassionDescription"] ?></td>
                                <td><?php echo $row["bookingOccassionType"] ?></td>
                                <td><a href="update-booking.php?id=<?php echo $row["bookingId"] ?>" class="btn btn-success">Update</a></td>
                                <td><a href="delete-booking.php?id=<?php echo $row["bookingId"] ?>" class="btn btn-danger">Delete</a></td>
                              </tr>
                            <?php
                              }
                            } else {
                            ?>
                            <tr>
                              <td colspan="13"><h4 class="text-muted">No Booking Found</h4></td>
                            </tr>
                            <?php
                            }
                          } else {
                          ?>
                            <tr>
                              <td colspan="13"><h4 class="text-muted">Something Went Wrong</h4></td>
                            </tr>
                            <?php
                          }
                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
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