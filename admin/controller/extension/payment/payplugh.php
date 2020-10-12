<?php 
// Copyright (c) 2013-2018 Cee Agency pour hosteco.fr
// All rights reserved. ---

ini_set('display_errors', 'off');
ini_set('display_startup_errors','off');

class ControllerExtensionPaymentPayplugh extends Controller {
	private $error = array(); 

	private $payplug_verif2 = '
  abiGhtEXy7vZOtEJkc9BanfLQyrGmRpIORsMsH9+s7i9zuCAO76RQtCVst8NQtTPzgXBanpMCbjBmxqZCbNMUH9+h70JsREPeg6PsywLa7pIORsMs80Jht8EaHZJkKoSCykBkK5Zy8pvjEsvjEXKxvfjjv0kg8pjkE92kbERzbESU7i9zuf9QbESeg6Hsyv8syp9eg6TO4p9tHCEOtvMOv0AsRUPyxZMDHfEOtvMOvqBmxqZCbNMUH9+URiYCtiSCu9+Ub0SCvXPst8NQtYVh7sPa892VxoEOnpEknXZst8NQtYwkc9Ba76AaSG0kbERzbESU7i9zuf9QbESeg6Hsyv8syp9eg6TO4p9tHCEOtvMOv0AsRC9a89MzyXZst8NQtYjkc9BanfLQyrGmPaEUyiEU4wGmPoIU4fOa7iGhtEXy7pRs4wPygG0kbiXU7jBDHfEOtvMOvwBmxqPORrPl49BadEwjHq0kufVj9ixiZixtHagfiatfiaVwjfdjKaClHqZxiqBmxqZy8pvjEsvjEXKjZipg8fvy9vdfvkKygXBab8NURpLht69kc9BkKotsyaSQt0Jkd0Tst6Ahya9lKqKku6tfiagxj0leKqKyb5KeKqZCbNMUH9+h70JsREPeg6PsywLa7pIORsMs80IC76EUKUMku5Kyb5KeKqZCbNMUH9+h70JsREPeg6PsywLa7pIORsMs80NsbfHsypSaHZBeKaUOKkJkuf9QbESeg6AO76RQtUGmRCECuBPh70JsREPy4fEObiTQb0JsxUMku5Kyb6UOKkJkuf9QbESeg6AO76RQtUGmRCECuBPh70JsREPy4fMCbYEaHZBeKaUOKkJkuf9QbESeg6AO76RQtUGmRCECuBPh70JsREPy78ECbvVsbiSh4aMUnfMO75Pzx5BkEYJyb6vOtvMOuowhyEwOniPkvoHO7f8h4fMO753kukJkufEOtvMOvqJkuaUOEYJft8NQtTBjbv6jbY8sHojfipjlKqKeKqZst8NQtYjeKqKyb6UOZiGhtEXkdaICyfMUyiElKqKeKqZCbNMUH9+h70JsREPeg6PsywLa7pIORsMs80EOtvMOuUMkcXzabNEhtfEUPrBmxqKw70JCbiJCu8jURvJU7sEUK8vORpIsbEJsSLBlbaMCvYHyb5KlHqzabNEhtfEUPrBeA9BkZ8agjjGiRiHU7EIOALBrx5TynaUOKk2kqLZQbiNsbiHUHqJmxqKw70JCbiJCu8jDyoElKo9syN9lHoAQbvHU7i9myi9sK95ynaUOKk2kqLZQbiNsbiHUHqJmxqKfPaIOgMuO4i9Qyv8sxqZU7E9sgTZst8NQtYVhtfGQt5+kAXBuR8NQtTLkPoNDyoXCtCqQb0SCu8Eh71JsPkKeuatfiaafKouO4i9Qyv8sgLBanpMCbjBexopO7f8ObjBjbv6jbY8sHo7rx5SknoICykBO7rBCArJDukXkEsvjZEbkd8IsniXsxowhyEwOniPknhYeArBUb08UKoIhHo7rH65kdaICyfMUyiElKoUOZETkvpEUPsECyk3kufajvrByb6aUuophyaAQbvJCcLBadEwkvYJyb5ZU7E9sxoUOKfGhyaAQbvJCukXabNEhtfEUPrMlHqzeH1Bw70TDyaMs7N9kuNAzxqHrcdSegd5kdpvfxoos7iJh4ZBUb08UKoLO4p9stpIeRsHku1IkdvXOuoHQtCLCnrBURiSsya7stwJkq==';

