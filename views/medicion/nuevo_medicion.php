<?php
$form = array(
	'name' => 'form_medicion'
	);
$COD_Medicion = array(
	'name' => 'COD_Medicion',
	'placeholder' => 'Código de Medicion',
	'maxlength' => 10,
	'size' => 20,
	'required' => 1
	);
$DESC_Medicion = array(	
	'name' => 'DESC_Medicion',
	'placeholder' => 'Descripción de Medicion',
	'maxlength' => 100,
	'size' => 30,
	'required' => 1
	);


	if ($tusuarios){
		$ID_TUsuario = array();
		foreach ($tusuarios->result() as $tusuario) {
			$ID_TUsuario[$tusuario->ID_TUsuario] = $tusuario->DESC_TUsuario ;
		}	
	}
	else{
		$ID_TUsuario_ = array(
    		0         => 'No hay TUsuarios'
		);
	}

?>

<div>
	<?php echo form_open('Medicion/nuevo_medicion',$form);?>
	<?php echo form_label('TUsuario: ','ID_TUsuario'); ?>
	<?php
	//DESPLEGABLE DE TUSUARIO
	echo form_dropdown('ID_TUsuario', $ID_TUsuario,1); ?>
	<br>

	<?php echo form_label('Código de Medicion: ','COD_Medicion'); ?>
	<?php echo form_input($COD_Medicion); ?>
	<br>
	<?php echo form_label('Descripción de Medicion: ','DESC_Medicion'); ?>
	<?php echo form_input($DESC_Medicion); ?>
	<br>	
	<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close();?>
</div>