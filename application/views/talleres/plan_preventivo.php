<div id="contenido" style="width:80%; margin:auto;">      
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-4">PLAN DE MANTENIMIENTO PREVENTIVO</div>
                <ul class="nav navbar-nav navbar-right">
                 <a  href="#" onClick="anadir_plan();" class='btn btn-primary btn-xs'><b>Añadir</b></a>

              </ul>
          </div>
        </div>
  	<table class='table table-bordered  table-striped' id='plan_preventivo'>
	<thead>
		<tr>
			<td><b>Kilometraje</b></td>
			<td><b>Descripcion</b></td>
			<td><b>Tipo vehiculo</b></td>
			<td><b>Gasolina</b></td>
			<td><b>Actualiza</b></td>
			<td><b>Eliminar</b></td>
    </thead>
	<tbody id='table'>
	<?php foreach ($preventivo as $item) {?>
		<tr>
			<td><?php echo $item->kilometraje1?></td>
			<td><?php echo $item->descripcion?></td>
			<?php if($item->cod_tipo_vehiculo==0){?>
			<td><?php echo 'Todos';?></td>
			<?php }else{ foreach ($tipo_vehiculo->result() as $tipo) {
					if($tipo->id_veh_tipo==$item->cod_tipo_vehiculo){
			?>
				<td><?php echo $tipo->tipo;?></td>
			<?php } 

		}
	}
		 if($item->cod_gasolina==0){?>
			<td><?php echo 'Todos';?></td>
			<?php }else{ foreach ($combustible->result() as $combus) {
					if($combus->cod_gasolina==$item->cod_gasolina){
			?>
				<td><?php echo $combus->nombre_gasolina;?></td>
			<?php } 

		}
	
	}?>

			<td><a  data-toggle="tooltip" data-original-title="Editar"  href="#" onClick='actualizarPlan(<?php echo $item->id_man_preven;?>);'><i class="glyphicon glyphicon-edit"></i></a></td>
			<td><a  data-toggle="tooltip" data-original-title="Eliminar"  href="#"  onClick='eliminarPlan(<?php echo $item->id_man_preven;?>);'><i class="glyphicon glyphicon-remove"></i></a></td>
			
		</tr>
		<?php }?>
	</tbody>
</table>

</div>
<script type="text/javascript">
function anadir_plan(){
  $('#contenido').html('');
  $('#contenido').load(base_url+'talleres/agre_mante_preventivo');
}

function eliminarPlan(cod_plan_preven){
	 jConfirm('Desea eliminar este proceso?', 'Gestión Vehicular', function(r) {
      if(r==true){
		 $.post(base_url+'talleres/eliminar_plan_man_preven',
		 {'codigo': cod_plan_preven}, 
		  function(data){ 
			location.href=base_url+'talleres/plan_preventivo';
        });
	  }
   	});
}

function actualizarPlan(cod_plan_preven){
	//alert(cod_plan_preven);
	
		 $.post(base_url+'talleres/actualizar_view_plan_preven',
		 {'codigo': cod_plan_preven}, 
		  function(data){ 
			$('#contenido').html(data);
        });
}
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#plan_preventivo').DataTable( {
      "language": {
            "url": base_url+"js/Spanish.json",
        }

    } );
} );
</script>




