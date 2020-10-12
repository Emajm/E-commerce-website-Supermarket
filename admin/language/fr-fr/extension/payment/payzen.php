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

// Headings
$_['heading_title'] = 'Lyra PayZen Clic&Pay - Paiement en une fois';
$_['text_edit'] = 'Editer Lyra PayZen Clic&Pay - Paiement en une fois';

// Text
$_['text_extension'] = 'Extensions';
$_['text_update_success'] = 'F&eacute;licitations, vous avez modifi&eacute; les d&eacute;tails du paiement <b>PayZen - Paiement en une fois</b> avec succ&egrave;s !';
$_['text_payment_payzen'] = '<a href="http://www.lyra-network.com" target="_blank"><img src="view/image/payment/payzen.png" alt="PayZen" title="PayZen - Paiement en une fois" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors
$_['error_permission'] = 'Attention, vous n&#39;&#39;avez pas la permission de modifier le module de paiement <b>PayZen</b> !';

// PayZen backend tabs & sections
$_['tab_payment_payzen_general'] ='G&Eacute;N&Eacute;RAL';
$_['tab_payment_payzen_specific'] ='PAIEMENT EN UNE FOIS';
$_['tab_payment_payzen_orders'] ='COMMANDES';

$_['section_payment_payzen_module_info'] = 'INFORMATIONS SUR LE MODULE';

$_['section_payment_payzen_payment_access'] = 'ACC&Egrave;S &Agrave; LA PLATEFORME';
$_['section_payment_payzen_payment_page'] = 'PAGE DE PAIEMENT';
$_['section_payment_payzen_selective_3ds'] = '3DS S&Eacute;LECTIF';
$_['section_payment_payzen_return_to_shop'] = 'RETOUR &Agrave; LA BOUTIQUE';
$_['section_payment_payzen_display_options'] = 'OPTIONS D&#39;AFFICHAGE';
$_['section_payment_payzen_restrictions'] = 'RESTRICTIONS';
$_['section_payment_payzen_orders'] ='&Eacute;TAT DES COMMANDES';
$_['section_payment_payzen_notifications'] ='NOTIFICATIONS';

// PayZen administration interface entries
$_['entry_payment_payzen_developed_by']  = 'D&eacute;velopp&eacute; par: ';
$_['entry_payment_payzen_contact_email'] = 'Courriel de contact: ';
$_['entry_payment_payzen_contrib_version'] = 'Version du module : ';
$_['entry_payment_payzen_gateway_version'] = 'Version de la plateforme : ';

$_['entry_payment_payzen_enable_logs'] = 'Logs';

$_['entry_payment_payzen_site_id'] = 'Identifiant de la boutique';
$_['entry_payment_payzen_key_test'] = 'Certificat en mode test';
$_['entry_payment_payzen_key_prod'] = 'Certificat en mode production';
$_['entry_payment_payzen_ctx_mode'] = 'Mode';
$_['entry_payment_payzen_sign_algo'] = 'Algorithme de signature';
$_['entry_payment_payzen_platform_url'] = 'URL de la plateforme';
$_['entry_payment_payzen_url_check'] = 'URL de notification';

$_['entry_payment_payzen_language'] = 'Langue par d&eacute;faut';
$_['entry_payment_payzen_available_languages'] = 'Langues disponibles';
$_['entry_payment_payzen_capture_delay'] = 'D&eacute;lai avant remise en banque';
$_['entry_payment_payzen_validation_mode'] = 'Mode de validation';
$_['entry_payment_payzen_payment_cards'] = 'Types de carte';

$_['entry_payment_payzen_3ds_min_amount'] = 'D&eacute;sactiver 3DS';

$_['entry_payment_payzen_redirect_enabled'] = 'Redirection automatique';
$_['entry_payment_payzen_redirect_success_timeout'] = 'D&eacute;lai avant redirection (succ&egrave;s)';
$_['entry_payment_payzen_redirect_success_message'] = 'Message avant redirection (succ&egrave;s)';
$_['entry_payment_payzen_redirect_error_timeout'] = 'D&eacute;lai avant redirection (&eacute;chec)';
$_['entry_payment_payzen_redirect_error_message'] = 'Message avant redirection (&eacute;chec)';
$_['entry_payment_payzen_return_mode'] = 'Mode de retour';

$_['entry_payment_payzen_status']= 'Activation';
$_['entry_payment_payzen_sort_order'] = 'Ordre d&#39;affichage';

$_['entry_payment_payzen_geo_zone'] = 'Zone de paiement';
$_['entry_payment_payzen_min_amount'] = 'Montant minimum';
$_['entry_payment_payzen_max_amount'] = 'Montant maximum';

$_['entry_payment_payzen_order_status_failed'] = '&Eacute;tat de la commande en cas d&#39;&eacute;chec';
$_['entry_payment_payzen_order_status_success'] = '&Eacute;tat de la commande en cas de succ&egrave;s';
$_['entry_payment_payzen_order_status_canceled'] = '&Eacute;tat de la commande en cas d&#39;annulation';
$_['entry_payment_payzen_notify_failed'] = 'Notifier l&#39;acheteur en cas de paiement refus&eacute;';
$_['entry_payment_payzen_notify_canceled'] = 'Notifier l&#39;acheteur en cas d&#39;annulation';

$_['desc_payment_payzen_enable_logs'] = 'Activer / d&eacute;sactiver les logs du module.';

