<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_event extends APP_System_Events_Controller {
	
    public function get_products_list()    {
    
        $this->load->library('lists/product_queries');
        $list = $this->product_queries->get_products_list($this->session->userdata('user_company_id'), $this->params['sig'], $this->params['expires']);

        echo $list;
    }

    
}