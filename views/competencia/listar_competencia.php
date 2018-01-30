<div>
<?php
		printf('Gestión de COMPETENCIAS<br>');
		printf('<br>');
		?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
		<script type="text/javascript">
			
		
	$("document").ready(function(source){//Función general
		/*
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
	*/
				
		

//FUNCIÓN DE LISTAR LA TABLA----------------------------------------------------

		function mostrartabla(){

			//Manda los valores a la función de filtrar y hace la función con lo que devuelve
		  	$.get('Competencia/Competencias_ajax',function(datos){
				
				//Se parsea a JSON
				datos2=JSON.parse(datos);

				//Vacia la tabla
				document.getElementById("sacardatos").innerHTML="";
				
				//Mete los títulos de la tabla
				$("#sacardatos").append(
						"<tr><td><strong>ID_Competencia</strong></td><td><strong>DESC_Competencia</strong></td><td><strong>Mal</strong></td><td><strong>Regular</strong></td><td><strong>Bien</strong></td><td><strong>Excelente</strong></td></tr>"
				)



				//Mete los datos en la tabla
				$.each(datos2,function(indice,valor){

					$("#sacardatos").append( 
						"<tr><td><a href=Competencia/editar/"+valor.ID_Competencia+">"+valor.ID_Competencia+"</a></td><td><a href=Competencia/editar/"+valor.ID_Competencia+">"+valor.DESC_Competencia+"</a></td><td><a href=Competencia/editar/"+valor.ID_Competencia+">"+valor.Mal+"</a></td><td><a href=Competencia/editar/"+valor.ID_Competencia+">"+valor.Regular+"</a></td><td><a href=Competencia/editar/"+valor.ID_Competencia+">"+valor.Bien+"</a></td><td><a href=Competencia/editar/"+valor.ID_Competencia+">"+valor.Excelente+"</a></td>"
					)
				});
			});
	};

	mostrartabla(); //EJECUTA LA FUNCIÓN	
});

	</script>

	<!-- <input type='checkbox' name='select-all' id='select-all' value="hola"> -->
	
	<table id='sacardatos'>
	</table>

	<!-- <input type="submit" name="BtnEliminar" value="Eliminar"/> -->

	<br>
	<hr>

	<br>


</div>