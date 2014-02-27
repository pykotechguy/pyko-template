<?php
class Accounting_model extends APP_Model{
	
	public function __construct(){
		parent::__construct();
		$this->table_name 	= "numberformat";
		$this->primary_key 	= "companyID";
	}
	
	public function get_accounting_info(){
		
		$accounting = $this->get_data( $this->session->userdata( "user_id" ) );
		
		$infomations = array(
			"dateformat"	=> $accounting->dateformat,
			"negative"		=> $accounting->negativenumber,
			"red"			=> $accounting->red,
			"divide"		=> $accounting->divide,
			"cents"			=> $accounting->cents,
			"seperator"		=> $accounting->decimalseparator,
			"seperatornum"	=> $accounting->numberseparator,
			"numberspec"	=> $accounting->numberspecification,
		);
		
		return $infomations;
		
	}

}