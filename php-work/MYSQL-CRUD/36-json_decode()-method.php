<?php
$file_path = "json/my.json";
$file_contents = file_get_contents($file_path);
$decoded_array = json_decode($file_contents, true);
echo "<table border='1px' cellpadding='8px' cellspacing='2px'>";
foreach ($decoded_array as list("userId" => $uid, "id" => $id, "title" => $title)) {
    echo "<tr><td>".$uid."</td><td>".$id."</td><td>".$title."</td></tr>";
}
echo "</table>";

// echo "<pre>";
// print_r($decoded_array);
// echo "</pre>";