
<div id="contenido" style="width:80%; margin:auto;">   
<div class="panel panel-info">
	<div class="panel-heading">Asignar Vehiculo</div>
	 <table id="aprobarMovilizacion" class='table table-condensed table-striped table-bordered' align='center'>
	<thead>
    <tr>
	  <th align='center' width='150'>Solicitante</th>
          <th align='center'>Fecha solicitud</th>
	  <th align='center' width='150'>Motivo</th>
	  <th align='center' width='150'>Destino</th>
	  <th align='center'>Fecha Salida</th>
	  <th align='center'>Fecha Llegada</th>
      	  <th align='center' >Asignar Vehiculo</th>
	  <th align='center'>Eliminar Solicitud</th>
    </tr></thead><tbody>
    <?php if ($aprobacionSoli){ 

    	foreach ($aprobacionSoli->result() as $datoA ) {?>

	    <tr align="center">
	      <td><?php echo $datoA->solicitante; ?></td>
		  <td><?php echo $datoA->fecha_emision; ?></td>
		  <td><?php echo $datoA->motivo; ?></td>
		  <td><?php echo $datoA->destino; ?></td>
		  <td><?php echo $datoA->fecha_salida; ?></td>     
		  <td><?php echo $datoA->fecha_llegada; ?></td>
		  <td><a data-toggle="tooltip" data-original-title="Asignar vehiculo" onclick= "url(<?php echo $datoA->cod_movilizacion;?>)" class="btn btn-default"><i class="glyphicon glyphicon-ok"></i></a></td>
   		 <td><a name='eliminar' onClick="eliminarMovilizacionA(<?php echo $datoA->cod_movilizacion; ?>);" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i></a> </td>	
       </tr>
 <?php } ?>

  </tbody>
 <?php } else {?> <tr class="alert alert-warning" role="alert"><td colspan='7'> No existen solicitudes para su Aprobación </td></tr> <?php } ?>
 </table>
</div>
</div>

<script>
function url(dato){

	$('#contenido').html('');
	$('#contenido').load(base_url+'movilizacion/asignacionVehiculo/'+dato);
			
}


function eliminarMovilizacionA(dato){
 jConfirm('Desea eliminar este proceso?', 'Gestión Vehicular', function(r) {
      if(r==true){
  
      $.post(base_url+'movilizacion/eliminarMovilizacion',
         {'codigo': dato}, 
          function(data){ 
          location.href=base_url+"movilizacion/asignar_vehiculo";
          });
       }
      });

}
</script>
