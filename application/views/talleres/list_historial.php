<?php 
			if($datos) { ?>
<table  class="table table-bordered  table-striped" id="historial">
			
			<thead>
				<tr>
					<td><b>Fecha</b></td>
					<td><b>Detalle</b></td>
					<td><b>Motivo</b></td>
					<td><b>Kilometraje Mantenimiento </b></td>
					<td><b>Kilometraje recorrido</b></td>
					<td><b>Proximo Cambio<b></td>
			
			</thead>

			<tbody id="table">

	
 			<?php 
			
			foreach ($datos as $item) { $recorrido=intval($item->km_recorrido); $mantenimiento=intval($item->kilometraje); $tot=$recorrido+$mantenimiento;
					?>
			
				
					
					<tr>
						<td><?php echo $item->fecha; ?></td>
						<td><?php echo $item->detalle; ?></td>
						<td><?php echo $item->motivo; ?></td>
						<td><h4><span class="label label-warning"><?php echo $item->kilometraje; ?></span></h4></td>
						<td><?php echo $item->km_recorrido;?></td>
						<td><h4><span class="label label-danger"><?php echo $tot; ?></span></h4></td>
						</tr>
		   		  
					  
				<?php } ?>
  			
		
			
			</tbody>
			
		</table>
   <?php }else { ?>
			<div class="alert alert-warning" role="alert"> No se encuentra ningun mantenimiento registrado</div><?php }?>
<script type="text/javascript">
  $(document).ready(function() {
    $('#historial').DataTable( {
      "language": {
            "url": base_url+"js/Spanish.json",
        }

    } );
} );
</script>


