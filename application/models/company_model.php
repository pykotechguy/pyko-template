<?php
class Company_model extends APP_Model{
	
	public function __construct(){
		parent::__construct();
		$this->table_name 	= "company";
		$this->primary_key 	= "ID";
	}	
	
	public function get_company_info(){
		
		$company = $this->get_data( $this->session->userdata( "user_id" ) );
		
		$infomations = array(
			'logo'			=> ( empty( $company->company_logo ) ? $company->company_logo : "http://dev.numia.biz/company/logos/" . $company->company_logo ),
			"company" 		=> $company->name,
			"website"		=> $company->website,
			"email"			=> $company->email,
			"phone"			=> $company->phone,
			"country"		=> $company->country,
			"city"			=> $company->city,
			"street"		=> $company->address,
			"state"			=> $company->state,
			"zipcode"		=> $company->zip,
		);
		
		return $infomations;
	}
	
	public function get_accounting_info(){
		$company = $this->get_data( $this->session->userdata( "user_id" ) );		
		
		$infomations = array(
			"country"		=> $company->country,
			"currency"		=> $company->currency,
			"fiscalmonth"	=> $company->fiscalmonth,
			"itmonth"		=> $company->itmonth,
			"closebook"		=> $company->closebook,
			"salestax"		=> $company->salestax,
			"taxrate"		=> $company->taxrate,
			"due_30_days"	=> $company->due_thirty_days,
			"due_60_days"	=> $company->due_sixty_days,
			"due_90_days"	=> $company->due_ninety_days,
			"over_90_days"	=> $company->due_over_ninety_days,
		);
		
		return $infomations;
	}
    
    public function register_company( $data ){
      return $this->insert_data( $data );
    }
    
    public function get_accounting_preferences($company_id = FALSE)
    {
        if( ! $company_id)
        {
            $company_id = $this->session->userdata('user_company_id');
        }    
        
        $result = $this->query("SELECT 
                                    month(str_to_date(fiscalmonth,'%M')) AS fiscal_month, 
                                    month(str_to_date(itmonth,'%M')) AS it_month, currency 
                                FROM 
                                    company 
                                WHERE ID=$company_id");
        
        if( ! empty($result))
        {
            $company = current($result);
            
            $information = array('fiscal_month'    => $company->fiscal_month,
                                 'it_month'        => $company->it_month,
                                 'currency'        => $company->currency);
            
            return (object)$information;           
        }
    }        
}