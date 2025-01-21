<?php
class Calculation{
    public $a, $b, $c;
    public function addition(){
        $this->a = $this-> b + $this->c;
        return $this->a;
    }

    public function subtraction(){
        $this->a = $this-> b - $this->c;
        return $this->a;
    }
}

$obj = new Calculation();
$obj->b = 3;
$obj->c = 5;
echo $obj->addition() . "<br>";
echo $obj->subtraction();