<?php include "header.php"; ?>

<div id="admin-content">
<?php 
        $sql = "SELECT * FROM setting1";
        $result = mysqli_query($conn, $sql) or die("query failed");
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading admin-heading" >Add User</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="save-settings.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                    <label for="website_name"><b>Website Name</b></label><br>
                    <input type="text" name="website_name" value="<?php echo $row['web_name'] ?>" id="website_name">
                </div>
                <div class="form-group">
                    <label for="website_logo">
                        <b>Website logo</b>
                    </label><br>
                    <input type="file" name="website_logo" id="website_logo"><br>
                    <img style="height: 200px;" src="images/<?php echo $row['web_img'] ?>" alt="">
                    <input type="hidden" name="old_logo" value="">
                </div>
                <div class="form-group">
                    <label for="website_description">
                        <b>Website footer</b>
                    </label><br>
                        <textarea name="website_description" id="website_description" cols="30" rows="5"><?php echo $row['web_footer'] ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Update">
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php
            }
        }
        ?>
</div>
</div>

<?php include "footer.php"; ?>