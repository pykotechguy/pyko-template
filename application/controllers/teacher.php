<?php
class Teacher extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}

	public function index() {
		if(!($this->session->userdata('loggedin'))) {

			redirect('teacher/login');
		}
		$this->load->view('welcome_message'); 
		//,array('a' => 'apple')); 
		//echo "hello world";
	}

	public function login() {
		
		$this->load->view('teacher/login'); 	
	}
	public function classes() {
		$this->load->view('teacher/class'); 

	}
	
		public function grades() {
		$this->load->view('teacher/grade'); 

	}
	
	public function dashboard() {
		$this->load->view('teacher/dashboard'); 

	}
}

