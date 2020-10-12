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

// Headings
$_['heading_title'] = 'Sogecommerce - One-time payment';
$_['text_edit'] = 'Edit Sogecommerce - One-time payment';

// Text
$_['text_extension'] = 'Extensions';
$_['text_update_success'] = 'Congratulations, you have successfully modified <b>Sogecommerce - One-time payment</b> module details !';
$_['text_sogecommerce'] = '<a href="http://www.lyra-network.com" target="_blank"><img src="view/image/payment/sogecommerce.png" alt="Sogecommerce - One-time payment" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors
$_['error_permission'] = 'Warning: You do not have permission to modify <b>Sogecommerce</b> payment module !';

// Sogecommerce backend tabs & sections
$_['tab_payment_sogecommerce_general'] ='GENERAL';
$_['tab_payment_sogecommerce_specific'] ='ONE-TIME PAYMENT';
$_['tab_payment_sogecommerce_orders'] ='ORDERS';

$_['section_payment_sogecommerce_module_info'] = 'MODULE INFORMATION';
$_['section_payment_sogecommerce_payment_access'] = 'PAYMENT GATEWAY ACCESS';
$_['section_payment_sogecommerce_payment_page'] = 'PAYMENT PAGE';
$_['section_payment_sogecommerce_selective_3ds'] = 'SELECTIVE 3DS';
$_['section_payment_sogecommerce_return_to_shop'] = 'RETURN TO SHOP';
$_['section_payment_sogecommerce_display_options'] = 'DISPLAY OPTIONS';
$_['section_payment_sogecommerce_restrictions'] = 'RESTRICTIONS';
$_['section_payment_sogecommerce_orders'] ='ORDER STATUS';
$_['section_payment_sogecommerce_notifications'] ='NOTIFICATIONS';

// Sogecommerce backend entries
$_['entry_payment_sogecommerce_developed_by']  = 'Developed by : ';
$_['entry_payment_sogecommerce_contact_email'] = 'Contact us : ';
$_['entry_payment_sogecommerce_contrib_version'] = 'Module version : ';
$_['entry_payment_sogecommerce_gateway_version'] = 'Gateway version : ';

$_['entry_payment_sogecommerce_enable_logs'] = 'Logs';

$_['entry_payment_sogecommerce_site_id'] = 'Shop ID';
$_['entry_payment_sogecommerce_key_test'] = 'Certificate in test mode';
$_['entry_payment_sogecommerce_key_prod'] = 'Certificate in production mode';
$_['entry_payment_sogecommerce_ctx_mode'] = 'Mode';
$_['entry_payment_sogecommerce_sign_algo'] = 'Signature algorithm';
$_['entry_payment_sogecommerce_url_check'] = 'Instant Payment Notification URL';
$_['entry_payment_sogecommerce_platform_url'] = 'Gateway URL';

$_['entry_payment_sogecommerce_language'] = 'Default language';
$_['entry_payment_sogecommerce_available_languages'] = 'Available languages';
$_['entry_payment_sogecommerce_capture_delay'] = 'Capture delay';
$_['entry_payment_sogecommerce_validation_mode'] = 'Validation mode';
$_['entry_payment_sogecommerce_payment_cards'] = 'Card types';

$_['entry_payment_sogecommerce_3ds_min_amount'] = 'Disable 3DS';

$_['entry_payment_sogecommerce_redirect_enabled'] = 'Automatic redirection';
$_['entry_payment_sogecommerce_redirect_success_timeout'] = 'Redirection timeout on success';
$_['entry_payment_sogecommerce_redirect_success_message'] = 'Redirection message on success';
$_['entry_payment_sogecommerce_redirect_error_timeout'] = 'Redirection timeout on failure';
$_['entry_payment_sogecommerce_redirect_error_message'] = 'Redirection message on failure';
$_['entry_payment_sogecommerce_return_mode'] = 'Return mode';

$_['entry_payment_sogecommerce_order_status_failed'] = 'Order status on payment failure';
$_['entry_payment_sogecommerce_order_status_success'] = 'Order status on payment success';
$_['entry_payment_sogecommerce_order_status_canceled'] = 'Order status on payment cancel';
$_['entry_payment_sogecommerce_notify_failed'] = 'Notify buyer on payment failure';
$_['entry_payment_sogecommerce_notify_canceled'] = 'Notify buyer on payment cancel';

$_['entry_payment_sogecommerce_status'] = 'Activation';
$_['entry_payment_sogecommerce_sort_order'] = 'Sort order';

$_['entry_payment_sogecommerce_geo_zone'] = 'Payment zone';
$_['entry_payment_sogecommerce_min_amount'] = 'Minimum amount';
$_['entry_payment_sogecommerce_max_amount'] = 'Maximum amount';

$_['desc_payment_sogecommerce_enable_logs'] = 'Enable / disable module logs.';

