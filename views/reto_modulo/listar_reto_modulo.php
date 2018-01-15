<div>
<?php
		printf('Gestión de RETOS DE LOS MODULOS<br>');
		printf('--------------------------------------------------------------------<br>');
		
		//FILTROS DE RETO Y MODULO
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

		if ($retos){
			$ID_Reto = array(
	    		0         => 'Todos los Retos'
			);
			foreach ($retos->result() as $reto) {
				$ID_Reto[$reto->ID_Reto] = $reto->DESC_Reto;
			}	
		}
		else{
			$ID_Reto = array(
	    		0         => 'Todos los Retos'
			);
		}	

		?>


		<div>
			<?php echo form_open('Reto_modulo/filtrar_reto_modulo');?>
			<?php echo form_label('Modulo: ','ID_Modulo'); ?>
			<?php
			//DESPLEGABLE DE CENTRO
			echo form_dropdown('ID_Modulo', $ID_Modulo);
			?>
			<?php echo form_label('Reto: ','ID_Reto'); ?>
			<?php
			//DESPLEGABLE DE CURSOS
			echo form_dropdown('ID_Reto', $ID_Reto);
			?>
			<?php echo form_submit('Filtrar','Filtrar'); ?>
			<?php echo form_close();?>
		</div>

		<?php
		printf('--------------------------------------------------------------------<br>');	


		//TABLA DE RESULTADOS DEL LISTADO	
		if ($retos_modulos){
			printf('<table>
				<thead>			
				<tr>
					<td>
						<label for="select_all"></label>
						<input id="select_all" type="checkbox">
					</td>
				');
			$primerreto_modulo = $retos_modulos->result()[0];
			foreach ($primerreto_modulo as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');






			
			foreach ($retos_modulos->result() as $reto_modulo) {
				printf('<tr>
					<th>
					<label for="select_%d"></label>
					<input id="select_%d" type="checkbox">
					</th>',$reto_modulo->ID_Reto_Modulo,$reto_modulo->ID_Reto_Modulo);
				//Paso el objeto stdClass a Array para modificar COD_Centro y COD_Curso
				//$reto_moduloArray = get_object_vars($reto_modulo);
				//var_dump($reto_modulo['ID_reto']);
				foreach ($reto_modulo as $detalle) {
					//Para reto y Centro hay que sacar su COD_CENTRO y COD_CURSO
					if($filtrado==0){	
						printf('<td>
						<a href="Reto_modulo/editar/%s">%s</a>
						</td>',$reto_modulo->ID_Reto_Modulo,$detalle);
					}
					else{
						printf('<td>
						<a href="editar/%s">%s</a>
						</td>',$reto_modulo->ID_Reto_Modulo,$detalle);
					}
				}
				
				if($filtrado==0){
					$url = "'reto_modulo/borrar/".$reto_modulo->ID_Reto_Modulo."'"; 
				}
				else{
					$url = "'borrar/".$reto_modulo->ID_Reto_Modulo."'"; 
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