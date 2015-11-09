<div class="panel panel-default">
<div class="panel-heading">DATOS GENERALES</div>
<div class="panel-body">

 <table align="center" > 
    <?php foreach ($datosMovi->result() as $itemmovi ) {?>
    <input type='hidden' value='<?php echo $itemmovi->ccod_movilizacion;?>' id='cod_movilizacion'>
      <tr>
        <td align='left' width='144'>Solicitante:</td>
        <td align='left'><b><?php echo $itemmovi->solicitante;?></b></td>
        <td align='left' width='100'>Departamento:</td>
        <td align='left'><b><?php echo $itemmovi->departamento; ?></b></td>
      </tr>
      <tr>
        <td align='left'>Fecha Salida:</td>
        <td align='left' width='378'><b><?php echo $itemmovi->fecha_salida;?></b></td>
            <td align='left' width='117'>Fecha Llegada:</td>
            <td align='left' width='378px'><b><?php echo $itemmovi->fecha_llegada;?></b></td>
      </tr>
      <tr>
            <td align='left'>Hora Salida:</td>
            <td align='left' width='378'><b><?php echo $itemmovi->hora_salida;?></b></td>
            <td align='left' width='117'>Hora Retorno:</td>
            <td align='left' width='378'><b><?php echo $itemmovi->hora_retorno;?></b></td>
      </tr>
      <tr>
            <td align='left'>Motivo:</td>
            <td colspan='3' align='left'><b><?php echo $itemmovi->motivo;?></b></td>
             
      </tr>
      <tr>
            <td align='left' width='144'>N&uacute;mero de ocupantes:</td>
            <td colspan='3' align='left'><b><?php echo $itemmovi->ocupantes;?></b></td>
      </tr>
      <tr>
            <td align='left'>Nombres de ocupantes:</td>
            <td colspan='3' align='left'><b><?php echo $itemmovi->integrantes?></b></td>
      </tr>
                 
          <tr>
            <td align='left' width='144'>Destino:</td>
             <td colspan='3' align='left'><b><?php echo $itemmovi->destino;}?></b></td>
          </tr>
          </table>
      </div>
      <div class="panel-heading">SELECCIONAR VEHICULO</div>
       <div class="panel-body">
        <div class="row-fluid">

          <select id='cod_vehiculo' class='form-control' onchange='enviar();' required>
            <option value='0'>--SELECCIONE--</option> 
        <?php if($datosVehiculo){
	   foreach ($datosVehiculo->result() as $itemVehicu) {?>
                <option value='<?php echo $itemVehicu->cod_vehiculo; ?>'><?php echo $itemVehicu->marca."/".$itemVehicu->placa."/".$itemVehicu->num_vehiculo;?></option>
               <?php } } ?>
		
             </select>
                  
        </div>
    </div> 
    <div class="panel-heading"> Datos del conductor </div>
   <div class="panel-body" id='datosChofer'></div>
   <table><tr><td align='left' colspan='2'><a href="javascript:choferDif()">Asignar un chofer diferente</a></td></tr></table>
     
         <div id="chofer_diferente" style="display:none" align='center'>
          <table align='center' class='table'>
            <tr>
              <td colspan='2' align='center'>

                <select name='chofer_dif' id='chofer_dif' class='form-control' required>
                 
                 </select>
               </td>
            </tr>
            <tr>
              <td align='left' >Observacion:</td>
              <td align='left'><textarea name='obs' id ='obs'cols='30' rows='5' class='form-control'> </textarea></td>
            </tr>
          </table>
        </div>
                <table align='center'>
          <tr>
            <td align='center' colspan=''><input type='hidden' name='cod_movilizacion' id='cod_movilizacion' value='<?php echo $itemmovi->cod_movilizacion; ?>'>
            <div id='boton'>
              <a href="#" onclick="aprob_asig_Vehiculo();" class="btn btn-primary btn-sm"> GUARDAR</a>
            </div>
          </tr>
        </table>
         <div class="row" style='display:none' id='row'>
        <div class="col-md-4"></div>
            <div class="col-md-4 col-md-offset-4">
              <a  href="#" onClick='imprimir();' class='btn btn-primary btn-sm '><i class='glyphicon glyphicon-download'></i>Imprimir</a>
              <a href="#"  onclick='asignarCombus();'class="btn btn-primary btn-sm"><i class='glyphicon glyphicon-bed'></i>Asignar Combustible</a>
          </div>
        </div>





</div>
<script>
function enviar(){

  var cod_vehiculo=$('#cod_vehiculo').val();
  $.post(base_url+'movilizacion/asignacionVehiculoChofer',
  {'codigo': cod_vehiculo}, 
      function(data){ $('#datosChofer').html(data); 
       document.getElementById('chofer_diferente').style.display='none';   
       document.getElementById('datosChofer').style.display='block';  
    });
}

  function choferDif(){
      document.getElementById('chofer_diferente').style.display='block';
      $('#chofer_dif').load(base_url+'movilizacion/asignarChoferDiferent');      
      document.getElementById('datosChofer').style.display='none';
      return true;
     
  }
  function aprob_asig_Vehiculo(){
            var cod_movilizacion=$('#cod_movilizacion').val();
              var cod_vehiculo=$('#cod_vehiculo').val();
              var cod_chofer=$('#cod_chofer').val();
              var cod_chofer_dif=$('#chofer_dif').val();
              var observacion=$('#obs').val();
                $.post(base_url+'movilizacion/aprobarSolicitud_Movilizacion',
                {'cod_movilizacion': cod_movilizacion,
                'cod_vehiculo':cod_vehiculo,
                'cod_chofer':cod_chofer,
                'cod_chofer_dif':cod_chofer_dif,
                'observacion':observacion
                }, 
          
              function(data){ 
                         jAlert('Se han guardado los cambios', 'Gestión Vehicular');
                              $('#imprimir').html(data);
                              $('#boton').css("display","none");
                              $('#row').css("display","block");

      });

  }
    
  function imprimir(){
    var cod_movi=$('#cod_movilizacion').val();
    document.location = base_url+'imprimir/salvo_conducto/'+cod_movi;

  }
  function asignarCombus(){

    var dato=$('#cod_movilizacion').val();
   $('#contenido').load(base_url+'movilizacion/asignarCombustible/'+dato);

  }
  </script>