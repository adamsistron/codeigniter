<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller { 
	
	function __construct() {
		parent::__construct();
		$this->load->model('bookmarks_model');		
	}

	public function index() {
		$this->load->view('headers/librerias');
		$this->load->view('principal');
		$this->load->view('footer');
	}

	public function agregar() {
	//$this->load->model('bookmarks_model');			
            if ($this->tank_auth->is_logged_in()){
			$this->load->view('headers/librerias');
			$this->load->view('agregar');
			$this->load->view('footer');
		}else{
			echo "No tienes permisos para entrar";
		}
	}

	public function guardar() {
		$data = array(
			'titulo'   => $this->input->post('titulo',TRUE),
			'url'      => $this->input->post('url', TRUE),
			'creacion' => date('Y/m/d h:m')
		);

		$this->bookmarks_model->guardar($data);
		redirect('main/agregar');
	}

	public function ver(){		
		$data = array(
			'enlaces' => $this->bookmarks_model->verTodo(),
			'dump'    => 0
		);

		$this->load->view('headers/librerias');
		$this->load->view('ver', $data);
		$this->load->view('footer');
	}

	public function buscar() {
		$data = array();

		$query = $this->input->get('query', TRUE);

		if ($query) {
			$result = $this->bookmarks_model->buscar(trim($query));
			$total = $this->bookmarks_model->totalResultados(trim($query));
			if ($result != FALSE){
				$data = array(
					'result' => $result,
					'total'  => $total
				);
			}else {
				$data = array('result' => '', 'total' => $total);
			}	
		}else{
			$data = array('result' => '', 'total' => 0);
		}

		$this->load->view('headers/librerias');
		$this->load->view('buscar', $data);
		$this->load->view('footer');
	}

	public function validaciones(){
		$this->load->view('headers/librerias');
		$this->load->view('validaciones');
		$this->load->view('footer');
	}

	

	
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */