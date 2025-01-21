<?php
$dir = ".";
if(is_dir($dir)){
    if ($d = opendir($dir)) {
        while($file = readdir($d)){
            echo "filename : " . $file . "<br>"; 
        }
    }
}