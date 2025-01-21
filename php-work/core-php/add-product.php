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
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form class="form-group" id="add-product-form">
                    <label for="add-product-featured-image"><b>Featured Image</b></label>
                    <input type="file" accept=".png, .jpg, .jpeg" multiple class="form-control-file" name="add-product-featured-image" id="add-product-featured-image" placeholder="Choose An Image" aria-describedby="add-product-featured-image-fileHelpId">
                    <div id="add-product-featured-image-box">
                    <div id="add-product-featured-image-inner-box"></div>
                    <!-- <img src="" id="add-product-featured-image-box-img" alt=""> -->
                    <div id="add-product-featured-image-side-image-box">
                        <!-- <div class="add-product-featured-image-side-image">
                            <img src="" alt="" >
                        </div>
                        <div class="add-product-featured-image-side-image">
                            <img src="" alt="" >
                        </div>
                        <div class="add-product-featured-image-side-image">
                            <img src="" alt="" >
                        </div> -->
                    </div>
                    </div>
                    <small id="add-product-featured-image-fileHelpId" class="form-text text-muted">First Image Will Be Selected As Featured Image</small>
                    <button type="submit" class="btn btn-primary">Add Images</button>
                </form>
                <div id="add-product-message-box"></div>
            </div>
        </div>
    </div>
</body>
<script src="js/jquery.js"></script>
<script src="js/add-product.js"></script>
</html>