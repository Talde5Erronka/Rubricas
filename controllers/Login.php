<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');	
		$this->load->model('Usuario_model');
		$this->load->model('Reto_model');
		$this->load->model('Login_model');
		$this->load->model('Equipo_model');	
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
		//Coge el nombre y la contraseña que hemos puesto en el login
		$user = $this->input->post('usuario');
		$password = $this->input->post('contraseña');

		//Coge los datos de todos los usuarios
		$usuario = $this->Usuario_model->verificar_login($user,$password);

		if ($usuario!=''){
			foreach ($usuario->result() as $usuario2){

				if($usuario2->ID_TUsuario==2){
					$this->session->set_userdata('NombreLog', $usuario2->User);
					$this->session->set_userdata('ID_UsuarioLog', $usuario2->ID_Usuario);

					$this->load->view('header');
					$this->load->view('login/logueado_profesor');
				}else if ($usuario2->ID_TUsuario==3){
					$this->session->set_userdata('NombreLog', $usuario2->User);
					$this->session->set_userdata('ID_UsuarioLog', $usuario2->ID_Usuario);

					$this->load->view('header');
					$this->load->view('login/logueado_alumno');
				}else{
					$this->load->view('headerAdmin');
					$this->load->view('login/logueado_admin');
				}
			}
		}
		else{
			$this->load->view('login/login');
			if($user!="" && $password!=""){
				echo("Usuario o contraseña incorrectos.");	
			}
		}
	}

//--------------------------------------------------PROFESOR LOGUEADO------------------------------------------------

	public function logueado_profesor(){
		$datos['retos'] = $this->Reto_model->obtener_retos(); 
		$this->load->view('login/logueado_profesor',$datos); //Envía los datos a la vista Logueado_profesor
	}

	public function alumnos_reto(){
		$id = $this->input->post('reto');
		$datos['usuarios_del_reto'] = $this->Usuario_model->usuarios_del_reto($id);
		$this->load->view('login/logueado_profesor',$datos);
	}

	public function filtrar_reto_prof(){
		$ID_Equipo = $_GET['ID_Equipo']; 
		$this->Usuario_model->usuarios_del_reto($ID_Equipo);
	}

//--------------------------------------------------ALUMNO LOGUEADO--------------------------------------------------

	public function logueado_alumno(){
		$ID_Usuario = $this->session->userdata('ID_UsuarioLog');
		$datos['retos'] = $this->Reto_model->obtener_retos_usuario($ID_Usuario);
		$this->load->view('login/logueado_alumno',$datos); //Envía los datos a la vista logueado_alumno
	}

	public function conseguir_equipos(){
		$ID_Usuario = $_GET['ID_Usuario'];
		$ID_Reto = $_GET['ID_Reto'];
		$datos['ID_Equipo'] = $this->Usuario_model->conseguir_equipos($ID_Usuario,$ID_Reto);
	}


	public function filtrar_reto_alum(){
	$ID_Equipo = $_GET['ID_Equipo'];
	$this->Usuario_model->compañeros_del_reto($ID_Equipo);	
	}

//--------------------------------------------------ADMIN LOGUEADO---------------------------------------------------

	public function logueado_admin(){
		$this->load->view('login/logueado_admin');
	}
}
