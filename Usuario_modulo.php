<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_modulo extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Modulo_model'); //Modulo
		$this->load->model('Usuario_model');//Usuario
		$this->load->model('Usuario_modulo_model');		
	}

	//ok
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['usuarios_modulos'] = $this->Usuario_modulo_model->obtener_usuarios_modulos_valores();
		}else{
			$datos['usuarios_modulos'] = $this->Usuarios_modulos_model->obtener_usuario_modulo($datos['segmento']);
		}
		$datos['modulos'] = $this->Modulo_model->obtener_modulos();
		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios();

		$datos['filtrado'] = 0;

		$this->load->view('header');
		$this->load->view('usuario_modulo/listar_usuario_modulo',$datos);
		$this->load->view('usuario_modulo/nuevo_usuario_modulo',$datos);
		$this->load->view('footer');
	}

	//ok
	public function nuevo(){
		$datos['modulos'] = $this->Modulo_model->obtener_modulos();
		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios();
		$this->load->view('header');
		$this->load->view('usuario_modulo/nuevo_usuario_modulo',$datos);
		$this->load->view('footer');
	}

	//ok
	public function nuevo_usuario_modulo(){
		$datos = array(
			'ID_Usuario' => $this->input->post('ID_Usuario'),
			'ID_Modulo' => $this->input->post('ID_Modulo'),
			'COD_Usuario_modulo' => $this->input->post('COD_Usuario_modulo'),									
			'DESC_Usuario_modulo' => $this->input->post('DESC_Usuario_modulo'),
		);
		$this->Usuario_modulo_model->nuevo_usuario_modulo($datos);
		redirect('Usuario_modulo');		
	}

	//ok
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['usuarios_modulos']=$this->Usuario_modulo_model->obtener_usuario_modulo($datos['segmento']);
		$datos['modulos'] = $this->Modulo_model->obtener_modulos();
		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios();
		$this->load->view('header');
		$this->load->view('usuario_modulo/editar_usuario_modulo',$datos);
		$this->load->view('footer');
	}

	//ok
	public function actualizar(){
		$datos = array(
			'ID_Usuario' => $this->input->post('ID_Usuario'),
			'ID_Modulo' => $this->input->post('ID_Modulo'),
			'COD_Usuario_modulo' => $this->input->post('COD_Usuario_modulo'),
			'DESC_Usuario_modulo' => $this->input->post('DESC_Usuario_modulo')
		);
		$id = $this->uri->segment(3);
		$this->Usuario_modulo_model->actualizar_usuario_modulo($id,$datos);
		redirect('Usuario_modulo');
	}

	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Usuario_modulo_model->borrar_usuario_modulo($id);
		redirect('Usuario_modulo');
	}	

	public function filtrar_usuario_modulo(){
		$ID_Modulo = $_GET['ID_Modulo'];
		$ID_Usuario = $_GET['ID_Usuario'];

		$this->Usuario_modulo_model->filtrar_usuario_modulo_valores($ID_Modulo,$ID_Usuario);
	}

	public function Usuarios_modulos_ajax(){
		$this->Usuario_modulo_model->obtener_usuarios_modulos_ajax();
	}
}