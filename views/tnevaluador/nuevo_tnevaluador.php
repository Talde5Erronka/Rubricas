<?php
$form = array(
	'name' => 'form_tnevaluador'
	);
$DESC_TNEvaluador = array(
	'name' => 'DESC_TNEvaluador',
	'placeholder' => 'Descripción del evaluador',
	'maxlength' => 20,
	'size' => 20
	);
?>

<div>
	<?php echo form_open('Tnevaluador/nuevo_tnevaluador',$form);?>
	<?php echo form_label('Descripción: ','DESC_TNEvaluador'); ?>
	<?php echo form_input($DESC_TNEvaluador); ?>
	<br>
	<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close();?>
</div>

