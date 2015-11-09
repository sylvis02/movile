<div id="contenido"  style="width:80%; margin:auto">
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="row">
        <div class="col-md-3">ADMINISTRACIÓN DE USUARIOS</div>
             <ul class="nav navbar-nav navbar-right">
                <a  href="#" onClick='agregarNuevo();' class='btn btn-primary btn-xs'><b>+ Añadir</b></a>
                <a  href="<?php echo base_url();?>administracion/ListaActividadesUsuarios" class='btn btn-info btn-xs'><b>+ Actividades Usuarios</b></a>
              </ul>
      </div>
  </div>

    <table class="table table-bordered table-striped">
    	<thead class='thead'>
       	<tr>
    			<th><div align='center'><b>NOMBRE USUARIO</b></div></th>
    			<th><div align='center'><b>NOMBRE LOGIN</b></div></th>
    			<th colspan='2'><div align='center'><b>ACCIONES</b></div></th>
    		</tr>
    	</thead>
    	<tbody><?php 
    		foreach ($usuarios->result() as $item ) {?>
    			<tr>
    				<td><?php echo $item->nombre_usu;?></td>
    				<td><?php echo $item->login_usu;?></td>
    				<td><div align='center'><a  href="#" data-toggle="tooltip" data-original-title="Editar" onClick='actualizarUsu(<?php echo $item->id_uduario;?>);'><i class="glyphicon glyphicon-edit"></i></a></div></td>
  				<td><div align='center'><a  href="#" data-toggle="tooltip" data-original-title="Eliminar" onClick='eliminarUsu(<?php echo $item->id_uduario;?>);'><i class="glyphicon glyphicon-remove"></i></a></div></td>
  			   </tr>
          <?php } ?>
    	</tbody>	
    </table>
  </div>
</div>


</body>

</html>

<script type="text/javascript">
function agregarNuevo(){
        $('#contenido').html('');
        $('#contenido').load(base_url+'administracion/agregarUsuario');
      
}

function listar(){
        $('#contenido').html('');
        location.href=base_url+'administracion/ListaActividadesUsuarios';
      
}
function actualizarUsu(cod_usuario){
        $('#contenido').html('');
        $('#contenido').load(base_url+'administracion/actu_usuario_view/'+cod_usuario);

}
function eliminarUsu(cod_usuario){

    jConfirm('Desea eliminar este proceso?', 'Gestión Vehicular', function(r) {
      if(r==true){
       $.post(base_url+'administracion/eliminarUsuario',
       {'codigo_usu': cod_usuario}, 
       function(data){ 
          location.href=base_url+'administracion/listadoUsuarios';
       });
     }
  });


}

</script>