<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');	
		$this->load->model('Usuario_model');
		$this->load->model('Reto_model');
		$this->load->model('Login_model');

	}

	public function index(){

		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios_valores();
		$datos['usuario_login'] = $this->input->post('usuario');
		$datos['contraseña_login'] = $this->input->post('contraseña');


		$this->load->view('header');
		$this->load->view('login/login', $datos);
		$this->load->view('footer');

		
	}

	public function verificar_login(){

		//Coge los datos de todos los usuarios
		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios_valores();

		//Coge el nombre y la contraseña que hemos puesto en el login
		$datos['usuario_login'] = $this->input->post('usuario');
		$datos['contraseña_login'] = $this->input->post('contraseña');

		//Envía los datos a la vista Login
		$this->load->view('login/login',$datos); 


	}

	public function logueado_profesor(){

		$id = $this->input->post('reto');
		//Coge los retos existentes
		$datos['retos'] = $this->Reto_model->obtener_retos(); 

		//Envía los datos a la vista Logueado_profesor
		$this->load->view('login/logueado_profesor',$datos);
	}

	public function logueado_alumno(){

		$id = $this->input->post('reto');
		//Coge los retos existentes
		$datos['retos'] = $this->Reto_model->obtener_retos(); 

		//Envía los datos a la vista Logueado_alumno
		$this->load->view('login/logueado_alumno',$datos);
	}

	public function usuarios_reto(){
		$id = $this->input->post('reto');
		$datos['usuarios_del_reto'] = $this->Usuario_model->usuarios_del_reto($id);
		$this->load->view('login/logueado_profesor',$datos);
	}
	
	public function compañeros_reto(){
		$id = $this->input->post('reto');
		$datos['compañeros_del_reto'] = $this->Usuario_model->compañeros_del_reto($id);
		$this->load->view('login/logueado_alumno',$datos);
	}

	public function filtrar_reto_prof(){
		$ID_Equipo = $_GET['ID_Equipo']; 
		$this->Usuario_model->usuarios_del_reto($ID_Equipo);
	}

	public function filtrar_reto_alum(){
		$ID_Reto = $_GET['ID_Reto']; 
		$this->Usuario_model->compañeros_de_grupo($ID_Reto);
	}

}
