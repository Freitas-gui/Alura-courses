<?php


namespace Alura\Model\Account;

require_once 'autoload.php';

use Alura\Model\Account\Account;

class AccountCurrent extends Account

{
    protected function rateValue():float
    {
        return 0.03;
    }
}




