<?php
$form = array(
	'name' => 'form_tnevaluador'
	);
$url = "'".base_url()."index.php/Tnevaluador'";
$js_cancel_button = 'onClick="location.href='.$url.'"';
$DESC_TNEvaluador = array(
	'name' => 'DESC_TNEvaluador',
	'value' => $tnevaluadores->result()[0]->DESC_TNEvaluador,
	'placeholder' => 'Descripción del evaluador',
	'maxlength' => 20,
	'size' => 20
	);
?>

<div>
	<?php echo form_open('Tnevaluador/actualizar/'.$tnevaluadores->result()[0]->ID_TNEvaluador,$form);?>
	<?php echo form_label('Descripción: ','DESC_TNEvaluador'); ?>
	<?php echo form_input($DESC_TNEvaluador); ?>
	<br>
	<?php echo form_submit('Guardar','Guardar'); ?>
	<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>
	<?php echo form_close();?>
</div>
