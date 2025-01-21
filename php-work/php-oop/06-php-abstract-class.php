<?php
abstract class Parent_{
    protected $name;
    protected  function __construct($n){
        $this->name = $n;
    }
    protected abstract function summation($a, $b);
}
class Child_{
    public function summation($c, $d){
        echo $c + $d;
    }
}

$obj = new Child_();
$obj->summation(12,13);