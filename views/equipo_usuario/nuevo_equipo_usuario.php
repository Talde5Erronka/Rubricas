<?php
$form = array(
	'name' => 'form_equipo_usuario'
	);

$COD_Rol = array(
	'name' => 'COD_Rol',
	'placeholder' => 'Rol del usuario',
	'maxlength' => 20,
	'size' => 20,
	'required' => 1
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
	<?php echo form_open('Equipo_usuario/nuevo_equipo_usuario',$form);?>
	<?php echo form_label('Equipo: ','ID_Equipo'); ?>
	<?php
	//DESPLEGABLE DE CENTRO
	echo form_dropdown('ID_Equipo', $ID_Equipo,1);
	?>
	<br>

	<?php echo form_label('Usuario: ','ID_Usuario'); ?>
	<?php
	//DESPLEGABLE DE CURSOS
	echo form_dropdown('ID_Usuario', $ID_Usuario,1);
	?>
	<br>

	<?php echo form_label('Rol: ','COD_Rol'); ?>
	<?php echo form_input($COD_Rol); ?>
	<br>	
	<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close();?>
</div>