<?php
include "database.php";
$database = new Database();
// $database->insert("students2",["name"=>"Ahmad Hassan","age"=>23,"class"=>"BS IT"]);
// echo "One row inserted at : ";
// print_r($database->getResult());

// $database->update("students2",["name"=>"Husnain","age"=>27,"class"=>"BS IT"],"id='6'");
// echo "One row updated at : ";
// print_r($database->getResult());

// $database->delete("students2", "id='6'");
// echo "One row deleted at : ";
// print_r($database->getResult());

$database->select("students2","*",null,null,null,2);
echo "Selected row is : ";
echo "<pre>";
print_r($database->getResult());
echo "</pre>";

$database->pagination("students2",null,null,2);
echo "Selected row is : ";
echo "<pre>";
print_r($database->getResult());
echo "</pre>";