<?php include 'header.php';
include "admin/config.php";
$search_term = $_GET['search'];
$sql1 = "SELECT * FROM post
LEFT JOIN category ON post.category = category.category_id
LEFT JOIN user ON post.author = user.user_id LIKE '%".$search_term."%' OR post.description LIKE '%".$search_term."%' OR category.category_name LIKE '%".$search_term."%';";
$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result1)) {
    $row1 = mysqli_fetch_assoc($result1);
    $rows_per_page = 3;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else {
        $page = 1;
    }
    $offset = ($page -1) * $rows_per_page;
            }
    $sql = "SELECT * FROM post
    LEFT JOIN category ON post.category = category.category_id
    LEFT JOIN user ON post.author = user.user_id
    WHERE post.title LIKE '%".$search_term."%' OR post.description LIKE '%".$search_term."%' OR category.category_name LIKE '%".$search_term."%'
    ORDER BY post_id DESC LIMIT  $offset,$rows_per_page";
    $result = mysqli_query($conn, $sql);

    ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                  <h2 class="page-heading">Search : <?php echo $search_term; ?></h2>
                  <?php
                        if (mysqli_num_rows($result)>0) {
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                    <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                            <a class="post-img" href="single.php?id=<?php echo $row['post_id'] ?>"><img src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                <h3><a href='single.php?id=<?php echo $row['post_id'] ?>'><?php echo $row['title']; ?></a></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href='category.php?catid=<?php echo $row['category'] ?>'><?php echo $row['category_name']; ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a href='author.php?authid=<?php echo $row['author'] ?>'><?php echo $row['username']; ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?php echo $row['post_date']; ?>
                                        </span>
                                    </div>
                                    <p class="description">
                                    <?php echo substr($row['description'],0,150)."..."; ?>
                                    </p>
                                    <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id'] ?>'>read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sql1 = "SELECT * FROM post WHERE post.title LIKE '%".$search_term."%' OR post.description LIKE '%".$search_term."%';";
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1)) {
                        $row1 = mysqli_fetch_assoc($result1);
                        $rows_per_page = 3;
                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                        }else {
                            $page = 1;
                        }
                        $offset = ($page -1) * $rows_per_page;
                                }
                            }
                        $total_rows = mysqli_num_rows($result1);
                        $total_pages = ceil($total_rows/$rows_per_page);                      
                        echo "<ul class='pagination admin-pagination'>";
                        if ($page > 1) {
                            echo "<li><a href='search.php?page=".($page-1)."'>Prev</a></li>";
                        }
                        for ($i=1; $i <= $total_pages ; $i++) { 
                            if($page == $i) {
                            $active = "active";
                            }else {
                            $active = "";
                            }
                            echo "<li class='$active'><a href='search.php?page=$i'>$i</a></li>";
                        }
                        if ($page < $total_pages) {
                            echo "<li><a href='search.php?page=".($page+1)."'>Next</a></li>";
                        }
                        echo "</ul>";
                    }
                
                    ?>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
