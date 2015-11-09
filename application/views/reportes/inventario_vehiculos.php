<div id="contenido" style="width:80%; margin:auto;">      
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-4"> REPORTE VEHICULO</div>
                <ul class="nav navbar-nav navbar-right">
                 <a  href="#" onClick="exportar_vehiculos();" class='btn btn-primary btn-xs'><b>Exportar a excel</b></a>

              </ul>
          </div>
        </div>

      <table   class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>TIPO</th>
          <th>MARCA</th>
          <th>Nº</th>
          <th>PLACA</th>
          <th>COMBUSTIBLE</th>
          <th>NOVEDADES COMSIÓN</th>
          <th>NOTIFICACIÓN</th>
          <th>CONDICIÓN</th>
         
        </tr>
      </thead><tbody>
        <?php 
      foreach ($vehiculo as $vehiculos) {
       ?>
        <tr>
          <td class="ITEMS_TABLA Estilo17"><?php echo $vehiculos->tipo;?>&nbsp;</td>
          <td class="ITEMS_TABLA Estilo17"><?php echo $vehiculos->marca; ?>&nbsp;</td>
          <td class="ITEMS_TABLA Estilo17"><?php echo $vehiculos->num_vehiculo; ?>&nbsp;</td>
          <td class="ITEMS_TABLA Estilo17"><?php echo $vehiculos->placa; ?>&nbsp;</td>
          <td class="ITEMS_TABLA Estilo17"><?php echo $vehiculos->nombre_gasolina;?>&nbsp;</td>
          <td class="ITEMS_TABLA Estilo17"><?php echo $vehiculos->novedades; ?>&nbsp;</td>
          <td class="ITEMS_TABLA Estilo17"><?php echo $vehiculos->notificaciones_talleres; ?>&nbsp;</td>
          <td class="ITEMS_TABLA Estilo17"><?php echo $vehiculos->condicion_real; ?>&nbsp;</td>
        
        </tr>
        <?php }  ?>
      </tbody>
      </table>




           </div>
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
<script type="text/javascript">
function exportar_vehiculos(){
	document.location=base_url+'administracion/reportes_excel_vehiculos';
} 
 </script>
