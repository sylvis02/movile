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
        .table { 
        border: 1px solid #000000;
        border-style: solid; 
        border-top-width: 1px; 
        border-right-width: 1px; 
        border-bottom-width: 1px; 
        border-left-width: 1px;
        } 
        .salto{
          line-height: 2px;
          }
          
</style>

<?php foreach ($solicitud->result() as $item) {?> 
     
<table align="center" width="95%"   border="0" bordercolor="#000000" class="table1">
            <tr> 
             <td align="center"><img src="<?php echo base_url();?>images/iconos/logo.png" width='50' height='60' border=0 alt="GPC"></td>
            </tr
            
            <tr>
                <td width="62%" align="center"><p><b>ORDEN DE MOVILIZACION  Nº.<?php echo $item->mcod_movilizacion; ?> </b></p></td>
             </tr>
        </table>
              
          <table width="95%" border="1" align="center"  bordercolor="black" class="Estilo2">      
           
              <td>  
                 <b>1.IDENTIFICACIÓN DE LA IDENTIDAD </b>
               </td>
                
                <tr>
                   <td>  
                       <table width="95%">  
                                <tr> 
                                    <td style='padding:0px 40px 0px 0px'><span class="Estilo5"><b>Institución</b> </span></td>  
                                  <td><span class="Estilo5"> GOBIERNO PROVINCIAL DE LOJA</span></td>
                         </tr>
                                
                                <tr> 
                                    <td style='padding:0px 40px 0px 0px' ><span class="Estilo5"><b> RUC </b></span></td>  
                                  <td><span class="Estilo5"> 1160000160001</span></td>
                         </tr>
                    			
               		 </table>
                  </td>
                
            </table>
      
               <table  width="95%" border="1" align="center"  bordercolor="black" id="Datos emision" class="Estilo2" style="margin-top:10px;">
               	                      
                      <tr>
                             <td><b>2. DATOS DE LA EMISIÓN DE ORDEN </b></td></tr>
        					<tr>
                            	<td>
                              
                              <table  width="95%"> 
				<tr>
                                    	<td width="29%" style='padding:0px 40px 0px 0tpx'><span class="Estilo3">Ciudad</span></td>
                                      <td  colspan="3"><span class="Estilo5"> Loja Cabecera Cantonal </span></td>
                                </tr>  
                                    <tr>
                                      <td><span class="Estilo5"><b>Motivo</b></span></td>
                                      <td colspan="3"> <span class="Estilo5"><?php echo $item->mmotivo; ?>&nbsp;</span></td>
                                </tr>
                                    <tr>
                                    	<td><span class="Estilo5"><b>No. Ocupantes</b></span></td>
                                      <td colspan="3"> <span class="Estilo5"><?php echo $item->mintegrantes; ?>&nbsp;</span></td>
                                </tr>
                                    <tr>
                                    <td><span class="Estilo5"><b><br>&nbsp;AUTORIZACION</br></b></span></td>
                                </tr>
                                    <tr>
                                      <td><span class="Estilo5"><b> Fecha de Vigencia Desde</b></span></td>
                                      <td colspan="3"><span class="Estilo5"><?php echo $item->mfecha_salida."\t <b>Hora</b> \t ".$item->mhora_salida." <b> \t Hasta </b> \t". $item->mfecha_llegada."<b>\t Hora </b>\t ".$item->mhora_retorno;  ?> </span></td>
                                </tr>
                                    <tr>
                                      <td><span class="Estilo5"><b>Lugar Origen</b></span></td>
                                   	  <td colspan="3"><span class="Estilo5"><?php echo "Loja" ?>&nbsp;</span></td>
                                </tr>
                                    <tr>
                                      <td><span class="Estilo5"><b>Lugar Destino</b></span></td>
                                      <td colspan="3"> <span class="Estilo5"><?php echo $item->mdestino; ?>&nbsp;</span></td>
                                </tr>
                                    <tr> 
                                    	<td><span class="Estilo5"><b>Kilometraje Inicio: </b></span></td>
                                        <td><span class="Estilo5"><?php echo $item->mkilometraje_recorrido; ?></span></td>
                                        <td width="25%"><span class="Estilo5"><b>Kilometraje Fin: </b></span></td>
                                        <td width="4%"></td>
                                    </tr>
                          </table></td>
       	         </tr>
                       
           	   </table>
                   
              
                   <table  width="95%"  ali align="center" border="1"  bordercolor="black" class="Estilo2" style="margin-top:5px;">
                   
                   <tr>
                   	<td>3. DATOS DEL CONDUCTOR / A </br></td>
               	     
                   </tr>
                   <tr>
                   		<td>
                        	<table width="95%"> 
                           	  <tr>
                                	<td> <span class="Estilo5"><?php echo "<b>Nombre: </b>".$item->mnombres."<br> <b>Cedula de identidad: </b>".$item->mcedula."<br> <b>Telf: </b>".$item->mtelefono; ?></span></td>
                              </tr>
                            </table></br>
                    	</td>
                   </tr>
                                     
                   </table>
                   <table width="95%" align="center" border="1"  bordercolor="black"  class="Estilo2" style="margin-top:5px;">
                   	<tr>
                    	<td>
                   	    4.CARACTERISTICAS DEL VEHICULO</br></span></td>
                    </tr>
                    <tr>
                    	<td>
                        	<table  width="95%">
                            	<tr>
                                  <td width="9%"><span class="Estilo5"><b>Número de placa: </b> </span></td>
                                  <td colspan="2"><span class="Estilo5"><?php echo $item->mplaca;?></span></td>
                                  <td width="19%"><span class="Estilo5"><b>Marca / Modelo</b></span></td>
                                  <td width="45%" colspan="2"><span class="Estilo5"><?php echo $item->mmarca;?> / <?php echo $item->tipo;?></span></td>
                              </tr>
                                <tr>
                                  <td><span class="Estilo5"><b>Numero Matricula:</b>
                                  </span>
                                  <td> <span class="Estilo5"><?php echo $item->mnum_vehiculo;?></span></td>
                              </tr>
                            </table>
                      </td>
                    </tr>
                   </table>
             
                  <table  width="95%"  align="center" border="1"  bordercolor="black"  style="margin-top:5px;" class="Estilo2">
                  <tr>
                         <td colspan="2">&nbsp;
                         <b>5. DATOS DEL SOLICITANTE</b></br></td>
                     </tr>
                       <tr>
                         <td colspan="2"  height="80"></td>
                       </tr> 
                       <tr>
	        		<td align='center'><p class="Estilo3">Nombres: 
	        		<?php   echo $item->mresponsable;?></p></td>
	        		<td align='center'><p class="Estilo5"><b>Departamento</b> <?php echo $item->mdepartamento; ?></p></td>
        	       </tr>
                   </table>
                   
          </td></tr>
                   <br><span class="Estilo5"><b>Realizado Por</b> <?php echo $item->msolicitante; ?></span></br>
                   <br><span class="Estilo5">
          
                   <b>Fecha de emision</b> <?php echo $item->mfecha_emision; ?></br>
                   </table>

			<?php } ?>