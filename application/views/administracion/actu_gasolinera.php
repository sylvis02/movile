<div class="panel panel-default">
  <div class="panel-heading">Actualizar Gasolineras </div>
  <div class="panel-body">
  	<?php foreach ($actu_gasolinera1->result() as $gasolinera ) {?>
  <form id="actualizar_combustible" action="<?php echo base_url();?>administracion/actu_gasolinera_fin" method="post">
	<table  class="table">	
		
			<tr>						
				<td align='left'><label>Nombre del Combustible:</label>
				<input type='text' name='nomG' id='nomG'value='<?php echo $gasolinera->nombre_gasolinera; ?>'class="form-control"  size='8' required/></td>
		    </tr>
			<tr>
			     <input type='hidden' name='cod_gasolinera' id='cod_gasolinera' value='<?php echo $gasolinera->cod_gasolinera; ?>'class="form-control"  required/>
     	</tr>
			<tr><td colspan='4' align='center'><input type="submit" value='Guardar'class="btn btn-primary" id="guardar" name="guardar" ></td></tr>
		
		</table>
	
		</form>
			<?php } ?>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
		$("#actualizar_combustible").submit(function(){

			$.ajax({
				url:  $(this).attr("action"),
				type: $(this).attr("method"),
				data: $(this).serialize(),
				success: function(data) 
				{ // Aquí desaparece la imagen ya que estamos reemplazando todo el HTML del contenido de la div. 
      				
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
