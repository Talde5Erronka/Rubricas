<?php
$form = array(
	'name' => 'form_tevaluador'
	);
$DESC_TEvaluador = array(
	'name' => 'DESC_TEvaluador',
	'placeholder' => 'Descripción del evaluador',
	'maxlength' => 20,
	'size' => 20
	);
?>

<div>
	<?php echo form_open('Tevaluador/nuevo_tevaluador',$form);?>
	<?php echo form_label('Descripción: ','DESC_TEvaluador'); ?>
	<?php echo form_input($DESC_TEvaluador); ?>
	<br>
	<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close();?>
</div>

