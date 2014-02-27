<?php
/*
 * Vendor model for getting data about company's vendors
 * @author Joe Palala
 * @modified 19:10 06/19/2013
 @ done: added foreign_table_name
		 will join with businesscontact to get_list through basic DB command.
 */
class Employee_Model extends APP_Model {
	
	public function __construct(){
		parent::__construct();
		$this->table_name 	= "employee";
		$this->primary_key 	= "contactid";
		
		if(!$this->session->userdata( 'user_company_id' )) {
			throw new Exception('Could not figure out users\' company ID');
		}
		
		$this->company_id 	= $this->session->userdata( 'user_company_id' );
	}
	
	public function create( $employee_data ) {
	
		$this->load->model('contact_model','contact'); //reuse contact model 
		$informations =  array(
					'name'			=> 	$employee_data['employee_name'],
					'checkname'		=> $employee_data['employee_checkname'],
					'address'		=> $employee_data['employee_address'],
					'city'			=> $employee_data['employee_city'],
					'state'			=> $employee_data['employee_state'],
					'zip'			=> $employee_data['employee_zip'],
					'country'		=> $employee_data['employee_country'],
					'phone'			=> $employee_data['employee_phone'],
					'fax'			=> $employee_data['employee_fax'],
					'email'			=> $employee_data['employee_email'],
					'companyID' 	=> $this->company_id,
					'status'		=> 0
		);
		
		$contact_result_id = $this->contact->create( $informations );
		
		if($contact_result_id) {
			//continue. Create an employee record.
			if($employee_data['employee_rdate'] == NULL) {
				$employee_data['employee_rdate'] = '0000-00-00';
			}
			
			$employee_info = array(
					'contactid'	=> $contact_result_id,
					'gender'	=> $employee_data['employee_gender'],
					'sno'		=> $employee_data['employee_ssn'],
					'hdate' 	=> $employee_data['employee_hdate'],
					'rdate' 	=> $employee_data['employee_rdate'],
					'dob'		=> $employee_data['employee_dateofbirth']
			);
			
			$result = $this->insert_data( $employee_info );
			return true; //employee has no primary key index, so result is always false.
		} else {
			throw new Exception('Could not insert contact details for employee');
		}
	}

	/**
 	 *	returns the count of employees
 	 *  to be used for pagination purposes
	*/
    public function count_employees( $company_id ) {

    	$query = $this->db->query("SELECT 
								  COUNT(*) AS employeecount 
								  FROM employee 
								  LEFT JOIN businesscontact 
								  ON businesscontact.contactID = employee.contactid");
								  
		foreach ($query->result() as $row)		{
		   $numemployees =  $row->employeecount;
		}
		return $numemployees;
    }

	/**
	*	Update employee
	*/
	public function update_employee($contact_id, $data) {
			$employee_view_url = $data['backlink'];
            $contact_data = array(
            		'companyID' 	=> $data['companyID'],
            		'name' 			=> $data['name'],
            		'checkname' 	=> $data['checkname'],
            		'address' 		=> $data['name'],
            		'city' 				=> $data['city'],
            		'state' 			=> $data['state'],
            		'zip' 				=> $data['zip'],
            		'country' 		=> $data['country'],
            		'phone' 			=> $data['phone'],
            		'fax' 				=> $data['fax'],
            		'email' 			=> $data['email'],
            		'status' 			=> 0
            );
			//debug
			//print_r($contact_data);
			
			$this->table_name = 'businesscontact';
			$this->primary_key = 'contactID';
			$this->contact->update_contact($contact_id,$contact_data);

			$employee_data = array(
				'gender'      	=> $data['gender'],
				'dob'   	 	=> $data['dob'],
				'sno' 		 	=> $data['sno'],
				'hdate'     	=> $data['hdate'],
				'rdate'     	=> $data['rdate'],
			);
			//debug
			//print_r($employee_data);

			//'inventory' 	  => $product->remaining,
			$this->table_name = 'employee';
			$this->primary_key = 'contactid';
            $this->update_data($contact_id, $employee_data);

            if($this->get_affected_rows() > -1) //still consider no changes made as 'updated'; make sure last query did not fail
            {
       
                log_message('DEBUG', $this->get_last_query());
                if($this->get_affected_rows() > -1)
                {
                        $result = array(
                            'resp'       => 'success',
                            'msg'        => 'Information updated successfully. 
                                            <a class="back-link" href="'.$employee_view_url.'">Back to employee details.</a>'
                        );

                        return $result;
                }
            } 
            else 
            {
                throw new Exception('update employee info processing failed: employee contact_id - '.$contact_id);
            }

          
            return $result;            
    }
	
	/**
	*	Delete employee
	*/
	public function delete_employee( $contact_id ) {
		return $this->delete_data( $contact_id );
	}


	public function get_employee_payschedule($cid) {
		return $this->db->select("p.id, p.cid, p.payschedulename, p.payinterval, p.paycheckdate")
				->from("payschedule p ")
				->where("p.cid", $cid)
				->where("p.status !=",1)
				->get()
				->result();

	}
	
	public function get_employee_payschedule_by_id($ps_id, $cid) {
		$payschedule =  $this->db->select("p.id, p.cid, p.payschedulename, p.payinterval, p.paycheckdate")
				->from("payschedule p ")
				->where("p.cid", $cid)
				->where("p.id", $ps_id)
				->where("p.status !=",1)
				->get()
				->result();
		$ps = array();
		foreach($payschedule as $paysched) {
			$ps['schedname'] 	= $paysched->payschedulename;
			$ps['interval'] 		  	= $paysched->payinterval;
			$ps['checkdate'] 		= $paysched->paycheckdate;
			$ps['id']					= $paysched->id;
			$ps['contact_id']		= $paysched->cid;
		}
		
		return (object) $ps;
		
	}
	public function create_paysched($paysched_data) {
		
		$this->table_name = 'payschedule';
		return $this->insert_data($paysched_data);
	}
	
	public function update_paysched( $id, $paysched ) {
		$this->table_name = 'payschedule';
		$this->primary_key = 'id';
		return $this->update_data($id,$paysched);
	}
	
	public function delete_paysched($id) {
		$this->table_name = 'payschedule';
		$this->primary_key = 'id';
		return $this->delete_data($id);
	}
	
	
	
	public function add_paytype($data) {
		$this->table_name = 'paytype';
		$this->primary_key = 'id';
		return $this->insert_data($data);
	}
	
}