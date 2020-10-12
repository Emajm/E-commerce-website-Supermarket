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

// Headings
$_['heading_title'] = 'Systempay - Einmalzahlung';
$_['text_edit'] = 'Edit Systempay - Einmalzahlung';

// Text
$_['text_extension'] = 'Erweiterungen';
$_['text_update_success'] = 'Congratulations, you have successfully modified <b>Systempay - Einmalzahlung</b> module details !';
$_['text_systempay'] = '<a href="http://www.lyra-network.com" target="_blank"><img src="view/image/payment/systempay.png" alt="Systempay" title="Systempay - Einmalzahlung" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors
$_['error_permission'] = 'Warning: You do not have permission to modify <b>Systempay</b> payment module !';

// Systempay backend tabs & sections
$_['tab_payment_systempay_general'] ='ALLGEMEIN';
$_['tab_payment_systempay_specific'] ='EINMALZAHLUNG';
$_['tab_payment_systempay_orders'] ='BESTELLEN';

$_['section_payment_systempay_module_info'] = 'MODULINFORMATIONEN';
$_['section_payment_systempay_payment_access'] = 'ZUGANG ZAHLUNGSSCHNITTSTELLE';
$_['section_payment_systempay_payment_page'] = 'ZAHLUNGSSEITE';
$_['section_payment_systempay_selective_3ds'] = 'SELEKTIVES 3-DS';
$_['section_payment_systempay_return_to_shop'] = 'ZUR&Uuml;CK ZUM SHOP';
$_['section_payment_systempay_display_options'] = 'ANZEIGEOPTIONEN';
$_['section_payment_systempay_restrictions'] = 'BESCHR&Auml;NKUNGEN';
$_['section_payment_systempay_orders'] ='BESTELLSTATUS';
$_['section_payment_systempay_notifications'] ='BENACHRICHTIGUNGEN';

// Systempay backend entries
$_['entry_payment_systempay_developed_by']  = 'Entwickelt von : ';
$_['entry_payment_systempay_contact_email'] = 'Kontakt : ';
$_['entry_payment_systempay_contrib_version'] = 'Modulversion : ';
$_['entry_payment_systempay_gateway_version'] = 'Plattformversion : ';

$_['entry_payment_systempay_enable_logs'] = 'Logdatein';

$_['entry_payment_systempay_site_id'] = 'Shop ID';
$_['entry_payment_systempay_key_test'] = 'Zertifikat im Testbetrieb';
$_['entry_payment_systempay_key_prod'] = 'Zertifikat im Produktivbetrieb';
$_['entry_payment_systempay_ctx_mode'] = 'Modus';
$_['entry_payment_systempay_sign_algo'] = 'Signaturalgorithmus';
$_['entry_payment_systempay_url_check'] = 'Benachrichtigung-URL';
$_['entry_payment_systempay_platform_url'] = 'Plattform-URL';

$_['entry_payment_systempay_language'] = 'Standardsprache';
$_['entry_payment_systempay_available_languages'] = 'Verf&uuml;gbare Sprachen';
$_['entry_payment_systempay_capture_delay'] = 'Einzugsfrist';
$_['entry_payment_systempay_validation_mode'] = 'Best&auml;tigungsmodus';
$_['entry_payment_systempay_payment_cards'] = 'Art der Kreditkarten';

$_['entry_payment_systempay_3ds_min_amount'] = '3DS deaktivieren';

$_['entry_payment_systempay_redirect_enabled'] = 'Automatische Weiterleitung';
$_['entry_payment_systempay_redirect_success_timeout'] = 'Zeitbeschr&auml;nkung Weiterleitung im Erfolgsfall';
$_['entry_payment_systempay_redirect_success_message'] = 'Weiterleitungs-Nachricht im Erfolgsfall';
$_['entry_payment_systempay_redirect_error_timeout'] = 'Zeitbeschr&auml;nkung Weiterleitung nach Ablehnung';
$_['entry_payment_systempay_redirect_error_message'] = 'Weiterleitungs-Nachricht nach Ablehnung';
$_['entry_payment_systempay_return_mode'] = '&Uuml;bermittlungs-Modus';

$_['entry_payment_systempay_status'] = 'Modul aktivieren';
$_['entry_payment_systempay_sort_order'] = 'Anzeigereihenfolge';

$_['entry_payment_systempay_geo_zone'] = 'Zahlungsraum';
$_['entry_payment_systempay_min_amount'] = 'Mindestbetrag';
$_['entry_payment_systempay_max_amount'] = 'H&ouml;chstbetrag';

$_['entry_payment_systempay_order_status_failed'] = 'Bezahlungsstatus nach verweigerter Bezahlung';
$_['entry_payment_systempay_order_status_success'] = 'Bestellungsstatus nach erfolgreicher Bezahlung';
$_['entry_payment_systempay_order_status_canceled'] = 'Bezahlungsstatus nach stornierten Bezahlung';
$_['entry_payment_systempay_notify_failed'] = 'Notify buyer on payment failure';
$_['entry_payment_systempay_notify_canceled'] = 'Notify buyer on payment cancel';

$_['desc_payment_systempay_enable_logs'] = 'Logdateien des Moduls aktivieren';

