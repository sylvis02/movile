<?php 
date_default_timezone_set ("UTC");
  $fecha=date("d/m/Y"); 
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=reporte_mat_soat_('.$fecha.').xls');
header('Pragma: no-cache');
header('Expires: 0');


?>

<table border="0" align="center" id="seccion"  class='table table-striped' aling='center'>
	
<thead>
  <tr>
      <th>PLACA</th>
        <th>MARCA</th>
        <th>TIPO DE VEHICULO</th>
        <th>ESTADO VEHICULO</th>
        <th>FECHA DE VENCIMIENTO MATRICULACION</th>
        <th>FECHA DE VENCIMIENTO SOAT</th>


  </tr>
</thead><tbody>
<?php foreach ($matricula_soat as $mati) {
  
?>

  <tr>
       <td><?php echo $mati->placa;?>&nbsp;</td>
        <td><?php echo $mati->marca; ?>&nbsp;</td>
        <td><?php echo $mati->tipo; ?>&nbsp;</td>
        <td><?php echo $mati->condicion_real; ?>&nbsp;</td>
   
    <td class="ITEMS_TABLA Estilo17" align="center"><?php 
  
    if($mati->fecha_mat>$fecha_actual){

      
      
        echo "VENCIDO<br>".$mati->fecha_mat;
        

    }else{
    
       echo "VIGENCIA<br>".$mati->fecha_mat;
       

    }?>  </td>

    <td class="ITEMS_TABLA Estilo17" align="center"><?php 
  
    if($mati->fecha_soat>$fecha_actual){

      
       echo "VENCIDO<br>".$mati->fecha_soat;
        

    }else{
    
        echo "VIGENCIA<br>".$mati->fecha_soat;
        

    }?> </td>
      </tr>
  <?php }  ?>
</tbody>
</table>