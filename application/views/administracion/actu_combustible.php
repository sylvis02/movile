<div class="panel panel-default">
  <div class="panel-heading">Actualizar Combustibles </div>
  <div class="panel-body">
  	<?php foreach ($actu_combustible1->result() as $combustibleC ) {?>
  <form id="actualizar_combustible" action="<?php echo base_url();?>administracion/actu_combustible_fin" method="post">
	<table  class="table">	
		
			<tr>						
				<td align='left'><label>Nombre del Combustible:</label>
				<input type='text' name='combustible' id='combustible'value='<?php echo $combustibleC->nombre_gasolina; ?>'class="form-control"  size='8' required/></td>
		    </tr>
			<tr>
			   <td align='left' colspan='3'><label>Precio:</label>
			     <input type='hidden' name='cod_g' id='cod_g' value='<?php echo $combustibleC->cod_gasolina; ?>'class="form-control"  required/>
     	
			    <input type='text' name='precio' id='precio' value='<?php echo $combustibleC->precio; ?>'class="form-control"  onkeypress="return validar(event);" required/></td>
     		</tr>
			<tr><td colspan='4' align='center'><input type="submit" value='Guardar'class="btn btn-primary" id="guardar" name="guardar" ></td></tr>
		
		</table>
	
		</form>
			<?php } ?>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
		$("#actualizar_combustible").submit(function(){

			$.ajax({
				url:  $(this).attr("action"),
				type: $(this).attr("method"),
				data: $(this).serialize(),
				success: function(data) 
				{     
                jAlert('Se ha guardo corrrectamente', 'Gestión Vehicular', function(r){
                if(r){
      			        location.href=base_url+'administracion/ListCombustibles';
                    }
                });
      			}
			});
				return false;
		});
			
	});
</script>
<script type="text/javascript">
function validar(e)
    {
        // capturamos la tecla pulsada
        var teclaPulsada=window.event ? window.event.keyCode:e.which;
 
        // capturamos el contenido del input
        var valor=document.getElementById("precio").value;
 
        // 45 = tecla simbolo menos (-)
        // Si el usuario pulsa la tecla menos, y no se ha pulsado anteriormente
        // Modificamos el contenido del mismo añadiendo el simbolo menos al
        // inicio
        if(teclaPulsada==45 && valor.indexOf("-")==-1)
        {
            document.getElementById("precio").value="-"+valor;
        }
 
        // 13 = tecla enter
        // 46 = tecla punto (.)
        // Si el usuario pulsa la tecla enter o el punto y no hay ningun otro
        // punto
        if(teclaPulsada==13 || (teclaPulsada==46 && valor.indexOf(".")==-1))
        {
            return true;
        }
 
        // devolvemos true o false dependiendo de si es numerico o no
        return /\d/.test(String.fromCharCode(teclaPulsada));
    }
    </script>

</script>
