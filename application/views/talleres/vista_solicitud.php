<div class="panel panel-info">
	<div class="panel-heading">Matenimiento</div>

<?php foreach ($solicitud_mantenimiento->result() as $row) { ?>	

<table  class="table">
	<tr>
	    <td colspan="5"><b>FECHA:</b></span> <?php echo $row->fecha; ?></span></td>
	</tr>
	<tr>
	    <td colspan="5" align='center'> <b> IDENTIFICACIÓN DEL BIEN</b></td>
	</tr>
<tr>
		<td align='left'>MARCA</td>
		<td align='left'><b><?php echo $row->marca; ?></b></span></td>
		<td align='left'>Nº Motor</td>
		<td align='left'><b><?php echo $row->motor; ?></b></span></td>
     </tr>
	<tr>
	  <td>Nº Chasis</td>
	  <td><b><?php echo $row->chasis; ?></b></td>
	</tr>
	<tr>
	  <td>MODELO</td>
	  <td><b><?php echo $row->modelo; ?></b></td>
	  <td>Placa</td>
	  <td><b><?php echo $row->placa; ?></b></td>
	  </tr>
	<tr>
	  <td >Nº GPL</td>
	  <td><b><?php echo $row->num_vehiculo;?></b></td>
	  <td>Año</td>
	  <td><b><?php echo $row->ano_fabricacion; ?></b></td>
	  </tr>

	<tr>
	  <td colspan='8' align='center'><b>DETALLE DE DESPERFECTOS</b></td> 
	</tr>
	<tr>
		<td  colspan='8' whidth='200px'><?php echo $row->detalle; ?></td>
	</tr>
    <tr>
    	<td colspan="8" align='center'><b>TRABAJO REALIZADO</b>  </td>
    </tr>
    <tr>
    	<td colspan="8"> <?php echo $row->trabajo_realizado; ?></td>
    </tr>
    <tr>
   	  <td colspan="8" align='center'><b>MATERIAL UTILIZADO</b></td>
    </tr>
    <tr>
    	<td  colspan="8"><table class='table'>
    					 <thead>
    					 	<tr>
    					 		<td>Repuesto</td>
    					 		<td>Cantidad</td>
    					 	</tr>
    					 </thead>
    					 <tbody>
    					 	<?php foreach ($repuesto->result() as $row_rep) {?>
    					 		<tr><td><?php echo $row_rep->repuesto; ?></td>
    					 			<td><?php echo $row_rep->cantidad; ?></td></tr>
    					 	
    					 	<?php } ?>
    					 </tbody>
    					</table>  </td>
    </tr>
    <tr>
    	<td ><div align='center'>
    	<form name='rep' class='rep' action='<?php echo base_url();?>imprimir/imprimirsolicitud_mantenimiento' method='post'>
  			
    				<input type='hidden' name='cod_mantenimientoImprimir' id='cod_mantenimientoImprimir' value='<?php echo $row->cod_mantenimiento; ?>'>
  					<input type='submit'  name='regresar' class='btn btn-info dropdown-toggle'value='Imprimir Solicitud' />
  			
		
	</form>
</div>
</td>
<td>
	<div align='center'>
	<form name='rep' class='rep' action='<?php echo base_url();?>imprimir/nota_repuestos' method='post'>
		
    				<input type='hidden' name='cod_mantenimientoImprimir' id='cod_mantenimientoImprimir' value='<?php echo $row->cod_mantenimiento; ?>'>
  					<input type='submit'  name='regresar' class='btn btn-info dropdown-toggle'value='Nota Repuestos ' />
  				
	</form>
</div>
    </td>
    </tr>

	</table>
	

	
<?php }?>
</div>

