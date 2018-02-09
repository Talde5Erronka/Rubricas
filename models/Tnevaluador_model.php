<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Tnevaluador_model extends CI_Model{

		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function nuevo_tnevaluador($datos){
			$datosBD = array(
				'DESC_TNEvaluador' => $datos['DESC_TNEvaluador'],
			);
			$this->db->insert('TNEvaluador', $datosBD);
		}

		public function obtener_tnevaluadores(){
			$query = $this->db->get('TNEvaluador');
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}

		public function obtener_tnevaluador($id){
			$where = $this->db->where('ID_TNEvaluador',$id);
			$query = $this->db->get('TNEvaluador');
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}	

		public function actualizar_tnevaluador($id,$datos){
			$datosBD = array(
				'DESC_TNEvaluador' => $datos['DESC_TNEvaluador'],
			);
			$this->db->where('ID_TNEvaluador',$id);
			$this->db->update('TNEvaluador', $datosBD);
		}	

		public function borrar_tnevaluador($id){
			$this->db->where('ID_TNEvaluador',$id);
			$this->db->delete('TNEvaluador');
		}

		public function obtener_tnevaluadores_ajax(){

			include ("conexion_2.php");
			
			if(!$con) {
			    echo "No se pudo conectar a la base de datos";
			}

			$sql = "SELECT * FROM TNEvaluador";
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