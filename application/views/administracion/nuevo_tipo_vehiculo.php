<div class="panel panel-default">
  <div class="panel-heading">AÑADIR TIPO VEHICULO</div>
  <div class="panel-body">
<form  id ='tipo_vehiculo'action="<?php echo base_url();?>administracion/save_tipoVehiculo" method="post">
 <table class='table'>
    <tr>
       <td align='left'><label>Nombre tipo</label>
          <input type='text' name='nombre_tipo' id='nombre_tipo' class="form-control"  required/></td>
    </tr>
    <tr>
         <td align='left' colspan='3'><label>Descripcion:</label>
          <input type='text' name='descripcion' id='descripcion' class="form-control"  required/></td>
    </tr>
    <tr>
        <td align='left'><label>Tipo Vehiculo </label>  
        <select id="vehi_tipo" name ='vehi_tipo'class="form-control">
            <?php foreach ($vehi_tipo->result() as $item) {   ?>
              <option value='<?php echo $item->id_veh_tipo; ?>'><?php echo $item->tipo;?></option><?php } ?>
          </select></td>
      
      <tr><td colspan='4' align='center'><input type="submit" value='Guardar'class="btn btn-primary" id="guardar" name="guardar" /></td></tr>
</table>
</form>
</div>
</div>
<script type="text/javascript">

  $(document).ready(function(){

    $("#tipo_vehiculo").submit(function(){
       $.ajax({
        url:  $(this).attr("action"),
        type: $(this).attr("method"),
        data: $(this).serialize(),
      
        success: function(data) 
        { // Aquí desaparece la imagen ya que estamos reemplazando todo el HTML del contenido de la div. 
  
              $('#contenido').load(base_url+'administracion/tipos_vehiculos');
        }
      });
     
    });
      
  });
  

</script>