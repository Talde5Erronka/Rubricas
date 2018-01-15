<div>
<?php
		printf('Gestión de USUARIOS DEL MODULO<br>');
		printf('--------------------------------------------------------------------<br>');
		
		//FILTROS DE CURSO Y GRUPO
		if ($modulos){
			$ID_Modulo = array(
	    		0         => 'Todos los Modulos'
			);
			foreach ($modulos->result() as $modulo) {
				$ID_Modulo[$modulo->ID_Modulo] = $modulo->DESC_Modulo;
			}	
		}
		else{
			$ID_Modulo = array(
	    		0         => 'Todos los Modulos'
			);
		}

		if ($usuarios){
			$ID_Usuario = array(
	    		0         => 'Todos los Usuarios'
			);
			foreach ($usuarios->result() as $usuario) {
				$ID_Usuario[$usuario->ID_Usuario] = $usuario->Nombre;
			}	
		}
		else{
			$ID_Usuario = array(
	    		0         => 'Todos los Usuarios'
			);
		}	


		?>

		<div>
			<?php echo form_open('Usuario_modulo/filtrar_usuario_modulo');?>
			<?php echo form_label('Modulo: ','ID_Modulo'); ?>
			<?php
			//DESPLEGABLE DE CENTRO
			echo form_dropdown('ID_Modulo', $ID_Modulo);
			?>
			<?php echo form_label('Usuario: ','ID_Usuario'); ?>
			<?php
			//DESPLEGABLE DE CURSOS
			echo form_dropdown('ID_Usuario', $ID_Usuario);
			?>
			<?php echo form_submit('Filtrar','Filtrar'); ?>
			<?php echo form_close();?>
		</div>

		<?php
		printf('--------------------------------------------------------------------<br>');	


		//TABLA DE RESULTADOS DEL LISTADO	
		if ($usuarios_modulos){
			printf('<table>
				<thead>			
				<tr>
					<td>
						<label for="select_all"></label>
						<input id="select_all" type="checkbox">
					</td>
				');
			$primerusuario_modulo = $usuarios_modulos->result()[0];
			foreach ($primerusuario_modulo as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
			foreach ($usuarios_modulos->result() as $usuario_modulo) {
				printf('<tr>
					<th>
					<label for="select_%d"></label>
					<input id="select_%d" type="checkbox">
					</th>',$usuario_modulo->ID_Usuario_Modulo,$usuario_modulo->ID_Usuario_Modulo);
				//Paso el objeto stdClass a Array para modificar COD_Modulo y COD_Usuario
				//$usuario_moduloArray = get_object_vars($usuario_modulo);
				//var_dump($usuario_modulo['ID_usuario']);
				foreach ($usuario_modulo as $detalle) {
					//Para usuario y Modulo hay que sacar su COD_CENTRO y COD_CURSO
					if($filtrado==0){
						printf('<td>
						<a href="Usuario_modulo/editar/%s">%s</a>
						</td>',$usuario_modulo->ID_Usuario_Modulo,$detalle);
						}
					else{
						printf('<td>
						<a href="editar/%s">%s</a>
						</td>',$usuario_modulo->ID_Usuario_Modulo,$detalle);
					}
				}

				if($filtrado==0){	
					$url = "'usuario_modulo/borrar/".$usuario_modulo->ID_Usuario_Modulo."'";
				}
				else{
					$url = "'borrar/".$usuario_modulo->ID_Usuario_Modulo."'";
				}
				
				printf('<td><input type="button" onclick="location.href=%s" value="Borrar"></td>',$url);
				printf('</tr>');
			}	
			printf('</tbody></table>');
		}
		else{
				printf('No hay Registros');
		}

		printf('--------------------------------------------------------------------<br>');	
		?>		
</div>