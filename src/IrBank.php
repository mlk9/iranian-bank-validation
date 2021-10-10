<?php

namespace IrBank;

use IrBank\classes\bank;

class IrBank
{
    protected static $banks = [];
    protected static function data()
    {
        self::$banks[] = $bankObj = new Bank('اقتصاد نوین');
        $bankObj->addPreCardNumber(627412);
        $bankObj->addIbanNumber(55);
        self::$banks[] = $bankObj = new Bank('انصار');
        $bankObj->addPreCardNumber(627381);
        $bankObj->addIbanNumber(63);
        self::$banks[] = $bankObj = new Bank('ایران زمین');
        $bankObj->addPreCardNumber(505785);
        $bankObj->addIbanNumber(69);
        self::$banks[] = $bankObj = new Bank('صادرات');
        $bankObj->addPreCardNumber(603769);
        $bankObj->addIbanNumber(19);
        self::$banks[] = $bankObj = new Bank('پارسیان');
        $bankObj->addPreCardNumber(622106);
        $bankObj->addPreCardNumber(627884);
        $bankObj->addIbanNumber(54);
        self::$banks[] = $bankObj = new Bank('پاسارگاد');
        $bankObj->addPreCardNumber(639347);
        $bankObj->addPreCardNumber(502229);
        $bankObj->addIbanNumber(57);
        self::$banks[] = $bankObj = new Bank('تات');
        $bankObj->addPreCardNumber(626314);
        self::$banks[] = $bankObj = new Bank('تجارت');
        $bankObj->addPreCardNumber(627353);
        $bankObj->addIbanNumber(18);
        self::$banks[] = $bankObj = new Bank('توسعه تعاون');
        $bankObj->addPreCardNumber(502908);
        self::$banks[] = $bankObj = new Bank('توسعه صادرات');
        $bankObj->addPreCardNumber(627648);
        $bankObj->addPreCardNumber(207177);
        $bankObj->addIbanNumber(20);
        self::$banks[] = $bankObj = new Bank('حکمت ایرانیان');
        $bankObj->addPreCardNumber(636949);
        self::$banks[] = $bankObj = new Bank('دی');
        $bankObj->addPreCardNumber(502938);
        self::$banks[] = $bankObj = new Bank('رفاه');
        $bankObj->addPreCardNumber(589463);
        $bankObj->addIbanNumber(13);
        self::$banks[] = $bankObj = new Bank('سامان');
        $bankObj->addPreCardNumber(621986);
        $bankObj->addIbanNumber(56);
        self::$banks[] = $bankObj = new Bank('سپه');
        $bankObj->addPreCardNumber(589210);
        $bankObj->addIbanNumber(15);
        self::$banks[] = $bankObj = new Bank('سرمایه');
        $bankObj->addPreCardNumber(639607);
        $bankObj->addIbanNumber(58);
        self::$banks[] = $bankObj = new Bank('سینا');
        $bankObj->addPreCardNumber(639346);
        self::$banks[] = $bankObj = new Bank('شهر');
        $bankObj->addPreCardNumber(502806);
        $bankObj->addIbanNumber(61);
        self::$banks[] = $bankObj = new Bank('صنعت و معدن');
        $bankObj->addPreCardNumber(627961);
        $bankObj->addIbanNumber(11);
        self::$banks[] = $bankObj = new Bank('مهر ایران');
        $bankObj->addPreCardNumber(606373);
        self::$banks[] = $bankObj = new Bank('قوامین');
        $bankObj->addPreCardNumber(639599);
        $bankObj->addIbanNumber(52);
        self::$banks[] = $bankObj = new Bank('کارآفرین');
        $bankObj->addPreCardNumber(627488);
        $bankObj->addPreCardNumber(502910);
        $bankObj->addIbanNumber(53);
        self::$banks[] = $bankObj = new Bank('کشاورزی');
        $bankObj->addPreCardNumber(603770);
        $bankObj->addPreCardNumber(639217);
        $bankObj->addIbanNumber(16);
        self::$banks[] = $bankObj = new Bank('گردشگری');
        $bankObj->addPreCardNumber(505416);
        self::$banks[] = $bankObj = new Bank('مرکزی');
        $bankObj->addPreCardNumber(636795);
        $bankObj->addIbanNumber(10);
        self::$banks[] = $bankObj = new Bank('مسکن');
        $bankObj->addPreCardNumber(628023);
        $bankObj->addIbanNumber(14);
        self::$banks[] = $bankObj = new Bank('ملت');
        $bankObj->addPreCardNumber(610433);
        $bankObj->addPreCardNumber(991975);
        $bankObj->addIbanNumber(12);
        self::$banks[] = $bankObj = new Bank('ملی');
        $bankObj->addPreCardNumber(603799);
        $bankObj->addIbanNumber(17);
        self::$banks[] = $bankObj = new Bank('مهر اقتصاد');
        $bankObj->addPreCardNumber(639370);
        $bankObj->addIbanNumber(22);
        self::$banks[] = $bankObj = new Bank('پست بانک');
        $bankObj->addPreCardNumber(627760);
        $bankObj->addIbanNumber(21);
        self::$banks[] = $bankObj = new Bank('موسسه توسعه');
        $bankObj->addPreCardNumber(628157);
        $bankObj->addIbanNumber(51);
        self::$banks[] = $bankObj = new Bank('موسسه کوثر');
        $bankObj->addPreCardNumber(505801);
        self::$banks[] = $bankObj = new Bank('موسسه ملل (عسکریه)');
        $bankObj->addPreCardNumber(606256);
        self::$banks[] = $bankObj = new Bank('موسسه رسالت');
        $bankObj->addPreCardNumber(504172);
        self::$banks[] = $bankObj = new Bank('آینده');
        $bankObj->addPreCardNumber(636214);
        $bankObj->addIbanNumber(62);
        self::$banks[] = $bankObj = new Bank('کشاورزی');
        $bankObj->addPreCardNumber(505809);
    }

