<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reto extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Centro_model');
		$this->load->model('Reto_model');
	}

	//ok
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['retos'] = $this->Reto_model->obtener_retos();
		}else{
			$datos['retos'] = $this->Retos_model->obtener_retos($datos['segmento']);
		}
		
		$this->load->view('header');
		$this->load->view('reto/listar_reto',$datos);
		$this->load->view('reto/nuevo_reto');
		$this->load->view('footer');
	}

	//ok
	public function nuevo(){
		$this->load->view('header');
		$this->load->view('reto/nuevo_reto');
		$this->load->view('footer');
	}

	//ok
	public function nuevo_reto(){
		$datos = array(
			'COD_Reto' => $this->input->post('COD_Reto'),
			'DESC_Reto' => $this->input->post('DESC_Reto')
		);
		$this->Reto_model->nuevo_reto($datos);
		redirect('Reto');		
	}

	//
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['retos']=$this->Reto_model->obtener_reto($datos['segmento']);
		$this->load->view('header');
		$this->load->view('reto/editar_reto',$datos);
		$this->load->view('footer');
	}

	public function actualizar(){
		$datos = array(
			'COD_Reto' => $this->input->post('COD_Reto'),
			'DESC_Reto' => $this->input->post('DESC_Reto')
		);
		$id = $this->uri->segment(3);
		$this->Reto_model->actualizar_reto($id,$datos);
		redirect('Reto');
	}

	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Reto_model->borrar_reto($id);
		redirect('Reto');
	}	
}