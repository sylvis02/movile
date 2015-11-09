<div class="panel panel-default">
  <div class="panel-heading">INSERTAR TIPO LICENCIAS </div>
  <div class="panel-body">
  <form id="insertar_tipo_licencia" action="<?php echo base_url();?>administracion/insertarFinTipoLicencia" method="post">
	<table  class="table">	
		
			<tr>						
				<td align='left'><label>Tipo de Licencia:</label>
				<input type='text' name='nombreTi' id='nombreTi'value=''class="form-control"  size='8' required/></td>
		    </tr>
				<tr><td colspan='4' align='center'><input type="submit" value='Guardar'class="btn btn-primary" id="guardar" name="guardar" ></td></tr>
		
		</table>
	
		</form>
			
</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
		$("#insertar_tipo_licencia").submit(function(){

			$.ajax({
				url:  $(this).attr("action"),
				type: $(this).attr("method"),
				data: $(this).serialize(),
				success: function(data) 
				{ // Aquí desaparece la imagen ya que estamos reemplazando todo el HTML del contenido de la div. 
      				 jAlert('Se ha guardo corrrectamente el proceso', 'Gestión Vehicular', function(r){
      				 	if(r){
      						location.href=base_url+'administracion/listadoTipoLicencia';
      					}
      				});
      			}
			});
				return false;
		});
			
	});
</script>
