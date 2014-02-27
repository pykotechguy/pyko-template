<?php
class Main extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}

	public function index() {
			if(!$this->session->userdata('loggedin')) {
				redirect('main/login');
			} else {
				if($this->session->userdata('usertype') == 'teacher') {
					redirect('teacher/login');
				} else {
						$this->load->view('dashboard');
				}
			}
			$this->load->view('welcome_message'); 

	}

	public function login() {
			$this->load->view('new_login');

	}
	
	public function logout() {
		$this->session->set_userdata('loggedin',FALSE);
		redirect('main/index');
	}
}

