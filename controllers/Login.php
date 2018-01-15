<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');	
		$this->load->model('Usuario_model');

	}

	public function index(){

		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios_valores();
		$datos['usuario_login'] = $this->input->post('usuario');
		$datos['contraseña_login'] = $this->input->post('contraseña');


		$this->load->view('header');
		$this->load->view('login', $datos);
		$this->load->view('footer');

		
	}

	public function verificar_login(){

		$datos['usuarios'] = $this->Usuario_model->obtener_usuarios_valores();
		$datos['usuario_login'] = $this->input->post('usuario');
		$datos['contraseña_login'] = $this->input->post('contraseña');

		$this->load->view('login',$datos);
	}

	public function logeatuta(){
		echo ('Logeado');
	}

}