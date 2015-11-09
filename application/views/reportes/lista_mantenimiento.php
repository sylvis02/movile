 <table  id="mantenimiento"  class='table table-bordered table-striped' data-toggle="table"  style="font-size:11px">
        <thead>
          <tr style="font-size:11px">
              <th>FECHA</th>
              <th>DESPERFECTOS TRABAJO REALIZADO</th>
              <th>MOTIVO</th>
              <th>KILOMETRAJE</th>
              <th>VEHICULO</th>
              <th>CONDUCTOR</th>
              <th>REPUESTOS</th>
	      <th>IMPRIMIR</th>
          </tr>
        </thead>
        <tbody id='reporte_mantenimiento'>
          <?php if ($cmantenimiento){ foreach ($cmantenimiento as $row) {?>
            <tr>
              <td ><?php echo  $row->fecha; ?></td>
              <td><?php echo  $row->detalle; ?></td>
              <td><?php echo  $row->motivo; ?></td>
              <td><?php echo  $row->kilometraje; ?></td>
              <td><?php echo  $row->tipo."/".$row->vehiculo."/".$row->num_vehiculo; ?></td>
              <td><?php echo  $row->nombres; ?></td>
	      <td><a data-toggle="tooltip" data-original-title="Visualizar Repuestos" onclick="repuestos_vizualizar(<?php echo $row->cod_mantenimiento;?>)"><i class="glyphicon glyphicon-search"></i></a>
		<form name='rep' id='form2'class='rep' action='<?php echo base_url();?>imprimir/nota_repuestos' method='post'>
		<input type='hidden' name='cod_mantenimientoImprimir' id='cod_mantenimientoImprimir' value='<?php echo $row->cod_mantenimiento; ?>'>
  	      </form><button type="submit" form="form2" value="Submit" class='btn btn-default'><i class="glyphicon glyphicon-print"></i></button> </td>
              <td><form name='rep' class='rep' id='form1' action='<?php echo base_url();?>imprimir/imprimirsolicitud_mantenimiento' method='post'>
  			<input type='hidden' name='cod_mantenimientoImprimir' id='cod_mantenimientoImprimir' value='<?php echo $row->cod_mantenimiento; ?>'>
  			</form><button type="submit" form="form1" value="Submit" class='btn btn-default'><i class="glyphicon glyphicon-print"></i></button>
			
		</td>
		</tr>

        
          <?php  } }else{?><tr><td colspan='7'>No se encontraron Resultados</td></tr> <?php } ?>
          
        </tbody>
      </table>


<script type="text/javascript">

  $(document).ready(function() {
    $('#mantenimiento').DataTable( {
      "language": {
            "url": base_url+"js/Spanish.json",
        },
 
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false

    } );
} );
</script>

