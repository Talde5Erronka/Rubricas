<div>
	<?php
		printf('Gestión de EQUIPO_USUARIO<br>');
		printf('<br>');
	?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
	<script type="text/javascript">
			
		
	$("document").ready(function(source){//Función general

		$('#select-all').click(function(event) {   //Seleccionar todos los check-box
					 	
			if(this.checked) { 
				$(':checkbox').each(function() {
				   this.checked = true;                       
				});
			}

			else {
				$(':checkbox').each(function() {
				    this.checked = false;
				});
			}
		});

		//FUNCIÓN DE LISTAR LA TABLA

		function mostrartabla(){

			//Coge el valor de los desplegables 
			var cod1 = document.getElementById('Equipos').value;
			var cod2 = document.getElementById('Usuarios').value;
			
			//Manda los valores a la función de filtrar y hace la función con lo que devuelve
		  	$.get('<?php echo base_url(); ?>index.php/Equipo_usuario/filtrar_equipo_usuario',{ID_Equipo:cod1,ID_Usuario:cod2},function(datos){
				//Se parsea a JSON
				datos2=JSON.parse(datos);

				//Vacia la tabla
				document.getElementById("sacardatos").innerHTML="";
				
				//Mete los títulos de la tabla
				$("#sacardatos").append(
					"<tr><td></td><td><strong>ID_Equipo_Alumno</strong></td><td><strong>DESC_Equipo</strong></td><td><strong>User</strong></td><td><strong>COD_Rol</strong></td></tr>"
				)

				//Mete los datos en la tabla
				$.each(datos2,function(indice,valor){
					$("#sacardatos").append( 
						"<tr><td><input type='checkbox' name='checkbox[]' id='"+valor.ID_Equipo_Alumno+"'onClick='gurdar(this.id)'></td><td><a href=<?php echo base_url(); ?>index.php/Equipo_usuario/editar/"+valor.ID_Equipo_Alumno+">"+valor.ID_Equipo_Alumno+"</a></td><td><a href=<?php echo base_url(); ?>index.php/Equipo_usuario/editar/"+valor.ID_Equipo_Alumno+">"+valor.DESC_Equipo+"</a></td><td><a href=<?php echo base_url(); ?>index.php/Equipo_usuario/editar/"+valor.ID_Equipo_Alumno+">"+valor.User+"</a></td></td><td><a href=<?php echo base_url(); ?>index.php/Equipo_usuario/editar/"+valor.ID_Equipo_Alumno+">"+valor.COD_Rol+"</a></td>"
					)
				});
			});				
		};
		
		//DESPLEGABLES

			//Desplegable CENTROS
			$.get('<?php echo base_url(); ?>index.php/Equipo/Equipos_ajax', function(datos){
						
				datos2=JSON.parse(datos);

				$.each(datos2,function(indice,valor){
					$("#Equipos").append('<option value="'+valor.ID_Equipo +'">'+valor.DESC_Equipo	+'</option>')
				});	
			});

			//Desplegable Usuarios
			$.get('<?php echo base_url(); ?>index.php/Usuario/Usuarios_ajax', function(datos3){
						
				datos4=JSON.parse(datos3);

				$.each(datos4,function(indice,valor){
					$("#Usuarios").append('<option value="'+valor.ID_Usuario +'">'+valor.User	+'</option>')
				});
			});
			
			//Botón para actualizar los datos
			$("#boton").click(function(){
				mostrartabla();
			});
							
			mostrartabla(); //EJECUTA LA FUNCIÓN
	});

	</script>

	<label>Equipos: </label>
	<select id="Equipos">
		<option value="">Todos los Equipos</option>
			option	
	</select>

	<label>Usuarios: </label>
	<select id="Usuarios">
		<option value="">Todos los Tipos de Usuarios</option>
		option
	</select>

	<button id="boton" >Mostrar</button>

	<br>
	<input type='checkbox' name='select-all' id='select-all' value="hola">
	
	<table id='sacardatos'></table>

	<input type="submit" name="BtnEliminar" value="Eliminar"/>

	<br>
	<br>

</div>