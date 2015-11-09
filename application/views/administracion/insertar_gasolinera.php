<div class="panel panel-default">
  <div class="panel-heading">AÑADIR GASOLINERA </div>
  	<div class="panel-body">
	  <form id="insertar_gasolinera" action="<?php echo base_url();?>administracion/insertarFinGasolinera" method="post">
		<table  class="table">	
			<tr>						
				<td align='left'><label>Nombre de la Gasolinera:</label>
				<input type='text' name='nombreGa' id='nombreGa'value=''class="form-control"  size='8' required/></td>
			</tr>
			<tr><td colspan='4' align='center'><input type="submit" value='Guardar'class="btn btn-primary" id="guardar" name="guardar" ></td></tr>
		</table>
		</form>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
		$("#insertar_gasolinera").submit(function(){

			$.ajax({
				url:  $(this).attr("action"),
				type: $(this).attr("method"),
				data: $(this).serialize(),
				success: function(data) 
				{ 

      				jAlert('Se ha guardo corrrectamente', 'Gestión Vehicular', function(r){
                	if(r){	
      					location.href=base_url+'administracion/listadoGasolineras';
      					 }
              		  });
      			}
			});
				return false;
		});
			
	});
</script>
