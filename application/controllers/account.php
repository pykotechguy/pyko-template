<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {
    
	public function __construct(){
		
		parent::__construct();
		if(!isset($_SESSION['language'])) {
			//just load english
			$this->lang->load('japanese','japanese');
		}
		$this->header['side_menus'] 	= array(
			"login" 		=> $lang['Login'],
			"register"		=> $lang['Registration']
		);
	}
	
	public function index()
	{
        //Setup permissions
        $permissions = //TODO - default redirect url must be determined by permission - first allowed section for user... for now dashboard
        $default_redirect_url = 'dashboard';

        $redirect_url = ($this->session->userdata('user_recently_visited_url') &&  ! strpos($this->session->userdata('user_recently_visited_url'), 'logout')   &&  ($this->session->userdata('user_recently_visited_url') != base_url())) ? $this->session->userdata('user_recently_visited_url') : $default_redirect_url;
		$redirect_url = ($redirect_url == base_url( 'dashboard' )) ? $default_redirect_url : $redirect_url;
        
        redirect( $redirect_url );
	}
    
    public function login()
    {
		$login['sig'] 			= $this->app_signature;
        $login['expires'] 		= $this->request_expires;
		
        $this->header['logged_user'] 	= FALSE;
        $this->header['section'] 		= 'Login';
        $this->header['page'] 		= 'login';        
		    
        $this->footer['js'] = array(
			'assets/js/validation/login.js',
            'assets/js/validation/validation.js'
		);
        
		$this->_render_view( 'login', $login );
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        $this->redirect_to_login();        
    }
	
	public function register(){
		
		$this->header['logged_user'] 	= FALSE;
        $this->header['section'] 		= 'Register';
        $this->header['page'] 			= 'register';        
        $this->header['side_menus'] 	= array(
			"login" 		=> "Login",
			"registration" 	=> "Registration"
		);
		    
        $this->footer['js'] = array(
			'assets/js/validation/validation.js',
            'assets/js/validation/register.js'
		);
        
		$this->_render_view( 'register' );
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
