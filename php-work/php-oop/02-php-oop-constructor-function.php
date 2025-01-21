<?php
class Constructor{
    public $one, $two, $three;
    public function __construct(int $b, int $c){
        echo "This is a constructor function <br>";
        $this->one = $b;
        $this->two = $c;
        echo $this->one * $this->two;
    }
}

$obj = new Constructor(4,5);
