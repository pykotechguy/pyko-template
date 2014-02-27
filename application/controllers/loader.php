<?php
class Loader extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}

	public function index() {
		if($this->uri->segment(2) == 'v2' || $this->uri->segment(3) =='v2') {
			$this->load->view('load2');
		} 
		
		if($this->uri->segment(2) == 'v1' || $this->uri->segment(3) == 'v1') {
		$this->load->view('load1');
		}
		/*
			if(!$this->session->userdata('loggedin')) {
				redirect('main/login');
			} else {
				if($this->session->userdata('usertype') == 'teacher') {*/
	}

	public function login() {
			$this->load->view('login');

	}
}

