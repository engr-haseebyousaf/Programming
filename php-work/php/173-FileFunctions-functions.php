<?php
$file = fopen("test.txt", "a+");
// echo fread($file, 4);

// echo fgets($file,150) . "<br>";

// echo ftell($file);

// fseek($file,15);
// echo "<br>" . fgets($file);


// fread($file, 200);
// echo fpassthru($file);
// rewind($file);

// echo "<ul>";
// while (!feof($file)) {
//     $line = fgets($file);
//     echo "<li>" . $line . "</li>";
// }
// echo "</ul>";

// echo "<pre>";
// print_r(file("test.txt"));
// echo "</pre>";

// echo fgetc($file);

// fwrite($file, "This is New data");

// ftruncate($file, 1000);

fclose($file);