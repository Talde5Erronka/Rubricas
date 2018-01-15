<?php
$form = array(
	'name' => 'form_equipo_usuario'
	);
$url = "'".base_url()."index.php/Equipo_usuario'";
$js_cancel_button = 'onClick="location.href='.$url.'"';

$COD_Rol = array(
	'name' => 'COD_Rol',
	'placeholder' => 'Rol del usuario',
	'maxlength' => 20,
	'size' => 20,
	'required' => 1,
	'value' => $equipos_usuarios->result()[0]->COD_Rol
	);

		//  CENTRO  EQUIPO
		//  CURSO   USUARIO
		//  CICLO   EQUIPO_USUARIO


	if ($equipos){
		$ID_Equipo = array();
		foreach ($equipos->result() as $equipo) {
			$ID_Equipo[$equipo->ID_Equipo] = $equipo->DESC_Equipo;
		}	
	}
	else{
		$ID_Equipo = array(
    		0         => 'No hay Equipos'
		);
	}

	if ($usuarios){
		$ID_Usuario = array();
		foreach ($usuarios->result() as $usuario) {
			$ID_Usuario[$usuario->ID_Usuario] = $usuario->User;
		}	
	}
	else{
		$ID_Usuario = array(
    		0         => 'No hay Usuarios'
		);
	}	

?>

<div>
	<?php echo form_open('Equipo_usuario/actualizar/'.$equipos_usuarios->result()[0]->ID_Equipo_Alumno);?>
	<?php echo form_label('Equipo: ','ID_Equipo'); ?>
	<?php
	//DESPLEGABLE DE EQUIPOS
	echo form_dropdown('ID_Equipo', $ID_Equipo, $equipos_usuarios->result()[0]->ID_Equipo);
	?>
	<br>

	<?php echo form_label('Usuario: ','ID_Usuario'); ?>
	<?php
	//DESPLEGABLE DE USUARIOS
	echo form_dropdown('ID_Usuario', $ID_Usuario, $equipos_usuarios->result()[0]->ID_Usuario);
	?>
	<br>

	<?php echo form_label('ROL: ','COD_Rol'); ?>
	<?php echo form_input($COD_Rol); ?>
	<br>
	
	<?php echo form_submit('Actualizar','Actualizar'); ?>
	<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>	
	<?php echo form_close();?>
</div>