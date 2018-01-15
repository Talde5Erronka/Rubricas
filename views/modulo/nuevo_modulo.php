<?php
$form = array(
	'name' => 'form_modulo'
	);
$COD_Modulo = array(
	'name' => 'COD_Modulo',
	'placeholder' => 'Código de Módulo',
	'maxlength' => 10,
	'size' => 20,
	'required' => 1
	);
$DESC_Modulo = array(	
	'name' => 'DESC_Modulo',
	'placeholder' => 'Descripción de Módulo',
	'maxlength' => 100,
	'size' => 30,
	'required' => 1
	);

	
if ($ciclos){
		$ID_Ciclo = array();
		foreach ($ciclos->result() as $ciclo) {
			$ID_Ciclo[$ciclo->ID_Ciclo] = $ciclo->DESC_Ciclo;
		}	
	}
	else{
		$ID_Ciclo = array(
    		0         => 'No hay Ciclos'
		);
	}

	if ($modulos){
		$ID_Curso = array();
		foreach ($modulos->result() as $modulo) {
			$ID_Modulo[$modulo->ID_Modulo] = $modulo->COD_Modulo;
		}	
	}
	else{
		$ID_Modulo = array(
    		0         => 'No hay Modulos'
		);
	}	


?>


	<div>
	<?php echo form_open('Modulo/nuevo_modulo',$form);?>
	<?php echo form_label('Ciclo: ','ID_Ciclo'); ?>
	<?php
	//DESPLEGABLE DE CENTRO
	echo form_dropdown('ID_Ciclo', $ID_Ciclo,1);
	?>
	<br>

	
	<?php echo form_label('Código de Modulo: ','COD_Modulo'); ?>
	<?php echo form_input($COD_Modulo); ?>
	<br>
	<?php echo form_label('Descripción de Modulo: ','DESC_Modulo'); ?>
	<?php echo form_input($DESC_Modulo); ?>
	<br>	
	<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close();?>
</div>