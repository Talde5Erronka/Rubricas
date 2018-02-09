<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Reto_Modulo_model extends CI_Model{

		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function nuevo_reto_modulo($datos){
			$datosBD = array(
				'ID_Reto' => $this->input->post('ID_Reto'),
				'ID_Modulo' => $this->input->post('ID_Modulo'),
				'ID_UAdmin' => $this->input->post('ID_UAdmin'),
				'IN_Extendido' => $this->input->post('IN_Extendido'),
				'IN_EAbierta' => $this->input->post('IN_EAbierta')
				);

			$this->db->insert ('Reto_Modulo', $datosBD);
		}

		public function obtener_retos_modulos(){
			$query = $this->db->get('Reto_Modulo');
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}

		//Obtiene todo los Reto_Modulos, pero con los valores de las claves referenciadas
		public function obtener_retos_modulos_valores(){
			$query = "SELECT ID_Reto_Modulo, DESC_Modulo, COD_Reto, DESC_Reto, ID_UAdmin, IN_Extendido, IN_EAbierta FROM Reto_Modulo, Reto, Modulo WHERE Reto_Modulo.ID_Modulo=Modulo.ID_Modulo and Reto_Modulo.ID_Reto= Reto.ID_Reto";
			$query = $this->db->query($query);
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}	

		public function obtener_reto_modulo($id){
			$where = $this->db->where('ID_Reto_Modulo',$id);
			$query = $this->db->get('Reto_Modulo');
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}	

		//Obtiene Reto_Modulo por ID, pero con los valores de las claves referenciadas
		public function obtener_reto_modulo_valores($id){
			$query = "SELECT ID_Reto_Modulo, DESC_Modulo, COD_Reto, DESC_Reto, ID_UAdmin, IN_Extendido, IN_EAbierta FROM Reto_Modulo, Reto, Modulo WHERE Reto_Modulo.ID_Modulo=Modulo.ID_Modulo and Reto_Modulo.ID_Reto= Reto.ID_Reto and Reto_Modulo.ID_Reto_Modulo = ".$id;
			$query = $this->db->query($query);
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}	

		public function actualizar_reto_modulo($id,$datos){
			$datosBD = array(
				'ID_Reto' => $this->input->post('ID_Reto'),
				'ID_Modulo' => $this->input->post('ID_Modulo'),
				'ID_UAdmin' => $this->input->post('ID_UAdmin'),
				'IN_Extendido' => $this->input->post('IN_Extendido'),
				'IN_EAbierta' => $this->input->post('IN_EAbierta')
			);
			$this->db->where('ID_Reto_Modulo',$id);
			$this->db->update('Reto_Modulo', $datosBD);
		}	

		public function borrar_reto_modulo($id){
			$this->db->where('ID_Reto_Modulo',$id);
			$this->db->delete('Reto_Modulo');
		}

		public function filtrar_reto_modulo_valores($ID_Reto,$ID_Modulo){
			include("conexion_2.php");
			if(!$con) {
		    	echo "No se pudo conectar a la base de datos";
		  	}

			if ($ID_Modulo == '' and $ID_Reto != '') {
				$where = "and Reto.ID_Reto='$ID_Reto'";
			}
			elseif($ID_Modulo != '' and $ID_Reto == ''){
				$where = "and Modulo.ID_Modulo='$ID_Modulo'";
			}
			elseif($ID_Modulo == '' and $ID_Reto == ''){
				$where = "";
			}
			else{
				$where = "and Reto.ID_Reto='$ID_Reto' and Modulo.ID_Modulo='$ID_Modulo'";
			}

			$sql = "SELECT * FROM Reto_Modulo, Reto, Modulo WHERE Reto_Modulo.ID_Reto=Reto.ID_Reto and Reto_Modulo.ID_Modulo= Modulo.ID_Modulo $where";

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