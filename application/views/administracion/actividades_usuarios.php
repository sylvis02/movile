<div id ='contenido' style="width:80%; margin:auto;">
<div class="panel panel-default">
  <div class="panel-heading">
    <div class="row">
      <div class="col-md-4">ACTIVIDADES DE USUARIOS</div>
           <ul class="nav navbar-nav navbar-right">
             <a  href="#" onClick='Exportar();' class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-download"> <b>Exportar a Excel</b></i></a>

        </ul>
    </div>
  </div>
  <div class="panel-body">
    <form id="actividades" action="<?php echo base_url();?>administracion/guardarSescion" method='POST'>
    
          <div class="form-group">
              <label for="fecha" class="col-sm-2 control-label">Fecha Desde</label>
	      <div class="col-sm-3"><input type="text" name="fecha_desde" class="form-control" id="fecha_desde"  placeholder="dd/mm/aaaa" />
             </div>  
	  </div>

          <div class="form-group">
              <label for="fecha" class="col-sm-2 control-label">Fecha Hasta</label>
	      <div class="col-sm-3"><input type="text" name='fecha_hasta' class="form-control" id="fecha_hasta"  placeholder="dd/mm/aaaa" />
</div>
            </div>
        
         <div class="form-group">
              <input type="submit" value="Generar Reporte" class="btn btn-primary" id="guardar" name="guardar" />
          </div>
     
  </form>

	
		<div class="col-md-5 col-md-offset-3">
               	 	<span class="label label-default">D Eliminar</span>
			<span class="label label-primary">I Insertar</span>
			<span class="label label-success">U Actualizar</span>
		</div>
   

    <div id ="actividades_usuarios" class="form-group"></div>
    

</div>
</div>
</div>
</body>
</html>
<script type='text/javascript'>

      $(document).on("click", "#pagination li a", function(e){
          e.preventDefault();
         var href = $(this).attr("href");
      
         $("#actividades_usuarios").load(href);
      }); 

</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#actividades").submit(function(){
    //  alert($('#fecha_desde'));
      $.ajax({
        url:  $(this).attr("action"),
        type: $(this).attr("method"),
        data: $(this).serialize(),
        success: function(data) 
        { 

               $('#actividades_usuarios').html(data);
             
        }
      });
       return false;
    });
      
  });
</script>
<script type="text/javascript">
function Exportar(){
       
        document.location=base_url+'administracion/reporte_excel_actividadesusuarios';
}

</script>
<script>
$('#fecha_desde').datepicker();
$('#fecha_hasta').datepicker();


</script>
