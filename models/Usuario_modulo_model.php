<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_modulo_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function nuevo_usuario_modulo($datos){
		$datosBD = array(
			'ID_Usuario' => $this->input->post('ID_Usuario'),
			'ID_Modulo' => $this->input->post('ID_Modulo')
		);
		$this->db->insert('Usuario_Modulo', $datosBD);
	}

	public function obtener_usuarios_modulos(){
		$query = $this->db->get('Usuario_Modulo');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}



		//CICLO USUARIO_MODULO

		//CENTRO MODULO

		//CURSO USUARIO


	//Obtiene todo los Usuario_modulos, pero con los valores de las claves referenciadas
	public function obtener_usuarios_modulos_valores(){
		$query = "SELECT ID_Usuario_Modulo, DESC_Modulo, Nombre FROM Usuario_Modulo, Usuario, Modulo WHERE Usuario_Modulo.ID_Modulo=Modulo.ID_Modulo and Usuario_Modulo.ID_Usuario= Usuario.ID_Usuario";
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function obtener_usuario_modulo($id){
		$where = $this->db->where('ID_Usuario_Modulo',$id);
		$query = $this->db->get('Usuario_Modulo');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	//Obtiene Usuario_modulo por ID, pero con los valores de las claves referenciadas
	public function obtener_usuario_modulo_valores($id){
		$query = "SELECT ID_Usuario_Modulo, DESC_Modulo, Nombre FROM Usuario_Modulo, Usuario, Modulo WHERE Usuario_Modulo.ID_Modulo=Modulo.ID_Modulo and Usuario_Modulo.ID_Usuario= Usuario.ID_Usuario and Usuario_Modulo.ID_Usuario_Modulo = ".$id;
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function actualizar_usuario_modulo($id,$datos){
		$datosBD = array(
			'ID_Modulo' => $datos['ID_Modulo'],
			'ID_Usuario' => $datos['ID_Usuario'],			
		);
		$this->db->where('ID_Usuario_Modulo',$id);
		$this->db->update('Usuario_Modulo', $datosBD);
	}	

	public function borrar_usuario_modulo($id){
		$this->db->where('ID_Usuario_Modulo',$id);
		$this->db->delete('Usuario_Modulo');
	}

	public function filtrar_usuario_modulo_valores($filtro){
		$query = "SELECT ID_Usuario_Modulo, DESC_Modulo, Nombre FROM Usuario_Modulo, Usuario, Modulo WHERE Usuario_Modulo.ID_Modulo=Modulo.ID_Modulo and Usuario_Modulo.ID_Usuario= Usuario.ID_Usuario";
		if ($filtro['ID_Usuario'] != 0){
			$query = $query . " and Usuario.ID_Usuario = " . $filtro['ID_Usuario'];
		}
		if ($filtro['ID_Modulo'] != 0){
			$query = $query . " and Modulo.ID_Modulo = " . $filtro['ID_Modulo'];
		}		
		$query = $this->db->query($query);		
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	
}


?>