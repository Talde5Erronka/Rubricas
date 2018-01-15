<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicion extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Tusuario_model');
		$this->load->model('Medicion_model');		
	}

	//ok
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['mediciones'] = $this->Medicion_model->obtener_mediciones_valores();
		}else{
			$datos['mediciones'] = $this->Medicions_model->obtener_medicion($datos['segmento']);
		}

		$datos['tusuarios'] = $this->Tusuario_model->obtener_tusuarios();
		$datos['mediciones'] = $this->Medicion_model->obtener_mediciones_valores();
		$datos['filtrado'] = 0;

		$this->load->view('header');
		$this->load->view('medicion/listar_medicion',$datos);
		//$this->load->view('medicion/nuevo_medicion',$datos);
		$this->load->view('footer');
	}

	/*
	//ok
	public function nuevo(){

		$datos['tusuario'] = $this->Tusuario_model->obtener_tusuario();
		$datos['medicion'] = $this->Medicion_model->obtener_medicion();
		$this->load->view('header');
		$this->load->view('medicion/nuevo_medicion',$datos);
		$this->load->view('footer');
	}

	//ok
	public function nuevo_medicion(){
		$datos = array(
			'ID_TUsuario' => $this->input->post('ID_TUsuario'),
			'COD_Medicion' => $this->input->post('COD_Medicion'),									
			'DESC_Medicion' => $this->input->post('DESC_Medicion'),
		);
		$this->Medicion_model->nuevo_medicion($datos);
		redirect('Medicion');		
	}

	//ok
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['mediciones']=$this->Medicion_model->obtener_medicion($datos['segmento']);
		$datos['tusuarios'] = $this->Tusuario_model->obtener_tusuarios();
		$this->load->view('header');
		$this->load->view('medicion/editar_medicion',$datos);
		$this->load->view('footer');
	}

	//ok
	public function actualizar(){
		$datos = array(
			'ID_TUsuario' => $this->input->post('ID_TUsuario'),
			'COD_Medicion' => $this->input->post('COD_Medicion'),
			'DESC_Medicion' => $this->input->post('DESC_Medicion')
		);
		$id = $this->uri->segment(3);
		$this->Medicion_model->actualizar_medicion($id,$datos);
		redirect('Medicion');
	}

	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Medicion_model->borrar_medicion($id);
		redirect('Medicion');
	}	
	*/

	public function filtrar_medicion(){
		$datos = array(
			'ID_Medicion' => $this->input->post('ID_Medicion'),
			'ID_TUsuario' => $this->input->post('ID_TUsuario'),
		);		

		$datos['mediciones']=$this->Medicion_model->filtrar_medicion_valores($datos);	
		$datos['tusuarios'] = $this->Tusuario_model->obtener_tusuarios();

		$datos['filtrado'] = 1;

		$this->load->view('header');
		$this->load->view('medicion/listar_medicion',$datos);
		//$this->load->view('medicion/nuevo_medicion',$datos);
		$this->load->view('footer');		
	}
}