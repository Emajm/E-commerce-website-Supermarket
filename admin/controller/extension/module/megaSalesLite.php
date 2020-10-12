<?php
class ControllerExtensionModuleMegaSalesLite extends Controller {
	private $error = array(); 

	public function index() {   

		$data['button_save'] = 'Save Changes';
		$data['button_cancel'] = 'Cancel';

		$this->load->language('extension/module/megaSalesLite');
		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$arr['module_megaSalesLite_status'] = $this->request->post['module_megaSalesLite_status'];
			$this->model_setting_setting->editSetting('module_megaSalesLite', $arr);

			if ($arr['module_megaSalesLite_status']==1) { $this->save_all_changes($this->request->post); }					

			$this->session->data['success'] = 'Success: You have modified module '.$this->language->get('heading_title').'!';
			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], 'SSL'));
		}

		$data['heading_title'] = $this->language->get('heading_title');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text'      => 'Home',
			'href'      => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL'),
			'separator' => false
		);

		$data['breadcrumbs'][] = array(
			'text'      => 'Module',
			'href'      => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], 'SSL'),
			'separator' => ' :: '
		);

		$data['breadcrumbs'][] = array(
			'text'      => 'Mega Sales Lite',
			'href'      => $this->url->link('extension/module/megaSalesLite', 'user_token=' . $this->session->data['user_token'], 'SSL'),
			'separator' => ' :: '
		);

		$data['action'] = $this->url->link('extension/module/megaSalesLite', 'user_token=' . $this->session->data['user_token'], 'SSL');

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], 'SSL');

		$data['modules'] = array();

		if (isset($this->request->post['megaSalesLite_module'])) {
			$data['modules'] = $this->request->post['megaSalesLite_module'];
		} elseif ($this->config->get('megaSalesLite_module')) { 
			$data['modules'] = $this->config->get('megaSalesLite_module');
		}	

/* ************************************************************************************************* */

		$this->load->model('customer/customer_group');
      	$data['customer_group_list'] = $this->model_customer_customer_group->getCustomerGroups(); 

      	$this->load->model('catalog/manufacturer');
      	$data['manufacturer_list'] = $this->model_catalog_manufacturer->getManufacturers();

		$this->load->model('catalog/category');
      	$data['category_list'] = $categories = $this->model_catalog_category->getCategories(0);

      	$this->load->model('catalog/filter');
      	$filterz = $this->model_catalog_filter->getFilters(0);  
      	$this->array_sort_by_column($filterz, 'group');
       	$data['filter_list'] = $filterz;

