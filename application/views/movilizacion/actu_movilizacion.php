<script>
	$('#fecha_salida').datepicker();
	$('#fecha_llegada').datepicker();

</script>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
		 	<div class="col-md-4">ACTUALIZAR SOLICTUD DE MOVILIZACION</div>
			  	<div class="nav navbar-nav navbar-right">
					<a href="#"  onclick='asignarVehiculo();'class="btn btn-primary btn-sm"><i class='glyphicon glyphicon-bed'></i>Asignar Vehiculo</a>
				</div>
		</div>
	</div>
  	<div class="panel-body">
	<form id="actualizarSolicitud" action="<?php echo base_url();?>movilizacion/actualizarMovilizacion" method="post">
	<table align='center' class="table">	

			<?php foreach ($movilizacion->result() as $item ) {?>
		
			<tr>
				<td align='left' width='144'>Solicitante:</td>
				<td colspan='2' align='left'><b><?php echo $item->solicitante;?></b></td>
			</tr>
			<tr>	
				<td align='left'> Departamento:</td>
				<td colspan='3' align='left'><b><?php echo $item->departamento;?></b></td>
			</tr>
          	<tr>
				<td align='left'>Fecha Salida:</td>
				<td align='left'><input type="text" id='fecha_salida'name="fecha_salida" class="form-control" data-date-format="mm/dd/yyyy" type="text"    value="<?php echo $item->fecha_salida;?>"/></td>
				<td align='right' width='117'>Fecha Llegada:</td>
				<td  align='left'><input type="text" id='fecha_llegada'name="fecha_llegada" class="form-control" data-date-format="mm/dd/yyyy" type="text" value="<?php echo $item->fecha_llegada;?>"/></td>
			</tr>
			<tr>
				<td align='left'>Hora Salida:</td>
				<td align='left'><input type='text' name='hora_salida' class='form-control'    value="<?php echo $item->hora_salida;?>"/></td>
				<td align='left'>Hora Retorno:</td>
				<td align='left'><input  type='text' name='hora_retorno' class='form-control'   value='<?php echo $item->hora_retorno;?>'/></td>
			</tr>
          	<tr>
				<td align='left'>Motivo:</td>
				<td colspan='3' align='left'><input name='motivo' class='form-control' value='<?php echo $item->motivo;?>'/></td>
			</tr>
			<tr> 
				<td align='left'>Ruta:</td>
				<td colspan='2'  align='left'><input type="text" class="form-control" id="ruta" name="ruta" value="<?php echo $item->destino;?>"  required>
					 <!--<button href="javascript:void(0);" onclick="window.open('cargarMapa.php', 'popup', 'left=170, top=150, width=850, height=650, toolbar=0, resizable=1')">Agregar Ruta</button></td>-->
				<input type="hidden" id="Kilometraje" name="kilometraje" value="<?php echo $item->kilometraje_recorrido;?>"></td>

				<td align='left'> <a href="#responsive" role="button" class="btn" data-toggle="modal">Ruta</a> </td>
				</tr>
            <tr>
				<td align='left' width='144'>N&uacute;mero de ocupantes:</td>
				<td colspan='3' align='left'><input type='number' name='ocupantes'  class='form-control' id='ocupantes' value='<?php echo $item->ocupantes;?>'/></td>
			</tr>	
            <tr>
				<td align='left'>Nombres de ocupantes:</td>
				<td colspan='3' align='left'><input type='text'name='integrantes' class='form-control' value='<?php echo $item->integrantes;?>'/></td>
			</tr>
			<tr>
				<input type='hidden' name='cod_movilizacion' id='cod_movilizacion' value='<?php echo $item->ccod_movilizacion; ?>'>
				 <td colspan='4' align='center'><input type="submit" value='Guardar'class="btn btn-primary" id="guardar" name="guardar" ></td>
				
				</tr>
			<tr><td colspan='4'><div id='mensaje'class='alert alert-success' style='display:none'></div></td></tr>	
			</table>
			
			
			<?php } ?>
	
</form>

</div>
</div>

<div class="modal fade bs-example-modal-lg" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
     	<div class="modal-content">
     		<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     		  	<h4 class="modal-title" id="gridSystemModalLabel">Asignar Ruta</h4>
     		</div>

      		<div class="modal-body">
      			<a onclick="initialize();"> mostra Mapa</a>
 				<div id="mostrarMapa" style="width: 850px; height: 350px;"> </div>

		 	 
			 		<div id="control_panel" style="float:left;width:100%;text-align:left;padding-top:0px">
		    			<div style="margin:20px;border-width:2px;"></div>
		    		</div>
					
					<table class="table">
						<tr>
							<td><b>Provincia:</b>
								<select  name="provincias" id='provincias1'  class="form-control"  onChange='cargarCanton(this.value);'>
								<option value='0'>--Seleccione--</option>
								<?php foreach ($provincia->result() as $provincia1) { ?>
								<option value="<?php echo $provincia1->nombre;?>"><?php echo $provincia1->nombre;?></option>	
						<?php	}	?>
						 
							</select> </td>
							<td><b>Canton:</b>
								<select id="cantones1" name="cantones" class="form-control" onChange='cargarParroquia(this.value);' >
								   <option value='0'>--Seleccione--</option>
						 		</select> </td>
							<td><b>Parroquia:</b>
								<select id="parroquia1" name="parroquia"   class="form-control" onChange='anadirArreglo(this.value)'>
									<option value='0'>--Seleccione--</option>					
							</select> </td>
							<td><b>.</b><input  type="submit" onclick="calcRoute();" value="Determinar Ruta" class="form-control"></td></tr>
					</table>
					<table class="table table-bordered">
		   			  <thead>
		                                <tr>
		                                    <td>Ruta</td>
		                                    <td>Eliminar</td>
		                                </tr>
		                          </thead>
		                          <tbody id="table1"></tbody>
		                         </table>	
   				<div style=" margin-left:15px;" >
  				<div id="directions_panel" style="width:100%;"  ></div>
      			<b>Kilometros:</b> <input type="text" id="total" name="total">
			</div>
			<div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn btn-success" onClick="agregar_ruta();">Guardar</a>
        <a href="#" data-dismiss="modal" class="btn">Cerrar</a>
    </div>
 </div>

 <script type="text/javascript">
	$(document).ready(function(){
		$("#actualizarSolicitud").submit(function(){
			$.ajax({
				url:  $(this).attr("action"),
				type: $(this).attr("method"),
				data: $(this).serialize(),
				success: function(data) 
				{ 
      				  jAlert('Se ha guardo corrrectamen su solicitud', 'Gestión Vehicular', function (r){
					if(r){
					location.href=base_url+'movilizacion/solicitud';
					}
				});
      			}
			});
				return false;
		});
			
	});
</script>

<script>
function cargarCanton(provincia){
	$.post(base_url+'movilizacion/cargarCanton',
		
		{'codigo': provincia}, 
			function(data){ 
			
			$('#cantones1').html(data);
        });
}
function cargarParroquia(canton){

	var provincia=$("#provincias1").val();
	

	$.post(base_url+'movilizacion/cargarParroquia',
		
		{'codigo': canton, 'provincia':provincia}, 
			function(data){ 
				$('#parroquia1').html(data);
        });
}
function asignarVehiculo(){
var dato=$("#cod_movilizacion").val();	

$('#contenido').html('');
$('#contenido').load(base_url+'movilizacion/asignacionVehiculo/'+dato);

}

function imprimirSolicitud(){
var dato=$("#cod_movilizacion").val();	
document.location = base_url+'imprimir/solicitud/'+dato;

}







