
<div id="contenido" style="width:80%; margin:auto;">   
		<div class="panel panel-default">
		  <div class="panel-heading">SOLICITUD DE MANTENIMIENTO </div>
		  <div class="panel-body">
		  	<form id="formulario_ajax1" action="<?php echo base_url();?>talleres/save_ordenesMantenimiento" method="post">
					
			<table width='100%' class="table">	
					<tr>

					<td align='left'><label>Fecha:</label>
					 <input class="form-control" data-date-format="mm/dd/yyyy" type="text" id="fechaMante" name="fechaMante" placeholder="dd/mm/aaaa"  required  />
					</td>
						<td><label>Buscar:</label>
						<input type="search" list="languages" id="buscar" name="buscar"  class="form-control">
							     	
          					<datalist id="languages">
          		 				<?php foreach ($placas->result() as $placa) { ?>
  								<option value="<?php echo $placa->placa;?>" />

     							<?php } ?>

						</datalist>
						

					<td align='left'><label>.</label><br><div class="btn-group">
							  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							    Buscar <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" role="menu">
							    <li><a href="#" onclick="cargarPlaca();">Placa</a></li>
							    
							  </ul>
							</div>
						</td>

						<tr><td colspan='4'><div id="nuevos_datos">  </div> <div id='mantenimiento'>
							
						</div>
					</td></tr>
					</td>   <td align='left'><label>Kilometraje Actual:</label>
						    <input type='text' name='kilometraje' id='kilometraje' class="form-control" onkeypress="return ValNumero(this)" onChange="validar2();" size='8' placeholder='Ingrese Kilometraje'required disabled/></td>
							  	
						 
						   <td align='left'><label>Tipo:</label>
						   <select id="tipo" name="tipo" class="form-control" onclick="CargarMantnimiento();" disabled>
						   			<option value='0'>--SELECCIONE--</option>
						   			<option value='REPARACION'>Reparacion</option>
						   			<option value='MANTENIMIENTO'>Mantenimiento</option>
						    </select>
						  <tr id="trError" style='display:none'><td id="tdError" style='display:none'><div id='mensajeError' class='alert alert-warning' style='display:none'>  </div></td> </tr>
						   
						   <tr id="trMensaje" style='display:none'><td id="tdMensaje" style='display:none'><div id='mensaje' class='alert alert-warning' style='display:none' onChange='llenarTrabajo();'>  </div></td>   </tr>	
						   <tr id="trMante" style='display:none'><td id="tdMante" style='display:none'><div id='mante' style='display:none'>
						   

						   </div></td></tr> 
						   <div id="detalles">
						   	<tr id="trdetalle" style='display:none'><td id="tddetalle" style='display:none' colspan='4'><label>DETALLE DE DESPERFECTOS</label>
						<textarea class='form-control' name='detalle_desperfecto1' id='detalle_desperfecto1'  rows='5' onchange="llenarTrabajo();" placeholder='Describa los detalles de desperfecto'></textarea></td></tr>
						<tr id="trtrabajo" style='display:none'><td id="tdtrabajo" style='display:none' colspan='4'><label>TRABAJO REALIZADO</label>
						<textarea class='form-control' name='trabajo_realizado1' id='trabajo_realizado1'cols='60' rows='5' disabled></textarea></td></tr>
						</div>

						<tr>
							<td colspan="4">
								<a  data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Agregar items</a>
							</td>
						</tr>
						<tr><td colspan='4'>
							<div class="collapse" id="collapseExample">
		  						<div class="well">
		 							<table class="table">
		 								<tr><td>
		 									<select name="repuesto" id="repuesto" class="form-control" onchange="cargarRepuestos();">
		 										<option value'0'>--SELECCIONE--</option>
		                        				<?php foreach ($claseRepuesto->result() as $row) {
		                            			echo '<option value="'.$row->CLAID.'">'.$row->CLANOMBRE.'</option>';
		                        				}?>
		                   
		                 					</select></td>

		                 					<td><div id="select"></div></td>
		 								</tr>
		 								<tr>
		 									<td><label> Cantidad</label><input type="text" name="cantidad" id="cantidad" value="" class="form-control" onkeypress='return validarD(event);'/></td>
		   									<td><label>Item</label><input id="txtitem" name="txtitem" type="text" class="form-control" value='' readonly></td>
		   								 	<td><label><p></label><a onclick="cargar_item();" class="btn btn-default"><i class="glyphicon glyphicon-ok"></i></a></td>
		   								</tr>
		   							</table>

		   							<table class="table table-bordered">
		   								<thead>
		                                <tr>
		                                    <td>Cantidad</td>
		                                    <td>Descripcion</td>
		                                    <td>Controles</td>
		                                </tr>
		                            	</thead>
		                            	<tbody id="table">
		                            		
		                            	</tbody>
		   							</table>
		  						</div>
							</div> 
						</td></tr>
						<div id="boton1">

		   <tr> <td colspan='4' align='center'><input type="submit" value='Guardar'class="btn btn-primary" id="guardar" name="guardar" disabled ></td></tr>
			</div>
			</table>

		</form>
			<form name='rep' class='rep' action='<?php echo base_url();?>imprimir/salvo_conducto' method='post'>
		<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0" class="table table-striped">

		</table>
		</form>
		</div>
		</div>
	</div>

