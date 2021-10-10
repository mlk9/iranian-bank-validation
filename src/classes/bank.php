<?php

namespace IrBank\classes; //fix

class Bank
{
    public $name;
    protected $preCardNumbers = [];
    protected $ibanNumbers = [];
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function addPreCardNumber($number)
    {
        $this->preCardNumbers[] = $number;
    }
    public function addIbanNumber($number)
    {
        $this->ibanNumbers[] = $number;
    }
    public function isCard($cardNumber=000000)
    {
        if (in_array($cardNumber, $this->preCardNumbers)) {
            return true;
        }
        return false;
    }
    public function isIban($iban=000)
    {
        if (in_array($iban, $this->ibanNumbers)) {
            return true;
        }
        return false;
    }
}
