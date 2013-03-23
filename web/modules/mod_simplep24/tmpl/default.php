<?php
defined('_JEXEC') or die('Restricted access');

$user = JFactory::getUser();

// Получаем установленные параметры
$id_merchant = $params->get("merchant");
$return_url = $params->get("url");
$name_submit= $params->get("submit");


?>

<script language="JavaScript" content="text/html; charset=utf-8">
    <!--

    function SendForm() {

        if (document.forms[0].amt.value == "") {
            alert('Поле сума не заповнене!');
          //  document.ishop.amt.focus();
            return false
        }

        return true;
    }

    //-->
</script>

<form method="POST" action="https://api.privatbank.ua/p24api/ishop" target="_blank" onsubmit="return SendForm();" >
    <label for="amt" >Сума:&nbsp;*</label>
    <input type="number" id="amt" name="amt" tabindex="1" value="" required="required" pattern="^[ 0-9]+$"/>
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
    ?>" /><br />
    <label for="details" >Додаткова інформація:</label><br />
    <textarea id="details" tabindex="2" rows="5"  cols="20" name="details" value="Текст..." placeholder="Текст..."
              onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"
            >

    </textarea>



    <input type="hidden" name="ext_details" value="" />
    <input type="hidden" name="pay_way" value="privat24" />
    <input type="hidden" name="return_url" value="http://<?php echo "$return_url"?>" />
    <input type="hidden" name="server_url" value="https://..." />
    <br />
    <input type="submit" class="submit" value="<?php echo "$name_submit"?>" />
</form>
