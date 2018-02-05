<?php
	$form = array(
		'name' => 'form_equipo'
	);

	$COD_Equipo = array(
		'name' => 'COD_Equipo',
		'placeholder' => 'Código de Equipo',
		'maxlength' => 10,
		'size' => 20,
		'required' => 1
	);

	$DESC_Equipo = array(	
		'name' => 'DESC_Equipo',
		'placeholder' => 'Descripción de Equipo',
		'maxlength' => 100,
		'size' => 30,
		'required' => 1
	);

	if ($retos){
		$ID_Reto = array();
		foreach ($retos->result() as $reto) {
			$ID_Reto[$reto->ID_Reto] = $reto->ID_Reto ;
		}	
	}
	else{
		$ID_Reto_ = array(
	   		0         => 'No hay Retos'
		);
	}
?>

<div>
	<?php echo form_open('<?php echo base_url(); ?>index.php/Equipo/nuevo_equipo',$form); ?>

		<?php echo form_label('Reto: ','ID_Reto'); ?>
		<?php
			//DESPLEGABLE DE RETO
			echo form_dropdown('ID_Reto', $ID_Reto,1);
		?>

		<br>

		<?php echo form_label('Código de Equipo: ','COD_Equipo'); ?>
		<?php echo form_input($COD_Equipo); ?>

		<br>

		<?php echo form_label('Descripción de Equipo: ','DESC_Equipo'); ?>
		<?php echo form_input($DESC_Equipo); ?>

		<br>	

		<?php echo form_submit('Crear','Crear'); ?>
	<?php echo form_close(); ?>
</div>