$_['desc_payment_sogecommerce_site_id'] = 'The identifier provided by Sogecommerce.';
$_['desc_payment_sogecommerce_key_test'] = 'Certificate provided by Sogecommerce for test mode (available in Sogecommerce Back Office).';
$_['desc_payment_sogecommerce_key_prod'] = 'Certificate provided by Sogecommerce (available in Sogecommerce Back Office after enabling production mode).';
$_['desc_payment_sogecommerce_ctx_mode'] = 'The context mode of this module.';
$_['desc_payment_sogecommerce_sign_algo'] = 'Algorithm used to compute the payment form signature. Selected algorithm must be the same as one configured in the Sogecommerce Back Office.';
$_['desc_payment_sogecommerce_sign_algo_details'] = '<br /><b>The HMAC-SHA-256 algorithm should not be activated if it is not yet available in the Sogecommerce Back Office, the feature will be available soon.</b>';
$_['desc_payment_sogecommerce_url_check'] = 'URL to copy into your Sogecommerce Back Office > Settings > Notification rules.';
$_['desc_payment_sogecommerce_platform_url'] = 'Payment page URL.';

$_['desc_payment_sogecommerce_language'] = 'Default language on the payment page.';
$_['desc_payment_sogecommerce_available_languages'] = 'Languages available on the payment page. If you do not select any, all the supported languages will be available.';
$_['desc_payment_sogecommerce_capture_delay'] = 'The number of days before the bank capture (adjustable in your Sogecommerce Back Office).';
$_['desc_payment_sogecommerce_validation_mode'] = 'If manual is selected, you will have to confirm payments manually in your Sogecommerce Back Office.';
$_['desc_payment_sogecommerce_payment_cards'] = 'The card type(s) that can be used for the payment. Select none to use gateway configuration.';
$_['desc_payment_sogecommerce_3ds_min_amount'] = 'Amount below which 3DS will be disabled. Needs subscription to selective 3DS option. For more information, refer to the module documentation.';

$_['desc_payment_sogecommerce_redirect_enabled'] = 'If enabled, the buyer is automatically redirected to your site at the end of the payment.';
$_['desc_payment_sogecommerce_redirect_success_timeout'] = 'Time in seconds (0-300) before the buyer is automatically redirected to your website after a successful payment.';
$_['desc_payment_sogecommerce_redirect_success_message'] = 'Message displayed on the payment page prior to redirection after a successful payment.';
$_['desc_payment_sogecommerce_redirect_error_timeout'] = 'Time in seconds (0-300) before the buyer is automatically redirected to your website after a declined payment.';
$_['desc_payment_sogecommerce_redirect_error_message'] = 'Message displayed on the payment page prior to redirection after a declined payment.';
$_['desc_payment_sogecommerce_return_mode'] = 'Method that will be used for transmitting the payment result from the payment page to your shop.';

$_['desc_payment_sogecommerce_status'] = 'Enables / disables the Sogecommerce payment module.';
$_['desc_payment_sogecommerce_sort_order']= 'The smallest index is displayed first.';

$_['desc_payment_sogecommerce_geo_zone'] = 'If an area is selected, this payment mode will only be available for it.';
$_['desc_payment_sogecommerce_min_amount'] = 'Minimum amount to activate this payment method.';
$_['desc_payment_sogecommerce_max_amount'] = 'Maximum amount to activate this payment method.';

// Sogecommerce backend misc texts
$_['text_payment_sogecommerce_chinese'] = 'Chinese';
$_['text_payment_sogecommerce_dutch'] = 'Dutch';
$_['text_payment_sogecommerce_english'] = 'English';
$_['text_payment_sogecommerce_french'] = 'French';
$_['text_payment_sogecommerce_german'] = 'German';
$_['text_payment_sogecommerce_italian'] = 'Italian';
$_['text_payment_sogecommerce_japanese'] = 'Japanese';
$_['text_payment_sogecommerce_polish'] = 'Polish';
$_['text_payment_sogecommerce_portuguese'] = 'Portuguese';
$_['text_payment_sogecommerce_russian'] = 'Russian';
$_['text_payment_sogecommerce_spanish'] = 'Spanish';
$_['text_payment_sogecommerce_swedish'] = 'Swedish';
$_['text_payment_sogecommerce_turkish'] = 'Turkish';

$_['text_payment_sogecommerce_test'] = 'TEST';
$_['text_payment_sogecommerce_production'] = 'PRODUCTION';

$_['text_payment_sogecommerce_default'] = 'Back Office configuration';
$_['text_payment_sogecommerce_automatic'] = 'Automatic';
$_['text_payment_sogecommerce_manual'] = 'Manual';

$_['text_payment_sogecommerce_yes'] = 'Yes';
$_['text_payment_sogecommerce_no'] = 'No';
