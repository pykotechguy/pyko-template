<?php
/**
 * PurchaseOrder model for getting subtotals, totals, and tax, and deduction 
 * @author Joe Palala
 * @modified 15:00 07/03/2013
 * @ purely for the calculations 
 * @note based on old_numia  vendor/includes/invoice_record.php
 */
class Purchaseorder_model extends APP_Model{
	
	public $tax;
	public $purchase_date;
	public $totalAmount;
	public $companyID;
	public $subtotal;
	public $lineItems;
	public $transactionId;
	public $purchaseID;
	public $deduction;
	/**
	 *	function constructor
	 * initializes and calls parent constructor
	*/
	public function __construct(){
		parent::__construct();
		$this->table_name 	= "transaction";
		$this->primary_key 	= "transactionID";
		
		
	}
	/*initialize some variables used throughout the model */
	public function initialize($transactionID,$purchaseDate) {
		$this->companyID = $this->session->userdata( 'user_company_id' );
		$this->transactionId = $transactionID;
		$this->purchase_date = $purchaseDate;
		
	}
	
	public function calculate_PO_total_amount(){
	// Getting of the total amount
		$this->db->select( 'transamount as total_amount' )
					->from('transaction')
					->where('ID',  $this->transactionId) 
					->where('transtype','purchase order' )
					->where('transdate',$this->purchase_date)
					->where('companyID',$this->companyID)
					->where('debitacc' ,'100')
					->where('creditacc','33');
		
		//CreditAcc 33 => Account Payable//
					
		$result = $this->db->get()->result();
        foreach($result as $row) {
			$row->total_amount;
			//Transfering of total amount//
			$this->totalAmount = $row->total_amount;
		}
		
		
	}
	
	public function calculate_PO_tax(  ){
	// Getting of the total amount
		$this->db->select( 'transamount as tax' )
					->from('transaction')
					->where('ID',  $this->transactionId) 
					->where('transtype','purchase order' )
					->where('transdate',$this->purchase_date)
					->where('companyID',$this->companyID)
					->where('debitacc' ,'100')
					->where('creditacc','38'); //CreditAcc 38 => Sales Tax Payable//
		
		//CreditAcc 33 => Account Payable//
					
		$result = $this->db->get()->result();
        foreach($result as $row) {
			//set the tax
			$this->tax = $row->tax;
		}
		
	}
	
	public function calculate_PO_deduction() {
	
		$this->db->select( 'transamount as deduction' )
					->from('transaction')
					->where('ID',  $this->transactionId) 
					->where('transtype','purchase order' )
					->where('transdate',$this->purchase_date)
					->where('companyID',$this->companyID)
					->where('debitacc' ,'100')
					->where('creditacc','51'); //CreditAcc 51 => Discount & Refunds//
				$result = $this->db->get()->result();
		
		
		foreach($result as $row) {
				$this->deduction = $row->deduction;
		}
		
		//Set the Subtotal//
		$this->subtotal = ( $this->totalAmount + $this->deduction ) - $this->tax ;
		return true;
	}
		
		public function set_PO_line_items($purchaseID) {
        $sql = "SELECT
				  t.productID,
				  t.quantity,
				  t.rate,
				  i.companyID,
				  i.prodname,
				  s.amount
				FROM
				  trackinvoice t,
				  item i,
				  (
					SELECT
					  t.transamount as amount,
					  t.productID
					FROM
					  transaction t
					WHERE
						  t.transtype='purchase order'
						  AND
						  t.ID = '".$this->transactionId."'
						  AND
						  t.transdate = '".$this->purchase_date."'
						  AND
						  t.companyID = '1'
						  AND
						  t.creditacc = '100'
				  ) s
				WHERE
				  t.transactionID = '".$purchaseID."'
				  AND
				  t.productID = i.productID
				  AND
				  t.productID = s.productID
				  AND
				  i.companyID = '".$this->companyID."'";
		
        $result = $this->db->query($sql);

        $this->lineItems = array();

        if ($result->num_rows() > 0) {
            foreach($result->result() as $row ) {
                $lineItem = new InvoiceLineItem();

                $lineItem->productID = $row->productID;
				$lineItem->description = $row->prodname;
                $lineItem->quantity = $row->quantity;
				$lineItem->rate = $row->rate;
				$lineItem->amount = $row->amount;
				
                $this->lineItems[] = $lineItem;
            }
        }

        return true;
    }
}

/** File Purchaseorder_model.php*/
/** @author joe @modified 07/03/2013 15:29 */