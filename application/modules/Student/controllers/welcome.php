<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct();	
		$this->load->helper('url');
	}
	public function index()
	{
		$this->load->library('twig');
		$this->twig->addFunction('base_url');
		$this->twig->addFunction('form_open');
		exit(var_dump($this->twig));
		$this->twig->render('welcome_message.twig', array('my_variable' => 'Twig is working -- Hello world!',
		'burl' => base_url()));
		
	}
}
