
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
		 	<div class="col-md-4">SOLICITUD DE MOVILIZACIÓN</div>
			  	<div class="nav navbar-nav navbar-right">
					<a href="#"  onclick='modificar();'class="btn btn-primary btn-sm"><i class='glyphicon glyphicon-edit'></i>Editar</a>
				</div>
		</div>
	</div>
  <div class="panel-body">
  	<div class='alert alert-success'> Su solicitud se ha guardado Correctamento, si sus datos son correctos proceda a enviarla para asignar  el Vehiculo</div>
	<table align='center' class="table">	

			<?php foreach ($movilizacion->result() as $item ) {?>
		
			<tr>
				<td align='left' width='144'>Solicitante:</td>
				<td colspan='3' align='left'><b><?php echo $item->osolicitante;?></b></td>
			</tr>
          	<tr>
				<td align='left'>Fecha Salida:</td>
				<td align='left'><b><?php echo $item->ofecha_salida;?></b></td>
				<td align='right' width='117'>Fecha Llegada:</td>
				<td  align='left'><b><?php echo $item->ofecha_llegada;?></b></td>
			</tr>
			<tr>
				<td align='left'>Hora Salida:</td>
				<td align='left'><b><?php echo $item->ohora_salida;?></b></td>
				<td align='left'>Hora Retorno:</td>
				<td align='left'><b><?php echo $item->ohora_retorno;?></b></td>
			</tr>
          	<tr>
				<td align='left'>Motivo:</td>
				<td colspan='3' align='left'><b><?php echo $item->omotivo;?></b></td>
			</tr>
			<tr>
				<td align='left'>Ruta:</td>
				<td colspan='3' align='left'><b><?php echo $item->odestino;?></b></td>
			</tr>
              <tr>
				<td align='left'> Departamento:</td>
				<td colspan='3' align='left'><b><?php echo $item->odepartamento;?></b></td>
			</tr>
           <tr>
				<td align='left' width='144'>N&uacute;mero de ocupantes:</td>
				<td colspan='3' align='left'><b><?php echo $item->oocupantes;?></b></td>
			</tr>	
            <tr>
				<td align='left'>Nombres de ocupantes:</td>
				<td colspan='3' align='left'><b><?php echo $item->ointegrantes;?></b></td>
			</tr>
			<tr>			
	 			
				<td width="20" colspan="2" align="left">
			        <input type="hidden" name="cod_movilizacion" value="<?php echo $item->ccod_movilizacion;?>" id="cod_movilizacion">
				<a href="#"  onclick="enviarAprobar();" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-check"></i>Asignar Vehiculo</a>
				
				</td>
			</tr>
			<?php } ?>
	</table>

</div>
</div>

<script>
function enviarAprobar()  { 
	var dato = $('#cod_movilizacion').val();
	$('#contenido').load(base_url+'movilizacion/enviarAprobar/'+dato);
}
function modificar(){
	var codigo = $('#cod_movilizacion').val();
	 $.post(base_url+'movilizacion/viewSolicitudMovi',
	{'codigo': codigo}, 
		function(data){ $('#contenido').html(data);      
    });
}

function regresarListaAprobacion(){
 $('#contenido').load(base_url+'movilizacion/enviarAprobar/'+dato);

}
</script>