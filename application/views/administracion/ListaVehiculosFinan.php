<div id="contenido" style="width:80%; margin:auto;">      
  
   <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-4">REGISTRAR VEHICULO</div>
              <ul class="nav navbar-nav navbar-right"> 
	      <a  href="#" onClick="anadir_Reg_Vehiculo();" class="btn btn-primary btn-xs"><b>+ Añadir</b></a>
              <a  href="#" onClick="exportar_vehiculos();" class='btn btn-primary btn-xs'><b>Exportar a excel</b></a> </ul>

          </div>
</div>
    

      <table  class="table table-striped table-bordered" id='vehiculos'  >
        <thead>
          <tr>
            <th>TIPO</th>
            <th>VEHICULO</th>
            <th>MOTOR</th>
            <th>CHASIS</th>
            <th>COLOR</th>
            <th><div align="center">ACTUALIZAR</div></th>
	    <th><div align="center">ELIMINAR</div></th>
          </tr>
        </thead>
        <tbody>
  <?php   if ($placa_bd2){
		foreach ($recoge as $reg_vehiculo) {
            		?>
					<tr>
					  <td><?php echo $reg_vehiculo->tipo; ?>&nbsp;</td>
					  <td><?php echo $reg_vehiculo->marca." ".$reg_vehiculo->modelo." ".$reg_vehiculo->placa; ?>&nbsp;</td>
					  <td><?php echo $reg_vehiculo->motor; ?>&nbsp;</td>
					  <td><?php echo $reg_vehiculo->chasis; ?>&nbsp;</td>
					  <td><?php echo $reg_vehiculo->color; ?>&nbsp;</td>
					  <td><div align="center"><a  href="#" onClick="actualizarReg_Vehiculo(<?php echo $reg_vehiculo->cod_vehiculo;?>);"><i class="glyphicon glyphicon-edit"></i></a></div></td>
					  <td><div align="center"><a  href="#" onClick="eliminarReg_Vehiculo(<?php echo $reg_vehiculo->cod_vehiculo;?>);"><i class="glyphicon glyphicon-remove"></i></a></div></td>
  
  					</tr>
  <?php } }else{?><tr><td colspan='6'>No se encontraron Resultados</td></tr><?php } ?>
      </tbody>
    </table>

    </div>
<script type="text/javascript">

function eliminarReg_Vehiculo(cod_vehiculo){
   jConfirm('Desea eliminar este proceso?', 'Gestión Vehicular', function(r) {
      if(r==true){
      $.post(base_url+'administracion/eliminar_reg_vehiculo',
       {'codigo': cod_vehiculo}, 
        function(data){ 
        location.href=base_url+"administracion/listaVehiculosFinan";
          });
       }
    });


}
function actualizarReg_Vehiculo(cod_vehiculo){

   $.post(base_url+'administracion/actualizar_reg_vehiculo',
     {'codigoVehiculo': cod_vehiculo}, 
      function(data){ 
      $('#contenido').html(data);
        });
}
function anadir_Reg_Vehiculo(){
  $('#contenido').html('');
  $('#contenido').load(base_url+'administracion/insertar_reg_vehiculo');

}
function exportar_vehiculos(){
	
	document.location=base_url+'administracion/reportes_excel_vehiculos';

} 

</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#vehiculos').DataTable( {
      "language": {
            "url": base_url+"js/Spanish.json",
        }

    } );
} );

</script>
