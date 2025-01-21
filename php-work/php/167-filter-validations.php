<?php
// $var = 10.56;
// var_dump(filter_var($var, FILTER_VALIDATE_INT));

// $var = 10;
// var_dump(filter_var($var, FILTER_VALIDATE_INT));


// $var = false;
// var_dump(filter_var($var, FILTER_VALIDATE_INT));
// if(filter_var($var, FILTER_VALIDATE_INT) || $var == 0){
//     echo "<br> {$var} is integer";
// }else{
//     echo "<br> {$var} is not integer";
// }


// $var = 30;
// var_dump(filter_var($var, FILTER_VALIDATE_INT, array("options"=>array("min_range"=>10,"max_range"=>20))));
// if(filter_var($var, FILTER_VALIDATE_INT) || $var == 0){
//     echo "<br> {$var} is integer";
// }else{
//     echo "<br> {$var} is not integer";
// }



// $var = 30.3;
// var_dump(filter_var($var, FILTER_VALIDATE_FLOAT, array("options"=>array("min_range"=>10,"max_range"=>20))));
// if(filter_var($var, FILTER_VALIDATE_FLOAT) || $var == 0){
//     echo "<br> {$var} is float";
// }else{
//     echo "<br> {$var} is not float";
// }


// $var = 30.3;
// var_dump(filter_var($var, FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE));
// if(filter_var($var, FILTER_VALIDATE_BOOL)){
//     echo "<br> {$var} is boolean";
// }else{
//     echo "<br> {$var} is not boolean";
// }


// $var = "haseebyosuaf2000@gmail.com";
// var_dump(filter_var($var, FILTER_VALIDATE_EMAIL));
// if(filter_var($var, FILTER_VALIDATE_EMAIL)){
//     echo "<br> {$var} is a valid email";
// }else{
//     echo "<br> {$var} is not a valid email";
// }


// $var = "http://www.yahoobaba.net/test/page.php?A=1";
// var_dump(filter_var($var, FILTER_VALIDATE_URL,FILTER_FLAG_QUERY_REQUIRED));
// if(filter_var($var, FILTER_VALIDATE_URL,FILTER_FLAG_QUERY_REQUIRED)){
//     echo "<br> {$var} is a valid url";
// }else{
//     echo "<br> {$var} is not a valid url";
// }


$var = "http://www.yahoobaba.net";
var_dump(filter_var($var, FILTER_VALIDATE_URL,FILTER_FLAG_PATH_REQUIRED));
if(filter_var($var, FILTER_VALIDATE_URL,FILTER_FLAG_PATH_REQUIRED)){
    echo "<br> {$var} is a valid url";
}else{
    echo "<br> {$var} is not a valid url";
}