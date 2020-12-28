<?php


namespace Alura\Model\Employee;


class Director extends Employee
{
    public function calcBonus()
    {
        return $this->getSalary() * 2;
    }

    public function isAuthenticated(string $password):bool
    {
        return $password==="12345";
    }
}