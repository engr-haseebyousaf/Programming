<?php
// echo "<pre>";
// print_r(glob("*"));
// echo "</pre>";

// echo "<pre>";
// print_r(glob("*php"));
// echo "</pre>";

// echo "<pre>";
// print_r(glob("*sanitize*"));
// echo "</pre>";

// echo "<pre>";
// print_r(glob("*[is]*"));
// echo "</pre>";

// echo "<pre>";
// print_r(glob("*", GLOB_MARK));  //places a slash (/) after all folders
// echo "</pre>";

// echo "<pre>";
// print_r(glob("*k", GLOB_NOCHECK));  //places a slash (/) after all folders
// echo "</pre>";

// echo "<pre>";
// print_r(glob("*", GLOB_ONLYDIR));  //Searches only folders or directories
// echo "</pre>";

echo "<pre>";
print_r(glob("{*.php,*.txt}", GLOB_BRACE));  //searches with multiple inputs
echo "</pre>";