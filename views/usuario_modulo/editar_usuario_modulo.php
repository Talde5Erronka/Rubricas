<?php
$form = array(
	'name' => 'form_ciclo'
	);
$url = "'".base_url()."index.php/Ciclo'";
$js_cancel_button = 'onClick="location.href='.$url.'"';

$ID_Usuario_Modulo = array(
	'name' => 'ID_Usuario_Modulo',
	'placeholder' => 'Código de Usuario del modulo',
	'maxlength' => 10,
	'size' => 20,
	'required' => 1,
	'value' => $usuarios_modulos->result()[0]->ID_Usuario_Modulo
	);
$ID_Usuario = array(
	'name' => 'ID_Usuario',
	'placeholder' => 'Código de Usuario',
	'maxlength' => 10,
	'size' => 20,
	'required' => 1,
	'value' => $usuarios_modulos->result()[0]->ID_Usuario
	);
$ID_Modulo = array(	
	'name' => 'ID_Modulo',
	'placeholder' => 'Código de Módulo',
	'maxlength' => 100,
	'size' => 30,
	'required' => 1,
	'value' => $usuarios_modulos->result()[0]->ID_Modulo	
	);


	if ($usuarios){
		$ID_Usuario = array();
		foreach ($usuarios->result() as $usuario) {
			$ID_Usuario[$usuario->ID_Usuario] = $usuario->Nombre;
		}	
	}
	else{
		$ID_Usuario = array(
    		0         => 'No hay Centros'
		);
	}

	if ($modulos){
		$ID_Modulo = array();
		foreach ($modulos->result() as $modulo) {
			$ID_Modulo[$modulo->ID_Modulo] = $modulo->COD_Modulo;
		}	
	}
	else{
		$ID_Modulo = array(
    		0         => 'No hay Modulos'
		);
	}	

?>

<div>
	<?php echo form_open('Usuario_modulo/actualizar/'.$usuarios_modulos->result()[0]->ID_Usuario_Modulo);?>
	
	<?php echo form_label('Usuario: ','ID_Usuario'); ?>
	<?php
	//DESPLEGABLE DE USUARIOS
	echo form_dropdown('ID_Usuario', $ID_Usuario, $usuarios_modulos->result()[0]->ID_Usuario);
	?>
	<br>

	<?php echo form_label('Modulo: ','ID_Modulo'); ?>
	<?php
	//DESPLEGABLE DE MODULOS
	echo form_dropdown('ID_Modulo', $ID_Modulo, $usuarios_modulos->result()[0]->ID_Modulo);
	?>

	<br>	
	<?php echo form_submit('Actualizar','Actualizar'); ?>
	<?php echo form_button('Cancelar','Cancelar',$js_cancel_button); ?>	
	<?php echo form_close();?>
</div>