<?php
header('Content-Type: text/html; charset=UTF-8');
		header('Content-type: application/vnd.ms-word');
		header("Content-Disposition: attachment; filename=Imprimir.doc");
		header("Pragma: no-cache");
		header("Expires: 0");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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

<table width="649" border="1" align='center'  class="table">
<tr>
<td rowspan="3" align='center'><img src="<?php echo base_url();?>images/iconos/logo.png" width='90' height='105' border=0 alt="GPC"></td>
<td colspan="2" align='center'><span class="Estilo2">REQUERIMIENTO DE MANTENIMIENTO</span></td>
<td rowspan="3" align='center'><span class="Estilo2">Nº <b><?php echo $row->cod_mantenimiento; ?></b> </span></td>
</tr>
<tr>
<td colspan="2" align='center'><span class="Estilo2">Dirección Administrativa</span></td>
</tr>
<tr>
<td colspan="2" align='center'><span class="Estilo2">Coordinación de Gestión Vehicular </span></td>
</tr>
<tr>
<td colspan="4"><span class="Estilo2"> LUGAR Y FECHA:</span> <span class="Estilo5"><?php echo "Loja, ".$row->fecha; ?></span></td>
</tr>
<tr>
<td colspan="4"><span class="Estilo2">UNIDAD SOLICITANTE:</span></td>
</tr>
<tr>
<td colspan="4" align='center'> <span class="Estilo2"> IDENTIFICACIÓN DEL BIEN</span></td>
</tr>
<tr>
<td align='left'><span class="Estilo2">MARCA</span></td>
<td align='left'><span class="Estilo5"><?php echo $row->marca; ?></span></td>
<td align='left'><span class="Estilo2"> Nº Motor</span></td>
<td align='left'><span class="Estilo5"><?php echo $row->motor; ?></span></td>
</tr>
<tr>
<td><span class="Estilo2">TIPO</span></td>
<td><span class="Estilo5"><?php echo $row->tipo; ?></span></td>
<td><span class="Estilo2">Nº Chasis</span></td>
<td><span class="Estilo5"><?php echo $row->chasis; ?></span></td>
</tr>
<tr>
<td><span class="Estilo2">MODELO</span></td>
<td><span class="Estilo5"><?php echo $row->modelo; ?></span></td>
<td><span class="Estilo2">Placa</span></td>
<td><span class="Estilo5"><?php echo $row->placa; ?></span></td>
</tr>
<tr>
<td><span class="Estilo2">Nº GPL</span></td>
<td><span class="Estilo5"> <?php echo $row->num_vehiculo; ?></span></td>
<td><span class="Estilo2">Año</span></td>
<td><span class="Estilo5"><?php echo $row->ano_fabricacion; ?></span></td>
</tr>

<tr>
<td colspan='4' align='center'><span class="Estilo2">DETALLE DE DESPERFECTOS</span></td> 
</tr>
<tr>
<td height="150" colspan='4' whidth='200px'><span class="Estilo5"><?php echo $row->detalle; ?></span></td>
</tr>

<tr>
<td height="39" colspan='4' align="center" whidth='200px'>f:_______________________________</td>
</tr>
<tr>
<td colspan='4' whidth='200px' align="center"><span class="Estilo5"><b>SERVIDOR RESPONSABLE (CUSTODIO)</b></span></td>
</tr>
<tr>
<td colspan="4" align="center"> <span class="Estilo2"> TRABAJO REALIZADO </span> </td>
</tr>
<tr>
<td colspan='2' alin> <span class="Estilo2"> FECHA DE RECEPCIÓN </span></td>
<td colspan='2'><span class="Estilo2"> HORA: </span></td>
</tr>
<tr>
<td height="150" colspan="4"><span class="Estilo5"><?php echo $row->trabajo_realizado; ?></span></td>
</tr>
<tr>
<td colspan="4" align="center"> <span class="Estilo2">MATERIAL UTILIZADO</span></td>
</tr>
<?php foreach ($repuestos->result() as $row_rep) {?>
	<tr><td colspan="4"><span class="Estilo5"><?php echo $row_rep->cantidad?>,<?php echo $row_rep->repuesto; ?></span> </td>
	</tr>
<?php } ?>

<tr>
<td colspan="2"> <span class="Estilo2">FECHA DE ENTREGA:</span> </td>
<td colspan="2"> <span class="Estilo2"> HORA: </span></td>
</tr>

<tr>
<td  aling='center'><span class="Estilo2"> ENTREGUE CONFORME: </span></td>
<td><span class="Estilo2" aling='center'> RECIBI CONFORME:</span></td>
<td rowspan="3" colspan="2"><span class="Estilo2"> </span><span class="Estilo2"> </span><span class="Estilo2">f:_____________________ </span></td>
</tr>

<tr>
<td align="center"><span class="Estilo2"> NOMBRE </span></td>
<td align="center"><span class="Estilo2"> NOMBRE</span></td>
</tr>
<tr>
<td height="85"  align="center"><span class="Estilo2"> f:_______________________ </span></td>
<td align="center"><span class="Estilo2">f:________________________</span></td>
</tr>
<tr>
<td  align="center"><span class="Estilo2"> RESPONSABLE DEL TRABAJO <P> (MECANICO)</span></td>
<td align="center"><span class="Estilo2">CONDUCTOR</span></td>
<td align="center" colspan="2"> <span class="Estilo2"> JEFE DE MANTENIMIENTO O <P> RESPONSABLE A CARGO </span></td>
</tr>
</table>
<?php }?>
