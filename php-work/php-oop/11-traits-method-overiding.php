<?php
trait One
{
    private function sayHello(){
        echo "Hello Everyone : one";
    }
}
trait Two
{
    public function sayHello(){
        echo "Hello Everyone : two";
    }
}
class Base{
    public function sayHello(){
        echo "Hello Everyone : Base Class";
    }
}
class ChildClass extends Base{
    use Two,One{
        Two::sayHello insteadof One;
        One::sayHello as public hello;
    }
    // public function sayHello(){
    //     echo "Hello Everyone : Child Class";
    // }
}
$obj = new ChildClass();
$obj->sayHello();
echo "<br>";
$obj->hello();
echo "<br>";
$obj->sayHello();
echo "<br>";