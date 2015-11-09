<div id="contenido" style="width:80%; margin:auto;">       
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="col-md-4"> ADM. CONDUCTORES</div>
             <ul class="nav navbar-nav navbar-right">
               <a  href="#" onClick="anadirConductor();" class="btn btn-primary btn-xs"><b>+ Añadir</b></a>
	       <a  href="#" onClick="exportar_conductores();" class='btn btn-primary btn-xs'><b>Exportar a excel</b></a>

            </ul>
        </div>
      </div>
<table class="table table-striped table-bordered" id='chofer' >
<thead>
  <tr>
	  <th><div align="center">CEDULA</div></th>
	  <th><div align="center">NOMBRES Y APELLIDOS</div></th>
	  <th><div align="center">CORREO</div></th>
	  <th><div align="center">CARGO</div></th>
	  <th><div align="center">ACTUALIZAR</div></th>
	  <th><div align="center">ELIMINAR</div></th>
  </tr>
</thead>
	<tbody>
  	<?php  

  	foreach ($conductores as $conductor) {

	   	?><tr>
		  <td><?php echo $conductor->cedula; ?></td>
		  <td><?php echo $conductor->nombres; ?></td>
		  <td><?php echo $conductor->correo; ?></td>
		  <td><?php echo $conductor->denominacion_cargo;?></td>
		  <td><div align="center"><a  data-toggle="tooltip" data-original-title="Editar" href="#" onClick="actualizarConductor(<?php echo $conductor->cod_chofer;?>);"><i class="glyphicon glyphicon-edit"></i></a></div></td>
		  <td><div align="center"><a  data-toggle="tooltip" data-original-title="Eliminar"href="#" onClick="eliminarCondutor(<?php echo $conductor->cod_chofer;?>);"><i class="glyphicon glyphicon-remove"></i></a></div></td>
		  
	  </tr>
	  <?php 
	     } ?>
</tbody>
</table>

</div>

<script type="text/javascript">

function eliminarCondutor(cod_chofer){
  jConfirm('Desea eliminar este proceso?', 'Administración', function(r) {
      if(r==true){
  
     $.post(base_url+'administracion/eliminar_Condutor',
     {'codigoChofer': cod_chofer}, 
      function(data){ 
     location.href= base_url+"administracion/cargar_conductores";
        });
 }
    });
}
function actualizarConductor(cod_chofer){
   $.post(base_url+'administracion/actualizar_Conductor',
     {'codigoChofer': cod_chofer}, 
      function(data){ 
      $('#contenido').html(data);
        });
}
function anadirConductor(){
  $('#contenido').html('');
  $('#contenido').load(base_url+'administracion/insertar_Conductor');

}

function exportar_conductores(){
	
   document.location=base_url+"administracion/reportes_excel_conductores";
} 

</script>



<script type="text/javascript">
 $(document).ready(function() {
    $('#chofer').DataTable( {
      "language": {
            "url": base_url+"js/Spanish.json",
        }

    } );
} );
</script>



