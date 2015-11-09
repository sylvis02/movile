<div id="contenido" style="width:80%; margin:auto;">
<div class="panel panel-default">
<div class="panel-heading">VEHICULOS Y CHOFERES</div>
 <table class="table table-bordered table-striped" id="vehiculo_chofer">
      <thead>
  			<tr>
        			<th><div align='center'><b>NÚMERO</b></div></th>
  				<th><div align='center'><b>TIPO</b></div></td>
  				<th><div align='center'><b>MARCA</b></div></td>
          			<th><div align='center'><b>PLACA</b></div></td>
          			<th><div align='center'><b>CONDICIÓN</b></div></td>
          			<th><div align='center'><b>CHOFER</b></div></td>
          			<th><div align='center'><b>VISUALIZAR</b></div></td>
  			</tr>
  		</thead>
  		<tbody><?php 
  			foreach ($datos as $item ) {?>
  				<tr>
            <td><div align='center'><?php echo $item->num_vehiculo;?></div></td>
  					<td><div align='center'><?php echo $item->tipo;?></div></td>
  					<td><div align='center'><?php echo $item->marca;?></div></td>
            <td><div align='center'><?php echo $item->placa;?></div></td>
            <td><div align='center'><?php echo $item->condicion_real;?></div></td><?php   
              if($item->asignado_chof=='0'){?>
                <td ><div align='center'><a data-toggle="tooltip" data-original-title="Asignar Chofer" onclick="anadir_chofer(<?php echo $item->cod_vehiculo;?> );" class="btn btn-default"><b>+</a></div></td>
                <td></td>
               <?php } else {?>
                <td><div align='center'><?php echo $item->nombres;?> <a data-toggle="tooltip" data-original-title="Elimnar asignación" onclick='eliminar(<?php echo $item->cod_vehiculo;?>);'><i class='glyphicon glyphicon-remove'></i></a></div></td>
                <td><div align='center'><a data-toggle="tooltip" data-original-title="Visualizar"  onclick='visualizar(<?php echo $item->cod_vehiculo;?>);'><i class='glyphicon glyphicon-search'></i></a></div></td>  
         <?php }?>
        </tr>
        <?php } ?>
  		</tbody>	
  	</table>





</div>



<script type='text/javascript'>

function anadir_chofer(cod_veh){

        $('#contenido').html('');
        $('#contenido').load(base_url+'administracion/asignar_chofer/'+cod_veh);
      
}
function visualizar(cod_veh){
       $('#contenido').load(base_url+'administracion/visualizar_asignar_chofer/'+cod_veh);
}
function eliminar(cod_veh){

  jConfirm('Desea eliminar este proceso?', 'Gestión Vehicular', function(r) {
   if(r==true){
      $.post(base_url+'administracion/eliminar_asignar_chofer',{
      'cod_veh':cod_veh},
        function(data){
           location.href=base_url+'administracion/listadoVehiculos_conductores';
        });
     }
  });
    
}

</script>



    
<script type="text/javascript">
  $(document).ready(function() {
    $('#vehiculo_chofer').DataTable( {
      "language": {
            "url": base_url+"js/Spanish.json",
        }

    } );
} );
</script>


