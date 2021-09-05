# Iranian bank validation
validate information of Iranian banks, you can use this in your Laravel projects
## Installation
```sh
git clone https://github.com/mlk9/iranian-bank-validation.git
```
or via composer :
```sh
composer require mlk9/iranian-bank-validation
```
## Documents
Check is or not is ir iban : 
```sh
IrBank\IrBank::ibanValidate("IR123456789012345678901234"); //output : false
```
Check is or not is ir iban and get bank name : 
```sh
IrBank\IrBank::getBankNameByIban("IR123456789012345678901234"); //output : null
```
Check is or not is ir credit card : 
```sh
IrBank\IrBank::cardValidate(1234123412341234); //output : false
```
Check is or not is ir credit card and get bank name : 
```sh
IrBank\IrBank::getBankNameByCard(1234123412341234); //output : null
```