<div id="contenido" style="width:80%; margin:auto;">   
	<div class="row">
			<div class="col-xs-12">
			 	<ul class="nav navbar-nav navbar-right">
	                <a  href="#" onClick='agregarCombustible();' class='btn btn-primary btn-xs'><b> Agregar Combustible </b></a>
	         	</ul>
	     	</div>
     	</div>
     	<br>

    	<table id='OrdenCombustible' class='table table-bordered table-striped' align='center'>
			<thead>
				<tr align="center">
				  <th width="140">Motivo/Actividad</th>
			          <th width="140">Destino/Proyecto</th>
				  <th>Fecha Salida</th>
				  <th>Fecha Llegada</th>
			          <th width="140">Chofer/Operador</th>
				  <th width="140">Veh&iacute;culo/Maquinaria</th>
				  <th>Asignar Combustible</th>
				  <th>Eliminar Movilizacion</th>
			    </tr>
		    </thead>
		    <tbody>
		    	<?php if ($ordenesComusb){?>
		    	<?php foreach ($ordenesComusb->result() as $ordenCombus ) {?>
		    	<tr align="center">
			 	  <td><?php echo $ordenCombus->motivo; ?></td>
				  <td><?php echo $ordenCombus->destino; ?></td>
				  <td><?php echo $ordenCombus->fecha_salida; ?></td>     
				  <td><?php echo $ordenCombus->fecha_llegada; ?></td>
				  <td><?php echo $ordenCombus->nombres; ?></td>
				  <td><?php echo $ordenCombus->tipo." ".$ordenCombus->marca." #".$ordenCombus->num_vehiculo; ?></td>
				  <td><a name='asignar' onClick="url(<?php echo $ordenCombus->cod_movilizacion; ?>);" class="btn btn-default"><i class="glyphicon glyphicon-ok"></i></a> </td>
				  <td><a name='eliminar' onClick="eliminarMovilizacion(<?php echo $ordenCombus->cod_movilizacion; ?>);" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i></a> </td>		 	 
		    	</tr>

		    	<?php  } ?>
		    </tbody>
		   <?php } else { ?> <tr><td colspan='6'>No existen solicitudes para Asignar Combustible</td></tr><?php } ?>
		</table>
	
</div>

<script>
function url(dato){

	$('#contenido').html('');
	$('#contenido').load(base_url+'movilizacion/asignarCombustible/'+dato);
}

function eliminarMovilizacion(dato){
 jConfirm('Desea eliminar este proceso?', 'Gestión Vehicular', function(r) {
      if(r==true){
  
      $.post(base_url+'movilizacion/eliminarMovilizacion',
         {'codigo': dato}, 
          function(data){ 
          location.href=base_url+"movilizacion/aprobarCombustible";
          });
       }
      });

}

function agregarCombustible(){
	$('#contenido').html('');
        $('#contenido').load(base_url+'movilizacion/agregarCombustible');

}

</script>


<script type="text/javascript">
  $(document).ready(function() {
    $('#OrdenCombustible').DataTable( {
      "language": {
            "url": base_url+"js/Spanish.json",
        }

    } );
} );
</script>
