<?php
$form = array(
	'name' => 'form_tusuario'
	);
$DESC_TUsuario = array(
	'name' => 'DESC_TUsuario',
	'placeholder' => 'Descripción del usuario',
	'maxlength' => 20,
	'size' => 20
	);
?>

<div>
	<?php echo form_open('Tusuario/nuevo_tusuario',$form);?>
	<?php echo form_label('Descripción: ','DESC_TUsuario'); ?>
	<?php echo form_input($DESC_TUsuario); ?>
	<br>
	<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close();?>
</div>

