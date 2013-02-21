<?php
/**
 * @version		0.9.8 2012
 * @package		AMoney
 * @subpackage	mod_amoney
 * @copyright	Copyright (C) Leonidas 2008 - 2011. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// no direct access
defined('_JEXEC') or die;
?>
<!-- Leonidas "Donate-Amoney" Module (v9.8) starts here -->
	
<script type="text/javascript">
/* <![CDATA[ */
	<?php 
	echo $t2; 
	if ($use_wm)
	{?>
	function show_wm()
	{
	<?php
	if ($use_rupay)
	{?>
		<?php echo $t1;?>('#rupay').hide();
	<?php
	}
	if ($use_yandex)
	{?>
		<?php echo $t1;?>('#yandex').hide();
	<?php
	}
	if ($use_egold)
	{?>
		<?php echo $t1;?>('#egold').hide();
	<?php
	}
	if ($use_paypal)
	{?>
		<?php echo $t1;?>('#paypal').hide();
	<?php
	}
	if ($use_libertyreserve)
	{?>
		<?php echo $t1;?>('#libertyreserve').hide();
	<?php
	}
	if ($use_moneybookers)
	{?>
		<?php echo $t1;?>('#moneybookers').hide();
	<?php
	}
	if ($use_robox)
	{?>
		<?php echo $t1;?>('#robox').hide();
	<?php
	}
	if ($use_sms)
	{?>
		<?php echo $t1;?>('#sms').hide();
	<?php
	}
	if ($use_sms1)
	{?>
		<?php echo $t1;?>('#sms1').hide();
	<?php
	}
	if ($use_mmail)
	{?>
		<?php echo $t1;?>('#mmail').hide();
	<?php
	}
	if ($use_liqpay)
	{?>
		<?php echo $t1;?>('#liqpay').hide();
	<?php
	}
	if ($use_smscoin)
	{?>
		<?php echo $t1;?>('#smscoin').hide();
	<?php
	}?>
		<?php echo $t1;?>('#wm').<?php echo $jfadtogquery;?>;
		return false;
	};
	<?php
	}
	if ($use_rupay)
	{?>
	function show_rupay()
	{
	<?php
	if ($use_wm)
	{?>
		<?php echo $t1;?>('#wm').hide();
	<?php
	}
	if ($use_yandex)
	{?>
		<?php echo $t1;?>('#yandex').hide();
	<?php
	}
	if ($use_egold)
	{?>
		<?php echo $t1;?>('#egold').hide();
	<?php
	}
	if ($use_paypal)
	{?>
		<?php echo $t1;?>('#paypal').hide();
	<?php
	}
	if ($use_libertyreserve)
	{?>
		<?php echo $t1;?>('#libertyreserve').hide();
	<?php
	}
	if ($use_moneybookers)
	{?>
		<?php echo $t1;?>('#moneybookers').hide();
	<?php
	}
	if ($use_robox)
	{?>
		<?php echo $t1;?>('#robox').hide();
	<?php
	}
	if ($use_sms)
	{?>
		<?php echo $t1;?>('#sms').hide();
	<?php
	}
	if ($use_sms1)
	{?>
		<?php echo $t1;?>('#sms1').hide();
	<?php
	}
	if ($use_mmail)
	{?>
		<?php echo $t1;?>('#mmail').hide();
	<?php
	}
	if ($use_liqpay)
	{?>
		<?php echo $t1;?>('#liqpay').hide();
	<?php
	}
	if ($use_smscoin)
	{?>
		<?php echo $t1;?>('#smscoin').hide();
	<?php
	}?>
		<?php echo $t1;?>('#rupay').<?php echo $jfadtogquery;?>;
		return false;
	};
	<?php
	}
	if ($use_yandex)
	{?>
	function show_yandex()
	{
	<?php
	if ($use_wm)
	{?>
		<?php echo $t1;?>('#wm').hide();
	<?php
	}
	if ($use_rupay)
	{?>
		<?php echo $t1;?>('#rupay').hide();
	<?php
	}
	if ($use_egold)
	{?>
		<?php echo $t1;?>('#egold').hide();
	<?php
	}
	if ($use_paypal)
	{?>
		<?php echo $t1;?>('#paypal').hide();
	<?php
	}
	if ($use_libertyreserve)
	{?>
		<?php echo $t1;?>('#libertyreserve').hide();
	<?php
	}
	if ($use_moneybookers)
	{?>
		<?php echo $t1;?>('#moneybookers').hide();
	<?php
	}
	if ($use_robox)
	{?>
		<?php echo $t1;?>('#robox').hide();
	<?php
	}
	if ($use_sms)
	{?>
		<?php echo $t1;?>('#sms').hide();
	<?php
	}
	if ($use_sms1)
	{?>
		<?php echo $t1;?>('#sms1').hide();
	<?php
	}
	if ($use_mmail)
	{?>
		<?php echo $t1;?>('#mmail').hide();
	<?php
	}
	if ($use_liqpay)
	{?>
		<?php echo $t1;?>('#liqpay').hide();
	<?php
	}
	if ($use_smscoin)
	{?>
		<?php echo $t1;?>('#smscoin').hide();
	<?php
	}?>
		<?php echo $t1;?>('#yandex').<?php echo $jfadtogquery;?>;
		return false;
	};
	<?php
	}
	if ($use_egold)
	{?>
	function show_egold()
	{
	<?php
	if ($use_wm)
	{?>
		<?php echo $t1;?>('#wm').hide();
	<?php
	}
	if ($use_rupay)
	{?>
		<?php echo $t1;?>('#rupay').hide();
	<?php
	}
	if ($use_yandex)
	{?>
		<?php echo $t1;?>('#yandex').hide();
	<?php
	}
	if ($use_paypal)
	{?>
		<?php echo $t1;?>('#paypal').hide();
	<?php
	}
	if ($use_libertyreserve)
	{?>
		<?php echo $t1;?>('#libertyreserve').hide();
	<?php
	}
	if ($use_moneybookers)
	{?>
		<?php echo $t1;?>('#moneybookers').hide();
	<?php
	}
	if ($use_robox)
	{?>
		<?php echo $t1;?>('#robox').hide();
	<?php
	}
	if ($use_sms)
	{?>
		<?php echo $t1;?>('#sms').hide();
	<?php
	}
	if ($use_sms1)
	{?>
		<?php echo $t1;?>('#sms1').hide();
	<?php
	}
	if ($use_mmail)
	{?>
		<?php echo $t1;?>('#mmail').hide();
	<?php
	}
	if ($use_liqpay)
	{?>
		<?php echo $t1;?>('#liqpay').hide();
	<?php
	}
	if ($use_smscoin)
	{?>
		<?php echo $t1;?>('#smscoin').hide();
	<?php
	}?>
		<?php echo $t1;?>('#egold').<?php echo $jfadtogquery;?>;
		return false;
	};
	<?php
	}
	if ($use_paypal)
	{?>
	function show_paypal()
	{
	<?php
	if ($use_wm)
	{?>
		<?php echo $t1;?>('#wm').hide();
	<?php
	}
	if ($use_rupay)
	{?>
		<?php echo $t1;?>('#rupay').hide();
	<?php
	}
	if ($use_yandex)
	{?>
		<?php echo $t1;?>('#yandex').hide();
	<?php
	}
	if ($use_egold)
	{?>
		<?php echo $t1;?>('#egold').hide();
	<?php
	}
	if ($use_libertyreserve)
	{?>
		<?php echo $t1;?>('#libertyreserve').hide();
	<?php
	}
	if ($use_moneybookers)
	{?>
		<?php echo $t1;?>('#moneybookers').hide();
	<?php
	}
	if ($use_robox)
	{?>
		<?php echo $t1;?>('#robox').hide();
	<?php
	}
	if ($use_sms)
	{?>
		<?php echo $t1;?>('#sms').hide();
	<?php
	}
	if ($use_sms1)
	{?>
		<?php echo $t1;?>('#sms1').hide();
	<?php
	}
	if ($use_mmail)
	{?>
		<?php echo $t1;?>('#mmail').hide();
	<?php
	}
	if ($use_liqpay)
	{?>
		<?php echo $t1;?>('#liqpay').hide();
	<?php
	}
	if ($use_smscoin)
	{?>
		<?php echo $t1;?>('#smscoin').hide();
	<?php
	}?>
		<?php echo $t1;?>('#paypal').<?php echo $jfadtogquery;?>;
		return false;
	};
	<?php
	}
	if ($use_libertyreserve)
	{?>
	function show_libertyreserve()
	{
	<?php
	if ($use_wm)
	{?>
		<?php echo $t1;?>('#wm').hide();
	<?php
	}
	if ($use_rupay)
	{?>
		<?php echo $t1;?>('#rupay').hide();
	<?php
	}
	if ($use_yandex)
	{?>
		<?php echo $t1;?>('#yandex').hide();
	<?php
	}
	if ($use_egold)
	{?>
		<?php echo $t1;?>('#egold').hide();
	<?php
	}
	if ($use_paypal)
	{?>
		<?php echo $t1;?>('#paypal').hide();
	<?php
	}
	if ($use_moneybookers)
	{?>
		<?php echo $t1;?>('#moneybookers').hide();
	<?php
	}
	if ($use_robox)
	{?>
		<?php echo $t1;?>('#robox').hide();
	<?php
	}
	if ($use_sms)
	{?>
		<?php echo $t1;?>('#sms').hide();
	<?php
	}
	if ($use_sms1)
	{?>
		<?php echo $t1;?>('#sms1').hide();
	<?php
	}
	if ($use_mmail)
	{?>
		<?php echo $t1;?>('#mmail').hide();
	<?php
	}
	if ($use_liqpay)
	{?>
		<?php echo $t1;?>('#liqpay').hide();
	<?php
	}
	if ($use_smscoin)
	{?>
		<?php echo $t1;?>('#smscoin').hide();
	<?php
	}?>
		<?php echo $t1;?>('#libertyreserve').<?php echo $jfadtogquery;?>;
		return false;
	};
	<?php
	}
	if ($use_moneybookers)
	{?>
	function show_moneybookers()
	{
	<?php
	if ($use_wm)
	{?>
		<?php echo $t1;?>('#wm').hide();
	<?php
	}
	if ($use_rupay)
	{?>
		<?php echo $t1;?>('#rupay').hide();
	<?php
	}
	if ($use_yandex)
	{?>
		<?php echo $t1;?>('#yandex').hide();
	<?php
	}
	if ($use_egold)
	{?>
		<?php echo $t1;?>('#egold').hide();
	<?php
	}
	if ($use_paypal)
	{?>
		<?php echo $t1;?>('#paypal').hide();
	<?php
	}
	if ($use_libertyreserve)
	{?>
		<?php echo $t1;?>('#libertyreserve').hide();
	<?php
	}
	if ($use_robox)
	{?>
		<?php echo $t1;?>('#robox').hide();
	<?php
	}
	if ($use_sms)
	{?>
		<?php echo $t1;?>('#sms').hide();
	<?php
	}
	if ($use_sms1)
	{?>
		<?php echo $t1;?>('#sms1').hide();
	<?php
	}
	if ($use_mmail)
	{?>
		<?php echo $t1;?>('#mmail').hide();
	<?php
	}
	if ($use_liqpay)
	{?>
		<?php echo $t1;?>('#liqpay').hide();
	<?php
	}
	if ($use_smscoin)
	{?>
		<?php echo $t1;?>('#smscoin').hide();
	<?php
	}?>
		<?php echo $t1;?>('#moneybookers').<?php echo $jfadtogquery;?>;
		return false;
	};
	<?php
	}
	if ($use_robox)
	{?>
	function show_robox()
	{
	<?php
	if ($use_wm)
	{?>
		<?php echo $t1;?>('#wm').hide();
	<?php
	}
	if ($use_rupay)
	{?>
		<?php echo $t1;?>('#rupay').hide();
	<?php
	}
	if ($use_yandex)
	{?>
		<?php echo $t1;?>('#yandex').hide();
	<?php
	}
	if ($use_egold)
	{?>
		<?php echo $t1;?>('#egold').hide();
	<?php
	}
	if ($use_paypal)
	{?>
		<?php echo $t1;?>('#paypal').hide();
	<?php
	}
	if ($use_libertyreserve)
	{?>
		<?php echo $t1;?>('#libertyreserve').hide();
	<?php
	}
	if ($use_moneybookers)
	{?>
		<?php echo $t1;?>('#moneybookers').hide();
	<?php
	}
	if ($use_sms)
	{?>
		<?php echo $t1;?>('#sms').hide();
	<?php
	}
	if ($use_sms1)
	{?>
		<?php echo $t1;?>('#sms1').hide();
	<?php
	}
	if ($use_mmail)
	{?>
		<?php echo $t1;?>('#mmail').hide();
	<?php
	}
	if ($use_liqpay)
	{?>
		<?php echo $t1;?>('#liqpay').hide();
	<?php
	}
	if ($use_smscoin)
	{?>
		<?php echo $t1;?>('#smscoin').hide();
	<?php
	}?>
		<?php echo $t1;?>('#robox').<?php echo $jfadtogquery;?>;
		return false;
	};
	<?php
	}
	if ($use_sms)
	{?>
	function show_sms()
	{
	<?php
	if ($use_wm)
	{?>
		<?php echo $t1;?>('#wm').hide();
	<?php
	}
	if ($use_rupay)
	{?>
		<?php echo $t1;?>('#rupay').hide();
	<?php
	}
	if ($use_yandex)
	{?>
		<?php echo $t1;?>('#yandex').hide();
	<?php
	}
	if ($use_egold)
	{?>
		<?php echo $t1;?>('#egold').hide();
	<?php
	}
	if ($use_paypal)
	{?>
		<?php echo $t1;?>('#paypal').hide();
	<?php
	}
	if ($use_libertyreserve)
	{?>
		<?php echo $t1;?>('#libertyreserve').hide();
	<?php
	}
	if ($use_moneybookers)
	{?>
		<?php echo $t1;?>('#moneybookers').hide();
	<?php
	}
	if ($use_robox)
	{?>
		<?php echo $t1;?>('#robox').hide();
	<?php
	}
	if ($use_sms1)
	{?>
		<?php echo $t1;?>('#sms1').hide();
	<?php
	}
	if ($use_mmail)
	{?>
		<?php echo $t1;?>('#mmail').hide();
	<?php
	}
	if ($use_liqpay)
	{?>
		<?php echo $t1;?>('#liqpay').hide();
	<?php
	}
	if ($use_smscoin)
	{?>
		<?php echo $t1;?>('#smscoin').hide();
	<?php
	}?>
		<?php echo $t1;?>('#sms').<?php echo $jfadtogquery;?>;
		return false;
	};
	<?php
	}
	if ($use_sms1)
	{?>
	function show_sms1()
	{
	<?php
	if ($use_wm)
	{?>
		<?php echo $t1;?>('#wm').hide();
	<?php
	}
	if ($use_rupay)
	{?>
		<?php echo $t1;?>('#rupay').hide();
	<?php
	}
	if ($use_yandex)
	{?>
		<?php echo $t1;?>('#yandex').hide();
	<?php
	}
	if ($use_egold)
	{?>
		<?php echo $t1;?>('#egold').hide();
	<?php
	}
	if ($use_paypal)
	{?>
		<?php echo $t1;?>('#paypal').hide();
	<?php
	}
	if ($use_libertyreserve)
	{?>
		<?php echo $t1;?>('#libertyreserve').hide();
	<?php
	}
	if ($use_moneybookers)
	{?>
		<?php echo $t1;?>('#moneybookers').hide();
	<?php
	}
	if ($use_robox)
	{?>
		<?php echo $t1;?>('#robox').hide();
	<?php
	}
	if ($use_sms)
	{?>
		<?php echo $t1;?>('#sms').hide();
	<?php
	}
	if ($use_mmail)
	{?>
		<?php echo $t1;?>('#mmail').hide();
	<?php
	}
	if ($use_liqpay)
	{?>
		<?php echo $t1;?>('#liqpay').hide();
	<?php
	}
	if ($use_smscoin)
	{?>
		<?php echo $t1;?>('#smscoin').hide();
	<?php
	}?>
		<?php echo $t1;?>('#sms1').<?php echo $jfadtogquery;?>;
		return false;
	};
	<?php
	}
	if ($use_mmail)
	{?>
	function show_mmail()
	{
	<?php
	if ($use_wm)
	{?>
		<?php echo $t1;?>('#wm').hide();
	<?php
	}
	if ($use_rupay)
	{?>
		<?php echo $t1;?>('#rupay').hide();
	<?php
	}
	if ($use_yandex)
	{?>
		<?php echo $t1;?>('#yandex').hide();
	<?php
	}
	if ($use_egold)
	{?>
		<?php echo $t1;?>('#egold').hide();
	<?php
	}
	if ($use_paypal)
	{?>
		<?php echo $t1;?>('#paypal').hide();
	<?php
	}
	if ($use_libertyreserve)
	{?>
		<?php echo $t1;?>('#libertyreserve').hide();
	<?php
	}
	if ($use_moneybookers)
	{?>
		<?php echo $t1;?>('#moneybookers').hide();
	<?php
	}
	if ($use_robox)
	{?>
		<?php echo $t1;?>('#robox').hide();
	<?php
	}
	if ($use_sms)
	{?>
		<?php echo $t1;?>('#sms').hide();
	<?php
	}
	if ($use_sms1)
	{?>
		<?php echo $t1;?>('#sms1').hide();
	<?php
	}
	if ($use_liqpay)
	{?>
		<?php echo $t1;?>('#liqpay').hide();
	<?php
	}
	if ($use_smscoin)
	{?>
		<?php echo $t1;?>('#smscoin').hide();
	<?php
	}?>
		<?php echo $t1;?>('#mmail').<?php echo $jfadtogquery;?>;
		return false;
	};
	<?php
	}
	if ($use_liqpay)
	{?>
	function show_liqpay()
	{
	<?php
	if ($use_wm)
	{?>
		<?php echo $t1;?>('#wm').hide();
	<?php
	}
	if ($use_rupay)
	{?>
		<?php echo $t1;?>('#rupay').hide();
	<?php
	}
	if ($use_yandex)
	{?>
		<?php echo $t1;?>('#yandex').hide();
	<?php
	}
	if ($use_egold)
	{?>
		<?php echo $t1;?>('#egold').hide();
	<?php
	}
	if ($use_paypal)
	{?>
		<?php echo $t1;?>('#paypal').hide();
	<?php
	}
	if ($use_libertyreserve)
	{?>
		<?php echo $t1;?>('#libertyreserve').hide();
	<?php
	}
	if ($use_moneybookers)
	{?>
		<?php echo $t1;?>('#moneybookers').hide();
	<?php
	}
	if ($use_robox)
	{?>
		<?php echo $t1;?>('#robox').hide();
	<?php
	}
	if ($use_sms)
	{?>
		<?php echo $t1;?>('#sms').hide();
	<?php
	}
	if ($use_sms1)
	{?>
		<?php echo $t1;?>('#sms1').hide();
	<?php
	}
	if ($use_mmail)
	{?>
		<?php echo $t1;?>('#mmail').hide();
	<?php
	}
	if ($use_smscoin)
	{?>
		<?php echo $t1;?>('#smscoin').hide();
	<?php
	}?>
		<?php echo $t1;?>('#liqpay').<?php echo $jfadtogquery;?>;
		return false;
	};
	<?php
	}
	if ($use_smscoin)
	{?>
	function show_smscoin()
	{
	<?php
	if ($use_wm)
	{?>
		<?php echo $t1;?>('#wm').hide();
	<?php
	}
	if ($use_rupay)
	{?>
		<?php echo $t1;?>('#rupay').hide();
	<?php
	}
	if ($use_yandex)
	{?>
		<?php echo $t1;?>('#yandex').hide();
	<?php
	}
	if ($use_egold)
	{?>
		<?php echo $t1;?>('#egold').hide();
	<?php
	}
	if ($use_paypal)
	{?>
		<?php echo $t1;?>('#paypal').hide();
	<?php
	}
	if ($use_libertyreserve)
	{?>
		<?php echo $t1;?>('#libertyreserve').hide();
	<?php
	}
	if ($use_moneybookers)
	{?>
		<?php echo $t1;?>('#moneybookers').hide();
	<?php
	}
	if ($use_robox)
	{?>
		<?php echo $t1;?>('#robox').hide();
	<?php
	}
	if ($use_sms)
	{?>
		<?php echo $t1;?>('#sms').hide();
	<?php
	}
	if ($use_sms1)
	{?>
		<?php echo $t1;?>('#sms1').hide();
	<?php
	}
	if ($use_mmail)
	{?>
		<?php echo $t1;?>('#mmail').hide();
	<?php
	}
	if ($use_liqpay)
	{?>
		<?php echo $t1;?>('#liqpay').hide();
	<?php
	}?>
		<?php echo $t1;?>('#smscoin').<?php echo $jfadtogquery;?>;
		return false;
	};
	<?php
	}?>

	function hide_all()
	{
	<?php
	if ($use_wm)
	{?>
		<?php echo $t1;?>('#wm').hide();
	<?php
	}
	if ($use_rupay)
	{?>
		<?php echo $t1;?>('#rupay').hide()
	<?php
	}
	if ($use_yandex)
	{?>
		<?php echo $t1;?>('#yandex').hide();
	<?php
	}
	if ($use_egold)
	{?>
		<?php echo $t1;?>('#egold').hide();
	<?php
	}
	if ($use_paypal)
	{?>
		<?php echo $t1;?>('#paypal').hide();
	<?php
	}
	if ($use_libertyreserve)
	{?>
		<?php echo $t1;?>('#libertyreserve').hide();
	<?php
	}
	if ($use_moneybookers)
	{?>
		<?php echo $t1;?>('#moneybookers').hide();
	<?php
	}
	if ($use_robox)
	{?>
		<?php echo $t1;?>('#robox').hide();
	<?php
	}
	if ($use_sms)
	{?>
		<?php echo $t1;?>('#sms').hide();
	<?php
	}
	if ($use_sms1)
	{?>
		<?php echo $t1;?>('#sms1').hide();
	<?php
	}
	if ($use_mmail)
	{?>
		<?php echo $t1;?>('#mmail').hide();
	<?php
	}
	if ($use_liqpay)
	{?>
		<?php echo $t1;?>('#liqpay').hide();
	<?php
	}
	if ($use_smscoin)
	{?>
		<?php echo $t1;?>('#smscoin').hide();
	<?php
	}?>
		return false;
	}
