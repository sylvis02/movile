<div id="contenido" style="width:95%; margin:auto;">
	<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
	 	<div class="col-md-4"><b>REPORTE MOVILIZACIONES</b></div>
	  	<ul class="nav navbar-nav navbar-right">
		<a  href="#" onClick='exportar_excel();' class='btn btn-primary btn-sm ' style='display:none' id="movilizacionExcel" name="movilizacionExcel"><i class='glyphicon glyphicon-download'></i>Exportar Excel</a>
		</ul>
		</div>
		</div>
<div class="panel-body">
	<form id='busquedaMovi' action="<?php echo base_url();?>movilizacion/reporte_movilizacion_view_sescion" method='post'>
		<table class='table'>
			<tr>
				<td>
					<div class="form-group">
	        			<label for="fecha" class="col-sm-5 control-label">Fecha Desde</label>
			        	<div class="col-sm-9"> <input type="text" name='fecha_desde' class="form-control" id="fecha_desde" placeholder='dd/mm/aaaa' /></div>
		    			</div>
		    		</td>
		    		<td>
					    <div class="form-group">
					        <label for="fecha" class="col-sm-5 control-label">Fecha Hasta</label>
					       <div class="col-sm-9"> <input type="text" name='fecha_hasta' class="form-control" id="fecha_hasta" placeholder='dd/mm/aaaa'/></div>
					    </div>
					</td>
					<td>
					    <div class="form-group">
					        <label for="fecha" class="col-sm-8 control-label">Dirección Coordinación</label>
					       <div class="col-sm-9"> <select  name='departamento' class="form-control" >
					        	<option value='0'>--SELECCIONE--</option>
					        	<?php IF ($departamento) { foreach ($departamento->result() as $depa) {?>
					        		<option value='<?php echo $depa->departamento;?>'><?php echo $depa->departamento;?></option>
					        <?php }}?>
					        </select></div>
					    </div>
					</td>
				</tr>
				<tr>
					<td>
					    <div class="form-group">
					        <label for="fecha" class="col-sm-5 control-label">Funcionario </label>
					         <div class="col-sm-9"> <select  name='solicitante' class="form-control" >
					        	<option value='0'>--SELECCIONE--</option>
					        	<?php IF ($solicitante){foreach ($solicitante->result() as $soli) {?>
					        		<option value='<?php echo $soli->solicitante;?>'><?php echo $soli->solicitante;?></option>
					        		
					        	<?php }}?>
					        </select></div>
					    </div>
					</td>
					<td>
					    <div class="form-group">
					        <label for="fecha" class="col-sm-5 control-label">Conductor </label>
					          <div class="col-sm-9"><select  name='conductor' class="form-control" >
					        	<option value='0'>--SELECCIONE--</option>
					        	<?php IF ($conductor){foreach ($conductor->result() as $cond) {?>
					        		<option value='<?php echo $cond->cod_chofer;?>'><?php echo $cond->nombres;?></option>
					        		
					        <?php 	}}?>
					        </select></div>
					    </div>
					</td>
					<td>
					    <div class="form-group">
					        <label for="fecha" class="col-sm-5 control-label">Vehiculo </label>
					          <div class="col-sm-9"><select  name='vehiculo' class="form-control" >
					        	<option value='0'>--SELECCIONE--</option>
					        	<?php IF ($vehiculo){foreach ($vehiculo->result() as $vehi) {?>
					        		<option value='<?php echo $vehi->cod_vehiculo;?>'><?php echo $vehi->vehiculo;?></option>
					        		
					        	<?php }}?>
					        </select></div>
					    </div>
					</td>
				</tr>
				<tr align='center'>
					<td colspan='3'>
					    <div class="form-group">
					        <input type="submit" value="Generar Reporte" class="btn btn-primary" id="guardar" name="guardar" />
					    </div>
					</td>
				</tr>
		</table>
	</form>
	<div id ='tablaReporte'></div>
		

		</div>
	</div>
  </div>
</div>
</div>
</body>

</html>

<script type="text/javascript">

      $(document).on("click", "#pagination li a", function(e){
          e.preventDefault();
         var href = $(this).attr("href");
        // alert(href);
         $("#tablaReporte").load(href);
      }); 

</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#busquedaMovi").submit(function(){
			$.ajax({
				url:  $(this).attr("action"),
				type: $(this).attr("method"),
				data: $(this).serialize(),
				success: function(data) 
				{ 
      					$('#tablaReporte').html(data);
					$('#movilizacionExcel').css("display","block");
      				}
			});
			return false;
		});
			
	});
</script>

<script>
function exportar_excel(){
       
        document.location=base_url+'movilizacion/reporte_excel_movilizacion';
}
</script>
<script>
$('#fecha_desde').datepicker();
$('#fecha_hasta').datepicker()

</script>
