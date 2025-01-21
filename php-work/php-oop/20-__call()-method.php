<?php
class Call_Method{
    private $age;
    private function test($a){
        echo "This is a message from private method " . $a . "<br>";
    }
    public function __call($method, $args){
        if (method_exists($this, $method)) {
            call_user_func_array([$this,$method],$args);
        } else {
            echo "The method ({$method}) does not exist!<br>";
        }
    }
}
$obj13 = new Call_Method();
$obj13->__call("hello",12);
$obj13->test("Haseeb");