<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tusuario extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Tusuario_model');

	}

	//ok
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['tusuarios'] = $this->Tusuario_model->obtener_tusuarios();
		}else{
			$datos['tusuarios'] = $this->Tusuario_model->obtener_tusuario($datos['segmento']);
		}
		
		$this->load->view('header');
		$this->load->view('tusuario/listar_tusuario',$datos);
		$this->load->view('tusuario/nuevo_tusuario');
		$this->load->view('footer');
	}

	//ok
	public function nuevo(){
		$this->load->view('header');
		$this->load->view('tusuario/nuevo_tusuario');
		$this->load->view('footer');
	}

	//ok
	public function nuevo_tusuario(){
		$datos = array(
			'DESC_TUsuario' => $this->input->post('DESC_TUsuario'),
		);
		$this->Tusuario_model->nuevo_tusuario($datos);
		redirect('Tusuario');		
	}

	//
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['tusuarios']=$this->Tusuario_model->obtener_tusuario($datos['segmento']);
		$this->load->view('header');
		$this->load->view('tusuario/editar_tusuario',$datos);
		$this->load->view('footer');
	}

	public function actualizar(){
		$datos = array(
			'DESC_TUsuario' => $this->input->post('DESC_TUsuario')
		);
		$id = $this->uri->segment(3);
		$this->Tusuario_model->actualizar_tusuario($id,$datos);
		redirect('Tusuario');
	}

	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Tusuario_model->borrar_tusuario($id);
		redirect('Tusuario');
	}	
}