<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login_model extends CI_Model{

		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function obtener_usuarios(){
			$query = $this->db->get('Usuario');
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}

		public function obtener_usuarios_administradores(){
			$query = "SELECT * FROM Usuario WHERE Usuario.ID_TUsuario='1'";
			$query = $this->db->query($query);
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}

		public function obtener_usuarios_profesores(){
			$query = "SELECT * FROM Usuario WHERE Usuario.ID_TUsuario='2'";
			$query = $this->db->query($query);
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}

		public function obtener_usuarios_alumnos(){
			$query = "SELECT * FROM Usuario WHERE Usuario.ID_TUsuario='3'";
			$query = $this->db->query($query);
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}
	}
?>