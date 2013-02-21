LiqPay Payment Module

NOTICE OF LICENSE

This source file is subject to the Open Software License (OSL 3.0)
that is available through the world-wide-web at this URL:
http://opensource.org/licenses/osl-3.0.php

@category			Mage
@package			Mage_PBLiqPay
@version			1.0
@license			http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)

EXTENSION INFORMATION

Magento				Community Edition 1.3.2.4
LiqPay API			Click&Buy 1.2 (https://www.liqpay.com/?do=pages&p=cnb12)
Way of payment		Visa / MasterCard, or LiqPay
Available currency	EUR, UAH, USD, RUB

INSTALL

Just add files and subfolders to Magento app directory.

Note. If you use non-default theme change this path on yours:

app/design/frontend/default/default/template/pbliqpay/liqpay -->
app/design/frontend/your_theme/your_default/template/pbliqpay/liqpay

Then go to Admin Panel / System / Sales / Payment Methods and configure LiqPay extension:

Enabled				Yes
Title				Type some title
New order status	Select one
Merchant ID			Your LiqPay merchant ID
Signature			Your LiqPay signature (password)
Way of payment		type "card" for Visa / MasterCard or "liqpay" for LiqPay
Phone				Your LiqPay cell phone

By default LiqPay extension use Base currency. Would like to use Current currency?
See comments in code/local/Mage/PBLiqPay/Model/Liqpay.php

ADDITIONAL INFO

LiqPay extension post some messages to shop admin:

- "Customer successfully got back from LiqPay payment interface."
- "Customer switch over to LiqPay payment interface."
- "Error during creation of invoice."
- "Invoice ### created."
- "LiqPay error."
- "New order e-mail was sent to customer."
- "Order total amount does not match LiqPay gross total amount."
- "Security check failed!"
- "Selected currency (---) is incompatible with LiqPay.
- "Waiting for verification from the LiqPay side."
 
You can see them in Admin Panel / Sales / Orders / Some Order / Comments History