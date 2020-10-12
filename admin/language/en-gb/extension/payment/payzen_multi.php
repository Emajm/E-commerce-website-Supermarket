<?php
/**
 * PayZen V2-Payment Module version 4.0.0 for OpenCart 3.x. Support contact : support@payzen.eu.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author    Lyra Network (http://www.lyra-network.com/)
 * @copyright 2014-2018 Lyra Network and contributors
 * @license   http://www.gnu.org/licenses/gpl.html  GNU General Public License (GPL v3)
 * @category  payment
 * @package   payzen
 */

require_once 'payzen.php';

// Headings
$_['heading_title'] = 'PayZen - Payment in installments';
$_['text_edit'] = 'Edit PayZen - Payment in installments';

// Text
$_['text_update_success'] = 'Congratulations, you have successfully modified <b>PayZen - Payment in installments</b> module details !';
$_['text_payzen_multi'] = '<a href="http://www.lyra-network.com" target="_blank"><img src="view/image/payment/payzen.png" alt="PayZen" title="PayZen - Payment in installments" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors
$_['error_payzen_multi_validation'] = 'Warning: The field &laquo; %s &raquo; is not valid.';

// PayZen backend tabs & sections
$_['tab_payment_payzen_multi_specific'] ='PAYMENT IN INSTALLMENTS';

$_['section_payment_payzen_multi_options'] = 'PAYMENT IN INSTALLMENTS OPTIONS';

// PayZen multi payment options
$_['entry_payment_payzen_multi_first'] = 'First payment';
$_['entry_payment_payzen_multi_count'] = 'Number of payments';
$_['entry_payment_payzen_multi_period'] = 'Period';

$_['desc_payment_payzen_multi_first'] = 'Amount of first payment, in percentage of total amount. If empty, all payments will have the same amount.';
$_['desc_payment_payzen_multi_count'] = 'Total number of payments.';
$_['desc_payment_payzen_multi_period'] = 'Delay in days between payments.';

// PayZen multi payment restriction warning
$_['text_payment_payzen_multi_restriction_warn'] = 'ATTENTION: The payment in installments feature activation is subject to the prior agreement of Soci&eacute;t&eacute; G&eacute;n&eacute;rale.<br />If you enable this feature while you have not the associated option, an error 10000 – INSTALLMENTS_NOT_ALLOWED or 07 - PAYMENT_CONFIG will occur and the buyer will not be able to pay.';
$_['text_payment_payzen_multi_not_available'] = 'The PayZen payment in installments is not available for your offer.';