	private $payplug_init2 = '
	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';
  
	public function index() {
	
		$module = 'payplugh';
 
		$this->load->language('extension/payment/payplugh');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
			
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
  	$this->model_setting_setting->editSetting('payment_payplugh', $this->request->post);
 			
			$this->session->data['success'] = $this->language->get('text_success');

		$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));

		}		
		
		$CURL_SSLVERSION = 0;
		$payplug_vrifix = ($this->lect_payplug($this->payplug_verif2));
		$payplug_initx = ($this->lect_payplug($this->payplug_init2));
				
		$data['action_cfg'] = $_SERVER["REQUEST_URI"];
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_authorization'] = $this->language->get('text_authorization');
		$data['text_sale'] = $this->language->get('text_sale');
		$data['text_edit'] = $this->language->get('text_edit');				
		$data['text_test_ok'] = $this->language->get('text_test_ok');		
		$data['text_test_no'] = $this->language->get('text_test_no');		
    		
		$data['text_cadre_cfg'] = $this->language->get('text_cadre_cfg');
		$data['text_enter_cfg'] = $this->language->get('text_enter_cfg');
		$data['text_email_cfg'] = $this->language->get('text_email_cfg');
		$data['text_pwd_cfg'] = $this->language->get('text_pwd_cfg');
 		$data['button_charge_cfg'] = $this->language->get('button_charge_cfg');
		$data['text_infos_cfg'] = base64_decode($this->language->get('text_infos_cfg'));
 		$data['text_install_ok'] = $this->language->get('text_install_ok');
		$data['text_install_nc'] = $this->language->get('text_install_nc');		
		$data['text_amount_min'] = $this->language->get('text_amount_min');     
		$data['text_amount_max'] = $this->language->get('text_amount_max');                    		
		$data['text_credit'] = base64_decode($this->language->get('text_credit'));                    		

		$data['entry_cfg_site'] = $this->language->get('entry_cfg_site');
		$data['entry_test'] = $this->language->get('entry_test');
		$data['entry_amount_min'] = $this->language->get('entry_amount_min');		
		$data['entry_amount_max'] = $this->language->get('entry_amount_max');		
		$data['entry_order_status'] = $this->language->get('entry_order_status');	
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['button_charge_cfg'] = $this->language->get('button_charge_cfg');
		$data['button_charge_cfgt'] = $this->language->get('button_charge_cfgt');		

		@eval($payplug_vrifix);
 		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
 		if (isset($this->error['cfg_site'])) {
			$data['error_cfg_site'] = $this->error['cfg_site'];
		} else {
			$data['error_cfg_site'] = '';
		}

		if (isset($this->error['montant_mini'])) { 
			$data['error_amount_min'] = $this->error['montant_mini'];
		} else {
			$data['error_amount_min'] = '';
		}

		if (isset($this->error['montant_maxi'])) { 
			$data['error_amount_max'] = $this->error['montant_maxi'];
		} else {
			$data['error_amount_max'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_payment'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_edit'),
			'href' => $this->url->link('extension/payment/'.$module, 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/payment/'.$module, 'user_token=' . $this->session->data['user_token'], true);
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true);

    $configUrl = 'https://www.payplug.fr/portal/ecommerce/autoconfig';
    $cfgUrltest = 'https://www.payplug.fr/portal/test/ecommerce/autoconfig';

    eval($payplug_initx);

		if (isset($this->request->post['payment_payplugh_cfg_site'])) {		
			$data['payment_payplugh_cfg_site'] = $this->request->post['payment_payplugh_cfg_site'];
		} else {
			$data['payment_payplugh_cfg_site'] = $this->config->get('payment_payplugh_cfg_site');
		}

		if (isset($this->request->post['payment_payplugh_amount_min'])) {
			$data['payment_payplugh_amount_min'] = $this->request->post['payment_payplugh_amount_min'];
		} else {
			$data['payment_payplugh_amount_min'] = $this->config->get('payment_payplugh_amount_min');
		}

		if (isset($this->request->post['payment_payplugh_amount_max'])) {
			$data['payment_payplugh_amount_max'] = $this->request->post['payment_payplugh_amount_max'];
		} else {
			$data['payment_payplugh_amount_max'] = $this->config->get('payment_payplugh_amount_max');
		}

		if (isset($this->request->post['payment_payplugh_test'])) {
			$data['payment_payplugh_test'] = $this->request->post['payment_payplugh_test'];
		} else {
			$data['payment_payplugh_test'] = $this->config->get('payment_payplugh_test');
		}
		
		if (isset($this->request->post['payment_payplugh_transaction'])) {
			$data['payment_payplugh_transaction'] = $this->request->post['payment_payplugh_transaction'];
		} else {
			$data['payment_payplugh_transaction'] = $this->config->get('payment_payplugh_transaction');
		}
		
		if (isset($this->request->post['payment_payplugh_order_status_id'])) {
			$data['payment_payplugh_order_status_id'] = $this->request->post['payment_payplugh_order_status_id'];
		} else {
			$data['payment_payplugh_order_status_id'] = $this->config->get('payment_payplugh_order_status_id'); 
		} 

		$this->load->model('localisation/order_status');
		
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		if (isset($this->request->post['payment_payplugh_geo_zone_id'])) {
			$data['payment_payplugh_geo_zone_id'] = $this->request->post['payment_payplugh_geo_zone_id'];
		} else {
			$data['payment_payplugh_geo_zone_id'] = $this->config->get('payment_payplugh_geo_zone_id'); 
		} 
		
		$this->load->model('localisation/geo_zone');
										
		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		if (isset($this->request->post['payment_payplugh_status'])) {
			$data['payment_payplugh_status'] = $this->request->post['payment_payplugh_status'];
		} else {
			$data['payment_payplugh_status'] = $this->config->get('payment_payplugh_status');
		}
		
		if (isset($this->request->post['payment_payplugh_sort_order'])) {
			$data['payment_payplugh_sort_order'] = $this->request->post['payment_payplugh_sort_order'];
		} else {
			$data['payment_payplugh_sort_order'] = $this->config->get('payment_payplugh_sort_order');
		}
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/payment/payplugh', $data));
  }

	private function validate() {
		if (!$this->user->hasPermission('modify', 'extension/payment/payplugh')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (isset($_SESSION['errCurlMsg'])) {//if ($_SESSION['errCurlMsg'] != '') {
    if (!$this->request->post['payment_payplugh_cfg_site']) {
			$this->error['cfg_site'] = $this->language->get('text_error_cfg')."<br />".$_SESSION['errCurlMsg'];
		}	}	else {
				if (!$this->request->post['payment_payplugh_cfg_site']) {
			$this->error['cfg_site'] = $this->language->get('error_cfg_site');
		}	}

		if (!$this->request->post['payment_payplugh_amount_min']) {
			$this->error['montant_mini'] = $this->language->get('error_amount_min');
		}

		if (!$this->request->post['payment_payplugh_amount_max']) {
			$this->error['montant_maxi'] = $this->language->get('error_amount_max');
		}
		
		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}	
	}
	
  private function secu_plus($chaine){
  $replac = "AZERTYUIOPQSDFGHJKLMWXCVBNazertyuiopqsdfghjklmwxcvbn0123456789";
  $depart = "qsdfghjklmwxcvbnazertyuiopQSDFGHJKLMWXCVBNAZERTYUIOP9874563210";
  $mt_secu =(strtr($chaine,$depart,$replac));
  return $mt_secu;
  }
 
  private	function lect_payplug($payplug_secu) {
  $payplug_secu = base64_decode($this->secu_plus($payplug_secu));
  return $payplug_secu;
  }	
  
}
// Copyright (c) 2013-2018 Cee Agency pour hosteco.fr
// All rights reserved. ---
?>
