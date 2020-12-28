<?php

require_once 'autoload.php';

use Alura\Model\Address;
use Alura\Model\CPF;
use Alura\Model\Account\Holder;
use Alura\Model\Account\AccountCurrent;

$city1 = new Address("Alcobaça","Novelo","avenida 7","33");
$city2 = new Address("Guriri","Norte","rua 9","754");

$account1 = new AccountCurrent(new Holder("Guilherme",new CPF("532.262.670-00"), $city1));
$account2 = new AccountCurrent(new Holder("Gusta", new CPF("907.788.930-22"), $city2));

$account1->deposit(500);
$account2->deposit(50);

//$account1->transfer(20, $account2);

$account1->withdraw(100);
$quantityAccount = AccountCurrent::getQuantity();
var_dump($account1);
