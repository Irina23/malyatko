<?php
// Don't allow direct access to the module.
defined('_JEXEC') or die('Restricted Access.');

$paypal_email = trim($params->get('paypal_email'));
$paypalcur_on = $params->get('paypalcur_on');
$paypalcur_val = $params->get('paypalcur_val');
$paypalval_on = $params->get('paypalval_on');
$paypalval_val = $params->get('paypalval_val');
$paypalvalleast_val = $params->get('paypalvalleast_val');
$paypal_org = $params->get('paypal_org');
$paypal_len = $params->get('paypal_len');
$paypallen_val = $params->get('paypallen_val');
$one_page = $params->get('one_page');
$page_url = $params->get('page_url');
$logo = $params->get('logo');
$logo_on = $params->get('logo_on');
$allow_option1 = $params->get('allow_option1');
$allow_option2 = $params->get('allow_option2');
$option1 = $params->get('option1');
$option2 = $params->get('option2');
$option1_default = $params->get('option1_default');
$option2_default = $params->get('option2_default');
$paypalcancel = trim($params->get('paypalcancel'));
$paypalreturn = trim($params->get('paypalreturn'));
$paypalnotify = trim($params->get('paypalnotify'));


$length = isset($_POST['paypallength']) ? (int) $_POST['paypallength'] : "";
$amount = isset($_POST['paypalamount']) ? trim($_POST['paypalamount']) : "";
$selection1 = isset($_POST['paypaloption1']) ? trim($_POST['paypaloption1']) : "";
$selection2 = isset($_POST['paypaloption2']) ? trim($_POST['paypaloption2']) : "";

$paypalnotify = (!empty($paypalnotify)) ? $paypalnotify : null;
$amount = str_replace(',', '.', $amount);

// For weekly, monthly, or yearly payments, PayPal accepts integer
// amounts only.
if (1 <= $length && $length <= 3) {
    $amount = (int) round($amount, 0);
}
if ($amount < $paypalvalleast_val) {
    $amount = $paypalvalleast_val;
}
$currency_code = isset($_POST['paypalcurrency_code']) ? trim($_POST['paypalcurrency_code']) : 0;
//$paypal_webscr_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
$paypal_webscr_url = "https://www.paypal.com/cgi-bin/webscr";
$paypal_params = "&business=" . $paypal_email . "&item_name=" . $paypal_org . "&no_note=1&currency_code=" . $currency_code . "&return=" . $paypalreturn . "&cancel_return=" . $paypalcancel;
//$paypal_params = "&business=".$paypal_email."&item_name=".$paypal_org."&no_note=0&currency_code=".$currency_code."&return=".$paypalreturn."&cancel_return=".$paypalcancel;

if ($length == 4) {
    //header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=".$paypal_email."&item_name=".$paypal_org."&amount=".$amount."&no_shipping=0&no_note=1&tax=0&currency_code=".$currency_code."&bn=PP%2dDonationsBF&charset=UTF%2d8&return=".$paypalreturn."&cancel_return=".$paypalcancel);
    $paypal_params .= "&amount=" . $amount;
    $paypal_params .= "&tax=0";
    $paypal_params .= "&bn=PP%2dDonationsBF";
    $paypal_params .= "&charset=UTF%2d8";
    $paypal_params .= "&no_shipping=0";
    if ($allow_option1) {
        $paypal_params .= "&on1=" . rawurlencode($option1);
        $paypal_params .= "&os1=" . rawurlencode($selection1);
    }
    if ($allow_option2) {
        $paypal_params .= "&on2=" . rawurlencode($option2);
        $paypal_params .= "&os2=" . rawurlencode($selection2);
    }
    if ($paypalnotify != null)
        $paypal_params .= "&notify_url=" . $paypalnotify;
    header("Location: " . $paypal_webscr_url . "?cmd=_xclick" . $paypal_params);
}
else if ($length == 1) {
    //header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick-subscriptions&business=".$paypal_email."&item_name=".$paypal_org."&no_shipping=1&no_note=1&currency_code=".$currency_code."&bn=PP%2dSubscriptionsBF&charset=UTF%2d8&a3=".$amount."%2e00&p3=1&t3=W&src=1&sra=1&return=".$paypalreturn."&cancel=".$paypalcancel);
    $paypal_params .= "&bn=PP%2dSubscriptionsBF";
    $paypal_params .= "&charset=UTF%2d8";
    $paypal_params .= "&a3=" . $amount . "%2e00&p3=1&t3=W&src=1&sra=1";
    $paypal_params .= "&no_shipping=1";
    if ($allow_option1) {
        $paypal_params .= "&on1=" . rawurlencode($option1);
        $paypal_params .= "&os1=" . rawurlencode($selection1);
    }
    if ($allow_option2) {
        $paypal_params .= "&on2=" . rawurlencode($option2);
        $paypal_params .= "&os2=" . rawurlencode($selection2);
    }
    if ($paypalnotify != null)
        $paypal_params .= "&notify_url=" . $paypalnotify;
    header("Location: " . $paypal_webscr_url . "?cmd=_xclick-subscriptions&" . $paypal_params);
}
elseif ($length == 2) {
    //  header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick-subscriptions&business=".$paypal_email."&item_name=".$paypal_org."&no_shipping=1&no_note=1&currency_code=".$currency_code."&bn=PP%2dSubscriptionsBF&charset=UTF%2d8&a3=".$amount."%2e00&p3=1&t3=M&src=1&sra=1&return=".$paypalreturn."&cancel=".$paypalcancel);
    $paypal_params .= "&bn=PP%2dSubscriptionsBF";
    $paypal_params .= "&charset=UTF%2d8";
    $paypal_params .= "&a3=" . $amount . "%2e00&p3=1&t3=M&src=1&sra=1";
    $paypal_params .= "&no_shipping=1";
    if ($allow_option1) {
        $paypal_params .= "&on1=" . rawurlencode($option1);
        $paypal_params .= "&os1=" . rawurlencode($selection1);
    }
    if ($allow_option2) {
        $paypal_params .= "&on2=" . rawurlencode($option2);
        $paypal_params .= "&os2=" . rawurlencode($selection2);
    }
    if ($paypalnotify != null)
        $paypal_params .= "&notify_url=" . $paypalnotify;
    header("Location: " . $paypal_webscr_url . "?cmd=_xclick-subscriptions&" . $paypal_params);
}
elseif ($length == 3) {
    //header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick-subscriptions&business=".$paypal_email."&item_name=".$paypal_org."&no_shipping=1&no_note=1&currency_code=".$currency_code."&bn=PP%2dSubscriptionsBF&charset=UTF%2d8&a3=".$amount."%2e00&p3=1&t3=Y&src=1&sra=1&return=".$paypalreturn."&cancel=".$paypalcancel);
    $paypal_params .= "&bn=PP%2dSubscriptionsBF";
    $paypal_params .= "&charset=UTF%2d8";
    $paypal_params .= "&a3=" . $amount . "%2e00&p3=1&t3=Y&src=1&sra=1";
    $paypal_params .= "&no_shipping=1";
    if ($allow_option1) {
        $paypal_params .= "&on1=" . rawurlencode($option1);
        $paypal_params .= "&os1=" . rawurlencode($selection1);
    }
    if ($allow_option2) {
        $paypal_params .= "&on2=" . rawurlencode($option2);
        $paypal_params .= "&os2=" . rawurlencode($selection2);
    }
    if ($paypalnotify != null)
        $paypal_params .= "&notify_url=" . $paypalnotify;
    header("Location: " . $paypal_webscr_url . "?cmd=_xclick-subscriptions&" . $paypal_params);
}

