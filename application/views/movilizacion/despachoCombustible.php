<div id="contenido" style="width:80%; margin:auto;">   
<div class="panel panel-default">
	  <div class="panel-heading">DESPACHO DE COMBUSTIBLE</div>
	  <div class="panel-body">
		
	  <form id='modificar'name='modificar' class='modificar' action="<?php echo base_url();?>movilizacion/update_ordenesCombustible" method='post'>
		<table class='table'>
		  <tr> <td>
		  <div class="form-group">
			<label>Cantidad despachada:</label> <input type="text"  onkeypress="return validarD(event);" name="cantidad_despachada" class="form-control" required>
			<input type='hidden' value="<?php echo $numero_orden; ?>"  name="cod_orden" >
			
		    </div>
		    </td>
		    </tr>		
		    <tr><td>  <div class="form-group"><input type="submit" name="modificar" value="Despachar"   class="btn btn-primary"> </div> </td> </tr>
		</table>
           </form>
	</div>
</div>


</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#modificar").submit(function(){
			$.ajax({
				url:  $(this).attr("action"),
				type: $(this).attr("method"),
				data: $(this).serialize(),
				success: function(data) 
				{ 
      				 
				jAlert('Se ha guardo corrrectamen los cambios', 'Gestión Vehicular',function(r){
				if(r){
					 location.href=base_url+'movilizacion/listarOrdenesCombustible';
				    }
				});
      			   }
			});
			return false;
		});
			
	});
</script>

