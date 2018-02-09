<div>
	<?php
		echo("Bienvenido/a ".$this->session->userdata('NombreLog'));
	?>

	<input type="submit" id= "BtnCerrarSesion" name="BtnCerrarSesion" value="Cerrar Sesión"/>
		
	<?php
		echo("<br><br>");
	?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
	<script type="text/javascript">
	
		$("document").ready(function(source){   //Función general

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

	//FUNCIÓN DE LISTAR LA TABLA----------------------------------------------------

			function mostrartabla(){
			
				//Coge el valor de los desplegables 
				var cod = document.getElementById('Retos').value;
					
				var ID_Equipo = $.get('<?php echo base_url(); ?>index.php/Login/conseguir_equipos',{ID_Reto:cod,ID_Usuario:session},function(ID_Equipo){
				
				//Manda los valores a la función de filtrar y hace la función con lo que devuelve
			  	$.get('<?php echo base_url(); ?>index.php/Login/filtrar_reto_alum',{ID_Equipo:ID_Equipo},function(datos){
			  	
					//Se parsea a JSON
				datos2=JSON.parse(datos);

					//Vacia la tabla
					document.getElementById("sacardatos").innerHTML="";
					
					//Mete los títulos de la tabla
					$("#sacardatos").append(
						"<tr><td><strong>User</strong></td><td><strong>Nombre</strong></td><td><strong>Apellido</strong></td><td><strong>Email</strong></td><td><strong>DNI</strong></td></tr>"
					)

					//Mete los datos en la tabla
					$.each(datos2,function(indice,valor){
						
						$("#sacardatos").append( 
							"<tr><td>"+valor.User+"</td><td>"+valor.Nombre+"</td><td>"+valor.Apellidos+"</td><td>"+valor.Email+"</td><td>"+valor.Dni+"</td><td><input type='button' value='Evaluar' name='Evaluar' id='"+valor.ID_Usuario+"' onClick=''</td>"
						)
					});
				});		
			});		
		};
			

//DESPLEGABLES------------------------------------------------------------
			
		var session = <?php echo($this->session->userdata('ID_UsuarioLog'));?>

			//Desplegable Retos
			$.get('<?php echo base_url(); ?>index.php/Reto/Retos_usuario',{ID_Usuario:session}, function(datos){
		
				datos2=JSON.parse(datos);

				$.each(datos2,function(indice,valor){
						$("#Retos").append('<option value="'+valor.ID_Reto +'">'+valor.DESC_Reto	+'</option>')
				});
			});

			//Botón para actualizar los datos
			$("#boton").click(function(){
					mostrartabla();
			});

			//Botón para cerrar sesion
			$("#BtnCerrarSesion").click(function(){
					<?php
						session_destroy();	
					?>
						window.location.href="<?php echo base_url(); ?>index.php/Login";
			});				
			//mostrartabla(); //EJECUTA LA FUNCIÓN

			//SOLUCIONAR PARA QUE APAREZCAN LOS USUARIOS DE WIKI
	});

	</script>

	<label>Retos: </label>
	<select id="Retos">
			option	
	</select>

	<button id="boton" >Mostrar</button>

	<br>

	<input type='checkbox' name='select-all' id='select-all' value="hola">
	
	<table id='sacardatos'></table>

	<input type="submit" name="BtnEliminar" value="Eliminar"/>

	<br>
	<hr>

	<br>

</div>



