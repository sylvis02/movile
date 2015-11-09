<div class="panel panel-default">
  	<div class="panel-heading">INSERTAR CONDUCTORES </div>
  	<div class="panel-body"> 
	<form id="insertar_conductor" action="<?php echo base_url();?>administracion/insertar_conductor_final" method="post">
		<table class="table">
			<tr>						
				<td  align="right" ><label>CONDUCTOR:</label></td>			
       				 <td align="left"><select id="placaC" name="placaC" class="form-control" onclick="CargarDatosConductor();">
                			<option value='SELECCIONE'>----SELECCIONE----</option>
               				 <?php for ($i=0; $i <count($cedula); $i++) {  ?>                          
                 				 <option value='<?php echo $cedula[$i];?>'><?php echo "CEDULA: ".$cedula[$i];?></option>
               				 <?php
              				}?>                
           			 </select></td>
				<td ></td><td ></td><td ></td><td ></td>
			</tr>
			
		</table>			
 	 	<table class="table" id="tableN" style='display:none'>

    	  		<tr><td colspan='4'><div id="nuevos_datos">  </div> </td></tr>	
			<tr>
        			<td>TELEFONO:</td>
          			<td><input name="telefono" id="telefono" type="text" value="" onkeypress="return validar(event);"  class="form-control" required /></td>        
          			<td>LICENCIA:</td>
           			<td><select name="licencia" class="form-control" id="licencia" required>
            				<option value="">---SELECCIONAR---</option>
            				<?php foreach ($licencia->result() as $lic) {?>
           				 <option value="<?php echo $lic->cod_licencia;?>"><?php echo $lic->nombre_licencia;?></option>
           				<?php } ?>
         		 	</select></td>
        		</tr>
        		<tr>
        			<td>NOVEDADES:</td>
          			<td colspan='3'><textarea class='form-control' name='novedades' id='novedades' cols='60' rows='5'></textarea></td>
        		</tr>
        		<tr>
          			<td>NOMBRE DEL BANCO:</td>
         			<td><input name="nombre_banco" id="nombre_banco" type="text" value="" class="form-control" required /></td>        
          			<td>TIPO CUENTA:</td>
          			<td><select name="tipo_cuenta" class="form-control" id="tipo_cuenta" required>
           				<option value="">---SELECCIONAR---</option>
           				<option value="AHORROS">AHORROS</option>
           				<option value="CORRIENTE">CORRIENTE</option>
            			</select></td>
          		</tr>
          		<tr>
          			<td>NUMERO DE CUENTA:</td>
          			<td><input name="numero_cuenta" id="numero_cuenta" type="text" value="" class="form-control" onkeypress="return validar(event);"  required /></td>     
         		</tr>
         		<tr>
            			<td colspan='4' align='center'><input type="submit" value='Guardar'class="btn btn-primary" id="guardar" name="guardar" ></td>
          		</tr>
  
     	 	</table> 
	</form>		  		
	</div>
</div>
<script type="text/javascript">

	$(document).ready(function(){
		$("#insertar_conductor").submit(function(){

			$.ajax({
				url:  $(this).attr("action"),
				type: $(this).attr("method"),
				data: $(this).serialize(),
				success: function(data) 
				{ 
               				jAlert('Se ha guardo corrrectamente el procedimiento', 'Gestión Vehicular', function(r){
              				if(r){
                    				location.href=base_url+'administracion/cargar_conductores';
                    			}
               				 });
      				}
			});
			return false;
		});
			
	});
</script>

<script type="text/javascript">
function CargarDatosConductor(){
 
	if(document.getElementById('placaC').value!="SELECCIONE"){
		$('#tableN').css("display","block"); 
  		var id = $('#placaC').val();
    		$.post(base_url+'administracion/buscarDatosConductoresFulltime',
    		{'codigoConductor': id}, 
   		 function(data){ $('#nuevos_datos').html(data);      
   		 });
  	}else{
    	$('#tableN').css("display","none"); 
  	}
}
</script>



