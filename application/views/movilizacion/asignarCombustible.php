	<div class="panel panel-default">
	  <div class="panel-heading">CONTROL COMBUSTIBLE</div>
	  <div class="panel-body">
	  	
	<form id="orden_combustible" action="<?php echo base_url();?>movilizacion/save_ordenesCombustible" method="POST" class="form-horizontal" >	
		
		<div class="form-group">
			 <label class="col-md-3 control-label">Fecha:</label>
			    <div class="col-md-7">
                       <input type="text" data-date-format="mm/dd/yyyy" name='fecha' id='fecha' class="form-control" size='10' placeholder="dd/mm/aaaa" required/>
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
	  	 
			 <label class="col-md-3 control-label">Vale por</label>
			   <div class="col-md-7">
			  <?php foreach ($nombreCombustible->result() as $itemcombus ) {?>
			   			<input type="text" name="galones" value="<?php echo $valorAsignado; ?>" class="form-control" onkeypress="return validar(event)" required/> Galones de <?php echo $itemcombus->nombre_gasolina; ?>
						<input type="hidden" value="<?php echo $itemcombus->cod_gasolina; ?>" name="cod_gasolina">
			   		<?php } ?>
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
		<?php foreach ($datosMovi->result() as $itemv) {?>
		<div class="form-group">
			 <label class="col-md-3 control-label">Con cargo a la cuenta de:</label>
			   <div class="col-md-7">
			   	<input type="text" name="nombres"  value="<?php echo $itemv->mnombres; ?>" class="form-control" size="50" readonly />
				<input type="hidden" value="<?php echo $itemv->mcod_chofer;?>" name="cod_chofer">

		   </div>

		</div>	   
		<div class="form-group">
			 <label class="col-md-3 control-label">Ruta</label>
			   <div class="col-md-7">
			   	 <input type="text" name='ruta' id='ruta' value="<?php echo $itemv->mdestino." ".$itemv->mmotivo;?>"  class="form-control" readonly/>
			   </div>
		</div>
				<div class="form-group">
			 <label class="col-md-3 control-label">Maquinaria/Veh&iacute;culo:</label>
			   <div class="col-md-7">
			   	<input type="text" name="vehiculo" readonly value="<?php echo $itemv->tipo." ".$itemv->mmarca.",". $itemv->mnum_vehiculo;?>" class="form-control" size="50" />
						<input type="hidden" value="<?php echo $itemv->mcod_vehiculo; ?>" name="cod_vehiculo">

			   </div>
		</div>

		<div class="form-group">
			 <label class="col-md-3 control-label">Kilometraje Recorrido:</label>
			   <div class="col-md-7">
			   		<input type="text" value="<?php echo $itemv->mkilometraje_recorrido; ?>" name="kilometraje_recorrido" id="kilometraje_recorrido" class="form-control">

			   </div>
		</div>
		<div class="form-group">
			 <label class="col-md-3 control-label">Km salida:</label>
			   <div class="col-md-7">
					<div class="input-group">
			   		 <input type="text" name="km_salida" id="km_salida" class="form-control" onkeypress="return validar(event)"required />
				         <span class="input-group-btn"><button class="btn btn-default" type="button" id="btnKmRetorno" name="btnKmRetorno" onclick='kilometraje_retorno("<?php echo $itemv->mkilometraje_recorrido; ?>");'>Calcular</button></span>
					   </div>
			   </div>
		</div>
		<div class="form-group">
			 <label class="col-md-3 control-label">Km retorno:</label>
			   <div class="col-md-7">
					<input type="text" name="km_retorno" class="form-control" id="km_retorno" onkeypress="return validar(event)"  onmouseup='kilometraje_retorno("<?php echo $itemv->mkilometraje_recorrido; ?>");' readonly/>
			   </div>
		</div>
		<div class="form-group">
			 <label class="col-md-3 control-label">Hora salida:</label>
			   <div class="col-md-7">
					<input type="text" name="hora_salida" class="form-control" value="<?php echo $itemv->mhora_salida; ?>" placeholder="ej:15:30" />
			   </div>
		</div>
		<div class="form-group">
			 <label class="col-md-3 control-label">Hora retorno:</label>
			   <div class="col-md-7">
					<input type="text" name="hora_retorno" class="form-control" value="<?php echo $itemv->mhora_retorno;?>" placeholder="ej:18:00" />
			   </div>
		</div>
		<?php } ?>
		<div class="form-group">
			 <div class="col-sm-offset-3 col-sm-10">
			 	 <input type="hidden" value="<?php echo $codigoMovilizacion; ?>" name="cod_movilizacion">
			        <input type="submit" value="Guardar" class="btn btn-primary" id="guardar" name="guardar" >
			 </div>
		</div>
			
		</form>
		<div  id="imprimir" class="col-sm-offset-6 col-sm-10"></div>
	</div>
	</div>

<script type="text/javascript">
	$(document).ready(function(){
		
		var km_retorno= parseInt($('#km_salida').val()) + parseInt($('#kilometraje_recorrido').val());
		document.getElementById("km_retorno").value=km_retorno;

		$("#orden_combustible").submit(function(){
			
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

</script>


<script>
$('#fecha').datepicker();
</script>



