<div class="panel panel-default">
  <div class="panel-heading">INSERTAR VEHICULOS </div>
  <div class="panel-body">

  
  <form action="<?php echo base_url();?>administracion/insertarFin_Reg_Vehiculo" method="post" id='insertar_vehiculo'  enctype="multipart/form-data">
  	 <table  class="table" >
			<tr>						
				<td  align="right" ><label>VEHICULO:</label></td>
			
			 	<td>   <select id="placaV" name="placaV" class="form-control" onclick="CargarDatosV();">
		   			<option value='SELECCIONE'>--SELECCIONE--</option>
				   	   <?php if ($vehiculos){ for ($i=0; $i <count($vehiculos); $i++) { ?>
				   			<option value="<?php echo $vehiculos[$i];?>"><?php echo $vehiculos[$i];?></option>
				   			<?php }}?>
				    </select>
        </td>
		 </tr>
				
  	</table>
 	  <table  width='100%' class="table" id="tableN" style='display:none'>
    <tr><td colspan='4'><div id="nuevos_datos">  </div> </td></tr>	
		  <tr>
	        <td>COMBUSTIBLE:</td>
          <td>
          <select name="combustible" id="combustible" class="form-control" required>
            <option value="">--SELECCIONE--</option>
            <?php foreach ($combustibledatos->result() as $combus) {?>
            <option value="<?php echo $combus->cod_gasolina;?>"><?php echo $combus->nombre_gasolina;?></option>
            <?php } ?>
          </select></td>
          <td>ESTADO PERTENENCIA:</td>
          <td><select name="estado_pertenencia" class="form-control" id="estado_pertenencia" required>
            <option value="">--SELECCIONE--</option>
            <?php foreach ($estado_actual->result() as $estado) {?>
            <option value="<?php echo $estado->cod_esta_act;?>"><?php echo $estado->descripcion;?></option>
            <?php } ?>
          </select></td>
        </tr>
        <tr>
          <td>NUM. VEHICULO:</td>
          <td><input name="num_vehiculo" id="num_vehiculo" class="form-control" type="text" value=""   required /></td>        
          <td >CASA COMERCIAL </td>
          <td><input type="text" name="casa_comercial" id="casa_comercial" class="form-control" value="" required /></td>
        </tr>
        <tr>
          <td>PAIS ORIGEN: </td>
          <td><input name="pais_origen" id="pais_origen" type="text" value="" class="form-control" required /></td>
          <td>TONELAJE:</td>
          <td><input name="tonelaje" id="tonelaje" type="text" class="form-control" onkeypress="return validarD(event);" value="" required /></td>
        </tr> 
        <tr>
          <td>CONSUMO DE COMBUSTIBLE:</td>
          <td><input name="rendimiento_galon" id="rendimiento_galon" class="form-control" type="text" onkeypress="return validar(event);" value="" required /> KM/GL</td>  
          <td>TIPO:</td>
          <td>
          <select name="tipo" id="tipo" class="form-control" required>
            <option value="">--SELECCIONE--</option>
            <?php foreach ($veh_tipo->result() as $veh_tipo1) {?>
              <option value="<?php echo $veh_tipo1->id_veh_tipo;?>"><?php echo $veh_tipo1->tipo;?></option>
            <?php }?>
          </select></td>   
        </tr> 
        <tr>
          <td>FECHA VENCIMIENTO SOAT: </td>
	  <td> <input class="form-control" data-date-format="mm/dd/yyyy" type="text" id="fecha_vencimiento_soat" name="fecha_vencimiento_soat" placeholder="dd/mm/aaaa"  required  /></td>

          <td>FECHA VENCIMIENTO MATRICULA: </td>
	 <td> <input class="form-control" data-date-format="mm/dd/yyyy" type="text" id="fecha_vencimiento_matricula" name="fecha_vencimiento_matricula" placeholder="dd/mm/aaaa"  required  /></td>

     
        </tr>
        <tr>   
          <td>NOTIFICACIONES TALLERES:</td>
          <td colspan='3'><textarea class='form-control' name='notificaciones_talleres' id='notificaciones_talleres' cols='60' rows='5'></textarea></td>
       
       </tr>
       
    
 
        <tr><td colspan='4' align='center'><input type="submit" value='Guardar'class="btn btn-primary" name="submit" ></td></tr>

      </table>
  
    </form>
			
</div>
</div>


<script type="text/javascript">

	$(document).ready(function(){

    $("#insertar_vehiculo").submit(function(){
       var formData = new FormData($(this)[0]);
      $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: formData,
            async: false, 
            success: function(data){
              jAlert('Se ha guardo corrrectamente', 'Gestión Vehicular', function(r){
                        if(r){
                          location.href=base_url+'administracion/listaVehiculosFinan';
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

<script type="text/javascript">
function CargarDatosV(){
 
	if(document.getElementById('placaV').value!="SELECCIONE"){
	$('#tableN').css("display","block"); 
   var id = $('#placaV').val();
    $.post(base_url+'administracion/buscarDatosenBienes',
    {'codigodatos': id}, 
    function(data){ $('#nuevos_datos').html(data);      
    });
  }else{
	$('#tableN').css("display","none"); 
  }
}
</script>
<script>
$('#fecha_vencimiento_soat').datepicker();

$('#fecha_vencimiento_matricula').datepicker();

</script>




