<div>
<?php
		printf('Gestión de EQUIPOS<br>');
		printf('--------------------------------------------------------------------<br>');
		
		//filtrar_equipo DE RETO

		if ($retos){
			$ID_Reto = array(
	    		0         => 'Todos los Retos'
			);
			foreach ($retos->result() as $reto) {
				$ID_Reto[$reto->ID_Reto] = $reto->ID_Reto;
			}	
		}
		else{
			$ID_Reto = array(
	    		0         => 'Todos los Retos'
			);
		}	

		?>


		<div>
			<?php echo form_open('Equipo/filtrar_equipo');?>
			<?php echo form_label('Reto: ','ID_Reto'); ?>
			<?php
			//DESPLEGABLE DE RETOS
			echo form_dropdown('ID_Reto', $ID_Reto);
			?>
			<?php echo form_submit('Filtrar','Filtrar'); ?>
			<?php echo form_close();?>
		</div>

		<?php
		printf('--------------------------------------------------------------------<br>');	


		//TABLA DE RESULTADOS DEL LISTADO	
		if ($equipos){
			printf('<table>
				<thead>			
				<tr>
					<td>
						<label for="select_all"></label>
						<input id="select_all" type="checkbox">
					</td>
				');
			$primerequipo = $equipos->result()[0];
			foreach ($primerequipo as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
			foreach ($equipos->result() as $equipo) {
				printf('<tr>
					<th>
					<label for="select_%d"></label>
					<input id="select_%d" type="checkbox">
					</th>',$equipo->ID_Equipo,$equipo->ID_Equipo);
				
				foreach ($equipo as $detalle) {
					
					if($filtrado==0){
						printf('<td>
						<a href="Equipo/editar/%s">%s</a>
						</td>',$equipo->ID_Equipo,$detalle);
					}
					else{
						printf('<td>
						<a href="editar/%s">%s</a>
						</td>',$equipo->ID_Equipo,$detalle);
					}	
				}

				if($filtrado==0){
					$url = "'equipo/borrar/".$equipo->ID_Equipo."'"; 
				}
				else{
					$url = "'borrar/".$equipo->ID_Equipo."'"; 
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