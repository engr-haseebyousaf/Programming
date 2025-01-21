<?php
class GrandParent{
    public static $grand_parent;
    public static $age;
    public static $user_class;
    public function __construct($n){
        self::$grand_parent = $n;
        echo "This is grand parent constructor : ";
        echo self::$grand_parent;
    }
}
class ParentClass extends GrandParent{
    public function __construct($a){
        echo "This is Parent constructor : ";
        parent::$age = $a;
        echo parent::$age;
    }
}
class GrandChild extends ParentClass{
    public function __construct($b){
        echo "This is a function of grand child class : ";
        parent::$user_class = $b;
        echo parent::$user_class;
    }
}
$obj1 = new GrandParent("Haseeb");
echo "<br>";
$obj2 = new ParentClass(79);
echo "<br>";
$obj3 = new GrandChild("Hollo");