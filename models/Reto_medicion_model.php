<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Reto_medicion_model extends CI_Model{

		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function nuevo_reto_medicion($datos){
			$datosBD = array(
				'ID_Reto' => $this->input->post('ID_Reto'),
				'ID_Medicion' => $this->input->post('ID_Medicion'),
			);
			$this->db->insert('Reto_Medicion', $datosBD);
		}

	public function obtener_retos_mediciones(){
			$query = $this->db->get('Reto_Medicion');
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}

		public function obtener_retos_mediciones_valores(){
			$query = "SELECT ID_Reto_Medicion, Reto.ID_Reto, Medicion.ID_Medicion FROM Reto,Medicion,Reto_Medicion  WHERE Reto.ID_Reto=Reto_Medicion.ID_Reto and Medicion.ID_Medicion=Reto_Medicion.ID_Medicion";
			$query = $this->db->query($query);
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}

		public function obtener_reto_medicion($id){
			$where = $this->db->where('ID_Reto_Medicion',$id);
			$query = $this->db->get('Reto_Medicion');
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}

		public function obtener_reto_medicion_valores($id){
			$query = "SELECT ID_Reto_Medicion, Reto.ID_Reto, Medicion.ID_Medicion FROM Reto,Medicion,Reto_Medicion  WHERE Reto.ID_Reto=Reto_Medicion.ID_Reto and Medicion.ID_Medicion=Reto_Medicion.ID_Medicion=".$id;
			$query = $this->db->query($query);
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}

		public function actualizar_reto_medicion($id,$datos){
			$datosBD = array(
				'ID_Reto' => $datos['ID_Reto'],
				'ID_Medicion' => $datos['ID_Medicion'],			
			
			);
			$this->db->where('ID_Reto_Medicion',$id);
			$this->db->update('Reto_Medicion', $datosBD);
		}	

		public function borrar_reto_medicion($id){
			$this->db->where('ID_Reto_Medicion',$id);
			$this->db->delete('Reto_Medicion');
		}

		public function filtrar_reto_medicion_valores($ID_Reto,$ID_Medicion){
			include("conexion_2.php");
			if(!$con) {
		    	echo "No se pudo conectar a la base de datos";
		  	}

			if ($ID_Medicion == '' and $ID_Reto != '') {
				$where = "and Reto.ID_Reto='$ID_Reto'";
			}
			elseif($ID_Medicion != '' and $ID_Reto == ''){
				$where = "and Medicion.ID_Medicion='$ID_Medicion'";
			}
			elseif($ID_Medicion == '' and $ID_Reto == ''){
				$where = "";
			}
			else{
				$where = "and Reto.ID_Reto='$ID_Reto' and Medicion.ID_Medicion='$ID_Medicion'";
			}

			$sql = "SELECT * FROM Reto_Medicion, Reto, Medicion WHERE Reto_Medicion.ID_Reto=Reto.ID_Reto and Reto_Medicion.ID_Medicion= Medicion.ID_Medicion $where";

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







