<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Centro_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function nuevo_centro($datos){
		$datosBD = array(
			'COD_Centro' => $datos['COD_Centro'],
			'DESC_Centro' => $datos['DESC_Centro'],
		);
		$this->db->insert('Centro', $datosBD);
	}

	public function obtener_centros(){
		$query = $this->db->get('Centro');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	public function obtener_centro($id){
		$where = $this->db->where('ID_Centro',$id);
		$query = $this->db->get('Centro');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function actualizar_centro($id,$datos){
		$datosBD = array(
			'COD_Centro' => $datos['COD_Centro'],
			'DESC_Centro' => $datos['DESC_Centro'],
		);
		$this->db->where('ID_Centro',$id);
		$this->db->update('Centro', $datosBD);
	}	

		public function borrar_centro($id){
		$this->db->where('ID_Centro',$id);
		$this->db->delete('Centro');
	}	


	public function obtener_centros_ajax(){

		include ("conexion_2.php");
		
		if(!$con) {
		    echo "No se pudo conectar a la base de datos";
		  }


		$sql = "SELECT * FROM Centro";
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