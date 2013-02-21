<?php

// no direct access
defined('_JEXEC') or die('Go Away');

$paypal_email       = $params->get('paypal_email');
$paypalcur_on       = $params->get('paypalcur_on');
$paypalcur_val      = $params->get('paypalcur_val');
$paypalval_on       = $params->get('paypalval_on');
$paypalval_val      = $params->get('paypalval_val');
$paypalvalleast_val = $params->get('paypalvalleast_val');
$paypalval_enteramount = $params->get('paypalval_enteramount');
$paypal_org         = $params->get('paypal_org');
$paypallen_val      = $params->get('paypallen_val');
$one_page           = $params->get('one_page');
$page_url           = $params->get('page_url');
$logo               = $params->get('logo');
$logo_on            = $params->get('logo_on');
$paypalcancel       = $params->get('paypalcancel');
$paypalreturn       = $params->get('paypalreturn');
$paypalbuttontext   = $params->get('paypalval_button');
$paymenttype   			= $params->get('payment_type');
$paymentlocation   	= $params->get('paymentlocation');



$length = isset( $_POST[ 'paypallength' ] ) ? (int) $_POST[ 'paypallength' ] : "";
$amount = isset( $_POST[ 'paypalamount' ] ) ? trim( $_POST[ 'paypalamount' ] ) : "";
$amount = str_replace( ',', '.', $amount );

// For weekly, monthly, or yearly payments, PayPal accepts integer
// amounts only.
if (($paymenttype == 4) && ( 1 <= $length && $length <= 3 ))
{
  $amount = (int) round( $amount, 0 );
}
if( $amount < $paypalvalleast_val )
{
  $amount = $paypalvalleast_val;
}
$currency_code = isset( $_POST[ 'paypalcurrency_code' ] ) ? trim( $_POST[ 'paypalcurrency_code' ] ) : 0;

$header = "";

if ($length >=1 && $length <= 4)
{
	if ($paymenttype == 1)
	{
		$header = "Location: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=".$paypal_email."&item_name=".$paypal_org."&amount=".$amount."&no_shipping=0&no_note=1&currency_code=".$currency_code."&bn=PP%2dDonationsBF&charset=UTF%2d8&return=".$paypalreturn."&cancel=".$paypalcancel;
	} else if ($paymenttype == 2)
	{
		$header = "Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=".$paypal_email."&item_name=".$paypal_org."&amount=".$amount."&no_shipping=0&no_note=1&tax=0&currency_code=".$currency_code."&bn=PP%2dBuyNowBF&charset=UTF%2d8&return=".$paypalreturn."&cancel=".$paypalcancel;
	} else if ($paymenttype == 3)
	{
		$header = "Location: https://www.paypal.com/cgi-bin/webscr?cmd=_cart&business=".$paypal_email."&item_name=".$paypal_org."&amount=".$amount."&add=1&no_shipping=1&no_note=1&currency_code=".$currency_code."&bn=PP%2dShopCartBF&charset=UTF%2d8&return=".$paypalreturn."&cancel=".$paypalcancel;
	} else if ($paymenttype == 4)
	{
			if ($length == 1)		
			{
				$header = "Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick-subscriptions&business=".$paypal_email."&item_name=".$paypal_org."&no_shipping=1&no_note=1&currency_code=".$currency_code."&bn=PP%2dSubscriptionsBF&charset=UTF%2d8&a3=".$amount."%2e00&p3=1&t3=D&src=1&sra=1&return=".$paypalreturn."&cancel=".$paypalcancel;
			} else if ($length == 2)		
			{
				$header = "Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick-subscriptions&business=".$paypal_email."&item_name=".$paypal_org."&no_shipping=1&no_note=1&currency_code=".$currency_code."&bn=PP%2dSubscriptionsBF&charset=UTF%2d8&a3=".$amount."%2e00&p3=1&t3=W&src=1&sra=1&return=".$paypalreturn."&cancel=".$paypalcancel;
			} else if ($length == 3)		
			{
				$header = "Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick-subscriptions&business=".$paypal_email."&item_name=".$paypal_org."&no_shipping=1&no_note=1&currency_code=".$currency_code."&bn=PP%2dSubscriptionsBF&charset=UTF%2d8&a3=".$amount."%2e00&p3=1&t3=M&src=1&sra=1&return=".$paypalreturn."&cancel=".$paypalcancel;
			} else if ($length == 4)		
			{
				$header = "Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick-subscriptions&business=".$paypal_email."&item_name=".$paypal_org."&no_shipping=1&no_note=1&currency_code=".$currency_code."&bn=PP%2dSubscriptionsBF&charset=UTF%2d8&a3=".$amount."%2e00&p3=1&t3=Y&src=1&sra=1&return=".$paypalreturn."&cancel=".$paypalcancel;
			}
	}
	if ($paymentlocation != "")
	{
		$header = $header."&lc=".$paymentlocation;
	}	
	header($header);
}


