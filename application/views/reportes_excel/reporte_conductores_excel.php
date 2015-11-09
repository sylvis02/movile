<?php 
date_default_timezone_set ("UTC");
  $fecha=date("d/m/Y"); 
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=reporte_conductores_('.$fecha.').xls');
header('Pragma: no-cache');
header('Expires: 0');


?>
<table border="0" align="center" id='seccion' class="table table-striped table-bordered">
<thead>
  <tr>
    <th>Licencia</th>
    <th>Nombre</th>
    <th># C&eacute;dula</th>
    <th>Relaci&oacute;n<br>
      Laboral</th>
      <th>Novedades</th>
  
  </tr>
</thead><tbody>
  <?php foreach ($conductor->result() as $rep_conductores) {
   
   ?>
  <tr>
    <td class="ITEMS_TABLA Estilo17"><?php echo $rep_conductores->cedula;?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $rep_conductores->nombres; ?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $rep_conductores->correo; ?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $rep_conductores->denominacion_cargo; ?>&nbsp;</td>

   
  </tr>
  <?php } ?>
  </tbody>
</table>

