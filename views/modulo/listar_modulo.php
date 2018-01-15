<div>
<?php
		printf('Gestión de MODULOS<br>');
		printf('--------------------------------------------------------------------<br>');
		
		//FILTROS DE CURSO Y GRUPO
		if ($ciclos){
			$ID_Ciclo = array(
	    		0         => 'Todos los Ciclos'
			);
			foreach ($ciclos->result() as $ciclo) {
				$ID_Ciclo[$ciclo->ID_Ciclo] = $ciclo->DESC_Ciclo;
			}	
		}
		else{
			$ID_Ciclo = array(
	    		0         => 'Todos los Ciclos'
			);
		}

		?>

				<div>
			<?php echo form_open('Modulo/filtrar_modulo');?>
			<?php echo form_label('Modulo: ','ID_Modulo'); ?>
			<?php
			//DESPLEGABLE DE CENTRO
			echo form_dropdown('ID_Ciclo', $ID_Ciclo);
			?>
			
			<?php echo form_submit('Filtrar','Filtrar'); ?>
			<?php echo form_close();?>
		</div>

<?php
		printf('--------------------------------------------------------------------<br>');	


		//TABLA DE RESULTADOS DEL LISTADO	
		if ($modulos){
			printf('<table>
				<thead>			
				<tr>
					<td>
						<label for="select_all"></label>
						<input id="select_all" type="checkbox">
					</td>
				');
			$primermodulo = $modulos->result()[0];
			foreach ($primermodulo as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
			foreach ($modulos->result() as $modulo) {
				printf('<tr>
					<th>
					<label for="select_%d"></label>
					<input id="select_%d" type="checkbox">
					</th>',$modulo->ID_Modulo,$modulo->ID_Modulo);
				//Paso el objeto stdClass a Array para modificar COD_Centro y COD_Curso
				//$cicloArray = get_object_vars($ciclo);
				//var_dump($ciclo['ID_curso']);
				foreach ($modulo as $detalle) {
					//Para curso y Centro hay que sacar su COD_CENTRO y COD_CURSO
					if($filtrado==0){
						printf('<td>
						<a href="Modulo/editar/%s">%s</a>
						</td>',$modulo->ID_Modulo,$detalle);
					}
					else{
						printf('<td>
						<a href="editar/%s">%s</a>
						</td>',$modulo->ID_Modulo,$detalle);
					}
				}

				if($filtrado==0){
					$url = "'modulo/borrar/".$modulo->ID_Modulo."'";
				}
				else{
					$url = "'borrar/".$modulo->ID_Modulo."'";
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