$currencies = array( 'CAD' => '$', 'USD' => '$', 'GBP' => '£', 'AUD' => '$', 'JPY' => '&yen;', 'EUR' => '&euro;', 'CHF' => 'CHF', 'CZK' => 'CZK', 'DKK' => 'DKK', 'HKD' => '$', 'HUF' => 'HUF', 'NOK' => 'NOK', 'NZD' => '$', 'PLN' => 'PLN', 'SEK' => 'SEK', 'SGD' => '$' );

echo "<div id=\"paypal_logo\">";
if ($logo_on == 0) {
  echo "<img src=\"$logo\" alt=\"PayPal\" />";
}
elseif ($logo_on == 1) {
  echo $logo;
}
echo "</div>\n";

echo "<form action=\"".$_SERVER['REQUEST_URI']."\" method=\"post\">";
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
      var currencySymbols = { 'CAD': '$', 'USD': '$', 'GBP': '&pound;', 'AUD': '$', 'JPY': '&yen;', 'EUR': '&euro;', 'CHF': 'CHF', 'CZK' : 'CZK', 'DKK' : 'DKK', 'HKD' : '$', 'HUF' : 'HUF', 'NOK' : 'NOK', 'NZD' : '$', 'PLN' : 'PLN', 'SEK' : 'SEK', 'SGD' : '$' };
      var currencySymbol = currencySymbols[ selection ];
      currencyObj.innerHTML = currencySymbol;
    }
  }
</script>
JAVASCRIPT;

  $symbol = $currencies[ $paypalcur_val ];
  echo "$javaScript<p>".$paypalval_enteramount."</p><p><span id=\"donate_symbol_currency\">".$symbol."</span><input type=\"text\" name=\"paypalamount\" size=\"5\" class=\"inputbox\">";
}
elseif ($paypalval_on == 1) {
  echo "<input type=\"hidden\" value=\"".$paypalval_val."\" name=\"paypalamount\">";
}
if ($paypalcur_on == 0) {
  print( "<select name=\"paypalcurrency_code\" id=\"donate_currency_code\" class=\"inputbox\" onchange=\"donateChangeCurrency();\">" );
  foreach( $currencies as $currency => $dummy )
  {
    $selected = ( $currency == $paypalcur_val ) ? " selected=\"selected\"" : "";
    print( "<option value=\"$currency\"$selected>$currency</option>\n" );
  }
  print( "</select>\n" );
}
elseif ($paypalcur_on == 1) {

  echo "<input type=\"hidden\" name=\"paypalcurrency_code\" value=\"".$paypalcur_val."\">";
}

if ($paymenttype == 4) {
  ?>
  <select name="paypallength" class="inputbox">
    <option value="1">Daily</option>
    <option value="2">Weekly</option>
    <option value="3">Monthly</option>
    <option value="4">Annual</option>
  </select>
  <?php
}
else {
  ?>
  <input type="hidden" name="paypallength" value="<?php echo "1" ?>" />
  <?php
}
?>

<input type="submit" class="button" name="paypalsubmit" alt="Make payments with PayPal - its fast, free and secure!" value="<?php echo $paypalbuttontext; ?>" />
</form>
<?php
if ($params->get('link') == 1)
{
?>   
<a href="http://www.dart-creations.com" style="font-size:1px;display:none;">Easy Joomla Paypal Payment / Donations Module</a>
<?php
}
?>