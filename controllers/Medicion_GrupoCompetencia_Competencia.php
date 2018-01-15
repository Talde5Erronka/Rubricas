<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicion_GrupoCompetencia_Competencia extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');		
		$this->load->model('GrupoCompetencia_model');
		$this->load->model('Medicion_model');
		$this->load->model('Competencia_model');
		$this->load->model('Medicion_GrupoCompetencia_Competencia_model');		
	}

	//ok
	public function index()
	{
		$datos['segmento']=$this->uri->segment(3);
		if (!$datos['segmento']){
			$datos['mediciones_grupocompetencias_competencias'] = $this->Medicion_GrupoCompetencia_Competencia_model->obtener_mediciones_grupocompetencias_competencias_valores();
		}else{
			$datos['mediciones_grupocompetencias_competencias'] = $this->Mediciones_GrupoCompetencias_Competencias_model->obtener_medicion_grupocompetencia_competencia($datos['segmento']);
		}
		$datos['grupocompetencias'] = $this->GrupoCompetencia_model->obtener_grupocompetencias();
		$datos['mediciones'] = $this->Medicion_model->obtener_mediciones();
		$datos['competencias'] = $this->Competencia_model->obtener_competencias();

		$datos['filtrado'] = 0;

		$this->load->view('header');
		$this->load->view('medicion_grupocompetencia_competencia/listar_medicion_grupocompetencia_competencia',$datos);
		//$this->load->view('medicion_grupocompetencia_competencia/nuevo_medicion_grupocompetencia_competencia',$datos);
		$this->load->view('footer');
	}
	/*
	//ok
	public function nuevo(){
		$datos['grupocompetencias'] = $this->GrupoCompetencia_model->obtener_grupocompetencias();
		$datos['mediciones'] = $this->Medicion_model->obtener_mediciones();
		$datos['competencias'] = $this->Competencia_model->obtener_competencias();
		$this->load->view('header');
		$this->load->view('medicion_grupocompetencia_competencia/nuevo_medicion_grupocompetencia_competencia',$datos);
		$this->load->view('footer');
	}

	//ok
	public function nuevo_medicion_grupocompetencia_competencia(){
		$datos = array(
			'ID_GrupoCompetencia_Competencia' => $this->input->post('ID_GrupoCompetencia_Competencia'),
			'ID_Medicion' => $this->input->post('ID_Medicion'),
			'ID_GrupoCompetencia' => $this->input->post('ID_GrupoCompetencia'),
			'ID_Competencia' => $this->input->post('ID_Competencia'),	
			'Porcentaje' => $this->input->post('Porcentaje')
		);
		$this->Medicion_GrupoCompetencia_Competencia_model->nuevo_medicion_grupocompetencia_competencia($datos);
		redirect('Medicion_GrupoCompetencia_Competencia');		
	}

	//ok
	public function editar(){
		$datos['segmento']=$this->uri->segment(3);
		$datos['mediciones_grupocompetencias_competencias']=$this->Medicion_GrupoCompetencia_Competencia_model->obtener_medicion_grupocompetencia_competencia($datos['segmento']);
		$datos['grupocompetencias'] = $this->GrupoCompetencia_model->obtener_grupocompetencias();
		$datos['mediciones'] = $this->Medicion_model->obtener_mediciones();
		$datos['competencias'] = $this->Competencia_model->obtener_competencias();
		$this->load->view('header');
		$this->load->view('medicion_grupocompetencia_competencia/editar_medicion_grupocompetencia_competencia',$datos);
		$this->load->view('footer');
	}

	//ok
	public function actualizar(){
		$datos = array(
			'ID_Medicion' => $this->input->post('ID_Medicion'),
			'ID_GrupoCompetencia' => $this->input->post('ID_GrupoCompetencia'),
			'ID_Competencia' => $this->input->post('ID_Competencia'),	
			'Porcentaje' => $this->input->post('Porcentaje')
		);
		$id = $this->uri->segment(3);
		$this->Medicion_GrupoCompetencia_Competencia_model->actualizar_medicion_grupocompetencia_competencia($id,$datos);
		redirect('Medicion_GrupoCompetencia_Competencia');
	}

	public function borrar(){
		$id = $this->uri->segment(3);
		$this->Medicion_GrupoCompetencia_Competencia_model->borrar_medicion_grupocompetencia_competencia($id);
		redirect('Medicion_GrupoCompetencia_Competencia');
	}	
	*/
	public function filtrar_medicion_grupocompetencia_competencia(){
		$datos = array(
			'ID_Medicion' => $this->input->post('ID_Medicion'),
			'ID_GrupoCompetencia' => $this->input->post('ID_GrupoCompetencia'),
			'ID_Competencia' => $this->input->post('ID_Competencia')
		);	

		$datos['mediciones_grupocompetencias_competencias']=$this->Medicion_GrupoCompetencia_Competencia_model->filtrar_medicion_grupocompetencia_competencia_valores($datos);	
		$datos['grupocompetencias'] = $this->GrupoCompetencia_model->obtener_grupocompetencias();
		$datos['mediciones'] = $this->Medicion_model->obtener_mediciones();
		$datos['competencias'] = $this->Competencia_model->obtener_competencias();

		$datos['filtrado'] = 1;

		$this->load->view('header');
		$this->load->view('medicion_grupocompetencia_competencia/listar_medicion_grupocompetencia_competencia',$datos);
		//$this->load->view('medicion_grupocompetencia_competencia/nuevo_medicion_grupocompetencia_competencia',$datos);
		$this->load->view('footer');		
	}
}