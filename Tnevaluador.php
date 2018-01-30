<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tnevaluador extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Centro_model');
		$this->load->model('Tnevaluador_model');
	}

	//ok
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['tnevaluadores'] = $this->Tnevaluador_model->obtener_tnevaluadores();
		}else{
			$datos['tnevaluadores'] = $this->Tnevaluador_model->obtener_tnevaluador($datos['segmento']);
		}
		
		$this->load->view('header');
		$this->load->view('tnevaluador/listar_tnevaluador',$datos);
		$this->load->view('tnevaluador/nuevo_tnevaluador');
		$this->load->view('footer');
	}

	//ok
	public function nuevo(){
		$this->load->view('header');
		$this->load->view('tnevaluador/nuevo_tnevaluador');
		$this->load->view('footer');
	}

	//ok
	public function nuevo_tnevaluador(){
		$datos = array(
			'DESC_TNEvaluador' => $this->input->post('DESC_TNEvaluador'),
		);
		$this->Tnevaluador_model->nuevo_tnevaluador($datos);
		redirect('Tnevaluador');		
	}

	//
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['tnevaluadores']=$this->Tnevaluador_model->obtener_tnevaluador($datos['segmento']);
		$this->load->view('header');
		$this->load->view('tnevaluador/editar_tnevaluador',$datos);
		$this->load->view('footer');
	}

	public function actualizar(){
		$datos = array(
			'DESC_TNEvaluador' => $this->input->post('DESC_TNEvaluador')
		);
		$id = $this->uri->segment(3);
		$this->Tnevaluador_model->actualizar_tnevaluador($id,$datos);
		redirect('Tnevaluador');
	}

	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Tnevaluador_model->borrar_tnevaluador($id);
		redirect('Tnevaluador');
	}

	public function Tnevaluadores_ajax(){
		$this->Tnevaluador_model->obtener_tnevaluadores_ajax();
	}
}