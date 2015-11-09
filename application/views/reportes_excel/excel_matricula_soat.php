  <?php 
date_default_timezone_set ("UTC");
  $fecha=date("d/m/Y"); 
  header('Content-type: application/vnd.ms-excel');
  header('Content-Disposition: attachment; filename=reporte_vencidos('.$fecha.').xls');
  header('Pragma: no-cache');
  header('Expires: 0');
?>
      

<table border="1" align="center" id='seccion' class="table table-striped table-bordered">
<thead>
  <tr>
    <th colspan="5">MATRICULAS VENCIDAS</th>
  </tr>
      <tr>
        <th>PLACA</th>
        <th>MARCA</th>
        <th>TIPO DE VEHICULO</th>
        <th>ESTADO VEHICULO</th>
        <th>FECHA DEL VENCIMIENTO</th>


      </tr>
    </thead><tbody>
 <?php foreach ($mat_soat->result() as $mati) {
     
        if($mati->fecha_mat>$fechaactual){?>

   
  
      <tr>
       

        <td><?php echo $mati->placa;?>&nbsp;</td>
        <td><?php echo $mati->marca; ?>&nbsp;</td>
    	  <td><?php echo $mati->tipo; ?>&nbsp;</td>
        <td><?php echo $mati->condicion_real; ?>&nbsp;</td>
        <td><?php echo $mati->fecha_mat;?></td>
     
          </tr>
       <?php 
      
      
          
            }
          }?>
    </tbody>

    </table>
    
    <table border="1" align="center" id='seccion' class="table table-striped table-bordered">
<thead>
  <tr>
    <th colspan="5">SOAT VENCIDOS</th>
  </tr>
      <tr>
        <th>PLACA</th>
        <th>MARCA</th>
        <th>TIPO DE VEHICULO</th>
        <th>ESTADO VEHICULO</th>
        <th>FECHA DEL VENCIMIENTO</th>


      </tr>
    </thead><tbody>
 <?php foreach ($mat_soat->result() as $mati) {
     
        if($mati->fecha_soat>$fechaactual){?>

   
  
      <tr>
       

        <td><?php echo $mati->placa;?>&nbsp;</td>
        <td><?php echo $mati->marca; ?>&nbsp;</td>
        <td><?php echo $mati->tipo; ?>&nbsp;</td>
        <td><?php echo $mati->condicion_real; ?>&nbsp;</td>
        <td><?php echo $mati->fecha_soat;?></td>
     
          </tr>
       <?php 
      
      
          
            }
          }?>
    </tbody>

    </table>
    