<div id="contenido" style="width:80%; margin:auto;">   
<div class="panel panel-default">
  <div class="panel-heading"><span class="glyphicon glyphicon-user"></span>USUARIO</div>
  <div class="panel-body">
    BIENVENID@ AL SISTEMA, 
    <?php 
    	if($this->session->userdata('username'))
		echo strtoupper($this->session->userdata('username')); 
	?>
  <br>
  <br>
              
  <P>Descargar Manual</p> 
   <input type='image' src='<?php echo base_url();?>iconos/PDF_icon.png'  title='Imprimir' border='0' style="width:30px;height:30px" onClick='imprimirManual();'>
  </div>
</div>
</div>

<script type="text/javascript">
function imprimirManual(){

   var recibe=base_url+'iconos/manual.pdf';

        window.open(recibe, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=400, height=400");
}
</script>

	
