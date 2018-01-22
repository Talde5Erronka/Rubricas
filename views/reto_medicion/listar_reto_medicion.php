<div>
<?php
		printf('Gestión de Retos Mediciones<br>');
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

				
		$(document).on('change','input[type="checkbox"]' ,function(e) {

			if(this.id=="select-all") {

			    if(this.checked) $('#id_fiscal').val(this.value);
			    else $('#id_fiscal').val("");

			}
		});


//FUNCIÓN DE LISTAR LA TABLA----------------------------------------------------

		function mostrartabla(){

			//Coge el valor de los desplegables 
			var cod1 = document.getElementById('Retos').value;
			var cod2 = document.getElementById('Mediciones').value;

			//Manda los valores a la función de filtrar y hace la función con lo que devuelve
		  	$.get('Reto_medicion/filtrar_reto_medicion',{ID_Reto:cod1,ID_Medicion:cod2},function(datos){
				
				//Se parsea a JSON
				datos2=JSON.parse(datos);

				//Vacia la tabla
				document.getElementById("sacardatos").innerHTML="";
				
				//Mete los títulos de la tabla


				$("#sacardatos").append(
						"<tr><td></td><td><strong>ID_Reto_Medicion</strong></td><td><strong>ID_Reto</strong></td><td><strong>ID_Medicion</strong></td><</tr>"
				)



				//Mete los datos en la tabla
				$.each(datos2,function(indice,valor){

					$("#sacardatos").append( 
						"<tr><td><input type='checkbox' name='checkbox[]' id='"+valor.ID_Reto_Medicion+"'onClick='gurdar(this.id)'></td><td><a href=Reto_medicion/editar/ID_Reto_Medicion"+valor.ID_Reto_Medicion+">"+valor.ID_Reto_Medicion+"</a></td><td><a href=Reto_medicion/editar/"+valor.ID_Reto_Medicion+">"+valor.ID_Reto+"</a></td><td><a href=Reto_medicion/editar/"+valor.ID_Reto_Medicion+">"+valor.ID_Medicion+"</a></td>"
					)
				});
			});
						
};
		

//DESPLEGABLES------------------------------------------------------------

			//Desplegable CENTROS
			$.get('Reto/Retos_ajax', function(datos){
						
				datos2=JSON.parse(datos);

				$.each(datos2,function(indice,valor){
						
						$("#Retos").append('<option value="'+valor.ID_Reto +'">'+valor.DESC_Reto	+'</option>')
				});
				
			});

			//Desplegable Mediciones
			$.get('Medicion/Mediciones_ajax', function(datos3){
						
				datos4=JSON.parse(datos3);

				$.each(datos4,function(indice,valor){
						
						$("#Mediciones").append('<option value="'+valor.ID_Medicion +'">'+valor.DESC_Medicion	+'</option>')
				});
				
			});
			
				
			$("#boton").click(function(){
					mostrartabla();
			});
							
			mostrartabla();

	

});

	</script>

	<label>Retos: </label>
	<select id="Retos">
		<option value="">Todos los Retos</option>
			option	
	</select>

	<label>Mediciones: </label>
	<select id="Mediciones">
		<option value="">Todos los Tipos de Mediciones</option>
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

	<br><br>


</div>