<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller{ 
	
	function __construct(){
		parent::__construct();
		$this->load->model('floreriaModel');		
	}
	
	public function index(){
		$this->load->view('header');
		$this->load->view('inicioRegistrado');
		$this->load->view('footer');
	}
	
}
/* End of file main.php */
/* Location: ./application/controllers/main.php */