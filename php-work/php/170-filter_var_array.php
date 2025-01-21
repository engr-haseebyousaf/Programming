<?php
$arr = array(
    "name" => "<h1>Haseeb Yousaf</h1>",
    "age" => "223",
    "gmail" => "haseeb//yousaf2000@gmail.com"
);
$filters = array(
    "name" => array(
        "filter" => FILTER_SANITIZE_STRING,
        "flags" => "FILTER_FLAG_STRIP_HIGH"
    ),
    "age" => array(
        "filter" => FILTER_VALIDATE_INT,
        "options" => array(
            "min_range" => 1,
            "max_range" => 100
        )
    ),
    "gmail" => FILTER_SANITIZE_EMAIL
);
echo "<pre>";
print_r(filter_var_array($arr, $filters));