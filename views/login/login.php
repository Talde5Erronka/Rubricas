<?php
$form = array(
	'name' => 'form_login'
	);
$usuario = array(	
	'name' => 'usuario',
	'placeholder' => 'Escriba su usuario',
	'maxlength' => 20,
	'size' => 20,
	'required' => 1
	);
$contraseña = array(	
	'name' => 'contraseña',
	'type' => 'password',
	'placeholder' => 'Contraseña',
	'maxlength' => 20,
	'size' => 20,
	'required' => 1
	);


?>
<div>
	<?php echo form_open('Login/verificar_login',$form);?>
	

	<?php echo form_label('Usuario: ','usuario'); ?>
	<?php echo form_input($usuario); ?>
	<br>
	<?php echo form_label('Password: ','contraseña'); ?>
	<?php echo form_input($contraseña); ?>
	<br>	
	<?php echo form_submit('Entrar','Entrar'); ?>
	<?php echo form_close();?>
</div>