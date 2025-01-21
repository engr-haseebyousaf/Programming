<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Images</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="admin-panel-outer-most-container">
        <div class="container-fluid">
            <div class="row">
                <!-- Side Bar  -->
                <div class="col-md-12 px-0">
                    <div class="container dashboard-box-container">
                        <div class="row admin-panel-heading-container">
                            <div class="col-sm-5 py-4 ">
                                <h2 class="w-100 d-block">All Products</h2>
                            </div>
                            <div class="col-sm-3 ml-auto" id="admin-products-add-new-btn-container">
                                <a href="add-product.php" class="btn btn-primary my-auto" id="admin-products-add-new-btn">Add New</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover w-100" id="admin-products-section-table">
                                    <thead>
                                        <tr>
                                            <th><b>#</b></th>
                                            <th class="w-25"><b>Featured Image</b></th>
                                            <th><b>Side Image 1</b></th>
                                            <th><b>Side Image 2</b></th>
                                            <th><b>Side Image 3</b></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        include "php-files/config.php";
                                        $sql = "SELECT * FROM images";
                                        $res = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($res) > 0) {
                                            while($row = mysqli_fetch_assoc($res)){
                                                
                                        ?>
                                        <tr>
                                            <td><b><?php echo $row["image_id"] ?></b></td>
                                            <td> <img src="uploads/images/<?php echo $row["featured_image"] ?>" style="width:100%; max-height:200px"></td>
                                            <td><img src="uploads/images/<?php echo $row["side_image_one"] ?>" style="width:100%; max-height:200px"></td>
                                            <td><img src="uploads/images/<?php echo $row["side_image_two"] ?>" style="width:100%; max-height:200px"></td>
                                            <td><img src="uploads/images/<?php echo $row["side_image_three"] ?>" style="width:100%; max-height:200px"></td>
                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="admin-products-pagination">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
<script src="js/jquery.js"></script>
<script src="js/add-product.js"></script>
</html>