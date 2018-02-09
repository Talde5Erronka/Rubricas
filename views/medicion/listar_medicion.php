<div>
	<?php
		printf('Gestión de MEDICIONES<br>');
		printf('<br>');
	?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
	<script type="text/javascript">		
		
	$("document").ready(function(source){   //Función general		

		//FUNCIÓN DE LISTAR LA TABLA

		function mostrartabla(){

			//Coge el valor de los desplegables 
			var cod1 = document.getElementById('TUsuarios').value;
			
			//Manda los valores a la función de filtrar y hace la función con lo que devuelve
		  	$.get('<?php echo base_url(); ?>index.php/Medicion/filtrar_medicion',{ID_TUsuario:cod1},function(datos){
				//Se parsea a JSON
				datos2=JSON.parse(datos);

				//Vacia la tabla
				document.getElementById("sacardatos").innerHTML="";
				
				//Mete los títulos de la tabla
				$("#sacardatos").append(
					"<tr><td><strong>ID_Medicion</strong></td><td><strong>DESC_TUsuario</strong></td><td><strong>COD_Medicion</strong></td><td><strong>DESC_Medicion</strong></td></tr>"
				)

				//Mete los datos en la tabla
				$.each(datos2,function(indice,valor){
					$("#sacardatos").append( 
						"<tr><td><a href=<?php echo base_url(); ?>index.php/Medicion/editar/"+valor.ID_Medicion+">"+valor.ID_Medicion+"</a></td><td><a href=<?php echo base_url(); ?>index.php/Medicion/editar/"+valor.ID_Medicion+">"+valor.DESC_TUsuario+"</a></td><td><a href=<?php echo base_url(); ?>index.php/Medicion/editar/"+valor.ID_Medicion+">"+valor.COD_Medicion+"</a></td><td><a href=<?php echo base_url(); ?>index.php/Medicion/editar/"+valor.ID_Medicion+">"+valor.DESC_Medicion+"</a></td>"
					)
				});
			});						
		};
		

		//DESPLEGABLES

			//Desplegable RETOS
			$.get('<?php echo base_url(); ?>index.php/Tusuario/TUsuarios_ajax', function(datos){
						
				datos2=JSON.parse(datos);

				$.each(datos2,function(indice,valor){	
					$("#TUsuarios").append('<option value="'+valor.ID_TUsuario +'">'+valor.DESC_TUsuario	+'</option>')
				});
			});
			
			//Botón para actualizar los datos
			$("#boton").click(function(){
				mostrartabla();
			});
							
			mostrartabla(); //EJECUTA LA FUNCIÓN
	});

	</script>

	<label>TUsuarios: </label>
	<select id="TUsuarios">
		<option value="">Todos los TUsuarios</option>
			option	
	</select>

	<button id="boton" >Mostrar</button>
	
	<table id='sacardatos'></table>

	<br>
	<br>
	
</div>