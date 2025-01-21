<?php
include "./includes/connection.php";
$sql = "SELECT * FROM `categories`";
$res = mysqli_query($conn, $sql);

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
                    <h4>View Venue</h4>
                    <a href="./add-venue.php" class="btn btn-primary">Add Venue</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Update</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                            <tr>
                                <td><?php echo $row["categoryTitle"] ?></td>
                                <td><?php echo $row["categoryDescription"] ?></td>
                                <td><input type="date" readonly value="<?php echo $row["categoryDate"] ?>" class="view-category-date"></td>
                                <td><a href="./update-category.php?categoryId=<?php echo $row["categoryId"] ?>" class="btn btn-success">Update</a></td>
                                <td><a href="./delete-category.php?categoryId=<?php echo $row["categoryId"] ?>" class="btn btn-danger">Delete</a></td>
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