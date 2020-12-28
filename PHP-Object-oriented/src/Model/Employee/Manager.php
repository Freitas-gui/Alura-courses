<?php


namespace Alura\Model\Employee;

use Alura\Authenticable;

    class Manager extends Employee implements Authenticable
    {
        public function calcBonus()
        {
            return $this->getSalary() * 1;
        }

        public function isAuthenticated(string $password):bool
        {
            return $password==="54321";
        }
}