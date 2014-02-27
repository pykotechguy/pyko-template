<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends APP_System_Controller {
	
	public function __construct(){
		
		parent::__construct();	
		
		$this->header['logged_user'] 	= TRUE;
		$this->header['section'] 		= 'My Settings';
		$this->header['side_menus'] 	= array(
			"settings" 				=> "Company Preferences",
			"settings/accounting" 	=> "Accounting Preferences",
			"settings/email" 		=> "Email Preferences",
			"settings/users" 		=> "Users",
		);
	
		//LOADING DEFAULT MODELS//
		$this->load->model('company_model', 'company');		
	}
	
	public function index()
	{
		//SETTING DATAS//
		$company	= $this->company->get_company_info();
		$this->header['page'] 		= 'settings';
		
		//RENDER VIEW//
		$this->_render_view( 'settings', $company );
	}
	
	public function accounting(){
		
		//LOADING ON MODELS//
		$this->load->model('accounting_model', 'accounting');
		$this->load->helper('accounting');
	
		//SETTING DATAS//
		$company	= $this->company->get_accounting_info();
		$accounting = $this->accounting->get_accounting_info();
		$this->header['page'] 		= 'settings/accounting';
		
		//RENDER VIEW//
		$this->_render_view( 'settings/accounting', array_merge( $company, $accounting ) );
	}
	
	public function email(){
	}
	
	public function users(){
		
		//LOADING MODEL//
		$this->load->model('user_model', 'user');
		
		//SETTING DATA//
		$users = $this->user->get_users();
		$this->header['page'] 		= 'settings/users';
		
		//RENDER VIEW//
		$this->_render_view( 'settings/users', array( "users" => $users ) );
	}
}

/* End of file settings.php */
/* Location: ./application/controllers/settings.php */