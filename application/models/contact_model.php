<?php
/*
 * Vendor model for getting data about company's vendors
 * @author Joe Palala
 * @modified 19:10 06/19/2013
 @ done: added foreign_table_name
		 will join with businesscontact to get_list through basic DB command.
 */
class Contact_Model extends APP_Model {
	
	public $companyID_FK;	
	
	public function __construct(){
		parent::__construct();
		$this->table_name = "businesscontact";
		$this->primary_key 	= "contactID";

	}
	
	public function get_vendor_info( $vendor_id ) {
		$vendor = $this->get_data( $vendor_id );
	}
	/*
	/*
	 * fetch vendors list
	 * start/offset are interchangeable
	*/
	public function fetch_list( $company_id ,  $order_by = '', $limit = '', $start = '') {
		
		$info = array('companyID'  => $company_id );
		
		if( empty( $order_by ) ) {
			$order_by = false;
		}

		if( empty( $limit ) ) {
			$limit = false;
		}

		if( empty( $start) ) {
			$start = false;
		} 

		$vendors = $this->get_list( $info , $order_by, $limit, $start );

		return $vendors;
	}
	/**
 	 *	returns the count of contact list for company
 	 *  to be used for pagination purposes
	*/
    public function count_contacts( $company_id ) {

    	$info = array('companyID'  => $company_id );
		$vendors = $this->count_list( $info );
		return $vendors;
    }

	/**
	 * create the new contact into businesscontacts table
	 * accepts an vendor's details using an array of key-value pairs.
	 * @params array('firstname' => $firstname, ['key' => value ] );
	 * @return resultID created by parent  function
	 */
	public function create( $information ) {
		return  $this->insert_data( $information );
    }
	/**
	*	function to update contact
	*/
	public function update_contact($id, $details) {
		return  $this->update_data($id, $details);
	}
	
	public function delete_contact( $contact_id ) {
		return $this->delete_data( $contact_id );
	}
	
}