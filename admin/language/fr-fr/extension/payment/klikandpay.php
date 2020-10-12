<?php
if(!isset($_SESSION['klikandpay_site'])) {$_SESSION['klikandpay_site'] = '';}
if(!isset($_SESSION['klikandpay_key'])) {$_SESSION['klikandpay_key'] ='';}
// Heading
$_['heading_title']  = 'Klik and Pay v3.x (Carte Bancaire)<a style="cursor:help;font-weight:normal;font-size:12px;text-decoration:none;" href="http://www.hosteco.fr" target="_blank" title="allez sur le site de l\'&eacute;diteur"> &nbsp; - &nbsp; Par hosteco.fr &copy; 2010 - 2018 </a> - Tarif : à partir de <b>1.2% + 0.3€</b> par transaction.';

// Text 
$_['text_payment']       = 'Payment';
$_['text_edit']          = 'Modifier Klik & Pay Paiement (Carte Bancaire)';
$_['text_success']       = 'Succ&egrave;s : Vous avez modifi&eacute; les d&eacute;tails du compte klikandpay !';
$_['text_klikandpay']    = '<img src="view/image/payment/klikandpay.gif" width="90" height="30" alt=" Klik and Pay " title=" Klik and Pay" style="border: 0px solid #EEEEEE;" />
<br><a href="https://www.klikandpay.com/marchands/index.cgi" target="_blank" title="Consulter les paiements op&eacute;r&eacute;s sur votre Compte"><b>Administration Commer&ccedil;ant</b></a>';

$_['text_site']					= ' &nbsp;&nbsp;(Fourni par Klik & Pay.)';
$_['text_key']					= ' &nbsp;&nbsp;(Vous devez entrer que des chiffres et des lettres.)';
$_['text_open']					= '
		<div class="information left">Pour ouvrir un compte, suivez ce lien: <a target="_BLANK" href="https://www.klikandpay.com/cgi-bin/inscription.pl"><b>https://www.klikandpay.com/cgi-bin/inscription.pl</b></a> ou envoyez nous un email à <a href="mailto:market@klikandpay.com"><b>market@klikandpay.com</b></a></div>
<br />
		<div class="information left"><font color=blue><big><b>Si vous avez déjà un compte marchand Klik & Pay, vous pouvez directement passer au paramétrage ci-dessous.</b></big></font></div>
<br />
';
$_['text_help']					= '<h1>Procédure d\'installation</h1><br /><big>
<b>1) - </b>Choisir l\'État Activé, pour Activer le module.<br /><br />
<b>2) - </b>Entrer l\'Identifiant Site. <i>(fourni par Klik & Pay)<br /><br />
<b>3) - </b>Entrer votre clé commerçant. <i>(choisi automatiquement et aléatoirement par votre site)</i><br /><br />
<b>4) - </b>Entrer un seuil minimal d\'activation.<br /><br />
<b>5) - </b>Entrer un plafond maximal de désactivation.<br /><br />

<b><font color="red">ATTETION: Vous devez sauvegarder l\'dentifiant Klik & Pay et votre clé commerçant,<br />avant d\'entrer les urls sur le site Klik & Pay, pour que les liens ci-dessous fonctionnent !</font></b><br /><br />

