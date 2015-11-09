
<?php 
date_default_timezone_set ("UTC");
  $fecha=date("d/m/Y"); 
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=reporte_control_mantenimiento_('.$fecha.').xls');
header('Pragma: no-cache');
header('Expires: 0');


?>




<table >
<thead>
  <tr>

    <th>Fecha</th>
    <th>Desperfectos/Trabajo Realizado</th>
    <th>Motivo</th>
    <th>Kilometraje</th>
    <th>Vehiculo</th>
    <th>Conductor</th>
  
   
  </tr>
</thead><tbody>
  <?php 
foreach ($control_mantenimiento_excel as $mantenimiento) {
 ?>
  <tr>
    <td><?php echo $mantenimiento->fecha;?>&nbsp;</td>
    <td><?php echo $mantenimiento->detalle; ?>&nbsp;</td>
    <td><?php echo $mantenimiento->motivo; ?>&nbsp;</td>
    <td><?php echo $mantenimiento->kilometraje; ?>&nbsp;</td>
    <td><?php echo $mantenimiento->tipo."/".$mantenimiento->vehiculo."/".$mantenimiento->num_vehiculo; ?></td>
    <td><?php echo $mantenimiento->nombres; ?>&nbsp;</td>
  
      
  </tr>
  <?php }  ?>
</tbody>
</table>


