<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function nuevo_equipo($datos){
		$datosBD = array(
			'ID_Reto' => $this->input->post('ID_Reto'),
			'COD_Equipo' => $this->input->post('COD_Equipo'),			
			'DESC_Equipo' => $this->input->post('DESC_Equipo')
		);
		$this->db->insert('Equipo', $datosBD);
	}

	public function obtener_equipos(){
		$query = $this->db->get('Equipo');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	//Obtiene todo los Equipos, pero con los valores de las claves referenciadas
	public function obtener_equipos_valores(){
		$query = "SELECT ID_Equipo, COD_Equipo, DESC_Equipo FROM Equipo, Reto WHERE Equipo.ID_Reto=Reto.ID_Reto";
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function obtener_equipo($id){
		$where = $this->db->where('ID_Equipo',$id);
		$query = $this->db->get('Equipo');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	//Obtiene Equipo por ID, pero con los valores de las claves referenciadas
	public function obtener_equipo_valores($id){
		$query = "SELECT ID_Equipo, COD_Equipo, DESC_Equipo FROM Equipo, Reto WHERE Equipo.ID_Reto=Reto.ID_Reto and Equipo.ID_Equipo = ".$id;
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function actualizar_equipo($id,$datos){
		$datosBD = array(
			'ID_Reto' => $datos['ID_Reto'],			
			'COD_Equipo' => $datos['COD_Equipo'],
			'DESC_Equipo' => $datos['DESC_Equipo'],
		);
		$this->db->where('ID_Equipo',$id);
		$this->db->update('Equipo', $datosBD);
	}	

	public function borrar_equipo($id){
		$this->db->where('ID_Equipo',$id);
		$this->db->delete('Equipo');
	}
	

	public function filtrar_equipo_valores($ID_Reto){
		include("conexion_2.php");
		if(!$con) {
	    	echo "No se pudo conectar a la base de datos";
	  	}

		if ($ID_Reto != '') {
			$where = "and Reto.ID_Reto='$ID_Reto'";
		}
		else{
			$where = "";
		}

		$sql = "SELECT * FROM Equipo, Reto WHERE Equipo.ID_Reto=Reto.ID_Reto $where";

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

	public function obtener_equipos_ajax(){

		include ("conexion_2.php");
		
		if(!$con) {
		    echo "No se pudo conectar a la base de datos";
		  }


		$sql = "SELECT * FROM Equipo";
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

	public function obtener_equipos_por_cada_reto($reto){
		include ("conexion_2.php");
		
		if(!$con) {
		    echo "No se pudo conectar a la base de datos";
		  }

		if($reto!=""){
			$sql = "SELECT Reto.ID_Reto, Equipo.ID_Equipo, DESC_Equipo FROM Equipo, Reto WHERE Reto.ID_Reto=Equipo.ID_Reto and Reto.ID_Reto = $reto";
		}
		else{
			$sql = "SELECT * FROM Equipo";
		}

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