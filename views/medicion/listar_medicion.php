<div>
<?php
		printf('Gestión de MEDICION<br>');
		printf('--------------------------------------------------------------------<br>');
		
		//filtrar_medicion DE TUSUARIO

		if ($tusuarios){
			$ID_TUsuario = array(
	    		0         => 'Todos los Tusuarios'
			);
			foreach ($tusuarios->result() as $tusuario) {
				$ID_TUsuario[$tusuario->ID_TUsuario] = $tusuario->DESC_TUsuario;
			}	
		}
		else{
			$ID_TUsuario = array(
	    		0         => 'Todos los Tusuarios'
			);
		}	

		?>


		<div>
			<?php echo form_open('Medicion/filtrar_medicion');?>
			<?php echo form_label('Tusuario: ','ID_TUsuario'); ?>
			<?php
			//DESPLEGABLE DE TUSUARIO
			echo form_dropdown('ID_TUsuario', $ID_TUsuario);
			?>
			<?php echo form_submit('Filtrar','Filtrar'); ?>
			<?php echo form_close();?>
		</div>

		<?php
		printf('--------------------------------------------------------------------<br>');	


		//TABLA DE RESULTADOS DEL LISTADO	
		if ($mediciones){
			printf('<table>
				<thead>			
				<tr>
					<td>
						<label for="select_all"></label>
						<input id="select_all" type="checkbox">
					</td>
				');
			$primermedicion = $mediciones->result()[0];
			foreach ($primermedicion as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf(/*'<th>Acciones</th>*/'</tr>
			</thead>
			<tbody>');
			foreach ($mediciones->result() as $medicion) {
				printf('<tr>
					<th>
					<label for="select_%d"></label>
					<input id="select_%d" type="checkbox">
					</th>',$medicion->ID_Medicion,$medicion->ID_Medicion);
				
				foreach ($medicion as $detalle) {
					
					if($filtrado==0){
						printf('<td>
						<a href="Medicion/editar/%s">%s</a>
						</td>',$medicion->ID_Medicion,$detalle);
					}
					else{
						printf('<td>
						<a href="editar/%s">%s</a>
						</td>',$medicion->ID_Medicion,$detalle);
					}	
				}

				/*if($filtrado==0){
					$url = "'medicion/borrar/".$medicion->ID_Medicion."'"; 
				}
				else{
					$url = "'borrar/".$medicion->ID_Medicion."'"; 
				}
				

				printf('<td><input type="button" onclick="location.href=%s" value="Borrar"></td>',$url);
				*/
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