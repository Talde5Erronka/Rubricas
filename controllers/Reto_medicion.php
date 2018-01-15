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

	//ok
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
/*
		public function nuevo(){
		$datos['retos'] = $this->Reto_model->obtener_retos();
		$datos['mediciones'] = $this->Medicion_model->obtener_mediciones();
		$this->load->view('header');
		$this->load->view('reto_medicion/nuevo_reto_medicion',$datos);
		$this->load->view('footer');
	}*/

/*
		public function nuevo_reto_medicion(){
		$datos = array(
			'ID_Reto' => $this->input->post('ID_Reto'),
			'ID_Medicion' => $this->input->post('ID_Medicion'),										
		);
		$this->Reto_medicion_model->nuevo_reto_medicion($datos);
		redirect('Reto_Medicion');		
	}*/

/*
		public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['retos_mediciones']=$this->Reto_medicion_model->obtener_reto_medicion($datos['segmento']);
		$datos['retos'] = $this->Reto_model->obtener_retos();
		$datos['mediciones'] = $this->Medicion_model->obtener_medicion();
		$this->load->view('header');
		$this->load->view('reto_medicion/editar_reto_medicion',$datos);
		$this->load->view('footer');
	}*/
/*
		public function actualizar(){
		$datos = array(
		'ID_Reto' => $this->input->post('ID_Reto'),
		'ID_Medicion' => $this->input->post('ID_Medicion'),	
		);
		$id = $this->uri->segment(3);
		$this->Ciclo_model->actualizar_reto_modulo($id,$datos);
		redirect('Reto_Medicion');
	}*/
/*
		public function borrar(){
		$id = $this->uri->segment(3);
		$this->Reto_medicion_model->borrar_reto_medicion($id);
		redirect('Reto_Medicion');
	}*/


	public function filtrar_reto_medicion(){
		$datos = array(
			'ID_Reto' => $this->input->post('ID_Reto'),
			'ID_Medicion' => $this->input->post('ID_Medicion'),
		);	
		//$filtro_centro = $this->input->post('ID_Centro');
		//$filtro_curso = $this->input->post('ID_Curso');	

		$datos['retos_mediciones']=$this->Reto_medicion_model->filtrar_reto_medicion_valores($datos);	
		
		$datos['retos'] = $this->Reto_model->obtener_retos();
		$datos['mediciones'] = $this->Medicion_model->obtener_mediciones();
		
		$datos['filtrado'] = 1;

		$this->load->view('header');
		$this->load->view('reto_medicion/listar_reto_medicion',$datos);
		

		
		$this->load->view('footer');		
	}


	}