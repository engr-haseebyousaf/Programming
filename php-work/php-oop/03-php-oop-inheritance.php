<?php
class Employee{
    public $employee_name;
    public $employee_age;
    public $employee_salary;
    public function __construct(string $ename, int $eage, int $esalary){
        $this->employee_name = $ename;
        $this->employee_age = $eage;
        $this->employee_salary = $esalary;
        echo "This is employee constructor<br>";
    }
    public function employee_info(){
        echo "Employee Name : " . $this->employee_name . "<br>";
        echo "Employee Age : " . $this->employee_age . "<br>";
        echo "Employee Salary : " . $this->employee_salary . "<br>";
    }
}
class Manager extends Employee{
    public $travel_allow = 3000;
    public $wedding_allow = 20000;
    public $electo_bill = 30000;
    public $total_salary;
    // public function __construct(int $travel, int $wedding, int $electric){
    //     echo "This is Manager's constructor<br>";
    //     $this->travel_allow = $travel;
    //     $this->wedding_allow = $wedding;
    //     $this->electo_bill = $electric;
    // }
    public function manager_info(){
        $this->total_salary = $this->employee_salary + $this->travel_allow + $this->wedding_allow + $this->electo_bill;
        echo "Manager Name : " . $this->employee_name . "<br>";
        echo "Manager Age : " . $this->employee_age . "<br>";
        echo "Manager Salary : " . $this->total_salary . "<br>";
    }
}

$obj1 = new Employee("Haseeb",20,10000);
$obj1->employee_info();
echo "<br><br><br>";
$obj2 = new Manager("Sami", 23, 150000);
$obj2->manager_info();