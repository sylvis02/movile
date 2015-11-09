
<div id="contenido" style="width:80%; margin:auto;">   

<table id="combustible" class="table table-striped table-bordered"  align='center'>
	<thead>
	    <tr>
	      <th>Nº</th>
	      <th>FECHA</th>
	      <th width='180'>OPERADOR</th>
	      <th>MAQUINARIO Nª.</th>
	      <th>CANTIDAD<br>ASIGNADA</th>
	      <th>DESPACHAR</th>
	    </tr>
	</thead>
	<tbody>
		<?php if ($ordenesComusb){ 
		 foreach ($ordenesComusb as $despCombus) {?>
		<tr align="center">
		        <td> <?php echo $despCombus->cod_orden;?></td>
			<td><?php echo $despCombus->fecha; ?></td>
			<td><?php echo $despCombus->nombres; ?></td>     
			<td><?php echo $despCombus->vehiculo; ?></td>
			<td><?php echo $despCombus->cantidad_asignada; ?> galones</td>
			<td><a data-toggle="tooltip" data-original-title="Despachar combustible" onclick= "url_despachar(<?php echo $despCombus->cod_orden;?>)"class="btn btn-default"><i class="glyphicon glyphicon-ok"></i></a></td>
			
    	</tr>
    	<?php } 
	} else { ?> <tr><td colspan='5'>No se encontraron Resultados</td></tr> <?php }?>
  	</tbody>
</table>

</div>

<script>
function url_despachar(dato){

	$('#contenido').html('');
	$('#contenido').load(base_url+'movilizacion/despacharCombustible/'+dato);
			
}

</script>
<script type="text/javascript">
	$(document).ready(function() {
    		$('#combustible').DataTable({ 
		"language": {
            "url": base_url+"js/Spanish.json",
        }});
	} );
</script>