    protected static function convertNumbers($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

        return $englishNumbersOnly;
    }

    public static function cardValidate($cardNumber = 0000000000000000)
    {
        if (strlen(self::convertNumbers($cardNumber))!=16) {
            return false;
        }
        $sum = [];
        $numbers = [];
        $passKey = [0,2,1,2,1,2,1,2,1,2,1,2,1,2,1,2,1,];
        if (preg_match("/^([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])$/s", self::convertNumbers($cardNumber), $numbers)) {
            foreach ($numbers as $key => $number) {
                $row = $number*$passKey[$key];
                $sum[] = $row>9 ? $row-9 : $row;
            }
            return array_sum($sum)%10==0 ? true : false;
        } else {
            return false;
        }
    }

    public static function ibanValidate($ibanNumber = "IR000000000000000000000000")
    {
        if (strlen(self::convertNumbers($ibanNumber))!=26) {
            return false;
        }
        if (strtoupper(substr($ibanNumber, 0, 2))!="IR") {
            return false;
        }
        $ir = 1827;

        $formula = substr(self::convertNumbers($ibanNumber), 4, 22).$ir.substr(self::convertNumbers($ibanNumber), 2, 2);
        $formulacheck = intval(substr($formula, 0, 1));

        for ($i = 1; $i < strlen($formula); $i++) {
            $formulacheck *= 10;
            $formulacheck += intval(substr($formula, $i, 1));
            $formulacheck %= 97;
        }
        return $formulacheck == 1;
    }

    public static function getBankNameByCard($cardNumber = 0000000000000000)
    {
        if (!self::cardValidate($cardNumber)) {
            return null;
        }

        $number = substr(self::convertNumbers($cardNumber), 0, 6);
        self::data();
        foreach (self::$banks as $bank) {
            if ($bank->isCard($number)) {
                return $bank->name;
            }
        }
        return null;
    }

    public static function getBankNameByIban($ibanNumber = "IR000000000000000000000000")
    {
        if (!self::ibanValidate(self::convertNumbers($ibanNumber))) {
            return null;
        }

        $number = substr(self::convertNumbers($ibanNumber), 4, 3);
        self::data();
        foreach (self::$banks as $bank) {
            if ($bank->isIban($number)) {
                return $bank->name;
            }
        }
        return null;
    }
}
