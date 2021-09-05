# Iranian bank validation
validate information of Iranian banks, you can use this in your Laravel projects
## Installation
`git clone https://github.com/mlk9/iranian-bank-validation.git`
## Documents
Check is or not is ir iban : 
`IrBank\ibanValidate("IR123456789012345678901234") //output : false`
Check is or not is ir iban and get bank name : 
`IrBank\getBankNameByIban("IR123456789012345678901234") //output : null`