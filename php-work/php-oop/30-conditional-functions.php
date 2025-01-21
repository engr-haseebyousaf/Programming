<?php
trait TestTrait
{
    public function sayHello(){
        echo "Hi! I am a trait";
    }
}

interface IntFace1{
    function sum($a, $b);
}
if (interface_exists('IntFace1')) {
    class Testing implements IntFace1{
        public $name = "Haseeb";
        public function sum($a, $b){
            echo $a + $b . "<br>";
        }
    }
}else {
    echo "Class doesnot exist";
}
if (class_exists("Testing") && trait_exists('TestTrait')) {
    $obj23 = new Testing();
    if (method_exists('Testing','sum')) {
        $obj23->sum(12,13);
        if (property_exists('Testing','name')) {
            echo $obj23->name;
        }
    }
}
if (is_a($obj23,'Testing')) {
    echo "obj23 is an object of class Testing";
}

class SubClass extends Testing{

}
$obj24 = new SubClass();
if (is_subclass_of($obj24,'Testing')) {
    echo "<br>Yes this is a subclass";
}