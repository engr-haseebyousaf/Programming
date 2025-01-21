<?php
$file = "test.txt";
// echo readfile($file);

// echo file_exists($file);

// copy($file, "test folder");

// rename($file, "test1.txt");

// mkdir("test2.txt");

// rmdir("test2.txt");

// unlink("test1.txt");

// echo filesize($file);

// echo filetype($file);

// $path = realpath($file);
// echo $path . "<br>";
// echo "<pre>";
// print_r(pathinfo($path));
// echo "</pre>";

// $path = realpath($file);
// echo $path . "<br>";
// echo "<pre>";
// print_r(pathinfo($path, PATHINFO_DIRNAME));
// echo "</pre>";

$path = realpath($file);
echo dirname($path) . "<br>";
echo basename($path);