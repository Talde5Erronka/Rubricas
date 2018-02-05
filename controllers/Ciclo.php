<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciclo extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('Centro_model');
		$this->load->model('Curso_model');
		$this->load->model('Ciclo_model');		
	}

	public function index(){
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['ciclos'] = $this->Ciclo_model->obtener_ciclos_valores();
		}else{
			$datos['ciclos'] = $this->Ciclos_model->obtener_ciclo($datos['segmento']);
		}
		$datos['centros'] = $this->Centro_model->obtener_centros();
		$datos['cursos'] = $this->Curso_model->obtener_cursos();

		$datos['filtrado'] = 0;

		$this->load->view('header');
		$this->load->view('ciclo/listar_ciclo',$datos);
		$this->load->view('ciclo/nuevo_ciclo',$datos);
		$this->load->view('footer');
	}

	public function nuevo(){
		$datos['centros'] = $this->Centro_model->obtener_centros();
		$datos['cursos'] = $this->Curso_model->obtener_cursos();
		$this->load->view('header');
		$this->load->view('ciclo/nuevo_ciclo',$datos);
		$this->load->view('footer');
	}

	public function nuevo_ciclo(){
		$datos = array(
			'ID_Curso' => $this->input->post('ID_Curso'),
			'ID_Centro' => $this->input->post('ID_Centro'),
			'COD_Ciclo' => $this->input->post('COD_Ciclo'),									
			'DESC_Ciclo' => $this->input->post('DESC_Ciclo'),
		);
		$this->Ciclo_model->nuevo_ciclo($datos);
		redirect('Ciclo');		
	}

	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['ciclos']=$this->Ciclo_model->obtener_ciclo($datos['segmento']);
		$datos['centros'] = $this->Centro_model->obtener_centros();
		$datos['cursos'] = $this->Curso_model->obtener_cursos();
		$this->load->view('header');
		$this->load->view('ciclo/editar_ciclo',$datos);
		$this->load->view('footer');
	}

	public function actualizar(){
		$datos = array(
			'ID_Curso' => $this->input->post('ID_Curso'),
			'ID_Centro' => $this->input->post('ID_Centro'),
			'COD_Ciclo' => $this->input->post('COD_Ciclo'),
			'DESC_Ciclo' => $this->input->post('DESC_Ciclo')
		);
		$id = $this->uri->segment(3);
		$this->Ciclo_model->actualizar_ciclo($id,$datos);
		redirect('Ciclo');
	}

	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Ciclo_model->borrar_ciclo($id);
		redirect('Ciclo');
	}	

	public function filtrar_ciclo(){
		$ID_Centro = $_GET['ID_Centro'];
		$ID_Curso = $_GET['ID_Curso'];
		$this->Ciclo_model->filtrar_ciclo_valores($ID_Centro,$ID_Curso);
	}

	public function Ciclos_ajax(){
		$this->Ciclo_model->obtener_ciclos_ajax();
	}
}