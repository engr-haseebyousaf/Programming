<?php
class Buffalo{
    private $attr;
    public function __set($name, $value){
        if (property_exists($this,$name)) {
            $this->name = $value;
            echo "property sets";
        }else {
            echo "This property is not existing : " . $name;
        }
    }
}
$obj12 = new Buffalo();
$obj12->attr = "Hello";