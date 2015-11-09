<div class="panel panel-default">
	  <div class="panel-heading">CONTROL COMBUSTIBLE</div>
	  <div class="panel-body">
	  	<form id="orden_combustible1" action="<?php echo base_url();?>movilizacion/anadir_nuevaOrdenCombustible" method="POST" class="form-horizontal" >	
		
		<div class="form-group">
			 <label class="col-md-3 control-label">Fecha:</label>
			    <div class="col-md-7">
                       <input type="text" data-date-format="mm/dd/yyyy" name='fecha' id='fecha' class="form-control" size='10' placeholder="dd/mm/aaaa"  onkeyUp="return ValNumero(this)" required/>
                 </div>
         </div>
         <div class="form-group">
			 <label class="col-md-3 control-label">Partida de Combustible</label>
			   <div class="col-md-7">
			   	 <select name="partida_combus" id="partida_combus" class="form-control" required >
						 <option value="">--Seleccione--</option>
				  		<?php  
						     if ($partidasCombustible){ foreach ($partidasCombustible->result() as $item ) { ?>
							 <option value="<?php echo $item->cuenta; ?>"> <?php echo $item->descripcion; ?> </option>
						<?php } } ?>
		   			  
					
				</select>

			 	</div>

		</div>
		<div class="form-group">
			 <label class="col-md-3 control-label">Ruta</label>
			   <div class="col-md-7">
			   	 	<textarea name='ruta' id ='ruta'cols='30' rows='4' class='form-control'> </textarea>
			   </div>
		</div>
		<div class="form-group">
				 <label class="col-md-3 control-label">Maquinaria/Veh&iacute;culo:</label>
			   		<div class="col-md-7">
						<select id='cod_vehiculo' name='cod_vehiculo' class='form-control' onchange='anadirConductor();' required>
            				<option value='0'>--SELECCIONE--</option> 
        					<?php if($datosVehiculo){
	  		 					foreach ($datosVehiculo->result() as $itemVehicu) {?>
              		  					<option value='<?php echo $itemVehicu->cod_vehiculo; ?>'><?php echo $itemVehicu->marca."/".$itemVehicu->placa."/";?></option>
               						<?php } } ?>
		
             			</select>
			   		</div>
		</div>
	  <div class="form-group">
	  	 
			 <label class="col-md-3 control-label">Vale por</label>
			   <div class="col-md-7">
			 
			   		<input type="text" name="galones"  class="form-control" onkeypress="return validar(event)" required/> Galones de 
			   		<div id="nombre_gasolina"></div>
				</div>

	 	</div>

	 	<div class="form-group">
			 <label class="col-md-3 control-label">Gasolinera:</label>
			   <div class="col-md-7">
			   	<select name="cod_gasolinera" id="cod_gasolinera" class="form-control" required>";
					<option value="">--Selecione--</option>
					<?php if($gasolinera){ foreach ($gasolinera->result() as $itemg) {?>
						<option value="<?php echo $itemg->cod_gasolinera?>"><?php echo $itemg->nombre_gasolinera; ?></option>
					<?php } }?>

					</select>
			   </div>
		</div>
		
		<div class="form-group">
			 <label class="col-md-3 control-label">Con cargo a la cuenta de:</label>
			   <div class="col-md-7">
				   <div class="panel-body" id='datosChofer'></div>
			   	  	
     					
        			</div>
		</div>	   
		
		<div class="form-group">
			 <label class="col-md-3 control-label">Km salida:</label>
			   <div class="col-md-7">
			   	<input type="text" name="km_salida" id="km_salida" class="form-control"  maxlength="6" onkeypress="return validar(event)" required />
			   </div>
		</div>

		<div class="form-group">
			 <div class="col-sm-offset-3 col-sm-10">
			 	 <input type="submit" value="Guardar" class="btn btn-primary" id="guardar" name="guardar" />
			 </div>
		</div>
				
		</form>
		<div  id="imprimir" class="col-sm-offset-6 col-sm-10"></div>
		
</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		
		$("#orden_combustible1").submit(function(){
			

			$.ajax({
				url:  $(this).attr("action"),
				type: $(this).attr("method"),
				data: $(this).serialize(),
				success: function(data) 
				{ 
					$('#imprimir').html(data);
      				 	jAlert('Se ha guardo corrrectamen su solicitud', 'Gestión Vehicular');
					
      			}
			});
				return false;
		});
			
	});
</script>

<script type="text/javascript">
	function kilometraje_retorno(km_recorrido){
		var km_retorno= parseInt($('#km_salida').val()) + parseInt(km_recorrido);
		document.getElementById("km_retorno").value=km_retorno;
	}

	function imprimir(codigo){
				
		document.location=base_url+'imprimir/orden_combustible/'+codigo;
	}

function anadirConductor(){

  var cod_vehiculo=$('#cod_vehiculo').val();

  $.post(base_url+'movilizacion/asignacionVehiculoChofer',
  {'codigo': cod_vehiculo}, 

      function(data){   
      			
      			$('#datosChofer').html(data); 
      			 document.getElementById('chofer_diferente').style.display='none';
      			 document.getElementById('datosChofer').style.display='block';
      
   });

   $.post(base_url+'movilizacion/asignarNombreGasolina',
    {'codigo': cod_vehiculo}, 
       function(data){ 
     
      		$('#nombre_gasolina').html(data);
     
    
    });
}

  function choferDif(){
      document.getElementById('chofer_diferente').style.display='block';
      $('#chofer_dif').load(base_url+'movilizacion/asignarChoferDiferent');      
      document.getElementById('datosChofer').style.display='none';
      return true;
     
  }

</script>

<script>
$('#fecha').datepicker();
</script>



