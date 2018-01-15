<div>
<?php
		printf('Gestión de MEDICION DE GRUPOCOMPETENCIA DE COMPETENCIA<br>');
		printf('--------------------------------------------------------------------<br>');
		
		//FILTROS DE GRUPOCOMPETENCIA, COMPETENCIA Y MEDICIONES
		if ($mediciones){
			$ID_Medicion = array(
	    		0         => 'Todas las Mediciones'
			);
			foreach ($mediciones->result() as $medicion) {
				$ID_Medicion[$medicion->ID_Medicion] = $medicion->DESC_Medicion;
			}	
		}
		else{
			$ID_Medicion = array(
	    		0         => 'Todas las Mediciones'
			);
		}

		if ($grupocompetencias){
			$ID_Grupo_Competencia = array(
	    		0         => 'Todas las GrupoCompetencias'
			);
			foreach ($grupocompetencias->result() as $grupocompetencia) {
				$ID_Grupo_Competencia[$grupocompetencia->ID_Grupo_Competencia] = $grupocompetencia->DESC_Grupo_Competencia;
			}	
		}
		else{
			$ID_Grupo_Competencia = array(
	    		0         => 'Todas las GrupoCompetencias'
			);
		}

		if ($competencias){
			$ID_Competencia = array(
	    		0         => 'Todas las Competencias'
			);
			foreach ($competencias->result() as $competencia) {
				$ID_Competencia[$competencia->ID_Competencia] = $competencia->DESC_Competencia;
			}	
		}
		else{
			$ID_Competencia = array(
	    		0         => 'Todas las Competencias'
			);
		}	

		?>


		<div>
			<?php echo form_open('Medicion_GrupoCompetencia_Competencia/filtrar_medicion_grupocompetencia_competencia');?>
			<?php echo form_label('Medicion: ','ID_Medicion'); ?>
			<?php
			//DESPLEGABLE DE MEDICIONES
			echo form_dropdown('ID_Medicion', $ID_Medicion);
			?>
			<?php echo form_label('GrupoCompetencia: ','ID_Grupo_Competencia'); ?>
			<?php
			//DESPLEGABLE DE GRUPOCOMPETENCIAS
			echo form_dropdown('ID_Grupo_Competencia', $ID_Grupo_Competencia);
			?>
			<?php echo form_label('Competencia: ','ID_Competencia'); ?>
			<?php
			//DESPLEGABLE DE COMPETENCIAS
			echo form_dropdown('ID_Competencia', $ID_Competencia);
			?>
			<?php echo form_submit('Filtrar','Filtrar'); ?>
			<?php echo form_close();?>
		</div>

		<?php
		printf('--------------------------------------------------------------------<br>');	


		//TABLA DE RESULTADOS DEL LISTADO	
		if ($mediciones_grupocompetencias_competencias){
			printf('<table>
				<thead>			
				<tr>
					<td>
						<label for="select_all"></label>
						<input id="select_all" type="checkbox">
					</td>
				');
			$primermedicion_grupocompetencia_competencia = $mediciones_grupocompetencias_competencias->result()[0];
			foreach ($primermedicion_grupocompetencia_competencia as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf(/*'<th>Acciones</th>*/'</tr>
			</thead>
			<tbody>');

			
			foreach ($mediciones_grupocompetencias_competencias->result() as $medicion_grupocompetencia_competencia) {
				printf('<tr>
					<th>
					<label for="select_%d"></label>
					<input id="select_%d" type="checkbox">
					</th>',$medicion_grupocompetencia_competencia->ID_GrupoCompetencia_Competencia,$medicion_grupocompetencia_competencia->ID_GrupoCompetencia_Competencia);
				//Paso el objeto stdClass a Array para modificar COD_Centro y COD_Curso
				//$medicion_grupocompetencia_competenciaArray = get_object_vars($medicion_grupocompetencia_competencia);
				//var_dump($medicion_grupocompetencia_competencia['ID_competencia']);
				foreach ($medicion_grupocompetencia_competencia as $detalle) {
					//Para competencia y Centro hay que sacar su COD_CENTRO y COD_CURSO
					if($filtrado==0){	
						printf('<td>
						<a href="Medicion_GrupoCompetencia_Competencia/editar/%s">%s</a>
						</td>',$medicion_grupocompetencia_competencia->ID_GrupoCompetencia_Competencia,$detalle);
					}
					else{
						printf('<td>
						<a href="editar/%s">%s</a>
						</td>',$medicion_grupocompetencia_competencia->ID_GrupoCompetencia_Competencia,$detalle);
					}
				}
				/*
				if($filtrado==0){
					$url = "'medicion_grupocompetencia_competencia/borrar/".$medicion_grupocompetencia_competencia->ID_GrupoCompetencia_Competencia."'"; 
				}
				else{
					$url = "'borrar/".$medicion_grupocompetencia_competencia->ID_GrupoCompetencia_Competencia."'"; 
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

		//printf('--------------------------------------------------------------------<br>');	
		?>		
</div>