<?php
/*
 * Vendor model for getting data about company's vendors
 * @author Joe Palala
 * @modified 19:10 06/19/2013
 @ done: added foreign_table_name
		 will join with businesscontact to get_list through basic DB command.
 */
class Vendor_Model extends APP_Model{
	
	
	/**
	 *	function constructor
	 * initializes and calls parent constructor
	*/
	public function __construct(){
		parent::__construct();
		$this->table_name 	= "vendor";
		$this->primary_key 	= "contactID";
		//load the other model
		$this->load->model('contact_model','contact');
	}
	
	/**
	 *	function get_vendor_info
	 * get the vendors details for a specific vendor_id (contactID in vendor table) 
	 *	@params (int) $vendor_id - id of the vendor (contactID in businesscontact table)
	 * @return (array) - vendor's details
	*/
	public function get_vendor_info( $vendor_id ) {
			//temporarily set the values of these
			$this->table_name 	= "businesscontact";
			$this->primary_key  = "contactID";
			return $this->get_data( $vendor_id );
	}	
	
	/**
	 *	function get_vendors
	 * get the vendors for the company 
	 *	@params (int) $company_id 
	 * @return (array) $vendors
	*/
	public function get_vendors( $company_id ) {
		$vendors = $this->get_list( $company_id ); 
	}
	
	/**
	 * 	function create
	 *  @description Creates a new contact
	 *	@params $data an array of key-value pairs. 
	 *			(ex. array('firstname' => $firstname, ['key' => value ] );
	 */
	public function create( $data  ) {
		//insert into contacts and get result ID
		
		$result_id = $this->contact->create( $data );
		
		//insert into 'vendor' table the newly created contactID
		$vendor_information = array(
			"contactID" =>  $result_id,
			"taxID" => ""
		);
		
		//insert into vendor table (which does not have a primary key..)
		if($result_id) {
			$this->table_name = 'vendor';
			$result = $this->insert_data( $vendor_information );
			//assume it inserted. (tested this already)
			return TRUE;
		}
    }
	
	/**	
	 *  function update
	 *  @description Updates an existing contact's details
	 *	@params $ID of primary Key, 
     *			$details (key value pair)
	*/
	public function update( $id,  $details ) {
		//calls other model to update contact details
		return  $this->contact->update_contact($id, $details);
	}
	
	/**
	 * @description Delete vendor through contact ID function
	 * @vendor
	 *
	*/
	public function delete_vendor( $vendor_id ) {
		//delete from vendors list
		$this->delete_data( $vendor_id );
		
		//delete from contacts list
		return $this->contact->delete_contact($vendor_id);
		
	}
	
	/*STUB to implement for total purchase order list */
	public function count_puchase_orders() {
	
	}
	
	/**
	 * get_purchase_order_details
	 * 	gets the data regarding a Purchase Order
	* @params PurchaseID == transactionID
	 *				  CompanyID company ID 
	*/
	public function get_purchase_order_details($companyID, $purchaseID) {
		$result = $this->db->select('t.ID as id,
								  t.transdate as purchase_date,
								  t.purchase_order_number as purchase_order_number,
							      tv.duedate,
								  b.name as vendor_name,
								  b.address as vendor_address,
								  b.city as vendor_city,
								  b.state as vendor_state,
								  b.zip as vendor_zip,
								  b.country as vendor_country,
								  b.phone as vendor_phone,
								  b.email as vendor_email,
								  c.name as company_name,
								  c.country as company_country,
								  c.address as company_address,
								  c.city as company_city,
								  c.state as company_state,
								  c.zip as company_zip,
								  c.email as company_email,
								  c.phone as company_phone,
								  c.shipping_address,
								  c.shipping_city,
								  c.shipping_zip,
								  c.shipping_state,
								  c.shipping_country,
								  t.description',FALSE)
				->from( 'transaction t' )
				->join( 'trackinvoice tv', 't.transactionID = tv.transactionID','left' )
				->join( 'businesscontact b','t.contactID = b.contactID' , 'left' )
				->join( 'company c', 't.companyID = c.ID'  , 'left'  )
				->where( 't.transactionID', $purchaseID );
				
		return $result->get()->result();
				  
	}
	
	/**
	 * Get related Purchase OrderID's Information
	*/
	public function get_related_credit_purchase( $company_id, $purchase_id) {
		$result = $this->db->select("
						  t.transamount AS total_amount,
						  t.transdate AS transaction_date,
						  b.name AS vendor_name",FALSE)
						->from( 'purord_rel_credpur r' )
						->join( 'transaction t','t.transactionID = r.credit_purchase_id','left' )
						->join( 'businesscontact b','b.contactID = t.contactID', 'left' )
						->where( 't.companyID' , $company_id )
						->where( 'r.purchase_order_id',$purchase_id)
						->where( 't.transtype','credit purchase');
						
		return $result->get()->result();	
	}
}

/* @modified 07/02/2013 */