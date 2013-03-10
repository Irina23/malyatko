<?php
defined('_JEXEC') or die('Restricted access');

$user = JFactory::getUser();

// Получаем установленные параметры
$id_merchant = $params->get("merchant");
$return_url = $params->get("url");
$name_submit= $params->get("submit");


?>

<form method="POST" action="https://api.privatbank.ua/p24api/ishop" target="_blank" style="padding:0 40px 40px;">
    <label for="amt">Сума:&nbsp;</label>
    <input type="text" id="amt" name="amt" size="4" tabindex="1" value="" required/>
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
    <label for="details">Додаткова інформація:</label><br />
    <textarea id="details" tabindex="2" rows="5"  cols="20" name="details" value="Текст..." placeholder="Текст..."
              onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"
            >

    </textarea>



    <input type="hidden" name="ext_details" value="" />
    <input type="hidden" name="pay_way" value="privat24" />
    <input type="hidden" name="return_url" value="http://<?php echo "$return_url"?>" />
    <input type="hidden" name="server_url" value="https://..." />
    <br /><br />
    <input type="submit" value="<?php echo "$name_submit"?>" />
</form>