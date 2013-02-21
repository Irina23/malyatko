<?php
defined('_JEXEC') or die('Restricted access');

$user = JFactory::getUser();

// Получаем установленные параметры
$id_merchant = $params->get("merchant");
$return_url = $params->get("url");
$name_submit= $params->get("submit");
$amt= $params->get("amt");

?>

<form method="POST" action="https://api.privatbank.ua/p24api/ishop" target="_blank">
    Сума:&nbsp;<input type="text" name="amt" size="4" value="<?php echo "$amt"?>" style="text-align:right;"/>
    <select name="ccy" >
        <option value="UAH" >UAH</option>
        <option value="USD" >USD</option>
        <option value="EUR">EUR</option>
        <option value="RUB">RUB</option>
    </select><br />
    <input type="hidden" name="merchant" value="<?php echo "$id_merchant"?>" />
    <input type="hidden" name="order" value="<?php
    $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
    $max=15;
    $size=StrLen($chars)-1;
    $password=null;
    while($max--)
        $password.=$chars[rand(0,$size)];
    echo $password
    ?>" />
    Додаткова інформація:&nbsp;<br />
    <input type="text" name="details" value="текст" />
    <input type="hidden" name="ext_details" value="&#1054;&#1087;&#1080;&#1089;&#1072;&#1085;&#1080;&#1077; &#1090;&#1086;&#1074;&#1072;&#1088;&#1072; &#8470;..." />
    <input type="hidden" name="pay_way" value="privat24" />
    <input type="hidden" name="return_url" value="https://<?php echo "$return_url"?>" />
    <input type="hidden" name="server_url" value="https://..." />
    <br /><br />
    <input type="submit" value="<?php echo "$name_submit"?>" />
</form>