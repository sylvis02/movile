<div id="contenido" style="width:80%; margin:auto;">   
		<div class="panel panel-default">
		 <div class="panel-heading">Historial Mantenimiento</div>
		<table class='table'>
			<tr>
				<td width='30%' align="center"><b>Ingrese la placa el vehiculo</b></td>
				<td  align='center'>
					<input type="search" list="languages" id="buscar" name="buscar"  class="form-control">
          				<datalist id="languages">
          					 <?php foreach ($placas->result() as $placa) {?>
  							<option value="<?php echo $placa->placa;?>" />

    						 <?php }?>

					</datalist>
				</td> 
				
				<td><div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							Buscar <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
						    <li><a href="#" onclick="cargar_historial();">Placa</a></li>
						  
						</ul>
					</div>
				</td>
			</tr>
		</table>
		
		<div id='table'></div>

		</div>
	</div>

<script>
function cargar_historial(){

  var id = $('#buscar').val();
    $.post(base_url+'talleres/busquedaSesion_historial',
	{'codigo': id}, 
		function(data){ $('#table').html(data);      
    });
}
</script>
<script type="text/javascript">

      $(document).on("click", "#pagination li a", function(e){
          e.preventDefault();
         var href = $(this).attr("href");
        // alert(href);
         $("#table").load(href);
      }); 

</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#historial').DataTable();
} );
</script>






