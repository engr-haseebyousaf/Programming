<?php
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
                  <form>
                    <div class="card-header">
                      <h4>Default Validation</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Your Name</label>
                        <input type="text" class="form-control" required="">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" required="">
                      </div>
                      <div class="form-group">
                        <label>Subject</label>
                        <input type="email" class="form-control">
                      </div>
                      <div class="form-group mb-0">
                        <label>Message</label>
                        <textarea class="form-control" required=""></textarea>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Submit</button>
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