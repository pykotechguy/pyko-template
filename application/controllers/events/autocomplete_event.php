<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//guidelines:
//for autocomplete, name member methods searchBlank() (prefix with search). 
//don't add parameters, put the text to search inside the POST/ params
//autocomplete no need for verifying app and sig
class Autocomplete_Event extends APP_System_Controller
{

    public function searchContacts()
    {
        $search_term = $this->params['search'];
        
        if(isset($this->user_id)) {
            $company_id = $this->user_id;
        } else {
            $company_id = false;
        }
        
        $this->load->model('contact_model','contacts');
        
        //reusable for other pages that may need to search unspecific to a company. ( i.e.Admin)
        $fields = 'name';
        if($company_id) {

            $contacts = $this->query("SELECT $fields 
                                      FROM businesscontact 
                                      WHERE companyID = " . $company_id . " 
                                            AND (name LIKE '%" . $search_term."%' 
                                            OR checkname LIKE '%" . $search_term. "%')");
        } else {
            $contacts = $this->query("SELECT $fields 
                                      FROM businesscontact
                                      WHERE name LIKE '%" . $search_term ."%' 
                                      OR checkname LIKE '%" . $search_term . "%'");
        }

		    echo json_encode($contacts);

    }

    public function getContactDetails() {
        $company_id = $this->user_id;
        $name = $this->params['name'];
        //fields to select
        $fields  = "contactID, email, address, city, state, country, zip";
        $contacts = $this->query("SELECT $fields
                                  FROM businesscontact 
                                  WHERE companyID = " . $company_id . " 
                                  AND name = '". $name. "'");

        echo json_encode($contacts);
    }   
    /* to autocomplete the products in the invoice list form */
    public function getProductPricing() {
        $product_id = $this->params['product_id'];
        $company_id = $this->user_id;
        
        $product_details = $this->query("SELECT rate, istaxable
                                  FROM businesscontact 
                                  WHERE companyID = " . $company_id . " 
                                  AND productID = ". $productID);

        echo json_encode($product_details);
    }     
}