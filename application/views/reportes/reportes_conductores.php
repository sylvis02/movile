<div id="contenido" style="width:80%; margin:auto;">      
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-4"> REPORTE CONDUCTORES</div>
               <ul class="nav navbar-nav navbar-right">
                 <a  href="#" onClick="exportar_conductores();" class='btn btn-primary btn-xs'><b>Exportar a excel</b></a>

              </ul>
          </div>
        </div>
      <table border="0" align="center" id="seccion" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>LICENCIA</th>
          <th>NOMBRE</th>
          <th># CEDULA</th>
          <th>RELACION LABORAL</th>
          <th>NOVEDADES</th>
       
        </tr>
      </thead><tbody>
        <?php if ($conductor){ foreach ($conductor as $rep_conductores) { ?>
        <tr><?php
	 if($rep_conductores->nombre_licencia){?>
          <td ><?php echo $rep_conductores->nombre_licencia;?>&nbsp;</td>
         <?php }else{ ?>
            <td ><b><?php echo "No registra Licencia";?>&nbsp;</b></td>
          <?php } ?>
          <td ><?php echo $rep_conductores->nombres; ?>&nbsp;</td>
          <td ><?php echo $rep_conductores->cedula; ?>&nbsp;</td>
          <td ><?php echo $rep_conductores->denominacion_cargo; ?>&nbsp;</td>
          <td ><?php echo $rep_conductores->novedades; ?>&nbsp;</td>
       
        </tr>
        <?php } } else{?><tr><td colspan='5'>No se encontraron Resultados</td></tr>  <?php }  ?>
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

<script type="text/javascript">
function exportar_conductores(){
	
document.location=base_url+'administracion/reportes_excel_conductores';
} 
 </script>
