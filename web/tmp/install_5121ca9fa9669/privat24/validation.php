<?php

/*
amt=<сумма>
&ccy=<валюта UAH|USD|EUR>
&details=<информация о товаре/услуге>
&ext_details=<дополнительная информация о товаре/услуге>&pay_way=privat24
&order=<id платежа в системе мерчанта>
&merchant=<id мерчанта, принимающего платёж>
&state=<состояние платежа: ok|fail>
&date=<дата отправки платежа в проводку>
&ref=<id платежа в системе банка>
&sender_phone=<номер телефона плательщика>

amt=12.384
&ccy=UAH
&details=Oplata zakaza selko
&ext_details=Oplata zakaza selko
&pay_way=privat24
&order=54c3b7dd450d65
&merchant=10878
&state=test
&date=110710212135
&ref=test ok
&sender_phone=+380675494993
*/

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/privat24.php');
$privat24 = new privat24();

$merchant_pass = Configuration::get('PRIVAT24_MERCHANT_PASS');
$signature = sha1(md5($_POST['payment'].$merchant_pass));

if($_POST['signature'] == $signature) {
   //echo $_POST['payment'].'<br>';
    $privat24->validation($_POST['payment']);
}

?>
