<div>
<?php
		
		printf('Gestión de CURSOS<br>');
		printf('<br>');
		
		?>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
	
	
	<script type="text/javascript">

	$("document").ready(function(source){

		$('#select-all').click(function(event) {   
 			if(this.checked) {
       		 // Iterate each checkbox
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

	function mostrartabla() {

					//var cod1 = document.getElementById('Cursos').value;
					//var cod2 = document.getElementById('Curso').value;

  			$.get('<?php echo base_url(); ?>index.php/Curso/Cursos_ajax', function(datos){
				
				//Se parsea a JSON
				datos2=JSON.parse(datos);

				//Vacia la tabla
				document.getElementById("sacardatos").innerHTML="";


				//Mete los títulos de la tabla

				$("#sacardatos").append("<tr><td></td><td><strong>ID_Curso</strong></td><td><strong>COD_Curso</strong></td>")

						//Mete los datos en la tabla
						$.each(datos2,function(indice,valor){
						
		
					$("#sacardatos").append("<tr><td><input type='checkbox' name='checkbox[]' id='"+valor.ID_Curso+"'onClick='gurdar(this.id)'></td><td><a href=Curso/editar/"+valor.ID_Curso+">"+valor.ID_Curso+"</a></td><td><a href=Curso/editar/"+valor.ID_Curso+">"+valor.COD_Curso+"</a></td>")
						});
			});
	}

					
					mostrartabla();

	});

	</script>
	<hr>
	<input type='checkbox' name='select-all' id='select-all' value="hola">
	<table id='sacardatos'>
	</table>
	<input type="submit" name="BtnEliminar" value="Eliminar"/>

	<br>

	<hr>

	<br>	
</div>



		



