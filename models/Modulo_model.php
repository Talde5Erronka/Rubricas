<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Modulo_model extends CI_Model{

		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function nuevo_modulo($datos){
			$datosBD = array(
				'ID_Modulo' => $this->input->post('ID_Modulo'),
				'ID_Ciclo' => $this->input->post('ID_Ciclo'),
				'COD_Modulo' => $this->input->post('COD_Modulo'),									
				'DESC_Modulo' => $this->input->post('DESC_Modulo')
			);
			$this->db->insert('Modulo', $datosBD);
		}

		public function obtener_modulos(){
			$query = $this->db->get('Modulo');
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}

		//Obtiene todo los Ciclos, pero con los valores de las claves referenciadas
		public function obtener_modulos_valores(){
			$query = "SELECT ID_Modulo, DESC_Ciclo, COD_Modulo, DESC_Modulo FROM Ciclo,Centro,Modulo  WHERE Ciclo.ID_Centro=Centro.ID_Centro and Ciclo.ID_Ciclo=Modulo.ID_Ciclo";
			$query = $this->db->query($query);
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}

		public function obtener_modulo($id){
			$where = $this->db->where('ID_Modulo',$id);
			$query = $this->db->get('Modulo');
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}

		//Obtiene Ciclo por ID, pero con los valores de las claves referenciadas
		public function obtener_modulo_valores($id){
			$query = "SELECT ID_Modulo, DESC_Ciclo, COD_Modulo,DESC_Modulo FROM Ciclo,Centro,Modulo WHERE Ciclo.ID_Centro=Centro.ID_Centro  and Ciclo.ID_Ciclo=Modulo.ID_Ciclo  and  Ciclo.ID_Ciclo = ".$id;
			$query = $this->db->query($query);
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}

		public function actualizar_modulo($id,$datos){
			$datosBD = array(
				'ID_Ciclo' => $datos['ID_Ciclo'],			
				'COD_Modulo' => $datos['COD_Modulo'],
				'DESC_Modulo' => $datos['DESC_Modulo']
			);
			$this->db->where('ID_Modulo',$id);
			$this->db->update('Modulo', $datosBD);
		}

		public function borrar_modulo($id){
			$this->db->where('ID_Modulo',$id);
			$this->db->delete('Modulo');
		}

		//Obtiene Modulo por ID, pero con los valores de las claves referenciadas
		public function filtrar_modulo_valores($ID_Centro,$ID_Ciclo){
			include("conexion_2.php");
			if(!$con) {
		    	echo "No se pudo conectar a la base de datos";
		  	}

			if ($ID_Ciclo == '' and $ID_Centro != '') {
				$where = "and Centro.ID_Centro='$ID_Centro'";
			}
			elseif($ID_Ciclo != '' and $ID_Centro == ''){
				$where = "and Ciclo.ID_Ciclo='$ID_Ciclo'";
			}
			elseif($ID_Ciclo == '' and $ID_Centro == ''){
				$where = "";
			}
			else{
				$where = "and Centro.ID_Centro='$ID_Centro' and Ciclo.ID_Ciclo='$ID_Ciclo'";
			}

			$sql = "SELECT * FROM Ciclo, Modulo, Centro WHERE Ciclo.ID_Centro=Centro.ID_Centro and Ciclo.ID_Ciclo=Modulo.ID_Ciclo $where";

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

		public function obtener_modulos_ajax(){
			include ("conexion_2.php");
			if(!$con) {
			    echo "No se pudo conectar a la base de datos";
			}
			$sql = "SELECT * FROM Modulo";
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