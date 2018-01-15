<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Equipo_usuario_model');
		$this->load->model('Reto_model');
		$this->load->model('Equipo_model');		
	}

	//ok
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['equipos'] = $this->Equipo_model->obtener_equipos_valores();
		}else{
			$datos['equipos'] = $this->Equipos_model->obtener_equipo($datos['segmento']);
		}

		$datos['retos'] = $this->Reto_model->obtener_retos();
		$datos['equipos_usuarios'] = $this->Equipo_usuario_model->obtener_equipos_usuarios();
		$datos['filtrado'] = 0;

		$this->load->view('header');
		$this->load->view('equipo/listar_equipo',$datos);
		$this->load->view('equipo/nuevo_equipo',$datos);
		$this->load->view('footer');
	}

	//ok
	public function nuevo(){

		$datos['reto'] = $this->Reto_model->obtener_reto();
		$datos['equipo_usuario'] = $this->Equipo_usuario_model->obtener_equipo_usuario();
		$this->load->view('header');
		$this->load->view('equipo/nuevo_equipo',$datos);
		$this->load->view('footer');
	}

	//ok
	public function nuevo_equipo(){
		$datos = array(
			'ID_Reto' => $this->input->post('ID_Reto'),
			'COD_Equipo' => $this->input->post('COD_Equipo'),									
			'DESC_Equipo' => $this->input->post('DESC_Equipo'),
		);
		$this->Equipo_model->nuevo_equipo($datos);
		redirect('Equipo');		
	}

	//ok
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['equipos']=$this->Equipo_model->obtener_equipo($datos['segmento']);
		$datos['retos'] = $this->Reto_model->obtener_retos();
		$this->load->view('header');
		$this->load->view('equipo/editar_equipo',$datos);
		$this->load->view('footer');
	}

	//ok
	public function actualizar(){
		$datos = array(
			'ID_Reto' => $this->input->post('ID_Reto'),
			'COD_Equipo' => $this->input->post('COD_Equipo'),
			'DESC_Equipo' => $this->input->post('DESC_Equipo')
		);
		$id = $this->uri->segment(3);
		$this->Equipo_model->actualizar_equipo($id,$datos);
		redirect('Equipo');
	}

	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Equipo_model->borrar_equipo($id);
		redirect('Equipo');
	}	

	public function filtrar_equipo(){
		$datos = array(
			'ID_Equipo' => $this->input->post('ID_Equipo'),
			'ID_Reto' => $this->input->post('ID_Reto'),
		);		

		$datos['equipos']=$this->Equipo_model->filtrar_equipo_valores($datos);	
		$datos['equipos_usuarios'] = $this->Equipo_usuario_model->obtener_equipos_usuarios();
		$datos['retos'] = $this->Reto_model->obtener_retos	();
		$datos['filtrado'] = 1;

		$this->load->view('header');
		$this->load->view('equipo/listar_equipo',$datos);
		$this->load->view('equipo/nuevo_equipo',$datos);
		$this->load->view('footer');		
	}
}