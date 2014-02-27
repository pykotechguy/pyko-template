<?php
class Customer_model extends APP_Model
{
 	public function __construct(){
		parent::__construct();
		$this->table_name 	= 'businesscontact';
		$this->primary_key 	= 'contactID';
	}
    
    /**
     * Customers Section: View Customer Details
     * @param type $customer_id - equivalent to contactID
     * @return mixed object|boolean
     */
	public function get_customer_info($customer_id)
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
            $customer = current($result);
            
            $information = array('name'            => $customer->name,
                                 'check_name'      => $customer->checkname,
                                 'address'         => $customer->address,
                                 'city'            => $customer->city,
                                 'zip'             => $customer->zip,
                                 'state'           => $customer->state,
                                 'country'         => $customer->country,
                                 'phone'           => $customer->phone,
                                 'fax'             => $customer->fax,
                                 'email'           => $customer->email,
                                 'is_taxable'      => $customer->istaxable,
                                 'payment_mode'    => $customer->paymentmode,
                                 'credit_limit'    => $customer->creditlimit,
                                 'ship_address'    => $customer->shipaddress);
            
            return (object)$information;
        }
        else
        {
            return FALSE;
        }                     
	}
    
    /**
     * Customers Section: Edit Customer Details
     * Updating customer information involves businesscontact and customer table 
     * @param type $customer - post parameters
     * @return string json-encoded result for javascript to parse
     */
	public function update($customer)
	{
        try
        {
            $customer_id = $customer->cid; 
            $company_id = $this->session->userdata('user_company_id');

            //make sure cmpid has not been compromised
            if($customer->cmpid == $company_id)
            {
                $information = array('name'            => $customer->name,
                                     'checkname'       => $customer->check_name,
                                     'address'         => $customer->address,
                                     'city'            => $customer->city,
                                     'zip'             => $customer->zip,
                                     'state'           => $customer->state,
                                     'country'         => $customer->country,
                                     'phone'           => $customer->phone,
                                     'fax'             => $customer->fax,
                                     'email'           => $customer->email);

                $this->update_data($customer_id, $information);

                if($this->get_affected_rows() > -1) //still consider no changes made as 'updated'; make sure last query did not fail
                {
                    $information = array('istaxable'       => $customer->is_taxable,
                                         'paymentmode'     => $customer->payment_mode,
                                         'creditlimit'     => $customer->credit_limit,
                                         'shipaddress'     => $customer->ship_address);

                    $this->table_name = 'customer'; //override default table name
                    $this->update_data($customer_id, $information);
                    
                    log_message('DEBUG', $this->get_last_query());

                    if($this->get_affected_rows() > -1)
                    {
                        $result = array(
                            'resp'       => 'success',
                            'msg'        => 'Information updated successfully. 
                                            <a class="back-link" href="'.$customer->customer_view_url.'">Back to customer details.</a>'
                        );

                        return $result;
                    }
                }   
            }
            
            throw new Exception('update customer info processing failed: customer_id - '.$customer_id);
        }
        catch(Exception $e)
        {
            //default response for failed processing
            $result = array(
                'resp'		=> 'fail',
                'msg'		=> 'Unable to update information. '.SYSTEM_TECH_SUPPORT_MESSAGE.' 
                                 <a class="back-link" href="'.$customer->customer_view_url.'">Back to customer details.</a>'
            );
            
            log_message('ERROR', $e->getMessage());

            return $result;            
        }
	}    
}

/* End of file customer_model.php */
/* Location: ./application/models/customer_model.php */