/* ]]> */
</script>

<!-- Panel -->
<div id="amoney" align="center" class="amoney-module<?php echo $params->get('moduleclass_sfx'); ?>">
	<?php
	if ($pretext != '')
	{?>
<div align="center" class="amoney-mod1">
		<span class="panel1"><span class="north" onclick="hide_all()" title="<?php echo JText::_('MOD_AMONEY_HIDEALL'); ?>"><?php echo $pretext;?></span></span>
	</div>
	<div align="center" class="amoney-mod2">
	<?php
	}
	if ($use_wm)
	{?>
		<a href="javascript:void(0);" onclick="show_wm()" rel="nofollow"><img
			class="south bor1" src="<?php echo $logowm_sm;?>" 
			alt="<?php echo JText::_('MOD_AMONEY_WEBMONEY'); ?>" title="<?php echo JText::_('MOD_AMONEY_WEBMONEY'); ?>" /></a>
	<?php
	}
	if ($use_rupay)
	{?>
		<a href="javascript:void(0);" onclick="show_rupay()" rel="nofollow"><img
			class="south bor1" src="<?php echo $logorupay_sm;?>" 
			alt="<?php echo JText::_('MOD_AMONEY_RBKMONEY'); ?>" title="<?php echo JText::_('MOD_AMONEY_RBKMONEY'); ?>" /></a>
	<?php
	}
	if ($use_yandex)
	{?>
		<a href="javascript:void(0);" onclick="show_yandex()" rel="nofollow"><img
			class="south bor1" src="<?php echo $logoyandex_sm;?>" 
			alt="<?php echo JText::_('MOD_AMONEY_YANDEX'); ?>" title="<?php echo JText::_('MOD_AMONEY_YANDEX'); ?>" /></a>
	<?php
	}
	if ($use_egold)
	{?>
		<a href="javascript:void(0);" onclick="show_egold()" rel="nofollow"><img
			class="south bor1" src="<?php echo $logoegold_sm;?>" 
			alt="<?php echo JText::_('MOD_AMONEY_EGOLD'); ?>" title="<?php echo JText::_('MOD_AMONEY_EGOLD'); ?>" /></a>
	<?php
	}
	if ($use_paypal)
	{?>
		<a href="javascript:void(0);" onclick="show_paypal()" rel="nofollow"><img
			class="south bor1" src="<?php echo $logopaypal_sm;?>" 
			alt="<?php echo JText::_('MOD_AMONEY_PAYPAL'); ?>" title="<?php echo JText::_('MOD_AMONEY_PAYPAL'); ?>" /></a>
	<?php
	}
	if ($use_libertyreserve)
	{?>
		<a href="javascript:void(0);" onclick="show_libertyreserve()" rel="nofollow"><img
			class="south bor1" src="<?php echo $logolibertyreserve_sm;?>" 
			alt="<?php echo JText::_('MOD_AMONEY_LIBRES'); ?>" title="<?php echo JText::_('MOD_AMONEY_LIBRES'); ?>" /></a>
	<?php
	}
	if ($use_moneybookers)
	{?>
		<a href="javascript:void(0);" onclick="show_moneybookers()" rel="nofollow"><img 
			class="south bor1" src="<?php echo $logomoneybookers_sm;?>" 
			alt="<?php echo JText::_('MOD_AMONEY_MONBOOK'); ?>" title="<?php echo JText::_('MOD_AMONEY_MONBOOK'); ?>" /></a>
	<?php
	}
	if ($use_robox)
	{?>
		<a href="javascript:void(0);" onclick="show_robox()" rel="nofollow"><img 
			class="south bor1" src="<?php echo $logorobox_sm;?>" 
			alt="<?php echo JText::_('MOD_AMONEY_ROBOKASSA'); ?>" title="<?php echo JText::_('MOD_AMONEY_ROBOKASSA'); ?>" /></a>
	<?php
	}
	if ($use_sms)
	{?>
		<a href="javascript:void(0);" onclick="show_sms()" rel="nofollow"><img 
			class="south bor1" src="<?php echo $logosms_sm;?>" 
			alt="<?php echo JText::_('MOD_AMONEY_SMS'); ?>" title="<?php echo JText::_('MOD_AMONEY_SMS'); ?>" /></a>
	<?php
	}
	if ($use_sms1)
	{?>
		<a href="javascript:void(0);" onclick="show_sms1()" rel="nofollow"><img 
			class="south bor1" src="<?php echo $logosms1_sm;?>" 
			alt="<?php echo JText::_('MOD_AMONEY_SMS1'); ?>" title="<?php echo JText::_('MOD_AMONEY_SMS1'); ?>" /></a>
	<?php
	}
	if ($use_mmail)
	{?>
		<a href="javascript:void(0);" onclick="show_mmail()" rel="nofollow"><img 
			class="south bor1" src="<?php echo $logomm_sm;?>" 
			alt="<?php echo JText::_('MOD_AMONEY_MMAIL'); ?>" title="<?php echo JText::_('MOD_AMONEY_MMAIL'); ?>" /></a>
	<?php
	}
	if ($use_liqpay)
	{?>
		<a href="javascript:void(0);" onclick="show_liqpay()" rel="nofollow"><img 
			class="south bor1" src="<?php echo $logoliqpay_sm;?>" 
			alt="<?php echo JText::_('MOD_AMONEY_LIQPAY'); ?>" title="<?php echo JText::_('MOD_AMONEY_LIQPAY'); ?>" /></a>
	<?php
	}
	if ($use_smscoin)
	{?>
		<a href="javascript:void(0);" onclick="show_smscoin()" rel="nofollow"><img 
			class="south bor1" src="<?php echo $logosmscoin_sm;?>" 
			alt="<?php echo JText::_('MOD_AMONEY_SMSCOIN'); ?>" title="<?php echo JText::_('MOD_AMONEY_SMSCOIN'); ?>" /></a>
	<?php
	}?>
