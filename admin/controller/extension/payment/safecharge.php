<?php

require_once DIR_SYSTEM .'config'. DIRECTORY_SEPARATOR. 'sc_config.php';
require_once DIR_SYSTEM. 'library' .DIRECTORY_SEPARATOR .'safecharge'. DIRECTORY_SEPARATOR. 'sc_version_resolver.php';

class ControllerExtensionPaymentSafeCharge extends Controller
{ 
    public function install()
    {
        $q =
            "CREATE TABLE IF NOT EXISTS `sc_refunds` (
                `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                `orderId` int(10) unsigned NOT NULL,
                `clientUniqueId` varchar(50) NOT NULL,
                `amount` varchar(15) NOT NULL,
                `transactionId` varchar(20) NOT NULL,
                `authCode` varchar(10) NOT NULL,
                `approved` tinyint(1) unsigned NOT NULL DEFAULT '0',
                `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                
                PRIMARY KEY (`id`),
                KEY `orderId` (`orderId`),
                KEY `approved` (`approved`)
              ) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
        
        $this->db->query($q);
        
        // change the default value for order_status_id in order table to 1
        $q = "EXPLAIN " . DB_PREFIX . "order";
        $resp = $this->db->query($q);
        
        if(isset($resp->rows) && !empty($resp->rows)) {
            foreach($resp->rows as $field) {
                if($field['Field'] == 'order_status_id') {
                    if(intval($field['Default']) == 0) {
                        $q = "ALTER TABLE `". DB_PREFIX ."order` CHANGE `order_status_id` `order_status_id` INT(11) NOT NULL DEFAULT '1';";
                        $this->db->query($q);
                    }
                    
                    break;
                }
            }
        }
    }
    
    public function uninstall()
    {
        // change the default value for order_status_id in order table to 1
        $q = "EXPLAIN " . DB_PREFIX . "order";
        $resp = $this->db->query($q);
        
        if(isset($resp->rows) && !empty($resp->rows)) {
            foreach($resp->rows as $field) {
                if($field['Field'] == 'order_status_id') {
                    if(intval($field['Default']) == 1) {
                        $q = "ALTER TABLE `". DB_PREFIX ."order` CHANGE `order_status_id` `order_status_id` INT(11) NOT NULL DEFAULT '0';";
                        $this->db->query($q);
                    }
                    
                    break;
                }
            }
        }
    }
    
	public function index()
    {
        // detect ajax call
        if(
            isset($_SERVER['HTTP_X_REQUESTED_WITH'], $this->request->post['action'])
            && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'
            && (isset($this->request->post['orderId']) || isset($this->request->post['refId']))
        ) {
            $this->ajax_call();
            exit;
        }
        
        $token_name = SafeChargeVersionResolver::get_token_name();
        $ctr_file_path = SafeChargeVersionResolver::get_ctr_file_path();
        $settigs_prefix = SafeChargeVersionResolver::get_settings_prefix();
        
        $this->load->model('setting/setting');
        
        // add translation in the data
        $data = $this->load->language($ctr_file_path);
        
        // when save the settings
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
            // Validate
            $save_post = true;
            
            if ($this->user->hasPermission('modify', $ctr_file_path)) {
                $data['error_permission'] = false;
            }
            else {
                $save_post = false;
            }

            if ($this->request->post[$settigs_prefix . 'ppp_Merchant_ID']) {
            	$data['error_ppp_Merchant_ID'] = false;
            }
            else {
                $save_post = false;
            }

            if ($this->request->post[$settigs_prefix . 'ppp_Merchant_Site_ID']) {
            	$data['error_ppp_Merchant_Site_ID'] = false;
            }
            else {
                $save_post = false;
            }

            if ($this->request->post[$settigs_prefix . 'secret']) {
            	$data['error_secret'] = false;
            }
            else {
                $save_post = false;
            }
            // Validate END
            
            // if all is ok - save settings
            if($save_post) {
                $resp = $this->model_setting_setting->editSetting(
                    trim($settigs_prefix, '_'),
                    $this->request->post
                );
                
                $this->session->data['success'] = $data['text_success'];
            }
        }
        // no post - no errors, set them to false
        else {
            $data['error_permission'] = false;
            $data['error_ppp_Merchant_ID'] = false;
            $data['error_ppp_Merchant_ID'] = false;
            $data['error_ppp_Merchant_Site_ID'] = false;
            $data['error_secret'] = false;
        }
        
        // get settings
        $xtsettings = $this->model_setting_setting->getSetting(trim($settigs_prefix, '_'));
        
		$data['breadcrumbs'][] = array(
			'text' => $data['text_home'],
			'href' => $this->url->link(
                'common/dashboard',
                $token_name . '=' . $this->session->data[$token_name],
                true
            ),
            'separator' => false
		);

		$data['breadcrumbs'][] = array(
			'text' => $data[SafeChargeVersionResolver::get_adm_ctr_text_extension_key()],
			'href' => $this->url->link(
                SafeChargeVersionResolver::get_adm_ctr_extensions_url(),
                $token_name . '=' . $this->session->data[$token_name] . '&type=payment',
                true
            ),
            'separator' => ' :: '
		);
        
        $data['breadcrumbs'][] = array(
            'text' => $data['heading_title'],
			'href' => $this->url->link(
            //    $ctr_file_path,
                $this->request->get['route'],
                $token_name . '=' . $this->session->data[$token_name],
                true
            ),
            'separator' => ' :: '
   		);

		$data['action'] = $this->url->link(
        //    $ctr_file_path,
            $this->request->get['route'],
            $token_name . '=' . $this->session->data[$token_name],
            true
        );
		
        $data['cancel'] = $this->url->link(
            SafeChargeVersionResolver::get_adm_ctr_extensions_url(),
            $token_name . '=' . $this->session->data[$token_name],
            true
        );

        # check for POST and set local variables by it
        $settings_fields = array(
            'ppp_Merchant_ID',
            'ppp_Merchant_Site_ID',
            'secret',
            'hash_type',
            'payment_api',
            'transaction_type',
            'test_mode',
            'force_http',
            'create_logs',
            'total',
            'geo_zone_id',
            'status',
            'sort_order',
        );
        
        foreach($settings_fields as $field) {
            if (isset($this->request->post[$settigs_prefix . $field])) {
                $data[$settigs_prefix . $field] = $this->request->post[$settigs_prefix . $field];
            }
            else {
                $data[$settigs_prefix . $field] = $this->config->get($settigs_prefix . $field);
            }
        }
        # check for POST and set local variables by it END
        
        // set statuses manually
        $statuses = array(
            1   => 'pending_status_id',
            7   => 'canceled_status_id',
            10  => 'failed_status_id',
            13  => 'chargeback_status_id',
            15  => 'order_status_id',
        );
        
        foreach($statuses as $id => $name) {
            if (isset($this->request->post[$settigs_prefix . $name])) {
                $data[$settigs_prefix . $name] = $this->request->post[$settigs_prefix . $name];
            }
            elseif (isset($xtsettings[$settigs_prefix . $name])) {
                $data[$settigs_prefix . $name] = $this->config->get($settigs_prefix . $name); 
            }
            else {
                $data[$settigs_prefix . $name] = $id;
            }
        }
        // set statuses manually END
        
        // get all statuses
		$this->load->model('localisation/order_status');
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
        
        // get all geo-zones
		$this->load->model('localisation/geo_zone');
		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

        if (isset($this->session->data['success'])) {
            $data['success'] = $this->session->data['success'];
            unset($this->session->data['success']);
        }
        elseif (isset($this->session->data['error_warning'])) {
            $data['error_warning'] = $this->session->data['error_warning'];
            unset($this->session->data['error_warning']);
        }
        // check for POST and set local variables by it END
        
        // set output
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');
        
        // load common php template and then pass it to the real template
        // as single variable. The form is same for both versions
        ob_start();
        require DIR_TEMPLATE . $ctr_file_path . '.php';
        $sc_form['sc_form'] = ob_get_clean(); // the template of OC wants array
        
        $this->response->setOutput($this->load->view($ctr_file_path, $sc_form));
	}

    /**
     * Function ajax_call
     * Process Ajax calls here.
     */
    private function ajax_call()
    {
        $this->create_log($this->request->post['action'], 'ajax_call(): ');
        
        try {
            $action = $this->request->post['action'];
            
            if($action != 'removeLogs' && @$this->request->post['orderId']) {
                $order_id = intval($this->request->post['orderId']);
            }
        }
        catch (Exception $ex) {
            $this->create_log($ex->getMessage(), 'In ajax miss orderId or action: ');
            echo json_encode(array('status' => 0, 'msg' => $ex->getMessage()));
            exit;
        }
        
        // load REST API class and config
        require_once DIR_SYSTEM. 'library' .DIRECTORY_SEPARATOR .'safecharge'. DIRECTORY_SEPARATOR. 'SC_REST_API.php';
        
        switch ($action) {
            case 'refund':
                $this->order_refund($order_id);
                exit;
                
            case 'refundManual':
                $this->order_refund($order_id, true);
                exit;
                
            case 'deleteManualRefund':
                $this->delete_refund(intval($this->request->post['refId']));
                exit;
                
            case 'void':
            case 'settle':
                $this->order_void_settle($order_id);
                exit;
                
            case 'removeLogs':
                $this->remove_logs();
                exit;
            
            default:
                echo json_encode(array('status' => 0, 'msg' => 'Unknown order action: ' . $action));
                exit;
        }
    }
    
    private function order_refund($order_id, $is_manual = false)
    {
        $request_amoutn = floatval($this->request->post['amount']);
        
        if($request_amoutn <= 0) {
            echo json_encode(array('status' => 0, 'msg' => 'The Refund Amount must be greater than 0!'));
            exit;
        }
        
        $data = $this->get_order_info($order_id);
        
        $order_info = $data['order_info'];
        $payment_custom_fields = $data['payment_custom_fields'];
        $remaining_ref_amound = $order_info['total'];
        
        // get the refunds
        $query = $this->db->query('SELECT amount FROM sc_refunds WHERE orderId = ' . intval($order_id));
        
        if(@$query->rows) {
            foreach($query->rows as $row) {
                $remaining_ref_amound -= floatval($row['amount']);
            }
        }
            
        if(round($remaining_ref_amound, 2) < round($request_amoutn, 2)) {
            echo json_encode(array('status' => 0, 'msg' => 'Refunds sum exceeds Order Amount'));
            exit;
        }
        
        // get GW settings
        $settings = $this->get_gw_settings();
        
        if($is_manual) {
            $ref_data = date('Y-m-d H:i:s', time());
            
            $ref_id = uniqid();
            
            $this->db->query(
                "INSERT INTO sc_refunds (orderId, clientUniqueId, amount, approved) "
                . "VALUES (".intval($order_id).", '{$ref_id}', {$request_amoutn}, 1);"
            );
            
            $order_status = $order_info['order_status_id'];
            if(round($remaining_ref_amound, 2) == round($request_amoutn, 2)) {
                $order_status = 11; // refunded
            }
            
            $this->create_log($order_status, '$order_status: ');
            
            $this->db->query(
                "INSERT INTO " . DB_PREFIX ."order_history (order_id, order_status_id, notify, comment, date_added) "
                . "VALUES ({$order_id}, {$order_status}, 0, 'Your Manual Refund #{$ref_id} was created.', '{$ref_data}');"
            );
                
            $this->db->query("UPDATE " . DB_PREFIX ."order SET order_status_id = {$order_status} WHERE order_id = {$order_id};");

            echo json_encode(array('status' => 1));
            exit;
        }
        
        $_SESSION['create_log'] = $this->session->data['create_logs'] = $settings['create_log'];
        $clientUniqueId = uniqid();
        
        $notify_url = $this->url->link(
            SafeChargeVersionResolver::get_ctr_file_path()
            . '/callback&create_logs='
            . $settings['create_log'] . '&action=refund&order_id=' . $order_id);
        $notify_url = str_replace('admin/', '', $notify_url);
        
        if($settings['force_http'] == 'yes') {
            $notify_url = str_replace('https:', 'http:', $notify_url);
        }
        
        if(!isset($_SESSION['create_logs']) && isset($this->session->data['create_logs'])) {
            $_SESSION['create_logs'] = $this->session->data['create_logs'];
        }
        
        // save the Refund into DB
        $this->db->query(
            "INSERT INTO `sc_refunds` (orderId, clientUniqueId, amount) "
            . "VALUES ({$order_id}, '{$clientUniqueId}', ". floatval($this->request->post['amount']) .")");
        
        // execute refund, the response must be array('msg' => 'some msg', 'new_order_status' => 'some status')
        $json_arr = SC_REST_API::refund_order(
            $settings
            ,array(
                'id'            => $clientUniqueId,
                'amount'        => $this->request->post['amount'],
                'reason'        => '', // no reason field
                'webMasterId'   => 'OpenCart ' . VERSION
            )
            ,array(
                'order_tr_id'   => $payment_custom_fields[SC_GW_TRANS_ID_KEY],
                'auth_code'     => $payment_custom_fields[SC_AUTH_CODE_KEY],
            )
            ,$order_info['currency_code']
            ,$notify_url
        );
        
        if(!$json_arr) {
            echo json_encode(array('status' => 0, 'msg' => 'Empty response.'));
            exit;
        }
        
        // in case we have message but without status
        if(!isset($json_arr['status']) && isset($json_arr['msg'])) {
            // save response message in the History
            $msg = 'Request Refund #' . $clientUniqueId . ' problem: ' . $json_arr['msg'];
            
            $this->db->query(
                "INSERT INTO `" . DB_PREFIX ."order_history` (`order_id`, `order_status_id`, `notify`, `comment`, `date_added`) "
                . "VALUES (" . $order_id . ", " . $order_info['order_status_id']
                . ", 0, '" . $msg . "', '" . date('Y-m-d H:i:s', time()) . "');"
            );
            
            echo json_encode(array('status' => 0, 'msg' => $msg));
            exit;
        }
        
        $refund_url = SC_TEST_REFUND_URL;
        $cpanel_url = SC_TEST_CPANEL_URL;

        if($settings['test'] == 'no') {
            $refund_url = SC_LIVE_REFUND_URL;
            $cpanel_url = SC_LIVE_CPANEL_URL;
        }
        
        $msg = '';
        $error_note = 'Request Refund #' . $clientUniqueId . ' fail, if you want login into <i>' . $cpanel_url
            . '</i> and refund Transaction ID ' . $payment_custom_fields[SC_GW_TRANS_ID_KEY];

        if($json_arr === false) {
            $msg = 'The REST API retun false. ' . $error_note;

            // save response message in the History
            $this->db->query(
                "INSERT INTO `" . DB_PREFIX ."order_history` (`order_id`, `order_status_id`, `notify`, `comment`, `date_added`) "
                . "VALUES (" . $order_id . ", " . $order_info['order_status_id']
                . ", 0, '" . $msg . "', '" . date('Y-m-d H:i:s', time()) . "');"
            );
            
            echo json_encode(array('status' => 0, 'msg' => $msg));
            exit;
        }
        
        if(!is_array($json_arr)) {
            parse_str($resp, $json_arr);
        }

        if(!is_array($json_arr)) {
            $msg = 'Invalid API response. ' . $error_note;

            // save response message in the History
            $this->db->query(
                "INSERT INTO `" . DB_PREFIX ."order_history` (`order_id`, `order_status_id`, `notify`, `comment`, `date_added`) "
                . "VALUES (" . $order_id . ", " . $order_info['order_status_id']
                . ", 0, '" . $msg . "', '" . date('Y-m-d H:i:s', time()) . "');"
            );
            
            echo json_encode(array('status' => 0, 'msg' => $msg));
            exit;
        }
        
        // the status of the request is ERROR
        if(@$json_arr['status'] == 'ERROR') {
            $msg = 'Request ERROR - "' . $json_arr['reason'] .'" '. $error_note;
            
            // save response message in the History
            $this->db->query(
                "INSERT INTO `" . DB_PREFIX ."order_history` (`order_id`, `order_status_id`, `notify`, `comment`, `date_added`) "
                . "VALUES (" . $order_id . ", " . $order_info['order_status_id']
                . ", 0, '" . $msg . "', '" . date('Y-m-d H:i:s', time()) . "');"
            );

            echo json_encode(array('status' => 0, 'msg' => $msg));
            exit;
        }
        
        // if request is success, we will wait for DMN
        $msg = 'Request Refund #' . $clientUniqueId . ', was sent. Please, wait for DMN!';
        
        $order_status = $order_info['order_status_id'];
        if($remaining_ref_amound == $request_amoutn) {
            $order_status = 11; // refunded
        }
        
        echo json_encode(array('status' => 1));
        exit;
    }
    
    private function delete_refund($order_id)
    {
        try {
            $resp = $this->db->query("DELETE FROM sc_refunds WHERE id = " . $order_id . ";");
            echo json_encode(array('success' => $resp));
        }
        catch (Exception $e) {
            echo json_encode(array(
                'success' => false,
                'msg' => $e->getMessage()
            ));
        }
        
        exit;
    }


    /**
     * Function order_void_settle
     * We use one function for both because the only
     * difference is the endpoint, all parameters are same
     */
    private function order_void_settle($order_id)
    {
        $data = $this->get_order_info($order_id);
        
        $order_info = $data['order_info'];
        $payment_custom_fields = $data['payment_custom_fields'];
        
        // get GW settings
        $settings = $this->get_gw_settings();
        
        $_SESSION['create_log'] = $this->session->data['create_logs'] = $settings['create_log'];
        
        $time = date('YmdHis', time());
        
        $notify_url = $this->url->link(
            SafeChargeVersionResolver::get_ctr_file_path()
            . '/callback&create_logs=' . $settings['create_log']
            . '&action=' . $this->request->post['action']
            . '&order_id=' . $order_id);
        
        $notify_url = str_replace('admin/', '', $notify_url);
        
        $params = array(
            'merchantId'            => $settings['merchantId'],
            'merchantSiteId'        => $settings['merchantSiteId'],
            'clientRequestId'       => $time . '_' . $payment_custom_fields[SC_GW_TRANS_ID_KEY],
            'clientUniqueId'        => uniqid(),
            'amount'                => number_format($order_info['total'], 2, '.', ''),
            'currency'              => $order_info['currency_code'],
            'relatedTransactionId'  => $payment_custom_fields[SC_GW_TRANS_ID_KEY],
            'authCode'              => $payment_custom_fields[SC_AUTH_CODE_KEY],
            'urlDetails'            => array('notificationUrl' => $notify_url),
            'timeStamp'             => $time,
            'test'                  => $settings['test'], // need to define the endpoint
        );
        
        if(defined('VERSION')) {
            $params['webMasterId'] = 'OpenCart ' . VERSION;
        }
        
        $checksum = hash(
            $settings['hash_type'],
            $settings['merchantId'] . $settings['merchantSiteId'] . $params['clientRequestId']
                . $params['clientUniqueId'] . $params['amount'] . $params['currency']
                . $params['relatedTransactionId'] . $params['authCode']
                . $notify_url . $time . $settings['secret']
        );
        
        $params['checksum'] = $checksum;
        
        $this->create_log($params, 'The params for Void/Settle: ');
        
        SC_REST_API::void_and_settle_order($params, $this->request->post['action'], true);
    }
    
    /**
     * Function get_order_info
     * Help function for order_refund and order_void_settle
     * 
     * @return array
     */
    private function get_order_info($order_id)
    {
        // get Order info
        $this->load->model('sale/order');
        $order_info = $this->model_sale_order->getOrder($order_id);
        
        if(!$order_info) {
            echo json_encode(array('status' => 0, 'msg' => 'There is no Order infor for id: ' . $order_id));
            exit;
        }
        
        // get info for older refunds
        $payment_custom_fields = array();
        if(isset($order_info['payment_custom_field'])) {
            if(is_array($order_info['payment_custom_field'])) {
                $payment_custom_fields = $order_info['payment_custom_field'];
            }
            elseif(is_string($order_info['payment_custom_field'])) {
                $payment_custom_fields = json_decode($order_info['payment_custom_field'], true);
            }   
        }
        
        return array(
            'order_info' => $order_info,
            'payment_custom_fields' => $payment_custom_fields
        );
    }
    
    /**
     * Function get_order_info
     * Help function for order_refund and order_void_settle
     * 
     * @return array
     */
    private function get_gw_settings()
    {
        $settigs_prefix = SafeChargeVersionResolver::get_settings_prefix();
        
        $this->load->model('setting/setting');
        $gw_settings = $this->model_setting_setting->getSetting(trim($settigs_prefix, '_'));
        
        return array(
            'merchantId'        => $gw_settings[$settigs_prefix . 'ppp_Merchant_ID'],
            'merchantSiteId'    => $gw_settings[$settigs_prefix . 'ppp_Merchant_Site_ID'],
            'test'              => $gw_settings[$settigs_prefix . 'test_mode'],
            'create_log'        => $gw_settings[$settigs_prefix . 'create_logs'],
            'hash_type'         => $gw_settings[$settigs_prefix . 'hash_type'],
            'secret'            => $gw_settings[$settigs_prefix . 'secret'],
            'force_http'        => $gw_settings[$settigs_prefix . 'force_http'],
            'payment_api'       => $gw_settings[$settigs_prefix . 'payment_api'],
            'transactionType'   => $gw_settings[$settigs_prefix . 'transaction_type'],
        );
    }

    private function remove_logs()
    {
        $this->load->language($ctr_file_path);
        
        $logs = array();
        $logs_dir = DIR_STORAGE . 'logs' . DIRECTORY_SEPARATOR;

        foreach(scandir($logs_dir) as $file) {
            if($file != '.' && $file != '..' && strpos($file, 'SafeCharge') == 0) {
                $logs[] = $file;
            }
        }

        if(count($logs) > 30) {
            sort($logs);

            for($cnt = 0; $cnt < 30; $cnt++) {
                if(is_file($logs_dir . $logs[$cnt])) {
                    if(!unlink($logs_dir . $logs[$cnt])) {
                        echo json_encode(array(
                            'status' => 0,
                            'msg' => $this->language->get('Error when try to delete file: ') . $logs[$cnt]
                        ));
                        exit;
                    }
                }
            }

            echo json_encode(array('status' => 1, 'msg' => $this->language->get('The files were removed.')));
        }
        else {
            echo json_encode(array('status' => 0, 'msg' => $this->language->get('The log files are less than 30.')));
        }

        exit;
    }
    
    /**
     * Function create_log
     * Create logs. You MUST have defined SC_LOG_FILE_PATH const,
     * holding the full path to the log file.
     * 
     * @param mixed $data
     * @param string $title - title of the printed log
     */
    private function create_log($data, $title = '')
    {
        if(
            @$this->config->get('create_logs') == 'yes' 
            || @$this->session->data['create_logs'] == 'yes' 
            || @$_REQUEST['create_logs'] == 'yes'
        ) {
            $d = $data;

            if(is_array($data)) {
                if(isset($data['cardData']) && is_array($data['cardData'])) {
                    foreach($data['cardData'] as $k => $v) {
                        $data['cardData'][$k] = 'some string';
                    }
                }
                if(isset($data['userAccountDetails']) && is_array($data['userAccountDetails'])) {
                    foreach($data['userAccountDetails'] as $k => $v) {
                        $data['userAccountDetails'][$k] = 'some string';
                    }
                }
                if(isset($data['paResponse']) && !empty($data['paResponse'])) {
                    $data['paResponse'] = 'a long string';
                }
                if(isset($data['PaRes']) && !empty($data['PaRes'])) {
                    $data['PaRes'] = 'a long string';
                }
                
                $d = print_r($data, true);
            }
            elseif(is_object($data)) {
                $d = print_r($data, true);
            }
            elseif(is_bool($data)) {
                $d = $data ? 'true' : 'false';
            }

            if(!empty($title)) {
                $d = $title . "\r\n" . $d;
            }

            // FOR OpenCart ONLY
            $logger = new Log('SafeCharge-' . date('Y-m-d', time()) . '.log');
            $logger->write($d . "\n");
        }
    }
}