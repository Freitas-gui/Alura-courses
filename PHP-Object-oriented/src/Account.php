<?php

require "src/Holder.php";

class Account{
    private $holder;
    private $balance;
    private static $quantity = 0;

    public function __construct($holder)
    {
        $this->holder = $holder;
        $this->balance = 0;
        self::$quantity++;
    }

    public function __destruct()
    {
        self::$quantity--;
    }

    public static function getQuantity()
    {
        return self::$quantity;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function deposit(float $value)
    {
        if($value < 0) {
            echo "Value cannot be smaller than 0";
            return;
        }
        $this->balance += $value;
    }

    public function withdraw (float $value)
    {
        if($value > $this->balance) {
            echo "Not contains this value in Balance";
            return;
        }
        $this->balance -= $value;
    }

    public function transfer(float $value, Account $destiny)
    {
        if($value > $this->balance) {
            echo "Not contains this value in Balance";
            return;
        }
        $this->withdraw($value);
        $destiny->deposit($value);
    }


}