$_['desc_payment_systempay_site_id'] = 'Kennung, die von Systempay bereitgestellt wird.';
$_['desc_payment_systempay_key_test'] = 'Zertifikat, das von Systempay zu Testzwecken bereitgestellt wird (im Systempay-Back office verf&uuml;gbar)';
$_['desc_payment_systempay_key_prod'] = 'Von Systempay bereitgestelltes Zertifikat (im Systempay-Back Office verf&uuml;gbar).';
$_['desc_payment_systempay_ctx_mode'] = 'Kontextmodus dieses Moduls.';
$_['desc_payment_systempay_sign_algo'] = 'Algorithmus zur Berechnung der Zahlungsformsignatur. Der ausgew&auml;hlte Algorithmus muss derselbe sein, wie er im Systempay Back Office.';
$_['desc_payment_systempay_sign_algo_details'] = '<br /><b>Der HMAC-SHA-256-Algorithmus sollte nicht aktiviert werden, wenn er noch nicht im Systempay Back Office verf&uuml;gbar ist. Die Funktion wird in K&uuml;rze verf&uuml;gbar sein.</b>';
$_['desc_payment_systempay_url_check'] = 'URL, die Sie in Ihre Systempay Back Office kopieren sollen > Einstellung > Regeln der Benachrichtigungen.';
$_['desc_payment_systempay_platform_url'] = 'Link zur Bezahlungsplattform.';

$_['desc_payment_systempay_language'] = 'W&auml;hlen Sie bitte die Spracheinstellung der Zahlungsseiten aus.';
$_['desc_payment_systempay_available_languages'] = 'Verf&uuml;gbare Sprachen der Zahlungsseite. Nichts ausw&auml;hlen, um die Einstellung der Zahlungsplattform zu benutzen.';
$_['desc_payment_systempay_capture_delay'] = 'Anzahl der Tage bis zum Einzug der Zahlung (Einstellung &uuml;ber Ihr Systempay-Back office).';
$_['desc_payment_systempay_validation_mode'] = 'Bei manueller Eingabe m&uuml;ssen Sie Zahlungen manuell in Ihrem Systempay Back office best&auml;tigen.';
$_['desc_payment_systempay_payment_cards'] = 'Liste der/die f&uuml;r die Zahlung verf&uuml;gbare(n) Kartentyp(en), durch Semikolon getrennt.';

$_['desc_payment_systempay_3ds_min_amount'] = 'Betrag, unter dem 3DS deaktiviert wird. Muss f&uuml;r die Option Selektives 3DS freigeschaltet sein. Weitere Informationen finden Sie in der Moduldokumentation.';

$_['desc_payment_systempay_redirect_enabled'] = 'Ist diese Einstellung aktiviert, wird der Kunde am Ende des Bezahlvorgangs automatisch auf Ihre Seite weitergeleitet.';
$_['desc_payment_systempay_redirect_success_timeout'] = 'Zeitspanne in Sekunden (0-300) bis zur automatischen Weiterleitung des Kunden auf Ihre Seite nach erfolgter Zahlung.';
$_['desc_payment_systempay_redirect_success_message'] = 'Nachricht, die nach erfolgter Zahlung und vor der Weiterleitung auf der Plattform angezeigt wird.';
$_['desc_payment_systempay_redirect_error_timeout'] = 'Zeitspanne in Sekunden (0-300) bis zur automatischen Weiterleitung des Kunden auf Ihre Seite nach fehlgeschlagener Zahlung.';
$_['desc_payment_systempay_redirect_error_message'] = 'Nachricht, die nach fehlgeschlagener Zahlung und vor der Weiterleitung auf der Plattform angezeigt wird.';
$_['desc_payment_systempay_return_mode'] = 'Methode, die zur &Uuml;bermittlung des Zahlungsergebnisses von der Zahlungsschnittstelle an Ihren Shop verwendet wird.';

$_['desc_payment_systempay_status'] = 'M&ouml;chten Sie die Systempay-Zahlungsart akzeptieren?';
$_['desc_payment_systempay_sort_order']= 'Anzeigereihenfolge: Von klein nach gross.';

$_['desc_payment_systempay_geo_zone'] = 'Ist ein Zahlungsraum ausgew&auml;hlt, so wird diese Zahlungsart nur f&uuml;r diesen verf&uuml;gbar sein.';
$_['desc_payment_systempay_min_amount'] = 'Mindestbetrag f&uuml;r die Nutzung dieser Zahlungsweise.';
$_['desc_payment_systempay_max_amount'] = 'H&ouml;chstbetrag f&uuml;r die Nutzung dieser Zahlungsweise.';

// Systempay backend misc texts

$_['text_payment_systempay_chinese'] = 'Chinesisch';
$_['text_payment_systempay_dutch'] = 'Niederl&auml;ndisch';
$_['text_payment_systempay_english'] = 'Englisch';
$_['text_payment_systempay_french'] = 'Franz&ouml;sisch';
$_['text_payment_systempay_german'] = 'Deutsch';
$_['text_payment_systempay_italian'] = 'Italianisch';
$_['text_payment_systempay_japanese'] = 'Japanisch';
$_['text_payment_systempay_polish'] = 'Polnisch';
$_['text_payment_systempay_portuguese'] = 'Portugiesisch';
$_['text_payment_systempay_spanish'] = 'Spanisch';
$_['text_payment_systempay_swedish'] = 'Schwedisch';
$_['text_payment_systempay_russian'] = 'Russisch';
$_['text_payment_systempay_turkish'] = 'T&uuml;rkisch';

$_['text_payment_systempay_test'] = 'TEST';
$_['text_payment_systempay_production'] = 'PRODUKTION';

$_['text_payment_systempay_default'] = 'Einstellung Back Office';
$_['text_payment_systempay_automatic'] = 'Automatisch';
$_['text_payment_systempay_manual'] = 'Manuell';

$_['text_payment_systempay_yes'] = 'Ja';
$_['text_payment_systempay_no'] = 'Nein';
