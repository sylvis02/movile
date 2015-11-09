<div id="contenido" style="width:95%; margin:auto;">           
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-4"><b>REPORTE CONTROL DE MANTENIMIENTO</b></div>
              <ul class="nav navbar-nav navbar-right">
                  <a  href="#" onClick='ExportarControlMantenimiento();' class='btn btn-primary btn-sm ' style='display:none' id="mantenimientoExcel" name="mantenimientoExcel"><i class='glyphicon glyphicon-download'></i>Exportar Excel</a>
                </ul>
          </div>
        </div>
      <form id='busquedaControlMantenimiento' action='<?php echo base_url();?>talleres/busquedaReporteSesion' method='post'>
        <table class='table'>
		<tr>
              	<td><div class="form-group">
                    <label for="fecha" class="col-sm-5 control-label">Fecha Desde</label>
                    <div class="col-sm-9"><input type="text" name='fecha_desde' class="form-control" id="fecha_desde" placeholder='dd/mm/aaaa' /></div>
                </div></td>
                <td><div class="form-group">
                    <label for="fecha" class="col-sm-5 control-label">Fecha Hasta</label>
                    <div class="col-sm-9"><input type="text" name='fecha_hasta' class="form-control" id="fecha_hasta" placeholder='dd/mm/aaaa'/></div>
                </div></td>
		
                <td><div class="form-group">
                    <label for="fecha" class="col-sm-5 control-label">Tipo </label>
                    <div class="col-sm-10"><select  name='tipo' class="form-control" >
                        <option value='0'>--SELECCIONE--</option>
                        <option value='MANTENIMIENTO'>MANTENIMIENTO</option>
                        <option value='REPARACION'>REPARACION</option>
                    </select></div>
                </div><td></tr>
		<tr>
                <td>
		 <div class="form-group">
                    <label for="fecha" class="col-sm-5 control-label">Conductor </label>
                    <div class="col-sm-9"><select  name='conductor' class="form-control" >
                      <option value='0'>--SELECCIONE--</option>
                      
			<?php if ($conductor){ foreach ($conductor->result() as $cond) {?>
                        <option value='<?php echo $cond->cod_chofer;?>'><?php echo $cond->nombres;?></option>
                        
                    <?php   } }?>
                    </select></div>
                </div></td>
	        <td><div class="form-group">
                    <label for="fecha" class="col-sm-5 control-label">Vehiculo </label>
                    <div class="col-sm-9"><select  name='vehiculo' class="form-control" >
                      <option value='0'>--SELECCIONE--</option>
                      <?php if ($vehiculo){foreach ($vehiculo->result() as $vehi) {?>
                        <option value='<?php echo $vehi->cod_vehiculo;?>'><?php echo $vehi->vehiculo;?></option>
                        
                      <?php } }?>
                    </select></div>
                </div></td></tr>
            	<tr align='center'>
                	<td colspan='3'>
				
<div class="form-group"><input type="submit" value='Generar Reporte'class="btn btn-primary" id="guardar" name="guardar"/>
				</div>
			</td>
	
	        	
	        </tr></table>
      </form>

      <div id='control_mantenimiento'></div>
    
      </div>

</div>

</body>

</html>
<script type="text/javascript">
  $(document).ready(function(){
    $("#busquedaControlMantenimiento").submit(function(){
      $.ajax({
        url:  $(this).attr("action"),
        type: $(this).attr("method"),
        data: $(this).serialize(),
        success: function(data) 
        { 
              $('#control_mantenimiento').html(data);
 	$('#mantenimientoExcel').css("display","block");
            }
      });
        return false;
    });
      
  });
</script>

<script type='text/javascript'>
function ExportarControlMantenimiento(){
       
        document.location=base_url+'talleres/reporte_excel_controlMantenimiento';
}

function repuestos_vizualizar(cod_mantenimiento){
  
     $.post(base_url+'talleres/repuestos_vizualizar_reporte',
     {'codigo': cod_mantenimiento}, 
      function(data){ 
      $('#contenido').html(data);
        });
}
</script>


<script type='text/javascript'>

	$('#fecha_desde').datepicker();

	$('#fecha_hasta').datepicker();


</script>

   
