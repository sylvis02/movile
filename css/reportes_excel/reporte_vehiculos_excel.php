<?php 
date_default_timezone_set ("UTC");
  $fecha=date("d/m/Y"); 
  header('Content-type: application/vnd.ms-excel');
  header('Content-Disposition: attachment; filename=reporte_vehiculos_('.$fecha.').xls');
  header('Pragma: no-cache');
  header('Expires: 0');
?>

<table border="0" align="center" id='seccion'  class="table table-striped">
<thead>
  <tr>
    <th>Tipo</th>
    <th>Marca</th>
    <th>No</th>
    <th>Placa</th>
    <th>Combust.</th>
    <th>Novedades_Comisi&oacute;n</th>
    <th>Notificaciones</th>
    <th>Condici&oacute;n</th>
  
  </tr>
</thead><tbody>
  <?php 
foreach ($vehiculo->result() as $vehiculos) {
 ?>
  <tr>
    <td class="ITEMS_TABLA Estilo17"><?php echo $vehiculos->nombre_tipo;?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $vehiculos->marca; ?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $vehiculos->num_vehiculo; ?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $vehiculos->placa; ?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $vehiculos->nombre_gasolina;?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $vehiculos->novedades; ?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $vehiculos->notificaciones_talleres; ?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $vehiculos->condicion_real; ?>&nbsp;</td>
   
  </tr>
  <?php }  ?>
</tbody>
</table>
   
