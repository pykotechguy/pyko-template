<?php

class Invoice_Model extends APP_Model {

 	public function __construct(){
		parent::__construct();
		
		$this->primary_key 	= "email";
	}
	
	public function get_company_customers($company_id) {
		
		
		//GETTING THE DATAS//
		$this->table_name 	= "customer";
		$this->db->select( 'name, email, mobile, role, status' );
		$this->db->from($this->table_name);
		$this->db->join('businesscontact','businesscontact.contactID = '. $this->table_name . '.contactID');
		
		return $this->get();
	}
	
	public function get_company_products($company_id) {
		
		//GETTING THE DATAS//
		$this->db->select( 'i.productID, prod name, description, accoundID, rate, istaxable, sum(p.remaining) as inventory');
		$this->db->from('item AS i');
		$this->db->join('busesscontact','i.companyID = '. $company_id);
		$this->db->group_by(array('i.productID','prodname','description','accountID','rate','istaxable'));
		$this->db->order_by('i.productID','desc');
		return $this->get();
		
	
	}
}