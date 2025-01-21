<!doctype html>
<html lang="en">
    <?php
    $success = false;
    $failure = false;
        if ($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            include("connect.php");
            $sql = "SELECT * FROM `login-credentials` WHERE `user_name`=$username AND `password`=$password;";
            die($sql);
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                if ($row["user_name"]===$username and $row["password"]===$password) {
                    header("location:home.php");
                    $success = true;
                } else {
                    $failure = true;
                }
            }
        }
    ?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Haseeb Yousaf | Login</title>
  </head>
  <body>
    <h1>Signup Form</h1>
    <div class="container w-75 mt-5">
    <form method="post" action="sign-up.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">User Name</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Signup</button>
</form>
<?php
    if ($success) {
        echo "<div class='alert alert-success' role='alert'>
        O no! Could not login or User not exist.
      </div>";
    }
    if ($failure) {
        echo "<div class='alert alert-success' role='alert'>
        Logged in successfully
      </div>";
    }
?>
    </div>
  </body>
</html>