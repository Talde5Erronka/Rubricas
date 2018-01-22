<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modulo extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Centro_model');
		$this->load->model('Modulo_model');
		$this->load->model('Ciclo_model');		
	}

	//ok
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['modulos'] = $this->Modulo_model->obtener_modulos_valores();
		}else{
			$datos['modulos'] = $this->Modulo_model->obtener_modulo($datos['segmento']);
		}
		
		$datos['ciclos'] = $this->Ciclo_model->obtener_ciclos();

		$datos['filtrado'] = 0;

		$this->load->view('header');
		$this->load->view('modulo/listar_modulo',$datos);
		$this->load->view('modulo/nuevo_modulo',$datos);
		$this->load->view('footer');
	}

		//ok
	public function nuevo(){
		$datos['modulos'] = $this->Modulo_model->obtener_modulos();
		
		$this->load->view('header');
		$this->load->view('modulo/nuevo_modulo',$datos);
		$this->load->view('footer');
	}

		//ok
	public function nuevo_modulo(){
		$datos = array(
			'ID_Modulo' => $this->input->post('ID_Modulo'),
			'ID_Ciclo' => $this->input->post('ID_Ciclo'),
			'COD_Modulo' => $this->input->post('COD_Modulo'),									
			'DESC_Modulo' => $this->input->post('DESC_Modulo'),
		);
		$this->Modulo_model->nuevo_modulo($datos);
		redirect('Modulo');		
	}

	//ok
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['modulos']=$this->Modulo_model->obtener_modulo($datos['segmento']);
		$datos['ciclos'] = $this->Ciclo_model->obtener_ciclos();
	
		$this->load->view('header');
		$this->load->view('modulo/editar_modulo',$datos);
		$this->load->view('footer');
	}

	//ok
	public function actualizar(){
		$datos = array(
			'ID_Ciclo' => $this->input->post('ID_Ciclo'),
			'COD_Modulo' => $this->input->post('COD_Modulo'),
			'DESC_Modulo' => $this->input->post('DESC_Modulo')
		);
		$id = $this->uri->segment(3);
		$this->Modulo_model->actualizar_modulo($id,$datos);
		redirect('Modulo');
	}

		public function borrar(){
		$id = $this->uri->segment(3);
		$this->Modulo_model->borrar_modulo($id);
		redirect('Modulo');
	}	

	public function filtrar_modulo(){
		$ID_Centro = $_GET['ID_Centro'];
		$ID_Ciclo = $_GET['ID_Ciclo'];

		$this->Modulo_model->filtrar_modulo_valores($ID_Centro,$ID_Ciclo);
	}

	public function Modulos_ajax(){
		$this->Modulo_model->obtener_modulos_ajax();
	}


	}