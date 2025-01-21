<?php
class Parents{
    public $name;
    public function meth(){
        echo "First Method";
    }
}
class Child extends Parents{
    public $name;
    public function meth(){
        echo "Overrided method";
    }
}

$obj1 = new Parents();
$obj1->name = "Haseeb";
echo $obj1->name;
$obj1->meth();


$obj2 = new Child();
$obj2->name = "Sami";
echo $obj2->name;
$obj2->meth();