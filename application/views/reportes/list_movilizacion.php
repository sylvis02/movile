<table   class="table table-bordered table-striped" id="movilizacion" style="font-size:11px">
          	<thead>
			    <tr align="center" style="font-size:11px">
			      	<th width='140'  data-field="FECHA SALIDA">FECHA SALIDA </th>
			      	<th width='140'  data-field="FECHA RETORNO">FECHA RETORNO</th>
		      		<th width='140'  data-field="FUNCIONARIO">FUNCIONARIO RESPONSABLE</th>
		            	<th width='140'  data-field="VEHICULO ">VEHICULO</th>
		            	<th width='140'  data-field="NRO">NRO</th>
		           	<th width='140'  data-field="RUTA">RUTA</th>
		            	<th width='140'  data-field="HORA">HORA/SALIDA</th>
		            	<th width='140'  data-field="HORA">HORA/RETORNO</th>
			  	<th width='140'  data-field="ACTIVIDAD">ACTIVIDAD A REALIZARSE</th>
		            	<th width='140'  data-field="CONDUCTOR">CONDUCTOR</th>
							    <th width='140'  data-field="CONDUCTOR">IMPRIMIR</th></tr>
		</thead>
		<tbody >
			<?php if ($busqueda){ foreach ($busqueda as $item) {?>
			 <tr><td><?php echo $item->fecha_salida;?></td>
					<td><?php echo $item->fecha_llegada;?></td>
					<td><?php echo$item->solicitante;?></td>
						<td><?php echo $item->tipo." ".$item->marca;?></td>
						<td><?php echo $item->num_vehiculo;?></td>
						<td><?php echo $item->destino;?></td>
						<td><?php echo $item->hora_salida;?></td>
						<td><?php echo $item->hora_retorno;?></td>
						<td><?php echo $item->motivo;?></td>
						<td><?php echo $item->nombres;?></td>
						<td><a name='asignar'onclick="imprimirM(<?php echo $item->cod_movilizacion;?>)" class="btn btn-default"><i class="glyphicon glyphicon-print"></i></a> 
						
</td></tr>
						
			<?php }}else {?><tr><td colspan='10'>No se encontraron Resultados</td></tr> <?php }?>
			
			  	</tbody>
</table>

<script type="text/javascript">

  $(document).ready(function() {
    $('#movilizacion').DataTable( {
      "language": {
            "url": base_url+"js/Spanish.json",
        },
 
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false

    } );
} );
</script>

<script type="text/javascript">
function imprimirM(codigo){
     document.location = base_url+'imprimir/salvo_conducto/'+codigo;

  }


</script>

