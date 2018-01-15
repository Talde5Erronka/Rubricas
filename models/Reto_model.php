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
}


?>