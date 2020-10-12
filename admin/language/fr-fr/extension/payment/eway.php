<?php
//////////////////////////////////////
//									//
// Opencart France					//
// http://www.opencart-france.fr	//
// Traduit par LeorLindel			//
// Exclusivité d’Opencart France 	//
//									//
//////////////////////////////////////

// Heading
$_['heading_title']					= 'eWAY';

// Text
$_['text_extension']				= 'Extensions';
$_['text_success']					= 'Félicitations, vous avez modifié le module de paiement eWAY avec succès !';
$_['text_edit']                     = 'Éditer le module de paiement eWAY';
$_['text_eway']						= '<a target="_BLANK" href="http://www.eway.com.au/"><img src="view/image/payment/eway.png" alt="eWAY" title="eWAY" style="border: 1px solid #EEEEEE;" /></a>';
$_['text_authorisation']			= 'Autorisation';
$_['text_sale']						= 'Vente';
$_['text_transparent']				= 'Redirection transparente (formulaire de paiement dans la page)';
$_['text_iframe']					= 'IFrame (formulaire de paiement dans une fenêtre)';

// Entry
$_['entry_paymode']					= 'Mode de paiement';
$_['entry_test']					= 'Mode de test';
$_['entry_order_status']			= 'État de la commande';
$_['entry_order_status_refund']		= 'État de la commande "Remboursé"';
$_['entry_order_status_auth']		= 'État de la commande "Autorisé"';
$_['entry_order_status_fraud']		= 'État de la commande "Fraude suspectée"';
$_['entry_status']					= 'État';
$_['entry_username']				= 'Clé API eWAY';
$_['entry_password']				= 'Mot de passe eWAY';
$_['entry_payment_type']			= 'Type de paiement';
$_['entry_geo_zone']				= 'Zone géographique';
$_['entry_sort_order']				= 'Classement';
$_['entry_transaction_method']		= 'Mode de transaction';

// Error
$_['error_permission']				= 'Attention, vous n¹avez pas la permission de modifier le module de paiement eWAY';
$_['error_username']				= 'La clé de l’API eWAY API est requise !';
$_['error_password']				= 'Le mot de passe eWAY est requis !';
$_['error_payment_type']			= 'Au moins un type de paiement est requis !';

// Help hints
$_['help_testmode']					= 'Réglez sur Oui pour utiliser le Sandbox eWAY.';
$_['help_username']					= 'Clé API de votre compte eWAY.';
$_['help_password']					= 'Mot de passe API de votre compte eWAY.';
$_['help_transaction_method']		= 'Autorisation disponible uniquement pour les banques australiennes';

// Order page - payment tab
$_['text_payment_info']				= 'Information paiement';
$_['text_order_total']				= 'Total autorisé';
$_['text_transactions']				= 'Transactions';
$_['text_column_transactionid']		= 'Identifiant de la transaction eWAY';
$_['text_column_amount']			= 'Montant';
$_['text_column_type']				= 'Type';
$_['text_column_created']			= 'Créé';
$_['text_total_captured']			= 'Total capturé';
$_['text_capture_status']			= 'Paiement capturé';
$_['text_void_status']				= 'Paiement voided';
$_['text_refund_status']			= 'Paiement remboursé';
$_['text_total_refunded']			= 'Total remboursé';
$_['text_refund_success']			= 'Remboursement réussi !';
$_['text_capture_success']			= 'Capture réussie !';
$_['text_refund_failed']			= 'Remboursement failed: ';
$_['text_capture_failed']			= 'Capture échoué: ';
$_['text_unknown_failure']			= 'Montant ou commande invalide';
$_['text_confirm_capture']			= 'Êtes-vous sûr de vouloir capturer le paiement ?';
$_['text_confirm_release']			= 'Êtes-vous sûr de vouloir libérer le paiement ?';
$_['text_confirm_refund']			= 'Êtes-vous sûr de vouloir rembourser le paiement ?';
$_['text_empty_refund']				= 'Veuillez entrer un montant à rembourser';
$_['text_empty_capture']			= 'Veuillez entrer un montant à capturer';
$_['btn_refund']					= 'Remboursement';
$_['btn_capture']					= 'Capture';

