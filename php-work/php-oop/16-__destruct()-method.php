<?php
class Ablock{
    public function __construct(){
        echo "This is a constructor function message<br>";
    }
    public function message(){
        echo "This is a custom message<br>";
    }
    public function __destruct(){
        echo "This is a destructor function message<br>";
    }
}
$obj7 = new Ablock();
$obj7->message();