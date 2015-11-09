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
  border: 1px solid #000000;
   border-collapse: collapse;
  } 
  
 th, td { padding:0em;}
  .salto{
          line-height: 2px;
  }

    </style>

<?php foreach ($solicitud_mantenimiento->result() as $row) { ?> 

<table width="649" border="1" align="center">
  <tr>
    <td align= "center"width="171"><img  src="<?php echo base_url();?>images/iconos/logo.png" width='64' height='80' border='1'/></td>
    <td colspan="5" align="center" valign="middle"><span class="TITULOS_COLUMNAS">GOBIERNO PROVINCIALDE LOJA<br>
      ORDEN DE LUBRICANTES Y/O REPUESTOS</span></td>
  </tr>
  <tr>
    <td colspan="6" align="right"cass="Estilo2">Nº<?php echo $row->cod_mantenimiento; ?></td>
  </tr>
  <tr>
    <td colspan="6"><span class="Estilo3">Lugar, <?php echo " Loja, ".$row->fecha; ?> </span></td>
  </tr>
  <tr>
    <td colspan="6"><span class="Estilo3">Señor:</span><span class="Estilo5"></span></td>
  </tr>
  <tr>
    <td colspan="6"><span class="Estilo3">Sirvase entregar al Sr. : </span><span class="Estilo5"><?php echo $row->nombres;?></span></td>
  </tr>
</table>
<br>
<table width="649" border="1" align="center" bordercolor="#000">
  <tr>
    <td align="center" class="Estilo3">CANTIDAD</td>
    <td align="center" class="Estilo3">CONCEPTO</td>
  </tr>
  <?php foreach ($repuestos->result() as $row_rep) {?>
  <tr><td align="center"><span class="Estilo5"><?php echo $row_rep->cantidad?></span></td>
      <td align="center"><span class="Estilo5"><?php echo $row_rep->repuesto?></span></td><tr>
<?php } ?>

</table>
<br>
<table width="649" border="0" align="center">
  <tr>
    <td width="151" align="left" colspan="2"><span class="Estilo3">Vehiculo Nº:  <?php echo $row->num_vehiculo; ?></span></td>
  </tr>
  <tr>
    <td width="151" align="left" colspan='2'><span class="Estilo3">Lugar de Trabajo: </span></td>
  </tr>
  <tr>
    <td width="151" align="left" > <span class="Estilo3">Kilometraje:  <?php echo $row->kilometraje; ?></span></td>
    <td width="151" align="left" ><span class="Estilo3"> Hora: </span> </td>
  </tr>
  <tr>
    <td width="151" align="left" colspan='2'><span class="Estilo3"> Partida Nº: </span> </td>
  </tr>
</table>
<br>
<br>
<table width="649" border="0" align="center">
  <tr>
  <td width="266" align="center" class="ITEMS_TABLA">----------------------<br>
      Entregue Conforme</td>
      
    <td align="center" colspan="2" class="ITEMS_TABLA">-----------------------<br>
      Recibi Conforme</td>
 </tr>
  <tr>
  <td width="266" align="center" class="ITEMS_TABLA">---------------------------<br>
      Jefe de Mantenimiento de Equipo liviano</td>
  <td width="160" align="center" class="ITEMS_TABLA">--------------------------<br>
      Bodeguero</td>
  <td width="209" align="center" class="ITEMS_TABLA">--------------------------<br>
      Servidor Gob. Prov. Loja</td>

</tr>
</table>
<?php } ?>