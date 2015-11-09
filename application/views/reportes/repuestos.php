<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0" class="table table-striped">
  <tr>
    <td colspan="28" align="center" class="titulos">LISTADO REPUESTOS
       
    </td>
  </tr>
</table>

<table border="0" align="center" id='seccion' class="table table-striped table-bordered">
<thead>
  <tr>
    <th>Codigo</th>
    <th>Nombre</th>
  </tr>
</thead><tbody>
  <?php foreach ($clase_material->result() as $clase_materiales) {
  
   ?>
  <tr>
    <td class="ITEMS_TABLA Estilo17"><?php echo $clase_materiales->MATCODIGO;?>&nbsp;</td>
    <td class="ITEMS_TABLA Estilo17"><?php echo $clase_materiales->MATNOMBRE; ?>&nbsp;</td>
 </tr>
  <?php } ?>
  </tbody>
</table>

