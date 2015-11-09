<div class="panel panel-default">
  <div class="panel-heading">EDITAR TIPO VEHICULO</div>
  <div class="panel-body">

<?php foreach ($tipo_vehiculo->result() as $key) {?>
  

<form  id ='tipo_vehiculo'action="administracion/update_tipoVehiculo" method="post">
 <table class='table'>
    <tr>
       <td align='left'><label>Nombre tipo</label>
          <input type='text' name='nombre_tipo' id='nombre_tipo' value='<?php echo $key->nombre_tipo;?>' class="form-control"  required/></td>
    </tr>
    <tr>
         <td align='left' colspan='3'><label>Descripcion:</label>
          <input type='text' name='descripcion' id='descripcion' value='<?php echo $key->desc_tipo;?>' class="form-control"  required/></td>
    </tr>
    <tr>
        <td align='left'><label>Tipo Vehiculo </label>  
        <select id="vehi_tipo" name ='vehi_tipo'class="form-control">

            <?php foreach ($vehi_tipo->result() as $item) {   ?>
              <option value='<?php echo $item->id_veh_tipo;  ?>' ><?php echo $item->tipo;?></option><?php } ?>
          </select></td>
      
      <tr><td colspan='4' align='center'>
        <input type='text' name='cod_tipo' value='<?php echo $cod_tipo; ?>'/>
        <input type="submit" value='Guardar'class="btn btn-primary" id="guardar" name="guardar" /></td></tr>
</table>
</form>
<?php }?>
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
     return false;
    });
      
  });
  

</script>