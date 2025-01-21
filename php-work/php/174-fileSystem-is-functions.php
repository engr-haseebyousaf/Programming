<?php
if (is_file("test.txt")) {
    echo "This is a file <br>";
}else{
    echo "This is not a file <br>";
}

if (is_dir("mysql crud")) {
    echo "This is a folder <br>";
}else{
    echo "This is not a folder <br>";
}

if (is_readable("test.txt")) {
    echo "This is a readable file or folder <br>";
}else{
    echo "This is notreadable file or folder <br>";
}

if (is_writable("test.txt")) {
    echo "This is a writable file <br>";
}else{
    echo "This is not a writable file <br>";
}

if (is_executable("test.txt")) {
    echo "This is an exe file <br>";
}else{
    echo "This is not an exe file <br>";
}