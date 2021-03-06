<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class GrupoCompetencia_model extends CI_Model{

		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function nuevo_grupocompetencia($datos){
			$datosBD = array(
				'DESC_Grupo_Competencia' => $datos['DESC_Grupo_Competencia'],
			);
			$this->db->insert('GrupoCompetencia', $datosBD);
		}

		public function obtener_grupocompetencias(){
			$query = $this->db->get('GrupoCompetencia');
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}

		public function obtener_grupocompetencia($id){
			$where = $this->db->where('ID_Grupo_Competencia',$id);
			$query = $this->db->get('GrupoCompetencia');
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}	

		/*
		public function actualizar_grupocompetencia($id,$datos){
			$datosBD = array(
				'DESC_Grupo_Competencia' => $datos['DESC_Grupo_Competencia'],
			);
			$this->db->where('ID_GrupoCompetencia',$id);
			$this->db->update('GrupoCompetencia', $datosBD);
		}	

		public function borrar_grupocompetencia($id){
			$this->db->where('ID_GrupoCompetencia',$id);
			$this->db->delete('GrupoCompetencia');
		}
		*/

		public function obtener_grupocompetencia_ajax(){

			include ("conexion_2.php");
			
			if(!$con) {
			    echo "No se pudo conectar a la base de datos";
			}

			$sql = "SELECT * FROM GrupoCompetencia";
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