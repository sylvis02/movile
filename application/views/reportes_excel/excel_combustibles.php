  <?php 
  date_default_timezone_set ("UTC");
  $fecha=date("d/m/Y"); 
  header('Content-type: application/vnd.ms-excel');
  header('Content-Disposition: attachment; filename=reporte_combustible_('.$fecha.').xls');
  header('Pragma: no-cache');
  header('Expires: 0');
?>


<table border="1" align="center" id='seccion' class="table table-striped table-bordered">
  <tr>
          <th>NRO DE ORDEN</th>
          <th>FECHA</th>
      	  <th>CONDUTOR</th>
          <th>TIPO DE VEHICULO</th>
          <th>NRO GPL</th>
          <th>LUGAR DE LA COMISION</th>
          <th>KILOMETRAJE</th>
          <th>GALONES</th>
          <th>VALOR</th>
        </tr>
      </thead>
      <tbody>
       <?php $tcantidad=0;
              $tvalor=0; 
              foreach ($combustibles_excel as $item) {?>
         <tr><td><?php echo $item->cod_orden;?> </td>
             <td> <?php echo $item->fecha;?> </td>
             <td><?php echo $item->nombres;?></td>
             <td><?php echo $item->num_vehiculo;?></td>
             <td><?php echo $item->num_vehiculo;?></td>
             <td><?php echo $item->destino;?></td>
             <td><?php echo $item->km_salida;?></td>
             <td><?php echo $item->cantidad_asignada;?></td>
             <td><?php echo $item->valor;?></td><tr>
              <?php $tcantidad=$tcantidad+$item->cantidad_asignada;
              $tvalor=$tvalor+$item->valor;?>
    <?php }?>
    
    <tr class'info'><td colspan='7' align='right'><b>TOTAL</b></td><td><?php echo$tcantidad;?></td><td><?php echo $tvalor;?></td></tr>
     </tbody>
    </table>