<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Usuario_model extends CI_Model{

		function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->database();
		}

		public function nuevo_usuario($datos){
			$datosBD = array(
				'ID_Centro' => $this->input->post('ID_Centro'),
				'ID_TUsuario' => $this->input->post('ID_TUsuario'),
				'User' => $this->input->post('User'),
				'Password' => $this->input->post('Password'),
				'Nombre' => $this->input->post('Nombre'),
				'Apellidos' => $this->input->post('Apellidos'),
				'Email' => $this->input->post('Email'),
				'Dni' => $this->input->post('Dni')
			);
			$this->db->insert('Usuario', $datosBD);
		}

		public function obtener_usuarios(){
			$query = $this->db->get('Usuario');
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}

		//Obtiene todo los Usuarios, pero con los valores de las claves referenciadas
		public function obtener_usuarios_valores(){
			$query = "SELECT ID_Usuario, Usuario.ID_TUsuario, User, Password FROM Usuario, TUsuario WHERE Usuario.ID_TUsuario= TUsuario.ID_TUsuario";
			$query = $this->db->query($query);
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}	

		public function obtener_usuario($id){
			$where = $this->db->where('ID_Usuario',$id);
			$query = $this->db->get('Usuario');
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}	

		//Obtiene Usuario por ID, pero con los valores de las claves referenciadas
		public function obtener_usuario_valores($id){
			$query = "SELECT ID_Usuario, DESC_TUsuario, DESC_Centro, User, Password, Nombre, Apellidos, Email, Dni FROM Usuario, TUsuario, Centro WHERE Usuario.ID_Centro=Centro.ID_Centro AND Usuario.ID_TUsuario= TUsuario.ID_TUsuario AND Usuario.ID_Usuario = ".$id;
			$query = $this->db->query($query);
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}	

		public function actualizar_usuario($id,$datos){
			$datosBD = array(
				'ID_Centro' => $this->input->post('ID_Centro'),
				'ID_TUsuario' => $this->input->post('ID_TUsuario'),
				'User' => $this->input->post('User'),
				'Password' => $this->input->post('Password'),
				'Nombre' => $this->input->post('Nombre'),
				'Apellidos' => $this->input->post('Apellidos'),
				'Email' => $this->input->post('Email'),
				'Dni' => $this->input->post('Dni')
			);
			$this->db->where('ID_Usuario',$id);
			$this->db->update('Usuario', $datosBD);
		}	

		public function borrar_usuario($id){
			$this->db->where('ID_Usuario',$id);
			$this->db->delete('Usuario');
		}
		
		public function conseguir_equipos($ID_Usuario,$ID_Reto){
			$this->db->select('Equipo.ID_Equipo');
			$this->db->from('Equipo');
			$this->db->join('Equipo_Usuario', 'Equipo.ID_Equipo = Equipo_Usuario.ID_Equipo');
			$this->db->where('Equipo.ID_Reto = '.$ID_Reto.' AND Equipo_Usuario.ID_Usuario = '.$ID_Usuario);
			$result=$this->db->get()->row();
			echo $result->ID_Equipo;
		}

		public function filtrar_usuario_valores($ID_Centro,$ID_TUsuario){
			include("conexion_2.php");
			if(!$con) {
		    	echo "No se pudo conectar a la base de datos";
		  	}

			if ($ID_TUsuario == '' AND $ID_Centro != '') {
				$where = "AND Centro.ID_Centro='$ID_Centro'";
			}
			elseif($ID_TUsuario != '' AND $ID_Centro == ''){
				$where = "AND TUsuario.ID_TUsuario='$ID_TUsuario'";
			}
			elseif($ID_TUsuario == '' AND $ID_Centro == ''){
				$where = "";
			}
			else{
				$where = "AND Centro.ID_Centro='$ID_Centro' AND TUsuario.ID_TUsuario='$ID_TUsuario'";
			}

			$sql = "SELECT * FROM Usuario, Centro, TUsuario WHERE Usuario.ID_Centro=Centro.ID_Centro AND Usuario.ID_TUsuario= TUsuario.ID_TUsuario $where";

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

		public function obtener_usuarios_ajax(){
			include ("conexion_2.php");

			if(!$con) {
		  		echo "No se pudo conectar a la base de datos";
		  	}

			$sql = "SELECT * FROM Usuario";
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

		public function usuarios_del_reto($ID_Equipo){
			include("conexion_2.php");
			if(!$con) {
		    	echo "No se pudo conectar a la base de datos";
		  	}

			if ($ID_Equipo != '') {
		
				$where = "AND Equipo_Usuario.ID_Equipo=$ID_Equipo";
			}
			else{

				$where = "";
			}

			$sql = "SELECT DISTINCT Usuario.ID_Usuario, Dni, Nombre, Apellidos, Email, User FROM Usuario, Equipo_Usuario, Equipo
			WHERE Usuario.ID_Usuario=Equipo_Usuario.ID_Usuario AND Equipo_Usuario.ID_Equipo=Equipo.ID_Equipo AND Usuario.ID_TUsuario = '3' $where";

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

		public function compañeros_del_reto($ID_Equipo){
			include("conexion_2.php");
			if(!$con) {
		    	echo "No se pudo conectar a la base de datos";
		  	}

		  	$where = "";

			if ($ID_Equipo != '') {
		
				$where = "AND Equipo_Usuario.ID_Equipo=$ID_Equipo";
			}
			else{

				$where = "";
			}

			$sql = "SELECT * FROM Usuario, Equipo_Usuario, Equipo WHERE Usuario.ID_Usuario=Equipo_Usuario.ID_Usuario AND Equipo_Usuario.ID_Equipo=Equipo.ID_Equipo AND Usuario.ID_TUsuario = '3' $where";

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

		public function verificar_login($user, $password){
			$query = "SELECT * FROM Usuario WHERE User='$user' AND Password='$password'";
			$query = $this->db->query($query);
			if ($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}
	}
?>