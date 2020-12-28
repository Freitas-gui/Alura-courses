<?php


namespace Alura\Service;

use Alura\Authenticable;

class Authenticathor
{
    public function tryLogin(Authenticable $authenticable, string $password):void
    {
        if($authenticable->isAuthenticated($password))
            echo "Ok. User authenticated.";
        else {
            echo "Error. Password incorrect.";
            exit();
        }
    }
}