</div>
</div>
	<?php
	if ($use_wm)
	{?>
<!-- Webmoney -->
<div id="wm" class="amoney" align="center" style="width:<?php echo $width_border; ?>%;height:<?php echo $height_border; ?>px">
	<div class="amoney_tr">
		<div class="amoney_tl">
			<div class="amoney_t">&nbsp;</div>
		</div>
	</div>
<div class="amoney_m" style="height:<?php echo $height_border1; ?>px">
	<form id="pay" name="pay" method="post" action="<?php echo $wm_url_adds; ?>" target="_blank">
				<div class="cont1" align="center">
					<img class="bor2" src="<?php echo $logowm;?>" alt="Webmoney" />
				</div>
					<?php echo $off_intrerst; ?>
				<div class="cont1" align="center">
					<span class="letter"><?php echo JText::_('MOD_AMONEY_AMONEY_CURRENCY_SUM'); ?></span>
				</div>
				<div class="focus-example cont1" align="center">
					<input type="text" name="LMI_PAYMENT_AMOUNT" size="3" value="<?php echo $wm_summ;?>" title="<?php echo JText::_('MOD_AMONEY_ENTER_AMOUNT'); ?>" <?php echo $amofixed;?> />
					<input type="hidden" name="LMI_PAYMENT_DESC" value="<?php echo $wm_descpay1;?>" />
					<input type="hidden" name="LMI_PAYMENT_NO" value="<?php echo $random_chars1; ?>" />
					<input type="hidden" name="LMI_SIM_MODE" value="0" />
					<input type="hidden" name="LMI_SUCCESS_URL" value="<?php echo $wm_successurl;?>" />
					<input type="hidden" name="LMI_SUCCESS_METHOD" value="2" />
					<input type="hidden" name="LMI_FAIL_URL" value="<?php echo $wm_errorurl;?>" />
					<input type="hidden" name="LMI_FAIL_METHOD" value="2" />
                    
	<?php 
	{
	?>
				<select name="LMI_PAYEE_PURSE"  title="<?php echo JText::_('MOD_AMONEY_CHOOSE_A_CURRENCY'); ?>" style="min-width:30px;" >
					<optgroup label="<?php echo JText::_('MOD_AMONEY_AMONEY_CHOICE'); ?>">
				
	<?php
	}
	if ($use_p1)
	{?>
						<option value="<?php echo $wmnum1;?>"><?php echo $wmtype1;?></option>
	<?php
	}
	if ($use_p2)
	{?>
						<option value="<?php echo $wmnum2;?>"><?php echo $wmtype2;?></option>
	<?php
	}
	if ($use_p3)
	{?>
						<option value="<?php echo $wmnum3;?>"><?php echo $wmtype3;?></option>
	<?php
	}
	if ($use_p4)
	{?>
						<option value="<?php echo $wmnum4;?>"><?php echo $wmtype4;?></option>
	<?php
	}
	if ($use_p5)
	{?>
						<option value="<?php echo $wmnum5;?>"><?php echo $wmtype5;?></option>
	<?php
	}?>
					</optgroup> 
				</select>
				</div>
				<div class="cont2" align="center">
					<input type="submit" class="button" name="wmsubmit" alt="<?php echo JText::_('MOD_AMONEY_MPWPP1');?>" value="<?php echo $btntxt; ?>" />
				</div>
	</form>
<div class="poweredby1" align="center">
	<?php echo $copy;?>
</div>
</div>
	<div class="amoney_br">
		<div class="amoney_bl">
			<div class="amoney_b">&nbsp;</div>
		</div>
	</div>
</div>
	<?php
	}
	if ($use_rupay)
	{?>
<!-- RBKmoney -->
<div id="rupay"  class="amoney" align="center" style="width:<?php echo $width_border; ?>%;height:<?php echo $height_border; ?>px">
	<div class="amoney_tr">
		<div class="amoney_tl">
			<div class="amoney_t">&nbsp;</div>
		</div>
	</div>
<div class="amoney_m" style="height:<?php echo $height_border1; ?>px">
	<form id="rupay_pay" name="rupay_rupay" method="post" action="<?php echo $rupay_url_adds; ?>" target="_blank">
				<div class="cont1" align="center">
					<img class="bor2" src="<?php echo $logorupay;?>" alt="RBKmoney" />
				</div>
					<?php echo $off_intrerst; ?>
				<div class="cont1" align="center">
					<span class="letter"><?php echo JText::_('MOD_AMONEY_ENTER_AMOUNT1'); ?></span>
				</div>
				<div class="focus-example cont1" align="center">
						<input type="hidden" name="eshopId" value="<?php echo $rupay_submit;?>" />
						<input type="hidden" name="orderId" value="<?php echo $random_chars1; ?>" />
						<input type="hidden" name="serviceName" value="<?php echo $random_chars1; ?>" />
						<input type="text" name="recipientAmount" size="3" value="<?php echo $rupay_summ;?>" title="<?php echo JText::_('MOD_AMONEY_ENTER_AMOUNT'); ?>" <?php echo $amofixed;?> />&nbsp;<span class="letter"><?php echo JText::_('MOD_AMONEY_AMONEY_RBL'); ?></span>
						<input type="hidden" name="recipientCurrency" value="RUR" />
						<input type="hidden" name="serviceName" value="<?php echo $wm_descpay1;?>" />
						<input type="hidden" name="eshopAccount" value="<?php echo $rur;?>" />
						<input type="hidden" name="successUrl" value="<?php echo $rupay_successurl;?>" />
				</div>
				<div class="cont2" align="center">
					<input type="submit" class="button" name="rupaysubmit" alt="<?php echo JText::_('MOD_AMONEY_MPWPP2');?>" value="<?php echo $btntxt;?>" />
				</div>
	</form>
<div class="poweredby1" align="center">
	<?php echo $copy;?>
</div>
</div>
	<div class="amoney_br">
		<div class="amoney_bl">
			<div class="amoney_b">&nbsp;</div>
		</div>
	</div>
</div>
	<?php
	}
	if ($use_yandex)
	{?>
<!-- Yandex -->
<div id="yandex" class="amoney" align="center" style="width:<?php echo $width_border; ?>%;height:<?php echo $height_border; ?>px">
	<div class="amoney_tr">
		<div class="amoney_tl">
			<div class="amoney_t">&nbsp;</div>
		</div>
	</div>
<div class="amoney_m" style="height:<?php echo $height_border1; ?>px">
	<form id="yandex_pay" name="yandex_pay" method="post" action="<?php echo $yandex_url_adds; ?>" target="_blank">
				<div class="cont1" align="center">
					<img class="bor2" src="<?php echo $logoyandex;?>" alt="Yandex" />
				</div>
					<?php echo $off_intrerst; ?>
				<div class="cont1" align="center">
					<span class="letter"><?php echo JText::_('MOD_AMONEY_ENTER_AMOUNT1');?></span>&nbsp;
				</div>
				<div class="focus-example cont1" align="center">
					<input type="text" id="CompanySum" name="CompanySum" size="3" value="<?php echo $yandex_summ;?>" title="<?php echo JText::_('MOD_AMONEY_ENTER_AMOUNT'); ?>" <?php echo $amofixed;?> />&nbsp;<span class="letter"><?php echo JText::_('MOD_AMONEY_AMONEY_RBL');?></span>
					<input type="hidden" name="to" value="<?php echo $yandex;?>" />
					<input type="hidden" name="CompanyName" value="<?php echo $wm_descpay1;?>" />
					<input type="hidden" name="CompanyLink" value="<?php echo $yandex_successurl;?>" />
				</div>
				<div class="cont1" align="center">
					<span class="letter"><?php echo JText::_('MOD_AMONEY_AMONEY_ACCOUBT');?></span>&nbsp;<span class="letter2"><?php echo $yandex;?></span>
				</div>
				<div class="cont2" align="center">
					<input type="submit" class="button" name="yandexsubmit" alt="<?php echo JText::_('MOD_AMONEY_MPWPP3');?>" value="<?php echo $btntxt;?>" />
				</div>
	</form>
<div class="poweredby1" align="center">
	<?php echo $copy;?>
</div>
</div>
	<div class="amoney_br">
		<div class="amoney_bl">
			<div class="amoney_b">&nbsp;</div>
		</div>
	</div>
</div>
	<?php
	}
	if ($use_egold)
	{?>
<!-- E-Gold -->
<div id="egold" class="amoney" align="center" style="width:<?php echo $width_border; ?>%;height:<?php echo $height_border; ?>px">
	<div class="amoney_tr">
		<div class="amoney_tl">
			<div class="amoney_t">&nbsp;</div>
		</div>
	</div>
<div class="amoney_m" style="height:<?php echo $height_border1; ?>px">
	<form  id="egold_pay" name="egold_pay" method="post" action="<?php echo $egold_url_adds; ?>" target="_blank">
				<div class="cont1" align="center">
					<img class="bor2" src="<?php echo $logoegold;?>" alt="E-Gold" />
				</div>
					<?php echo $off_intrerst; ?>
				<div class="cont1" align="center">
					<span class="letter"><?php echo JText::_('MOD_AMONEY_AMONEY_CURRENCY_SUM'); ?></span>
				</div>
				<div class="focus-example cont1" align="center">
            <input type="hidden" name="PAYEE_ACCOUNT"  value="<?php echo $number;?>" />
            <input type="hidden" name="PAYEE_NAME"  value="<?php echo $name;?>" />
            <input type="hidden" name="PAYMENT_METAL_ID" value="1" />  
			<input type="text" name="PAYMENT_AMOUNT"  size="3" value="<?php echo $egold_summ;?>" title="<?php echo JText::_('MOD_AMONEY_ENTER_AMOUNT'); ?>" <?php echo $amofixed;?> />
			<input type="hidden" name="LMI_PAYMENT_DESC" value="<?php echo $wm_descpay1;?>" />
            <input type="hidden" name="STATUS_URL"  value="mailto:<?php echo $mail;?>" />
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $egold_errorurl;?>" />
            <input type="hidden" name="PAYMENT_URL" value="<?php echo $egold_successurl;?>" />
            <input type="hidden" name="BAGGAGE_FIELDS"  value="" />
				<select name="payment_units" title="<?php echo JText::_('MOD_AMONEY_CHOOSE_A_CURRENCY'); ?>" style="min-width:30px;">
                <optgroup label="<?php echo JText::_('MOD_AMONEY_AMONEY_CHOICE'); ?>"> 
                <option value="1">USD</option> 
                <option value="85">Euro</option>
                </optgroup> 
                </select>
			<input type="hidden" name="suggested_memo" value="<?php echo $egoldinfo1; ?>" />
          </div>
		<div class="cont2" align="center">
			<input type="submit" class="button" name="egoldsubmit" alt="<?php echo JText::_('MOD_AMONEY_MPWPP4');?>" value="<?php echo $btntxt;?>" />
		</div>
</form>
<div class="poweredby1" align="center">
	<?php echo $copy;?>
</div>
</div>
	<div class="amoney_br">
		<div class="amoney_bl">
			<div class="amoney_b">&nbsp;</div>
		</div>
	</div>
</div>
	<?php
	}
	if ($use_paypal)
	{?>
<!-- PayPal -->
<div id="paypal" class="amoney" align="center" style="width:<?php echo $width_border; ?>%;height:<?php echo $height_border; ?>px">
	<div class="amoney_tr">
		<div class="amoney_tl">
			<div class="amoney_t">&nbsp;</div>
		</div>
	</div>
<div class="amoney_m" align="center" style="height:<?php echo $height_border1; ?>px">
<?php
$length = isset( $_POST[ 'paypallength' ] ) ? (int) $_POST[ 'paypallength' ] : "";
$amount = isset( $_POST[ 'paypalamount' ] ) ? trim( $_POST[ 'paypalamount' ] ) : "";
$amount = str_replace( ',', '.', $amount );
if( 1 <= $length && $length <= 3 )
{
  $amount = (int) round( $amount, 0 );
}
if( $amount < $paypalvalleast_val )
{
  $amount = $paypalvalleast_val;
}
$currency_code = isset( $_POST[ 'paypalcurrency_code' ] ) ? trim( $_POST[ 'paypalcurrency_code' ] ) : 0;
if ($length == 4) {
  header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=".$donate_email."&item_name=".$wm_descpay1."&item_number=".$random_chars1."&amount=".$amount."&no_shipping=0&no_note=1&tax=0&currency_code=".$currency_code."&bn=PP%2dDonationsBF&charset=UTF%2d8&return=".$link_return."&cancel=".$link_cancel);
}
else if ($length == 1) {
  header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick-subscriptions&business=".$donate_email."&item_name=".$wm_descpay1."&item_number=".$random_chars1."&no_shipping=1&no_note=1&currency_code=".$currency_code."&bn=PP%2dSubscriptionsBF&charset=UTF%2d8&a3=".$amount."%2e00&p3=1&t3=W&src=1&sra=1&return=".$link_return."&cancel=".$link_cancel);
}
else if ($length == 2) {
  header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick-subscriptions&business=".$donate_email."&item_name=".$wm_descpay1."&item_number=".$random_chars1."&no_shipping=1&no_note=1&currency_code=".$currency_code."&bn=PP%2dSubscriptionsBF&charset=UTF%2d8&a3=".$amount."%2e00&p3=1&t3=M&src=1&sra=1&return=".$link_return."&cancel=".$link_cancel);
}
else if ($length == 3) {
  header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick-subscriptions&business=".$donate_email."&item_name=".$wm_descpay1."&item_number=".$random_chars1."&no_shipping=1&no_note=1&currency_code=".$currency_code."&bn=PP%2dSubscriptionsBF&charset=UTF%2d8&a3=".$amount."%2e00&p3=1&t3=Y&src=1&sra=1&return=".$link_return."&cancel=".$link_cancel);
}
$currencies = array( 'CAD' => '$', 'USD' => '$', 'GBP' => '&pound;', 'AUD' => '$', 'JPY' => '&yen;', 'EUR' => '&euro;' );
echo "<div class=\"cont1\" align=\"center\">";
echo "<img class=\"bor2\" src=\"$logopaypal\" alt=\"PayPal\" />";
echo "</div>";
echo "$off_intrerst";
echo "<form action=\"".$_SERVER['REQUEST_URI']."\" method=\"post\" target=\"_blank\"><div class=\"focus-example cont1\" align=\"center\">";
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
  $symbol = $currencies[ $paypalcur_val ];
  echo "$javaScript <div class=\"cont1\" align=\"center\"><span class=\"letter\">". JText::_('MOD_AMONEY_AMONEY_CURRENCY_SUM')."</span>
</div>
<span class=\"letter\" id=\"donate_symbol_currency\">".$symbol."</span>
<input type=\"text\" value=\"".$paypalval_val."\" name=\"paypalamount\" size=\"3\" title=\"".JText::_('MOD_AMONEY_ENTER_AMOUNT')."\" $amofixed class=\"inputbox\" />&nbsp;";
}
elseif ($paypalval_on == 1) {
  echo "<input type=\"hidden\" value=\"".$paypalval_val."\" name=\"paypalamount\" />";
}
if ($paypalcur_on == 0) {
  print( "<select name=\"paypalcurrency_code\" id=\"donate_currency_code\" title=\"".JText::_('MOD_AMONEY_CHOOSE_A_CURRENCY')."\" style=\"min-width:30px;\" class=\"inputbox\" onchange=\"donateChangeCurrency();\">
<optgroup label=\"". JText::_('MOD_AMONEY_AMONEY_CHOICE')."\">" );
  foreach( $currencies as $currency => $dummy )
  {
    $selected = ( $currency == $paypalcur_val ) ? " selected=\"selected\"" : "";
    print( "<option value=\"$currency\"$selected>$currency</option>\n" );
  }
  print( "</optgroup></select>\n" );
}
elseif ($paypalcur_on == 1) {
  echo "<input type=\"hidden\" name=\"paypalcurrency_code\" value=\"".$paypalcur_val."\" />";
}
if ($donate_len == 0) {
  ?>
  <select name="paypallength" title="<?php echo JText::_('MOD_AMONEY_CHOOSE_PERIODICITY'); ?>" style="min-width:30px;" class="inputbox">
	<optgroup label="<?php echo JText::_('MOD_AMONEY_AMONEY_CHOICE');?>">
    <option value="4"><?php echo JText::_('MOD_AMONEY_ONE_TIME');?></option>
    <option value="1"><?php echo JText::_('MOD_AMONEY_WEEKLY');?></option>
    <option value="2"><?php echo JText::_('MOD_AMONEY_MONTHLY');?></option>
    <option value="3"><?php echo JText::_('MOD_AMONEY_ANNUAL');?></option>
	</optgroup> 
  </select>
	<?php
	}
	else if ($donate_len == 1) 
	{?>
	<input type="hidden" name="paypallength" value="<?php echo $paypallen_val;?>" />
	<?php
	}?>
