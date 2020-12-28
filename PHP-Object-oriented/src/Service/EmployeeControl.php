<?php


namespace Alura\Service;

require_once 'autoload.php';

use Alura\Model\Employee\Employee;

class EmployeeControl
{
    private float $totalBonus;

    public function __construct()
    {
        $this->totalBonus = 0;
    }

    public function addBonus(Employee $employee)
    {
        $this->totalBonus += $employee->calcBonus();
    }

    public function getTotalBonus()
    {
        return $this->totalBonus;
    }


}