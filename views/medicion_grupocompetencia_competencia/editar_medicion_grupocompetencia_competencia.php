<?php
$form = array(
	'name' => 'form_medicion_grupocompetencia_competencia'
	);
$url = "'".base_url()."index.php/Medicion_GrupoCompetencia_Competencia'";
$js_cancel_button = 'onClick="location.href='.$url.'"';
$Porcentaje = array(	
	'name' => 'Porcentaje',
	'placeholder' => 'Porcentaje',
	'maxlength' => 100,
	'size' => 30,
	'required' => 1,
	'value' => $medicion_grupocompetencia_competencia->result()[0]->Porcentaje
	);


	if ($mediciones){
		$ID_Medicion = array();
		foreach ($mediciones->result() as $medicion) {
			$ID_Medicion[$medicion->ID_Medicion] = $medicion->DESC_Medicion;
		}	
	}
	else{
		$ID_Medicion = array(
    		0         => 'No hay Medicions'
		);
	}

	if ($grupocompetencias){
		$ID_Grupo_Competencia = array();
		foreach ($grupocompetencias->result() as $grupocompetencia) {
			$ID_Grupo_Competencia[$grupocompetencia->ID_Grupo_Competencia] = $grupocompetencia->DESC_GrupoCompetencia;
		}	
	}
	else{
		$ID_Grupo_Competencia = array(
    		0         => 'No hay GrupoCompetencias'
		);
	}

	if ($competencias){
		$ID_Competencia = array();
		foreach ($competencias->result() as $competencia) {
			$ID_Competencia[$competencia->ID_Competencia] = $competencia->DESC_Competencia;
		}	
	}
	else{
		$ID_Competencia = array(
    		0         => 'No hay Competencias'
		);
	}	

?>

<div>
	<?php echo form_open('Medicion_GrupoCompetencia_Competencia/actualizar/'.$medicion_grupocompetencia_competencia->result()[0]->ID_Medicion_GrupoCompetencia_Competencia);?>
	<?php echo form_label('Medicion: ','ID_Medicion'); ?>
	<?php
	//DESPLEGABLE DE MEDICION
	echo form_dropdown('ID_Medicion', $ID_Medicion, $medicion_grupocompetencia_competencia->result()[0]->ID_Medicion);
	?>
	<br>

	<?php echo form_label('GrupoCompetencia: ','ID_Grupo_Competencia'); ?>
	<?php
	//DESPLEGABLE DE GRUPOCOMPETENECIAS
	echo form_dropdown('ID_Grupo_Competencia', $ID_Grupo_Competencia, $medicion_grupocompetencia_competencia->result()[0]->ID_Grupo_Competencia);
	?>
	<br>

	<?php echo form_label('Competencia: ','ID_Competencia'); ?>
	<?php
	//DESPLEGABLE DE COMPETENECIAS
	echo form_dropdown('ID_Competencia', $ID_Competencia, $medicion_grupocompetencia_competencia->result()[0]->ID_Competencia);
	?>
	<br>

	<?php echo form_label('Porcentaje: ','Porcentaje'); ?>
	<?php echo form_input($Porcentaje); ?>
	<br>

	<?php echo form_submit('Actualizar','Actualizar'); ?>
	<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>	
	<?php echo form_close();?>
</div>