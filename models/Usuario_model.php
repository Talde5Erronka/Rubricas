<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{

	function __construct(){
		parent::__construct();
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
		$query = "SELECT ID_Usuario, DESC_TUsuario, DESC_Centro, User, Password, Nombre, Apellidos, Email, Dni FROM Usuario, TUsuario, Centro WHERE Usuario.ID_Centro=Centro.ID_Centro and Usuario.ID_TUsuario= TUsuario.ID_TUsuario and Usuario.ID_Usuario = ".$id;
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

	public function filtrar_usuario_valores($ID_Centro,$ID_TUsuario){
		include("conexion_2.php");
		if(!$con) {
	    	echo "No se pudo conectar a la base de datos";
	  	}

		if ($ID_TUsuario == '' and $ID_Centro != '') {
			$where = "and Centro.ID_Centro='$ID_Centro'";
		}
		elseif($ID_TUsuario != '' and $ID_Centro == ''){
			$where = "and TUsuario.ID_TUsuario='$ID_TUsuario'";
		}
		elseif($ID_TUsuario == '' and $ID_Centro == ''){
			$where = "";
		}
		else{
			$where = "and Centro.ID_Centro='$ID_Centro' and TUsuario.ID_TUsuario='$ID_TUsuario'";
		}

		$sql = "SELECT * FROM Usuario, Centro, TUsuario WHERE Usuario.ID_Centro=Centro.ID_Centro and Usuario.ID_TUsuario= TUsuario.ID_TUsuario $where";

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
	
			$where = "and Equipo_Usuario.ID_Equipo=$ID_Equipo";
		}
		else{

			$where = "";
		}

		$sql = "SELECT DISTINCT Usuario.ID_Usuario, Dni, Nombre, Apellidos, Email, User FROM Usuario, Equipo_Usuario, Equipo
		WHERE Usuario.ID_Usuario=Equipo_Usuario.ID_Usuario and Equipo_Usuario.ID_Equipo=Equipo.ID_Equipo and Usuario.ID_TUsuario = '3' $where";

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

	public function compañeros_de_grupo($ID_Reto){
		include("conexion_2.php");
		if(!$con) {
	    	echo "No se pudo conectar a la base de datos";
	  	}

		if ($ID_Reto != '') {
	
			$where = "and Reto.ID_Reto=$ID_Reto";
		}
		else{

			$where = "";
		}

		$sql = "SELECT DISTINCT Usuario.ID_Usuario, Dni, Nombre, Apellidos, Email, User FROM Usuario, Equipo_Usuario, Equipo, Reto
		WHERE Usuario.ID_Usuario=Equipo_Usuario.ID_Usuario and Equipo_Usuario.ID_Equipo=Equipo.ID_Equipo and Usuario.ID_TUsuario = '3' $where";

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