<div id="contenido" style="width:80%; margin:auto;">      
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-4"> REPORTE NOVEDADES</div>
               <ul class="nav navbar-nav navbar-right">
                 <a  href="#" onClick="exportar_novedades();" class='btn btn-primary btn-xs'><b>Exportar a excel</b></a>

              </ul>
          </div>
        </div>
      <table border="0" align="center" id='seccion' class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>VEHICULO</th>
          <th>NOVEDADES</th>
          <th>NOTIFICACIONES TALLERES</th>
  
        </tr>
      </thead><tbody>
        <?php foreach ($notificaciones_vehiculos as $notifi) {
         
         ?>
        <tr>
          <td ><?php echo $notifi->marca." - ".$notifi->modelo." - ".$notifi->placa;?>&nbsp;</td>
          <?php 
          if($notifi->novedades!=null){?>

          <td ><?php echo $notifi->novedades; ?>&nbsp;</td>
          <?php 
      	  }else{?>
      	   <td ><b>No registra novedad alguna</b>&nbsp;</td>
      	  <?php
      	  }
      	  if($notifi->notificaciones_talleres!=null){?>
          <td ><?php echo $notifi->notificaciones_talleres; ?>&nbsp;</td>
     	  <?php
     	   }else{?>
     	   <td><b>No registra notificaciones de talleres alguna</b>&nbsp;</td>
     	   <?php
     	   }?>
       
        </tr>
        <?php } ?>
        </tbody>
       
      </table>

     <div class="row">
   <div class="col-md-9 col-md-offset-3">
    <nav class="nav navbar-nav navbar-right">
      <ul class="pagination" id='pagination'>
        <?php echo $paginacion; ?>
      </ul>
  </nav>
   </div>
</div>

</div>
</div>
</body>

</html>
<script>
<script type="text/javascript">
$(document).ready(function(){ $('#seccion').DataTable(); }); 
 </script>
 <script>
function exportar_novedades(){
       
        document.location=base_url+'administracion/reporte_excel_novedades';
}
</script>
