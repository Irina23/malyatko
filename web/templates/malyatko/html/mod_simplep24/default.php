<?php
defined('_JEXEC') or die('Restricted access');

$user = JFactory::getUser();
$document = & JFactory::getDocument();
$curlang = $document->language;
// Получаем установленные параметры
$id_merchant = $params->get("merchant");
$return_url = $params->get("url");



?>

<script language="JavaScript" content="text/html; charset=utf-8">
    <!--

    function SendForm() {

        if (document.forms[0].amt.value == "") {
            alert('Поле сума не заповнене! ' +
                    'Field of the sum is empty!');
            //alert('Field of the sum is empty!');
          //  document.ishop.amt.focus();
            return false
        }
        if (document.forms[0].amt.value == "0") {
            alert('Поле сума заповнене невірно! ' +
                    'Field of the sum filled incorrectly!');
            //  document.ishop.amt.focus();
            return false
        }

        return true;
    }

    //-->
</script>
<script type="text/javascript">
    function Numbers(e)
    {
        var keynum;
        var keychar;
        var numcheck;

        if(window.event) // IE
        {
            keynum = e.keyCode;
        }
        else if(e.which) // Netscape/Firefox/Opera
        {
            keynum = e.which;
        }
        keychar = String.fromCharCode(keynum);
        numcheck = /\d/;
        return numcheck.test(keychar)|| keynum<32;
    }

</script>




<form method="POST" action="https://api.privatbank.ua/p24api/ishop" target="_blank" onsubmit="return SendForm();" >
    <label for="amt" >
        <?php $document = & JFactory::getDocument();
        $curlang = $document->language;
        if ($curlang == 'en-gb') {
            echo 'Sum: *';
        }
        if ($curlang == 'uk-ua') {
            echo 'Сума: *';
        }
        ?>
        </label>
    <input type="number" id="amt" name="amt" tabindex="1" value="" required="required" min="1" pattern="^[ 0-9]+$" maxlength="11" onkeypress="return Numbers(event)"  />
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
    //value="Текст..." placeholder="Текст..." onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"

    ?>" /><br />
    <label for="details" >
        <?php $document = & JFactory::getDocument();
        $curlang = $document->language;
        if ($curlang == 'en-gb') {
            echo 'Additional Information:';
        }
        if ($curlang == 'uk-ua') {
            echo 'Додаткова інформація:';
        }
        ?>

        </label><br />
    <textarea id="details" tabindex="2" rows="5"  cols="20" name="details"
   onfocus="if(this.value==this.defaultValue)this.value='';" >

    </textarea>
    <input type="hidden" name="ext_details" value="" />
    <input type="hidden" name="pay_way" value="privat24" />
    <input type="hidden" name="return_url" value="http://<?php echo "$return_url"?>" />
    <input type="hidden" name="server_url" value="https://..." />
    <br />
    <input type="submit" class="submit" value="<?php $document = & JFactory::getDocument();
    $curlang = $document->language;
    if ($curlang == 'en-gb') {
        echo 'Donate';
    }
    if ($curlang == 'uk-ua') {
        echo 'Перерахувати кошти';
    }?>" />
</form>
