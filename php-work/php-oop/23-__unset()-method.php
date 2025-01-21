<?php
class Unsett{
    public $name = "Haseeb";
    private $age;
    private $srname;
    public function biodata($n,$a,$s){
        $this->name = $n;
        $this->age = $a;
        $this->srname = $s;
    }
    public function __unset($property){
        echo "This property is unset within __unset() method<br>";
        unset($property);
    }
    public function __get($attr){
        echo $attr;
    }
}
$obj15 = new Unsett();
$obj15->biodata("Haseeb",23,"Yousaf");
unset($obj15->name);
echo $obj15->name;
unset($obj15->age);
echo $obj15->age;
