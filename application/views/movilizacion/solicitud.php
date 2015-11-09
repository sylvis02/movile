<div id="contenido" style="width:80%; margin:auto; padding-top:10;">  
<div class="tab-table"> 
	<ul class="nav  nav-pills">
		<li class="active"><a href="#tab1" data-toggle="tab">Nueva Solictud</a></li>
		<li ><a href="#tab2" data-toggle="tab">Solicitudes en Elaboración</a></li>
		
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="tab1">
		<form id="formulario_ajax" action="<?php echo base_url();?>movilizacion/save_solicitud" method="post" >
			 <table align="center" class="table" >	
				<tr>
				   <td align="left">Solicitante:</td>
				   <td align="left"><input title="Se necesita un nombre" type="text" maxlength="10" id="solicitante" class="form-control" name="solicitante" size="60" onkeyUp="return ValNumero(this)" placeholder="Ingrese el numero de cedula" required /></td>   
				   <td ><div id="mensaje" class="alert alert-danger" style="display:none"></div></td>
				   <td><select class="form-control" onchange="validarce(this.value);">
						<option>--Seleccione--</option>
						<?php if($empleados){ 
							foreach ($empleados->result() as $emp){ ?>
							 <option value="<?php echo $emp->cedula; ?>" ><?php echo $emp->nombre." ".$emp->apellido; ?> </option> <?php } ?> 
					
						<?php } ?>	
					</select>
				   </td>
				</tr>
			 </table>
			<div id='MostrarSolicitud' style='display:none'>
			 <table align="center" class="table">
			        <tr>
				   <td>Departamento:</td>
				   <td colspan="3"><input type='text' id='departamento' class="form-control" name='departamento' size='60' required readonly /></td>
				</tr>
				<tr>
				   <td>Nombres:</td>
				   <td><input type='text' id="nombres" class="form-control" name="nombres" size="60" required readonly /></td>
				   <td>Apellidos:</td>
				   <td><input type='text' id="apellidos" class="form-control" name="apellidos" size='60' readonly/></td>
				</tr>
				
         			<tr>
				    <td align="left">Fecha Salida:</td>
		  		    <td align="left"><input class="form-control" type="text" id="fecha_salida"  name="fecha_salida"  placeholder="dd/mm/aaaa" onkeyUp="return ValNumero(this)" required  /></td>
				    <td align="left">Fecha Retorno:</td>
			    	    <td align="left"><input class="form-control" type="text" id="fecha_llegada" name="fecha_llegada" placeholder="dd/mm/aaaa" onkeyUp="return ValNumero(this)" required  /></td>
			       </tr>
				<tr>
				    <td align="left">Hora Salida:</td>
				    <td align="left"><input type="text"  id="hora_salida"  class="form-control"  name="hora_salida"  onkeyUp="return ValNumero(this)" placeholder="ej:5:00"  required /></td>
				    <td align="left">Hora Retorno:</td>
				    <td align="left" ><input type="text" id="hora_retorno" class="form-control"  name="hora_retorno" onkeyUp="return ValNumero(this)" placeholder="ej:17:30" required/></td>
				</tr>
				<tr>   	
				    <td align="left">Actividades a realizarze:</td>
				    <td colspan='3' align='left'><textarea  id='motivo' class="form-control" name='motivo' cols='60' rows='5' required ></textarea></td>
				</tr>	
				<tr> 
				   <td align='left'>Ruta:</td>
				   <td colspan="3"  align="left"><input type="text" class="form-control" id="ruta" name="ruta" value=""  placeholder="Seleccione la Ruta"  required >
   				   <input type="hidden" id="Kilometraje" name="kilometraje" value=""></td>
    				   <td align="left"> <a href="#responsive" role="button" class="btn" data-toggle="modal">Ruta</a> </td>
				</tr>
			    
            			<tr>
				    <td align="left" width='100'>N&uacute;mero de ocupantes:</td>
				    <td  align="left"><input type='number' id='ocupantes' class="form-control" name='ocupantes' onkeypress="return validar(event)" size='8' required /></td>
				</tr>	
	            		<tr>
				    <td align="left">Nombres de ocupantes:</td>
	             		    <td colspan="3" align="left"><textarea id='integrantes' name='integrantes' cols='60' class="form-control" rows='5' required ></textarea></td>
				</tr>
            			<tr>
				    <td colspan='4' align='center'><input type="submit" value='Guardar'class="btn btn-primary" id="guardar" name="guardar" ></td>
				</tr>
			</table>
			</div>
		</form>
		</div>

		<div class="tab-pane" id="tab2">
			<?php if($solicitudPendiente){ ?>
				
			 
			<table class="table table-bordered table-striped" align='center'>
				<thead>
			    <tr>
			      <th align='center'>FECHA SOLICITUD</th>
				  <th align='center'>MOTIVO</th>
				  <th align='center'>DESTINO</th>
				  <th align='center'>FECHA SALIDA</th>
				  <th align='center' colspan='5'>ACCIONES</th>
			    </tr></thead><tbody>
			   	 <?php
      				foreach ($solicitudPendiente->result() as $solicitudP) { ?>

				      <tr>
				        <td><?php echo $solicitudP->fecha_emision; ?> </td>
				        <td><?php echo $solicitudP->motivo; ?> </td>
				        <td><?php echo $solicitudP->destino; ?> </td>
				        <td><?php echo $solicitudP->fecha_salida; ?> </td>
				  	    <td><a  href="#" data-toggle="tooltip" data-original-title="Editar" onClick='editar(<?php echo $solicitudP->cod_movilizacion;?>)'><i class="glyphicon glyphicon-edit"></i></a></td>
				  		<td><a  href="#" data-toggle="tooltip" data-original-title="Eliminar" onClick='eliminar(<?php echo $solicitudP->cod_movilizacion;?>)'><i class="glyphicon glyphicon-remove"></i></a></td>
						<td><a  href="#" data-toggle="tooltip" data-original-title="Asignar vehiculo" href="#"onClick='enviar(<?php echo $solicitudP->cod_movilizacion;?>)'><i class="glyphicon glyphicon-check"></i></a></td>
					</tr>
			    		<?php } ?>
			  
  			</tbody></table>
  			<?php }else{?> <div class="alert alert-success" role="alert"> No tiene solicitudes Guardadas </div> <?php }?>
		</div>
		
	</div>
