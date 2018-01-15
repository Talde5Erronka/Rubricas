<?php
$form = array(
	'name' => 'form_grupocompetencia'
	);
$DESC_Grupo_GrupoCompetencia = array(	
	'name' => 'DESC_Grupo_GrupoCompetencia',
	'value' => $grupocompetencias->result()[0]->DESC_Grupo_GrupoCompetencia,
	'placeholder' => 'Descripción de GrupoCompetencia',
	'maxlength' => 50,
	'size' => 30
	);
?>

<div>
	<?php echo form_open('GrupoCompetencia/nuevo_grupocompetencia',$form);?>
	<?php echo form_label('Descripción de GrupoCompetencia: ','DESC_Grupo_GrupoCompetencia'); ?>
	<?php echo form_input($DESC_Grupo_GrupoCompetencia); ?>
	<br>

	<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close();?>
</div>

