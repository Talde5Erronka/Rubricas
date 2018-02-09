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

	public function index(){
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

	public function nuevo(){

		$datos['reto'] = $this->Reto_model->obtener_reto();
		$datos['equipo_usuario'] = $this->Equipo_usuario_model->obtener_equipo_usuario();
		$this->load->view('header');
		$this->load->view('equipo/nuevo_equipo',$datos);
		$this->load->view('footer');
	}

	public function nuevo_equipo(){
		$datos = array(
			'ID_Reto' => $this->input->post('ID_Reto'),
			'COD_Equipo' => $this->input->post('COD_Equipo'),									
			'DESC_Equipo' => $this->input->post('DESC_Equipo'),
		);
		$this->Equipo_model->nuevo_equipo($datos);
		redirect('Equipo');		
	}

	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['equipos']=$this->Equipo_model->obtener_equipo($datos['segmento']);
		$datos['retos'] = $this->Reto_model->obtener_retos();
		$this->load->view('header');
		$this->load->view('equipo/editar_equipo',$datos);
		$this->load->view('footer');
	}

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
		$ID_Reto = $_GET['ID_Reto'];

		$this->Equipo_model->filtrar_equipo_valores($ID_Reto);
	}

	public function Equipos_ajax(){
		$this->Equipo_model->obtener_equipos_ajax();
	}

	public function Equipos_ajax2(){
		$reto =	$reto = $_GET['reto'];
		$this->Equipo_model->obtener_equipos_por_cada_reto($reto);
	}

	public function misequipos(){
		$ID_Usuario = $_GET['ID_Usuario'];
		$this->Reto_model->miequipo($ID_Usuario);
	}
}