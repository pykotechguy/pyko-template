<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_Event extends APP_System_Events_Controller
{
    public function get_customers_list()
    {
        $this->load->library('lists/customer_queries');
        $list = $this->customer_queries->get_customers_list($this->session->userdata('user_company_id'), $this->params['sig'], $this->params['expires']);

        echo $list;
    }
	
    public function get_estimate_list()
    {
		$this->load->library('lists/customer_queries');
		

		$list = $this->customer_queries->get_estimate_list($this->session->userdata('user_company_id'), $this->params['sig'], $this->params['expires']);
		
        echo $list;
    }
	
    public function update()
    {
        $result = array(
            'resp'		=> 'fail',
            'msg'		=> print_r($this->params, TRUE)
        );
        
		$contact_id = $this->params['cid'];
        $company_id = $this->params['cmpid'];
        
        $this->load->model('customer_model', 'customer');
        
        $result = $this->customer->update((object)$this->params);
        
		echo json_encode($result);        
    }        
}