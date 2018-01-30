<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tevaluador extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Centro_model');
		$this->load->model('Tevaluador_model');
	}

	//ok
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['tevaluadores'] = $this->Tevaluador_model->obtener_tevaluadores();
		}else{
			$datos['tevaluadores'] = $this->Tevaluador_model->obtener_tevaluador($datos['segmento']);
		}
		
		$this->load->view('header');
		$this->load->view('tevaluador/listar_tevaluador',$datos);
		$this->load->view('tevaluador/nuevo_tevaluador');
		$this->load->view('footer');
	}

	//ok
	public function nuevo(){
		$this->load->view('header');
		$this->load->view('tevaluador/nuevo_tevaluador');
		$this->load->view('footer');
	}

	//ok
	public function nuevo_tevaluador(){
		$datos = array(
			'DESC_TEvaluador' => $this->input->post('DESC_TEvaluador'),
		);
		$this->Tevaluador_model->nuevo_tevaluador($datos);
		redirect('Tevaluador');		
	}

	//
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['tevaluadores']=$this->Tevaluador_model->obtener_tevaluador($datos['segmento']);
		$this->load->view('header');
		$this->load->view('tevaluador/editar_tevaluador',$datos);
		$this->load->view('footer');
	}

	public function actualizar(){
		$datos = array(
			'DESC_TEvaluador' => $this->input->post('DESC_TEvaluador')
		);
		$id = $this->uri->segment(3);
		$this->Tevaluador_model->actualizar_tevaluador($id,$datos);
		redirect('Tevaluador');
	}

	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Tevaluador_model->borrar_tevaluador($id);
		redirect('Tevaluador');
	}

	public function Tevaluadores_ajax(){
		$this->Tevaluador_model->obtener_tevaluadores_ajax();
	}	
}