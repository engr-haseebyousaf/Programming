<?php
// making a custom interface to pass to a class naming typeHintingClass for type hinting
interface parent3{
    function intFunction($a, $b);
}
//making a custom class that is to be passed to another class naming as typeHintingClass
class Test implements parent3{
    public function __construct(){
        echo "I am passing this class as argument<br>";
    }
    public function message(){
        return "I am a message<br>";
    }
    public function intFunction($a, $b){
        echo "Sum is : " . $a + $b . "<br>";
    }
}

// a class for testing type hinting (type hinting arguments are passed to it)
class typeHintingClass{
    // type hinting of int
    public function __construct(int $a){
        echo $a + 10;
    }
    public function arr(array $variable){
        foreach ($variable as $key => $value) {
            echo "$key : $value<br>";
        }
    }
    public function class_(Test $obj1){
        echo $obj1->message();
    }
}

$obj = new typeHintingClass(9);
echo "<br>";
$new_array = ["name"=>"Haseeb","age"=>24,"class"=>"BS IT"];
$obj->arr($new_array);
echo "<br>";


// making an object of class Test and passing it to Class_ method of class typeHintingClass
$obj1 = new Test();
$obj->class_($obj1);