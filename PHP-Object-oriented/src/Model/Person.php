<?php

namespace Alura\Model;

require_once 'autoload.php';

use Alura\Model\CPF;

class Person
{
    protected string $name;
    public CPF $cpf;

    public function __construct(string $name, CPF $cpf)
    {
        $this->nameValidator($name);
        $this->name = $name;
        $this->cpf = $cpf;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    protected function nameValidator($name)
    {
        if(strlen($name)<5)
            exit();
    }

}