<?php
if(!isset($_SESSION['klikandpay_site'])) {$_SESSION['klikandpay_site'] = '';}
if(!isset($_SESSION['klikandpay_key'])) {$_SESSION['klikandpay_key'] ='';}
// Heading
$_['heading_title']  = 'Klik and Pay v3.x (Credit card)<a style="cursor:help;font-weight:normal;font-size:12px;text-decoration:none;" href="http://www.hosteco.fr" target="_blank" title="Go to the website of the publisher"> &nbsp; - &nbsp; By hosteco.fr &copy; 2010 - 2018 </a><br>Tarif : from <b>1.2% + 0.3€</b> by transaction.';

// Text 
$_['text_payment']       = 'Payment';
$_['text_edit']          = 'Edit Klik & Pay Paiement (Credit Card)';
$_['text_success']       = 'Success: You have changed the account klikandpay details!';
$_['text_klikandpay']    = '<img src="view/image/payment/klikandpay.gif" width="90" height="30" alt=" Klik and Pay " title=" Klik and Pay" style="border: 0px solid #EEEEEE;" />
<br><a href="https://www.klikandpay.com/marchands/index.cgi" target="_blank" title="Look at the payments made on your Account"><b>Merchant Administration</b></a>';

$_['text_site']					= ' &nbsp;&nbsp;(Provided by Klik and Pay.)';
$_['text_key']					= ' &nbsp;&nbsp;(You must enter only numbers and letters.)';

$_['text_open']					= '
		<div class="information left">To open an account, follow this link: <a target="_BLANK" href="https://www.klikandpay.com/cgi-bin/inscription.pl"><b>https://www.klikandpay.com/cgi-bin/inscription.pl</b></a> or send an email to <a href="mailto:market@klikandpay.com"><b>market@klikandpay.com</b></a></div>
<br />
		<div class="information left"><font color=blue><big><b>If you already have a merchant account Pay Klik, you can directly go to the settings below.</b></big></font></div>
<br />
';

$_['text_help']								= '<h1>How to install</h1><br /><big>
<b>1) - </b>Choose the Active state, to enable the module.<br /><br />
<b>2) - </b>Enter the Site ID. (provided by Klik Pay)<br /><br />
<b>3) - </b>Enter your merchant key. (selected automatically and randomly by your site)</i><br /><br />
<b>4) - </b>Enter a minimum threshold of activation.<br /><br />
<b>5) - </b>Enter a maximum ceiling of deactivation.<br /><br />

<b><font color="red">Caution: You must save the login Klik Pay and your merchant key,<br />before entering the urls on the Klik Pay site, the links below work!  </font></b><br /><br />

<b>6) - </b>Enter the accepted transaction URL. (in the admin Klik Pay, in setting up the account, then 
<a href="https://www.klikandpay.com/marchands/index.cgi?ID2='.$_SESSION['klikandpay_site'].'&w=URL&SECTION=Param" target="_blank" title="Click here to paste the url in klik & Pay"><b>Set-up</b></a>)
<b>'.HTTPS_CATALOG.'index.php?route=checkout/success</b>
<br /><br />
<b>7) - </b>Enter the URL transaction denied/cancelled. (in the admin Klik Pay, in setting up the account, then  
<a href="https://www.klikandpay.com/marchands/index.cgi?ID2='.$_SESSION['klikandpay_site'].'&w=URL&SECTION=Param" target="_blank" title="Click here to paste the url in klik & Pay"><b>Set-up</b></a>)
<b>'.HTTPS_CATALOG.'index.php?route=checkout/checkout</b>
<br /><br />
<b>8) - </b>Enter the URL of the dynamic return. (in the admin Klik Pay, in setting up the account, then 
<a href="https://www.klikandpay.com/marchands/index.cgi?ID2='.$_SESSION['klikandpay_site'].'&w=retourdynamique&SECTION=Param" target="_blank" title="Click here to paste the url in klik & Pay"><b>Dynamic Return</b></a>)
<b>'.HTTPS_CATALOG.'index.php?route=extension/payment/klikandpay/klik_pay_retour&'.$_SESSION['klikandpay_key'].'=</b>
<br /><br />
<b>9) - </b>Before the production, you need to perform 1 or 2 tests accepted payment. <br />
<b>(for these tests you must test with a test card only.)</b> 
<br />
Test Cards:<br />
<b>Type of card :	Visa</b><br />
No. :	4012888888881881<br />
CVV :	111<br />
Date d’expiration :	Any future date<br />
<b>Type of card :	Mastercard</b><br />
No. :	5555555555554444<br />
CVV : 	111<br />
Date d’expiration :	Any future date<br />
<br />
<b>10) - </b>
Once the 2 tests are conclusive accepted payment, requested by Klik Pay,<br /> 
you must put in production, in the Klik Pay account setup.<br /> 
(in the admin Klik Pay, in the account setup, then TEST / PRODUCTION)<br />
To switch to production mode, simply click on the  button<b>
<a href="https://www.klikandpay.com/marchands/index.cgi?ID2='.$_SESSION['klikandpay_site'].'&w=status&SECTION=Param" target="_blank" title="Click here, for go to production mode"><b>[Go to PRODUCTION mode]</b></a>
.<br /><br /> 

