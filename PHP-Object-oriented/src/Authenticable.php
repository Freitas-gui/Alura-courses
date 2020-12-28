<?php

namespace Alura;

interface Authenticable
{
    public function isAuthenticated(string $password): bool;
}