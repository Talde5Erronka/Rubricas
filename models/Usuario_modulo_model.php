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

		public function filtrar_usuario_modulo_valores($ID_Modulo,$ID_Usuario){
			include("conexion_2.php");
			if(!$con) {
		    	echo "No se pudo conectar a la base de datos";
		  	}

			if ($ID_Usuario == '' and $ID_Modulo != '') {
				$where = "and Modulo.ID_Modulo='$ID_Modulo'";
			}
			elseif($ID_Usuario != '' and $ID_Modulo == ''){
				$where = "and Usuario.ID_Usuario='$ID_Usuario'";
			}
			elseif($ID_Usuario == '' and $ID_Modulo == ''){
				$where = "";
			}
			else{
				$where = "and Modulo.ID_Modulo='$ID_Modulo' and Usuario.ID_Usuario='$ID_Usuario'";
			}

			$sql = "SELECT * FROM Usuario_Modulo, Modulo, Usuario WHERE Usuario_Modulo.ID_Modulo=Modulo.ID_Modulo and Usuario_Modulo.ID_Usuario= Usuario.ID_Usuario $where";

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

		public function obtener_usuarios_modulos_ajax(){

			include ("conexion_2.php");
			
			if(!$con) {
			    echo "No se pudo conectar a la base de datos";
			}

			$sql = "SELECT * FROM Usuario_Modulo";
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