// Validation Error codes
$_['text_card_message_V6000']		= 'Erreur de validation non définie';
$_['text_card_message_V6001'] 		= 'L’IP client est invalide';
$_['text_card_message_V6002'] 		= 'Identifiant périphérique Invalide';
$_['text_card_message_V6011'] 		= 'Le montant est invalide';
$_['text_card_message_V6012'] 		= 'La description de la facture est invalide';
$_['text_card_message_V6013'] 		= 'Le numéro de facture est invalide';
$_['text_card_message_V6014'] 		= 'La référence de la facture est invalide';
$_['text_card_message_V6015'] 		= 'Le code devise est invalide';
$_['text_card_message_V6016'] 		= 'Le paiement est requis';
$_['text_card_message_V6017'] 		= 'Le code devise du paiement est requis';
$_['text_card_message_V6018'] 		= 'Code devise de paiement inconnu';
$_['text_card_message_V6021'] 		= 'Le Nom du titulaire est requis';
$_['text_card_message_V6022'] 		= 'Le numéro de carte est requis';
$_['text_card_message_V6023'] 		= 'Le CVN est requis';
$_['text_card_message_V6031'] 		= 'Le numéro de carte est invalide';
$_['text_card_message_V6032'] 		= 'Le CVN est invalide';
$_['text_card_message_V6033'] 		= 'La date d’expiration est invalide';
$_['text_card_message_V6034'] 		= 'Le numéro d’édition est invalide';
$_['text_card_message_V6035'] 		= 'La date de début est invalide';
$_['text_card_message_V6036'] 		= 'Le mois est invalide';
$_['text_card_message_V6037'] 		= 'L’année est invalide';
$_['text_card_message_V6040'] 		= 'L’identifiant du jeton client est invalide';
$_['text_card_message_V6041'] 		= 'Le client est requis';
$_['text_card_message_V6042'] 		= 'Le prénom du client est requis';
$_['text_card_message_V6043'] 		= 'Le nom du client est requis';
$_['text_card_message_V6044'] 		= 'Le code pays du client est requis';
$_['text_card_message_V6045'] 		= 'Le titre du client est requis';
$_['text_card_message_V6046'] 		= 'L’identifiant du jeton client est requis';
$_['text_card_message_V6047'] 		= 'La redirection d’URL est requise';
$_['text_card_message_V6051'] 		= 'Le prénom est invalide';
$_['text_card_message_V6052'] 		= 'Le nom est invalide';
$_['text_card_message_V6053'] 		= 'Le code pays est invalide';
$_['text_card_message_V6054'] 		= 'L’adresse courriel est invalide';
$_['text_card_message_V6055'] 		= 'Le téléphone est invalide';
$_['text_card_message_V6056'] 		= 'Le mobile est invalide';
$_['text_card_message_V6057'] 		= 'Le fax est invalide';
$_['text_card_message_V6058'] 		= 'Le titre est invalide';
$_['text_card_message_V6059'] 		= 'La redirection URL est invalide';
$_['text_card_message_V6060'] 		= 'La redirection URL est invalide';
$_['text_card_message_V6061'] 		= 'La référence est invalide';
$_['text_card_message_V6062'] 		= 'Le nom de société est invalide';
$_['text_card_message_V6063'] 		= 'La description du métier est invalide';
$_['text_card_message_V6064'] 		= 'L’adresse est invalide';
$_['text_card_message_V6065'] 		= 'Le complément d’adresse est invalide';
$_['text_card_message_V6066'] 		= 'La ville est invalide';
$_['text_card_message_V6067'] 		= 'L’état ou département est invalide';
$_['text_card_message_V6068'] 		= 'Le code postal est invalide';
$_['text_card_message_V6069'] 		= 'L’adresse courriel est invalide';
$_['text_card_message_V6070'] 		= 'Le téléphone est invalide';
$_['text_card_message_V6071'] 		= 'Le mobile est invalide';
$_['text_card_message_V6072'] 		= 'Le commentaire est invalide';
$_['text_card_message_V6073'] 		= 'Le fax est invalide';
$_['text_card_message_V6074'] 		= 'L’Url est invalide';
$_['text_card_message_V6075'] 		= 'Le prénom dans l’adresse de livraison est invalide';
$_['text_card_message_V6076'] 		= 'Le nom dans l’adresse de livraison est invalide';
$_['text_card_message_V6077'] 		= 'L’adresse dans l’adresse de livraison est invalide';
$_['text_card_message_V6078'] 		= 'Le complément d’adresse dans l’adresse de livraison est invalide';
$_['text_card_message_V6079'] 		= 'La ville dans l’adresse de livraison invalide';
$_['text_card_message_V6080'] 		= 'L’état ou département dans l’adresse de livraison est invalide';
$_['text_card_message_V6081'] 		= 'Le code postal dans l’adresse de livraison est invalide';
$_['text_card_message_V6082'] 		= 'L’adresse courriel dans l’adresse de livraison est invalide';
$_['text_card_message_V6083'] 		= 'Le téléphone dans l’adresse de livraison est invalide';
$_['text_card_message_V6084'] 		= 'Le pays dans l’adresse de livraison est invalide';
$_['text_card_message_V6091'] 		= 'Le code pays est inconnu';
$_['text_card_message_V6100'] 		= 'Le nom de la carte est invalide';
$_['text_card_message_V6101'] 		= 'Le mois d’expiration de la carte est invalide';
$_['text_card_message_V6102'] 		= 'L’année d’expiration de la carte est invalide';
$_['text_card_message_V6103'] 		= 'Le mois de début de la carte est invalide';
$_['text_card_message_V6104'] 		= 'L’année de début de la carte est invalide';
$_['text_card_message_V6105'] 		= 'Le numéro d’édition de la carte est invalide ';
$_['text_card_message_V6106'] 		= 'Le CVN de la carte est invalide';
$_['text_card_message_V6107'] 		= 'Le code d’accès est invalide';
$_['text_card_message_V6108'] 		= 'L’adresse de l’hôte client est invalide';
$_['text_card_message_V6109'] 		= 'L’agent utilisateur est invalide';
$_['text_card_message_V6110'] 		= 'Le numéro de la carte est invalide';
$_['text_card_message_V6111'] 		= 'Accès API non autorisée, compte non certifié PCI';
$_['text_card_message_V6112'] 		= 'Détails redondants de la carte autres que l’année d’expiration et le mois';
$_['text_card_message_V6113'] 		= 'La transaction pour le remboursement est invalide';
$_['text_card_message_V6114'] 		= 'Erreur de validation de la passerelle';
$_['text_card_message_V6115'] 		= 'La demande de remboursement est invalide, identifiant de la transaction';
$_['text_card_message_V6116'] 		= 'Les données de la carte sont invalides sur l’identifiant de la transaction originale';
$_['text_card_message_V6124'] 		= 'La ligne des articles est invalide. Les éléments de ligne ont été fournis mais les totaux ne correspondent pas au champ "Montant total"';
$_['text_card_message_V6125'] 		= 'Le type n’est pas activé pour le paiement sélectionné';
$_['text_card_message_V6126'] 		= 'Le numéro de carte crypté est invalide, le décryptage a échoué';
$_['text_card_message_V6127'] 		= 'Le CVN crypté est invalide, le décryptage a échoué';
$_['text_card_message_V6128'] 		= 'Le type pour le mode de paiement est invalide';
$_['text_card_message_V6129'] 		= 'La transaction n’a pas été autorisée pour la capture ou l’annulation';
$_['text_card_message_V6130'] 		= 'Erreur d’information pour le client générique';
$_['text_card_message_V6131'] 		= 'Erreur d’information pour la livraison générique';
$_['text_card_message_V6132'] 		= 'La transaction a déjà été complétée ou annulée, le fonctionnement n’est pas autorisé';
$_['text_card_message_V6133'] 		= 'Commander n’est pas disponible pour ce type de paiement';
$_['text_card_message_V6134'] 		= 'L’identifiant d’autorisation de la transaction est invalide pour la capture ou l’annulation';
$_['text_card_message_V6135'] 		= 'Erreur Paypal dans le traitement du remboursement';
$_['text_card_message_V6140'] 		= 'Le compte marchand est suspendu';
$_['text_card_message_V6141'] 		= 'Les détails du compte Paypal ou la signature de l’API sont invalide';
$_['text_card_message_V6142'] 		= 'La fonction "Autoriser" n’est pas disponible pour la banque';
$_['text_card_message_V6150'] 		= 'Le montant du remboursement est invalide';
$_['text_card_message_V6151'] 		= 'Le montant du remboursement est supérieur à la transaction d’origine';
$_['text_card_message_D4406'] 		= 'Erreur inconnue';
$_['text_card_message_S5010'] 		= 'Erreur inconnue';
?>