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

		public function filtrar_medicion_grupocompetencia_competencia_valores($ID_Medicion,$ID_Grupo_Competencia,$ID_Competencia){
			include("conexion_2.php");
			if(!$con) {
		    	echo "No se pudo conectar a la base de datos";
		  	}

			if ($ID_Grupo_Competencia == '' and $ID_Medicion != '' and $ID_Competencia == '') {
				$where = "and Medicion.ID_Medicion='$ID_Medicion'";
			}
			elseif($ID_Grupo_Competencia != '' and $ID_Medicion == '' and $ID_Competencia == ''){
				$where = "and GrupoCompetencia.ID_Grupo_Competencia='$ID_Grupo_Competencia'";
			}
			elseif($ID_Grupo_Competencia == '' and $ID_Medicion == '' and $ID_Competencia != ''){
				$where = "and Competencia.ID_Competencia='$ID_Competencia'";
			}

			elseif($ID_Grupo_Competencia != '' and $ID_Medicion != '' and $ID_Competencia == ''){
				$where = "and GrupoCompetencia.ID_Grupo_Competencia='$ID_Grupo_Competencia' and Medicion.ID_Medicion='$ID_Medicion'";
			}
			elseif($ID_Grupo_Competencia != '' and $ID_Medicion == '' and $ID_Competencia != ''){
				$where = "and GrupoCompetencia.ID_Grupo_Competencia='$ID_Grupo_Competencia' and Competencia.ID_Competencia='$ID_Competencia'";
			}
			elseif($ID_Grupo_Competencia == '' and $ID_Medicion != '' and $ID_Competencia != ''){
				$where = "and Medicion.ID_Medicion='$ID_Medicion' and Competencia.ID_Competencia='$ID_Competencia'";
			}

			elseif($ID_Grupo_Competencia == '' and $ID_Medicion == '' and $ID_Competencia == ''){
				$where = "";
			}
			else{
				$where = "and GrupoCompetencia.ID_Grupo_Competencia='$ID_Grupo_Competencia' and Medicion.ID_Medicion='$ID_Medicion' and Competencia.ID_Competencia='$ID_Competencia'";
			}

			$sql = "SELECT * FROM Medicion_GrupoCompetencia_Competencia, Medicion, GrupoCompetencia, Competencia WHERE Medicion_GrupoCompetencia_Competencia.ID_Medicion=Medicion.ID_Medicion and Medicion_GrupoCompetencia_Competencia.ID_GrupoCompetencia= GrupoCompetencia.ID_Grupo_Competencia and Medicion_GrupoCompetencia_Competencia.ID_Competencia= Competencia.ID_Competencia $where";

			$result = $con->query($sql);
			$rowdata=array();
			$i=0;
				while ($row = $result->fetch_array())
				{
					$rowdata[$i]=$row;
					$i++;			
				}
			echo json_encode($rowdata);
		}	

		public function obtener_medicion_grupocompetencia_competencia_ajax(){

			include ("conexion_2.php");
			
			if(!$con) {
			    echo "No se pudo conectar a la base de datos";
			}

			$sql = "SELECT * FROM Medicion_GrupoCompetencia_Competencia";
			$result = $con->query($sql);

			$rowdata=array();
			$i=0;
					while ($row = $result->fetch_array())
					{
						$rowdata[$i]=$row;
						$i++;			
					}
			echo json_encode($rowdata);
		}		
	}
?>