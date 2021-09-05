<?php

namespace IrBank;

use IrBank\Bank;
class IrBank
{
    public static function cardValidate($cardNumber = 0000000000000000)
    {
        if(strlen($cardNumber)!=16)
        {
            return false;
        }
        $sum = [];
        $numbers = [];
        $passKey = [0,2,1,2,1,2,1,2,1,2,1,2,1,2,1,2,1,];
        if(preg_match("/^([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])$/s",$cardNumber,$numbers))
        {
            foreach ($numbers as $key => $number) {
                $row = $number*$passKey[$key];
                $sum[] = $row>9 ? $row-9 : $row;
            }
            return array_sum($sum)%10==0?true:false; 
        }else{
            return false;
        }
    }

    public static function getBankNameByCard($cardNumber = 0000000000000000)
    {
        if(!self::cardValidate($cardNumber))
        {
            return null;
        }

        $number = substr($cardNumber,0,6);
        $banks = [];
        $banks[0] = new Bank('eghtesad-novin'); 
        $banks[0]->addPreCardNumber(627412);
        $banks[1] = new Bank('ansar'); 
        $banks[1]->addPreCardNumber(627381);
        $banks[2] = new Bank('saderat'); 
        $banks[2]->addPreCardNumber(603769);

        foreach ($banks as $bank) {
            if($bank->isCard($number))
            {
                return $bank->name;
            }  
        }
        return null;
    }
    
}