<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}

	public function index(){
		if (!$this->ion_auth->logged_in()){ // Sino esta logueado
            redirect('auth/login'); //lo redirigimos al form de login
        } else {
        	$this->load->view('header');
        	$this->load->view('vistaPrueba');
        	$this->load->view('footer');
        }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */