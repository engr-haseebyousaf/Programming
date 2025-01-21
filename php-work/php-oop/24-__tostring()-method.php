<?php
class Bags{
    public function __toString(){
        return "You can't echo an object : " . get_class($this);
    }
}
$obj16 = new Bags();
echo $obj16;