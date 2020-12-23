<?php

class CPF{
    private $value;

    public function __construct(string $value)
    {
        $value = filter_var($value, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
            ]
        ]);
        if ($value === false) {
            echo "Cpf invalid";
            exit();
        }

        $this->value = $value;
    }

    public function getCpfHolder()
    {
        return $this->value;
    }

    public function setCpfHolder($value)
    {
        $this->value = $value;
    }
}