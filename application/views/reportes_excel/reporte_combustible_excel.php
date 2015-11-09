<?php 
date_default_timezone_set ("UTC");
  $fecha=date("d/m/Y"); 
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=reporte_combustible_('.$fecha.').xls');
header('Pragma: no-cache');
header('Expires: 0');

?>

<table border="0" align="center" id='seccion' class='table table-striped'>
  
<thead>
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
</thead><tbody>
  <?php foreach ($prov_combus as $prov_combustible) {?>
   
 
  <tr>
    <td class="ITEMS_TABLA Estilo17"><?php echo $prov_combustible->cod_orden;?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $prov_combustible->fecha; ?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $prov_combustible->nombres; ?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $prov_combustible->nombre_tipo; ?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $prov_combustible->num_vehiculo ?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $prov_combustible->destino; ?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $prov_combustible->km_salida; ?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $prov_combustible->cantidad_asignada; ?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $prov_combustible->precio * $prov_combustible->cantidad_asignada; ?>&nbsp;</td>  </tr>
  <?php }  ?>
</tbody>
</table>
 <table align='center' border='1'>
    <tr>
    <th align='left' width='144' ><b>Descripcion:</b> </th>
    <th align='left' width='144' ><b>Cantidad:</b> </th>
    <th align='left' width='144' ><b>Valor Unitario:</b> </th>
    <th align='left' width='144' ><b>Total:</b> </th>
    </tr>
    <?php
    $sub=0;
    $iv=0;
    foreach ($detalle->result() as $detalles) {
   

    ?><tr>

    <td  align='left'><?php echo $detalles->nombre_gasolina;?></td>
    <td  align='left'><?php echo $detalles->cantidad_asignada;?></td>
    <td  align='left'><?php echo $detalles->precio;?></td>
   <td  align='left'><?php echo ($detalles->cantidad_asignada*$detalles->precio);?></td>
    </tr>
    <?php

    $sub=$sub+($detalles->cantidad_asignada*$detalles->precio);
    $iv=$sub*0.12;
    }

    ?>
    <tr>

    <td  colspan='3' align='right'> <b> SUBTOTAL </b></td>
    <td  align='left'><?php echo $sub;?></td>
    </tr>
    <tr>
    <td  colspan='3' align='right'>  <b>IVA </b></td>
    <td  align='left'><?php echo $iv; ?></td></tr>
    <tr><td  colspan='3' align='right'>  <b>TOTAL </b></td>
    <td  align='left'><?php echo ($iv+$sub); ?></td></td>


</tr>

</table>