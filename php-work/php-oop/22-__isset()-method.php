<?php
class Set{
    public $name;
    private $age;
    public function person($n,$a){
        $this->name = $n;
        $this->age = $a;
    }
    public function __isset($property){
        echo "Proeprty {$property} is setted";
    }
}
$obj14 = new Set();
$obj14->person("Haseeb",12);
echo isset($obj14->age);