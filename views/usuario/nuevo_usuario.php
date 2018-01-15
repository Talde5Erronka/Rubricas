<?php
$form = array(
	'name' => 'form_usuario'
	);
$User = array(
	'name' => 'User',
	'placeholder' => 'User',
	'maxlength' => 10,
	'size' => 20,
	'required' => 1
	);
$Password = array(	
	'name' => 'Password',
	'placeholder' => 'Password de Usuario',
	'maxlength' => 100,
	'size' => 30,
	'required' => 1
	);
$Nombre = array(
	'name' => 'Nombre',
	'placeholder' => 'Nombre de Usuario',
	'maxlength' => 10,
	'size' => 20,
	'required' => 1
	);
$Apellidos = array(	
	'name' => 'Apellidos',
	'placeholder' => 'Apellidos de Usuario',
	'maxlength' => 100,
	'size' => 30,
	'required' => 1
	);
$Email = array(
	'name' => 'Email',
	'placeholder' => 'Email de Usuario',
	'maxlength' => 10,
	'size' => 20,
	'required' => 1
	);
$Dni = array(	
	'name' => 'Dni',
	'placeholder' => 'Dni de Usuario',
	'maxlength' => 100,
	'size' => 30,
	'required' => 1
	);


	if ($centros){
		$ID_Centro = array();
		foreach ($centros->result() as $centro) {
			$ID_Centro[$centro->ID_Centro] = $centro->DESC_Centro;
		}	
	}
	else{
		$ID_Centro = array(
    		0         => 'No hay Centros'
		);
	}

	if ($tusuarios){
			$ID_TUsuario = array();
			foreach ($tusuarios->result() as $tusuario) {
				$ID_TUsuario[$tusuario->ID_TUsuario] = $tusuario->DESC_TUsuario;
			}	
		}
		else{
			$ID_TUsuario = array(
	    		0         => 'No hay Usuarios'
			);
		}

?>

<div>
	<?php echo form_open('Usuario/nuevo_usuario',$form);?>
	<?php echo form_label('Centro: ','ID_Centro'); ?>
	<?php
	//DESPLEGABLE DE CENTRO
	echo form_dropdown('ID_Centro', $ID_Centro,1);
	?>
	<br>

	<?php echo form_label('Tipo de usuario: ','ID_TUsuario'); ?>
	<?php
	//DESPLEGABLE DE TUSUARIOS
	echo form_dropdown('ID_TUsuario', $ID_TUsuario,1);
	?>
	<br>

	<?php echo form_label('Usuario: ','User'); ?>
	<?php echo form_input($User); ?>
	<br>
	<?php echo form_label('Password: ','Password'); ?>
	<?php echo form_input($Password); ?>
	<br>
	<?php echo form_label('Nombre de Usuario: ','Nombre'); ?>
	<?php echo form_input($Nombre); ?>
	<br>
	<?php echo form_label('Apellidos de Usuario: ','Apellidos'); ?>
	<?php echo form_input($Apellidos); ?>
	<br>
	<?php echo form_label('Email de Usuario: ','Email de Usuario'); ?>
	<?php echo form_input($Email); ?>
	<br>
	<?php echo form_label('Dni: ','Dni'); ?>
	<?php echo form_input($Dni); ?>
	<br>	
	<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close();?>
</div>