<div id="contenido" style="width:80%; margin:auto;">      
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-4"> MATRICULA Y SOAT</div>
              <ul class="nav navbar-nav navbar-right">
                 <a  href="#" onClick="Exportar_matricula();" class='btn btn-primary btn-sm'><i class='glyphicon glyphicon-download'></i><b>Exportar a excel</b></a>

              </ul>
          </div>
        </div>
      <div class="panel-body">
      <table class='table'>
         
      <tr class='info'> <td><input  type='image' src="<?php echo base_url();?>/iconos/vencida.jpg" width='20' height='20'>Vencida Matricula  </td>
       <td><input  type='image' src="<?php echo base_url();?>/iconos/perfecto.png" width='20' height='20'>Vigencia Matricula  </td>
      <td><input  type='image' src="<?php echo base_url();?>/iconos/soat.png" width='20' height='20'>Vencido Soat  </td>
     <td><input  type='image' src="<?php echo base_url();?>/iconos/soat_si.png" width='20' height='20'>Vigencia Soat   </td></tr>
      
      </tabla>  


    <table border="0" align="center" id="seccion"  class='table table-striped table-bordered' aling='center'>
    <thead>
      <tr>
        <th>PLACA</th>
        <th>MARCA</th>
        <th>TIPO DE VEHICULO</th>
        <th>ESTADO VEHICULO</th>
        <th>FECHA DE VENCIMIENTO MATRICULACION</th>
        <th>FECHA DE VENCIMIENTO SOAT</th>

      </tr>
    </thead><tbody>
    <?php foreach ($mat_soat as $mati) {
      
    ?>
      <tr>
        <td><?php echo $mati->placa;?>&nbsp;</td>
        <td><?php echo $mati->marca; ?>&nbsp;</td>
    	  <td><?php echo $mati->tipo; ?>&nbsp;</td>
        <td><?php echo $mati->condicion_real; ?>&nbsp;</td>
       
        <td class="ITEMS_TABLA Estilo17" align="center"><?php 
      	date_default_timezone_set('UTC');
	$fechaMatricula=date("d/m/Y",strtotime($mati->fecha_mat));
	$fechaSoat=date("d/m/Y",strtotime($mati->fecha_soat));
        if($fechaMatricula<$fechaactual){
           echo "<input  type='image' src='".base_url()."iconos/vencida.jpg' width='20' height='20' OnmouseOver='return matricula();'>"."<br>"."VENCIDO<br>".$mati->fecha_mat;
        }else{

           echo "<input type='image' src='".base_url()."iconos/perfecto.png' width='20' height='20'>"."<br>"."VIGENCIA<br>".$mati->fecha_mat;
        }?>  </td>
        <td class="ITEMS_TABLA Estilo17" align="center"><?php 
          if($fechaSoat<$fechaactual){
           echo "<input type='image' src='".base_url()."iconos/soat.png' width='20' height='20' OnmouseOver='return soat();' >"."<br>"."VENCIDO<br>".$mati->fecha_soat;
          }else{
           echo "<input type='image' src='".base_url()."iconos/soat_si.png' width='20' height='20'>"."<br>"."VIGENCIA<br>".$mati->fecha_soat;
          }?> </td>
          </tr>
      <?php }  ?>
    </tbody>
    </table>
<div class="row">
   <div class="col-md-9 col-md-offset-3">
    <nav class="nav navbar-nav navbar-right">
      <ul class="pagination" id='pagination'>
        <?php echo $paginacion; ?>
      </ul>
  </nav>
   </div>
</div>
</div>
</div>
</body>

</html>
<script type="text/javascript">
function imprimir(){
    
    document.location=base_url+'administracion/reporte_excel_Mat_Soat/'; 
}
function matricula(){
   
       alert('MATRICULA VENCIDA ');
    }
function soat(){
         alert('SOAT VENCIDO ');
}
</script>
<script type="text/javascript">
function Exportar_matricula(){
	document.location=base_url+'talleres/reporte_excel_matricula';
}
</script>
