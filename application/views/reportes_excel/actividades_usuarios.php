<?php 
date_default_timezone_set ("UTC");
  $fecha=date("d/m/Y"); 
  header('Content-type: application/vnd.ms-excel');
  header('Content-Disposition: attachment; filename=reporte_vehiculos_('.$fecha.').xls');
  header('Pragma: no-cache');
  header('Expires: 0');
?>

<div id='table'>
<table class='table table-bordered table-striped'>
      <thead>
        <tr>
          <td><b>NOMBRE TABLA</b></td>
          <td><b>NOMBRE OPERACIÓN</b></td>
          <td><b>FEHCA</b></td>
          <td><b>USUARIO</b></td>
          <td><b>NUMERO</b></td>
        </tr>
      </thead>
      <tbody>
<?php foreach ($actividades_usuarios as $key ) {?>

    <tr>
      <td><?php echo  $key->nombre_tabla; ?></td>
      <td><?php echo  $key->operacion; ?></td>
      <td><?php echo  $key->fecha; ?></td>
      <td><?php echo  $key->usuario; ?></td>
      <td><?php echo  $key->id_audit; ?></td>
    </tr>
<?php }?>
    </tbody>
  </div>


</table>
   