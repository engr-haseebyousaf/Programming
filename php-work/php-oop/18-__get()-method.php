<?php
class Animals{
    private $weight;
    public function __construct(){
        echo "This is animals class constructor<br>";
    }
    public function __get($name){
        echo "Trying to access private or non-existing property : ({$name})<br>";
    }
}
$obj10 = new Animals();
$obj10->weight;
$obj10->type;

class Cats{
    private $properties = ["name"=>"mew","class"=>"cat","age"=>12];
    public function __get($name){
        if (array_key_exists($name,$this->properties)) {
            echo $this->properties[$name];
        }else{
            echo "The value naming ({$name}) does not exist in cat properties";
        }
    }
}
$obj11 = new Cats();
print_r($obj11->name);