 <?php  
    header('Content-Type: text/html; charset=UTF-8');
    header('Content-type: application/vnd.ms-word');
    header("Content-Disposition: attachment; filename=Imprimir.doc");
    header("Pragma: no-cache");
    header("Expires: 0");
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style type="text/css">
  .Estilo2 {
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-weight: bold;
  font-size:12px;
  }
 .Estilo3 {
  font-family: Arial, Helvetica, sans-serif;
  font-weight: bold;
  font-size:12px;
  }
  .Estilo5 {
  font-family: Arial, Helvetica, sans-serif;
  font-size:10px;
  }
  .Estilo6 {
  font-family: Arial, Helvetica, sans-serif;
  font-size:8px;
  }
  .table, th,td{ 
     border-collapse: collapse;
  border: 1px solid #000000;
  
  } 
  
 th, td { padding:0em;}
        .salto{
          line-height: 2px;
          }


</style>

<?php foreach ($orden_combustible->result() as $item) {?>

<table width="649" border="1" align="center">
  <tr>
    <td align= "center"width="171"><img  src="<?php echo base_url();?>images/iconos/logo.png" width='64' height='84' border='1'/></td>
    <td colspan="5" align="center" valign="middle" ><span class="Estilo2">GOBIERNO PROVINCIAL DE LOJA<br>
      DIRECCIÓN ADMINISTRATIVA<br>
      COORDINACIÓN DE GESTIÓN VEHÍCULAR</span></td>
    
  </tr>
  <tr>
    <td colspan="6" align="center" class="Estilo2">ORDEN DE ENTREGA DE COMBUSTIBLE NRO. <?php echo  $item->cod_orden;?> </td>
  </tr>
   <tr>
   <td colspan="2"> <span class="Estilo3">Fecha: </span><span>&nbsp; <span class="Estilo5"><?php echo $item->fecha; ?></span></span></td>
    <td width="494" colspan="4" ><span class="Estilo3">Gasolinera: </span><span class="Estilo5"><?php echo $item->nombre_gasolinera; ?></span></td>
  </tr>
  <tr>
    <td colspan="6"><span class="Estilo3">Partida de Combustible N&ordm;:</span> <span class="Estilo5"><?php echo $item->descripcion; ?></span></td>
  </tr>
  <tr>
    <td colspan="6"><span class="Estilo3">Conductor: </span><span class="Estilo5"><?php echo $item->nombres;?></span></td>
  </tr>
</table>

<table width="649" border="1" align="center" bordercolor="#000">
  <tr>
    <td rowspan="2" align="center" class="Estilo3">VEHICULO</td>
    <td rowspan="2" align="center" class="Estilo3">PLACA</td>
    <td rowspan="2" align="center" class="Estilo3">N&ordm;</td>
    <td colspan="2" align="center" class="Estilo3" >KILOMETRAJE</td>
    <td rowspan="2" align="center" class="Estilo3">DESTINO</td>
  </tr>
  <tr class="Estilo3">
    <td >SALIDA</td>
    <td >LLEGADA</td>
  </tr>
  <tr>
    <td height="108" width="180"><span class="Estilo5"><?php echo $item->marca."/".$item->modelo;?></span></td>
    <td height="90" width="90" class="Estilo5"><?php echo $item->placa; ?></td>
    <td height="90" width="90" class="Estilo5"><?php echo $item->num_vehiculo; ?></td>
    <td height="90" width="90" class="Estilo5"><?php echo $item->km_salida; ?></td>
    <td height="90" width="90" class="Estilo5"><?php echo $item->km_retorno; ?></td>
    <td height="90" width="180" class="Estilo5"> <?php echo  strtoupper($item->destino); ?></td>
  </tr>
   <tr class="Estilo3">
    <td>COMBUSTIBLE</td>
    <td colspan="3">CANTIDAD GALONES </td>
    <td colspan="2">CANTIDAD EN LETRAS </td>

  </tr>
  <tr>
    <td class="Estilo3">SUPER:</td>
    <?php if ($item->nombre_gasolina=="SUPER") { ?>
    <td colspan="3" class="Estilo5"> <?php echo $item->cantidad_asignada;?></td>
    <td colspan="2" class="Estilo5">
      <?php $this->load->helper('numeros_helper'); echo num_to_letras($item->cantidad_asignada); ?>
       <?php } else {?>
        <td colspan="3" class="Estilo5"></td ><td colspan="2" class="Estilo5"></td>
       <?php } ?>
    </td>
 
  </tr>
  <tr>
    <td class="Estilo3">EXTRA:</td>
    <?php if ($item->nombre_gasolina=="EXTRA"){?>
    <td colspan="3" class="Estilo5"><?php echo $item->cantidad_asignada;?></td>
    <td colspan="2" class="Estilo5"><?php $this->load->helper('numeros_helper'); echo num_to_letras($item->cantidad_asignada);?></td>
    <?php }else {?> <td colspan="3" class="Estilo5"></td ><td colspan="2" class="Estilo5"></td> <?php } ?>
  </tr>
  <tr>
    <td class="Estilo3">DIESEL:</td>
    <?php if ($item->nombre_gasolina=="DIESEL"){?>
    <td colspan="3" class="Estilo5"><?php echo $item->cantidad_asignada;?></td>
    <td colspan="2" class="Estilo5"><?php $this->load->helper('numeros_helper'); echo num_to_letras($item->cantidad_asignada);?></td>
    <?php }else {?> <td colspan="3" class="Estilo5"></td ><td colspan="2" class="Estilo5"></td> <?php } ?>
  </tr>

  <tr>
    <td height="108" width="151" align="center" class="Estilo3">----------------------<br>
      DIRECTOR<br>
      SOLICITANTE</td>
    <td  height="108" width="168" colspan="2" align="center" class="Estilo3">-----------------------<br>
      JEFE DE MOVILIZACIÓN<br>
      <br></td>
    <td height="108" width="169" colspan="2" align="center" class="Estilo3">---------------------------<br>
      ENTREGUÉ CONFORME<br>
      GASOLINERA </td>
    <td height="108" width="161" align="center" class="Estilo3">--------------------------<br>
      RECIBÍ CONFORME<br>
      CONDUCTOR </td>
  </tr>
</table>

<?php } ?>