<table border="0" align="center" id='seccion'  class="table table-striped">
<thead>
  <tr>

    <th>Cantidad</th>
    <th>Repuesto Utilizado</th>
  
   
  </tr>
</thead><tbody>
  <?php 
foreach ($repuestos_utili->result() as $historial) {
 ?>
  <tr>
    <td class="ITEMS_TABLA Estilo17"><?php echo $historial->cantidad;?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $historial->repuesto; ?>&nbsp;</td>

      
  </tr>
  <?php }  ?>
  <tr>
<tr>
  
    </td>
    <tr>
</tbody>
</table>

<script type="text/javascript">
 function regresar(){
        $('#contenido').html('');
        $('#contenido').load('principal/control_mantenimiento');

              }
      </script>


   
