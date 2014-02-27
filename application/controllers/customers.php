<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends APP_System_Controller 
{
	public function __construct() 
    {
		parent::__construct();

		$this->header['section']    = 'Customers';
		$this->header['side_menus'] = array(
			  'customers/customer_list' 	=> 'Customer List',
			  'customers/job_estimate' 	=> 'Job Estimate',
			  'customers/estimate_list' 	=> 'Estimate List'
		);
	}
    
	public function index()
	{
        $this->customer_list();
	}
    
    public function overview()
    {
        $this->header['page'] 		= 'customers/overview';
        
        $this->_render_view('customers/overview', $this->page);
        
    }
    
    public function customer_list()
    {
        $this->header['page'] 		= 'customers/customer_list';
        $this->header['plugin']     = 'datatables';
        $this->footer['plugin']     = 'datatables';
        
        $this->page['section'] = 'Customer List';

        $this->_render_view('customers/customer_list', $this->page);
    }
    
    public function customer_view()
    {
        $this->header['page'] 		= 'customers/customer_list';
        
        $this->page['section'] = 'Customer Details';
        $this->load->model('customer_model', 'customer');
        $this->page['customer'] = $this->customer->get_customer_info($this->params['cid']);
        
        $query_params = array('id'      => mt_rand(2000, 9999),
                              'sig'     => $this->params['sig'],
                              'cid'     => $this->params['cid'],
                              'cmpid'   => $this->params['cmpid'],
                              'expires' => $this->params['expires']);
        
        $this->page['customer_edit_url'] = 'customers/customer_edit?'.http_build_query($query_params);
        $this->page['customer_list_url'] = 'customers/customer_list';
        
        $this->_render_view('customers/customer_view', $this->page);
    }
    
    public function customer_edit()
    {
        $this->header['page']   = 'customers/customer_list';
        $this->footer['js'] = array(
			'assets/js/validation/customer.js',
            'assets/js/validation/validation.js'
		);
        
        $this->page['section'] = 'Edit Customer Details';
        $this->load->model('customer_model', 'customer');
        $this->page['customer'] = $this->customer->get_customer_info($this->params['cid']);
        $this->page['id'] = $this->params['id'];
        $this->page['cid'] = $this->params['cid'];
        $this->page['cmpid'] = $this->params['cmpid'];
        $this->page['form_action_url'] = 'events/customer_event/update';
        
        $query_params = array('id'      => mt_rand(2000, 9999),
                              'sig'     => $this->params['sig'],
                              'cid'     => $this->params['cid'],
                              'cmpid'   => $this->params['cmpid'],
                              'expires' => $this->params['expires']);
        
        $this->page['customer_view_url'] = 'customers/customer_view?'.http_build_query($query_params);        
        
        $this->load->helper('accounting');
        
        $this->_render_view('customers/customer_edit', $this->page);        
    }  
	
	/**
	 *	Estimate List
	 *	@note estimate - list handled now purely through event controller (Ajax- datatables plugin)
	 */
	
	public function estimate_list() {
		$this->header['page'] 		= 'customers/estimate_list';
        $this->header['plugin']     = 'datatables';
        $this->footer['plugin']     = 'datatables';
        
        $this->page['section'] = 'Estimate List';

        $this->_render_view('customers/estimate_list', $this->page);
	}
	
	/**
	 *	Edit Estimate
	 * Method STUB
	 *	@note estimate-list data is handled purely through event controller (Ajax- datatables plugin) 
	 */
	public function estimate_edit() {
		$this->header['page'] 		= 'customers/estimate_list';
        
        $this->page['section'] = 'Estimate List';
		
        $this->_render_view('customers/estimate_edit', $this->page);
	}	
	

	
}

/* End of file customers.php */
/* Location: ./application/controllers/customers.php */