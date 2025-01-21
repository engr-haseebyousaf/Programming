<?php
class Testing{
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
}
$obj17 = new Testing();
$sr = serialize($obj17);
echo "<pre>";
print_r($sr);
echo "</pre>";