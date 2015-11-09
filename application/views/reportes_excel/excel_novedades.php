<?php 
date_default_timezone_set ("UTC");
  $fecha=date("d/m/Y");  
  header('Content-type: application/vnd.ms-excel');
  header('Content-Disposition: attachment; filename=reporte_novedades_('.$fecha.').xls');
  header('Pragma: no-cache');
  header('Expires: 0');
?>


<table border="1" align="center" id='seccion' class="table table-striped table-bordered">
     <thead>
        <tr>
          <th>VEHICULO</th>
          <th>NOVEDADES</th>
          <th>NOTIFICACIONES TALLERES</th>
  
        </tr>
      </thead><tbody>
        <?php foreach ($novedades as $notifi) {
         
         ?>
        <tr>
          <td ><?php echo $notifi->marca." - ".$notifi->modelo." - ".$notifi->placa;?>&nbsp;</td>
          <?php 
          if($notifi->novedades!=null){?>

          <td ><?php echo $notifi->novedades; ?>&nbsp;</td>
          <?php 
          }else{?>
           <td ><b>No registra novedad alguna</b>&nbsp;</td>
          <?php
          }
          if($notifi->notificaciones_talleres!=null){?>
          <td ><?php echo $notifi->notificaciones_talleres; ?>&nbsp;</td>
        <?php
         }else{?>
         <td><b>No registra notificaciones de talleres alguna</b>&nbsp;</td>
         <?php
         }?>
       
        </tr>
        <?php } ?>
        </tbody>
       
    
</table>