<?php
// $a = 12;
// $b = & $a;  //This is the copy by reference
// $b = 13;
// echo $a . "<br>";

// class Primary1{
//     public $name;
//     public function __construct($n){
//         $this->name = $n;
//     }
// }
// $obj18 = new Primary1("Haseeb");
// echo $obj18->name . "<br>";
// $obj19 = clone $obj18;
// $obj19->name = "Mohsin";
// echo $obj18->name . "<br>";
// echo $obj19->name . "<br>";




class Primary2{
    public $name;
    public $onjection;
    public function __construct($n){
        $this->name = $n;
    }
    public function setValue(Secondary2 $o){
        $this->onjection = $o;
    }
    public function __clone(){
        $this->onjection = clone $this->onjection;
    }
}
class Secondary2{
    public $name2;
    public function __construct($n2){
        $this->name2 = $n2;
    }
}
$obj18 = new Primary2("Haseeb");
echo $obj18->name . "<br>";
$obj20 = new Secondary2("Sami");
$obj18->setValue($obj20);
echo "<pre>";
print_r($obj18) . "<br>";
echo "</pre>";
$obj19 = clone $obj18;
$obj19->name = "Mohsin";
echo $obj18->name . "<br>";
echo $obj19->name . "<br>";

echo $obj18->onjection->name2 = "Python";
echo "<pre>";
print_r($obj19) . "<br>";
echo "</pre>";
echo "<pre>";
print_r($obj18) . "<br>";
echo "</pre>";