<?php

namespace IrBank\Classes;

class Bank
{
    public $name;
    protected $preCardNumbers = [];
    protected $shebaNumbers = [];
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function addPreCardNumber($number)
    {
        $this->preCardNumbers[] = $number;
    }
    public function addShebaNumber($number)
    {
        $this->shebaNumbers[] = $number;
    }
    public function isCard($cardNumber=000000)
    {
        if (in_array($cardNumber, $this->preCardNumbers)) {
            return true;
        }
        return false;
    }
    public function isSheba($sheba=000)
    {
        if (in_array($sheba, $this->shebaNumbers)) {
            return true;
        }
        return false;
    }
}
