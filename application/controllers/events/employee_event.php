<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_event extends APP_System_Events_Controller {
	
	public $data; //stores information about the  array input, before throwing to model (same as $data method)

	
    public function get_employees()    {
    
        $this->load->library('lists/employee_queries');
		if(!($this->session->userdata('user_company_id')))  { 
			throw new Exception('session user_company_id is unset.');
		}
        $list = $this->employee_queries->get_employees($this->session->userdata('user_company_id'), $this->params['sig'], $this->params['expires']);
	
        echo $list;
    }
	
	/**
	 * function Employees - Add 
	 * @description	Accepts inputs and calls model to store the data
	*/
    public function add()
    {
    	$this->load->model('employee_model','employee');
    	$informations['sig'] 				= $this->app_signature;
        $informations['expires'] 		= $this->request_expires;
        
		$company_id = $this->session->userdata('user_company_id');
		
		if(!$this->session->userdata('user_company_id')) {
			return json_encode(array(
				'resp' => false)
			);
		}
		
		if(!empty($company_id))  {		
		
				$employeeData = array(
					"employee_name"  			=> $this->params['employee_name'],
					"employee_checkname"  		=> $this->params['employee_checkname'],
					"employee_address"  		=> $this->params['employee_email'],
					"employee_address"			=> $this->params['employee_address'],
					"employee_city" 			=> $this->params['employee_city'],
					"employee_gender" 			=> $this->params['employee_gender'],
					"employee_state" 			=> $this->params['employee_state'],
					"employee_zip"				=> $this->params['employee_zip'],
					"employee_country" 			=> $this->params['employee_country'],
					"employee_phone" 			=> $this->params['employee_phone'],
					"employee_fax" 				=> $this->params['employee_fax'],
					"employee_email" 			=> $this->params['employee_email'],
					"employee_ssn"				=> $this->params['employee_ssn'],
					"employee_dateofbirth"		=> $this->params['employee_dob'],
					"employee_rdate"			=> $this->params['employee_rdate'],
					"employee_hdate"			=> $this->params['employee_hdate']
					
				);
				
				$result_id = $this->employee->create( $employeeData );
				
		}
		$redirect_url = base_url('employees/index');
		
        if(isset($result_id) && $result_id != FALSE) {
			
			$response = array( 
				'resp' 	=> 'success', 
				'url' =>  $redirect_url
			);
		} else {
			$response = array(
				'resp' => 'fail',
				'msg'	=> 'save employee failed'
			);
		}
		echo json_encode($response);
	}
	
	
	 public function update()
    {
    	$this->load->model('employee_model','employee');
		$this->load->model('contact_model','contact');

    	$result = array(
            'resp'		=> 'fail',
            'msg'		=> print_r($this->params, TRUE)
        );
        
		$contact_id = $this->params['cid'];
        $company_id = $this->params['cmpid'];
        unset($this->data);
        $this->data['companyID'] 	= $this->session->userdata('user_company_id');
		$this->data['contactID'] 		= $this->params['cid'];
		$this->data['contactid'] 		= $this->params['cid']; //for employee table
		$this->data['name'] 				= $this->params['employee_name'];
		$this->data['checkname'] 	= $this->params['employee_checkname'];
		$this->data['address'] 			= $this->params['employee_address'];
		$this->data['city'] 					= $this->params['employee_city'];
		$this->data['state'] 				= $this->params['employee_state'];
		$this->data['zip'] 					= $this->params['employee_zip'];
		$this->data['country'] 			= $this->params['employee_country'];
		$this->data['phone'] 				= $this->params['employee_phone'];
		$this->data['fax'] 					= $this->params['employee_fax'];
        $this->data['email'] 				= $this->params['employee_email'];
        $this->data['sno'] 					= $this->params['employee_ssn'];
        $this->data['dob'] 					= $this->params['employee_dob'];
        $this->data['gender'] 			= $this->params['employee_gender'];
        $this->data['hdate'] 				= $this->params['employee_hdate'];
        $this->data['rdate'] 				= $this->params['employee_rdate'];
        $this->data['backlink'] 			= $this->params['employee_view_url'];

        $result['url'] = base_url('employees/employee_list');
		$result['resp'] =  'success';
		
		try {
			$result  = $this->employee->update_employee($contact_id,$this->data); 	
			//for updates we can't check update worked - no primary key in table or 0/1 for affected rows
		
		} catch(Exception $e) {
 			//log errors
 			log_message('DEBUG', $this->get_last_query());
	        log_message('ERROR', $e->getMessage());

            $result = array(
                'resp'		=> 'fail',
                'msg'		=> htmlentities('Unable to update information. '.SYSTEM_TECH_SUPPORT_MESSAGE.'    <a class="back-link" href="' . $this->data['backlink'] . '">Back to employee list.</a>')
            );

		}
		
		$redirect_url = base_url('employees/employee_list') . "?msg=". $result['msg'];
		$result = array(
			'resp' => 'success',
			'url' => $redirect_url
		);
		echo json_encode($result);  
	}
	
	/**
	 * Delete an Employee
	 * 
	 */
	public function employee_delete()
    {
		$this->load->model('employee_model','employee');
		$informations['sig'] 			= $this->app_signature;
        $informations['expires'] 		= $this->request_expires;
		$contact_id = $this->params['cid'];
		$this->employee->delete_employee($contact_id);
	}

	public function add_payschedule() {

		$this->load->model('employee_model','employee');
    	$informations['sig'] 			= $this->app_signature;
        $informations['expires'] 		= $this->request_expires;
        
		$company_id = $this->session->userdata('user_company_id');
		
		$payschedData = array(
			'cid'								=> $company_id,
			'payschedulename'  	=> $this->params['paysched_name'],
			'payinterval'  				=> $this->params['paycheck_interval'],
			'paycheckdate'  			=> $this->params['paycheck_date'],
			'status'						=> 0
		);
				
		$result_id = $this->employee->create_paysched( $payschedData );
		if($result_id)  {
			$msg = htmlentities('A new employee pay schedule has been created');
			$redirect_url = base_url('employees/pay_schedule_list') . "?msg=".urlencode($msg);
			
			$result =	array('resp' => 'success', 
									  'url'    => $redirect_url);
		} else {
			$result =	array('resp' => 'fail', 
									  'msg' => 'New pay schedule failed to be created');
		
		}
		
		echo json_encode($result);  
    }
	
	public function update_payschedule() {

		$this->load->model('employee_model','employee');
    	$informations['sig'] 				= $this->app_signature;
        $informations['expires'] 		= $this->request_expires;
        
		$company_id = $this->session->userdata('user_company_id');
		$id = $this->params['paysched_id'];
		$payschedData = array(
			'cid'								=> $company_id,
			'payschedulename'  	=> $this->params['paysched_name'],
			'payinterval'  				=> $this->params['paycheck_interval'],
			'paycheckdate'  			=> $this->params['paycheck_date'],
			'status'						=> 0
		);
				
		$result_id = $this->employee->update_paysched( $id, $payschedData );
		if($this->db->affected_rows() >= 0)  {
			//if no data was change = ok!
			$result['resp'] = 'success';//htmlentities('Payschedule Updated');
			$msg = 'Pay Schedule Updated';
			$redirect_url = base_url('employees/pay_schedule_list') . "?msg=".urlencode($msg);
			$result['url'] = $redirect_url;
			
		} else {
			$result['msg'] = 'Update pay schedule failed';
			$result['resp'] = 'fail';
		}
		
		echo json_encode($result);  
		
    }
	
	public function delete_paysched() {
		$this->load->model('employee_model','employee');
		$informations['sig'] 			= $this->app_signature;
        $informations['expires'] 		= $this->request_expires;
		
		$id = $this->params['psid'];
		
		$id = $this->employee->delete_paysched($id);
		if($this->db->affected_rows())	{
			$result['resp'] = 'success';
			//$msg = 'Paysched deleted'; //do be done via JS
			$result['url'] = base_url('employees/pay_schedule_list');
		} else {
			$result['resp'] = 'fail';
			$result['msg'] = 'Paysched failed to delete';
		}
		
		echo json_encode($result);  
	}
	
	/*************
	PAYTYPES
	*************/
	public function get_paytypes() {
		//load libraries/helpers/models
		$this->load->library('lists/employee_queries');
		if(!($this->session->userdata('user_company_id')))  { 
			throw new Exception('session user_company_id is unset.');
		}
	    $list = $this->employee_queries->get_paytypes($this->session->userdata('user_company_id'), $this->params['sig'], $this->params['expires']);
	    echo $list;
		
	}
	
	public function add_paytype() {
		//load data to variables
		$company_id 		= $this->params['cmpid'];
		$expaccount 		= $this->params['payexp'];
		$rate 					= $this->params['paytype_rate'];
		$paytype_name	= $this->params['paytype_name'];
		
		$this->load->model('employee_model','employee');
    	$informations['sig'] 				= $this->app_signature;
        $informations['expires'] 		= $this->request_expires;
        
		$company_id = $this->session->userdata('user_company_id');
		
		if(!$this->session->userdata('user_company_id')) {
			$result = array(
				'resp' => 'fail',
				'msg' => 'company id not set'
			);
			echo json_encode($result);
		}
		
		$paytypeData = array(
				'cid'							=> $company_id,
				'name'  					=> $paytype_name,
				'rate'  						=> number_format( $rate , 2),
				'expenseaccount'  	=> $expaccount,
				'status'					=> 0
		);
		$result_id = $this->employee->add_paytype($paytypeData);
		$redirect_url = base_url('employees/pay_type_list');
		
        if(isset($result_id) && $result_id != FALSE) {
			$msg = 'New pay type saved';
			$response = array( 
				'resp' 	=> 'success', 
				
				'url' =>  $redirect_url . '?msg=' . urlencode($msg)
			);
		} else {
			$response = array(
				'resp' => 'fail',
				'msg'	=> 'Save Pay Type Failed'
			);
			log_message( 'debug' , $this->db->last_query() );
		}
	
	echo json_encode($response);
	
	}
	
	public function delete_paytype() {
		//load libraries/helpers/models
		$informations['sig'] 			= $this->app_signature;
        $informations['expires'] 		= $this->request_expires;
		
		$id = $this->params['paytypeid'];
		
		$id = $this->employee->delete_paytype($id);
		if($this->db->affected_rows())	{
			$result = array('resp' => 'success',
									 'url'  =>  base_url('employees/pay_schedule_list'));
		} else {
			$result = array('resp' => 'fail',
									 'msg'  => 'Pay Type failed to delete');
		}
		
		echo json_encode($result);  
	}
	
	
	
	public function update_paytype() {
   	$this->load->model('employee_model','employee');
		$this->load->model('contact_model','contact');

    	$result = array(
            'resp'		=> 'fail',
            'msg'		=> print_r($this->params, TRUE)
        );
        
		$pid = $this->params['pid'];
        $company_id = $this->params['cmpid'];
        unset($this->data);
        $this->data = array(
			'cid' 		=> $company_id,
			'name' 	=> $this->params['paytype_name'],
			'rate' 		=> $this->params['paytype_rate'],
			'expenseaccount' =>$this->params['payexp']
		);
			
        
		try {
			$result  = $this->employee->update_paytype($pid,$this->data); 	
			//for updates - assumed it worked. throw exception if not 
		} catch(Exception $e) {
 			//log errors
 			log_message('DEBUG', $this->get_last_query());
	        log_message('ERROR', $e->getMessage());

            $result = array(
                'resp'		=> 'fail',
                'msg'		=> htmlentities('Unable to update information. '.SYSTEM_TECH_SUPPORT_MESSAGE.'  <a class="back-link" href="' . $this->data['backlink'] . '">Back to pay type list.</a>')
            );

		}
		
		$redirect_url = base_url('employees/pay_type_list') . '?msg=' . urlencode($result['msg']);
		$result = array(
			'resp' => 'success',
			'url' => $redirect_url
		);
		echo json_encode($result);  
		
	}
}