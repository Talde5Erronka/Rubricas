<?php
	$form = array(
		'name' => 'form_usuario_modulo'
	);

	if ($modulos){
		$ID_Modulo = array();
		foreach ($modulos->result() as $modulo) {
			$ID_Modulo[$modulo->ID_Modulo] = $modulo->DESC_Modulo;
		}	
	}
	else{
		$ID_Modulo = array(
	   		0         => 'No hay Modulos'
		);
	}

	if ($usuarios){
		$ID_Usuario = array();
		foreach ($usuarios->result() as $usuario) {
			$ID_Usuario[$usuario->ID_Usuario] = $usuario->Nombre;
		}	
	}
	else{
		$ID_Usuario = array(
	   		0         => 'No hay Usuarios'
		);
	}	
?>

<div>
	<?php echo form_open('Usuario_modulo/nuevo_usuario_modulo',$form); ?>
	
		<?php echo form_label('Modulo: ','ID_Modulo'); ?>
		<?php
			//DESPLEGABLE DE MODULO
			echo form_dropdown('ID_Modulo', $ID_Modulo,1);
		?>
		
		<br>

		<?php echo form_label('Usuario: ','ID_Usuario'); ?>
		<?php
			//DESPLEGABLE DE USUARIO
			echo form_dropdown('ID_Usuario', $ID_Usuario,1);
		?>
		
		<br>

		<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close(); ?>
</div>