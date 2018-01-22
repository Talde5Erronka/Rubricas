<div>
<?php
		printf('Gestión de USUARIOS<br>');
		printf('<br>');
		?>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
		<script type="text/javascript">

			$("document").ready(function(source){//Función general

				$('#select-all').click(function(event) {  //Seleccionar todos los check-box 


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
	function mostrartabla() {

			var cod1 = document.getElementById('Centros').value;
			var cod2 = document.getElementById('TUsuarios').value;

  			$.get('Usuario/filtrar_Usuario',{ID_Centro:cod1,ID_TUsuario:cod2},function(datos){

							datos2=JSON.parse(datos);
							document.getElementById("sacardatos").innerHTML="";
							$("#sacardatos").append(
								"<tr><td></td><td><strong>ID_Usuario</strong></td><td><strong>DESC_TUsuario</strong></td><td><strong>COD_Centro</strong></td><td><strong>DESC_Centro</strong></td><td><strong>User</strong></td><td><strong>Password</strong></td><td><strong>Nombre</strong></td><td><strong>Apellidos</strong></td><td><strong>Email</strong></td><td><strong>DNI</strong></td> </tr>"
						)
						$.each(datos2,function(indice,valor){
						
		
							$("#sacardatos").append("<tr><td><input type='checkbox' name='checkbox[]' id='"+valor.ID_Usuario+"'onClick='gurdar(this.id)'></td><td><a href=Usuario/editar/"+valor.ID_Usuario+">"+valor.ID_Usuario+"</a></td><td><a href=Usuario/editar/"+valor.ID_Usuario+">"+valor.DESC_TUsuario+"</a></td><td><a href=Usuario/editar/"+valor.ID_Usuario+">"+valor.COD_Centro+"</a></td><td><a href=Usuario/editar/"+valor.ID_Usuario+">"+valor.DESC_Centro+"</a></td><td><a href=Usuario/editar/"+valor.ID_Usuario+">"+valor.User+"</a></td><td><a href=Usuario/editar/"+valor.ID_Usuario+">"+valor.Password+"</a></td><td><a href=Usuario/editar/"+valor.ID_Usuario+">"+valor.Nombre+"</a></td><td><a href=Usuario/editar/"+valor.ID_Usuario+">"+valor.Apellidos+"</a></td><td><a href=Usuario/editar/"+valor.ID_Usuario+">"+valor.Email+"</a></td><td><a href=Usuario/editar/"+valor.ID_Usuario+">"+valor.Dni+"</a></td>")
						});
					});
	}


				$.get('Centro/Centros_ajax', function(datos3){
				
					datos4=JSON.parse(datos3);
				
					$.each(datos4,function(indice,valor){
						$("#Centros").append('<option value="'+valor.ID_Centro +'">'+valor.DESC_Centro	+'</option>')
					});
		
				});


				$.get('Tusuario/Tusuarios_ajax', function(datos){
				
					datos2=JSON.parse(datos);

					$.each(datos2,function(indice,valor){
						$("#TUsuarios").append('<option value="'+valor.ID_TUsuario +'">'+valor.DESC_TUsuario	+'</option>')
					});
		
				});
		
					$("#boton").click(function(){
					
					mostrartabla();
					});
					
					mostrartabla();

	});

	</script>
	<td>
	<label>Centros: </label>
	<select id="Centros">
	<option value="">Todos los Centros</option>
		option	
	</select>
	<label>TUsuarios: </label>
	<select id="TUsuarios">
		<option value="">Todos los Tipos de usuario</option>
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