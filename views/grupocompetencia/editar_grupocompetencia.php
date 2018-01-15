<?php
$form = array(
	'name' => 'form_grupocompetencia'
	);
$url = "'".base_url()."index.php/GrupoCompetencia'";
$js_cancel_button = 'onClick="location.href='.$url.'"';
$DESC_Grupo_Competencia = array(	
	'name' => 'DESC_Grupo_Competencia',
	'value' => $grupocompetencias->result()[0]->DESC_Grupo_Competencia,
	'placeholder' => 'Descripción de GrupoCompetencia',
	'maxlength' => 50,
	'size' => 30
	);
?>

<div>
	<?php echo form_open('GrupoCompetencia/actualizar/'.$grupocompetencias->result()[0]->ID_GrupoCompetencia,$form);?>
	<?php echo form_label('Descripción de GrupoCompetencia: ','DESC_Grupo_Competencia'); ?>
	<?php echo form_input($DESC_Grupo_Competencia); ?>
	<br>

	<?php echo form_submit('Guardar','Guardar'); ?>
	<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>
	<?php echo form_close();?>
</div>

