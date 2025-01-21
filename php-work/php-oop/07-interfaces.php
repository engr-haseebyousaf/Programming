<?php
interface parent1{
    function sum($a, $b);
    function sub($c, $d);
}
interface parent2{
    function mul($e, $f);
    function div($g, $h);
}
class ChildClass implements parent1, parent2{
    public function sum($i, $j){
        echo "Sum is : " . $i + $j . "<br>";
    }
    public function sub($c, $d){
        echo "Subtract is : " . $c - $d . "<br>";
    }
    public function mul($c, $d){
        echo "Multiplication is : " . $c * $d . "<br>";
    }
    public function div($c, $d){
        echo "Division is : " . $c / $d . "<br>";
    }
}

$obj = new ChildClass();
$obj->sum(10,5);
$obj->sub(10,5);
$obj->mul(10,5);
$obj->div(10,5);