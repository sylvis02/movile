<div class="panel panel-default">
  <div class="panel-heading">AGREGAR USUARIO</div>

  <div class="panel-body">
    <form id="actualizar" action='<?php echo base_url()?>administracion/actualizar_usuario' method='post' onsubmit="return validate()" class="form-horizontal">
        <tr><td>
      <?php foreach ($usuarios->result() as $item) {?>
 
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
              <div class="col-lg-10"><input type="text" name='nombre' class="form-control" id="inputEmail3"  value='<?php echo $item->nombre_usu;  ?>'placeholder="Alba Barriga" required/></div>
            </div>
           
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Usuario</label>
              <div class="col-lg-10"><input type="text" name='usuario' class="form-control" id="inputEmail3" value='<?php echo $item->login_usu;?>' placeholder="abarriga" required/></div>
            </div>
              
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
              <div class="col-lg-10"><input type="password" name='password' class="form-control" id="inputPassword3" placeholder="Password" required/></div>
            </div>
 	
	    <div class="form-group">
            	<div class="col-lg-offset-2 col-lg-10"><?php echo $menu_sub;?></div>
      	    </div>
      
    	   <div class="form-group">
		<div class="col-lg-offset-2 col-lg-10">
			<input type="submit" class="btn btn-default" value='Guardar' />
                        <input type="hidden" name="id_uduario" value="<?php echo $item->id_uduario;?>">
		</div>
	   </div>   
     
 <?php }?>
  </form>

</div>
</div>
<script type="text/javascript">

  $(document).ready(function(){

    $("#actualizar").submit(function(){
      $.ajax({
        url:  $(this).attr("action"),
        type: $(this).attr("method"),
        data: $(this).serialize(),
        success: function(data) 
        { 
          jAlert('Usuario Guardado con exito', 'Gestión Vehicular', function(r){
              if(r){
                 location.href=base_url+'administracion/listadoUsuarios';
               }

          });

        }
      });
       return false;
    });
      
  });
</script>