<script type="text/javascript">

function cargarPlaca(){

    var id = $('#buscar').val();
    $.post(base_url+'talleres/buscarSolicitudpLaca',
	{'codigo1': id}, 
		function(data){ $('#nuevos_datos').html(data);      
    });
    		document.getElementById('tipo').disabled=true;
    		$('#trdetalle').css("display","none");
			$('#trtrabajo').css("display","none");
			$('#tddetalle').css("display","none");
			$('#tdtrabajo').css("display","none");
			$('#mensaje').css("display","none");
			document.getElementById('detalle_desperfecto1').value="";
			//document.getElementById('trabajo_realizado1').value="";
	var idrecibe=document.getElementById('buscar').value;
	numerodetalle = idrecibe.length;
    if (numerodetalle==0) {
    	document.getElementById('kilometraje').disabled=true;
    	document.getElementById('kilometraje').value="";
    	
			
    	

    }else{
    	document.getElementById('kilometraje').disabled=false;
    	document.getElementById('kilometraje').value="";
    
			
    }
	  

}
	

function cargarNumvehiculo(){
    var id = $('#buscar').val();
    $.post(base_url+'talleres/buscarSolicitudNumVehiculo',
	{'codigo1': id}, 
		function(data){ $('#nuevos_datos').html(data); });
}

function cargar_item(){

	var result="";
	var cantidad = $("#cantidad").val();
	var item = $("#txtitem").val();

	result="<tr><th id='edit1'><input type='hidden' name='cantidad1[]' value='"+cantidad+"'>"+ cantidad + "</th><td><input type='hidden' name='item1[]' value='"+item+"'>"+item+"</td><td align='center'><a href='#' onclick='myDeleteFunction();'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
	


	document.getElementById('table').innerHTML+=  result;
}

function cargarRepuestos(){
	
	var idrepuestos= $('#repuesto').val();
	$.post(base_url+'principal/solicitud_talleres_repuesto',
	{'CLAID': idrepuestos}, 
		function(data){ $('#select').css("display","block");
			$('#select').html(data); });
}



 function guardarOrden(){

  

	var arr = [];
	var cont=0;
	for (var i=0;i<document.getElementById('table').rows.length;i++) {
		for (var j=0;j < document.getElementById('table').rows[i].cells.length;j++){
			arr[cont] =  document.getElementById('table').rows[i].cells[j].innerHTML;
		}
		cont++;
	}
   



	$.post(base_url+'talleres/save_ordenesMantenimiento_Arr',
	 {
	 'arreglo':arr},
	
	function(data){ $('#contenido').html(data); });

}

</script>
<script type="text/javascript">
function CargarMantnimiento(){
			var kilometraje=$('#kilometraje').val();
		var kilometrajeManteni2=$('#kilometraje2').val();
		var kilometraje_Mantenimiento=$('#kilometraje3').val();
		var cod_gasolina1=$('#cod_gasolina').val();
		var tipo_vehiculo1=$('#tipo_vehiculo').val();
		var cod_chofer1=$('#cod_chofer').val();
llenarTrabajo();
			
	
	if( document.getElementById('tipo').value=='MANTENIMIENTO'){

			//$('#detalle_desperfecto').css("display","none");
			//$('#trabajo_realizado').css("display","none");
			$('#trdetalle').css("display","none");
			$('#trtrabajo').css("display","none");
			$('#tddetalle').css("display","none");
			$('#tdtrabajo').css("display","none");



		$.post(base_url+'principal/kilometrajeMantenimiento',
	     {'kilometraje': kilometraje,
	 		'kilometraje3':kilometraje_Mantenimiento,
	 		'cod_gasolina':cod_gasolina1,
	 		'tipo_vehiculo':tipo_vehiculo1,
	 		'cod_chofer':cod_chofer1,
			'kilometraje2':kilometrajeManteni2}, 
	 		
	 		function(data){ $('#mensaje').css("display","block"); 
	 		$('#trMensaje').css("display","block");
	 		$('#tdMensaje').css("display","block");
	 		$('#mensaje').html(data);
	 		$('#mante').css("display","block"); 
	 		$('#trMante').css("display","block");
			$('#tdMante').css("display","block");});
		document.getElementById('guardar').disabled=false;
	
			
	}else if(document.getElementById('tipo').value=='REPARACION'){
			$('#trdetalle').css("display","block");
			$('#tddetalle').css("display","block");
			//$('#detalle_desperfecto').css("display","block");
			$('#trtrabajo').css("display","block");
			$('#tdtrabajo').css("display","block");			
			//$('#trabajo_realizado').css("display","block");
			
		

			$('#mensaje').css("display","none"); 
	 		$('#trMensaje').css("display","none");
	 		$('#tdMensaje').css("display","none");
	 		
	 		$('#mante').css("display","none"); 
	 		$('#trMante').css("display","none");
	
			$('#tdMante').css("display","none");

			


	}


}


