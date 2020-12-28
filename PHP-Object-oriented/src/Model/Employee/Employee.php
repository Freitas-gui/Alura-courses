<?php

namespace Alura\Model\Employee;

use Alura\Model\CPF;
use Alura\Model\Person;

abstract class Employee extends Person
{
    private string $office;
    private float $salary;

    public function __construct(string $name, CPF $cpf, string $office, float $salary)
    {
        parent::__construct($name, $cpf);
        $this->office = $office;
        $this->salary = $salary;
    }

    public function getOffice(): string
    {
        return $this->office;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function upSalary(float $value)
    {
        if($value < 0){
            echo "Value should be positive";
            return;
        }
        else
            $this->salary += $value;
    }

    public abstract function calcBonus();

}