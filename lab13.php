<?php

    //Задание 1
    class Employee{
        public $name;
        public $age;
        public $salary;
    }

    $employee1 = new Employee();
    $employee2 = new Employee();

    $employee1->name = "Глеб1";
    $employee1->age = 19;
    $employee1->salary = 100;

    
    $employee2->name = "Глеб2";
    $employee2->age = 12;
    $employee2->salary = 20000;

    //Задание 2

    echo "Сумма возрастов работников: ".$employee1->age+$employee2->age."</br>";
    echo "Сумма зарплат работников: ".$employee1->salary+$employee2->salary."</br>";

?>
