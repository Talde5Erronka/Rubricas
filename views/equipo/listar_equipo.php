<div>
	<?php
		printf('Gestión de EQUIPOS<br>');
		printf('<br>');
	?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
	<script type="text/javascript">
			
		
	$("document").ready(function(source){    //Función general

		$('#select-all').click(function(event) {    //Seleccionar todos los check-box
					 	
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
			var cod1 = document.getElementById('Retos').value;
			
			//Manda los valores a la función de filtrar y hace la función con lo que devuelve
		  	$.get('<?php echo base_url(); ?>index.php/Equipo/filtrar_equipo',{ID_Reto:cod1},function(datos){
				//Se parsea a JSON
				datos2=JSON.parse(datos);

				//Vacia la tabla
				document.getElementById("sacardatos").innerHTML="";
				
				//Mete los títulos de la tabla
				$("#sacardatos").append(
					"<tr><td></td><td><strong>ID_Equipo</strong></td><td><strong>COD_Equipo</strong></td><td><strong>DESC_Equipo</strong></td><td><strong>DESC_Reto</strong></td></tr>"
				)

				//Mete los datos en la tabla
				$.each(datos2,function(indice,valor){
					$("#sacardatos").append( 
						"<tr><td><input type='checkbox' name='checkbox[]' id='"+valor.ID_Equipo+"'onClick='gurdar(this.id)'></td><td><a href=<?php echo base_url(); ?>index.php/Equipo/editar/"+valor.ID_Equipo+">"+valor.ID_Equipo+"</a></td><td><a href=<?php echo base_url(); ?>index.php/Equipo/editar/"+valor.ID_Equipo+">"+valor.COD_Equipo+"</a></td><td><a href=<?php echo base_url(); ?>index.php/Equipo/editar/"+valor.ID_Equipo+">"+valor.DESC_Equipo+"</a></td><td><a href=<?php echo base_url(); ?>index.php/Equipo/editar/"+valor.ID_Equipo+">"+valor.DESC_Reto+"</a></td>"
					)
				});
			});				
		};
		

		//DESPLEGABLES

			//Desplegable RETOS
			$.get('<?php echo base_url(); ?>index.php/Reto/Retos_ajax', function(datos){
						
				datos2=JSON.parse(datos);

				$.each(datos2,function(indice,valor){
						
						$("#Retos").append('<option value="'+valor.ID_Reto +'">'+valor.DESC_Reto	+'</option>')
				});	
			});
			
			//Botón para actualizar los datos
			$("#boton").click(function(){
					mostrartabla();
			});
							
			mostrartabla(); //EJECUTA LA FUNCIÓN
	});

	</script>

	<label>Retos: </label>
	<select id="Retos">
		<option value="">Todos los Retos</option>
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