function cargarMantenimiento2(){
		document.getElementById('detalle_desperfecto').innerHTML+=document.getElementById('selecionarMa').value;
	document.getElementById('trabajo_realizado').innerHTML+=document.getElementById('selecionarMa').value+"\n";

}
function cargarM3(valor){
	
	document.getElementById('detalle_desperfecto').innerHTML+=valor+" \n";
	document.getElementById('trabajo_realizado').innerHTML+=valor+" \n";


}

function cargarM4(){
	
	var detalle=document.getElementById('detalle_desperfecto').innerHTML=document.getElementById('selecionarMa').value;
	document.getElementById('trabajo_realizado').innerHTML=document.getElementById('selecionarMa').value;
var numerodetalle=detalle.length;
if(numerodetalle==0){
	document.getElementById('guardar').disabled=true;
}else{
	document.getElementById('guardar').disabled=false;

}

}
function bloquear(){
	document.getElementById('guardar').disabled=true;
}
function myDeleteFunction() {
            document.getElementById("table").deleteRow(0);
        }
function meditar() {
             document.getElementById('edit1').contentEditable = true;
        }




function llenarTrabajo(){


	var detalle=document.getElementById('detalle_desperfecto1').value;
	var recibe = document.getElementById('trabajo_realizado1').innerHTML=detalle;

	numerodetalle=detalle.length;
	if(numerodetalle==0) {

		document.getElementById('guardar').disabled = true;
		
	}else{
		
		
		 document.getElementById('guardar').disabled = false;
	}

	}

</script>
<script type="text/javascript">
function validar2(){
var kilometrajePress=document.getElementById('kilometraje').value;	
var kilometrajeMovilizacion=document.getElementById('kilometraje3').value;	

var kilometrajePress1 = parseInt(kilometrajePress);
var kilometrajeMovilizacion1=parseInt(kilometrajeMovilizacion);

	if (kilometrajeMovilizacion1>kilometrajePress1) {
	
	
		//document.getElementById('kilometraje').value=" ";
		$('#mensajeError').css("display","block"); 
		$('#trError').css("display","block");
		$('#tdError').css("display","block");
		$('#mensajeError').html('Error: Kilometraje menor a la ultima movilización');


		document.getElementById("tipo").disabled=true;

		    $('#trdetalle').css("display","none");
			$('#trtrabajo').css("display","none");
			$('#tddetalle').css("display","none");
			$('#tdtrabajo').css("display","none");

				$('#mensaje').css("display","none"); 
	 		$('#trMensaje').css("display","none");
	 		$('#tdMensaje').css("display","none");
	 		
	 		$('#mante').css("display","none"); 
	 		$('#trMante').css("display","none");
			$('#tdMante').css("display","none");
		
	
	}else if(kilometrajeMovilizacion1<kilometrajePress1){
	
	
		$('#mensajeError').css("display","none"); 
		$('#trError').css("display","none");
		$('#tdError').css("display","none");
		document.getElementById("tipo").disabled=false;

	

	
	}

}
</script>
<script type="text/javascript">

	$(document).ready(function(){

		$("#formulario_ajax1").submit(function(){
			$.ajax({
				url:  $(this).attr("action"),
				type: $(this).attr("method"),
				data: $(this).serialize(),
			
				success: function(data) 
				{ // Aquí desaparece la imagen ya que estamos reemplazando todo el HTML del contenido de la div. 

      					$('#contenido').html(data);
      			}
			});
				return false;
		});
			
	}
	);

</script>
<script>
$('#fechaMante').datepicker();

</script>

<script type="text/javascript">
function actualizar_tipoV(){
	var tipo_vehiculo2 = $('#tipo_vehiculo2').val();
	var cod_vehiculo = $('#cod_vehiculo').val();

    $.post(base_url+'talleres/actualizar_t',
	{'tipo_vehiculo2': tipo_vehiculo2,
	'cod_vehiculo':cod_vehiculo}, 
		function(data){ $('#nuevos_datos').html(data);      
    });
}
</script>
<script type="text/javascript">
function cargarKilometraje(recoge){	
	document.getElementById('obtiene_preventivo').value=recoge;	
}
</script>


	



