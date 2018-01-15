<div>
<?php
		printf('Gestión de Usuarios de los Equipos<br>');
		printf('--------------------------------------------------------------------<br>');
		
		//  CENTRO  EQUIPO
		//  CURSO   USUARIO
		//  CICLO   EQUIPO_USUARIO


		//FILTROS DE CURSO Y GRUPO
		if ($equipos){
			$ID_Equipo = array(
	    		0         => 'Todos los Equipos'
			);
			foreach ($equipos->result() as $equipo) {
				$ID_Equipo[$equipo->ID_Equipo] = $equipo->DESC_Equipo;
			}	
		}
		else{
			$ID_Equipo = array(
	    		0         => 'Todos los Equipos'
			);
		}

		if ($usuarios){
			$ID_Usuario = array(
	    		0         => 'Todos los Usuarios'
			);
			foreach ($usuarios->result() as $usuario) {
				$ID_Usuario[$usuario->ID_Usuario] = $usuario->User;
			}	
		}
		else{
			$ID_Usuario = array(
	    		0         => 'Todos los Usuarios'
			);
		}	

		?>


		<div>
			<?php echo form_open('Equipo_usuario/filtrar_equipo_usuario');?>
			<?php echo form_label('Equipo: ','ID_Equipo'); ?>
			<?php
			//DESPLEGABLE DE CENTRO
			echo form_dropdown('ID_Equipo', $ID_Equipo);
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
		if ($equipos_usuarios){
			printf('<table>
				<thead>			
				<tr>
					<td>
						<label for="select_all"></label>
						<input id="select_all" type="checkbox">
					</td>
				');
			$primerequipo_usuario = $equipos_usuarios->result()[0];
			foreach ($primerequipo_usuario as $key => $value) {
				printf('<th id="%s">
						<span>%s</span>
					</th>',$key,$key);
			}
			printf('<th>Acciones</th></tr>
			</thead>
			<tbody>');
			foreach ($equipos_usuarios->result() as $equipo_usuario) {
				printf('<tr>
					<th>
					<label for="select_%d"></label>
					<input id="select_%d" type="checkbox">
					</th>',$equipo_usuario->ID_Equipo_Alumno,$equipo_usuario->ID_Equipo_Alumno);
				//Paso el objeto stdClass a Array para modificar COD_Equipo y COD_Usuario
				//$equipo_usuarioArray = get_object_vars($equipo_usuario);
				//var_dump($equipo_usuario['ID_usuario']);
				foreach ($equipo_usuario as $detalle) {
					//Para usuario y Equipo hay que sacar su COD_CENTRO y COD_CURSO
					if($filtrado==0){
						printf('<td>
						<a href="Equipo_usuario/editar/%s">%s</a>
						</td>',$equipo_usuario->ID_Equipo_Alumno,$detalle);
					}
					else{
						printf('<td>
						<a href="editar/%s">%s</a>
						</td>',$equipo_usuario->ID_Equipo_Alumno,$detalle);
					}
				}

				if($filtrado==0){
					$url = "'equipo_usuario/borrar/".$equipo_usuario->ID_Equipo_Alumno."'"; 
				}
				else{
					$url = "'borrar/".$equipo_usuario->ID_Equipo_Alumno."'"; 
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