<?php
trait Hello
{
    public function sayHello(){
        echo "Hello Everyone";
    }
}
trait Bye
{
    public function sayBye(){
        echo "Bye Bye Everyone";
    }
}
class Base1{
    use Hello,Bye;
}
class Base2{
    use Bye,Hello;
}
$obj1 = new Base1();
$obj1->sayHello();