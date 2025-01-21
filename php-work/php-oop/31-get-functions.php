<?php
class Class1{
    public $name = "Haseeb";
    public function __construct(){
        echo "Your class name within class is : " . get_class($this) . "<br>";
        echo "Your class methods name within class is : ";
        print_r(get_class_methods($this)) . "<br>";
        echo "<br>Your class vars name within class is : ";
        print_r(get_class_vars('Class1')) . "<br>";
    }
    public static function calledClass1(){
        return var_dump(get_called_class());
    }
    public function __get($property){
        echo "Variable not exist or private : " . $property;
    }
    public function __destruct(){
        echo "<br>This is a descructor function message<br>";
    }
}
class Class2 extends Class1{
    public function __construct(){
        echo "<br>The parent class of this class is : " . get_parent_class($this) . "<br>";
    }
    public static function calledClass2(){
        var_dump(get_called_class());
    }
    public function __destruct(){
        echo "This is the destructor function of class2";
    }
}
$obj25 = new Class1();
echo "<br><br><br>Your class name outside class is : " . get_class($obj25) . "<br>";
echo "<h3>Your class methods outside class are </h3>";
echo "<pre>";
print_r(get_class_methods($obj25));
echo "</pre><br>";

echo "<h3>Your class variables outside class are </h3>";
echo "<pre>";
print_r(get_class_vars(get_class($obj25)));
echo "</pre><br>";

echo "<h3>Your object variables outside class are </h3>";
echo "<pre>";
print_r(get_object_vars($obj25));
echo "</pre><br>";

$obj26 = new Class2();

echo "<h3>Get called classes</h3>";
Class1::calledClass1();
Class2::calledClass1();

echo "<h3>Declared Classes</h3>";
print_r(get_declared_classes());
echo "<h3>Declared interfaces</h3>";
print_r(get_declared_interfaces());
echo "<h3>Declared traits</h3>";
print_r(get_declared_traits());


echo "<h3>This is class alias</h3>";
class_alias('Class2','C');
$obj27 = new C();
echo "<br>" . $obj27->name . "<br>";