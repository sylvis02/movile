
<div class="panel panel-default">
  <div class="panel-heading">Actualizar Vehiculos </div>
  <div class="panel-body">
  	<?php foreach ($actu_reg_vehiculo1->result() as $tipo_reg_vehiculo ) {?>  
  	
  <form id="actualizar_reg_vehiculo" action="<?php echo base_url();?>administracion/actualizar_vehiculo" method="post">
	<table  class="table">	
		<input type='hidden' id="codigoVehiculo" name="codigoVehiculo" value='<?php echo $tipo_reg_vehiculo->cod_vehiculo;?>' class="form-control" readonly/></b></td>			
					
				<tr>
					<td>PRECIO ADQUISION</td>	
					<td><b><input type='text' value='<?php echo $tipo_reg_vehiculo->precio_adq;?>' class="form-control" readonly/></b></td>			
					<td>CHASIS</td>
					<td><b><input type='text' value='<?php echo $tipo_reg_vehiculo->chasis;?>' class="form-control" readonly/></b></td>
				</tr>
				<tr>
					<td>MOTOR</td>
					<td><b><input type='text' value='<?php echo $tipo_reg_vehiculo->motor;?>' class="form-control" readonly/></b></td>
					<td>TIPO VEHICULO</td>	
					<td><b><input type='text' value='<?php echo $tipo_reg_vehiculo->tipo;?>' class="form-control" name="tipo_vehiculo" id="tipo_vehiculo"/></b></td>
				</tr>
				<tr>
					<td>PLACA</td>	
					<td><b><input type='text' value='<?php echo $tipo_reg_vehiculo->placa;?>' class="form-control" readonly/></b></td>			
					<td>AÑO FABRICACION</td>	
					<td><b><input type='text' value='<?php echo $tipo_reg_vehiculo->ano_fabricacion;?>' class="form-control" readonly/></b></td>
				</tr>
				<tr>
					<td>COLOR</td>	
					<td><b><input type='text' value='<?php echo $tipo_reg_vehiculo->color;?>' class="form-control" readonly/></b></td>
					
				</tr>
					<td>CODIGO DEL BIEN</td>
					<td><b><input type='text' value='<?php echo $tipo_reg_vehiculo->cod_vehiculo2;?>' class="form-control" readonly/></td></b></td>
					<td>CONDICION REAL</td>	
					<td><b><input type='text' value='<?php echo $tipo_reg_vehiculo->condicion_real;?>' class="form-control" readonly/></b></td>
				</tr>
				<tr>
					
					<td>MODELO</td>
					<td><b><input type='text' value='<?php echo $tipo_reg_vehiculo->modelo;?>' class="form-control" readonly/></b></td>
					<td>MARCA</td>
					<td><b><input type='text' value='<?php echo $tipo_reg_vehiculo->marca;?>' class="form-control" readonly/></b></td>
				</tr>
				<tr>
					
					<td>SERIE</td>
					<td><b><input type='text' value='<?php echo $tipo_reg_vehiculo->serie;?>' class="form-control" readonly/></b></td>
					<td>NOVEDADES</td>
					<td><b><input type='text' value='<?php echo $tipo_reg_vehiculo->novedades;?>' class="form-control" readonly/></b></td>
				</tr>
				<tr>
					<td>TIPO COMPROBANTE</td>
					<td><b><input type='text' value='<?php echo $tipo_reg_vehiculo->factura;?>' class="form-control" readonly/></b></td>
					<td>FECHA ADQUISICON</td>
					<td><b><input type='text' value='<?php echo $tipo_reg_vehiculo->fecha_adquisicion;?>' class="form-control" readonly/></b></td>
				</tr>
		
		
		<tr>						
			<td>COMBUSTIBLE</td>
   			<td>
            <select name="combustible" id="combustible" class="form-control" >
				
				<?php foreach ($combustibledatos->result() as $combus) {
            	if($tipo_reg_vehiculo->nombre_gasolina==$combus->nombre_gasolina){?>
						 <option value="<?php echo $combus->cod_gasolina; ?>" selected><?php echo $combus->nombre_gasolina; ?> </option> 
					<?php 
					}else {?>
						 <option value="<?php echo $combus->cod_gasolina; ?>" ><?php echo $combus->nombre_gasolina; ?> </option> 
					<?php 
					}
                } ?>
            </select></td>
							
			<td>ESTADO PERTENENCIA</td>
          	<td>
            <select name="estado_pertenencia" id="estado_pertenencia" class="form-control" >
				
				<?php 
				foreach ($estado_actual->result() as $estado){
					if ($tipo_reg_vehiculo->descripcion==$estado->descripcion){?>
						 <option value="<?php echo $estado->cod_esta_act; ?>" selected><?php echo $estado->descripcion; ?> </option> 
					<?php 
					}else {?>
						 <option value="<?php echo $estado->cod_esta_act; ?>" ><?php echo $estado->descripcion; ?> </option> 
					<?php 
					}
                } ?>
            </select></td>
		</tr>
		<tr>
			<td>NUMERO VEHICULO GPL</td>
			<td><input name="num_vehiculo" id="num_vehiculo" type="text" value="<?php echo $tipo_reg_vehiculo->num_vehiculo;?>" class="form-control" onkeypress="return validar(event);" required /></td>        
       
			<td>CASA COMERCIAL</td>
			<td><input name="casa_comercial" id="casa_comercial" type="text" value="<?php echo $tipo_reg_vehiculo->casa;?>"  class="form-control" required/></td>        
        </tr>
        <tr>
			<td>PAIS DE ORIGEN</td>
			<td><input name="pais_origen" id="pais_origen" type="text" value="<?php echo $tipo_reg_vehiculo->pais;?>"  class="form-control" required/></td>        
        
			<td>TONELAJE</td>
			<td><input name="tonelaje" id="tonelaje" type="text" value="<?php echo $tipo_reg_vehiculo->tonelaje;?>"  onkeypress="return validarD(event);"class="form-control" required/></td>        
			</tr><tr><td>CONSUMO DE COMBUSTIBLE</td>
          		<td><input name="rendimiento_galon" id="rendimiento_galon" class="form-control" type="text" onkeypress="return validar(event);" value=" <?php echo $tipo_reg_vehiculo->rendimiento_galon;?>" required /> KM/GL</td>          
</tr>
	
		<tr>						
			<td>TIPO</td>
          	<td><?php 
          	if(($tipo_reg_vehiculo->vehiculo_tipo)==null){ ?>
          				<select name="tipo" id="tipo" class="form-control">
						<option value=" " >--Seleccione--</option> 
					<?php 
					foreach ($veh_tipo->result() as $veh_tipo1) {?>
				
						 <option value="<?php echo $veh_tipo1->id_veh_tipo; ?>"><?php echo $veh_tipo1->tipo; ?> </option> 
				
					<?php
					}?>
				</select>
				<?php 
			} else {?>
          		<select name="tipo" id="tipo" class="form-control">
				
				<?php 
				foreach ($veh_tipo->result() as $veh_tipo1){
					if ($tipo_reg_vehiculo->vehiculo_tipo==$veh_tipo1->tipo){?>
						 <option value="<?php echo $veh_tipo1->id_veh_tipo; ?>" selected><?php echo $veh_tipo1->tipo; ?> </option> 
					<?php 
					}else {?>
					
						 <option value="<?php echo $veh_tipo1->id_veh_tipo; ?>" ><?php echo $veh_tipo1->tipo; ?> </option> 
					<?php 
					}
                } ?>
            </select><?php 
            }?></td>
        </tr>
        <tr> 
        <td>NOTIFICACIONES TALLERES</td>
			<td colspan="3"><textarea class='form-control' name='notificaciones_talleres' id='notificaciones_talleres' cols='60' rows='5'><?php echo $tipo_reg_vehiculo->notificaciones_talleres;?></textarea></td>
        </tr>
        <tr>		
			<td>FECHA VENCIMIENTO SOAT</td>
			<td> <input class="form-control" data-date-format="mm/dd/yyyy" type="text" id="fecha_vencimiento_soat" name="fecha_vencimiento_soat" value="<?php echo $tipo_reg_vehiculo->fecha_soat;?>"  required  /></td>        
       
			<td>FECHA VENCIMIENTO MATRICULA</td>
			<td> <input class="form-control" data-date-format="mm/dd/yyyy" type="text" id="fecha_vencimiento_matricula" name="fecha_vencimiento_matricula" value="<?php echo $tipo_reg_vehiculo->fecha_mat;?>"  required  /></td>        
			        
		</tr>
         
		<tr><td colspan='4' align='center'><input type="submit" value='Guardar'class="btn btn-primary" id="guardar" name="guardar" ></td></tr>
		
		</table>
	
		</form>
			<?php } ?>
	</div>
</div>
<script type="text/javascript">

	$(document).ready(function(){

    $("#actualizar_reg_vehiculo").submit(function(){
       var formData = new FormData($(this)[0]);
      $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: formData,
            async: false, 
            success: function(data){
              jAlert('Se ha actualtado corrrectamente', 'Gestión Vehicular', function(r){
                        if(r){
                          location.href= base_url+'administracion/ListaVehiculosFinan';
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
$('#fecha_vencimiento_soat').datepicker();


$('#fecha_vencimiento_matricula').datepicker();

</script>

