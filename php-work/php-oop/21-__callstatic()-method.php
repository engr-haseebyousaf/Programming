<?php
class Fruits{
    private static function mango($name,$age){
        echo "My name is : " . $name . "<br>";
        echo "My age is : " . $age . "<br>";
    }
    public static function __callStatic($method, $arguments){
        if (method_exists(__CLASS__, $method)) {
            call_user_func_array([__CLASS__,$method],$arguments);
        }else {
            echo "The method ({$method}) does't exist";
        }
    }
}

Fruits::mango("Sweet Mango",12);
Fruits::orange("Sweet Orange",13);