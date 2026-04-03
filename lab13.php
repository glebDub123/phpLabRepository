<?php

    //Задание 1
    class SvoiEmployee{
        public $name;
        public $age;
        public $salary;

        public function getName(){
            return $this->name;
        } 
        public function getAge(){
            return $this->age;
        }
        public function getSalary(){
            return $this->salary;
        }
    }

    $employee1 = new SvoiEmployee();
    $employee2 = new SvoiEmployee();

    $employee1->name = "Глеб1";
    $employee1->age = 19;
    $employee1->salary = 100;

    
    $employee2->name = "Глеб2";
    $employee2->age = 12;
    $employee2->salary = 20000;

    //Задание 2
    echo "Сумма возрастов работников: ".$employee1->age+$employee2->age."</br>";
    echo "Сумма зарплат работников: ".$employee1->salary+$employee2->salary."</br>";

    //Задание 3-5

    echo "Имя - ".$employee1->getName()."</br>";
    echo "Возраст - ".$employee1->getAge()."</br>";
    echo "Зарплата - ".$employee1->getSalary()."</br>";
    
?>
