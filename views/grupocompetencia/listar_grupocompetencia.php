<div>
<?php
		printf('Gestión de GRUPOCOMPETENCIAS');
		if ($grupocompetencias){
			printf('<table>
				<thead>			
				<tr>
					<td>
						<label for="select_all"></label>
						<input id="select_all" type="checkbox">
					</td>
				');
			$primergrupocompetencia = $grupocompetencias->result()[0];
			foreach ($primergrupocompetencia as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf(/*'<th>Acciones</th>*/'</tr>
			</thead>
			<tbody>');
			foreach ($grupocompetencias->result() as $grupocompetencia) {
				printf('<tr>
					<th>
					<label for="select_%d"></label>
					<input id="select_%d" type="checkbox">
					</th>',$grupocompetencia->ID_Grupo_Competencia,$grupocompetencia->ID_Grupo_Competencia);
				foreach ($grupocompetencia as $detalle) {
					printf('<td>
					<a href="GrupoCompetencia/editar/%s">%s</a>
					</td>',$grupocompetencia->ID_Grupo_Competencia,$detalle);
				}
				/*$url = "'grupocompetencia/borrar/".$grupocompetencia->ID_Grupo_Competencia."'"; 
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