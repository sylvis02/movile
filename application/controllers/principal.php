
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('usuario_model');
		$this->load->model('principal_model');
		$this->load->model('movilizacion_model');
		$this->load->helper('url');
	} 

	public function index()	{
	
		
			$this->load->view('headers');	
		$this->load->view('principal');	
	}

	public function MatriculaSoat(){
		date_default_timezone_get('UTC');
    	$fecha_act=date("d/m/Y");
    	$fechagu="";
		$repMaSo['mat_soat']=$this->principal_model->getMatriculaSoat();
		$repMaSo['fechaactual']=date("d/m/Y");
		$this->load->view('reportes/matricula_soat',$repMaSo);

	}

	public function Provicion_Combustible(){
		$Provicion_Combustibles['detalle']=$this->principal_model->getProvicion_Combustible_Detalle();
		$Provicion_Combustibles['prov_combus']=$this->principal_model->getProvicion_Combustible();
		$this->load->view('reportes/provicion_combustible',$Provicion_Combustibles);

	}

	public function Repuestos(){
		
		$this->load->view('reportes/repuestos');
	}

	public function Repuestos_Excel(){
		
		$this->load->view('reportes_excel/reporte_repuestos_excel');
	}

	public function Combutible_Excel(){
		$Provicion_Combustibles['detalle']=$this->principal_model->getProvicion_Combustible_Detalle();
		$Provicion_Combustibles['prov_combus']=$this->principal_model->getProvicion_Combustible();
		$this->load->view('reportes_excel/reporte_combustible_excel',$Provicion_Combustibles);
	}	

	public function Vehiculos_Excel(){
		$repVe['vehiculo']=$this->principal_model->getVehiculos();
		$this->load->view('reportes_excel/reporte_vehiculos_excel',$repVe);

	}
	
	public function Conductores_Excel(){
		$repCon['conductor']=$this->principal_model->getConductores();
		$this->load->view('reportes_excel/reporte_conductores_excel',$repCon);

	}

	public function Mat_Soat_Excel(){
		date_default_timezone_get('UTC');
    	$fecha_act=date("d/m/Y");
    	$fechagu="";
		$repMaSo['mat_soat']=$this->principal_model->getMatriculaSoat();
		$repMaSo['fechaactual']=date("d/m/Y");
		$this->load->view('reportes_excel/reporte_mat_soat_excel',$repMaSo);

	}
	
	public function Movilizacion_Excel(){
		$repMov['movilizacion']=$this->principal_model->getMovilizacion();
		$this->load->view('reportes_excel/reporte_movilizacion_excel',$repMov);

	}
	public function servicio_prueba(){
		$clase_ma['clase_material']=$this->principal_model->getClaseMaterial();
   		$this->load->view('reportes/repuestos',$clase_ma);

	}
	public function repuestos_excel_final(){
		$repRepu['repuestos']=$this->principal_model->getRepuestosExcel();
		$this->load->view('reportes_excel/repuestos_excel',$repRepu);

	}

	public function solicitud_talleres_repuesto(){

		$codigo=$this->input->post('CLAID');
		$buscarClaseR1['claseRepuesto1']=$this->principal_model->getBuscarClaseRepuestoporVehiculo($codigo);?>

		<select name="repuesto1" id='repuesto1' class="form-control" onchange='cargarItem();'> <option value''>--SELECCIONE--</option> <?php
			if($buscarClaseR1['claseRepuesto1']){
			foreach ($buscarClaseR1['claseRepuesto1']->result() as $row1) {?>
		        <option value="<?php echo $row1->MATNOMBRE;?>"><?php echo $row1->MATNOMBRE." ";?><span class="badge"><?php echo $row1->STK_EXISTENCIA;?></span></option>
        <?php  }
		}else {?> <option value="0"></option> <?php }?>
        </select><?php
	}


	
	public function kilometrajeMantenimiento(){

		$kilometrajeMovilizacion=$this->input->post('kilometraje3');
		$kilometrajeCompa=$this->input->post('kilometraje2');
		$kilometraje1=$this->input->post('kilometraje');
		$cod_gasolina1=$this->input->post('cod_gasolina');
		$tipo_vehiculo1=$this->input->post('tipo_vehiculo');
		$cod_chofer1=$this->input->post('cod_chofer');

		
		if($kilometrajeCompa){
		
			$numThingsInt1=intval($kilometraje1);
			$numThingsInt2=intval($kilometrajeMovilizacion);
			$obtiene=($numThingsInt1 - $numThingsInt2);
			if(($obtiene>=5000) and ($obtiene<10000)){
				$obtiene=5000;
			
				$buscarKilometraje_preventivo['des']=$this->principal_model->getKilometrajeMan_preve($obtiene,$cod_gasolina1,$tipo_vehiculo1);
				if($buscarKilometraje_preventivo['des']){
					foreach ($buscarKilometraje_preventivo['des']->result() as $item1) {
						$descripcion1=$item1->descripcion;
						echo "<b>".$descripcion1." a los ".$obtiene." km </b>";
						
						echo "<script type='text/javascript'> 
             
               					cargarM3('".$descripcion1."'); 
        					</script> ";
					}
				echo "<br><br><tr><td colspan='4'><label>DETALLE DE DESPERFECTOS</label>
				<textarea class='form-control' name='detalle_desperfecto' id='detalle_desperfecto' cols='60' rows='5'  ></textarea></td></tr>
				<tr><td colspan='4'><label>TRABAJO REALIZADO</label>
				<textarea class='form-control' name='trabajo_realizado' id='trabajo_realizado'cols='60' rows='5' ></textarea></td></tr>
				<input type='hidden' id='obtiene_preventivo' name='obtiene_preventivo' value='".$obtiene."'>
				";
				}
			
			}elseif(($obtiene>=10000)and($obtiene<20000)){
						$obtiene=10000;
				$buscarKilometraje_preventivo['des']=$this->principal_model->getKilometrajeMan_preve($obtiene,$cod_gasolina1,$tipo_vehiculo1);
				if($buscarKilometraje_preventivo['des']){
					foreach ($buscarKilometraje_preventivo['des']->result() as $item1) {
						$descripcion1=$item1->descripcion;
						echo "<b>".$descripcion1." a los ".$obtiene." km </b>";
						
						echo "<script type='text/javascript'> 
             
               					cargarM3('".$descripcion1."'); 
        					</script> ";
					}
				echo "<br><br><tr><td colspan='4'><label>DETALLE DE DESPERFECTOS</label>
				<textarea class='form-control' name='detalle_desperfecto' id='detalle_desperfecto' cols='60' rows='5'  ></textarea></td></tr>
				<tr><td colspan='4'><label>TRABAJO REALIZADO</label>
				<textarea class='form-control' name='trabajo_realizado' id='trabajo_realizado'cols='60' rows='5' ></textarea></td></tr>
				<input type='hidden' id='obtiene_preventivo' name='obtiene_preventivo' value='".$obtiene."'>
				";
				}
			}elseif (($obtiene>=25000)and($obtiene<30000)) {
					
			
						$obtiene=25000;
				$buscarKilometraje_preventivo['des']=$this->principal_model->getKilometrajeMan_preve($obtiene,$cod_gasolina1,$tipo_vehiculo1);
				if($buscarKilometraje_preventivo['des']){
					foreach ($buscarKilometraje_preventivo['des']->result() as $item1) {
						$descripcion1=$item1->descripcion;
						echo "<b>".$descripcion1." a los ".$obtiene." km </b>";
						
						echo "<script type='text/javascript'> 
             
               					cargarM3('".$descripcion1."'); 
        					</script> ";
					}
				echo "<br><br><tr><td colspan='4'><label>DETALLE DE DESPERFECTOS</label>
				<textarea class='form-control' name='detalle_desperfecto' id='detalle_desperfecto' cols='60' rows='5'  ></textarea></td></tr>
				<tr><td colspan='4'><label>TRABAJO REALIZADO</label>
				<textarea class='form-control' name='trabajo_realizado' id='trabajo_realizado'cols='60' rows='5' ></textarea></td></tr>
				<input type='hidden' id='obtiene_preventivo' name='obtiene_preventivo' value='".$obtiene."'>
				";
				}

			}elseif (($obtiene>=30000)and($obtiene<50000)) {
							$obtiene=30000;
			
				$buscarKilometraje_preventivo['des']=$this->principal_model->getKilometrajeMan_preve($obtiene,$cod_gasolina1,$tipo_vehiculo1);
				if($buscarKilometraje_preventivo['des']){
					foreach ($buscarKilometraje_preventivo['des']->result() as $item1) {
						$descripcion1=$item1->descripcion;
						echo "<b>".$descripcion1." a los ".$obtiene." km </b>";
						
						echo "<script type='text/javascript'> 
             
               					cargarM3('".$descripcion1."'); 
        					</script> ";
					}
				echo "<br><br><tr><td colspan='4'><label>DETALLE DE DESPERFECTOS</label>
				<textarea class='form-control' name='detalle_desperfecto' id='detalle_desperfecto' cols='60' rows='5'  ></textarea></td></tr>
				<tr><td colspan='4'><label>TRABAJO REALIZADO</label>
				<textarea class='form-control' name='trabajo_realizado' id='trabajo_realizado'cols='60' rows='5' ></textarea></td></tr>
				<input type='hidden' id='obtiene_preventivo' name='obtiene_preventivo' value='".$obtiene."'>
				";
				}
			}elseif (($obtiene>=50000)and($obtiene<60000)) {
							$obtiene=50000;
				$buscarKilometraje_preventivo['des']=$this->principal_model->getKilometrajeMan_preve($obtiene,$cod_gasolina1,$tipo_vehiculo1);
				if($buscarKilometraje_preventivo['des']){
					foreach ($buscarKilometraje_preventivo['des']->result() as $item1) {
						$descripcion1=$item1->descripcion;
						echo "<b>".$descripcion1." a los ".$obtiene." km </b>";
						
						echo "<script type='text/javascript'> 
             
               					cargarM3('".$descripcion1."'); 
        					</script> ";
					}
				echo "<br><br><tr><td colspan='4'><label>DETALLE DE DESPERFECTOS</label>
				<textarea class='form-control' name='detalle_desperfecto' id='detalle_desperfecto' cols='60' rows='5'  ></textarea></td></tr>
				<tr><td colspan='4'><label>TRABAJO REALIZADO</label>
				<textarea class='form-control' name='trabajo_realizado' id='trabajo_realizado'cols='60' rows='5' ></textarea></td></tr>
				<input type='hidden' id='obtiene_preventivo' name='obtiene_preventivo' value='".$obtiene."'>
				";
				}
			}elseif (($obtiene==60000)) {
							$obtiene=60000;
				$buscarKilometraje_preventivo['des']=$this->principal_model->getKilometrajeMan_preve($obtiene,$cod_gasolina1,$tipo_vehiculo1);
				if($buscarKilometraje_preventivo['des']){
					foreach ($buscarKilometraje_preventivo['des']->result() as $item1) {
						$descripcion1=$item1->descripcion;
						echo "<b>".$descripcion1." a los ".$obtiene." km </b>";
						
						echo "<script type='text/javascript'> 
             
               					cargarM3('".$descripcion1."'); 
        					</script> ";
					}
				echo "<br><br><tr><td colspan='4'><label>DETALLE DE DESPERFECTOS</label>
				<textarea class='form-control' name='detalle_desperfecto' id='detalle_desperfecto' cols='60' rows='5'  ></textarea></td></tr>
				<tr><td colspan='4'><label>TRABAJO REALIZADO</label>
				<textarea class='form-control' name='trabajo_realizado' id='trabajo_realizado'cols='60' rows='5' ></textarea></td></tr>
				<input type='hidden' id='obtiene_preventivo' name='obtiene_preventivo' value='".$obtiene."'>
				";
				}
			}elseif ($obtiene<5000) {
		
				
					echo "No existe ningun mantenimiento planificado para ese kilometraje";
				
				
			}elseif ($obtiene>60000) {
					echo "No existe ningun mantenimiento planificado para ese kilometraje";
					
			}
		}else{
			echo "<script type='text/javascript'>
			bloquear();
			</script>";
			$mantenimiento_preventivo=$this->principal_model->getAllMantenimiento_Preventivo();
			echo "No existe un mantenimiento anterior al vehiculo, debe ingresaar uno nuevo";
			echo "	<select  id='selecionarMa' onchange='cargarMantenimiento2();' class='form-control' onclick='cargarM4();'>
				   		<option value=''>--Seleccione--</option>";
				   		foreach ($mantenimiento_preventivo->result() as $man) {
				   			echo "<option value='".$man->descripcion."' onclick='cargarKilometraje(".$man->kilometraje1.");'>".$man->descripcion."</option>";
							
				   			
				   		}	
				   		echo "</select>";

				   		echo "<br><br><tr><td colspan='4'><label>DETALLE DE DESPERFECTOS</label>
				<textarea class='form-control' name='detalle_desperfecto' id='detalle_desperfecto' cols='60' rows='5'  ></textarea></td></tr>
				<tr><td colspan='4'><label>TRABAJO REALIZADO</label>
				<textarea class='form-control' name='trabajo_realizado' id='trabajo_realizado'cols='60' rows='5' ></textarea></td></tr>
				<input type='hidden' id='obtiene_preventivo' name='obtiene_preventivo' value=''>	
				";
			
		}
	}


	public function control_mantenimiento(){
		$control_mantenimiento['control_mantenimiento1']=$this->principal_model->getControlMantenimiento();
		$this->load->view('reportes/control_mantenimiento',$control_mantenimiento);
	}
	

}
