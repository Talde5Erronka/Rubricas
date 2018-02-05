<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reto_medicion extends CI_Controller {

	function __construct(){
		parent::__construct();
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Reto_model');
		$this->load->model('Medicion_model');		
		$this->load->model('Reto_medicion_model');
	}

	public function index(){
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['retos_mediciones'] = $this->Reto_medicion_model->obtener_retos_mediciones_valores();
		}else{
			$datos['retos_mediciones'] = $this->Reto_medicion_model->obtener_reto_medicion($datos['segmento']);
		}
		
		$datos['retos'] = $this->Reto_model->obtener_retos();
		$datos['mediciones'] = $this->Medicion_model->obtener_mediciones();
		
		$datos['filtrado'] = 0;

		$this->load->view('header');
		$this->load->view('reto_medicion/listar_reto_medicion',$datos);
		/*$this->load->view('reto_medicion/nuevo_reto_medicion',$datos);*/
		$this->load->view('footer');
	}

	public function filtrar_reto_medicion(){
		$ID_Reto = $_GET['ID_Reto'];
		$ID_Medicion = $_GET['ID_Medicion'];
		$this->Reto_medicion_model->filtrar_reto_medicion_valores($ID_Reto,$ID_Medicion);	
	}

	public function Retos_mediciones_ajax(){
		//$this->Centro_model->obtener_centros_ajax();
	}

	/*
	public function filtrar_reto_medicion(){
		$datos = array(
			'ID_Reto' => $this->input->post('ID_Reto'),
			'ID_Medicion' => $this->input->post('ID_Medicion'),
		);		

		$datos['retos_mediciones']=$this->Reto_medicion_model->filtrar_reto_medicion_valores($datos);	
		
		$datos['retos'] = $this->Reto_model->obtener_retos();
		$datos['mediciones'] = $this->Medicion_model->obtener_mediciones();
		
		$datos['filtrado'] = 1;

		$this->load->view('header');
		$this->load->view('reto_medicion/listar_reto_medicion',$datos);
		$this->load->view('footer');		
	}
	*/
}