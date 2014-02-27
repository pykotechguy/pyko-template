<?php
class Client_model extends APP_Model
{
 	public function __construct(){
		parent::__construct();
		$this->table_name 	= 'businesscontact';
		$this->primary_key 	= 'contactID';
	}
    
    /**
     * Clients Section: View Customer Details
     * @param type $customer_id - equivalent to contactID
     * @return mixed object|boolean
     */
	public function get_client_info($customer_id)
	{
        $company_id = $this->session->userdata('user_company_id');
        
        $result = $this->query('SELECT b.*, c.* 
                      FROM businesscontact b
                      LEFT JOIN customer c
                      ON c.contactID = b.contactID
                      WHERE b.contactID = '.$customer_id.'
                      AND b.companyID = '.$company_id.'');
        
        if( ! empty($result))
        {
            $client = current($result);
            
            $information = array('name'            => $client->name,
                                 'check_name'      => $client->checkname,
                                 'address'         => $client->address,
                                 'city'            => $client->city,
                                 'zip'             => $client->zip,
                                 'state'           => $client->state,
                                 'country'         => $client->country,
                                 'phone'           => $client->phone,
                                 'fax'             => $client->fax,
                                 'email'           => $client->email,
                                 'is_taxable'      => $client->istaxable,
                                 'payment_mode'    => $client->paymentmode,
                                 'credit_limit'    => $client->creditlimit,
                                 'ship_address'    => $client->shipaddress);
            
            return (object)$information;
        }
        else
        {
            return FALSE;
        }                     
	}
    
    /**
     * Clients Section: Edit Customer Details
     * Updating client information involves businesscontact and customer table 
     * @param type $client - post parameters
     * @return string json-encoded result for javascript to parse
     */
	public function update($client)
	{
        try
        {
            $customer_id = $client->cid; 
            $company_id = $this->session->userdata('user_company_id');

            //make sure cmpid has not been compromised
            if($client->cmpid == $company_id)
            {
                $information = array('name'            => $client->name,
                                     'checkname'       => $client->check_name,
                                     'address'         => $client->address,
                                     'city'            => $client->city,
                                     'zip'             => $client->zip,
                                     'state'           => $client->state,
                                     'country'         => $client->country,
                                     'phone'           => $client->phone,
                                     'fax'             => $client->fax,
                                     'email'           => $client->email);

                $this->update_data($customer_id, $information);

                if($this->get_affected_rows() > -1) //still consider no changes made as 'updated'; make sure last query did not fail
                {
                    $information = array('istaxable'       => $client->is_taxable,
                                         'paymentmode'     => $client->payment_mode,
                                         'creditlimit'     => $client->credit_limit,
                                         'shipaddress'     => $client->ship_address);

                    $this->table_name = 'customer'; //override default table name
                    $this->update_data($customer_id, $information);
                    
                    log_message('DEBUG', $this->get_last_query());

                    if($this->get_affected_rows() > -1)
                    {
                        $result = array(
                            'resp'       => 'success',
                            'msg'        => 'Information updated successfully. 
                                            <a class="back-link" href="'.$client->customer_view_url.'">Back to customer details.</a>'
                        );

                        return $result;
                    }
                }   
            }
            
            throw new Exception('update client info processing failed: customer_id - '.$customer_id);
        }
        catch(Exception $e)
        {
            //default response for failed processing
            $result = array(
                'resp'		=> 'fail',
                'msg'		=> 'Unable to update information. '.SYSTEM_TECH_SUPPORT_MESSAGE.' 
                                 <a class="back-link" href="'.$client->customer_view_url.'">Back to customer details.</a>'
            );
            
            log_message('ERROR', $e->getMessage());

            return $result;            
        }
	}    
	
	

}

/* End of file client_model.php */
/* Location: ./application/models/client_model.php */
/* @modified 07/02/2013 - jose palala */