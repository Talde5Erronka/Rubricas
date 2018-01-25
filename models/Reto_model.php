<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reto_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function nuevo_reto($datos){
		$datosBD = array(
			'COD_Reto' => $datos['COD_Reto'],
			'DESC_Reto' => $datos['DESC_Reto']
		);
		$this->db->insert('Reto', $datosBD);
	}

	public function obtener_retos(){
		$query = $this->db->get('Reto');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	public function obtener_reto($id){
		$where = $this->db->where('ID_Reto',$id);
		$query = $this->db->get('Reto');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function actualizar_reto($id,$datos){
		$datosBD = array(
			'COD_Reto' => $datos['COD_Reto'],
			'DESC_Reto' => $datos['DESC_Reto']
		);
		$this->db->where('ID_Reto',$id);
		$this->db->update('Reto', $datosBD);
	}	

		public function borrar_reto($id){
		$this->db->where('ID_Reto',$id);
		$this->db->delete('Reto');
	}	


public function obtener_retos_ajax(){

		include ("conexion_2.php");
		
		if(!$con) {
		    echo "No se pudo conectar a la base de datos";
		  }


		$sql = "SELECT * FROM Reto";
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

public function obtener_retos_profesor($ID_Usuario){

		include ("conexion_2.php");
		
		if(!$con) {
		    echo "No se pudo conectar a la base de datos";
		}

		if($ID_Usuario == ''){
			$where = "";
		}
		else{
			$where = "and Usuario.ID_Usuario=$ID_Usuario";
		}


		$sql = "SELECT DISTINCT Reto.ID_Reto, Reto.DESC_Reto FROM Reto, Reto_Modulo, Modulo, Usuario_Modulo, Usuario WHERE Reto.ID_Reto=Reto_Modulo.ID_Reto and Reto_Modulo.ID_Modulo=Modulo.ID_Modulo and Modulo.ID_Modulo=Usuario_Modulo.ID_Modulo and Usuario_Modulo.ID_Usuario=Usuario.ID_Usuario $where";
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

	public function obtener_retos_alumno($ID_Usuario){

		include ("conexion_2.php");
		
		if(!$con) {
		    echo "No se pudo conectar a la base de datos";
		}

		if($ID_Usuario == ''){
			$where = "ola";
		}
		else{
			$where = "and Usuario.ID_Usuario='$ID_Usuario'";
		}


		$sql = "SELECT DISTINCT Reto.ID_Reto, Reto.DESC_Reto FROM Reto, Reto_Modulo, Modulo, Usuario_Modulo, Usuario WHERE Reto.ID_Reto=Reto_Modulo.ID_Reto and Reto_Modulo.ID_Modulo=Modulo.ID_Modulo and Modulo.ID_Modulo=Usuario_Modulo.ID_Modulo and Usuario_Modulo.ID_Usuario=Usuario.ID_Usuario $where";
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