/* ************************************************************************************************* */

		$this->load->model('design/layout');

		$data['layouts'] = $this->model_design_layout->getLayouts();

		$data['header'] = $this->load->controller('common/header');
		$data['footer'] = $this->load->controller('common/footer');
		$data['column_left'] = $this->load->controller('common/column_left');

		if (isset($this->request->post['module_megaSalesLite_status'])) {
			$data['module_megaSalesLite_status'] = $this->request->post['module_megaSalesLite_status'];
		} else {
			$data['module_megaSalesLite_status'] = $this->config->get('module_megaSalesLite_status');
		}

		$this->response->setOutput($this->load->view('extension/module/megaSalesLite', $data));

	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/megaSalesLite')) {
			$this->error['warning'] = 'Warning: You do not have permission to modify module Mega Sales Lite!';
		}

		return !$this->error;	
	}


	private function save_all_changes($array) {

		$this->load->model('catalog/product');

		$this->db->query("DELETE FROM " . DB_PREFIX . "product_special");

		if (isset($array['megasale_clear_all_sales'])) {
			$stop = 1;
		} else {
			$stop = 0;
		}

		if ( ($stop==0) && (!empty($array['megasale_start'])) && (!empty($array['megasale_end'])) && (!empty($array['megasale_discount_value'])) ) {

				if ( (isset($array['exclude_child'])) && ($array['exclude_child']==1) ) {
					$exclude_child = 1;
				} else {
					$exclude_child = 0;
				}

			// get all products

				$product_list = array();

					if ($array['megasale_product_category']!=='0') {
						if ($array['megasale_product_filter']!=='0') {
								if ( ($exclude_child==1) && ($array['megasale_product_category']>0) ) {
									$selected_categories[0]['category_id'] = $array['megasale_product_category'];
								} else {
									$selected_categories = $this->getFullCategoryPath($array['megasale_product_category']);
								}

								if (count($selected_categories)>0) {
									foreach ($selected_categories as $selected_category) {
										$prod = $this->getProductsMega(array('manufacturer_id' => $array['megasale_product_manufacturer'],'filter_category_id' => $selected_category['category_id'], 'filter_filter_id' => $array['megasale_product_filter']));

										if (count($prod)>0) {
											foreach ($prod as $one_product) {
												array_push($product_list,$one_product);
											}
										}									
									}								
								}

						} else {

							if ( ($exclude_child==1) && ($array['megasale_product_category']>0) ) {
								$selected_categories[0]['category_id'] = $array['megasale_product_category'];
							} else {
								$selected_categories = $this->getFullCategoryPath($array['megasale_product_category']);
							}

								if (count($selected_categories)>0) {
									foreach ($selected_categories as $selected_category) {
										$prod = $this->getProductsMega(array('manufacturer_id' => $array['megasale_product_manufacturer'],'filter_category_id' => $selected_category['category_id']));

										if (count($prod)>0) {
											foreach ($prod as $one_product) {
												array_push($product_list,$one_product);
											}
										}									
									}								
								}							
						}
					} else {
						if ($array['megasale_product_filter']!=='0') {
							$product_list = $this->getProductsMega(array('manufacturer_id' => $array['megasale_product_manufacturer'], 'filter_filter_id' => $array['megasale_product_filter']));
						} else {
							$product_list = $this->getProductsMega(array('manufacturer_id' => $array['megasale_product_manufacturer']));
						}
					}

					
					foreach ($product_list as $product) {

						if ($product['price']>0) {

							$product['new_price'] = 0;

							if ($array['megasale_discount_type']=='percent') {
									$product['new_price'] = (float)((float)$product['price'] - ((float)$product['price'] * (float) $array['megasale_discount_value'])/100);
							} else if ($array['megasale_discount_type']=='value') {
									$product['new_price'] = (float)((float)$product['price'] - (float) $array['megasale_discount_value']);
							}

							if ($product['new_price']>0) {
								$this->db->query("INSERT INTO " . DB_PREFIX . "product_special(product_id, customer_group_id, price, date_start, date_end) VALUES('" . (int)$product['product_id'] . "','". (int)$array['megasale_customer_group'] ."','" . (float)$product['new_price'] . "','".$array['megasale_start']."','".$array['megasale_end']."')");
							}
						}
					}
					
					$this->cache->delete('product');
				}
	}

	private function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {

	      $sort_col = array();

	      foreach ($arr as $key=> $row) {

	          $sort_col[$key] = $row[$col];

	          }

	         array_multisort($sort_col, $dir, $arr);
	}	

	private function getProductsMega($data = array()) {
						$sql = "SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) ";

						if (!empty($data['filter_filter_id'])) {
					      $sql .= " LEFT JOIN " . DB_PREFIX . "product_filter pf ON (p.product_id = pf.product_id)";     
					    }		

					    if (!empty($data['filter_category_id'])) {
							$sql .= " LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (p.product_id = p2c.product_id)";			
						}	

						$sql .= " WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "'";

						if (!empty($data['filter_name'])) {
							$sql .= " AND pd.name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
						}

						if (!empty($data['filter_model'])) {
							$sql .= " AND p.model LIKE '" . $this->db->escape($data['filter_model']) . "%'";
						}

						if (isset($data['filter_price']) && !is_null($data['filter_price'])) {
							$sql .= " AND p.price LIKE '" . $this->db->escape($data['filter_price']) . "%'";
						}

						if (isset($data['filter_quantity']) && !is_null($data['filter_quantity'])) {
							$sql .= " AND p.quantity = '" . (int)$data['filter_quantity'] . "'";
						}

						if (isset($data['filter_category_id']) && ($data['filter_category_id']>0)) {
							$sql .= " AND p2c.category_id = '" . (int)$data['filter_category_id'] . "'";
						}

					    if ( (isset($data['filter_filter_id'])) && ($data['filter_filter_id']>0) ) {
					      $sql .= " AND pf.filter_id = '" . (int)$data['filter_filter_id'] . "'";
					    }		 

						if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
							$sql .= " AND p.status = '" . (int)$data['filter_status'] . "'";
						}

						if ( (isset($data['manufacturer_id'])) && ($data['manufacturer_id']>0) ) {
							$sql .= " AND p.manufacturer_id = '" . (int)$data['manufacturer_id'] . "'";
						}
						
						$sql .= " GROUP BY p.product_id";

						$sort_data = array(
							'pd.name',
							'p.model',
							'p.price',
							'p.quantity',
							'p.status',
							'p.sort_order'
						);

						if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
							$sql .= " ORDER BY " . $data['sort'];
						} else {
							$sql .= " ORDER BY pd.name";
						}

						if (isset($data['order']) && ($data['order'] == 'DESC')) {
							$sql .= " DESC";
						} else {
							$sql .= " ASC";
						}

						if (isset($data['start']) || isset($data['limit'])) {
							if ($data['start'] < 0) {
								$data['start'] = 0;
							}

							if ($data['limit'] < 1) {
								$data['limit'] = 20;
							}

							$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
						}

						$query = $this->db->query($sql);

						return $query->rows;
	}   


	private function getFullCategoryPath($category_id=0) {
						$sql = "SELECT * from " . DB_PREFIX . "category_path WHERE path_id=".$category_id;
						$query = $this->db->query($sql);

						return $query->rows;
	}

}
?>