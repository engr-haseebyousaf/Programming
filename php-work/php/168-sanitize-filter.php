<?php
// $var = "hello@gm//  ail.com";
// echo filter_var($var, FILTER_SANITIZE_EMAIL);


// $var = "http://yah oobaba.net.net";
// echo filter_var($var, FILTER_SANITIZE_URL);

// $var = -45.00;
// echo filter_var($var, FILTER_SANITIZE_NUMBER_INT);

$var = -45.34;
echo filter_var($var, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);