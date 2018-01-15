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
	'placeholder' => 'Contraseña',
	'maxlength' => 20,
	'size' => 20,
	'required' => 1
	);

	//Si se han recibido el nombre y la contraseña metidos en el login
	if($usuario_login && $contraseña_login){
		
		foreach ($usuarios->result() as $usuario2){

			//Si el usuario y la contraseña coincide con los de alguna fila de la tabla en la base de datos
			if($usuario2->User == $usuario_login && $usuario2->Password == $contraseña_login){
				redirect('Login/logeatuta');
			}
			else{
				//Alert
			}
		}
	}
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