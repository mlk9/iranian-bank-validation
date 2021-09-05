<?php

namespace IrBank;

class Bank
{
    public $name;
    protected $preCardNumbers = [];
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function addPreCardNumber($number)
    {
        $this->preCardNumbers[] = $number;
    }
    public function isCard($cardNumber=000000)
    {
        if(in_array($cardNumber,$this->preCardNumbers))
        {
            return true;
        }
        return false;
    }
}