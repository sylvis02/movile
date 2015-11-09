<div id="contenido" style="width:80%; margin:auto;">       
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="col-md-4"> GASOLINERAS</div>
              <ul class="nav navbar-nav navbar-right">
               <a  href="#" onClick='anadir_Gasolinera();' class='btn btn-primary btn-xs'><b>+ Añadir</b></a>

            </ul>
        </div>
      </div>
    <table border='0' align='center' id='seccion' class="table table-striped table-bordered" >
      
      <thead>
        <tr>
        <th>GASOLINERA</th>
        <td colspan='2'><div align="center">CONTROLES</div></td>
      </tr>
      <thead>
      <tbody>
      <?php foreach ($gasolineras_select->result() as $gasolineras) {
      ?>
      <tr>
        <td><?php echo $gasolineras->nombre_gasolinera; ?></td>
        <td><div align="center"><a  href="#"  data-toggle="tooltip" data-original-title="Editar" onClick='actualizarGasolinera(<?php echo $gasolineras->cod_gasolinera;?>);'><i class="glyphicon glyphicon-edit"></i></a></div></td>
        <td><div align="center"><a  href="#"  data-toggle="tooltip" data-original-title="Eliminar" onClick='eliminarGasolinera(<?php echo $gasolineras->cod_gasolinera;?>);'><i class="glyphicon glyphicon-remove"></i></a></div></td>
      </tr>
      <?php } ?>
      </tbody>
    </table>
    </div>
</div>
</div>

</body>

</html>
<script type="text/javascript">

function eliminarGasolinera(cod_gasolinera){

    jConfirm('Desea eliminar este proceso?', 'Gestión Vehicular', function(r) {
      if(r==true){
  
      $.post(base_url+'administracion/eliminar_gasolinera',
         {'codigo': cod_gasolinera}, 
          function(data){ 
          location.href=base_url+"administracion/listadoGasolineras";
            });
       }
      });
}
function actualizarGasolinera(cod_gasolinera){
   $.post(base_url+'administracion/actualizar_gasolinera',
     {'codigo': cod_gasolinera}, 
      function(data){ 
      $('#contenido').html(data);
        });
}
function anadir_Gasolinera(){
  $('#contenido').html('');
  $('#contenido').load(base_url+'administracion/insertar_gasolinera');

}


</script>
