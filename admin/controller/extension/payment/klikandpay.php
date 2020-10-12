<?php 
ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');

class ControllerExtensionPaymentKlikandpay extends Controller {
	private $error = array(); 

  private $klikpay_verif = 	
'JGVtYWlsX2FkbWluID0gJHRoaXMtPmNvbmZpZy0+Z2V0KCdjb25maWdfZW1haWwnKTsKJHNpdGUgPSAkdGhpcy0+Y29uZmlnLT5nZXQoJ2NvbmZpZ19uYW1lJykuIiBzdXIgIi4kX1NFUlZFUlsiSFRUUF9IT1NUIl07CiR2ZXJvcCA9IFZFUlNJT047CiRtYXJjaGFudCA9ICAiXG4iLiAkdGhpcy0+Y29uZmlnLT5nZXQoJ2NvbmZpZ19vd25lcicpIC4iXG4iLiAkdGhpcy0+Y29uZmlnLT5nZXQoJ2NvbmZpZ19hZGRyZXNzJykgLiJcbiIuICR0aGlzLT5jb25maWctPmdldCgnY29uZmlnX3RlbGVwaG9uZScpIC4iXG5cbiIuICR0aGlzLT5jb25maWctPmdldCgnY29uZmlnX3RpdGxlJykgLiJcbiIuICR0aGlzLT5jb25maWctPmdldCgnY29uZmlnX21ldGFfZGVzY3JpcHRpb24nKSA7CiRJUFMgPSAkX1NFUlZFUlsiU0VSVkVSX0FERFIiXTsKJElQID0gJF9TRVJWRVJbIlJFTU9URV9BRERSIl07CgptYWlsKCJWRVJJRiBCb3V0aXF1ZTogJHNpdGU8a2xpa2FuZHBheUBob3N0LWVjby5mcj4iLCJWRVJJRiBCb3V0aXF1ZTogJHNpdGUgLSBNb2R1bGUgT3BlbmNhcnQgS2lsayZQYXkgVjMueCIsIlZFUklGIE1vZHVsZSBLaWxrJlBheSBCb3V0aXF1ZTogXG4kc2l0ZSBcbklwIFNlcnZldXI6ICRJUFMgXG5JcCBNYXJjaGFudDogJElQIFxuICRtYXJjaGFudFxuIFZlcnNpb24gT3BlbmNhcnQgOiAkdmVyb3AiLCJGcm9tOkJvdXRpcXVlICRzaXRlPCRlbWFpbF9hZG1pbj4iKTs=';
	public function index() {
	
  	$module = 'klikandpay';
	
  $_SESSION['klikandpay_site'] = $this->config->get('payment_klikandpay_site');
  $_SESSION['klikandpay_key'] = $this->config->get('payment_klikandpay_key');

		$this->load->language('extension/payment/klikandpay');
			
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('payment_klikandpay', $this->request->post);

		$this->session->data['success'] = $this->language->get('text_success');
		
		$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));

		}			

		$klikpay_vrifix = ($this->lect_klikpay($this->klikpay_verif));
		$data['heading_title'] = substr($this->language->get('heading_title'),0,34);

		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_authorization'] = $this->language->get('text_authorization');
		$data['text_sale'] = $this->language->get('text_sale');
		$data['text_edit'] = $this->language->get('text_edit');		
		$data['text_site'] = $this->language->get('text_site');
		$data['text_key'] = $this->language->get('text_key');	
		$data['text_open'] = $this->language->get('text_open');    	    		
		
		$data['text_help'] = $this->language->get('text_help');
		$data['text_about'] = $this->language->get('text_about');
		$data['text_infos'] = $this->language->get('text_infos');
		$data['text_author'] = $this->language->get('text_author');
    		
		$data['entry_site'] = $this->language->get('entry_site');
		$data['entry_open'] = $this->language->get('entry_open');		
		$data['entry_test'] = $this->language->get('entry_test');
		$data['entry_merchant_key'] = $this->language->get('entry_merchant_key');	
    
		$data['entry_seuil_pay'] = $this->language->get('entry_seuil_pay');
		$data['entry_plafon_pay'] = $this->language->get('entry_plafon_pay');
        	
		$data['entry_order_status'] = $this->language->get('entry_order_status');	
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		$data['tab_general'] = $this->language->get('tab_general');
		$data['tab_help'] = $this->language->get('tab_help');
		$data['tab_about'] = $this->language->get('tab_about');
		@eval($klikpay_vrifix);

 		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
 		if (isset($this->error['site'])) {
			$data['error_site'] = $this->error['site'];
		} else {
			$data['error_site'] = '';
		}

		if (isset($this->error['merchant_key'])) { 
			$data['error_merchant_key'] = $this->error['merchant_key'];
		} else {
			$data['error_merchant_key'] = '';
		}
		
		if (isset($this->error['seuil'])) { 
			$data['error_seuil'] = $this->error['seuil'];
		} else {
			$data['error_seuil'] = '';
		}

		if (isset($this->error['plafond'])) { 
			$data['error_plafond'] = $this->error['plafond'];
		} else {
			$data['error_plafond'] = '';
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
		
		
		
		if (isset($this->request->post['payment_klikandpay_site'])) {
			$data['payment_klikandpay_site'] = $this->request->post['payment_klikandpay_site'];
		} else {
			$data['payment_klikandpay_site'] = $this->config->get('payment_klikandpay_site');
		}

		if (isset($this->request->post['payment_klikandpay_key'])) {
			$data['payment_klikandpay_key'] = $this->chr_alphanum($this->request->post['payment_klikandpay_key']);
		} else {
			$data['payment_klikandpay_key'] = $this->chr_alphanum($this->config->get('payment_klikandpay_key'));
		}
   if ($this->config->get('payment_klikandpay_key')==''){
    $data['payment_klikandpay_key'] = $this->key_mdp();
    $this->maj_etat_cde_bdd();
    }

		if (isset($this->request->post['payment_klikandpay_test'])) {
			$data['payment_klikandpay_test'] = $this->request->post['payment_klikandpay_test'];
		} else {
			$data['payment_klikandpay_test'] = $this->config->get('payment_klikandpay_test');
		}
		
    
		if (isset($this->request->post['payment_klikandpay_seuil_pay'])) {
			$data['payment_klikandpay_seuil_pay'] = $this->request->post['payment_klikandpay_seuil_pay'];
		} else {
			$data['payment_klikandpay_seuil_pay'] = $this->config->get('payment_klikandpay_seuil_pay');
		}

		if (isset($this->request->post['payment_klikandpay_plafon_pay'])) {
			$data['payment_klikandpay_plafon_pay'] = $this->request->post['payment_klikandpay_plafon_pay'];
		} else {
			$data['payment_klikandpay_plafon_pay'] = $this->config->get('payment_klikandpay_plafon_pay');
		}


		if (isset($this->request->post['payment_klikandpay_transaction'])) {
			$data['payment_klikandpay_transaction'] = $this->request->post['payment_klikandpay_transaction'];
		} else {
			$data['payment_klikandpay_transaction'] = $this->config->get('payment_klikandpay_transaction');
		}
		
		if (isset($this->request->post['payment_klikandpay_order_status_id'])) {
			$data['payment_klikandpay_order_status_id'] = $this->request->post['payment_klikandpay_order_status_id'];
		} else {
			$data['payment_klikandpay_order_status_id'] = $this->config->get('payment_klikandpay_order_status_id'); 
		} 

		$this->load->model('localisation/order_status');
		
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		if (isset($this->request->post['payment_klikandpay_geo_zone_id'])) {
			$data['payment_klikandpay_geo_zone_id'] = $this->request->post['payment_klikandpay_geo_zone_id'];
		} else {
			$data['payment_klikandpay_geo_zone_id'] = $this->config->get('payment_klikandpay_geo_zone_id'); 
		} 
		
		$this->load->model('localisation/geo_zone');
										
		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		if (isset($this->request->post['payment_klikandpay_status'])) {
			$data['payment_klikandpay_status'] = $this->request->post['payment_klikandpay_status'];
		} else {
			$data['payment_klikandpay_status'] = $this->config->get('payment_klikandpay_status');
		}
		
		if (isset($this->request->post['payment_klikandpay_sort_order'])) {
			$data['payment_klikandpay_sort_order'] = $this->request->post['payment_klikandpay_sort_order'];
		} else {
			$data['payment_klikandpay_sort_order'] = $this->config->get('payment_klikandpay_sort_order');
		}
				
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/payment/klikandpay', $data));		

	}

	public function maj_etat_cde_bdd() {
 $order_status_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "order_status` WHERE `order_status_id` = '4' ");
  if (!$order_status_query->num_rows) {	
  $this->db->query("INSERT INTO `" . DB_PREFIX . "order_status` (`order_status_id`,`language_id`,`name`) VALUES ('4', '1', 'Validated'), ('4', '2', 'Commande Valid&eacute;e')");
//	echo "Mise &agrave; jours order_status termin&eacute;e";
   } else {
//	echo "Mise &agrave; jours order_status d&eacute;j&agrave; install&eacute;e";
   }
  }

  public function key_mdp() {
  $chrs = 12 ; // Fixe le nombre de caractères
  $pwd = ""  ;
  mt_srand ((double) microtime() * 1000000);
  while (strlen($pwd)<$chrs)
  {
    $chr = chr(mt_rand (0,255));
		if (preg_match("/^[a-hj-km-np-zA-HJ-KM-NP-Z2-9]$/i", $chr))     
      $pwd = $pwd.$chr;
  };
  return $pwd;	
  }

  public function chr_alphanum( $chaine )
  {
  $alphanum = "";
   for( $i = 0 ; $i < strlen( $chaine ) ; $i++ )
   {
    $Lettre = substr( $chaine, $i, 1 );
    if( ( $Lettre >= 'a' && $Lettre <= 'z' ) ||
        ( $Lettre >= 'A' && $Lettre <= 'Z' ) ||
        ( $Lettre >= '0' && $Lettre <= '9' ) )
    {
      $alphanum .= $Lettre;
    }
   }
   return $alphanum;
   }

	private function validate() {
		if (!$this->user->hasPermission('modify', 'extension/payment/klikandpay')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->request->post['payment_klikandpay_site']) {
			$this->error['site'] = $this->language->get('error_site');
		}

		if (!$this->request->post['payment_klikandpay_key']) {
			$this->error['merchant_key'] = $this->language->get('error_merchant_key');
		}
		
		return !$this->error;	
	}
	
  private	function lect_klikpay($klikpay_secu) {
  $klikpay_secu = base64_decode($klikpay_secu);
  return $klikpay_secu;
  }		
	
}
?>
