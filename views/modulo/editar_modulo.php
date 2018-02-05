<?php
	$form = array(
		'name' => 'form_modulo'
	);
	
	$url = "'".base_url()."index.php/Modulo'";
	$js_cancel_button = 'onClick="location.href='.$url.'"';
	
	$COD_Modulo = array(
		'name' => 'COD_Modulo',
		'placeholder' => 'Código de Modulo',
		'maxlength' => 10,
		'size' => 20,
		'required' => 1,
		'value' => $modulos->result()[0]->COD_Modulo
	);
	
	$DESC_Modulo = array(	
		'name' => 'DESC_Modulo',
		'placeholder' => 'Descripción de Modulo',
		'maxlength' => 100,
		'size' => 30,
		'required' => 1,
		'value' => $modulos->result()[0]->DESC_Modulo	
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
?>

<div>
	<?php echo form_open('Modulo/actualizar/'.$modulos->result()[0]->ID_Modulo); ?>
	
		<?php echo form_label('Ciclo: ','ID_Ciclo'); ?>
		<?php
			//DESPLEGABLE DE CICLO
			echo form_dropdown('ID_Ciclo', $ID_Ciclo, $ciclos->result()[0]->ID_Ciclo);
		?>
		
		<br>

		<?php echo form_label('Código de Modulo: ','COD_Modulo'); ?>
		<?php echo form_input($COD_Modulo); ?>
		
		<br>
		
		<?php echo form_label('Descripción de Modulo: ','DESC_Modulo'); ?>
		<?php echo form_input($DESC_Modulo); ?>
		
		<br>	
		
		<?php echo form_submit('Actualizar','Actualizar'); ?>
		<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>	
	<?php echo form_close(); ?>
</div>