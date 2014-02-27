<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  public function __construct() {
  	parent::__construct();
  	$this->load->library('session');
  }

	public function index()
	{
		$this->session->set_userdata('loggedin',TRUE);
		$this->load->view('dashboard');
		//_render_view( 'dashboard' );
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */