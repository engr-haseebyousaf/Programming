<?php
class Wu{
    public $name = "Haseeb";
    private $age;
    private $srname;
    public function setting($a,$s){
        $this->age = $a;
        $this->srname = $s;
    }
    public function __sleep(){
        return array("age","srname");
    }
    public function __wakeup(){
        echo "I just wakeup";
    }
}

$obj17 = new Wu();
$sr = serialize($obj17);
$us = unserialize($sr);
echo "<pre>";
print_r($sr);
echo "</pre>";