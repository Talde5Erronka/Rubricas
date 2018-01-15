<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicion_GrupoCompetencia_Competencia_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	/*
	public function nuevo_medicion_grupocompetencia_competencia($datos){
		$datosBD = array(
			'ID_GrupoCompetencia_Competencia' => $this->input->post('ID_GrupoCompetencia_Competencia'),
			'ID_Medicion' => $this->input->post('ID_Medicion'),
			'ID_GrupoCompetencia' => $this->input->post('ID_GrupoCompetencia'),
			'ID_Competencia' => $this->input->post('ID_Competencia'),	
			'Porcentaje' => $this->input->post('Porcentaje')
			);

		$this->db->insert ('Medicion_GrupoCompetencia_Competencia', $datosBD);
	}
	*/

	public function obtener_mediciones_grupocompetencias_competencias(){
		$query = $this->db->get('Medicion_GrupoCompetencia_Competencia');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	//Obtiene todo los Medicion_GrupoCompetencia_Competencias, pero con los valores de las claves referenciadas
	public function obtener_mediciones_grupocompetencias_competencias_valores(){
		$query = "SELECT ID_GrupoCompetencia_Competencia, ID_Grupo_Competencia, DESC_Grupo_Competencia, DESC_Medicion,Competencia.ID_Competencia, DESC_Competencia, Porcentaje FROM Medicion_GrupoCompetencia_Competencia, Medicion, GrupoCompetencia, Competencia WHERE Medicion_GrupoCompetencia_Competencia.ID_GrupoCompetencia=GrupoCompetencia.ID_Grupo_Competencia and Medicion_GrupoCompetencia_Competencia.ID_Medicion= Medicion.ID_Medicion and Medicion_GrupoCompetencia_Competencia.ID_Competencia=Competencia.ID_Competencia";
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function obtener_medicion_grupocompetencia_competencia($id){
		$where = $this->db->where('ID_GrupoCompetencia',$id);
		$query = $this->db->get('Medicion_GrupoCompetencia_Competencia');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	//Obtiene Medicion_GrupoCompetencia_Competencia por ID, pero con los valores de las claves referenciadas
	public function obtener_medicion_grupocompetencia_competencia_valores($id){
		$query = "SELECT ID_GrupoCompetencia_Competencia, ID_Grupo_Competencia, DESC_Grupo_Competencia, DESC_Medicion,Competencia.ID_Competencia, DESC_Competencia, Porcentaje FROM Medicion_GrupoCompetencia_Competencia, Medicion, GrupoCompetencia, Competencia WHERE Medicion_GrupoCompetencia_Competencia.ID_GrupoCompetencia=GrupoCompetencia.ID_Grupo_Competencia and Medicion_GrupoCompetencia_Competencia.ID_Medicion= Medicion.ID_Medicion and Medicion_GrupoCompetencia_Competencia.ID_Competencia=Competencia.ID_Competencia and Medicion_GrupoCompetencia_Competencia.ID_GrupoCompetencia_Competencia = ".$id;
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	/*
	public function actualizar_medicion_grupocompetencia_competencia($id,$datos){
		$datosBD = array(
			'ID_GrupoCompetencia_Competencia' => $this->input->post('ID_GrupoCompetencia_Competencia'),
			'ID_Medicion' => $this->input->post('ID_Medicion'),
			'ID_GrupoCompetencia' => $this->input->post('ID_GrupoCompetencia'),
			'ID_Competencia' => $this->input->post('ID_Competencia'),	
			'Porcentaje' => $this->input->post('Porcentaje')
		);
		$this->db->where('ID_Grupo_Competencia',$id);
		$this->db->update('Medicion_GrupoCompetencia_Competencia', $datosBD);
	}	

	public function borrar_medicion_grupocompetencia_competencia($id){
		$this->db->where('ID_Grupo_Competencia',$id);
		$this->db->delete('Medicion_GrupoCompetencia_Competencia');
	}
	*/

	public function filtrar_medicion_grupocompetencia_competencia_valores($filtro){
		$query = "SELECT ID_GrupoCompetencia_Competencia, ID_Grupo_Competencia, DESC_Grupo_Competencia, DESC_Medicion,Competencia.ID_Competencia, DESC_Competencia, Porcentaje FROM Medicion_GrupoCompetencia_Competencia, Medicion, GrupoCompetencia, Competencia WHERE Medicion_GrupoCompetencia_Competencia.ID_GrupoCompetencia=GrupoCompetencia.ID_Grupo_Competencia and Medicion_GrupoCompetencia_Competencia.ID_Medicion= Medicion.ID_Medicion and Medicion_GrupoCompetencia_Competencia.ID_Competencia=Competencia.ID_Competencia";
		if ($filtro['ID_Medicion'] != 0){
			$query = $query . " and Medicion.ID_Medicion = " . $filtro['ID_Medicion'];
		}
		if ($filtro['ID_GrupoCompetencia'] != 0){
			$query = $query . " and GrupoCompetencia.ID_GrupoCompetencia = " . $filtro['ID_GrupoCompetencia'];
		}
		if ($filtro['ID_Competencia'] != 0){
			$query = $query . " and Competencia.ID_Competencia = " . $filtro['ID_Competencia'];
		}		
		$query = $this->db->query($query);		
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	
}


?>