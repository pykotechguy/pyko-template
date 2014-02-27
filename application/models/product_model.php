<?php
class Product_model extends APP_Model
{
 	public function __construct(){
		parent::__construct();
		$this->table_name 	= 'item';
		$this->primary_key 	= 'productID';
	}
    
    /**
     * Products Section: View Customer Details
     * @param type $product_id - equivalent to productID
     * @return mixed object|boolean
     */
	public function get_product_info( $product_id )
	{
        $company_id = $this->session->userdata('user_company_id');
		if(!$company_id) {
			throw new Exception('Unable to get company_id');
		}
        
        $this->db->select("p.productID,p.accountID,p.companyID,p.prodname, p.description, p.rate, p.istaxable, i.inventorydate ,i.remaining,a.accountname, a.accountno")
				 ->from("item p")
				 ->join("product_inventory i","p.productID = i.productID","left")
				 ->join("account a","p.accountID = a.ID","left")
				 ->where("p.productID = '" . $product_id . "'")
				 ->where("p.companyID = '" . $company_id . "'");
		$result = $this->db->get()->result();		 
		if( !empty($result))
        {
            $product = current($result);
            
			$information = array(
				'pid'			  => $product->productID,
                'name'            => $product->prodname,
                'description'     => $product->description,
				'accountname' 	  => $product->accountname,
				'accountno'	  => $product->accountno,
				'accountID' 	  => $product->accountID,
                'rate'            => $product->rate,
                'istaxable'       => $product->istaxable,
        		'inventory' 	  => $product->remaining,
                'inventorydate'   => $product->inventorydate
            );
			//var_dump($information);
			
            return (object)$information;
        }
        else
        {
            return FALSE;
        }                     
	}
    
    /**
     * TODO! Products Section: Edit Customer Details
     * Updating product information involves businesscontact and customer table 
     * @param type $product - post parameters
     * @return string json-encoded result for javascript to parse
     */
	public function update($product)
	{
        try
        {
            $company_id = $product->companyID; 
			$product_id = $product->productID; 
			
			$information = array(
				'productID'     => $product->pid,
				'prodname'      => $product->prodname,
				'description'   => $product->description,
				'accountID'	    => $product->accountID,
				'rate'          => $product->rate,
				'istaxable'     => $product->istaxable
			);

			//'inventory' 	  => $product->remaining,
            $this->update_data($product_id, $information);

            if($this->get_affected_rows() > -1) //still consider no changes made as 'updated'; make sure last query did not fail
            {
       
                $this->update_data($product_id, $information);
                log_message('DEBUG', $this->get_last_query());
                if($this->get_affected_rows() > -1)
                {
                        $result = array(
                            'resp'       => 'success',
                            'msg'        => 'Information updated successfully. 
                                            <a class="back-link" href="'.$product->product_view_url.'">Back to product details.</a>'
                        );

                        return $result;
                }
            } 
            else 
            {
                throw new Exception('update product info processing failed: product_id - '.$product_id);
            }
        }
        catch(Exception $e)
        {
            //default response for failed processing
            $result = array(
                'resp'		=> 'fail',
                'msg'		=> 'Unable to update information. '.SYSTEM_TECH_SUPPORT_MESSAGE.' 
                                 <a class="back-link" href="'.$product->customer_view_url.'">Back to customer details.</a>'
            );
            //log error
            log_message('ERROR', $e->getMessage());

            return $result;            
        }
	}  

     /**
     * Products Section: Create Customer Details
     * Updating product information involves businesscontact and customer table 
     * @param type $product - (array) post params
     * @return string true or return false
     */
    public function create($product_information)
    {

        try { 
            $this->insert_data( $product_information);
			
			if($product_information['startingInventory'] > 0) {
				$inventory_info = array(
					'companyID' 			=> $product_information['companyID'],
					'productID' 		    => $product_information['productID'],
					'total' 				    => $product_information['startingInventory'],
					'remaining' 			=> $product_information['startingInventory'],
					'inventorydate'		=>  date('Y-m-d')
				);
				
				$this->table_name = 'product_inventory';//override table temporarily
				$this->primary_key 	= 'inventoryid';
				$this->insert_data($inventory_info);
			}
			
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

	public function get_products() 
	{
		$company_id = $this->session->userdata('user_company_id');
		$this->db->select( 'productID, prodname, rate' );
		
		$condition = array(
			'companyID' => $company_id
		);
		return $this->get_list( $condition );
	}
	
	public function delete_product($product) {
	
		$result = $this->db->delete($this->table_name,$product);
		if(($result >= 0) || (!$result)) {
			//delete any possible inventory record (product_inventory)
			 $this->db->delete('product_inventory',$product);
			 return $result;
		}
		
	}
}

/* End of file product_model.php */
/* Location: ./application/models/product_model.php */