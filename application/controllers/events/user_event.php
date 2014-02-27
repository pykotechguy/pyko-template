<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Event extends APP_System_Events_Controller
{
	public function login()
    {
        $email = $this->params['email'];
        $password = $this->params['password'];        
		
		//TODO - use core model; redo retrieving of credentials
        $this->load->model('user_model', 'user');
		$user = $this->user->get_user_by_login($email, $password, TRUE);
        
        if($user)
        {
            //Setup permissions
            $permissions = //TODO - default redirect url must be determined by permission - first allowed section for user... for now dashboard
            $default_redirect_url = base_url('dashboard');
            
            $redirect_url = ($this->session->userdata('user_recently_visited_url') &&  ! strpos($this->session->userdata('user_recently_visited_url'), 'logout')  && ($this->session->userdata('user_recently_visited_url') != base_url())) ? $this->session->userdata('user_recently_visited_url') : $default_redirect_url;
            $redirect_url = ($redirect_url == base_url('dashboard')) ? $default_redirect_url : $redirect_url;
            
            $result = array( 
				'resp' 	=> 'success', 
				'url'	=> $redirect_url
			);
		} 
        else 
        {
			$result = array(
				'resp'		=> 'fail',
				'msg'		=> 'Invalid email address or password'
			);
		}
		
		echo json_encode($result);
	}
	
	public function register(){
		$cname 		= $this->params['cname'];
		$email 		= $this->params['email'];
        $fname 		= $this->params['fname'];
		$lname 		= $this->params['lname'];
		$password 	= $this->params['password'];
		
		//LOAD MODEL//
		$this->load->model('user_model', 'user');
		$this->load->model('company_model', 'company');
         
        if( $this->user->user_exists( $email ) ){
			$result = array(
				'resp'		=> 'fail',
				'msg'		=> 'Email address already exist'
		  	);
        } else {
          
        	//ENCODE COMPANY DATA
          	$company_data = array(
            	"createddt" => date( "Y-m-d" ),
            	"name"		=> $cname,
            	"email"		=> $email, 
		  	);
          
			$company_id = $this->company->register_company( $company_data );
			
			//ENCODE USER
			$user_data = array(
				"companyID"   => $company_id,
				"name"		  => $fname . " " . $lname,
				"email"		  => $email,
				"role"		  => 'admin',
				"password"	  => md5( $password ),
				"status"      => "active"
			);
			$this->user->register_user( $user_data );
			
			$result = array( 
				'resp' 	=> 'success', 
				'url'	=> base_url('login')
			);
        }
		
		echo json_encode( $result );
	}
}