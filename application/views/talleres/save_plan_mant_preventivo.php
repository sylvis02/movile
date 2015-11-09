<div class="panel panel-default">
  <div class="panel-heading">Agregar Nuevo Mantenimiento </div>
  <div class="panel-body">
  	<form id='save_plan_preventivo' action="<?php echo base_url();?>talleres/save_ordenesMantenimiento_Preventivo" method="post">
	<table  class="table">	
			<tr>
				   <td align='left'><label>Categoria</label>
					   <select id="tipo_vehiculo" name='tipo_vehiculo'class="form-control" onChange='cargarModelo();'>
					   	<option value=''>--SELECCIONE--</option>
					   
					   	<option value='0'>TODOS</option>
					   	<?php foreach ($tipo_vehiculo->result() as $marc) {  	?>
				   			<option value='<?php echo $marc->id_veh_tipo; ?>'><?php echo $marc->tipo;?></option><?php }?>
					    </select>
				  
				    </td>
				    <td align='left'><label>Gasolina Vehiculo</label>
					    <select id="gasolina" name='gasolina'class="form-control" onChange='cargarModelo();'>
					   	<option value=''>--SELECCIONE--</option>
					   	
					   	<option value='0'>TODOS</option>
					   	<?php foreach ($gasolina->result() as $gaso) {  	?>
				   			<option value='<?php echo $gaso->cod_gasolina; ?>'><?php echo $gaso->nombre_gasolina;?></option><?php }?>
					    </select>
				  
				    </td>
				    <td align='left'><label>Kilometraje:</label>
				    <input type='text' name='kilometraje' id='kilometraje'value=''class="form-control" onkeypress="return validar(event)" size='8' placeholder='Ingrese Kilometraje'required/></td>
			</tr>
 		    <tr>
			   <td align='left' colspan='3'><label>Descripción:</label>
			   <textarea name='descripcion' id='descripcion' value=''class="form-control"  placeholder='Destriba el tipo de mantenimiento'  rows='6'required></textarea></td>
			</tr>
			<tr><td colspan='4' align='center'><input type="submit" value='Guardar'class="btn btn-primary" id="guardar" name="guardar" ></td></tr>
		</table>
	</form>
	</div>
</div>
<script type="text/javascript">

	$(document).ready(function(){
		$("#save_plan_preventivo").submit(function(){

			$.ajax({
				url:  $(this).attr("action"),
				type: $(this).attr("method"),
				data: $(this).serialize(),
				success: function(data) 
				{ 
					 jAlert("Se ha guardo corrrectamen su solicitud", "Gestión Vehicular", function(r){
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

