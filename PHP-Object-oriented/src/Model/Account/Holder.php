<?php

namespace Alura\Model\Account;

require_once 'autoload.php';

use Alura\Model\CPF;
use Alura\Model\Person;
use Alura\Model\Address;


class Holder extends Person {

    private $address;

    public function __construct(string $nameHolder, CPF $cpf, Address $address)
    {
        parent::__construct($nameHolder, $cpf);
        $this->address = $address;
    }

   public function getAddress(): Address
    {
        return $this->address;
    }
}