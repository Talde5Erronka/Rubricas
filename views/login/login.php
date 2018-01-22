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

$existe=false;
	
	//Si se han recibido el nombre y la contraseña metidos en el login
	if($usuario_login && $contraseña_login){
		
		foreach ($usuarios->result() as $usuario2){

			//Si el usuario y la contraseña coincide con los de alguna fila de la tabla en la base de datos
			if($usuario2->User == $usuario_login && $usuario2->Password == $contraseña_login){
				$existe = true;
				break;
			}
		}

		if($existe == true){
			setcookie("PersonaLogueada", $usuario2->ID_Usuario);
			if ($usuario2->ID_TUsuario == '2') {
				redirect('Login/logueado_profesor');
			} else if ($usuario2->ID_TUsuario == '3') {
				redirect('Login/logueado_alumno');
			} else {
				redirect('Login/logueado_administrador');
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