<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo_usuario extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Usuario_model');
		$this->load->model('Equipo_model');
		$this->load->model('Reto_model');
		$this->load->model('Equipo_usuario_model');		
	}

	//ok
	public function index(){
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['equipos_usuarios'] = $this->Equipo_usuario_model->obtener_equipos_usuarios_valores();
		}else{
			$datos['equipos_usuarios'] = $this->Equipos_usuarios_model->obtener_equipo_usuario($datos['segmento']);
		}
		/**********************************************************/
		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios();
		$datos['equipos'] = $this->Equipo_model->obtener_equipos();

		$datos['filtrado'] = 0;

		/**********************************************************/

		$this->load->view('header');
		$this->load->view('equipo_usuario/listar_equipo_usuario',$datos);
		$this->load->view('equipo_usuario/nuevo_equipo_usuario',$datos);
		$this->load->view('footer');
	}


		//ok
	public function nuevo(){
		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios();
		$datos['equipos'] = $this->Equipo_model->obtener_equipos();
		$this->load->view('header');
		$this->load->view('equipo_usuario/nuevo_equipo_usuario',$datos);
		$this->load->view('footer');
	}

	//ok
	public function nuevo_equipo_usuario(){
		$datos = array(
			'ID_Equipo_Alumno' => $this->input->post('ID_Equipo_Alumno'),
			'ID_Equipo' => $this->input->post('ID_Equipo'),
			'ID_Usuario' => $this->input->post('ID_Usuario'),									
			'COD_Rol' => $this->input->post('COD_Rol'),
		);
		$this->Equipo_usuario_model->nuevo_equipo_usuario($datos);
		redirect('Equipo_usuario');		
	}




	//ok
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['equipos_usuarios']=$this->Equipo_usuario_model->obtener_equipo_usuario($datos['segmento']);
		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios();
		$datos['equipos'] = $this->Equipo_model->obtener_equipos();
		$this->load->view('header');
		$this->load->view('equipo_usuario/editar_equipo_usuario',$datos);
		$this->load->view('footer');
	}

		//ok
	public function actualizar(){
		$datos = array(
			'ID_Equipo_Alumno' => $this->input->post('ID_Equipo_Alumno'),
			'ID_Equipo' => $this->input->post('ID_Equipo'),
			'ID_Usuario' => $this->input->post('ID_Usuario'),
			'COD_Rol' => $this->input->post('COD_Rol')
		);
		$id = $this->uri->segment(3);
		$this->Equipo_usuario_model->actualizar_equipo_usuario($id,$datos);
		redirect('Equipo_usuario');
	}


	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Equipo_usuario_model->borrar_equipo_usuario($id);
		redirect('Equipo_usuario');
	}

	public function filtrar_equipo_usuario(){
		$ID_Equipo = $_GET['ID_Equipo'];
		$ID_Usuario = $_GET['ID_Usuario'];

		$this->Equipo_usuario_model->filtrar_equipo_usuario_valores($ID_Equipo,$ID_Usuario);
	}

	public function Equipo_Usuario_ajax(){
		$this->Equipo_usuario_model->obtener_equipos_usuarios_ajax();
	}
}