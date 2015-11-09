<?php 
date_default_timezone_set ("UTC");
  $fecha=date("d/m/Y"); 
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=reporte_repuestos_('.$fecha.').xls');
header('Pragma: no-cache');
header('Expires: 0');


?>

<table id='seccion' class='table table-striped table-bordered'  align='center'>
    <thead>
      <tr>
            <th width='140'>Codigo</th>
            <th width='140'>Nombre</th>
         
      </tr>
    </thead>
    <tbody>
<?php
//deshabilitar cache
ini_set("soap.wsdl_cache_enabled", "0");

//establecer parametros de envío   
$params = array("custodio"=>"0001");

try{
  //iniciar cliente soap
  //escribir la dirección donde se encuentra el servicio
  $client = new SoapClient("http://localhost/movile/servicio.php?wsdl");

  //llamar a la función para consultar usuarios
  //y guardar el resultado
  $result = $client->__SoapCall("consultaVehiculos", $params);
  

  //Contar la cantidad de elemenos del arreglo recibido
  $limite= count($result);

  //Imprimir la lista de usuarios recibida
  for ($i=0;$i<$limite; $i++){
    $MATCODIGO=$result[$i]->MATCODIGO;
    $MATNOMBRE=$result[$i]->MATNOMBRE;?>
    <tr>
    <td><?php echo $MATCODIGO; ?>&nbsp;</td>
      <td><?php echo $MATNOMBRE; ?>&nbsp;</td>

    </tr>

    <?php }
 //Si hay algún problema intermedio será atrapado aquí.
  }catch (SoapFault $e){

  echo "Ups!! hubo un problema y no pudimos recuperar los datos.<br/>
        $e<hr/>";
}    
?>
</tbody>
</table>
