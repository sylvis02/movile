<?php 
date_default_timezone_set ("UTC");
  $fecha=date("d/m/Y"); 
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=reporte_movilizacion_('.$fecha.').xls');
header('Pragma: no-cache');
header('Expires: 0');

?>

<table   class='table table-bordered table-striped' data-toggle="table"  data-height="500"  data-search="true">
          	<thead>
			    <tr align="center">
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
				</tr>
			  
			</thead>
			<tbody >
				<?php foreach ($busqueda as $item) {?>
				 <tr><td><?php echo $item->fecha_salida;?></td>
						<td><?php echo $item->fecha_llegada;?></td>
						<td><?php echo$item->solicitante;?></td>
						<td><?php echo $item->tipo." ".$item->marca;?></td>
						<td><?php echo $item->num_vehiculo;?></td>
						<td><?php echo $item->destino;?></td>
						<td><?php echo $item->hora_salida;?></td>
						<td><?php echo $item->hora_retorno;?></td>
						<td><?php echo $item->motivo;?></td>
						<td><?php echo $item->nombres;?></td></tr>
			<?php }?>
			
			  	</tbody>
</table>