</div></div>
<div class="modal fade bs-example-modal-lg" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
     	<div class="modal-content">
     		<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     		  	<h4 class="modal-title" id="gridSystemModalLabel">Asignar Ruta</h4>
     		</div>

      		<div class="modal-body">
      			<a onclick="initialize();"> Primero Seleccione Aqui</a>
 				<div id="mostrarMapa" style="width: 850px; height: 350px;"> </div>

		 	 
			 		<div id="control_panel" style="float:left;width:100%;text-align:left;padding-top:0px">
		    			<div style="margin:20px;border-width:2px;"></div>
		    		</div>
					
					<table class="table">
						<tr>
							<td><b>Provincia:</b>
								<select  name="provincias"   id='provincias1'class="form-control"  onChange='cargarCanton(this.value);'>
								<option value='0'>--Seleccione--</option>
								<?php foreach ($provincia->result() as $provincia1) { ?>
								<option value="<?php echo $provincia1->nombre;?>"><?php echo $provincia1->nombre;?></option>	
						<?php	}	?>
						 
							</select> </td>
							<td><b>Canton:</b>
								<select id="cantones1" name="cantones" class="form-control" onChange='cargarParroquia(this.value);'>
								   <option value='0'>--Seleccione--</option>
						 		</select> </td>
							<td><b>Parroquia:</b>
								<select id="parroquia1" name="parroquia"   class="form-control" onChange='anadirArreglo(this.value)'>
									<option value='0'>--Seleccione--</option>					
							</select> </td>
							<td><b>.</b><input  type="submit" onclick="calcRoute();" value="Determinar" class="form-control"></td>
							<td><b>.</b><input  type="submit" onclick="borrarRuta();" value="Eliminar" class="form-control"></td></tr>
					</table>
						
		                <div style=" margin-left:15px;" >
  				<div id="directions_panel" style="width:100%;"  ></div>
      			<b>Kilometros:</b> <input type="text" id="total" class="form-control" name="total">
		   						
   			   			
			</div>
			<div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn btn-success" onClick="agregar_ruta();">Guardar</a>
        <a href="#" data-dismiss="modal" class="btn">Cerrar</a>
</div>
</div>

    
</div>
</div>

</div>

