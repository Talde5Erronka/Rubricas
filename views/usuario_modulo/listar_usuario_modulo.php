<div>
<?php
		printf('Gestión de USUARIOS_MODULOS<br>');
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
			var cod1 = document.getElementById('Modulos').value;
			var cod2 = document.getElementById('Usuarios').value;

			//Manda los valores a la función de filtrar y hace la función con lo que devuelve
		  	$.get('<?php echo base_url(); ?>index.php/Usuario_modulo/filtrar_usuario_modulo',{ID_Modulo:cod1,ID_Usuario:cod2},function(datos){

				//Se parsea a JSON
				datos2=JSON.parse(datos);

				//Vacia la tabla
				document.getElementById("sacardatos").innerHTML="";
				
				//Mete los títulos de la tabla
				$("#sacardatos").append(
						"<tr><td></td><td><strong>ID_Usuario_Modulo</strong></td><td><strong>DESC_Modulo</strong></td><td><strong>User</strong></td><td><strong>COD_Modulo</strong></td></tr>"
				)

				//Mete los datos en la tabla
				$.each(datos2,function(indice,valor){
					$("#sacardatos").append( 
						"<tr><td><input type='checkbox' name='checkbox[]' id='"+valor.ID_Usuario_Modulo+"'onClick='gurdar(this.id)'></td><td><a href=Usuario_modulo/editar/"+valor.ID_Usuario_Modulo+">"+valor.ID_Usuario_Modulo+"</a></td><td><a href=Usuario_modulo/editar/"+valor.ID_Usuario_Modulo+">"+valor.DESC_Modulo+"</a></td><td><a href=Usuario_modulo/editar/"+valor.ID_Usuario_Modulo+">"+valor.User+"</a></td><td><a href=Usuario_modulo/editar/"+valor.ID_Usuario_Modulo+">"+valor.COD_Modulo+"</a></td>"
					)
				});
			});
						
};
		

//DESPLEGABLES------------------------------------------------------------

			//Desplegable MODULOS
			$.get('<?php echo base_url(); ?>index.php/Modulo/Modulos_ajax', function(datos){
						
				datos2=JSON.parse(datos);

				$.each(datos2,function(indice,valor){
						
						$("#Modulos").append('<option value="'+valor.ID_Modulo +'">'+valor.DESC_Modulo	+'</option>')
				});
				
			});

			//Desplegable USUARIOS
			$.get('<?php echo base_url(); ?>index.php/Usuario/Usuarios_ajax', function(datos3){
						
				datos4=JSON.parse(datos3);

				$.each(datos4,function(indice,valor){
						
						$("#Usuarios").append('<option value="'+valor.ID_Usuario +'">'+valor.User	+'</option>')
				});
				
			});
			
			//Botón para actualizar los datos
			$("#boton").click(function(){
					mostrartabla();
			});
							
			mostrartabla(); //EJECUTA LA FUNCIÓN
});

	</script>

	<label>Modulos: </label>
	<select id="Modulos">
		<option value="">Todos los Modulos</option>
			option	
	</select>

	<label>Usuarios: </label>
	<select id="Usuarios">
		<option value="">Todos los Usuarios</option>
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