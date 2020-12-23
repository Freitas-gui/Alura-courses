<?php

require "src/CPF.php";

class Holder{
    private $cpfHolder;
    private $nameHolder;

    public function __construct(string $nameHolder, CPF $cpf)
    {
        $this->nameValidator($nameHolder);
        $this->nameHolder = $nameHolder;
        $this->cpfHolder = $cpf;
    }

    public function getNameHolder()
    {
        return $this->cpfHolder;
    }

    public function setNameHolder($nameHolder)
    {
        $this->nameHolder = $nameHolder;
    }

    private function nameValidator($nameHolder)
    {
        if(strlen($nameHolder)<5)
            exit();
    }
}