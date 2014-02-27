<?php
class Account_model extends APP_Model
{
 	public function __construct(){
		parent::__construct();
		$this->table_name 	= "account";
		$this->primary_key 	= "ID";
	}
    
	public function get_account_info($account_id)
	{
        $account = $this->get_data($account_id);
        
        if($account)
        {
            $information = array(
                "company_id"	 => $account->companyID,
                "id"             => $account->ID,
                "no"             => $account->accountno,
                "name"           => $account->accountname,
                "description"	 => $account->description,
                "parent_account" => $account->parentacc,
                "status"		 => $account->status,
                "currency"       => $account->currency
            );

            return (object)$information;        
        }
        else
        {
            return FALSE;
        }                     
	}
}

/* End of file account_model.php */
/* Location: ./application/models/account_model.php */