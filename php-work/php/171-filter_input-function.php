<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>filter_input Function</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="age">Age</label>
        <input type="text" name="age" id="age">
        <input type="submit" value="Submit"><br>
    </form>
</body>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $options = array(
        "options" => array(
            "min_range" => 1,
            "max_range" => 100
        )
    );
    $condition = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT, $options);
    echo $condition;
    if ($condition) {
        echo "Valid age";
    }else{
        echo "Invalid age";
    }
}
?>
</html>