</div>
<div class="cont2" align="center">
<input type="submit" class="button" name="paypalsubmit" alt="<?php echo JText::_('MOD_AMONEY_MPWPP5');?>" value="<?php echo $btntxt;?>" />
</div>
</form>
<div class="poweredby1" align="center">
	<?php echo $copy;?>
</div>
</div>
	<div class="amoney_br">
		<div class="amoney_bl">
			<div class="amoney_b">&nbsp;</div>
		</div>
	</div>
</div>
	<?php
	}
	if ($use_libertyreserve)
	{?>
<!-- LibertyReserve -->
<div id="libertyreserve" class="amoney" align="center" style="width:<?php echo $width_border; ?>%;height:<?php echo $height_border; ?>px">
	<div class="amoney_tr">
		<div class="amoney_tl">
			<div class="amoney_t">&nbsp;</div>
		</div>
	</div>
<div class="amoney_m" style="height:<?php echo $height_border1; ?>px">
	<form id="Libertyreserve" name="libertyreserve" method="post" action="<?php echo $libertyreserve_url_adds; ?>" target="_blank">
				<div class="cont1" align="center">
					<img class="bor2" src="<?php echo $logolibertyreserve;?>" alt="LibertyReserve" />
				</div>
					<?php echo $off_intrerst; ?>
				<div class="cont1" align="center">
					<span class="letter"><?php echo JText::_('MOD_AMONEY_ENTER_AMOUNT1');?></span>
				</div>
				<div class="focus-example cont1" align="center">
	<input type="hidden" name="lr_acc" value="<?php echo $ur;?>" />
<?php if ($choose_cur) { ?>
	<input type="text" name="lr_amnt" size="3" value="<?php echo $libertyreserve_summ;?>" title="<?php echo JText::_('MOD_AMONEY_ENTER_AMOUNT'); ?>" <?php echo $amofixed;?> />
			<select name="lr_currency" title="<?php echo JText::_('MOD_AMONEY_CHOOSE_A_CURRENCY'); ?>" style="min-width:30px;">
				<optgroup label="<?php echo JText::_('MOD_AMONEY_AMONEY_CHOICE'); ?>">
			<?php foreach ($curr as $cur_code) {
				$selected = ($cur_code['code'] == $currency_libertyreserve)?' selected="selected"':'';
				echo '<option value="'.$cur_code['code'].'"'.$selected.'>'.$cur_code['title'].'</option>';
			}
			?>
				</optgroup>
			</select>
<?php } else { echo '<span class="letter">'.$currency_libertyreserve2.'</span>&nbsp;&nbsp;
	<input type="text" name="lr_amnt" value="'.$libertyreserve_summ.'" size="3" title="'.JText::_('MOD_AMONEY_ENTER_AMOUNT').'" '.$amofixed.' />
	<input type="hidden" name="lr_currency" value="'.$currency_libertyreserve1.'" />'; }?>
	<input type="hidden" name="lr_comments" value="<?php echo $wm_descpay1;?>" />
	<input type="hidden" name="lr_success_url" value="<?php echo $libertyreserve_successurl;?>" />
	<input type="hidden" name="lr_fail_url" value="<?php echo $libertyreserve_errorurl;?>" />
	<input type="hidden" name="language" value="<?php echo $country; ?>" />
	<!-- baggage field -->
	<input type="hidden" name="order_id" value="<?php echo $random_chars1; ?>" />
				</div>
				<div class="cont2" align="center">
					<input type="submit" class="button" name="libertyreservesubmit" alt="<?php echo JText::_('MOD_AMONEY_MPWPP6');?>" value="<?php echo $btntxt;?>" />
				</div>
	</form>
<div class="poweredby1" align="center">
	<?php echo $copy;?>
</div>
</div>
	<div class="amoney_br">
		<div class="amoney_bl">
			<div class="amoney_b">&nbsp;</div>
		</div>
	</div>
</div>
	<?php 
	}
	if ($use_moneybookers) 
	{?>
<!-- MoneyBookers -->
<div id="moneybookers" class="amoney" align="center" style="width:<?php echo $width_border; ?>%;height:<?php echo $height_border; ?>px">
	<div class="amoney_tr">
		<div class="amoney_tl">
			<div class="amoney_t">&nbsp;</div>
		</div>
	</div>
<div class="amoney_m" style="height:<?php echo $height_border1; ?>px">
	<form id="Moneybookers" name="moneybookers" method="post" action="<?php echo $moneybookers_url_adds; ?>" target="_blank">
				<div class="cont1" align="center">
					<img class="bor2" src="<?php echo $logomoneybookers;?>" alt="MoneyBookers" />
				</div>
					<?php echo $off_intrerst; ?>
				<div class="cont1" align="center">
					<span class="letter"><?php echo JText::_('MOD_AMONEY_ENTER_AMOUNT1');?></span>
				</div>
				<div class="focus-example cont1" align="center">
<?php if ($choose_cur1) { ?>
			<input type="text" name="amount" size="3" value="<?php echo $moneybookers_summ;?>" title="<?php echo JText::_('MOD_AMONEY_ENTER_AMOUNT'); ?>" <?php echo $amofixed;?> />

			<select name="currency" title="<?php echo JText::_('MOD_AMONEY_CHOOSE_A_CURRENCY'); ?>" style="min-width:30px;">
			<optgroup label="<?php echo JText::_('MOD_AMONEY_AMONEY_CHOICE'); ?>">
			<?php foreach ($curr1 as $cur_code1) {
				$selected1 = ($cur_code1['code'] == $currency_moneybookers)?' selected="selected"':'';
				echo '<option value="'.$cur_code1['code'].'"'.$selected.'>'.$cur_code1['title'].'</option>';
			}
			?>
			</optgroup>
			</select>
<?php } else echo '<span class="letter">'.$currency_moneybookers.'</span>&nbsp;&nbsp;
					<input type="text" name="amount" size="3" value="'.$moneybookers_summ.'" title="'.JText::_('MOD_AMONEY_ENTER_AMOUNT').'" '.$amofixed.' />
					<input type="hidden" name="currency" value="'.$currency_moneybookers.'"/>'; ?>
					<input type="hidden" name="pay_to_email" value="<?php echo $moneybookers_email;?>" />
					<input type="hidden" name="status_url" value="<?php echo $moneybookers_successurl;?>" />
					<input type="hidden" name="language" value="<?php echo $country1; ?>" />
					<input type="hidden" name="detail1_description" value="<?php echo $pretext6;?>" />
					<input type="hidden" name="detail1_text" value="<?php echo $wm_descpay1;?> &mdash; N<?php echo $random_chars1; ?>" />
				</div>
				<div class="cont2" align="center">
					<input type="submit" class="button" name="moneybookerssubmit" alt="<?php echo JText::_('MOD_AMONEY_MPWPP7');?>" value="<?php echo $btntxt;?>" />
				</div>
</form>
<div class="poweredby1" align="center">
	<?php echo $copy;?>
</div>
</div>
	<div class="amoney_br">
		<div class="amoney_bl">
			<div class="amoney_b">&nbsp;</div>
		</div>
	</div>
</div>
	<?php 
	}
	if ($use_robox)
	{?>
<!-- Robox -->
<div id="robox" class="amoney" align="center" style="width:<?php echo $width_border; ?>%;height:<?php echo $height_border; ?>px">
	<div class="amoney_tr">
		<div class="amoney_tl">
			<div class="amoney_t">&nbsp;</div>
		</div>
	</div>
<div class="amoney_m" style="height:<?php echo $height_border1; ?>px">
	<form id="Robox" name="robox" method="post" action="<?php echo $robox_url_adds; ?>" target="_blank">
				<div class="cont1" align="center">
					<img class="bor2" src="<?php echo $logorobox;?>" alt="Robox" />
				</div>
					<?php echo $off_intrerst; ?>
				<div class="cont1" align="center">
					<span class="letter"><?php echo JText::_('MOD_AMONEY_FIXED_AMOUNT');?></span>
				</div>
				<div class="focus-example cont1" align="center">
      <input type="hidden" name="MrchLogin" value="<?php echo $mrh_login;?>" />
      <input type="text" name="outsum" size="3" value="<?php echo $out_summ;?>" title="<?php echo JText::_('MOD_AMONEY_A_FIXIXED_AMOUNT'); ?>" readonly="readonly" />&nbsp;<span class="letter">WMR</span>
      <input type="hidden" name="InvId" value="<?php echo $inv_id;?>"  />
      <input type="hidden" name="Desc" value="<?php echo $wm_descpay1;?>" />
      <input type="hidden" name="SignatureValue" value="<?php echo $crc;?>" />
      <input type="hidden" name="Shp_item" value="<?php echo $shp_item;?>" />
      <input type="hidden" name="IncCurrLabel" value="<?php echo $in_curr;?>" />
      <input type="hidden" name="Culture" value="<?php echo $culture;?>" />
				</div>
				<div class="cont2" align="center">
					<input type="submit" class="button" name="roboxsubmit" alt="<?php echo JText::_('MOD_AMONEY_MPWPP8');?>" value="<?php echo $btntxt;?>" />
				</div>
</form>
<div class="poweredby1" align="center">
	<?php echo $copy;?>
</div>
</div>
	<div class="amoney_br">
		<div class="amoney_bl">
			<div class="amoney_b">&nbsp;</div>
		</div>
	</div>
</div>
	<?php 
	}
	if ($use_sms)
	{?>
<!-- Smskopilka -->
<div id="sms" class="amoney" align="center" style="width:<?php echo $width_border; ?>%;height:<?php echo $height_border; ?>px">
	<div class="amoney_tr">
		<div class="amoney_tl">
			<div class="amoney_t">&nbsp;</div>
		</div>
	</div>
<div class="amoney_m" style="height:<?php echo $height_border1; ?>px">
				<div class="cont1" align="center">
					<img class="bor2" src="<?php echo $logosms;?>" alt="Smskopilka" />
				</div>
					<?php echo $off_intrerst; ?>
				<div class="cont1" align="center">
<a rel="nofollow" href="javascript:void(0)" onclick="javascript:window.open('http://smskopilka.ru/?info&amp;id=<?php echo $sms_id;?>','smskopilka','width=450,height=480,status=no,toolbar=no, menubar=no,scrollbars=yes,resizable=yes');">
<img class="kopilka south" src="<?php echo $smskopimg;?><?php echo $sms_imag;?>.gif" alt="<?php echo JText::_('MOD_AMONEY_SMS_ALT');?>" title="<?php echo JText::_('MOD_AMONEY_SMS_TIILE');?>" style="border:0" /></a>
				</div>
<div class="poweredby1" align="center">
	<?php echo $copy;?>
</div>
</div>
	<div class="amoney_br">
		<div class="amoney_bl">
			<div class="amoney_b">&nbsp;</div>
		</div>
	</div>
</div>
	<?php 
	}
	if ($use_sms1)
	{?>
<!-- Smszamok -->
<div id="sms1" class="amoney" align="center" style="width:<?php echo $width_border; ?>%;height:<?php echo $height_border; ?>px">
	<div class="amoney_tr">
		<div class="amoney_tl">
			<div class="amoney_t">&nbsp;</div>
		</div>
	</div>
<div class="amoney_m" style="height:<?php echo $height_border1; ?>px">
	<form id="Smszamok" name="smszamok" method="post" action="javascript:void(0)" onclick="window.open('http://iface.smszamok.ru/client/instructions.php?pid=<?php echo $sms1_id;?>', '_blank', 'location=no,height=300,width=700,scrollbars=1,resizable=1', false);">
				<div class="cont1" align="center">
					<img class="bor2" src="<?php echo $logosms1;?>" alt="Smszamok" />
				</div>
					<?php echo $off_intrerst; ?>
				<div class="cont1" align="center">
					<span class="letter"><?php echo JText::_('MOD_AMONEY_SMS_DESCRIPTION');?></span>
				</div>
				<div class="cont2" align="center">
				<button class="button"><?php echo $btntxt;?></button>
				</div>
	</form>
<div class="poweredby1" align="center">
	<?php echo $copy;?>
</div>
</div>
	<div class="amoney_br">
		<div class="amoney_bl">
			<div class="amoney_b">&nbsp;</div>
		</div>
	</div>
</div>
	<?php 
	}
	if ($use_mmail)
	{?>
<!-- MoneyMail -->
<div id="mmail" class="amoney" align="center" style="width:<?php echo $width_border; ?>%;height:<?php echo $height_border; ?>px">
	<div class="amoney_tr">
		<div class="amoney_tl">
			<div class="amoney_t">&nbsp;</div>
		</div>
	</div>
<div class="amoney_m" style="height:<?php echo $height_border1; ?>px">
	<?php echo $mail_li; ?>
<div class="poweredby1" align="center">
	<?php echo $copy;?>
</div>
</div>
	<div class="amoney_br">
		<div class="amoney_bl">
			<div class="amoney_b">&nbsp;</div>
		</div>
	</div>
</div>
	<?php 
	}
	if ($use_liqpay)
	{?>
<!-- liqpay -->
<div id="liqpay" class="amoney" align="center" style="width:<?php echo $width_border; ?>%;height:<?php echo $height_border; ?>px">
	<div class="amoney_tr">
		<div class="amoney_tl">
			<div class="amoney_t">&nbsp;</div>
		</div>
	</div>
<div class="amoney_m" style="height:<?php echo $height_border1; ?>px">
	<form id="Liqpay" name="liqpay" method="post" action="<?php echo $liqpay_url_adds; ?>" target="_blank">
				<div class="cont1" align="center">
					<img class="bor2" src="<?php echo $logoliqpay;?>" alt="liqpay.com" />
				</div>
					<?php 
						echo $off_intrerst;
						echo $switch_fixed;
					?>
				<div class="cont2" align="center">
					<input type="submit" class="button" name="liqpaysubmit" alt="<?php echo JText::_('MOD_AMONEY_MPWPP9');?>" value="<?php echo $btntxt;?>"/>
				</div>
	</form>
<div class="poweredby1" align="center">
	<?php echo $copy;?>
</div>
</div>
	<div class="amoney_br">
		<div class="amoney_bl">
			<div class="amoney_b">&nbsp;</div>
		</div>
	</div>
</div>
	<?php 
	}
	if ($use_smscoin)
	{?>
<!-- SMScoin -->
<div id="smscoin" class="amoney" align="center" style="width:<?php echo $width_border; ?>%;height:<?php echo $height_border; ?>px">
	<div class="amoney_tr">
		<div class="amoney_tl">
			<div class="amoney_t">&nbsp;</div>
		</div>
	</div>
<div class="amoney_m" style="height:<?php echo $height_border1; ?>px">
				<div class="cont1" align="center">
					<img class="bor2" src="<?php echo $logosmscoin;?>" alt="SMScoin.com" />
				</div>
					<?php echo $off_intrerst; ?>
<div class="cont2" align="center">
<script type="text/javascript">
/* <![CDATA[ */
smsDonateId = <?php echo $smscoin_id;?>;
smsDonateButton = <?php echo $don_but;?>;
/* ]]> */
</script>
<script type="text/javascript" src="http://donate.smscoin.com/js/smsdonate.js"></script>
</div>
<div class="poweredby1" align="center">
	<?php echo $copy;?>
</div>
</div>
	<div class="amoney_br">
		<div class="amoney_bl">
			<div class="amoney_b">&nbsp;</div>
		</div>
	</div>
</div>
	<?php
	}?>
	<?php
	if ($info_liqpay)
	{?>
<div id="ampoweredby_inf" align="center">
					<?php 
if ($params->get('switch_fixed')==1) {
$operation_envelop = '<operation_envelope>';
$operation_envelop .= '<operation_xml>'.$operation_xml.'</operation_xml>';
$operation_envelop .= '<signature>'.$signature.'</signature>';
$operation_envelop .= '</operation_envelope>';
$post = '<?xml version=\"1.0\" encoding=\"UTF-8\"?>';
$post .= '<request>';
$post .= '<liqpay>'.$operation_envelop.'</liqpay>';
$post .= '</request>';
$url = "https://www.liqpay.com/?do=api_xml";
$page = "/?do=api_xml";
$headers = array("POST ".$page." HTTP/1.0",
			"Content-type: text/xml;charset=\"utf-8\"",
			"Accept: text/xml",
			"Content-length: ".strlen($post));
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
     curl_setopt($ch, CURLOPT_TIMEOUT, 60);
     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
     curl_setopt($ch, CURLOPT_POST, 1);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
     $result = curl_exec($ch);
     curl_close($ch);
     echo $result;
} else { 
$operation_envelop = '<operation_envelope>';
$operation_envelop .= '<operation_xml>'.$xml_encoded.'</operation_xml>';
$operation_envelop .= '<signature>'.$lqsignature.'</signature>';
$operation_envelop .= '</operation_envelope>';
$post = '<?xml version=\"1.0\" encoding=\"UTF-8\"?>';
$post .= '<request>';
$post .= '<liqpay>'.$operation_envelop.'</liqpay>';
$post .= '</request>';
$url = "https://www.liqpay.com/?do=api_xml";
$page = "/?do=api_xml";
$headers = array("POST ".$page." HTTP/1.0",
			"Content-type: text/xml;charset=\"utf-8\"",
			"Accept: text/xml",
			"Content-length: ".strlen($post));
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
     curl_setopt($ch, CURLOPT_TIMEOUT, 60);
     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
     curl_setopt($ch, CURLOPT_POST, 1);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
     $result = curl_exec($ch);
     curl_close($ch);
     echo $result;
}; 
					?>
</div>
<?php
	}?>
<div id="ampoweredby" class="ampoweredby1" align="center">
<?php 
	if ($exterlink)
	{?>
<?php
	}?>
</div>
<!-- Leonidas "Donate-Amoney" Module (v9.8) ends here -->