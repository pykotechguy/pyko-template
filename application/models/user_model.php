<?php
class User_model extends APP_Model
{
 	public function __construct(){
		parent::__construct();
		$this->table_name 	= "useraccount";
		$this->primary_key 	= "email";
	}
    
	public function get_user_by_login( $email, $password, $sessionize = FALSE )
	{
        $password 	= md5($password);
		$condition	= array(
			'email' 	=> $email,
			'password'	=> $password
		);
		$results 	= $this->get_list($condition);
        
		if( ! empty($results))
        {
			$user_info = current($results);
            
            //get start date and end date based on current month and fiscal month
            $this->load->model('company_model', 'company');
            $user_company_info = $this->company->get_accounting_preferences($user_info->companyID);

            $current_month = date("m");
            
            if($current_month < $user_company_info->fiscal_month) 
            {	
                $start_date = date("Y-m-d",mktime(0, 0, 0, $user_company_info->fiscal_month, 1,  date("Y")-1)); 
                $end_date   = date("Y-m-d",mktime(0, 0, 0, $user_company_info->fiscal_month, 0,  date("Y")));
            } 
            else if($current_month > $user_company_info->fiscal_month)
            {
                $start_date = date("Y-m-d",mktime(0, 0, 0, $user_company_info->fiscal_month, 1,  date("Y"))); 
                $end_date   = date("Y-m-d",mktime(0, 0, 0, $user_company_info->fiscal_month, 0,  date("Y")+1));
            }
            else if($current_month == $user_company_info->fiscal_month)
            {
                $start_date = date("Y-m-d",mktime(0, 0, 0, $user_company_info->fiscal_month, 1,  date("Y")));
                $end_date   = date('Y-m-d', strtotime("-1 day +12 months $start_date"));
            }            
            
			if( $sessionize ){	
				// Setup logged user session
				$session_data = array(
				   'user_name'     		=> $user_info->name,
				   'user_email'       	=> $user_info->email,
				   'user_permissions' 	=> $user_info->role,
				   'user_id'           	=> $user_info->companyID,
                   'user_company_id'    => $user_info->companyID,
				   'user_logged' 		=> TRUE,
                   'user_start_date'    => $start_date,
                   'user_end_date'      => $end_date 
				);
                
                log_message('ERROR', http_build_query($session_data));
                log_message('ERROR', $current_month.' '.$user_company_info->fiscal_month);
				$this->session->set_userdata($session_data);
			}
            return $user_info;
        }
        else
        {
            return FALSE;
        }                     
	}
	
	public function get_users(){
		
		//CONDITIONS//
		$condition		= array(
			"companyID" => $this->session->userdata( "user_id" )
		);
		
		//GETTING THE DATAS//
		$this->db->select( 'name, email, mobile, role, status' );
		return $this->get_list( $condition, "name ASC" );
	}
    
    public function register_user( $data ){
      return $this->insert_data( $data );
    }
    
    public function user_exists( $email ){
      return $this->get_data( $email );
    }
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */