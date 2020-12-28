<?php


namespace Alura\Model\Employee;


    class Manager extends Employee
    {
        public function calcBonus()
        {
            return $this->getSalary() * 1;
        }
}