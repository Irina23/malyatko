<?php
/**
  * Payments
  * @category payment
  *
  * @author Alexey Bezuglyi
  * @copyright PrestaShop
  * @license http://www.opensource.org/licenses/osl-3.0.php Open-source licence 3.0
  * @version 0.1
  */

class privat24 extends PaymentModule
{
    private $_html = '';
    private $_postErrors = array();

    public function __construct()
    {
        $this->name = 'privat24';
        $this->tab = 'Payment';
        $this->version = '0.1';

        $this->currencies = true;
        $this->currencies_mode = 'radio';

        $config = Configuration::getMultiple(array('PRIVAT24_MERCHANT_PASS', 'PRIVAT24_MERCHANT_ID'));
        if (isset($config['PRIVAT24_MERCHANT_PASS']))
            $this->privat24_merchant_pass = $config['PRIVAT24_MERCHANT_PASS'];
        if (isset($config['PRIVAT24_MERCHANT_ID']))
            $this->privat24_merchant_id = $config['PRIVAT24_MERCHANT_ID'];

        parent::__construct();

        /* The parent construct is required for translations */
        $this->page = basename(__FILE__, '.php');
        $this->displayName = 'Privat24';
        $this->description = $this->l('Accept payments by Privat24');
        $this->confirmUninstall = $this->l('Are you sure you want to delete your details ?');

        if (!isset($this->privat24_merchant_pass) OR !isset($this->privat24_merchant_id))
            $this->warning = $this->l('Your Privat24 account must be set correctly (specify a password and a unique id merchant');
    }

    function install()
    {
        if (!parent::install() OR !$this->registerHook('payment'))
            return false;
        return true;
    }

    function uninstall()
    {
        if (!Configuration::deleteByName('PRIVAT24_MERCHANT_PASS') OR !Configuration::deleteByName('PRIVAT24_MERCHANT_ID') OR !parent::uninstall())
            return false;
        return true;
    }

    private function _postValidation()
    {
        if (isset($_POST['btnSubmit']))
        {
            if (empty($_POST['merchant_id']))
                $this->_postErrors[] = $this->l('Merchant ID is required');
            elseif (empty($_POST['merchant_pass']))
                $this->_postErrors[] = $this->l('Merchant password is required.');
        }
    }

    private function _postProcess()
    {
        if (isset($_POST['btnSubmit']))
        {
            Configuration::updateValue('PRIVAT24_MERCHANT_ID', $_POST['merchant_id']);
            Configuration::updateValue('PRIVAT24_MERCHANT_PASS', $_POST['merchant_pass']);
        }
        $this->_html .= '<div class="conf confirm"><img src="../img/admin/ok.gif" alt="'.$this->l('OK').'" /> '.$this->l('Settings updated').'</div>';
    }

    private function _displayPrivat24()
    {
        $this->_html .= '<img src="../modules/privat24/privat24.gif" style="float:left; margin-right:15px;"><b>'.$this->l('This module allows you to accept payments by Privat24.').'</b><br /><br />
        '.$this->l('You need to register on the site').' <a href="http://privat24.ua/p24ua.htm" target="blank">privat24.ua</a> <br /><br /><br />';
    }

    private function _displayForm()
    {
        $this->_html .=
        '<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
            <fieldset>
            <legend><img src="../img/admin/contact.gif" />'.$this->l('Contact details').'</legend>
                <table border="0" width="500" cellpadding="0" cellspacing="0" id="form">
                    <tr><td colspan="2">'.$this->l('Please specify the password and a unique id merchant registered in the Privat24 system').'.<br /><br /></td></tr>
                    <tr><td width="140" style="height: 35px;">'.$this->l('Merchant ID').'</td><td><input type="text" name="merchant_id" value="'.htmlentities(Tools::getValue('merchant_id', $this->privat24_merchant_id), ENT_COMPAT, 'UTF-8').'" style="width: 300px;" /></td></tr>
                    <tr><td width="140" style="height: 35px;">'.$this->l('Merchant password').'</td><td><input type="text" name="merchant_pass" value="'.htmlentities(Tools::getValue('merchant_pass', $this->privat24_merchant_pass), ENT_COMPAT, 'UTF-8').'" style="width: 300px;" /></td></tr>
                    <tr><td colspan="2" align="center"><br /><input class="button" name="btnSubmit" value="'.$this->l('Update settings').'" type="submit" /></td></tr>
                </table>
            </fieldset>
        </form>';
    }

    function getContent()
    {
        $this->_html = '<h2>'.$this->displayName.'</h2>';

        if (!empty($_POST))
        {
            $this->_postValidation();
            if (!sizeof($this->_postErrors))
                $this->_postProcess();
            else
                foreach ($this->_postErrors AS $err)
                    $this->_html .= '<div class="alert error">'. $err .'</div>';
        }
        else
            $this->_html .= '<br />';

        $this->_displayPrivat24();
        $this->_displayForm();

        return $this->_html;
    }

    function hookPayment($params)
    {
        global $smarty;
        global $cookie;
        if (substr(_PS_VERSION_, 0, 3) == '1.3')
            $currency = new Currency($cookie->id_currency);
        else
            $currency = new Currency(intval(Configuration::get('PS_CURRENCY_DEFAULT')));
        $amount = $params['cart']->getOrderTotal(true, 3);
        $id_cart = $params['cart']->id;

        $smarty->assign(array(
            'privat24Url'  => 'https://api.privatbank.ua:9083/p24api/ishop',
            'currency'     => $currency->iso_code,
            'order'        => $id_cart/*.uniqid()*/,
            'amount'       => $amount,
            'merchant'     => htmlentities(Tools::getValue('merchant_id', $this->privat24_merchant_id), ENT_COMPAT, 'UTF-8'),
            'return_url'   => 'http://'.$_SERVER['HTTP_HOST'].__PS_BASE_URI__.'modules/privat24/validation.php',
            'server_url'   => 'http://'.$_SERVER['HTTP_HOST'].__PS_BASE_URI__.'modules/privat24/fail.php'
            ));
        return $this->display(__FILE__, 'privat24.tpl');
    }

    public function validation($response)
    {
        $errors = '';
        parse_str($response, $output);
        $id_cart = $output['order'];
        if($output['state']=='test' || $output['state']=='ok')
        {
            $amount = floatval($output['amt']);
            $transaction_id = 'Privat24 Transaction ID: '.$output['ref'].' '.$output['sender_phone'];
            $this->validateOrder($id_cart, _PS_OS_PAYMENT_, $amount, $this->displayName, $transaction_id);
            Tools::redirect('history.php');
        } elseif($output['state']=='fail')
        {
            $this->validateOrder($id_cart, _PS_OS_ERROR_, 0, $this->displayName, $errors.'<br />');
        }
        Tools::redirect('history.php');
    }

}

?>