<div class="panel panel-default">
  <div class="panel-heading">Actualizar Plan Mantenimiento Preventivo </div>
  <div class="panel-body">
  	<?php foreach ($plan_preven->result() as $item ) {?>
  <form id="actualizar_plan_preven" action="<?php echo base_url();?>talleres/actualizar_plan_preven" method="post">
	<table  class="table">	
		
			<tr>
				   <td align='left'><label>Categoria</label>
					   <select id="tipo_vehiculo" name='tipo_vehiculo'class="form-control" onChange='cargarModelo();'>
					   	<option value=''>--SELECCIONE--</option>
					   	<option value='0'>TODOS</option>
						   	<?php foreach ($tipo_vehiculo->result() as $marc) {  	
						   				if ($item->cod_tipo_vehiculo==  $marc->id_veh_tipo){ ?>
						   					<option value='<?php echo $marc->id_veh_tipo; ?>' selected><?php echo $marc->tipo;?></option>
					   					<?php }else{ ?>
						   			<option value='<?php echo $marc->id_veh_tipo; ?>'><?php echo $marc->tipo;?></option><?php }}?>
					    </select>
				  
				    </td>
				    <td align='left'><label>Gasolina Vehiculo</label>
					    <select id="gasolina" name='gasolina'class="form-control" onChange='cargarModelo();'>
					   	<option value=''>--SELECCIONE--</option>
					   	<option value='0'>TODOS</option>
					   	<?php foreach ($gasolina->result() as $gaso) {  
					   		if ($item->cod_gasolina == $gaso->cod_gasolina){?>
				   			<option value='<?php echo $gaso->cod_gasolina; ?>' selected><?php echo $gaso->nombre_gasolina;?></option>
				   			<?php } else {?>
				   			
				   			<option value='<?php echo $gaso->cod_gasolina; ?>'><?php echo $gaso->nombre_gasolina;?></option><?php }}?>
					    </select>
				  
				    </td>
				<td align='left'><label>Kilometraje:</label>
				<input type='text' name='kilometraje' id='kilometraje'value='<?php echo $item->kilometraje1; ?>'class="form-control" onkeypress="return validar(event)" size='8' required/></td>
		    </tr>
			<tr>
			   <td align='left' colspan='3'><label>Descripcion:</label>
			   	<input type='hidden' name='cod_plan_preven' id='cod_plan_preven' value='<?php echo $item->id_man_preven; ?>'class="form-control"/>
			    <input type='text' name='descripcion' id='descripcion' value='<?php echo $item->descripcion; ?>'class="form-control"  required/></td>
     		</tr>
			<tr><td colspan='4' align='center'><input type="submit" value='Guardar'class="btn btn-primary" id="guardar" name="guardar" ></td></tr>
		
		</table>
	
		</form>
			<?php } ?>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
		$("#actualizar_plan_preven").submit(function(){

			$.ajax({
				url:  $(this).attr("action"),
				type: $(this).attr("method"),
				data: $(this).serialize(),
				success: function(data) 
				{ // Aquí desaparece la imagen ya que estamos reemplazando todo el HTML del contenido de la div. 
      				 jAlert('Se ha guardo corrrectamen su solicitud', 'Gestión Vehicular', function(r){
      				 	if(r){
					 		location.href=base_url+'talleres/plan_preventivo';
 					    }
      				 });
      			}
			});
				return false;
		});
			
	});
</script>

