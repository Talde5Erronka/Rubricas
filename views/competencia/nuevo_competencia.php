<?php
$form = array(
	'name' => 'form_competencia'
	);
$DESC_Competencia = array(	
	'name' => 'DESC_Competencia',
	'value' => $competencias->result()[0]->DESC_Competencia,
	'placeholder' => 'Descripción de Competencia',
	'maxlength' => 50,
	'size' => 30
	);

$Mal = array(	
	'name' => 'Mal',
	'value' => $competencias->result()[0]->Mal,
	'placeholder' => 'Mal',
	'maxlength' => 250,
	'size' => 83
	);

$Regular = array(	
	'name' => 'Regular',
	'value' => $competencias->result()[0]->Regular,
	'placeholder' => 'Regular',
	'maxlength' => 250,
	'size' => 83
	);

$Bien = array(	
	'name' => 'Bien',
	'value' => $competencias->result()[0]->Bien,
	'placeholder' => 'Bien',
	'maxlength' => 250,
	'size' => 71
	);

$Excelente = array(	
	'name' => 'Excelente',
	'value' => $competencias->result()[0]->Excelente,
	'placeholder' => 'Excelente',
	'maxlength' => 250,
	'size' => 80
	);
?>

<div>
	<?php echo form_open('Competencia/nuevo_competencia',$form);?>
	<?php echo form_label('Descripción de Competencia: ','DESC_Competencia'); ?>
	<?php echo form_input($DESC_Competencia); ?>
	<br>

	<?php echo form_label('Mal: ','Mal'); ?>
	<?php echo form_input($Mal); ?>
	<br>

	<?php echo form_label('Regular: ','Regular'); ?>
	<?php echo form_input($Regular); ?>
	<br>

	<?php echo form_label('Bien: ','Bien'); ?>
	<?php echo form_input($Bien); ?>
	<br>

	<?php echo form_label('Excelente: ','Excelente'); ?>
	<?php echo form_input($Excelente); ?>
	<br>
	
	<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close();?>
</div>

