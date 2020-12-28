<?php


namespace Alura\Model\Account;

require_once 'autoload.php';

use Alura\Model\Account\Account;

class AccountSavings extends Account
{
    protected function rateValue():float
    {
        return 0.05;
    }
}