$_['desc_payment_payzen_site_id'] = 'Identifiant fourni par PayZen.';
$_['desc_payment_payzen_key_test'] = 'Certificat fourni par PayZen pour le mode test (disponible sur le Back Office de votre boutique).';
$_['desc_payment_payzen_key_prod'] = 'Certificat fourni par PayZen (disponible sur le Back Office de votre boutique apr&egrave;s passage en production).';
$_['desc_payment_payzen_ctx_mode'] = 'Mode de fonctionnement du module.';
$_['desc_payment_payzen_sign_algo'] = 'Algorithme utilis&eacute; pour calculer la signature du formulaire de paiement. L&#39;algorithme s&eacute;lectionn&eacute; doit &ecirc;tre le m&ecirc;me que celui configur&eacute; sur le Back Office PayZen.';
$_['desc_payment_payzen_sign_algo_details'] = '<br /><b>Le HMAC-SHA-256 ne doit pas &ecirc;tre activ&eacute; si celui-ci n&#39;est pas encore disponible depuis le Back Office PayZen, la fonctionnalit&eacute; sera disponible prochainement.</b>';
$_['desc_payment_payzen_url_check'] = 'URL &Agrave; copier dans le Back Office PayZen > Param&eacute;trage > R&egrave;gles de notifications.';
$_['desc_payment_payzen_platform_url'] = 'URL vers laquelle l&#39;acheteur sera redirig&eacute; pour le paiement.';

$_['desc_payment_payzen_language'] = 'S&eacute;lectionner la langue par d&eacute;faut &agrave; utiliser sur la page de paiement.';
$_['desc_payment_payzen_available_languages'] = 'S&eacute;lectionner les langues &agrave; proposer sur la page de paiement. Ne rien s&eacute;lectionner pour utiliser la configuration de la plateforme.';
$_['desc_payment_payzen_capture_delay'] = 'Le nombre de jours avant la remise en banque (param&eacute;trable sur votre Back Office PayZen).';
$_['desc_payment_payzen_validation_mode'] = 'En mode manuel, vous devrez confirmer les paiements dans le Back Office PayZen.';
$_['desc_payment_payzen_payment_cards'] = 'Le(s) type(s) de carte pouvant &ecirc;tre utilis&eacute;(s) pour le paiement. Ne rien s&eacute;lectionner pour utiliser la configuration de la plateforme.';
$_['desc_payment_payzen_3ds_min_amount'] = 'Montant en dessous duquel 3DS sera d&eacute;sactiv&eacute;. N&eacute;cessite la souscription &agrave; l&#39;option 3DS s&eacute;lectif. Pour plus d&#39;informations, reportez-vous &agrave; la documentation du module.';

$_['desc_payment_payzen_redirect_enabled'] = 'Si activ&eacute;e, l&#39;acheteur sera redirig&eacute; automatiquement vers votre site &agrave; la fin du processus de paiement.';
$_['desc_payment_payzen_redirect_success_timeout'] = 'Temps en secondes (0-300) avant que l&#39;acheteur ne soit redirig&eacute; automatiquement vers votre site lorsque le paiement a r&eacute;ussi.';
$_['desc_payment_payzen_redirect_success_message'] = 'Message affich&eacute; sur la plateforme de paiement avant redirection lorsque le paiement a r&eacute;ussi.';
$_['desc_payment_payzen_redirect_error_timeout'] = 'Temps en secondes (0-300) avant que l&#39;acheteur ne soit redirig&eacute; automatiquement vers votre site lorsque le paiement a &eacute;chou&eacute;.';
$_['desc_payment_payzen_redirect_error_message'] = 'Message affich&eacute; sur la plateforme de paiement avant redirection lorsque le paiement a &eacute;chou&eacute;.';
$_['desc_payment_payzen_return_mode'] = 'Fa&ccedil;on dont l&#39;acheteur transmettra le r&eacute;sultat du paiement lors de son retour &agrave; la boutique.';

$_['desc_payment_payzen_status'] = 'Activer / d&eacute;sactiver le module de paiement PayZen.';
$_['desc_payment_payzen_sort_order']= 'Le plus petit indice est affich&eacute; en premier.';

$_['desc_payment_payzen_geo_zone'] = 'Si une zone est choisie, ce mode de paiement ne sera effectif que pour celle-ci.';
$_['desc_payment_payzen_min_amount'] = 'Montant minimum pour lequel ce mode de paiement est disponible.';
$_['desc_payment_payzen_max_amount'] = 'Montant maximum pour lequel ce mode de paiement est disponible.';

// PayZen backend misc texts
$_['text_payment_payzen_chinese'] = 'Chinois';
$_['text_payment_payzen_dutch'] = 'N&eacute;erlandais';
$_['text_payment_payzen_english'] = 'Anglais';
$_['text_payment_payzen_french'] = 'Fran&ccedil;ais';
$_['text_payment_payzen_german'] = 'Allemand';
$_['text_payment_payzen_italian'] = 'Italien';
$_['text_payment_payzen_japanese'] = 'Japonais';
$_['text_payment_payzen_polish'] = 'Polonais';
$_['text_payment_payzen_portuguese'] = 'Portugais';
$_['text_payment_payzen_russian'] = 'Russe';
$_['text_payment_payzen_spanish'] = 'Espagnol';
$_['text_payment_payzen_swedish'] = 'Su&eacute;dois';
$_['text_payment_payzen_turkish'] = 'Turc';

$_['text_payment_payzen_test'] = 'TEST';
$_['text_payment_payzen_production'] = 'PRODUCTION';

$_['text_payment_payzen_default'] = 'Configuration Back Office';
$_['text_payment_payzen_automatic'] = 'Automatique';
$_['text_payment_payzen_manual'] = 'Manuel';

$_['text_payment_payzen_yes'] = 'Oui';
$_['text_payment_payzen_no'] = 'Non';
