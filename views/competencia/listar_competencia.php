<div>
<?php
		printf('Gestión de COMPETENCIAS');
		if ($competencias){
			printf('<table>
				<thead>			
				<tr>
					<td>
						<label for="select_all"></label>
						<input id="select_all" type="checkbox">
					</td>
				');
			$primercompetencia = $competencias->result()[0];
			foreach ($primercompetencia as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf(/*'<th>Acciones</th>*/'</tr>
			</thead>
			<tbody>');
			foreach ($competencias->result() as $competencia) {
				printf('<tr>
					<th>
					<label for="select_%d"></label>
					<input id="select_%d" type="checkbox">
					</th>',$competencia->ID_Competencia,$competencia->ID_Competencia);
				foreach ($competencia as $detalle) {
					printf('<td>
					<a href="Competencia/editar/%s">%s</a>
					</td>',$competencia->ID_Competencia,$detalle);
				}
				/*$url = "'competencia/borrar/".$competencia->ID_Competencia."'"; 
				printf('<td><input type="button" onclick="location.href=%s" value="Borrar"></td>',$url);
				printf('</tr>');*/
			}	
			printf('</tbody></table>');
		}
		else{
				printf('No hay Registros');
		}
		?>		
</div>