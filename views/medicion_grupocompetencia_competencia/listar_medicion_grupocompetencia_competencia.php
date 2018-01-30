<div>
<?php
		printf('Gestión de MEDICION_GRUPOCOMPETENCIA_COMPETENCIA<br>');
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

			//Coge el valor de los desplegables 
			var cod1 = document.getElementById('GrupoCompetencias').value;
			var cod2 = document.getElementById('Mediciones').value;
			var cod3 = document.getElementById('Competencias').value;
			
			//Manda los valores a la función de filtrar y hace la función con lo que devuelve
		  	$.get('Medicion_GrupoCompetencia_Competencia/filtrar_medicion_grupocompetencia_competencia',{ID_GrupoCompetencia:cod1,ID_Medicion:cod2,ID_Competencia:cod3},function(datos){
				
				//Se parsea a JSON
				datos2=JSON.parse(datos);
				
				//Vacia la tabla
				document.getElementById("sacardatos").innerHTML="";
				
				//Mete los títulos de la tabla
				$("#sacardatos").append(
						"<tr><td><strong>ID_GrupoCompetencia_Competencia</strong></td><td><strong>ID_Medicion</strong></td><td><strong>DESC_Medicion</strong></td><td><strong>ID_Grupo_Competencia</strong></td><td><strong>DESC_Grupo_Competencia</strong></td><td><strong>ID_Competencia</strong></td><td><strong>DESC_Competencia</strong></td><td><strong>Porcentaje</strong></td></tr>"
				)

				//Mete los datos en la tabla
				$.each(datos2,function(indice,valor){
					$("#sacardatos").append( 
						"<tr><td><a href=Medicion_GrupoCompetencia_Competencia/editar/"+valor.ID_GrupoCompetencia_Competencia+">"+valor.ID_GrupoCompetencia_Competencia+"</a></td><td><a href=Medicion_GrupoCompetencia_Competencia/editar/"+valor.ID_GrupoCompetencia_Competencia+">"+valor.ID_Medicion+"</a></td><td><a href=Medicion_GrupoCompetencia_Competencia/editar/"+valor.ID_GrupoCompetencia_Competencia+">"+valor.DESC_Medicion+"</a></td><td><a href=Medicion_GrupoCompetencia_Competencia/editar/"+valor.ID_GrupoCompetencia_Competencia+">"+valor.ID_GrupoCompetencia+"</a></td><td><a href=Medicion_GrupoCompetencia_Competencia/editar/"+valor.ID_GrupoCompetencia_Competencia+">"+valor.DESC_Grupo_Competencia+"</a></td><td><a href=Medicion_GrupoCompetencia_Competencia/editar/"+valor.ID_GrupoCompetencia_Competencia+">"+valor.ID_Competencia+"</a></td><td><a href=Medicion_GrupoCompetencia_Competencia/editar/"+valor.ID_GrupoCompetencia_Competencia+">"+valor.DESC_Competencia+"</a></td><td><a href=Medicion_GrupoCompetencia_Competencia/editar/"+valor.ID_GrupoCompetencia_Competencia+">"+valor.Porcentaje+"</a></td>"
					)
				});
			});
						
};
		

//DESPLEGABLES------------------------------------------------------------

			//Desplegable GRUPOCOMPETENCIAS
			$.get('GrupoCompetencia/GrupoCompetencias_ajax', function(datos){
						
				datos2=JSON.parse(datos);

				$.each(datos2,function(indice,valor){
						
						$("#GrupoCompetencias").append('<option value="'+valor.ID_Grupo_Competencia +'">'+valor.DESC_Grupo_Competencia	+'</option>')
				});
				
			});

			//Desplegable MEDICIONES
			$.get('Medicion/Mediciones_ajax', function(datos3){
						
				datos4=JSON.parse(datos3);

				$.each(datos4,function(indice,valor){
						
						$("#Mediciones").append('<option value="'+valor.ID_Medicion +'">'+valor.DESC_Medicion	+'</option>')
				});
				
			});

			//Desplegable COMPETENCIAS
			$.get('Competencia/Competencias_ajax', function(datos5){
						
				datos6=JSON.parse(datos5);

				$.each(datos6,function(indice,valor){
						
						$("#Competencias").append('<option value="'+valor.ID_Competencia +'">'+valor.DESC_Competencia	+'</option>')
				});
				
			});
			
			//Botón para actualizar los datos
			$("#boton").click(function(){
					mostrartabla();
			});
							
			mostrartabla(); //EJECUTA LA FUNCIÓN
});

	</script>

	<label>GrupoCompetencias: </label>
	<select id="GrupoCompetencias">
		<option value="">Todas las GrupoCompetencias</option>
			option	
	</select>

	<label>Mediciones: </label>
	<select id="Mediciones">
		<option value="">Todas las Mediciones</option>
		option
	</select>

	<label>Competencias: </label>
	<select id="Competencias">
		<option value="">Todas las Competencias</option>
		option
	</select>

	<button id="boton" >Mostrar</button>

	<hr>
	<!-- <input type='checkbox' name='select-all' id='select-all' value="hola"> -->
	
	<table id='sacardatos'>
	</table>

	<!-- <input type="submit" name="BtnEliminar" value="Eliminar"/> -->

	<br>
	<hr>

	<br>


</div>