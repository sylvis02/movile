<div class="panel panel-default">
  <div class="panel-heading">INSERTAR COMBUSTIBLES </div>
  <div class="panel-body">
  	
  <form id="insertar_combustible" action="<?php echo base_url();?>administracion/insertarFinCombustibles" method="post">
	<table  class="table">	
		
			<tr>						
				<td align='left'><label>Nombre del Combustible:</label>
				<input type='text' name='nombre' id='nombre'value=''class="form-control"  size='8' required/></td>
		    </tr>
			<tr>
			   <td align='left' colspan='3'><label>Precio:</label>
			    
			    <input type='text' name='precio' id='precio' value=''class="form-control"  onkeypress="return validarD(event);" required/></td>
     		</tr>
			<tr><td colspan='4' align='center'><input type="submit" value='Guardar'class="btn btn-primary" id="guardar" name="guardar" ></td></tr>
		
		</table>
	
		</form>
			
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
		$("#insertar_combustible").submit(function(){

			$.ajax({
				url:  $(this).attr("action"),
				type: $(this).attr("method"),
				data: $(this).serialize(),
				success: function(data) 
				{ 
      				
      				jAlert('Se ha guardo corrrectamente', 'Gestión Vehicular', function(r){
      		    	if(r){
      		    		location.href=base_url+'administracion/ListCombustibles';
      		    		}
      		    	});
      			}
			});
				return false;
		});
			
	});
</script>
<script type="text/javascript">

    </script>


