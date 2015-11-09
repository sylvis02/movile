<?php
    header('Content-Type: text/html; charset=UTF-8');
    header('Content-type: application/vnd.ms-word');
    header("Content-Disposition: attachment; filename=Imprimir.doc");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <style type="text/css">
  .Estilo2 {
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-weight: bold;
  font-size:12px;
  }
 .Estilo3 {
  font-family: Arial, Helvetica, sans-serif;
  font-weight: bold;
  font-size:12px;
  }
  .Estilo5 {
  font-family: Arial, Helvetica, sans-serif;
  font-size:10px;
  }
  .Estilo6 {
  font-family: Arial, Helvetica, sans-serif;
  font-size:8px;
  }
  .table, th,td{ 
  border: 1px solid #000000;
   border-collapse: collapse;
  } 
  
 th, td {text-align: center; padding:0em;}
        .salto{
          line-height: 2px;
          }

         

        
</style>

<div id="salvoconducto" name "salvoconducto">
 <table width="649" border="1" align="center">
  <tr> 
    <td align="center"> <IMG SRC="<?php echo base_url();?>images/iconos/logo.png" width="75" height="95" ></td>
  </tr>
    </table>

      <table width="649" border="1" align="center" bordercolor="#000">
    <tr>
        <td colspan="7"  height="32" align='center' bgcolor='#E6E6E6'><span class="Estilo2">SOLICITUD DE AUTORIZACIÓN PARA CUMPLIMIENTO DE SERVICIOS INSTITUCIONALES</span></td>
        </tr>
      <?php foreach ($salvo_conducto->result() as $item) {?> 

      <tr>
        <td colspan="5"><h5><span class="Estilo6"><b>No: SOLICITUID DE AUTOTIZACIÒN PARA CUMPLIMIENTO DE SERVICIOS INTITUCIONALES</b> <br> 
        <?php echo $item->mcod_movilizacion; ?> </br></span></td>
        <td colspan="2"><span class="Estilo6"><b>FECHA SOLICITUD:(dd-mm-) <span class="Estilo5"><?php echo $item->mfecha_emision; ?>&nbsp; </span></b></span></td>
      </tr>
      <tr>
        <td width="212" height="32"  align="center"><span class="Estilo5"> <b>VIÁTICOS ( X)</b></span></td>
        <td height="32"  align="center" colspan="2"><span class="Estilo5"><b>MOVILIZACIÓN ( ) </b></span></td>
        <td colspan="2" height="32"  align="center"><span class="Estilo5"><b>SUBSISTENCIAS ( )</b></span> </td>
        <td height="32" colspan="2"  align="center"><span class="Estilo5"><b>ALIMENTACIÒN ( )</b></span></td>
      </tr>
      <tr>
        <td colspan="7" height="32"  align="center"  bgcolor='#E6E6E6'><span class="Estilo2"><b>DATOS GENERALES</b></span></td>
      </tr>
      
      <tr>
        <td align="center" colspan="4"><span class="Estilo5"><b>APELLIDOS-NOMBRES DE LA O EL SERVIDOR: </b> <?php echo $item->mnombres;?></span></td>
        <td colspan="3" align="center"> <span class="Estilo5"><b>PUESTO QUE OCUPA: </b><?php echo $item->mdenominacion_cargo;?></span></td>
      </tr>
      <tr>
        <td  colspan="4" align="center"> <span class="Estilo5"><b>CIUDAD-PROVINCIA DEL SERVICIO INSTITUCIONAL</b><?php echo $item->mdestino;?></span></td>
        <td  colspan="3" align="center"> <span class="Estilo5"><b>NOMBRE DE LA UNIDAD A LA QUE PERTENECE LA O EL SERVIDOR</b> <?php echo $item->departamento;?></span></td>
       </tr>
  
        <tr align="left">
          <td colspan="2" align="center"><span class="Estilo3">Fecha Salida:</span></td>
          <td colspan="2" align="center"><span class="Estilo3">Hora Salida:</span></td>
          <td align="center"><span class="Estilo3">Fecha Llegada:</span></td>
          <td colspan="2" align="center"><span class="Estilo3">Hora Llegada:</span></td>
        </tr>
        <tr>
          <td align='center' colspan="2"><span class="Estilo5"><?php echo $item->mfecha_salida; ?></span></td>
          <td align='center' colspan="2"><span class="Estilo5"><?php echo $item->mhora_salida; ?></span></td>
          <td width="215" align='center' ><span class="Estilo5"><?php echo $item->mfecha_llegada; ?></span></td>
          <td colspan="2" align='center'><span class="Estilo5"><?php echo $item->mhora_retorno; ?></span></td>
        </tr>
        <tr>
          <td height="40" colspan="7"> <span class="Estilo6">SERVIDORES QUE INTEGRAN LOS SERVICIOS INSTITUCIONLES: <?php echo $item->mintegrantes; ?> </span></td>
        </tr>
        <tr>
          <td  colspan="2"><span class="Estilo5"><b>DESCRIPCIÓN DE LAS ACTIVIDADES A EJECUTARSE: </b></span></td>
          <td height="40" colspan="5"><span class="Estilo5"><?php echo $item->mmotivo; ?>&nbsp;</span></td>
        </tr>
       <tr>
        <td colspan="7" height="32"  align="center"  bgcolor='#E6E6E6'><span class="Estilo2"><b>TRANSPORTE</b></span></td>
      </tr>
       <tr>
        <td rowspan="2" align="center"><span class="Estilo5"><b>TIPO TRANSPORTE</b></span></td>
        <td width="169" rowspan="2" align="center"><span class="Estilo5"><b>NOMBRE DE TRANSPORTE</b></span></td>
        <td width="195" rowspan="2" align="center"><span class="Estilo5"><b>RUTA</b></span></td>
        <td colspan="2" align="center"><span class="Estilo5"><b>SALIDA</b></span></td>
        <td colspan="2" align="center"><span class="Estilo5"><b>LLEGADA</b></span></td>
        </tr>
       <tr>
         <td height="38" align="center"><span class="Estilo5"><b>FECHA</b>
         <br>dd-mmm-aaaa</br></span></td>
         <td align="center"><span class="Estilo5"><b>HORA</b>
         <br>
         hh:mm</br></span></td>
         <td align="center"><span class="Estilo5"><b>FECHA</b>
         <br>dd-mmm-aaaa</br></span></td>
         <td align="center"><span class="Estilo5"><b>HORA</b>
         <br>hh:mm</br></span></td>
       </tr>
      <tr>
        <td align="center"><span class="Estilo5">Terrestre </span></td>
        <td align="center"><span class="Estilo5"><?php echo $item->tipo." Nro ". $item->mnum_vehiculo; ?></span></td>
        <td align="center"><span class="Estilo5"><?php echo $item->mdestino;?>&nbsp;</span></td>
        <td align="center" width="215" ><span class="Estilo5"><?php echo $item->mfecha_salida; ?></span></td>
        <td width="215" align="center"><span class="Estilo5"><?php echo $item->mhora_salida; ?></span></td>
        <td align="center" width="204"><span class="Estilo5"><?php echo $item->mfecha_llegada;?></span></td>
        <td width="197" align="center"><span class="Estilo5"><?php echo $item->mhora_retorno; ?></span></td>
      </tr>
     
       <tr>
         <td height="32" colspan="7" align='center'  bgcolor='#E6E6E6'><span class="Estilo2"> DATOS PARA LA TRANSFERENCIA</span></td>
        </tr>
       <tr>
         <td height="32" colspan="3" align='center'><span class="Estilo5">NOMBRE DEL BANCO: <?php echo  $item->mbancoun; ?></span> </td>
         <td height="32" colspan="2"align='center'><span class="Estilo5">TIPO DE CUENTA: <?php echo  $item->mtipocuenta; ?></span></td>
         <td height="32" colspan="2" align='center'><span class="Estilo5">No.DE CUENTA:<?php echo  $item->mnumcuenta; ?></span> </td>
        </tr>
       <tr>
        <td height="32" colspan="3" align='center'  bgcolor='#E6E6E6'><span class="Estilo5">FIRMA DE LA O EL SERVIDOR SOLICITANTE</span></td>
        <td colspan="4"  align='center'  bgcolor='#E6E6E6'><span class="Estilo5">FIRMA DE LA O EL RESPONSABLE UNIDAD SOLICITANTE</span></td>
        
       </tr>
      <tr>
        <td height="85" colspan="3">&nbsp;</td>
        <td height="85" colspan="4">&nbsp;</td>
        </tr>
      <tr>
        <td  align="center" colspan="3"><span class="Estilo5">Nombre de la o el Servidor<br><b><?php echo $item->mnombres;?></b></br></span></td>
        <td colspan="4" align="center"><span class="Estilo5"><b><?php echo $item->msolicitante ?></b></span></td>
      </tr>
      <tr>
        <td  colspan="3" align="center"  bgcolor='#E6E6E6'><span class="Estilo5">FIRMA DE LA AUTORIDAD NOMINADORA O SU DELEGADO</span></td>
        <td colspan="4"  style="text-align:justify" rowspan="3"><span class="Estilo5"><FONT SIZE=1><b> NOTA: Esta solicitud deberá ser presentada para su autorización, con por lo menos 72 horas de anticipación al cumplimiento de los servicios institucionales; salvo el caso de que por necesidades institucionales la Autoridad Normalmente autorice.</b> </font></span><br>
          
          <span class="Estilo5"><FONT SIZE=1>* De no existir disponibilidad presupuestaria, tanto la solicitud como la autorización quedarán insubsistentes.
          </font></br></span><br>
          <span class="Estilo5">
          <FONT SIZE=1>* El informe de servicios institucionales durante los dias de descanso obligatorio, con excepción de las Máximas Autoridades o de casos excepcionales debidamente justificados por la máxima Autoridad o su Delegado.
         </font></br></span><br>
         <span class="Estilo5"><FONT SIZE=1>Está prohibido conceder servicios institucionales  durante los días de descanso obligatorio, con excepción de            las Máximas Autoridades o de casos excepcionales debidamente justificados por la Máxima Autoridad o su Delegado.</font></span></br></td>
      </tr>
      <tr>
        <td height="85" colspan="3">&nbsp;</td>
        </tr>
      <tr>
        <td  align="center" colspan="3"><span class="Estilo5">Nombre de la Autoridad nominadora o su delegado <br><b>DR. FABIAN SANCHEZ</b></br></span></td>
        </tr>
      
      <?php } ?>

      </table>
    </div>

<script type="text/javascript">
$("#imprime").click(function (){
  
  //{'codigo': cod_movi }, 
    //function(data){ 
     
      //$('#contenido').html(data);
      $("div#salvoconducto").printArea();
        //});
    
  
    
})
</script>