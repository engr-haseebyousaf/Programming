<?php
// $var = "Hello Haseeb' / and 'oh";
// echo filter_var($var, FILTER_SANITIZE_ADD_SLASHES);

// $var = "Hello Haseeb' / and 'oh §ÃÝ";
// echo filter_var($var, FILTER_SANITIZE_STRING,FILTER_FLAG_ENCODE_HIGH);

// $var = "Hello Haseeb' / and 'oh §ÃÝ";
// echo filter_var($var, FILTER_SANITIZE_ENCODED,FILTER_FLAG_ENCODE_HIGH);

$var = "@$%^&Hello Haseeb' / and 'oh §ÃÝ";
echo filter_var($var, FILTER_SANITIZE_SPECIAL_CHARS);