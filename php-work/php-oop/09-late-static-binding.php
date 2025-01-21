<?php
class ParentClass{
    public static $name = "Haseeb";
    public function __construct(){
        echo static::$name;
    }
}
class ChildClass extends ParentClass{
    public static $name = "Baba";
}
$obj = new ChildClass();