<b>Installation is complete.</b></big><br />';

$_['text_about']					= '
<img src="view/image/payment/klikandpay_logo.png" title="KlikAndPay logo" style=" width: 400px;">
<big>
		<div class="information left"><b>	   
		    Klik & Pay is a comprehensive solution to secure payment available on PC, tablet or Smartphone.</b><br /><br />
		    Partner banks and international purchasers, Klik Pay accompanies its merchants for 15 years, in France, in Europe and throughout the world.
		</div><br />

		<div >Our customers recommend us to:<br />
		    - Complete our solution without the need of VAD  contract<br />
		    - Competitive pricing, free of charge subscription or installation<br />
		    - An anti-fraud control associated with an account with or without 3D Secure<br />
		    - Our service client multilingual can be reached by phone or by mail<br />
		    - Our advice to develop their business, accompany abroad.<br />
<br />	    
		<div class="information left">To open an account, follow this link: <a target="_BLANK" href="https://www.klikandpay.com/cgi-bin/inscription.pl"><b>https://www.klikandpay.com/cgi-bin/inscription.pl</b></a> or send an email to <a href="mailto:market@klikandpay.com"><b>market@klikandpay.com</b></a></div>
<br /><b>
		<div class="information left">If you already have a merchant account Pay Klik, you can directly go to the settings of this module.</div>
<br /></b>
		<div style="font-size: 10px; margin: 0; padding: 0;">Payment institution authorised CSSF n°15/14 at the Luxembourg exercising free delivery Service (LPS) in France.</div>
</big>';

$_['text_infos']			= '<font color=blue><b><i>All the necessary information is in email or / and correspondence sent to you by Klik and Pay. </i></b></font>';
$_['text_author']		   	= 'Designed and Powered By <a href="http://www.hosteco.fr" target="_blank"><b>Hosteco.fr</b></a> &copy; 2010-2018 - All rights reserved';

// Entry
$_['entry_open']         = 'Account opening:';
$_['entry_site']         = 'Site ID:';
$_['entry_test']         = 'Test Mode:';
$_['entry_merchant_key'] = 'Merchant key:';
$_['entry_seuil_pay']		 = 'minimum amount:';
$_['entry_plafon_pay']	 = 'Maximum amount:';
$_['entry_order_status'] = 'Order Status:';
$_['entry_geo_zone']     = 'Geo Zone:';
$_['entry_status']       = 'Status:';
$_['entry_sort_order']   = 'Sort Order:';

// Tabs
$_['tab_general']							= 'Configuration - Open Account';
$_['tab_help']								= 'Setup help';
$_['tab_about']								= 'About';

// Error
$_['error_permission']   = 'WARNING: You are not authorized to modify the payment <b>Klik and Pay</b>!';
$_['error_site']         = 'Site ID Requires!'; 
$_['error_merchant_key'] = 'Merchant key Requires!'; 
$_['error_seuil']				 = 'minimum amount required !'; 
$_['error_plafond']	     = 'Maximum amount required !'; 
?>
