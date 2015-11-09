<?php  if ($busqueda) { 
	?>
<table id="example" class="table table-striped table-bordered"  style="font-size:11px">
      <thead>
        <tr style="font-size:11px">
          <th width="50">NRO DE ORDEN</th>
          <th>FECHA</th>
      	  <th width="160">CONDUCTOR</th>
          <th width="90">TIPO DE VEHI.</th>
          <th width="60">NRO GPL</th>
          <th>LUGAR DE LA COMISION</th>
          <th>KILOMETRAJE</th>
          <th>GALONES</th>
          <th>VALOR</th>
	  <th>IMPRIMIR</th>
        </tr>
      </thead>
      <tbody>
       <?php $tcantidad=0;
             $tvalor=0; 
       
		foreach ($busqueda as $item) { ?>
         <tr>
	     
		<td><?php echo $item->cod_orden;?> </td>
             	<td> <?php echo $item->fecha;?> </td>
             	<td><?php echo $item->nombres;?></td>
             	<td><?php echo $item->tipo;?></td>
             	<td><?php echo $item->num_vehiculo;?></td>
             	<td><?php echo $item->destino;?></td>
             	<td><?php echo $item->km_salida;?></td>
             	<td><?php echo $item->cantidad_asignada;?></td>
             	<td><?php echo $item->valor;?></td>
   
		<td><a name='asignar'onclick="imprimirC(<?php echo $item->cod_orden;?>)" class="btn btn-default"><i class="glyphicon glyphicon-print"></i></a> 
			
	</td>        
	</tr>
              <?php $tcantidad=$tcantidad+$item->cantidad_asignada;
              $tvalor=$tvalor+$item->valor;?>
    <?php }?>
    	 </tbody>

	</table>
    <div class="alert alert-success" role="alert">
	<b>TOTAL</b><?php echo $tcantidad." Galones";?><?php echo "  $ ".$tvalor;?>
   </div>


<?php } else {?> <div class="form-group">  No se encontraron Resultados </div> <?php }?>   
  


<script type="text/javascript">

  $(document).ready(function() {
    $('#example').DataTable( {
      "language": {
            "url": base_url+"js/Spanish.json",
        },
 
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false

    } );
} );
</script>
<script type="text/javascript">
function imprimirC(codigo){
document.location=base_url+'imprimir/orden_combustible/'+codigo;
}
</script>