<b>6) - </b>Entrez l\'URL transaction acceptée. (dans l\'admin Klik & Pay, dans Paramétrage du compte, puis 
<a href="https://www.klikandpay.com/marchands/index.cgi?ID2='.$_SESSION['klikandpay_site'].'&w=URL&SECTION=Param" target="_blank" title="Cliquez ici, pour coller l\'url dans klik & Pay"><b>Paramétrage</b></a>)
<b>'.HTTPS_CATALOG.'index.php?route=checkout/success</b>
<br /><br />
<b>7) - </b>Entrez l\'URL transaction refusée/annulée. (dans l\'admin Klik & Pay, dans Paramétrage du compte, puis 
<a href="https://www.klikandpay.com/marchands/index.cgi?ID2='.$_SESSION['klikandpay_site'].'&w=URL&SECTION=Param" target="_blank" title="Cliquez ici, pour coller l\'url dans klik & Pay"><b>Paramétrage</b></a>)
<b>'.HTTPS_CATALOG.'index.php?route=checkout/checkout</b>
<br /><br />
<b>8) - </b>Entrez l\'URL de Retour dynamique. (dans l\'admin Klik & Pay, dans Paramétrage du compte, puis 
<a href="https://www.klikandpay.com/marchands/index.cgi?ID2='.$_SESSION['klikandpay_site'].'&w=retourdynamique&SECTION=Param" target="_blank" title="Cliquez ici, pour coller l\'url dans klik & Pay"><b>Retour Dynamique</b></a>)
<b>'.HTTPS_CATALOG.'index.php?route=extension/payment/klikandpay/klik_pay_retour&'.$_SESSION['klikandpay_key'].'=</b>
<br /><br />
<b>9) - </b>Avant la mise en production, vous devez effectuer 1 ou 2 essais de paiement accepté.<br />
<b>(pour ces essais vous devez être en mode test avec une carte test uniquement.)</b><br />
Cartes de test :
<br />
<b>Type de carte :	Visa</b><br />
Numéro :	4012888888881881<br />
CVV :	111<br />
Date d’expiration :	N’importe quelle date future<br />
<b>Type de carte :	Mastercard</b><br />
Numéro :	5555555555554444<br />
CVV : 	111<br />
Date d’expiration : 	N’importe quelle date future<br />
<br />
<b>10) - </b>Une fois que les 2 essais sont concluants de paiement accepté, demandés par Klik & Pay,<br />
Vous devez faire la mise en production, dans l\'admin Klik & Pay.<br />
(dans l\'admin Klik & Pay, dans Paramétrage du compte, puis TEST / PRODUCTION)<br />
Pour passer en mode production, il suffit de cliquer sur le bouton <b>
<a href="https://www.klikandpay.com/marchands/index.cgi?ID2='.$_SESSION['klikandpay_site'].'&w=status&SECTION=Param" target="_blank" title="Cliquez ici, pour passer en mode production"><b>[Passer en mode PRODUCTION]</b></a>
.<br /><br /> 

<b>L\'installation est terminée.</b></big><br />';

$_['text_about']					= '
<img src="view/image/payment/klikandpay_logo.png" title="KlikAndPay logo" style=" width: 400px;">
<big>
		<div class="information left"><b>	   
		    Klik & Pay est une solution globale de paiement sécurisé accessible sur PC, Tablette ou Smartphone.</b><br /><br />
		    Partenaire de banques et d’acquéreurs internationaux, Klik &amp; Pay accompagne ses marchands depuis 15 ans, en France, en Europe et partout dans le monde.
		</div><br />

		<div >Nos clients nous recommandent pour :<br />
		    - Notre solution complète sans avoir besoin de contrat VAD<br />
		    - Une tarification compétitive, sans frais d’abonnement ou d’installation<br />
		    - Un contrôle anti-fraude associé à un compte avec ou sans 3D Secure<br />
		    - Notre service client multilingue joignable par téléphone ou par mail<br />
		    - Nos conseils pour développer leur activité, les accompagner à l’international.<br />
<br />	    
		<div class="information left">Pour ouvrir un compte, suivez ce lien: <a target="_BLANK" href="https://www.klikandpay.com/cgi-bin/inscription.pl"><b>https://www.klikandpay.com/cgi-bin/inscription.pl</b></a> ou envoyez nous un email à <a href="mailto:market@klikandpay.com"><b>market@klikandpay.com</b></a></div>
<br /><b>
		<div class="information left">Si vous avez déjà un compte marchand Klik & Pay, vous pouvez directement passer au paramétrage de ce module.</div>
<br /></b>
		<div style="font-size: 10px; margin: 0; padding: 0;">Établissement de Paiement agrée CSSF n°15/14 au Luxembourg exerçant en Libre Prestation de Service (LPS) en France</div>
</big>';

$_['text_infos']							= '<font color=blue><b><i>Toutes les informations nécessaires sont sur le site Kilk & Pay, dans les courriels ou/et courriers que Kilk & Pay vous a envoyés.</i></b></font>';
$_['text_author']							= 'Réalisé et Propulsé Par <a href="http://www.hosteco.fr" target="_blank"><b>Hosteco.fr</b></a> &copy; 2010-2018 - Tous droits réservés';


// Entry
$_['entry_open']         = 'Ouverture de compte:';
$_['entry_site']         = 'Identifiant Site:';
$_['entry_test']         = 'Mode Test:';
$_['entry_merchant_key'] = 'Clé commerçant:';
$_['entry_seuil_pay']	 	 = 'Seuil minimum d\'activation du paiement en (Euro)';
$_['entry_plafon_pay']	 = 'Seuil maximum de d&eacute;sactivation du paiement en (Euro)';
$_['entry_order_status'] = 'Status Commande:';
$_['entry_geo_zone']     = 'Zone G&eacute;ographique:';
$_['entry_status']       = 'Statut:';
$_['entry_sort_order']   = 'Ordre Choix:';

// Tabs
$_['tab_general']							= 'Configuration - Ouvrir un compte';
$_['tab_help']								= 'Aide à l\'installation';
$_['tab_about']								= 'A Propos de';

// Error
$_['error_permission']   = 'AVERTISSEMENT : Vous n\'&ecirc;tes pas autoris&eacute; &agrave; modifier le paiement <b>Klik and Pay</b>!';
$_['error_site']         = 'Nécessite l\'identifiant du site !'; 
$_['error_merchant_key'] = 'Nécessite la Clé commerçant !'; 
$_['error_seuil']        = 'Le <b>seuil minimum</b> est requis !'; 
$_['error_plafond']      = 'Le <b>plafond maximum</b> est requis !'; 
?>
