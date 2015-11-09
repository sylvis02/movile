<div class="panel panel-default">
  <div class="panel-heading">ASIGNAR CHOFER</div>
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
<form id='asignar_chofer' action="<?php echo base_url();?>administracion/view_asignarChofer" method='post' enctype="multipart/form-data">
    <table class='table '>
  	<tr>
        	<td align='left'><label>Fecha:</label>
           		<input class="form-control" data-date-format="mm/dd/yyyy" type="text" id="fechaAsignar" name="fechaAsignar" placeholder="dd/mm/aaaa"  required  />
		</td>

        	<td align='left'><label>Chofer:</label>
           		<select id="cod_chofer" name="cod_chofer" class="form-control">
            			<option value='0'>--SELECCIONE--</option>
            			<?php foreach ($chofer->result() as $item ) {?>
              			<option value="<?php echo $item->cod_chofer;?>"><?php echo $item->nombres;?></option>
        			<?php }?>    
            		</select></td>
      </tr>
      <tr>    
          <td align='left'><label>Acta de Entrega:</label>
            <input id="userfile" name="userfile" type="file" value="" size="50" class="form-control" /></td>
      </tr>
      <tr>    
          <td colspan='2' align='left'><label>Detalle:</label>
      	    <textarea class='form-control' name='descripcion' id='descripcion' cols='60' rows='5'></textarea></td>
      </tr>
      <tr>
         <td align='left'><label>Revisado y Confirmado:</label>
        	 <div class="checkbox">
        		<label>
              			<input type="checkbox" name='revision' value='1'> Si
       			</label>
        		<label>
              			<input type="checkbox" name='revision' value='0'> No
        		</label>
      		</div></td>
      </tr>
      <tr>
      	<td align='center' colspan='2'>
          <input type='hidden' name='cod_vehiculo'value='<?php echo $cod_vehiculo;?>' ></input>
          <button type="submit" class="btn btn-default">Guardar</button>
        </td>
      </tr> 
      
   </table>
 </form>
 </div>
</div>
<script type="text/javascript">
$(document).ready(function(){

    $("#asignar_chofer").submit(function(){
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

<script>
$('#fechaAsignar').datepicker();

</script>



	
