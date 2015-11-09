<div class="panel panel-default">
  <div class="panel-heading">Actualizar Vehiculos </div>
  <div class="panel-body">
  	<?php foreach ($actualizar_conductor1->result() as $actualizar_conductor ) {?>  
  	
  <form id="actualizar_conductor" action="<?php echo base_url();?>administracion/actualizar_conductor_final" method="post">
	<table  class="table">	
		<input type='hidden' id="codigoChofer" name="codigoChofer" value='<?php echo $actualizar_conductor->cod_chofer;?>' class="form-control" readonly/></b></td>			
					
				<tr>
					<td>CEDULA</td>	
					<td><b><input type='text' value='<?php echo $actualizar_conductor->cedula;?>' class="form-control" readonly/></b></td>			
					<td>NOMBRES Y APELLIDOS</td>
					<td><b><input type='text' value='<?php echo $actualizar_conductor->nombres;?>' class="form-control" readonly/></b></td>
				</tr>
				<tr>
					<td>DEPARTAMENTO</td>
					<td><b>
						<?php 
						if($actualizar_conductor->departamento!=null){?>
						<input name="departamento" id="departamento" type='text' value='<?php echo $actualizar_conductor->departamento;?>' class="form-control"/></b></td>
						<?php
					}else{?>
						<input name="departamento" id="departamento" type='text' value='' class="form-control" required/></b></td>
					<?php
					}?>
					<td>CARGO</td>	
					<td><b><input type='text' value='<?php echo $actualizar_conductor->denominacion_cargo;?>' class="form-control" readonly/></b></td>
				</tr>
				<tr>
					<td>CORREO</td>	
					<td><b>
						<?php 
						if($actualizar_conductor->correo!=null){?>
						<input name="correo" id="correo" type='text' value='<?php echo $actualizar_conductor->correo;?>' class="form-control"/></b></td>			
						<?php
						}else{?>
						<input name="correo" id="correo" type='text' value='' class="form-control" required/></b></td>			
						<?php
						}?>
				</tr>
				<tr>	
					<td>TELEFONO</td>	
					<td><b><input name="telefono" id="telefono" type='text' value='<?php echo $actualizar_conductor->telefono;?>' onkeypress="return validar(event);" class="form-control" required/></b></td>
					<td>LICENCIA</td>	
					<td><b><select name="licencia" id="licencia" class="form-control" required >	
					<option value="0">--SELECCIONAR--</option>		
					<?php 
					foreach ($licencia->result() as $licencia1){
						if ($actualizar_conductor->nombre_licencia==$licencia1->nombre_licencia){?>
						 <option value="<?php echo $licencia1->cod_licencia; ?>" selected><?php echo $licencia1->nombre_licencia; ?> </option> 
						<?php 
						}else {?>
						 
						 <option value="<?php echo $licencia1->cod_licencia; ?>" ><?php echo $licencia1->nombre_licencia; ?> </option> 

						<?php 
						}
					} ?>
            		</select></b></td>
					
				</tr>
				<tr>
					<td>NOVEDADES</td>
					<td colspan='3'><b><textarea class='form-control' name='novedades' id='novedades' cols='60' rows='5' ><?php echo $actualizar_conductor->novedades;?></textarea></b></td>
        		</tr>	
        			<td>NOMBRE DEL BANCO</td>	
					<td><b><input name="nombre_banco" id="nombre_banco" type='text' value='<?php echo $actualizar_conductor->bancoun;?>' class="form-control" required/></b></td>
					<td>TIPO DE CUENTA</td>
					<td><b><select name="tipo_cuenta" id="tipo_cuenta" class="form-control" >
						<?php 
						if($actualizar_conductor->tipocuenta=='AHORROS'){?>
						 <option value="AHORROS" selected>AHORROS</option> 
						 <option value="CORRIENTE">CORRIENTE</option> 	

						 <?php
						 }else if($actualizar_conductor->tipocuenta=='CORRIENTE'){?>

						 	<option value="CORRIENTE" selected>CORRIENTE</option>
						 	<option value="AHORROS">AHORROS</option>
						<?php
						}else{?>
							<option value="" selected>--SELECCIONAR--</option>
							<option value="AHORROS">AHORROS</option>
							<option value="CORRIENTE">CORRIENTE</option>
						<?php
						} ?>
            			</select></b></td>
				</tr>
				<tr>
					<td>NUMERO DE CUENTA</td>
					<td><b><input name="numero_cuenta" id="numero_cuenta" type='text' onkeypress="return validar(event);" value='<?php echo $actualizar_conductor->numcuenta;?>' class="form-control" required/></b></td>
				</tr>       
				<tr>
					<td colspan='4' align='center'><input type="submit" value='Guardar'class="btn btn-primary" id="guardar" name="guardar" ></td>
				</tr>
		
		</table>
	
		</form>
			<?php } ?>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
		$("#actualizar_conductor").submit(function(){

			$.ajax({
				url:  $(this).attr("action"),
				type: $(this).attr("method"),
				data: $(this).serialize(),
				success: function(data) 
				{ // Aquí desaparece la imagen ya que estamos reemplazando todo el HTML del contenido de la div. 
      				jAlert('Se ha guardo corrrectamente', 'Gestión Vehicular', function(r){
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


