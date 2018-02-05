<?php
	$form = array(
		'name' => 'form_reto_modulo'
	);

	$url = "'".base_url()."index.php/Reto_modulo'";
	$js_cancel_button = 'onClick="location.href='.$url.'"';
	
	$ID_UAdmin = array(	
		'name' => 'ID_UAdmin',
		'placeholder' => 'Descripción de ID_UAdmin',
		'maxlength' => 100,
		'size' => 30,
		'required' => 1,
		'value' => $retos_modulos->result()[0]->ID_UAdmin
	);

	$IN_Extendido = array(	
		'name' => 'IN_Extendido',
		'placeholder' => 'Descripción de IN_Extendido',
		'maxlength' => 100,
		'size' => 30,
		'required' => 1,
		'value' => $retos_modulos->result()[0]->IN_Extendido
	);

	$IN_EAbierta = array(	
		'name' => 'IN_EAbierta',
		'placeholder' => 'Descripción de IN_EAbierta',
		'maxlength' => 100,
		'size' => 30,
		'required' => 1,
		'value' => $retos_modulos->result()[0]->IN_EAbierta
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
?>

<div>
	<?php echo form_open('Reto_modulo/actualizar/'.$retos_modulos->result()[0]->ID_Reto_Modulo); ?>
	
		<?php echo form_label('Modulo: ','ID_Modulo'); ?>
		<?php
			//DESPLEGABLE DE MODULO
			echo form_dropdown('ID_Modulo', $ID_Modulo, $retos_modulos->result()[0]->ID_Modulo);
		?>
		
		<br>

		<?php echo form_label('Reto: ','ID_Reto'); ?>
		<?php
			//DESPLEGABLE DE RETOS
			echo form_dropdown('ID_Reto', $ID_Reto, $retos_modulos->result()[0]->ID_Reto);
		?>
		
		<br>
		
		<?php echo form_label('ID_UAdmin: ','ID_UAdmin'); ?>
		<?php echo form_input($ID_UAdmin); ?>
		
		<br>

		<?php echo form_label('IN Extendido: ','IN_Extendido'); ?>
		<?php echo form_input($IN_Extendido); ?>
		
		<br>
		
		<?php echo form_label('IN EAbierta: ','IN_EAbierta'); ?>
		<?php echo form_input($IN_EAbierta); ?>
		
		<br>

		<?php echo form_submit('Actualizar','Actualizar'); ?>
		<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>	
	<?php echo form_close(); ?>
</div>