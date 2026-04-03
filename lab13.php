<?php

    //Задание 1
    class SvoiEmployee{
        public $name;
        private $age;
        public $salary;

        public function getName(){
            return $this->name;
        } 
        public function setAge($newAge){
            if($newAge>=18){
                $this->age = $newAge;
            }
            else{
                echo "Вам работать в нашей компании еще рано</br>";
            }
        }

        public function getSalary($employees){
            $sumSalary = 0;
            foreach ($employees as $employee) {
                $sumSalary += $employee->salary;
            }
            return $sumSalary;
        }

        public function checkAge(){
            if($this->age>18){
                return true;
            }
            return false;
        }
    }

    $employee1 = new SvoiEmployee();
    $employee2 = new SvoiEmployee();

    $employee1->name = "Глеб1";
    //$employee1->age = 19;
    $employee1->salary = 100;

    
    $employee2->name = "Глеб2";
    //$employee2->age = 12;
    $employee2->salary = 20000;

    //Задание 2
    //echo "Сумма возрастов работников: ".$employee1->age+$employee2->age."</br>";
    echo "Сумма зарплат работников: ".$employee1->salary+$employee2->salary."</br>";

    //Задание 3-5
    
    echo "Имя - ".$employee1->getName()."</br>";

    //Задание 6
    echo "Зарплата всех работников - ".$employee1->getSalary([$employee1,$employee2])."</br>";
    
    //Задание 7
    $employee1->setAge(55);
    
    //Задание 8
    $employee2->setAge(12);
    $employee2->setAge(20);
    
    //Задание 9
    echo "Проверка возраста - ".$employee2->checkAge();
?>