<script type="text/javascript"> 
function cargarCanton(provincia){

	$.post(base_url+'movilizacion/cargarCanton',
		
		{'codigo': provincia}, 
			function(data){ 
			
			$('#cantones1').html(data);
        });
}
function cargarParroquia(canton){
var provincia=$("#provincias1").val();
	
	$.post(base_url+'movilizacion/cargarParroquia',
		
		{'codigo': canton, 'provincia':provincia}, 
			function(data){ 
				$('#parroquia1').html(data);
        });
}


function validarce(cedula)
{

$.ajax({
		type: "GET",
		dataType: "json",
		url: base_url+"movilizacion/buscarEmpleado/"+cedula, 
		success : function(data) {
		         
				$.each(data, function(i, item) {
				   
		           document.getElementById('nombres').value=item.nombre;
		           document.getElementById("apellidos").value=item.apellido;
		           document.getElementById("departamento").value=item.descripcion;
			   	   document.getElementById("solicitante").value=cedula;	
		           document.getElementById("mensaje").style.display ='none';
			       document.getElementById("MostrarSolicitud").style.display ='block';
		           
				if(item.mensaje!=" "){

		            document.getElementById("mensaje").innerHTML=item.mensaje;
			        document.getElementById("MostrarSolicitud").style.display ='none';
		            document.getElementById('solicitante').value="";	
		            document.getElementById('nombres').value="";
		            document.getElementById("apellidos").value="";
		            document.getElementById("departamento").value="";
		 		}
		         
		 		});
		}
	});
}

</script>


<script type="text/javascript"> 

$( "#solicitante" ).keypress(function(event) {
  if ( event.which==13 ) {
	var cedula =$('#solicitante').val();
	numcedula = cedula.length;
 	document.getElementById("mensaje").style.display ='none'; 	
	if (numcedula>=10){
	
	  	$.ajax({
		type: "GET",
		dataType: "json",
		url: base_url+"movilizacion/buscarEmpleado/"+cedula, 
		success : function(data) {
		           $.each(data, function(i, item) {
				   
		           document.getElementById('nombres').value=item.nombre;
		           document.getElementById("apellidos").value=item.apellido;
		           document.getElementById("departamento").value=item.descripcion;
		           document.getElementById("mensaje").style.display ='none';
			   document.getElementById("MostrarSolicitud").style.display ='block';
	
		           if(item.mensaje!=" "){
		            document.getElementById("mensaje").innerHTML=item.mensaje;
			    document.getElementById("MostrarSolicitud").style.display ='none';
		            document.getElementById('solicitante').value="";	
		            document.getElementById('nombres').value="";
		            document.getElementById("apellidos").value="";
		            document.getElementById("departamento").value="";
		           }
		         
		        });
	 
				}
		
	  	  });
		}else{
		  document.getElementById("mensaje").style.display ='block';
			document.getElementById("mensaje").innerHTML="Su cedula  es incorrecta";
}
  	   	}

});

</script>

<script>
function editar(cod_movilizacion){
		//la direccion junto con el controlador
		$.post(base_url+'movilizacion/viewSolicitudMovi',
		//si tienes que mandar variables
	{'codigo': cod_movilizacion}, 
		function(data){ 
			$('#contenido').html(data);
        });
}

function eliminar(cod_movilizacion){
   jConfirm('Desea eliminar este proceso?', 'Gestión Vehicular', function(r) {
      if(r==true){
	   $.post(base_url+'movilizacion/eliminar_solicitud',
			{'codigo': cod_movilizacion}, 
			function(data){ 
				location.href=base_url+"movilizacion/solicitud";
	        });
	      }
   		});
	}

function enviar(cod_movilizacion){
 	$('#contenido').load(base_url+'movilizacion/enviarAprobar/'+cod_movilizacion);
	   	}	
</script>

<script type="text/javascript">
	
	$(document).ready(function(){
		$("#formulario_ajax").submit(function(){

			
			$.ajax({
				url:  $(this).attr("action"),
				type: $(this).attr("method"),
				data: $(this).serialize(),
				success: function(data) 
				{ 

				
      				$('#contenido').html(data);
      			}
			});
				return false;
		});
			
	});
</script>

<script>
$('#fecha_salida').datepicker();
$('#fecha_llegada').datepicker();
$('#hora_salida').timepicker();
$('#hora_retorno').timepicker();

</script>





