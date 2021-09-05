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
        $banks[] = $bankObj = new Bank('eghtesad-novin'); 
        $bankObj->addPreCardNumber(627412);
        $banks[] = $bankObj = new Bank('ansar'); 
        $bankObj->addPreCardNumber(627381);
        $banks[] = $bankObj = new Bank('iran-zamin'); 
        $bankObj->addPreCardNumber(505785);
        $banks[] = $bankObj = new Bank('saderat'); 
        $bankObj->addPreCardNumber(603769);
        $banks[] = $bankObj = new Bank('parsian'); 
        $bankObj->addPreCardNumber(622106);
        $bankObj->addPreCardNumber(627884);
        $banks[] = $bankObj = new Bank('pasargad'); 
        $bankObj->addPreCardNumber(639347);
        $bankObj->addPreCardNumber(502229);
        $banks[] = $bankObj = new Bank('tat'); 
        $bankObj->addPreCardNumber(626314);
        $banks[] = $bankObj = new Bank('tejarat'); 
        $bankObj->addPreCardNumber(627353);
        $banks[] = $bankObj = new Bank('tosee-taavon'); 
        $bankObj->addPreCardNumber(502908);
        $banks[] = $bankObj = new Bank('tosee-saderat'); 
        $bankObj->addPreCardNumber(627648);
        $bankObj->addPreCardNumber(207177);
        $banks[] = $bankObj = new Bank('hekmat-iranian'); 
        $bankObj->addPreCardNumber(636949);
        $banks[] = $bankObj = new Bank('dey'); 
        $bankObj->addPreCardNumber(502938);
        $banks[] = $bankObj = new Bank('refah'); 
        $bankObj->addPreCardNumber(589463);
        $banks[] = $bankObj = new Bank('saman'); 
        $bankObj->addPreCardNumber(621986);
        $banks[] = $bankObj = new Bank('sepah'); 
        $bankObj->addPreCardNumber(589210);
        $banks[] = $bankObj = new Bank('sarmaye'); 
        $bankObj->addPreCardNumber(639607);
        $banks[] = $bankObj = new Bank('sina'); 
        $bankObj->addPreCardNumber(639346);
        $banks[] = $bankObj = new Bank('shahr'); 
        $bankObj->addPreCardNumber(502806);
        $banks[] = $bankObj = new Bank('sanaat-madan'); 
        $bankObj->addPreCardNumber(627961);
        $banks[] = $bankObj = new Bank('mehr-iran'); 
        $bankObj->addPreCardNumber(606373);
        $banks[] = $bankObj = new Bank('ghavamin'); 
        $bankObj->addPreCardNumber(639599);
        $banks[] = $bankObj = new Bank('kar-afarin'); 
        $bankObj->addPreCardNumber(627488);
        $bankObj->addPreCardNumber(502910);
        $banks[] = $bankObj = new Bank('keshavarzi'); 
        $bankObj->addPreCardNumber(603770);
        $bankObj->addPreCardNumber(639217);
        $banks[] = $bankObj = new Bank('gardeshgari'); 
        $bankObj->addPreCardNumber(505416);
        $banks[] = $bankObj = new Bank('markazi'); 
        $bankObj->addPreCardNumber(636795);
        $banks[] = $bankObj = new Bank('maskan'); 
        $bankObj->addPreCardNumber(628023);
        $banks[] = $bankObj = new Bank('melat'); 
        $bankObj->addPreCardNumber(610433);
        $bankObj->addPreCardNumber(991975);
        $banks[] = $bankObj = new Bank('meli'); 
        $bankObj->addPreCardNumber(603799);
        $banks[] = $bankObj = new Bank('mehr-eghtesad'); 
        $bankObj->addPreCardNumber(639370);
        $banks[] = $bankObj = new Bank('post-bank'); 
        $bankObj->addPreCardNumber(627760);
        $banks[] = $bankObj = new Bank('moasese-tosee'); 
        $bankObj->addPreCardNumber(628157);
        $banks[] = $bankObj = new Bank('moasese-kosar'); 
        $bankObj->addPreCardNumber(505801);
        $banks[] = $bankObj = new Bank('moasese-asgarie'); 
        $bankObj->addPreCardNumber(606256);
        $banks[] = $bankObj = new Bank('moasese-resalat'); 
        $bankObj->addPreCardNumber(504172);
        $banks[] = $bankObj = new Bank('ayande'); 
        $bankObj->addPreCardNumber(636214);

        foreach ($banks as $bank) {
            if($bank->isCard($number))
            {
                return $bank->name;
            }  
        }
        return null;
    }
    
}