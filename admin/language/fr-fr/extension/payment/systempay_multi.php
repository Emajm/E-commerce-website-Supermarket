<?php
/**
 * Systempay V2-Payment Module version 4.0.0 for OpenCart 3.x. Support contact : supportvad@lyra-network.com.
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
 * @package   systempay
 */

require_once 'systempay.php';

// Headings
$_['heading_title'] = 'Systempay - Paiement en plusieurs fois';
$_['text_edit'] = 'Editer Systempay - Paiement en plusieurs fois';

// Text
$_['text_update_success'] = 'F&eacute;licitations, vous avez modifi&eacute; les d&eacute;tails du module <b>Systempay - Paiement en plusieurs fois</b> avec succ&egrave;s !';
$_['text_systempay_multi'] = '<a href="http://www.lyra-network.com" target="_blank"><img src="view/image/payment/systempay.png" alt="Systempay" title="Systempay - Paiement en plusieurs fois" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors
$_['error_systempay_multi_validation'] = 'Avertissement: le champ &laquo; %s &raquo; est invalide.';

// Systempay backend tabs and sections
$_['tab_payment_systempay_multi_specific'] ='PAIEMENT EN PLUSIEURS FOIS';

$_['section_payment_systempay_multi_options'] = 'OPTIONS DE PAIEMENT EN PLUSIEURS FOIS';

// Systempay multi payment options
$_['entry_payment_systempay_multi_first'] = 'Premier paiement';
$_['entry_payment_systempay_multi_count'] = 'Nombre de paiements';
$_['entry_payment_systempay_multi_period'] = 'P&eacute;riode';

$_['desc_payment_systempay_multi_first'] = 'Montant du premier paiement, en pourcentage du montant total. Si vide, tous les paiements auront le m&ecirc;me montant.';
$_['desc_payment_systempay_multi_count'] = 'Nombre total de paiements.';
$_['desc_payment_systempay_multi_period'] = 'D&eacute;lai en jours entre deux paiements.';

// Systempay multi payment restriction warning
$_['text_payment_systempay_multi_restriction_warn'] = 'ATTENTION: L&#39;activation de la fonctionnalit&eacute; de paiement en nfois est soumise &agrave; accord pr&eacute;alable de Soci&eacute;t&eacute; G&eacute;n&eacute;rale.<br />Si vous activez cette fonctionnalit&eacute; alors que vous ne disposez pas de cette option, une erreur 10000 – INSTALLMENTS_NOT_ALLOWED ou 07 - PAYMENT_CONFIG sera g&eacute;n&eacute;r&eacute;e et l&#39;acheteur sera dans l&#39;incapacit&eacute; de payer.';
$_['text_payment_systempay_multi_not_available'] = 'Le paiement Systempay en plusieurs fois n&#39;est pas disponible pour votre offre.';
