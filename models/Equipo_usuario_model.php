<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo_usuario_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function nuevo_equipo_usuario($datos){
		$datosBD = array(
			'ID_Equipo_Alumno' => $this->input->post('ID_Equipo_Alumno'),
			'ID_Equipo' => $this->input->post('ID_Equipo'),
			'ID_Usuario' => $this->input->post('ID_Usuario'),				
			'COD_Rol' => $this->input->post('COD_Rol')
		);
		$this->db->insert('Equipo_Usuario', $datosBD);
	}

	public function obtener_equipos_usuarios(){
		$query = $this->db->get('Equipo_Usuario');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

			//Obtiene todo los Equipo_Usuarios, pero con los valores de las claves referenciadas
	public function obtener_equipos_usuarios_valores(){
		$query = "SELECT ID_Equipo_Alumno, Equipo.DESC_Equipo, Usuario.User, COD_Rol FROM Usuario,Equipo_Usuario,Equipo  WHERE Usuario.ID_Usuario=Equipo_Usuario.ID_Usuario and Equipo.ID_Equipo=Equipo_Usuario.ID_Equipo";
		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

		public function obtener_equipo_usuario($id){
		$where = $this->db->where('ID_Equipo_Alumno',$id);
		$query = $this->db->get('Equipo_Usuario');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

		//Obtiene Equipo_Usuario por ID, pero con los valores de las claves referenciadas
	public function obtener_equipo_usuario_valores($id){
		$query = "SELECT ID_Equipo_Alumno, Equipo.DESC_Equipo, Usuario.User, COD_Rol FROM Usuario,Equipo_Usuario,Equipo WHERE Usuario.ID_Usuario=Equipo_Usuario.ID_Usuario and Equipo.ID_Equipo=Equipo_Usuario.ID_Equipo  and  Equipo_Usuario.ID_Equipo_Alumno = ".$id;

		$query = $this->db->query($query);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

		public function actualizar_equipo_usuario($id,$datos){
		$datosBD = array(
			'ID_Equipo' => $datos['ID_Equipo'],			
			'ID_Usuario' => $datos['ID_Usuario'],
			'COD_Rol' => $datos['COD_Rol']
		);
		$this->db->where('ID_Equipo_Alumno',$id);
		$this->db->update('Equipo_Usuario', $datosBD);
	}

			public function borrar_equipo_usuario($id){
		$this->db->where('ID_Equipo_Alumno',$id);
		$this->db->delete('Equipo_Usuario');
	}


		//Obtiene Equipo_Usuario por ID, pero con los valores de las claves referenciadas
		public function filtrar_equipo_usuario_valores($ID_Equipo,$ID_Usuario){
		include("conexion_2.php");
		if(!$con) {
	    	echo "No se pudo conectar a la base de datos";
	  	}

		if ($ID_Usuario == '' and $ID_Equipo != '') {
			$where = "and Equipo.ID_Equipo='$ID_Equipo'";
		}
		elseif($ID_Usuario != '' and $ID_Equipo == ''){
			$where = "and Usuario.ID_Usuario='$ID_Usuario'";
		}
		elseif($ID_Usuario == '' and $ID_Equipo == ''){
			$where = "";
		}
		else{
			$where = "and Equipo.ID_Equipo='$ID_Equipo' and Usuario.ID_Usuario='$ID_Usuario'";
		}

		$sql = "SELECT * FROM Equipo_Usuario, Equipo, Usuario WHERE Equipo_Usuario.ID_Equipo=Equipo.ID_Equipo and Equipo_Usuario.ID_Usuario= Usuario.ID_Usuario $where";

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

	public function obtener_equipos_usuarios_ajax(){

		include ("conexion_2.php");
		
		if(!$con) {
		    echo "No se pudo conectar a la base de datos";
		  }


		$sql = "SELECT * FROM Equipo_Usuario";
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