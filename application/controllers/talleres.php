<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Talleres extends CI_Controller {
/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome:$kilometraje
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('principal_model');
		$this->load->model('talleres_model');
		$this->load->model('administracion_model');
		$this->load->library('session');
		$this->load->library('pagination');		
		$this->load->helper('url');
	}
	 
	public function index(){

		$this->load->view('headers');		
		$this->load->view('principal');	

	}

	public function solicitudMantenimiento(){
		$this->load->view('headers');	
		$this->load->view('principal');	
		$buscarClaseR['placas']=$this->talleres_model->getplacas();		
		$buscarClaseR['claseRepuesto']=$this->talleres_model->getBuscarClaseRepuesto();
	    	$this->load->view('talleres/solicitud',$buscarClaseR);

	}


	public function buscarSolicitudpLaca(){
		
		$codigo=$this->input->post('codigo1');
    		$nuevos_datos['datos'] = $this->talleres_model->buscarvehiculoPlaca($codigo);
    		$buscarClaseR['tipo_vehiculo']=$this->talleres_model->getTipos();
			
			if($nuevos_datos['datos']){
				foreach ($nuevos_datos['datos']->result() as $fila){
					$cod_vehiculo=$fila->cod_vehiculo;
					
				 ?>	
				<table class='table'>
				<input type='hidden' id='cod_vehiculo' name='cod_vehiculo' value='<?php echo $fila->cod_vehiculo ?>'>	
				<input type='hidden' id='cod_chofer' name='cod_chofer' value='<?php echo $fila->cod_chofer ?>'>	
				
				<tr>
					<td>Marca</td>
					<td><b><?php echo $fila->marca;?></b></td>
					<td>Tipo</td>
					<td><b><?php echo $fila->veh_tipo;?></b></td>
				</tr>
				<tr>
					<td>Modelo</td>	
					<td><b><?php echo $fila->modelo;?></b></td>
					<td>Num. GPL</td>
					<td><b><?php echo $fila->num_vehiculo;?></b></td>
				</tr>
				<tr>
					<td>Motor</td>
					<td><b><?php echo $fila->motor;?></b></td>
					<td>Chasis</td>
					<td><b><?php echo $fila->chasis;?></b></td>
				</tr>
					<td>Placa</td>
					<td><b><?php echo $fila->placa;?></b></td>
					<td>Año</td>
					<td><b><?php echo $fila->ano_fabricacion;?></b></td>
				</tr>
				<tr>
					<?php
					if($fila->nombres){?>
					<td>Operador</td>
					<td><b><?php echo $fila->nombres;?></b></td>
					<?php
					}else{?>
					<td class="warning"colspan="2"><div align="center"><b>No tiene Operador asignado</b></div></td>
					<?php
					}?>
					<td>Combustible</td>
					<td><b><?php echo $fila->nombre_gasolina;?></b></td>
					<input type='hidden' id='cod_gasolina' name='cod_gasolina' value='<?php echo $fila->cod_gasolina; ?>'>
					
				</tr>
				<tr>
					<td>Tipo de Vehiculo</td>
					<?php if($fila->vehiculo_tipo==''){ 
						?>
						 <td><select id="tipo_vehiculo2" name="tipo_vehiculo2" class="form-control" >
						 	<option value="">--SELECCIONAR--</option>
						 	<?php
						foreach ($buscarClaseR['tipo_vehiculo']->result() as $tipoV) { 
							?>

						<option value="<?php echo $tipoV->id_veh_tipo;?>"><?php echo $tipoV->tipo;?></option>
						<?php } ?>
					</select>
				</td><td><a onclick="actualizar_tipoV();" class="btn btn-default"><i class="glyphicon glyphicon-ok"></i></a></td>
					</td>
					<?php }else{ ?>
					<td><b><?php echo $fila->vehiculo_tipo;?></b></td>
					<input type='hidden' id='tipo_vehiculo' name='tipo_vehiculo' value='<?php echo $fila->id_veh_tipo; ?>'>
					<?php } 	 ?>

				</tr><?php
				if($fila->kilometraje){?>
				<tr>

					<td>Kilometroje de la ultima mantenimiento</td>
					<td><b><?php echo $fila->kilometraje;?></b></td>
					<input type='hidden' id='kilometraje2' name='kilometraje2' value='<?php echo $fila->kilometraje; ?>'>
					
				</tr>
				<?php
				}else{?>
				<tr class="warning">
					<td colspan="4"><div align="center"><b>No existe kilometraje del ultimo mantenimiento</b></div></td>					
					<input type='hidden' id='kilometraje2' name='kilometraje2' value='<?php echo 0; ?>'>
					
				</tr>
				<?php
				}
				if($fila->combustible){?>
				<tr>
					<td>Kilometroje de la ultima movilizacion</td>
					<td><b><?php echo $fila->combustible;?></b></td>
					<input type='hidden' id='kilometraje3' name='kilometraje3' value='<?php echo $fila->combustible; ?>'>
					
				</tr>
				<?php
				}else{?>
				<tr class="warning">
					<td colspan="4"><div align="center"><b>No existe el ultimo kilometraje de la movilizacion</b></div></td>
					<input type='hidden' id='kilometraje3' name='kilometraje3' value='<?php echo 0; ?>'>
					
				</tr>
				<?php
				}?>
				
		<?php } ?>


		</table>
	
	<?php }
		else { 

		$codigo1=$this->input->post('codigo1');
    		$nuevos_datos1 = $this->talleres_model->buscarexistencia($codigo1);
			if($nuevos_datos1){
		foreach ($nuevos_datos1->result() as $value) { 
				
					?>

			<div class="alert alert-warning" role="alert"> El siguiente vehiculo con placa <?php echo $value->placa; ?> no puede realizarse mantenimiento porque no se encuentra asignado a un conductor.</div>
		<?php 
			
			}
		}else{ ?>
					<div class="alert alert-warning" role="alert"> No existe ningun Registro</div>
		<?php 
					}
		
	}
	
}
public function actualizar_t(){
	  $ti=$this->input->post('tipo_vehiculo2');
	  $cod_vehiculo=$this->input->post('cod_vehiculo');

	  $data=$this->talleres_model->actu_tipo($ti,$cod_vehiculo);   
}
public function GetCountryName(){
        $keyword=$this->input->post('country');
        $data=$this->mautocomplete->GetRow($keyword);        
        echo json_encode($data);
    } 
	public function save_ordenesMantenimiento(){
		$extaerTipo=$this->input->post('tipo');

		if($extaerTipo=='MANTENIMIENTO'){
		$id_man_preven1=$this->input->post('id_man_preven');
		$stri="'".$id_man_preven1."'";
		$datos=$this->talleres_model->getPlan_preven_nombre($stri);
		$codigo1=$this->input->post('obtiene_preventivo');;
		
		$fecha=$this->input->post('fechaMante');
		$detalle=$this->input->post('detalle_desperfecto');
		$motivo=$this->input->post('tipo');
		$cod_chofer=$this->input->post('cod_chofer');
		$cod_vehiculo=$this->input->post('cod_vehiculo');
		$trabajo_realizado=$this->input->post('trabajo_realizado');
		$kilometraje=$this->input->post('kilometraje');

		$respSolicitud=$this->talleres_model->agregar_mantenimiento($fecha,$detalle,$motivo,$cod_chofer,$cod_vehiculo,$trabajo_realizado,$kilometraje,$codigo1);
		$id_ultimo=$this->talleres_model->getIdUltimo();
		foreach ($id_ultimo->result() as $idUl){
			$recoge=$idUl->cod_mantenimiento;
		}
		if($respSolicitud){
			$tammano=count($this->input->post('item1') );
			$cantidad=$this->input->post('cantidad1');
			$descripcion=$this->input->post('item1');
			$cont=0;
			while($cont<$tammano){
    			$data =array(
				             'cod_mantenimiento'=>$recoge,
				'repuesto'=>$descripcion[$cont],
				'cantidad'=>$cantidad[$cont]);
				 $reshistorial=$this->talleres_model->agregar_respuesto($data);	
				 $cont++;
			}
    				
		$datos['solicitud_mantenimiento'] = $this->talleres_model->getMantenimiento($recoge);
		$datos['repuesto'] = $this->talleres_model->getRepuesto($recoge);
		$this->load->view('talleres/vista_solicitud',$datos);
		}else{
			echo "no se pudo ingresar";
		}
		}else{
			$id_man_preven1=$this->input->post('id_man_preven');
		$stri="'".$id_man_preven1."'";
		$datos=$this->talleres_model->getPlan_preven_nombre($stri);
		$codigo1=0;
		
		$fecha=$this->input->post('fechaMante');
		$detalle=$this->input->post('detalle_desperfecto1');
		$motivo=$this->input->post('tipo');
		$cod_chofer=$this->input->post('cod_chofer');
		$cod_vehiculo=$this->input->post('cod_vehiculo');
		//$trabajo_realizado=$this->input->post('trabajo_realizado1');
		$kilometraje=$this->input->post('kilometraje');
		//echo $trabajo_realizado;
		//exit();
		$respSolicitud=$this->talleres_model->agregar_mantenimiento($fecha,$detalle,$motivo,$cod_chofer,$cod_vehiculo,$detalle,$kilometraje,$codigo1);
		$id_ultimo=$this->talleres_model->getIdUltimo();
		foreach ($id_ultimo->result() as $idUl){
			$recoge=$idUl->cod_mantenimiento;
		}
		if($respSolicitud){
			$tammano=count($this->input->post('item1') );
			$cantidad=$this->input->post('cantidad1');
			$descripcion=$this->input->post('item1');
			$cont=0;
			while($cont<$tammano){
    			$data =array(
				             'cod_mantenimiento'=>$recoge,
				'repuesto'=>$descripcion[$cont],
				'cantidad'=>$cantidad[$cont]);
				 $reshistorial=$this->talleres_model->agregar_respuesto($data);	
				 $cont++;
			}
    				
		$datos['solicitud_mantenimiento'] = $this->talleres_model->getMantenimiento($recoge);
		$datos['repuesto'] = $this->talleres_model->getRepuesto($recoge);
		$this->load->view('talleres/vista_solicitud',$datos);
		}else{
			echo "no se pudo ingresar";
		}
		}
	}

	public function historial_mantenimiento_view(){
		$this->load->view('headers');		
		$this->load->view('principal');
		$buscarClaseR['placas']=$this->talleres_model->getplacas();
			
		$this->load->view('talleres/list_historial_mantenimiento',$buscarClaseR);
	}

	public function prueba_simple_test_caso5(){		
		$this->load->library('unit_test');		
		$id_man_preven1=$this->input->post('id_man_preven');
		$stri="'".$id_man_preven1."'";
		$datos=$this->talleres_model->getPlan_preven_nombre($stri);
		$codigo1=1;		
		$fecha=$this->input->post('fecha');
		$detalle=$this->input->post('detalle_desperfecto1');
		$motivo=$this->input->post('tipo');
		$cod_chofer=$this->input->post('cod_chofer');
		$cod_vehiculo=$this->input->post('cod_vehiculo');
		$kilometraje=$this->input->post('kilometraje');
		$respSolicitud=$this->talleres_model->agregar_mantenimiento($fecha,$detalle,$motivo,$cod_chofer,$cod_vehiculo,
			$detalle,$kilometraje,$codigo1);
		if($respSolicitud){
			$tammano=count($this->input->post('item1') );
			$cantidad=$this->input->post('cantidad1');
			$descripcion=$this->input->post('item1');
			$cont=0;
			while($cont<$tammano){    			
				 $tests1 = Array((integer) $respSolicitud,(String) $descripcion[$cont],(integer) $cantidad[$cont]);	
				foreach ($tests1 as $test1) {
					$esperado1=$test1;
					$this->unit->run($test1,$esperado1,"".$test1."");
				} $cont++;
			}}
		$tests = Array((String) $fecha,(String) $detalle,(String) $motivo,(integer) $cod_chofer,(integer) $cod_vehiculo,
				(integer) $detalle,(integer) $kilometraje,(integer) $codigo1);	
		foreach ($tests as $test) {
			$esperado=$test;
			$this->unit->run($test,$esperado,"".$test."");
		}
		echo $this->unit->report();
	}

	

	public function busquedaSesion_historial(){

		$codigohistorial= array('codigo_historial'=>strtoupper($this->input->post('codigo')));
		$this->session->set_userdata($codigohistorial);
		$this->historial_mantenimiento();

	}

	public function historial_mantenimiento(){
		
		$lista['historial_mantenimiento'] = $this->talleres_model->getHistorialVehiculo(0,0);
		$desdec= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	
		$config['base_url']= base_url().'talleres/historial_mantenimiento/';
		$config['total_rows']=count($lista['historial_mantenimiento']);
		$config['per_page']=7;
		$config['uri_segment'] = 3;
		$config['num_links']=4;
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['last_link'] = FALSE;
	    $config['first_link'] = FALSE;
	    $config['next_link'] = '&raquo;';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
	    $config['prev_link'] = '&laquo;';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';

	    $this->pagination->initialize($config);

	    $datos=array('datos'=>$this->talleres_model->getHistorialVehiculo($config['per_page'],$desdec),
	    			'paginacion'=>$this->pagination->create_links());

	    $this->load->view('talleres/list_historial', $datos);

	


	}
	
	public function plan_preventivo(){
		$this->load->view('headers');
		$this->load->view('principal');

		$lista['plan_preven'] = $this->talleres_model->getPreventivo(0,0);
		$desde= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	
		$datos =array(
					'preventivo'=>$this->talleres_model->getPreventivo(0, 0),
					'combustible'=>$this->administracion_model->get_select_combustibleRegVehciulo(),
					'tipo_vehiculo'=>$this->administracion_model->get_select_veh_tipo());

		$this->load->view('talleres/plan_preventivo',$datos);


	}
	public function control_mantenimiento(){
		$codigo= strtoupper($this->input->post('codigo'));
		
		$datos=$this->talleres_model->getControlMantenimiento($codigo);

			if($datos){
				foreach ($datos->result() as $item) {?>
					<tr>
						<td><?php echo $item->fecha; ?></td>
						<td><?php echo $item->detalle; ?></td>
						<td><?php echo $item->kilometraje; ?></td>
						<td></td>
						<td><?php echo $item->id_man_preven; ?></td>
						
					</tr>
				<?php }
			}else{?>
			<div class="alert alert-warning" role="alert"> No se puede ingresar el registro</div>
			<?php }
	}
	public function agre_mante_preventivo(){

		$datos['tipo_vehiculo']=$this->administracion_model->get_select_veh_tipo();
		$datos['gasolina']=$this->administracion_model->get_select_combustibleRegVehciulo();
		$datos['claseRepuesto']=$this->principal_model->getBuscarClaseRepuesto();
		$this->load->view('talleres/save_plan_mant_preventivo', $datos);
    }

	public function cargarModelo_vehiculo(){

		$codigo=$this->input->post('codigo');
			$datos['modelo']=$this->talleres_model->getModelo($codigo);?>
			<option value='0'>--SELECCIONE--</option>
			<?php foreach ($datos['modelo']->result() as $item ) {?>

				<option value='<?php echo $item->modelo; ?>'><?php echo $item->modelo;?></option>
		<?php	}
	}

	public function cargarVehiculo_modelo(){
	
		$codigo=$this->input->post('codigo');
		$datos['vehiculo']=$this->talleres_model->getvehiculo_modelo($codigo);

		foreach ($datos['vehiculo']->result() as $item) { ?>
			<div><?php echo  $item->num_vehiculo;?></div>
		
		<?php }
	
	}

	public function save_ordenesMantenimiento_Preventivo(){
		$data = array(
				'kilometraje1'=>$this->input->post('kilometraje'),			
				'descripcion'=>$this->input->post('descripcion'),
				'cod_tipo_vehiculo'=>$this->input->post('tipo_vehiculo'),
				'cod_gasolina'=>$this->input->post('gasolina'));
		      
		$mantenimiento_preventivo=$this->talleres_model->agregar_mantenimiento_Preventivo($data);
	}

	public function repuesto_preventivo(){
		$kilometraje=$this->input->post('kilometraje');
		$cod_vehiculo=$this->input->post('cod_vehiculo');

		

	}
	public function eliminar_plan_man_preven(){
		$codigo=$this->input->post('codigo');
		$datos=$this->talleres_model->deletePlan_preven($codigo);

	}
	public function actualizar_view_plan_preven(){
		$codigo=$this->input->post('codigo');
		$datos['tipo_vehiculo']=$this->administracion_model->get_select_veh_tipo();
		$datos['gasolina']=$this->administracion_model->get_select_combustibleRegVehciulo();
	    $datos['plan_preven']=$this->talleres_model->getPlan_preven($codigo);
		$this->load->view('talleres/actu_plan_preven', $datos);

	}
	public function actualizar_plan_preven(){

		$codigo = $this->input->post('cod_plan_preven');

		$data = array(
				'kilometraje1'=>$this->input->post('kilometraje'),			
				'descripcion'=>$this->input->post('descripcion'),
				'cod_tipo_vehiculo'=>$this->input->post('tipo_vehiculo'),
				'cod_gasolina'=>$this->input->post('gasolina'));
		     

		$datos=$this->talleres_model->update_plan_preven($codigo,$data);
	

	}

	public function repuestos_vizualizar_reporte(){
		$codigo=$this->input->post('codigo');
		$datos['repuestos_utili']=$this->talleres_model->getRepuestosUtilizados($codigo);
		
		$this->load->view('reportes/reporte_repuestos_utilizados', $datos);
	}

	public function reporte_control_mantenimiento_view(){
		$this->load->view('headers');
		$this->load->view('principal');
		$busqueda= array('vehiculo'=>$this->talleres_model->obtenerCriteriosBusqueda_mantenimiento(1),
						'conductor'=>$this->talleres_model->obtenerCriteriosBusqueda_mantenimiento(2));
		$this->load->view('reportes/control_mantenimiento', $busqueda);
	}

	public function busquedaReporteSesion(){
		$datac= array('fecha_desdec'=>$this->input->post('fecha_desde'),
					'fecha_hastac'=>$this->input->post('fecha_hasta'),
					'tipoc'=>$this->input->post('tipo'),
					'vehiculoc'=>$this->input->post('vehiculo'),
					'conductorc'=>$this->input->post('conductor'));
		
		$this->session->set_userdata($datac);
		$this->busquedaReporte();
		}

	public function busquedaReporte(){

		
		$control_mantenim = array('cmantenimiento'=>$this->talleres_model->getReporteBusqueda(0,0));
		$this->load->view('reportes/lista_mantenimiento', $control_mantenim);

		

			
	}

	public function reporte_excel_controlMantenimiento(){

		$datos['control_mantenimiento_excel']=$this->talleres_model->getReporteBusqueda(0,0);
		$this->load->view('reportes_excel/reporte_control_mantenimiento_excel', $datos);

	}

	public function reporte_excel_matricula(){
		date_default_timezone_set ("UTC");
		$repMaSo['mat_soat']=$this->administracion_model->getVehiculos_matsoat();
		$repMaSo['fechaactual']=date("d/m/Y");

		$this->load->view('reportes_excel/excel_matricula_soat',$repMaSo);
	}

	

}
