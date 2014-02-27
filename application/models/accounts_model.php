<?php

class Accounts_Model extends APP_Model {

 	public function __construct() 
 	{
		parent::__construct();
		
		$this->primary_key 	= "email";
	}
	
	public function get_company_customers($company_id) 
	{
		//GETTING THE DATAS//
		$this->db->select( 'b.contactID,b.name,b.checkname,b.address,b.city,b.state' );
		$this->db->from('customer AS c');
		$this->db->join('businesscontact AS b','b.contactID = c.contactID');
		
		return $this->db->get();
	}
	
	public function get_company_products($company_id) 
	{
	
		$this->db->select( 'item.productID, item.prodname, item.description, item.accountID, item.rate, item.istaxable, sum(product_inventory.remaining) as inventory');
		$this->db->from('item');
		$this->db->join('product_inventory','item.productID = product_inventory.productID','left');
		$this->db->group_by(array('item.productID','item.prodname','item.description','item.accountID','item.rate','item.istaxable'));
		$this->db->order_by('item.productID','desc');
		
		return $this->db->get();
	}
	
	/**
	 *	@function public function get_company_accounts()
	 *	@description Select products which are in the company's chart of accounts
	*/
	public function get_company_accounts($company_id) 
	{
		$this->db->select( 'account.ID, account.accountname');
		$this->db->from('account');
		//$this->db->join('account','item.accountID = account.ID','left');
		$this->db->where('account.companyID',$company_id);
		$this->db->group_by(array('ID'));
		$this->db->order_by('account.accountname','desc');
			
		return $this->db->get();
	}
	
	/**
	 *	USED TO GET the chart of accounts ID
	*/
	public function get_account_id( $accountname ) 
	{
		$this->db->select( 'account.ID');
		$this->db->from('account');
		//$this->db->join('account','item.accountID = account.ID','left');
		$this->db->where('account.accountname',$accountname);
		return $this->db->get();
	}

	public function get_products( $company_id ) 
	{
		$products = array();
		
		$where = 	"(parentacc in(SELECT id FROM account WHERE parentacc=7)
					 || parentacc IN(SELECT id FROM account WHERE parentacc=8) || parentacc=7 || parentacc=8) AND (companyID='{$company_id}' 
					 || companyID=0) ORDER BY id DESC";

		$this->db->select("id,accountname,accountno")
				 ->from('account')
				 ->where($where);

		//$this->db->join('account','item.accountID = account.ID','left');
		$results = $this->db->get()->result(); 
		
		foreach($results as $product) {
			$products[] = array(
					'id' 	 => $product->id,
				    'value' =>	$product->accountname . " " . $product->accountno
			);
		}
		return $products;
	}
	
	/**
	* Get the company's expense accounts - for pay type accounts
	*/
	public function get_expense_accounts($company_id) {
		$sql ="SELECT id,
								   accountname,
									accountno,
									parentacc 
					FROM account 
					WHERE (parentacc IN (
									SELECT ID 
									FROM account 
									WHERE id=9 
									AND status!=1) 
									|| 
									(parentacc IN (
									SELECT ID 
									FROM account 
									WHERE parentacc IN (
										SELECT ID 
										FROM account 
										WHERE id=9 
										AND status!=1))))
						&& 
						(
										companyid=0 
										OR companyid='{$company_id}'
						) && 
						status!=1";
		$results = $this->db->query($sql)->result(); 
		
		$expenseaccounts = array();
		
		foreach($results as $expense) {
			$expenseaccounts[] = array(
					'id' 	 => $expense->id,
				    'value' =>	$expense->accountname . " " . $expense->accountno
			);
		}
		
		return $expenseaccounts;
		
	}
}