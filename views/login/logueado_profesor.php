<div>
		<?php
			echo("Bienvenido/a ".$_SESSION["NombreLog"]);
		?>
		<input type="submit" id= "BtnCerrarSesion" name="BtnCerrarSesion" value="Cerrar Sesión"/>
		
		<?php
			echo("<br><br>");
		?>
		

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
		<script type="text/javascript">
			
		
	$("document").ready(function(source){//Función general

	//FUNCIÓN DE LISTAR LA TABLA----------------------------------------------------
		

		function mostrartabla(){

			//Coge el valor de los desplegables 
	
			var cod = document.getElementById('Equipos').value;
			
			
			//Manda los valores a la función de filtrar y hace la función con lo que devuelve
		  	$.get('<?php echo base_url(); ?>index.php/Login/filtrar_reto_prof',{ID_Equipo:cod},function(datos){
		  		

				//Se parsea a JSON
				datos2=JSON.parse(datos);


				//Vacia la tabla
				document.getElementById("sacardatos").innerHTML="";
				
				//Mete los títulos de la tabla
				$("#sacardatos").append(
						"<tr><td><strong>DNI</strong></td><td><strong>Nombre</strong></td><td><strong>Apellido</strong></td><td><strong>User</strong></td><td><strong>Email</strong></td></tr>"
				)

				//Mete los datos en la tabla
				$.each(datos2,function(indice,valor){
					
					$("#sacardatos").append( 
						"<tr><td>"+valor.Dni+"</td><td>"+valor.Nombre+"</td><td>"+valor.Apellidos+"</td><td>"+valor.User+"</td><td>"+valor.Email+"</td><td><input type='button' value='Evaluar' name='Evaluar' id='"+valor.ID_Usuario+"' onClick=''</td>"
					)
				});

				
			});
						
};
		

//DESPLEGABLES------------------------------------------------------------

		var session = <?php echo($_SESSION["ID_UsuarioLog"]);?>
		
			//Desplegable Retos
			$.get('<?php echo base_url(); ?>index.php/Reto/Retos_usuario',{ID_Usuario:session}, function(datos){
		
				datos2=JSON.parse(datos);

				$.each(datos2,function(indice,valor){
						
						$("#Retos").append('<option value="'+valor.ID_Reto +'">'+valor.DESC_Reto	+'</option>')
				});

			});

			//Desplegable Equipos
			

			$("#Retos").on('change',function(){

				var cod=$(this).val();
				$.get('<?php echo base_url(); ?>index.php/Equipo/Equipos_ajax2',{reto:cod}, function(datos){

					datos2=JSON.parse(datos);

					$("#Equipos").empty();
					$.each(datos2,function(indice,valor){
							
							$("#Equipos").append('<option value="'+valor.ID_Equipo +'">'+valor.DESC_Equipo	+'</option>')
					});
					
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
							
			mostrartabla(); //EJECUTA LA FUNCIÓN
});

	</script>

	<label>Tus retos: </label>
	<select id="Retos">
		<option value="">Elige un reto</option>
			option	
	</select>

	<label>Equipos: </label>
	<select id="Equipos">
		<option value="">Elige un equipo</option>
			option	
	</select>

	<button id="boton" >Mostrar</button>

	<hr>
	
	<table id='sacardatos'>
	</table>

	<input type="submit" name="BtnEliminar" value="Eliminar"/>

	<br>
	<hr>

	<br>

</div>



