<?php
spl_autoload_register(function ($name){
    include $name . ".php";
});
$obj8 = new One();
$obj9 = new Two();