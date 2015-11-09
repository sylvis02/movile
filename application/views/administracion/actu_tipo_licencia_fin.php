<div class="panel panel-default">
  <div class="panel-heading">Actualizar Tipo Licencias </div>
  <div class="panel-body">
  	<?php foreach ($actu_tipolicencia1->result() as $tipo_licencia ) {?>
  <form id="actualizar_tipo_licencia" action="<?php echo base_url();?>administracion/actu_tipo_licencia_fin" method="post">
	<table  class="table">	
		
			<tr>						
				<td align='left'><label>Tipo de Licencia:</label>
				<input type='text' name='nomT' id='nomT'value='<?php echo $tipo_licencia->nombre_licencia; ?>'class="form-control"  size='8' required/></td>
		    </tr>
			<tr>
			     <input type='hidden' name='cod_licencia' id='cod_licencia' value='<?php echo $tipo_licencia->cod_licencia; ?>'class="form-control"  required/>
     	</tr>
			<tr><td colspan='4' align='center'><input type="submit" value='Guardar'class="btn btn-primary" id="guardar" name="guardar" ></td></tr>
		
		</table>
	
		</form>
			<?php } ?>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
		$("#actualizar_tipo_licencia").submit(function(){

			$.ajax({
				url:  $(this).attr("action"),
				type: $(this).attr("method"),
				data: $(this).serialize(),
				success: function(data) 
				{ // Aquí desaparece la imagen ya que estamos reemplazando todo el HTML del contenido de la div. 
      				 jAlert('Se ha guardo corrrectamen el proceso', 'Gestión Vehicular', function(r){
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
