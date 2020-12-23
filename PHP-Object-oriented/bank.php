<?php

require "src/Account.php";


$account1 = new Account(new Holder("Guilherme",new CPF("532.262.670-00")));
$account2 = new Account(new Holder("Gusta", new CPF("907.788.930-22")));

$account1->deposit(100);
$account2->deposit(50);

$account1->transfer(20, $account2);

$quantityAccount = Account::getQuantity();
var_dump($account1,$account2);
