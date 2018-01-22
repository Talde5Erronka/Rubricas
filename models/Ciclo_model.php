
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciclo_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function nuevo_ciclo($datos){
		$datosBD = array(
			'ID_Curso' => $this->input->post('ID_Curso'),
			'ID_Centro' => $this->input->post('ID_Centro'),
			'COD_Ciclo' => $this->input->post('COD_Ciclo'),									
			'DESC_Ciclo' => $this->input->post('DESC_Ciclo')
		);
		$this->db->insert('Ciclo', $datosBD);
	}

	public function obtener_ciclos(){
		$query = $this->db->get('Ciclo');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	//Obtiene todo los Ciclos, pero con los valores de las claves referenciadas
	public function obtener_ciclos_valores(){
		$query = "SELECT ID_Ciclo, DESC_Centro, COD_Curso, COD_Ciclo, DESC_Ciclo FROM Ciclo, Curso, Centro WHERE Ciclo.ID_Centro=Centro.ID_Centro and Ciclo.ID_Curso= Curso.ID_Curso";
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function obtener_ciclo($id){
		$where = $this->db->where('ID_Ciclo',$id);
		$query = $this->db->get('Ciclo');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	//Obtiene Ciclo por ID, pero con los valores de las claves referenciadas
	public function obtener_ciclo_valores($id){
		$query = "SELECT ID_Ciclo, DESC_Centro, COD_Curso, COD_Ciclo, DESC_Ciclo FROM Ciclo, Curso, Centro WHERE Ciclo.ID_Centro=Centro.ID_Centro and Ciclo.ID_Curso= Curso.ID_Curso and Ciclo.ID_Ciclo = ".$id;
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function actualizar_ciclo($id,$datos){
		$datosBD = array(
			'ID_Centro' => $datos['ID_Centro'],
			'ID_Curso' => $datos['ID_Curso'],			
			'COD_Ciclo' => $datos['COD_Ciclo'],
			'DESC_Ciclo' => $datos['DESC_Ciclo'],
		);
		$this->db->where('ID_Ciclo',$id);
		$this->db->update('Ciclo', $datosBD);
	}	

	public function borrar_ciclo($id){
		$this->db->where('ID_Ciclo',$id);
		$this->db->delete('Ciclo');
	}


	public function filtrar_ciclo_valores($ID_Centro,$ID_Curso){
		include("conexion_2.php");
		if(!$con) {
	    	echo "No se pudo conectar a la base de datos";
	  	}

		if ($ID_Curso == '' and $ID_Centro != '') {
			$where = "and Centro.ID_Centro='$ID_Centro'";
		}
		elseif($ID_Curso != '' and $ID_Centro == ''){
			$where = "and Curso.ID_Curso='$ID_Curso'";
		}
		elseif($ID_Curso == '' and $ID_Centro == ''){
			$where = "";
		}
		else{
			$where = "and Centro.ID_Centro='$ID_Centro' and Curso.ID_Curso='$ID_Curso'";
		}

		$sql = "SELECT * FROM Ciclo, Centro, Curso WHERE Ciclo.ID_Centro=Centro.ID_Centro and Ciclo.ID_Curso= Curso.ID_Curso $where";

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


	public function obtener_ciclos_ajax(){

		include ("conexion_2.php");
		
		if(!$con) {
		    echo "No se pudo conectar a la base de datos";
		  }


		$sql = "SELECT * FROM Ciclo";
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