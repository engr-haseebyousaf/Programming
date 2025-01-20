<?php
include "admin/config.php";
$page = basename($_SERVER['PHP_SELF']);
$sql = "SELECT * FROM setting1";
        $result = mysqli_query($conn, $sql) or die("query failed");
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_assoc($result)) {
        $website_name = $row['web_name'];
        $website_logo = $row['web_img'];
        $website_footer = $row['web_footer'];
    }
}
switch ($page) {
    case 'author.php':
        if (isset($_GET['authid'])) {
            $author_id = $_GET['authid'];
            $sql_title = "SELECT * FROM user WHERE user_id = $author_id";
            $result_title = mysqli_query($conn, $sql_title) or die("query failed");
            $row_title = mysqli_fetch_assoc($result_title);
            $page_title = "News By ".$row_title['first_name'].$row_title['last_name'];
        }else {
            $page_title = "No Author Found";
        }
        break;
    case 'category.php':
        if (isset($_GET['catid'])) {
            $category_id = $_GET['catid'];
            $sql_title = "SELECT * FROM category WHERE category_id = $category_id";
            $result_title = mysqli_query($conn, $sql_title) or die("query failed");
            $row_title = mysqli_fetch_assoc($result_title);
            $page_title = $row_title['category_name']." News";
        }else {
            $page_title = "No Author Found";
        }
        break;
    case 'index.php':
        $page_title = $website_name;
        break;
    case 'search.php':
        if (isset($_GET['search'])) {
            $page_title = $_GET['search'];
        }else {
            $page_title = "No Search Found";
        }
        break;
    case 'single.php':
        if (isset($_GET['id'])) {
            $post_id = $_GET['id'];
            $sql_title = "SELECT * FROM post WHERE post_id = $post_id";
            $result_title = mysqli_query($conn, $sql_title) or die("query failed");
            $row_title = mysqli_fetch_assoc($result_title);
            $page_title = $row_title['title'];
        }else {
            $page_title = "No Title Found";
        }
        break;
    default:
    $page_title = $website_name;
        break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $page_title; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo">
                    <img src="admin/images/<?php echo $website_logo ?>">
                </a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <?php
        $sql = "SELECT * FROM category WHERE post > 0";
        $result = mysqli_query($conn, $sql);
        ?>
        <div class="row">
            <div class="col-md-12">
                <ul class='menu'>
                    
                <?php
                      if (mysqli_num_rows($result)>0) {
                        echo "<li style='background-color:red;'><a href='index.php'>Home</a></li>";
                            while ($row = mysqli_fetch_array($result)) {
                                if (isset($_GET['catid'])) {
                                    if ($_GET['catid'] == $row['category_id']) {
                                        $active = "active";
                                    }else {
                                        $active = "";
                                    }
                                    echo "<li><a class='$active' href='category.php?catid=".$row['category_id']."'>".$row['category_name']."</a></li>";
                                }else {
                                    $active = "";
                                    echo "<li><a class='$active' href='category.php?catid=".$row['category_id']."'>".$row['category_name']."</a></li>";
                                }
                                
                            }
                        }
                        ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->