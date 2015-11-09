<?php 
date_default_timezone_set ("UTC");
  $fecha=date("d/m/Y");  
  header('Content-type: application/vnd.ms-excel');
  header('Content-Disposition: attachment; filename=reporte_conductores_('.$fecha.').xls');
  header('Pragma: no-cache');
  header('Expires: 0');
?>


<table border="1" align="center" id='seccion' class="table table-striped table-bordered">
<thead>
        <tr>
          <th>CEDULA</th>
          <th>NOMBRES</th>
          <th>CORREO</th>
          <th>DENOMINACION_CARGO</th>
       
        </tr>
      </thead><tbody>
        <?php foreach ($conductor as $rep_conductores) {
         
         ?>
        <tr>
          <td ><?php echo $rep_conductores->cedula;?>&nbsp;</td>
          <td ><?php echo $rep_conductores->nombre; ?>&nbsp;</td>
          <td ><?php echo $rep_conductores->correo; ?>&nbsp;</td>
          <td ><?php echo $rep_conductores->denominacion_cargo; ?>&nbsp;</td>

       
        </tr>
        <?php } ?>
        </tbody>
      </table>