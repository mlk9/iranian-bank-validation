<?php

namespace IrBank;

use IrBank\Classes\Bank;

class IrBank
{
    protected static $banks = [];
    protected static function data()
    {
        self::$banks[] = $bankObj = new Bank('eghtesad-novin');
        $bankObj->addPreCardNumber(627412);
        self::$banks[] = $bankObj = new Bank('ansar');
        $bankObj->addPreCardNumber(627381);
        $bankObj->addShebaNumber(63);
        self::$banks[] = $bankObj = new Bank('iran-zamin');
        $bankObj->addPreCardNumber(505785);
        self::$banks[] = $bankObj = new Bank('saderat');
        $bankObj->addPreCardNumber(603769);
        $bankObj->addShebaNumber(19);
        self::$banks[] = $bankObj = new Bank('parsian');
        $bankObj->addPreCardNumber(622106);
        $bankObj->addPreCardNumber(627884);
        $bankObj->addShebaNumber(54);
        self::$banks[] = $bankObj = new Bank('pasargad');
        $bankObj->addPreCardNumber(639347);
        $bankObj->addPreCardNumber(502229);
        $bankObj->addShebaNumber(57);
        self::$banks[] = $bankObj = new Bank('tat');
        $bankObj->addPreCardNumber(626314);
        self::$banks[] = $bankObj = new Bank('tejarat');
        $bankObj->addPreCardNumber(627353);
        self::$banks[] = $bankObj = new Bank('tosee-taavon');
        $bankObj->addPreCardNumber(502908);
        self::$banks[] = $bankObj = new Bank('tosee-saderat');
        $bankObj->addPreCardNumber(627648);
        $bankObj->addPreCardNumber(207177);
        $bankObj->addShebaNumber(20);
        self::$banks[] = $bankObj = new Bank('hekmat-iranian');
        $bankObj->addPreCardNumber(636949);
        self::$banks[] = $bankObj = new Bank('dey');
        $bankObj->addPreCardNumber(502938);
        self::$banks[] = $bankObj = new Bank('refah');
        $bankObj->addPreCardNumber(589463);
        $bankObj->addShebaNumber(13);
        self::$banks[] = $bankObj = new Bank('saman');
        $bankObj->addPreCardNumber(621986);
        $bankObj->addShebaNumber(56);
        self::$banks[] = $bankObj = new Bank('sepah');
        $bankObj->addPreCardNumber(589210);
        $bankObj->addShebaNumber(15);
        self::$banks[] = $bankObj = new Bank('sarmaye');
        $bankObj->addPreCardNumber(639607);
        self::$banks[] = $bankObj = new Bank('sina');
        $bankObj->addPreCardNumber(639346);
        self::$banks[] = $bankObj = new Bank('shahr');
        $bankObj->addPreCardNumber(502806);
        self::$banks[] = $bankObj = new Bank('sanaat-madan');
        $bankObj->addPreCardNumber(627961);
        self::$banks[] = $bankObj = new Bank('mehr-iran');
        $bankObj->addPreCardNumber(606373);
        self::$banks[] = $bankObj = new Bank('ghavamin');
        $bankObj->addPreCardNumber(639599);
        $bankObj->addShebaNumber(52);
        self::$banks[] = $bankObj = new Bank('kar-afarin');
        $bankObj->addPreCardNumber(627488);
        $bankObj->addPreCardNumber(502910);
        self::$banks[] = $bankObj = new Bank('keshavarzi');
        $bankObj->addPreCardNumber(603770);
        $bankObj->addPreCardNumber(639217);
        self::$banks[] = $bankObj = new Bank('gardeshgari');
        $bankObj->addPreCardNumber(505416);
        self::$banks[] = $bankObj = new Bank('markazi');
        $bankObj->addPreCardNumber(636795);
        self::$banks[] = $bankObj = new Bank('maskan');
        $bankObj->addPreCardNumber(628023);
        self::$banks[] = $bankObj = new Bank('melat');
        $bankObj->addPreCardNumber(610433);
        $bankObj->addPreCardNumber(991975);
        $bankObj->addShebaNumber(12);
        self::$banks[] = $bankObj = new Bank('meli');
        $bankObj->addPreCardNumber(603799);
        $bankObj->addShebaNumber(17);
        self::$banks[] = $bankObj = new Bank('mehr-eghtesad');
        $bankObj->addPreCardNumber(639370);
        $bankObj->addShebaNumber(22);
        self::$banks[] = $bankObj = new Bank('post-bank');
        $bankObj->addPreCardNumber(627760);
        self::$banks[] = $bankObj = new Bank('moasese-tosee');
        $bankObj->addPreCardNumber(628157);
        self::$banks[] = $bankObj = new Bank('moasese-kosar');
        $bankObj->addPreCardNumber(505801);
        self::$banks[] = $bankObj = new Bank('moasese-asgarie');
        $bankObj->addPreCardNumber(606256);
        self::$banks[] = $bankObj = new Bank('moasese-resalat');
        $bankObj->addPreCardNumber(504172);
        self::$banks[] = $bankObj = new Bank('ayande');
        $bankObj->addPreCardNumber(636214);
        $bankObj->addShebaNumber(62);
        self::$banks[] = $bankObj = new Bank('khavarmiyane');
        $bankObj->addPreCardNumber(505809);
    }

    public static function cardValidate($cardNumber = 0000000000000000)
    {
        if (strlen($cardNumber)!=16) {
            return false;
        }
        $sum = [];
        $numbers = [];
        $passKey = [0,2,1,2,1,2,1,2,1,2,1,2,1,2,1,2,1,];
        if (preg_match("/^([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])$/s", $cardNumber, $numbers)) {
            foreach ($numbers as $key => $number) {
                $row = $number*$passKey[$key];
                $sum[] = $row>9 ? $row-9 : $row;
            }
            return array_sum($sum)%10==0 ? true : false;
        } else {
            return false;
        }
    }

    public static function getBankNameByCard($cardNumber = 0000000000000000)
    {
        if (!self::cardValidate($cardNumber)) {
            return null;
        }

        $number = substr($cardNumber, 0, 6);
        self::data();
        foreach (self::$banks as $bank) {
            if ($bank->isCard($number)) {
                return $bank->name;
            }
        }
        return null;
    }
}
