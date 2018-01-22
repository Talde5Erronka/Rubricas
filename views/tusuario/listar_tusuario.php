<div>
<?php
		printf('Gestión de TUSUARIOS<br>');
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

				
		

//FUNCIÓN DE LISTAR LA TABLA----------------------------------------------------

		function mostrartabla(){

			//Manda los valores a la función de filtrar y hace la función con lo que devuelve
			
		  	$.get('Tusuario/Tusuarios_ajax',function(datos){
				
				//Se parsea a JSON
				datos2=JSON.parse(datos);

				//Vacia la tabla
				document.getElementById("sacardatos").innerHTML="";
				
				//Mete los títulos de la tabla
				$("#sacardatos").append(
						"<tr><td></td><td><strong>ID_TUsuario</strong></td><td><strong>DESC_TUsuario</strong></td></tr>"
				)



				//Mete los datos en la tabla
				$.each(datos2,function(indice,valor){

					$("#sacardatos").append( 
						"<tr><td><input type='checkbox' name='checkbox[]' id='"+valor.ID_TUsuario+"'onClick='gurdar(this.id)'></td><td><a href=TUsuario/editar/"+valor.ID_TUsuario+">"+valor.ID_TUsuario+"</a></td><td><a href=TUsuario/editar/"+valor.ID_TUsuario+">"+valor.DESC_TUsuario+"</a></td>"
					)
				});
			});
	};

	mostrartabla(); //EJECUTA LA FUNCIÓN	
});

	</script>

	<input type='checkbox' name='select-all' id='select-all' value="hola">
	
	<table id='sacardatos'>
	</table>

	<input type="submit" name="BtnEliminar" value="Eliminar"/>

	<br>
	<hr>

	<br>


</div>