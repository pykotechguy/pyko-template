<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//TODO line 36
class Invoice_Event extends APP_System_Events_Controller
{
    public function get_invoices_list()
    {
        $this->load->library('lists/invoice_queries');
        $list = $this->invoice_queries->get_invoices_list($this->session->userdata('user_company_id'), $this->params['sig'], $this->params['expires'], strtoupper($this->params['status']));

        echo $list;
    }
    
    public function create_invoice()
    {

        $this->load->model('accounts_model','accounts');
        $this->load->model('transaction_model', 'transaction');
        $this->load->model('contact_model', 'contact');

		$customer_name = $this->params['customer_name'];
        $address = $this->params['address'];
        $email = $this->params['email'];
        $country = $this->params['country'];
        $city = $this->params['city'];
        $state = $this->params['state'];
        $zip = $this->params['zip'];
        $duedate = $this->params['duedate'];
        $deduction = $this->params['deduction'];
        $deduction_rate = $this->params['dedrate'];
        $tax_charge = $this->params['taxchg'];
        $is_taxable = $this->params['is_taxed'];
        $currency = $this->params['currency'];

        //invoice data
        $invoice_items = array();
        $categories = $this->params['category']; //array inputs
        $products = $this->params['products'];
        $rates = $this->params['rate'];
        $quantities = $this->params['quantity'];
        $amounts = $this->params['amount'];
        
        //get ID of debit account
        $debit_account = $this->accounts->get_account_id("Accounts Receivable"); 
        $company_id = $this->params['cid'];

        //if there's no contact_id, the ajax did not populate the hidden field
        if(!isset($this->params['contact_id'])) {
            throw new Exception('Business Contact does not exist');
        } else {
            $contact_id = $this->params['contact_id'];     
        }

       
        
        for($i = 0;  $i <= count($categories); $i++ ) {
            //hi joe, temporarily commented this out as it is generating syntax error on my IDE. kindly fix. :) - arvi
            //$invoice_items[''] = 
            //if(!empty($categories[$i] && !empty($products[$i])) && !empty($rates[$i])  && !empty($quantities[$i]) && !empty($amounts[$i]) ) {
             //TODO 
            $credit_account = $this->accounts->get_product_account_id( $company_id , $products[$i] );
            
            $record = array (
                    'companyID' => $company_id,
                    'contactID' => $contact_id,
                    'transtype' => 'invoice',
                    'debitacc' => $debit_account,
                    'creditacc' => $credit_account,
                    'transamount' => $amounts[$i],
                    'isrecurring' => '0',
                    'status' => '0',
                    'purchase_order_number' => 0,
                    'comment' => '',
                    'job_project_client_number' => 0,
                    'currency' => $currency
            );
            
            if(isset($this->params['job_project_client_number'])) {
                $record['job_project_client_number'] = $this->params['job_project_client_number'];
            }

            if(isset($this->params['description'])) {
                $record['description'] = $this->params['description'];
            }

            if(isset($this->params['comment'])) {
                $record['comment'] = $this->params['comment'];
            }

            $product = array(  
                'productID' => $products[$i],
                'quantity' => $quantities[$i],
                'rate' => $rates[$i], 
                'duedate' => $duedate
            );

            //saves record into transaction, save product into trackinvoice
            $trans_result_id = $this->transaction->record_transaction( $record , $product );

            }
            
            /*
            if($result_id) {

                $response = array( 

                    'url'   => $redirect_url
                );
            } else {
                $response = array(
                    'resp' => 'false',
                    'value' => $result_id
                );
            }*/
            $result = array(
                      'resp'  => 'success', 
                      'url' => base_url()
                );
            echo json_encode($result);            
    }
        
               
}