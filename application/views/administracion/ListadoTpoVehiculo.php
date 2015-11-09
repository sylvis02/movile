<div id="mainContainer">
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td colspan="3" align="center" class="titulos">ADM. TIPO DE VEHICULO</td>
  </tr>
 </table>

<table align="center" >
  <tr>
  <td>
      <form name='nuevo' class='nuevo' action='RegTipoVehiculo.php' method='post'>
      <input type='image' src='../iconos/add.png' name='nuevo' value='Crear nuevo'>
    </form>
  </td>
  </tr>
  </table>

  <table id="seccion"  class="table table-striped"   align="center">
  <thead>
  <tr>
    <th>CODIGO</th>
    <th>NOM. TIPO </th>
    <th>DESCRIPCION</th>
  <th>TIPO</th>
    <th colspan='2'><img src="../iconos/48.jpg" width="32" height="32"></th>
  </tr>
  </thead>
  <tbody>
   <?php
      foreach ($tipos_vehiculo->result() as $tipos) { ?>

      <tr>
        <td><?php echo $tipos->cod_tipo; ?> </td>
        <td><?php echo $tipos->nombre_tipo; ?> </td>
        <td><?php echo $tipos->desc_tipo; ?> </td>
        <td><?php echo $tipos->tipo; ?> </td>
      </tr>
      <?php  
      
      }

      ?>
  </tbody> </td>

  </table>
</div>
