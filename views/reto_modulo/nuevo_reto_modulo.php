<?php
$form = array(
	'name' => 'form_reto_modulo'
	);
$ID_UAdmin = array(	
	'name' => 'ID_UAdmin',
	'placeholder' => 'ID_UAdmin',
	'maxlength' => 2,
	'size' => 20,
	'required' => 1
	);
$IN_Extendido = array(	
	'name' => 'IN_Extendido',
	'placeholder' => 'IN Extendido',
	'maxlength' => 2,
	'size' => 20,
	'required' => 1
	);
$IN_EAbierta = array(	
	'name' => 'IN_EAbierta',
	'placeholder' => 'IN EAbierta',
	'maxlength' => 2,
	'size' => 20,
	'required' => 1
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

	if ($retos){
		$ID_Reto = array();
		foreach ($retos->result() as $reto) {
			$ID_Reto[$reto->ID_Reto] = $reto->DESC_Reto;
		}	
	}
	else{
		$ID_Reto = array(
    		0         => 'No hay Retos'
		);
	}

	/*
	if ($usuarios){
		$ID_Usuario = array();
		foreach ($usuarios->result() as $usuario) {
			$ID_Usuario[$usuario->ID_Usuario] = $usuario->Nombre;
		}	
	}
	else{
		$ID_Usuario = array(
    		0         => 'No hay UAdmins'
		);
	}
	*/	

?>

<div>
	<?php echo form_open('Reto_modulo/nuevo_reto_modulo',$form);?>
	<?php echo form_label('Modulo: ','ID_Modulo'); ?>
	<?php
//DESPLEGABLE DE MODULO
	echo form_dropdown('ID_Modulo', $ID_Modulo, 1);
	?>
	<br>

	<?php echo form_label('Reto: ','ID_Reto'); ?>
	<?php
	//DESPLEGABLE DE RETOS
	echo form_dropdown('ID_Reto', $ID_Reto, 1);
	?>
	<br>
	
	<!--
	<?php echo form_label('UAdmin: ','ID_UAdmin'); ?>
	<?php
	//DESPLEGABLE DE UDADMIN
	echo form_dropdown('ID_UAdmin', $ID_Usuario, 1);
	?>
	<br>
	-->
	
	<?php echo form_label('UAdmin: ','ID_UAdmin'); ?>
	<?php echo form_input($ID_UAdmin); ?>
	<br>

	<?php echo form_label('IN Extendido: ','IN_Extendido'); ?>
	<?php echo form_input($IN_Extendido); ?>
	<br>
	
	<?php echo form_label('IN EAbierta: ','IN_EAbierta'); ?>
	<?php echo form_input($IN_EAbierta); ?>
	<br>	
	<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close();?>
</div>