<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_event extends APP_System_Events_Controller {
	
    public function get_products_list()    {
    
        $this->load->library('lists/product_queries');
		if(!($this->session->userdata('user_company_id')))  { 
		throw new Exception('session user_company_id is unset.');
		}
        $list = $this->product_queries->get_products_list($this->session->userdata('user_company_id'), $this->params['sig'], $this->params['expires']);
	
        echo $list;
    }

    public function add()
    {
    	$this->load->model('product_model','product');

    	$informations['sig'] 			= $this->app_signature;
        $informations['expires'] 		= $this->request_expires;
        
		$company_id = $this->session->userdata('user_company_id');
		
		if(!$this->session->userdata('user_company_id')) {
			return json_encode(array(
				'resp' => false)
			);
		}
		
		if(isset($this->params['productID']) && !empty($company_id)) 
		{		
			$checkdb_query = $this->db->select('productID')
									  ->from('item')
									  ->where('productID = ' . $this->params['productID'] )
									  ->where('companyID = '. $company_id )
									  ->get();

			if($checkdb_query->num_rows() >= 1) {

				$response = array( 
					'resp' 	=> 'false', 
					'msg'	=> 'Product ID already exists'
				);
				echo json_encode($response);
				return false;

			} else {

				$informations = array(
					"companyID"  	=> $company_id,
					"productID"		=> $this->params['productID'],
					"prodname" 		=> $this->params['prodname'],
					"description" 	=> $this->params['description'],
					"rate" 			=> $this->params['rate'],
					"istaxable"		=> $this->params['istaxable'],
					"accountID"			=> $this->params['account'],
					"startingInventory"			=> $this->params['startinginventory']
				);
			}
		}
		else 
		{
			//no productID (to be auto generated (productID is auto_increment))
			$informations = array(
					"companyID"  	=> $company_id,
					"prodname" 		=> $this->params['prodname'],
					"description" 	=> $this->params['description'],
					"rate" 			=> $this->params['rate'],
					"istaxable"		=> $this->params['istaxable'],
					"accountID"			=> $this->params['account'],
					"startingInventory"			=> $this->params['startinginventory']
			);
		} 	
		
		$result_id = $this->product->create( $informations );
				
		$redirect_url = base_url('products/product_list');
		
        if(isset($result_id) && $result_id != FALSE) {
			
			$response = array( 
				'resp' 	=> 'success', 
				'url' =>  $redirect_url
			);
		} else {
			$response = array(
				'resp' => 'success',
				'url'	=> $redirect_url
			);
		}
		echo json_encode($response);
	}
	
	
	 public function update()
    {
    	$this->load->model('product_model','product');

    	 $result = array(
            'resp'		=> 'fail',
            'msg'		=> print_r($this->params, TRUE)
        );
        
		//$coact_id = $this->params['cid'];
        $company_id = $this->params['cmpid'];
        $this->params['companyID'] = $this->session->userdata('user_company_id');
		$this->params['productID'] = $this->params['pid'];
        $this->load->model('product_model', 'product');
        
        $result = $this->product->update((object)$this->params);
        $result['url'] = base_url('products/product_list');
		$result['resp'] =  'success';
		
		echo json_encode($result);  

	}
	
	/**
	 * Delete Product
	 * 
	 */
	public function product_delete()
    {
		$this->load->model('product_model','product');
		$informations['sig'] 			= $this->app_signature;
        $informations['expires'] 		= $this->request_expires;
		//sometimes ajax work -> 
		if(isset($this->params['productcode'])) {
			$codes = explode("-",$this->params['productcode']);
			$product_id = $codes[0];
			$company_id = $codes[1];
			} else {
			//non Ajax
			$no_ajax = TRUE;
			$company_id = $this->params['cid'];
			$product_id = $this->params['pid'];
		}
		
		$product = array(
			'companyID' => $company_id,
			'productID' => $product_id
		);
		
		$result_id = $this->product->delete_product( $product); //acquired from data-id attribute
		
	   if($result_id) {
			$redirect_url = base_url('products/product_list');
			$response = array( 
				'resp' 	=> 'success', 
				'url'	=> $redirect_url
			);
		} else {
			$response = array(
				'resp' => 'false',
				'error' => $this->db->_error_message()
			);
		}
		//return or redirect
		if(!$no_ajax) {
			echo json_encode($response);
		} else {
			redirect($redirect_url);
		}
	}
    
}