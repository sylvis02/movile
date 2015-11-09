<div id="table">
<table class="table table-bordered table-striped" id='logs'>
  <thead>
       	<tr>
	  
	 		<th><b>NUMERO</b></th>
	  		<th><b>FECHA</b></th>
     	  	<th><b>NOMBRE TABLA</b></th>
	  		<th><b>ACCIÓN</b></th>
	  		<th><b>DESCRIPCIÓN</b></th>
        </tr>
</thead>

<tbody>
<?php if($actividades_usuarios){ 
	
	foreach ($actividades_usuarios as $key ) {?>

	<tr>
	  <td><?php echo  $key->id_audit; ?></td>
	  <td><?php echo  $key->fecha; ?></td>			
	  <td><?php echo  $key->nombre_tabla; ?></td>
	  <td><?php echo  $key->operacion; ?></td>	

	  <td> <?php if  ($key->operacion=='D'){
	  		
	 	 	$valorAnterior=$key->valor_anterior;
	  		$porcionesA=explode(",",$valorAnterior);
			echo $porcionesA[0];
			echo "<br/>";
			echo $porcionesA[1];
			echo "<br/>";
			echo $porcionesA[2];
			echo "<br/>";
			echo $porcionesA[3];
			echo "<br/>";
			echo $porcionesA[4];
		
			}

			 else {
			 		$valorNuevo=$key->valor_nuevo;
			 		$porciones=explode(",", $valorNuevo);

             		echo nl2br($porciones[0]."\n".$porciones[1]."\n".$porciones[2]."\n".$porciones[3]."\n".$porciones[4]);
			} ?>



	  </td>
	 
	</tr>
<?php } 
}else{?><tr><td colspan="4">No se encontraron Resultados </td></tr> <?php } ?>
</tbody>
</table>
</div>
<div class="row" >
   <div class="col-md-9 col-md-offset-3">
	<nav class="nav navbar-nav navbar-right">
    		<ul class="pagination" id='pagination'>
  			<?php echo $paginacion; ?>
		</ul>
    	</nav>
   </div>
</div>

