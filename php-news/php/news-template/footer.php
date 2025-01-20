<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php 
        $sql = "SELECT * FROM setting1";
        $result = mysqli_query($conn, $sql) or die("query failed");
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <span><?php echo $row['web_footer'];?></span>
                <?php
            }
        }
        ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
