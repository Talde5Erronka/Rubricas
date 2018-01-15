<div>
<?php
		printf('Gestión de USUARIOS<br>');
		printf('--------------------------------------------------------------------<br>');
		
		//FILTROS DE CURSO Y TUSUARIO
		if ($centros){
			$ID_Centro = array(
	    		0         => 'Todos los Centros'
			);
			foreach ($centros->result() as $centro) {
				$ID_Centro[$centro->ID_Centro] = $centro->DESC_Centro;
			}	
		}
		else{
			$ID_Centro = array(
	    		0         => 'Todos los Centros'
			);
		}

		if ($tusuarios){
			$ID_TUsuario = array(
	    		0         => 'Todos'
			);
			foreach ($tusuarios->result() as $tusuario) {
				$ID_TUsuario[$tusuario->ID_TUsuario] = $tusuario->DESC_TUsuario;
			}	
		}
		else{
			$ID_TUsuario = array(
	    		0         => 'Todos'
			);
		}	

		?>


		<div>
			<?php echo form_open('Usuario/filtrar_usuario');?>
			<?php echo form_label('Centro: ','ID_Centro'); ?>
			<?php
			//DESPLEGABLE DE CENTRO
			echo form_dropdown('ID_Centro', $ID_Centro);
			?>
			<?php echo form_label('Tipos de usuario: ','ID_TUsuario'); ?>
			<?php
			//DESPLEGABLE DE TUSUARIOS
			echo form_dropdown('ID_TUsuario', $ID_TUsuario);
			?>
			<?php echo form_submit('Filtrar','Filtrar'); ?>
			<?php echo form_close();?>
		</div>

		<?php
		printf('--------------------------------------------------------------------<br>');	


		//TABLA DE RESULTADOS DEL LISTADO	
		if ($usuarios){
			printf('<table>
				<thead>			
				<tr>
					<td>
						<label for="select_all"></label>
						<input id="select_all" type="checkbox">
					</td>
				');
			$primerusuario = $usuarios->result()[0];
			foreach ($primerusuario as $key => $value){
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
			foreach ($usuarios->result() as $usuario){
				printf('<tr>
					<th>
					<label for="select_%d"></label>
					<input id="select_%d" type="checkbox">
					</th>',$usuario->ID_Usuario,$usuario->ID_Usuario);
				//Paso el objeto stdClass a Array para modificar COD_Centro y DESC_TUsuario
				//$usuarioArray = get_object_vars($usuario);
				//var_dump($usuario['ID_curso']);
				foreach ($usuario as $detalle) {
					//Para TUsuario y Centro hay que sacar su COD_CENTRO y DESC_TUsuario
					if($filtrado==0){
						printf('<td>
						<a href="Usuario/editar/%s">%s</a>
						</td>',$usuario->ID_Usuario,$detalle);
					}
					else{
						printf('<td>
						<a href="editar/%s">%s</a>
						</td>',$usuario->ID_Usuario,$detalle);
					}
				}
				
				if($filtrado==0){
					$url = "'usuario/borrar/".$usuario->ID_Usuario."'"; 
				}
				else{
					$url = "'borrar/".$usuario->ID_Usuario."'"; 
				}
				
				printf('<td><input type="button" onclick="location.href=%s" value="Borrar"></td>',$url);
				printf('</tr>');
			}	
			printf('</tbody></table>');
		}
		else{
				printf('<br> No hay Registros');
		}

		printf('--------------------------------------------------------------------<br>');	
		?>		
</div>