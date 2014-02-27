<?php

class Transaction_model extends APP_Model
{
 	public function __construct(){
		parent::__construct();
		
        $this->table_name 	= 'transaction';
		$this->primary_key 	= 'transactionID';


	}
    
    /**
     * record transaction
     * added throwable exception
    */
    public function record_transaction($transaction,$product) {
        //need to invoke $this->invoicing since $this->invoice would already be taken by invoice controller
        $this->load->model('invoice_model','invoicing');
        
        $result_id = $this->db->insert_data($transaction);
        if(!$result_id) {
            throw new Exception("DB Error - Record was not saved");
        } else {
            //add transactionID to product record to insert to invoice
            $product['transactionID'] = $result_id;
            
            //continue and save to trackinvoice table
            try {
                $this->invoicing->record_track_invoice($product);
            } catch(Exception $e) {
                echo $e->getMessage();
                log_message('error', 'Transaction was not recorded');
            }
        }

    }
	
	public function get_invoice_number(){
		$company_id = $this->session->userdata('user_company_id');
		
		$condition = array( 
			"companyID"  => $company_id, 
			"transtype"	  => "invoice",
			"debitacc"	  => "11"
		);
		
		$record = $this->get_list( $condition, "transactionID DESC", 1 );
		
		if( !empty( $record ) )
		{
		  $record = current( $record );
		  list( $label,$number ) = explode( "-", $record->description );
		  $number ++;
		  
		  return $label . "-" . $number;
		  
		} else {
		  return "INV-1";
		}
	}
}

/* End of file transaction_model.php */
/* Location: ./application/models/transaction_model.php */