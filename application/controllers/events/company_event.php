<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_Event extends APP_System_Events_Controller
{
    public function get_chart_of_accounts_list()
    {
        $this->load->library('lists/company_queries');
        $list = $this->company_queries->get_chart_of_accounts_list($this->session->userdata('user_company_id'), $this->params['sig'], $this->params['expires'], strtoupper($this->params['account_list_type']));

        echo $list;
    }
    
    public function get_account_transactions_list()
    {
        $this->load->library('lists/company_queries');
        $list = $this->company_queries->get_account_transactions_list($this->session->userdata('user_company_id'), $this->params['sig'], $this->params['expires'], $this->params['accid'], $this->session->userdata('user_start_date'), $this->session->userdata('user_end_date'));

        echo $list;
    }    
}

/* End of file company_event.php */
/* Location: ./application/controllers/events/company_event.php */