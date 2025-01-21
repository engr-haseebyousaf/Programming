<?php
class TestInvoke{
    public $name;
    public function __construct($n){
        $this->name = $n;
    }
    public function __invoke(){
        echo "Unable to make an object a method";
    }
}
$obj21 = new TestInvoke("Haseeb");
$obj21();