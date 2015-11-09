<div id="contenido" style="width:80%; margin:auto;">   
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="col-md-4"> COMBUSTIBLE</div>
             <ul class="nav navbar-nav navbar-right">
               <a  href="#" onClick='anadir_combustible();' class='btn btn-primary btn-xs'><b>+ Añadir</b></a>

            </ul>
        </div>
      </div>

    <table border="0" align="center" id='seccion'  class="table table-striped table-bordered" >
      <thead>
        <tr>
          <th>NOMBRE GASOLINA</th>
          <th>PRECIO</th>
          <th colspan='2' ><div align="center">CONTROLES</div></th>
        </tr>
      <thead>
      <tbody>
     
      <?php foreach ($adminisCombu->result() as $administracionCom) {
      ?>
      <tr>
        <td><?php echo $administracionCom->nombre_gasolina; ?></td>
        <td><?php echo $administracionCom->precio; ?></td>
        <td><div align="center"><a  href="#"  data-toggle="tooltip" data-original-title="Editar" onClick='actualizarCombus(<?php echo $administracionCom->cod_gasolina;?>);'><i class="glyphicon glyphicon-edit"></i></a></div></td>
        <td><div align="center"><a  href="#"  data-toggle="tooltip" data-original-title="Eliminar" onClick='eliminarCombus(<?php echo $administracionCom->cod_gasolina;?>);'><i class="glyphicon glyphicon-remove"></i></a></div></td>
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

function eliminarCombus(cod_gasolina_combus){
    jConfirm('Desea eliminar este proceso?', 'Gestión Vehicular', function(r) {
      if(r==true){
         $.post(base_url+'administracion/eliminar_combustible',
        {'codigo': cod_gasolina_combus}, 
        function(data){ 
        location.href=base_url+'administracion/ListCombustibles';
        });
      }
   });

    
}
function actualizarCombus(cod_gasolina_combus){

$.post(base_url+'administracion/actualizar_combustible',
     {'codigo': cod_gasolina_combus}, 
      function(data){ 
      $('#contenido').html(data);
        });

   
}
function anadir_combustible(){

  $('#contenido').html('');
  $('#contenido').load(base_url+'administracion/insertar_combustibles');

}


</script>



