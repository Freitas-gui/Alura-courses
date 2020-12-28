<?php


namespace Alura\Model\Employee;


class VideoEditor extends Employee
{
    public function calcBonus()
    {
        return $this->getSalary() * 1;
    }
}