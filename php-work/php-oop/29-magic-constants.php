<?php
namespace MyNameSpace;
trait MyTrait
{
    public function MyTraitName(){
        echo __TRAIT__ . "<br>";
    }
}
class MyClass{
    use MyTrait;
    public function getClass(){
        echo __CLASS__ . "<br>";
    }
    public function getMethod(){
        echo __METHOD__ . "<br>";
    }
    public function getNameSpace(){
        echo __NAMESPACE__ . "<br>";
    }
}
$obj22 = new MyClass();
$obj22->MyTraitName();
$obj22->getClass();
$obj22->getMethod();
$obj22->getNameSpace();
function getFunction(){
    echo __FUNCTION__ . "<br>";
}
getFunction();
echo __LINE__ . "<br>";
echo __FILE__ . "<br>";
echo __DIR__ . "<br>";