$currencies = array('CAD' => '$', 'USD' => '$', 'GBP' => '&pound;', 'AUD' => '$', 'JPY' => '&yen;', 'EUR' => '&euro;');
//$currencies = array( 'CAD' => '$', 'USD' => '$', 'GBP' => '£', 'AUD' => '$', 'JPY' => '&yen;', 'EUR' => '&euro;' );

echo "<form name=\"paypalform\" action=\"" . $_SERVER['REQUEST_URI'] . "\" method=\"post\">";

echo "<center>";
echo "<a href=\"javascript:document.paypalform.submit()\"\n";
echo "onmouseover=\"document.paypalform.paypalsubmit.src='butdown.gif'\"\n";
echo "onmouseout=\"document.paypalform.paypalsubmit.src='butup.gif'\"\n";
echo "onclick=\"return val_form_this_page()\">\n";
echo "<img src=\"" . $logo . "\" alt=\"Donate using PayPal\" />";
echo "</a>";
echo "<br />";

if ($paypalval_on == 0) {
    $javaScript = <<< JAVASCRIPT
    <script type="text/javascript">
    function donateChangeCurrency( )
    {
      var selectionObj = document.getElementById( 'donate_currency_code' );
      var selection = selectionObj.value;
      var currencyObj = document.getElementById( 'donate_symbol_currency' );
      if( currencyObj )
	{
	  var currencySymbols = { 'CAD': '$', 'USD': '$', 'GBP': '&pound;', 'AUD': '$', 'JPY': '&yen;', 'EUR': '&euro;' };
	  var currencySymbol = currencySymbols[ selection ];
	  currencyObj.innerHTML = currencySymbol;
	}
    }
  </script>
JAVASCRIPT;

    $symbol = $currencies[$paypalcur_val];

    echo "$javaScript " . JText::_("Amount:") . " <span id=\"donate_symbol_currency\">" . $symbol . "</span><input type=\"text\" name=\"paypalamount\" size=\"5\" class=\"inputbox\" value=\"" . $paypalval_val . "\" />";
} elseif ($paypalval_on == 1) {
    echo "<input type=\"hidden\" value=\"" . $paypalval_val . "\" name=\"paypalamount\" />";
}
if ($paypalcur_on == 0) {
    print( "<select name=\"paypalcurrency_code\" id=\"donate_currency_code\" class=\"inputbox\" onchange=\"donateChangeCurrency();\" >");
    foreach ($currencies as $currency => $dummy) {
        $selected = ( $currency == $paypalcur_val ) ? " selected=\"selected\"" : "";
        print( "<option value=\"$currency\"$selected>$currency</option>\n");
    }
    print( "</select>\n");
} elseif ($paypalcur_on == 1) {
    echo "<input type=\"hidden\" name=\"paypalcurrency_code\" value=\"" . $paypalcur_val . "\" />";
}
if ($paypal_len == 0) {
    ?>
    <select name="paypallength" class="inputbox">
        <option value="4"><?php echo JText::_("One Time") ?></option>
        <option value="1"><?php echo JText::_("Weekly") ?></option>
        <option value="2"><?php echo JText::_("Monthly") ?></option>
        <option value="3"><?php echo JText::_("Annually") ?></option>
    </select>
    <?php
} elseif ($paypal_len == 1) {
    ?>
    <input type="hidden" name="paypallength" value="<?php echo $paypallen_val; ?>" />
    <?php
}
if ($allow_option1)
    echo "<br />" . $option1 . "<input type=\"text\" name=\"paypaloption1\" value=\"" . $option1_default . "\" />";
if ($allow_option2)
    echo "<br />" . $option2 . "<input type=\"text\" name=\"paypaloption2\" value=\"" . $option2_default . "\" />";
?>
</center>
</form>
