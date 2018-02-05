<div>
	<?php
		printf('Gestión de CICLOS<br>');
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
			var cod1 = document.getElementById('Centros').value;
			var cod2 = document.getElementById('Cursos').value;
			
			//Manda los valores a la función de filtrar y hace la función con lo que devuelve
		  	$.get('<?php echo base_url(); ?>index.php/Ciclo/filtrar_ciclo',{ID_Centro:cod1,ID_Curso:cod2},function(datos){
				//Se parsea a JSON
				datos2=JSON.parse(datos);

				//Vacia la tabla
				document.getElementById("sacardatos").innerHTML="";
				
				//Mete los títulos de la tabla
				$("#sacardatos").append(
					"<tr><td></td><td><strong>ID_Ciclo</strong></td><td><strong>DESC_Centro</strong></td><td><strong>COD_Curso</strong></td><td><strong>COD_Ciclo</strong></td><td><strong>DESC_Ciclo</strong></td></tr>"
				)

				//Mete los datos en la tabla
				$.each(datos2,function(indice,valor){
					$("#sacardatos").append( 
						"<tr><td><input type='checkbox' name='checkbox[]' id='"+valor.ID_Ciclo+"'onClick='gurdar(this.id)'></td><td><a href=<?php echo base_url(); ?>index.php/<?php echo base_url(); ?>index.php/Ciclo/editar/"+valor.ID_Ciclo+">"+valor.ID_Ciclo+"</a></td><td><a href=<?php echo base_url(); ?>index.php/Ciclo/editar/"+valor.ID_Ciclo+">"+valor.DESC_Centro+"</a></td><td><a href=<?php echo base_url(); ?>index.php/Ciclo/editar/"+valor.ID_Ciclo+">"+valor.COD_Curso+"</a></td><td><a href=<?php echo base_url(); ?>index.php/Ciclo/editar/"+valor.ID_Ciclo+">"+valor.COD_Ciclo+"</a></td><td><a href=<?php echo base_url(); ?>index.php/Ciclo/editar/"+valor.ID_Ciclo+">"+valor.DESC_Ciclo+"</a></td>"
					)
				});
			});				
		};	

		//DESPLEGABLES

			//Desplegable CENTROS
			$.get('<?php echo base_url(); ?>index.php/Centro/Centros_ajax', function(datos){
						
				datos2=JSON.parse(datos);

				$.each(datos2,function(indice,valor){
					$("#Centros").append('<option value="'+valor.ID_Centro +'">'+valor.DESC_Centro	+'</option>')
				});	
			});

			//Desplegable Cursos
			$.get('<?php echo base_url(); ?>index.php/Curso/Cursos_ajax', function(datos3){
						
				datos4=JSON.parse(datos3);

				$.each(datos4,function(indice,valor){
					$("#Cursos").append('<option value="'+valor.ID_Curso +'">'+valor.COD_Curso	+'</option>')
				});	
			});
			
			//Botón para actualizar los datos
			$("#boton").click(function(){
					mostrartabla();
			});
							
			mostrartabla(); //EJECUTA LA FUNCIÓN
	});

	</script>

	<label>Centros: </label>
	<select id="Centros">
		<option value="">Todos los Centros</option>
			option	
	</select>

	<label>Cursos: </label>
	<select id="Cursos">
		<option value="">Todos los Cursos</option>
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