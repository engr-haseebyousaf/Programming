<?php
class Abc{
    public function one(){
        echo "This is first method<br>";
        return $this;
    }
    public function two(){
        echo "This is second method<br>";
        return $this;
    }
    public function three(){
        echo "This is third method<br>";
        return $this;
    }
}
$obj6 = new Abc();
$obj6->one()->two()->three();