<?php
/**
 * @version 1.1 $Id: default.php,v 1.10 2010/02/15 17:10:57 Malyavkin Exp $
 * @package Joomla
 * @subpackage SimpleP24
 * @copyright (C) 2010 Malyavkin Evgeny
 * @license GNU/GPL, see LICENSE.txt
 * SimpleP24 is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License 3
 * as published by the Free Software Foundation.

 * SimpleP24 is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with SimpleP24; if not, write to the Free Software
 * Foundation, 19-31 Hmelnitskogo Street, Alushta, 98500, Ukraine.
 */

	// no direct access
	defined('_JEXEC') or die('Restricted access');
	$langSite = substr($params->get('locale'), 0, 2);
	if ($langSite != '') {
		$langSite .= '/';
	}
	
	// prepares the introductory text
	$introtext = '';
	
	if ($params->get('show_text', 1)) {
		$introtext = '<p>'.$params->get('intro_text', '').'</p>'."\n";
	}
	
	echo "\n";

	// Prepare the amount field / currency combobox or hide it
	$amountLine = '';
	
	if (!$params->get('show_amount')) {
		$amountLine .= '<input type="hidden" name="amt" value="'.$params->get('amt').'" />'."\n";
	} else {
		$amountLine .= JText::_('Сумма').':&nbsp;<input type="text" name="amt" size="4" maxlength="10" value="'.$params->get('amt').'" style="text-align:right;" />'."\n";
	}
	
	// Get the list of currencies from the parameters and explode them into an array
	$currency = explode(',', $params->get('ccy'));
	
	// Array lists the available P24 Currencies as of 10/02/2010
	$availableCurrencies = Array('EUR', 'USD', 'RUR', 'UAH');
	
	// checks currency list against the available currencies list and discards errors.
	$sizeOfCurr = sizeof($currencies);
	for ($i = 0; $i < $sizeOfCurr; $i++) {
		for ($j = 0; $j < sizeof($availableCurrencies); $j++) {
			if ($currency[$i] === $availableCurrencies[$j]) { 
				$isOk = 1;
				break;
			}
		}
		if (!$isOk) {
			unset($currency[$i]);
		}
		$isOk = 0;
	}
	
	// Choose between a combo-box or a simple hidden text field based on size of the array
	if (sizeof($currency) == 0) {
		$amountLine = '<p class="error">'.JText::_('Error - no currencies selected!').'<br/>'.JText::_('Please check the backend parameters!').'</p>';
		$fe_c = '';
	} else if (sizeof($currency) == 1) {
		echo $introtext;
		$fe_c = '<input type="hidden" name="ccy" value="' . $currency[0] . '" />'."\n";
		if ($params->get('show_amount', 1)) {
			$fe_c .= '&nbsp;' . $currency[0]."\n";
		}
	} else if (sizeof($currency) > 1) {
		echo $introtext;
		if ($params->get('show_amount', 1)) { 
			$fe_c = '<select name="ccy">'."\n";
			foreach($currency as $row) {
				$fe_c .= '<option value="'.$row.'">'.$row.'</option>'."\n";
			}
			$fe_c .= '</select>'."\n";
		} else {
			$fe_c = '<input type="hidden" name="ccy" value="' . $currency[0] . '" />'."\n";
		}
	}
	
	$target = '';
	if ($params->get('open_new_window', 1)) {
		$target =  'target="p24"';
	}
	
	// Info:

	?>
<form action="https://api.privatbank.ua/p24api/ishop" method="POST" accept-charset="windows-1251" >
	<?php echo $amountLine . $fe_c; ?>
	<?php if ($fe_c != '') : ?>
	<input type="hidden" name="merchant" value="<?php echo$params->get('merchant', ''); ?>" />
	
	<INPUT type="hidden" name="order" value="<?php
$chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
$max=15;
$size=StrLen($chars)-1;
$password=null;
 while($max--) 
    $password.=$chars[rand(0,$size)];
echo $password
?>" />
	
	<input type="hidden" name="details" value="<?php echo$params->get('details', ''); ?>" />
	<input type="hidden" name="ext_details" value="" />
	<input type="hidden" name="pay_way" value="privat24" />
	<input type="hidden" name="return_url" value="<?php echo$params->get('return_url', ''); ?>" />
	<input type="hidden" name="server_url" value="" />
	<br /><br />
	<input type="submit"  value=" <?php echo$params->get('pay', ''); ?> " />
	
	<?php endif; ?>
</form>