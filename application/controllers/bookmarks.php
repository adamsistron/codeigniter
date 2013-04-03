<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bookmarks extends CI_Controller { 

	function __constructor() {
		parent::__constructor();		
	}

	public function index() {	
		$this->load->view('headers/librerias');
		$this->load->view('bookmarks/main');
		$this->load->view('footer');
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */