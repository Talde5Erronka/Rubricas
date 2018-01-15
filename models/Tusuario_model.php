<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tusuario_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function nuevo_tusuario($datos){
		$datosBD = array(
			'DESC_TUsuario' => $datos['DESC_TUsuario'],
		);
		$this->db->insert('TUsuario', $datosBD);
	}

	public function obtener_tusuarios(){
		$query = $this->db->get('TUsuario');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	public function obtener_tusuario($id){
		$where = $this->db->where('ID_TUsuario',$id);
		$query = $this->db->get('TUsuario');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function actualizar_tusuario($id,$datos){
		$datosBD = array(
			'DESC_TUsuario' => $datos['DESC_TUsuario'],
		);
		$this->db->where('ID_TUsuario',$id);
		$this->db->update('TUsuario', $datosBD);
	}	

		public function borrar_tusuario($id){
		$this->db->where('ID_TUsuario',$id);
		$this->db->delete('TUsuario');
	}	
}


?>