<?php

require_once 'autoload.php';

use Alura\Model\{Address, CPF};
use Alura\Model\Account\{Holder, AccountCurrent};
use Alura\Service\EmployeeControl;
use Alura\Model\Employee\{Manager, Director, Developer};



$city1 = new Address("Alcobaça","Novelo","avenida 7","33");
$city2 = new Address("Guriri","Norte","rua 9","754");

$account1 = new AccountCurrent(new Holder("Guilherme",new CPF("532.262.670-00"), $city1));
$account2 = new AccountCurrent(new Holder("Gusta", new CPF("907.788.930-22"), $city2));

$account1->deposit(500);
$account2->deposit(50);

//$account1->transfer(20, $account2);

$account1->withdraw(100);
$quantityAccount = AccountCurrent::getQuantity();
//var_dump($account1);

///////////////////////////

$employee_1 = new Manager("Junior",new CPF("532.262.670-00"),"Psicologo",3000);
$employee_2 = new Developer("Larissa",new CPF("907.788.930-22"),"Estudante",1000);
$employee_2->upLevel();

$employeeControl = new EmployeeControl();
$employeeControl->addBonus($employee_1);
$employeeControl->addBonus($employee_2);

var_dump($employeeControl->getTotalBonus());

