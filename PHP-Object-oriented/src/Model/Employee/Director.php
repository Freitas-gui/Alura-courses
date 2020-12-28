<?php


namespace Alura\Model\Employee;


use Alura\Authenticable;

class Director extends Employee implements Authenticable
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