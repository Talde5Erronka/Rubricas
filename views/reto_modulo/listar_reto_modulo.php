<div>
<?php
		printf('Gestión de RETO_MODULO<br>');
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

			//Coge el valor de los desplegables 
			var cod1 = document.getElementById('Retos').value;
			var cod2 = document.getElementById('Modulos').value;
			
			//Manda los valores a la función de filtrar y hace la función con lo que devuelve
		  	$.get('Reto_modulo/filtrar_reto_modulo',{ID_Reto:cod1,ID_Modulo:cod2},function(datos){
		 	
				//Se parsea a JSON
				datos2=JSON.parse(datos);

				//Vacia la tabla
				document.getElementById("sacardatos").innerHTML="";
				
				//Mete los títulos de la tabla
				$("#sacardatos").append(
						"<tr><td></td><td><strong>ID_Reto_Modulo</strong></td><td><strong>DESC_Modulo</strong></td><td><strong>COD_Reto</strong></td><td><strong>DESC_Reto</strong></td><td><strong>ID_UAdmin</strong></td><td><strong>IN_Extendido</strong></td><td><strong>IN_EAbierta</strong></td></tr>"
				)



				//Mete los datos en la tabla
				$.each(datos2,function(indice,valor){
					$("#sacardatos").append( 
						"<tr><td><input type='checkbox' name='checkbox[]' id='"+valor.ID_Reto_Modulo+"'onClick='gurdar(this.id)'></td><td><a href=Reto_modulo/editar/"+valor.ID_Reto_Modulo+">"+valor.ID_Reto_Modulo+"</a></td><td><a href=Reto_modulo/editar/"+valor.ID_Reto_Modulo+">"+valor.DESC_Modulo+"</a></td><td><a href=Reto_modulo/editar/"+valor.ID_Reto_Modulo+">"+valor.COD_Reto+"</a></td><td><a href=Reto_modulo/editar/"+valor.ID_Reto_Modulo+">"+valor.DESC_Reto+"</a></td><td><a href=Reto_modulo/editar/"+valor.ID_Reto_Modulo+">"+valor.ID_UAdmin+"</a></td><td><a href=Reto_modulo/editar/"+valor.ID_Reto_Modulo+">"+valor.IN_Extendido+"</a></td><td><a href=Reto_modulo/editar/"+valor.ID_Reto_Modulo+">"+valor.IN_EAbierta+"</a></td>"
					)
				});
			});
						
};
		

//DESPLEGABLES------------------------------------------------------------

			//Desplegable RETOS
			$.get('Reto/Retos_ajax', function(datos){
						
				datos2=JSON.parse(datos);

				$.each(datos2,function(indice,valor){
						
						$("#Retos").append('<option value="'+valor.ID_Reto +'">'+valor.DESC_Reto	+'</option>')
				});		
			});

			//Desplegable Modulos
			$.get('Modulo/Modulos_ajax', function(datos3){
						
				datos4=JSON.parse(datos3);

				$.each(datos4,function(indice,valor){
						
						$("#Modulos").append('<option value="'+valor.ID_Modulo +'">'+valor.COD_Modulo	+'</option>')
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

	<label>Modulos: </label>
	<select id="Modulos">
		<option value="">Todos los Tipos de Modulos</option>
		option
	</select>

	<button id="boton" >Mostrar</button>

	<hr>
	<input type='checkbox' name='select-all' id='select-all' value="hola">
	
	<table id='sacardatos'>
	</table>

	<input type="submit" name="BtnEliminar" value="Eliminar"/>

	<br>
	<hr>

	<br>


</div>