<?php
/**
 * Sogecommerce V2-Payment Module version 4.0.0 for OpenCart 3.x. Support contact : support@sogecommerce.societegenerale.eu.
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
 * @package   sogecommerce
 */

require_once 'sogecommerce.php';

// Headings
$_['heading_title'] = 'Sogecommerce - Ratenzahlung';
$_['text_edit'] = 'Edit Sogecommerce - Ratenzahlung';

// Text
$_['text_update_success'] = 'Congratulations, you have successfully modified <b>Sogecommerce - Ratenzahlung</b> modulsdetailen !';
$_['text_sogecommerce_multi'] = '<a href="http://www.lyra-network.com" target="_blank"><img src="view/image/payment/sogecommerce.png" alt="Sogecommerce" title="Sogecommerce - Ratenzahlung" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors
$_['error_sogecommerce_multi_validation'] = 'Warnung: Das feld &laquo;%s&raquo; ist ung&uuml;ltig.';

// Sogecommerce backend tabs & sections
$_['tab_payment_sogecommerce_multi_specific'] ='RATENZAHLUNG';

$_['section_payment_sogecommerce_multi_options'] = 'ZAHLUNGSOPTIONEN';

// Sogecommerce multi payment options
$_['entry_payment_sogecommerce_multi_first'] = 'Erste Zahlung';
$_['entry_payment_sogecommerce_multi_count'] = 'Zahl';
$_['entry_payment_sogecommerce_multi_period'] = 'Zeitraum';

$_['desc_payment_sogecommerce_multi_first'] = 'Betrag der ersten Zahlung ins gesamtes Prozent. Wenn leer, alle Zahlungen werden den gleichen Betrag haben.';
$_['desc_payment_sogecommerce_multi_count'] = 'Gesamte Zahl von Zahlungen.';
$_['desc_payment_sogecommerce_multi_period'] = 'Zeit in Tages zwischen zwei Zahlungen.';

// Sogecommerce multi payment restriction warning
$_['text_payment_sogecommerce_multi_restriction_warn'] = 'ATTENTION: The payment in installments feature activation is subject to the prior agreement of Soci&eacute;t&eacute; G&eacute;n&eacute;rale.<br />If you enable this feature while you have not the associated option, an error 10000 – INSTALLMENTS_NOT_ALLOWED or 07 - PAYMENT_CONFIG will occur and the buyer will not be able to pay.';
$_['text_payment_sogecommerce_multi_not_available'] = 'The Sogecommerce payment in installments is not available for your offer.';
