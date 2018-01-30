<div>
<?php
		printf('BIENVENIDO<br>');
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
	
			var cod = document.getElementById('Retos').value;
			
			
			//Manda los valores a la función de filtrar y hace la función con lo que devuelve
		  	$.get('../Login/filtrar_reto_alum',{ID_Reto:cod},function(datos){
		  		

				//Se parsea a JSON
				datos2=JSON.parse(datos);


				//Vacia la tabla
				document.getElementById("sacardatos").innerHTML="";
				
				//Mete los títulos de la tabla
				$("#sacardatos").append(
						"<tr><td></td><td><strong>DNI</strong></td><td><strong>Nombre</strong></td><td><strong>Apellido</strong></td><td><strong>User</strong></td><td><strong>Email</strong></td></tr>"
				)

				//Mete los datos en la tabla
				$.each(datos2,function(indice,valor){
			
					$("#sacardatos").append( 
						"<tr><td><input type='checkbox' name='checkbox[]' id='"+valor.ID_Usuario+"'onClick='gurdar(this.id)'></td><td><a href=Usuario/editar/"+valor.ID_Usuario+">"+valor.Dni+"</a></td><td><a href=Usuario/editar/"+valor.ID_Usuario+">"+valor.Nombre+"</a></td><td><a href=Usuario/editar/"+valor.ID_Usuario+">"+valor.Apellidos+"</a></td><td><a href=Usuario/editar/"+valor.ID_Usuario+">"+valor.User+"</a></td><td><a href=Usuario/editar/"+valor.ID_Usuario+">"+valor.Email+"</a></td>"
					)
				});
			});
						
};
		

//DESPLEGABLES------------------------------------------------------------
			
		<?php 
			if(isset($_COOKIE["PersonaLogueada"])) {
				$cookie=$_COOKIE['PersonaLogueada'];
				echo($cookie);
			}
		?>

		var cookie = <?php echo $cookie;?>

			

			//Desplegable Retos
			$.get('../Reto/Retos_alumno',{ID_Usuario:cookie}, function(datos){
						
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

	<hr>
	<input type='checkbox' name='select-all' id='select-all' value="hola">
	
	<table id='sacardatos'>
	</table>

	<input type="submit" name="BtnEliminar" value="Eliminar"/>

	<br>
	<hr>

	<br>

</div>



