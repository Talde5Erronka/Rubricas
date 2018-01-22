<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reto_modulo extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Modulo_model');
		$this->load->model('Reto_model');
		$this->load->model('Reto_modulo_model');	
		$this->load->model('Usuario_model');
	}

	//ok
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['retos_modulos'] = $this->Reto_modulo_model->obtener_retos_modulos_valores();
		}else{
			$datos['retos_modulos'] = $this->Retos_modulos_model->obtener_reto_modulo($datos['segmento']);
		}
		$datos['modulos'] = $this->Modulo_model->obtener_modulos();
		$datos['retos'] = $this->Reto_model->obtener_retos();
		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios();

		$datos['filtrado'] = 0;

		$this->load->view('header');
		$this->load->view('reto_modulo/listar_reto_modulo',$datos);
		$this->load->view('reto_modulo/nuevo_reto_modulo',$datos);
		$this->load->view('footer');
	}

	//ok
	public function nuevo(){
		$datos['modulos'] = $this->Modulo_model->obtener_modulos();
		$datos['retos'] = $this->Reto_model->obtener_retos();
		$this->load->view('header');
		$this->load->view('reto_modulo/nuevo_reto_modulo',$datos);
		$this->load->view('footer');
	}

	//ok
	public function nuevo_reto_modulo(){
		$datos = array(
			'ID_Reto_Modulo' => $this->input->post('ID_Reto_Modulo'),
			'ID_Reto' => $this->input->post('ID_Reto'),
			'ID_Modulo' => $this->input->post('ID_Modulo'),
			'ID_UAdmin' => $this->input->post('ID_UAdmin'),	
			'IN_Extendido' => $this->input->post('IN_Extendido'),
			'IN_EAbierto' => $this->input->post('IN_EAbierto')
		);
		$this->Reto_modulo_model->nuevo_reto_modulo($datos);
		redirect('Reto_modulo');		
	}

	//ok
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['retos_modulos']=$this->Reto_modulo_model->obtener_reto_modulo($datos['segmento']);
		$datos['modulos'] = $this->Modulo_model->obtener_modulos();
		$datos['retos'] = $this->Reto_model->obtener_retos();
		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios();
		
		$this->load->view('header');
		$this->load->view('reto_modulo/editar_reto_modulo',$datos);
		$this->load->view('footer');
	}

	//ok
	public function actualizar(){
		$datos = array(
			'ID_Reto' => $this->input->post('ID_Reto'),
			'ID_Modulo' => $this->input->post('ID_Modulo'),
			'ID_UAdmin' => $this->input->post('ID_UAdmin'),	
			'IN_Extendido' => $this->input->post('IN_Extendido'),
			'IN_EAbierto' => $this->input->post('IN_EAbierto')
		);
		$id = $this->uri->segment(3);
		$this->Reto_modulo_model->actualizar_reto_modulo($id,$datos);
		redirect('Reto_modulo');
	}

	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Reto_modulo_model->borrar_reto_modulo($id);
		redirect('Reto_modulo');
	}	

	public function filtrar_reto_modulo(){

		$ID_Reto = $_GET['ID_Reto'];
		$ID_Modulo = $_GET['ID_Modulo'];

		$this->Reto_modulo_model->filtrar_reto_modulo_valores($ID_Reto,$ID_Modulo);
			
	}

	public function Retos_modulos(){
		$this->Reto_modulo_model->obtener_retos_modulos_ajax();
	}

}