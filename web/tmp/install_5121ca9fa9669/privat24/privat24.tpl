<p class="payment_module">
	<a href="javascript:$('#privat24_form').submit();" title="{l s='Pay with privat24' mod='privat24'}">
		<img src="{$module_template_dir}privat24.gif" alt="{l s='Pay with privat24' mod='privat24'}" />
		{l s='Pay with privat24' mod='privat24'}
	</a>
</p>

<form id="privat24_form" action="{$privat24Url}" method="POST">
	<input type="hidden" name="amt" value="{$amount}"/>
	<input type="hidden" name="ccy" value="{$currency}" />
	<input type="hidden" name="merchant" value="{$merchant}" />
	<input type="hidden" name="order" value="{$order}" />
	<input type="hidden" name="details" value="Oplata zakaza {$order}" />
	<input type="hidden" name="ext_details" value="Oplata zakaza {$order}" />
	<input type="hidden" name="pay_way" value="privat24" />
	<input type="hidden" name="return_url" value="{$return_url}" />
	<input type="hidden" name="server_url" value="{$server_url}" />
</form>

