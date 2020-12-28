<?php


namespace Alura\Model\Employee;


class Developer extends Employee
{
    public function upLevel()
    {
        $this->upSalary($this->getSalary() * 0.75);
    }

    public function calcBonus()
    {
        return 500;
    }
}