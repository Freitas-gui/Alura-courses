<?php

namespace Alura\Model;

class Employee extends Person
{
    private string $office;

    public function __construct(string $name, CPF $cpf, string $office)
    {
        parent::__construct($name, $cpf);
        $this->office = $office;
    }

    public function getOffice(): string
    {
        return $this->office;
    }

}