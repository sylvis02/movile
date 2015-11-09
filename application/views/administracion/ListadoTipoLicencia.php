<div id="contenido" style="width:80%; margin:auto;">      
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-4"> TIPO LICENCIAS</div>
                <ul class="nav navbar-nav navbar-right">
                 <a  href="#" onClick='anadir_Tlicencia();' class='btn btn-primary btn-xs'><b>+ Añadir</b></a>

              </ul>
          </div>
        </div>
      <table class="table table-striped table-bordered"  >
      	<thead>
      	<tr>
          <th>TIPO LICENCIA</th>
          <th colspan='2'><div align="center">CONTROLES</div></th>
        </tr>
        </thead>

        <tbody>
        <?php  foreach ($tipo_licencia1->result() as $tlicencia) { ?>
        <tr>
          <td ><?php echo $tlicencia->nombre_licencia; ?></td>
          <td ><div align="center"><a data-toggle="tooltip" data-original-title="Editar" href="#" onClick='actualizarTlicencia(<?php echo $tlicencia->cod_licencia;?>);'><i class="glyphicon glyphicon-edit"></i></a></div></td>
          <td ><div align="center"><a data-toggle="tooltip" data-original-title="Eliminar"href="#" onClick='eliminarTlicencia(<?php echo $tlicencia->cod_licencia;?>);'><i class="glyphicon glyphicon-remove"></i></a></div></td>
        
        </tr>
        <?php } ?>
      </tbody>
      </table>
      </div>
</div>
</div>
</div>
</body>

</html>
<script type="text/javascript">

function eliminarTlicencia(cod_licencia){
  jConfirm('Desea eliminar este proceso?', 'Gestión Vehicular', function(r) {
      if(r==true){
  
     $.post(base_url+'administracion/eliminar_Tlicencia',
     {'codigo': cod_licencia}, 
      function(data){ 
            location.href=base_url+"administracion/listadoTipoLicencia";
        });
      }
      });
}
function actualizarTlicencia(cod_licencia){
   $.post(base_url+'administracion/actualizar_Tlicencia',
     {'codigo': cod_licencia}, 
      function(data){ 
          $('#contenido').html(data);
        });
}
function anadir_Tlicencia(){
  $('#contenido').html('');
  $('#contenido').load(base_url+'administracion/insertar_Tlicencia');

}


</script>
