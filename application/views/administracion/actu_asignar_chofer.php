<div class="panel panel-default">
  <div class="panel-heading">ACTUALIZAR CHOFER</div>
  <div class="panel-body">
  <?php foreach ($vehiculo->result() as $item) {?>
    
  <table class='table'>
    <tr>
      <td>Tipo</td>
      <td><b><?php echo $item->tipo;?></b></td>
      <td>Marca</td>
      <td><b><?php echo $item->marca;?></b></td>
      <td>Numero</td>
      <td><b><?php echo $item->num_vehiculo;?></b></td>
      <td>Placa</td>
      <td><b><?php echo $item->placa;?></b></td>
    </tr>
    <tr>
      <td>Combustible</td>
      <td><b><?php echo $item->nombre_gasolina;?></b></td>
      <td>Modelo</td>
      <td><b><?php echo $item->modelo;?></b></td>
      <td>Año de Fabricación</td>
      <td><b><?php echo $item->ano_fabricacion;?></b></td>
      <td>Condicion</td>
      <td><b><?php echo $item->condicion_real;?></b></td>
   
    </tr> 
  </table>
<?php }?>

<?php foreach ($asignar_vehiculo->result() as $key) {?>

<form id='actu_asignar_chofer1' action="<?php echo base_url();?>administracion/actu_asignar_choferfin" method='post' enctype="multipart/form-data">
    <table class='table '>
  	<tr>
        <td align='left'><label>Fecha:</label>
		<input type='text' name='fecha' id='fecha' value='<?php echo $key->fecha_asig; ?>' size='10'  class="form-control" readonly/>
		
    </td>
          <td align='left'><label>Chofer:</label>
           <input type='text' name='cod_chofer' id='cod_chofer' class="form-control"  value ="<?php echo $key->nombres;?>" disabled/></td>

      </tr>
   <tr>
           <td align='left'><label>Acta Actual:</label>
           
           <a  href="#" onClick="ExportarActas();"><i class='glyphicon glyphicon-download'>    </i><?php echo " ".$key->acta_entrega; ?></a>
                
</td>
      </tr>
      <tr>    

          <td align='left'> 
            <input id="userfile" name="userfile" type="file" value="" size="50" class="form-control" /></td></tr>
       <input type="hidden" name="url" id="url" value="<?php echo base_url()."pdfs/".$key->acta_entrega;?>"  />
      <tr>    
      <tr>    
          <td colspan='2' align='left'><label>Detalle:</label>
          <textarea class='form-control' name='descripcion' id='descripcion' cols='60' rows='5'><?php echo $key->descripcion;?></textarea></td>
      </tr>
      <tr>
         <td align='left'><label>Revisado y Confirmado:</label>
          <div class="checkbox">
       
            <?php if ($key->revision_asig =='1'){?>
             <label> <input type="checkbox" name='revision' value='1' checked> Si</label> 
        
        <label>  <input type="checkbox" name='revision' value='0'> No</label> 
            
        
          <?php   }else if($key->revision_asig =='0') {?>
        <label><input type="checkbox" name='revision' value='1'> Si </label>
              
       
        <label>   <input type="checkbox" name='revision' value='0' checked> No</label>
     <?php } ?>
      </div></td>
      </tr>
      <tr>
        <td align='center' colspan='2'>
          <input type='hidden' name="cod_vehiculo" value="<?php echo $cod_vehiculo;?>" />
          <input type="submit" class="btn btn-default" value='Guardar'/>
        </td>
      </tr> 
      
  	</table>
  </form>
  <?php }?>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){

    $("#actu_asignar_chofer1").submit(function(){
       var formData = new FormData($(this)[0]);
      $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: formData,
            async: false, 
            success: function(data){
            jAlert('Se ha guardo corrrectamente', 'Gestión Vehicular', function(r){
                if(r){
                     location.href=base_url+'administracion/listadoVehiculos_conductores';
                   }
                  });
      
            },
        cache: false,
        contentType: false,
        processData: false
      
      });
     return false;
    });
 });
</script>
<script type='text/javascript'>
function ExportarActas(){

         
        var recibe=document.getElementById("url").value;

            window.open(recibe, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=400, height=400");

       
}

</script>
