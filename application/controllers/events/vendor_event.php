<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* TO BE USED in creating a new vendor*/
//untested
class Vendor_Event extends APP_System_Events_Controller
{
	/*
	 * Constructor
     * @description	Initializes the models used by vendor_event
					Loads custom variables
	*/
	public function __construct() {
		parent::__construct();
        $this->load->model('contact_model', 'contact');
		$this->load->model('vendor_model','vendor');
	}
	/**
	 * Create Vendor Event
	 * 
	 * @description	Calls the create vendor function from the model
	 * 				Utilizes sig and expires
	 */
	public function create()
    {
		$informations['sig'] 			= $this->app_signature;
        $informations['expires'] 		= $this->request_expires;
        

		
		$informations = array(
			"companyID"	=> $this->params['company_id'],
			"name" 			=> $this->params['name'],
			"checkname" 	=> $this->params['nickname'],
			"address" 		=> $this->params['address'],
			"email"			=> $this->params['email'],
			"phone"			=> $this->params['phone'],
			"fax"  			=> $this->params['fax'],
			"country"		=> $this->params['country'],
			"city"			=> $this->params['city'],
			"state"			=> $this->params['state'],
			"zip"		=> $this->params['zipcode']
		);
		
		//will create both a contact (by calling contact model methd) and add to the 'vendor' table
		$result_id = $this->vendor->create( $informations );
		
		$redirect_url = base_url('vendors');
		
        if($result_id) {
			
			$response = array( 
				'resp' 	=> 'success', 
				'url'	=> $redirect_url
			);
		} else {
			$response = array(
				'resp' => 'false',
				'value' => $result_id
			);
		}
		
		echo json_encode($response);
	}
	
	/**
	 * function to update via ajax
	*/
	public function update()
    {
	
		$informations['sig'] 			= $this->app_signature;
        $informations['expires'] 		= $this->request_expires;
        
		$vendor_id = $this->params['vendor_id'];
		$informations = array(
			
			"name" 			=> $this->params['name'],
			"checkname" 	=> $this->params['nickname'],
			"address" 		=> $this->params['address'],
			"email"			=> $this->params['email'],
			"phone"			=> $this->params['phone'],
			"fax"  			=> $this->params['fax'],
			"country"		=> $this->params['country'],
			"city"			=> $this->params['city'],
			"state"			=> $this->params['state'],
			"zip"		=> $this->params['zipcode']
		);
		
		//will create both a contact and add to the vendor table
		$result = $this->vendor->update($vendor_id, $informations );
		$redirect_url = base_url('vendors');
        if($result) {
			$response = array( 
				'resp' 	=> 'success', 
				'url'	=> $redirect_url
			);
		} else {
			$response = array(
				'resp' => 'saved',
				'value'	=> json_encode($result),
			);
		}
		
		echo json_encode($response);
	}
	
	/**
	 * Delete Vendor Event
	 * 
	 * Calls the delete vendor function from the model
	 * Utilizes sig
	 * */
	public function delete()
    {
		$informations['sig'] 			= $this->app_signature;
        $informations['expires'] 		= $this->request_expires;
        		
		//will create both a contact (by calling contact model methd) and add to the 'vendor' table
		$result_id = $this->vendor->delete_vendor( $this->params['contact_id'] ); //acquired from data-id attribute
	   if($result_id) {
			$redirect_url = base_url('vendors');
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
		
		echo json_encode($response);
	}
	
	
	public function get_purchase_orders()    {
		$this->load->library('lists/vendor_queries');
        $list = $this->vendor_queries->get_purchase_orders($this->session->userdata('user_company_id'),$this->params['sig'], $this->params['expires']);
	    
		echo $list;
    }

	
	
	
	
}