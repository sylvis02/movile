<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movilizacion extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('parser');		
		$this->load->model('movilizacion_model');
		$this->load->model('talleres_model');
		$this->load->model('principal_model');
		$this->load->helper('url');
		$this->load->helper('numeros_helper');
	} 

	public function index(){
		$this->load->view('headers');
		$this->load->view('principal');	
	

	}

	public function solicitud(){
		
		$solicitudes = array(
			'solicitudPendiente'=>$this->movilizacion_model->getSolicitudes(),
			'solicitudEstado'=>$this->movilizacion_model->getEstadoSolicitudes(),
			'provincia'=>$this->movilizacion_model->getProvincias(),
			'cantones'=>$this->movilizacion_model->getCantones(),
			'parroquias'=>$this->movilizacion_model->getParroquias(),
			'empleados'=>$this->movilizacion_model->getEmpleados());


		$this->load->view('headers');
		$this->load->view('principal');	
		$this->load->view('movilizacion/solicitud',$solicitudes);	
	}

	public function buscarEmpleado($cedula){

		$buscar=$this->movilizacion_model->buscarEmpleado($cedula);
		$data=array();
		$i=0;
	
		if($buscar){
			foreach ($buscar->result() as $row) {
			$data[$i]["nombre"]=$row->nombre;
		    	$data[$i]["apellido"]=$row->apellido;
		        $data[$i]["descripcion"]=$row->descripcion;
	 		$data[$i]["mensaje"]=" ";	

          		}
	 		
		} else {$data[$i]["mensaje"]="No se encuentra registrado el empleado";}
		  echo json_encode($data);
			
	
	}

	public function save_solicitud(){
			
		
	date_default_timezone_set ("UTC");
		$actual= date("d/m/Y");

		$data = array(
				$this->input->post('nombres')." ".$this->input->post('apellidos'),
				$actual,
				$this->input->post('fecha_salida'),
				$this->input->post('fecha_llegada'),
				strtoupper($this->input->post('motivo')),
				strtoupper($this->input->post('ruta')),
				$this->input->post('ocupantes'),
				strtoupper($this->input->post('integrantes')),
				$this->input->post('kilometraje'),
				$this->input->post('departamento'),
				$this->input->post('hora_salida'),
				$this->input->post('hora_retorno'));
		$respSolicitud['movilizacion']=$this->movilizacion_model->agregarSolicitud($data);
		
	
		if($respSolicitud['movilizacion']){ 
			$this->load->view('movilizacion/enviarMovilizacion', $respSolicitud);
		}else{
			echo "Nose pudo ingresar";
		}


	}
	public function eliminarMovilizacion(){
		$codigo_movilizacion = $this->input->post('codigo');
		$eliminar = $this->movilizacion_model->elimnarMovilizacion($codigo_movilizacion);

	}
	public function viewSolicitudMovi(){
		$codigo =$this->input->post('codigo');
		$actuMovilizacion= array(
			'movilizacion'=> $this->movilizacion_model->getMovilizacion($codigo),
			'provincia'=>$this->movilizacion_model->getProvincias(),
			'cantones'=>$this->movilizacion_model->getCantones(),
			'parroquias'=>$this->movilizacion_model->getParroquias());
		$this->load->view('movilizacion/actu_movilizacion',$actuMovilizacion);
		
	}

	public function actualizarMovilizacion(){
		$data = array(
			$this->input->post('cod_movilizacion'),
			$this->input->post('fecha_salida'),
			$this->input->post('fecha_llegada'),
			$this->input->post('hora_salida'),
			$this->input->post('hora_retorno'),
			$this->input->post('motivo'),
			$this->input->post('ruta'),
			$this->input->post('ocupantes'),
			$this->input->post('integrantes'),
			$this->input->post('kilometraje'));
		$actualizarMovilizacion= $this->movilizacion_model->actualizarMovilizacion($data);
		if($actualizarMovilizacion){
			echo "Se ha guardado Correctamente los cambios";
		}
	}
	public function asignar_vehiculo(){
		$this->load->view('headers');
		$this->load->view('principal');
		$aprobacion['aprobacionSoli']=$this->movilizacion_model->getOrdenesMovi();
		$this->load->view('movilizacion/aprobacionMovilizacion', $aprobacion);	
	}


	public function enviarAprobar($codigo){
		$data = array(
			'estado'=>'1');
		
		$datosMoviActu=$this->movilizacion_model->estadoMovilizacion($codigo,$data);

		if($datosMoviActu){ ?>
			<div class="alert alert-success" role="alert"> Su solicitud ha sido enviada para su aprobaciòn y asignación de Vehiculo </div>
			
		<?php $this->asignacionVehiculo($codigo); 
		
		}else{ ?>

		<div class="alert alert-warning" role="alert"> Su solicitud no se ha enviado </div>

		
		<?php }
	}

	public function asignacionVehiculo($dato){
		$movilizacion['datosMovi']= $this->movilizacion_model->getMovilizacion($dato);
		$movilizacion['datosVehiculo'] = $this->movilizacion_model->getVehiculosDisponibles($dato,1);
		$this->load->view('movilizacion/asignacionVehiculo',$movilizacion);
		
	}

	public function asignarChoferDiferent(){
		$listchofer=$this->principal_model->getConductores();

		if($listchofer){?>
			<option value=''>--SELECCIONE--</option>
			<?php foreach ($listchofer->result() as $row ) {?>
				<option value="<?php echo $row->cod_chofer;?>"><?php echo $row->nombres; ?> </option>
			<?php }

		}
	}
	
	public function aprobarSolicitud_Movilizacion(){

		$observacion='';
		$cod_chofer;
		$actual= date("d/m/Y");
		$usuario=$this->session->userdata('username');
		$cod_movilizacion=$this->input->post('cod_movilizacion');

    		if($this->input->post('cod_chofer_dif')==0){
			$cod_chofer=$this->input->post('cod_chofer');  		
    		} else{
    			$cod_chofer=$this->input->post('cod_chofer_dif');  
    		}

  	   	if($this->input->post('observacion')!=null){
    			$observacion=$this->input->post('observacion');
		}

    	$data = array(
			$cod_movilizacion,
			$cod_chofer,
			$this->input->post('cod_vehiculo'),
			$actual,
			$usuario,
			$observacion);
    	$datosUpdate=$this->movilizacion_model->updateMovilizacion($data);

    	if($datosUpdate){?>
    	    <input type='image' src='<?php echo base_url();?>images/iconos/printer.png'  title='Imprimir' border='0' style="width:30px;height:30px" onClick='imprimir();'>

    <?php	}else{
    		echo "solicitud no aprobada";
    		
    	}

	}


	public function asignarCombustible($dato){
	$cod_vehiculo=0;
	$kilometraje=0;
		$movilizacion=$this->movilizacion_model->getAllMovilizacion($dato);
				
		if($movilizacion){
			
			foreach ($movilizacion->result() as $item) {
				$cod_vehiculo = $item->mcod_vehiculo;
				$kilometraje=$item->mkilometraje_recorrido;
				$rendimiento_galon=$item->mrendimiento_galon;
				
			}
		 }
		if($kilometraje==0 || $rendimiento_galon==0 ){
			  	$valorAsignado = 0;
			}else{
				$valorAsignado = intval( $kilometraje/$rendimiento_galon);
				
			}
		
          		$combustible = array(
					'gasolinera'=>$this->movilizacion_model->getGasolineras(),
					'partidasCombustible'=>$this->movilizacion_model->getPartidasCombustible(),
					'nombreCombustible'=>$this->movilizacion_model->getCombustible($cod_vehiculo),
					'datosMovi'=>$this->movilizacion_model->getAllMovilizacion($dato),
					'valorAsignado'=>$valorAsignado,
					'codigoMovilizacion'=>$dato);	
			
 			$this->load->view('movilizacion/asignarCombustible', $combustible);

	}
	
	public function agregarCombustible(){
		$combustible = array(
					'datosVehiculo' => $this->movilizacion_model->getVehiculosDisponibles(0,2),
					'gasolinera'=>$this->movilizacion_model->getGasolineras(),
					'partidasCombustible'=>$this->movilizacion_model->getPartidasCombustible());
		
		$this->load->view('movilizacion/anadirNuevoCombustible', $combustible);
	}

	public function save_ordenesCombustible(){
	$codigo_orden=$this->input->post('cod_movilizacion');
		$data = array(
				'fecha'=>$this->input->post('fecha'),
				'cantidad_asignada'=>$this->input->post('galones'),
				'despachada'=>'0',
				'cod_gasolina'=> $this->input->post('cod_gasolina'),
				'cod_gasolinera'=>$this->input->post('cod_gasolinera'),
				'kilometraje_recorrido'=>$this->input->post('kilometraje_recorrido'),
				'ruta'=>$this->input->post('ruta'),
				'cod_chofer'=>$this->input->post('cod_chofer'),
				'cod_vehiculo'=>$this->input->post('cod_vehiculo'),
				'km_salida'=>$this->input->post('km_salida'),
				'km_retorno'=>$this->input->post('km_retorno'),
				'hora_salida'=>$this->input->post('hora_salida'),
				'hora_retorno'=>$this->input->post('hora_retorno'),
				'cuenta_combus'=>$this->input->post('partida_combus'));

		$respOrdenesCombustible=$this->movilizacion_model->agregarOrdenesCombustible($data);
		
		if($respOrdenesCombustible){
			
			$ultimo_id= $this->movilizacion_model->ultimoidCombustible();
			foreach($ultimo_id->result() as $ultimo){
			  $id=$ultimo->cod_orden;
			  //actualizar el estado de combustible a movilización
				
			  $dataU = array('combu_asig'=>'1');
				

				$datosMoviCombusActu=$this->movilizacion_model->actuarMoviCombustible($codigo_orden,$dataU);

				
				?>
			
			<input type="image" src="<?php echo base_url();?>images/iconos/printer.png"  title="Imprimir" border="0" style="width:30px;height:30px" onClick='imprimir(<?php echo $id;?>);'>
				
	<?php	
			}
		}
		
	}
	public function asignarNombreGasolina(){

		$cod_vehiculo=$this->input->post('codigo');

		$nombreCombustible=$this->movilizacion_model->getCombustible($cod_vehiculo);

		foreach ($nombreCombustible->result() as $item) {
			echo $item->nombre_gasolina;
			echo "<input type='hidden' value='".$item->cod_gasolina."' name='cod_gasolina' id='cod_gasolina'>";
		}
	
	}
	public function anadir_nuevaOrdenCombustible(){
					
		$data = array(
				'fecha'=>$this->input->post('fecha'),
				'cantidad_asignada'=>$this->input->post('galones'),
				'despachada'=>'0',
				'cod_gasolina'=> $this->input->post('cod_gasolina'),
				'cod_gasolinera'=>$this->input->post('cod_gasolinera'),
				'kilometraje_recorrido'=>0,
				'cod_movilizacion'=>0,
				'ruta'=>strtoupper($this->input->post('ruta')),
				'cod_chofer'=>$this->input->post('cod_chofer'),
				'cod_vehiculo'=>$this->input->post('cod_vehiculo'),
				'km_salida'=>$this->input->post('km_salida'),
				'km_retorno'=>0,
				'cuenta_combus'=>$this->input->post('partida_combus'));
				

		$respOrdenesCombustible=$this->movilizacion_model->agregarOrdenesCombustible($data);
		
		if($respOrdenesCombustible){
			
			$ultimo_id= $this->movilizacion_model->ultimoidCombustible();
			foreach($ultimo_id->result() as $ultimo){
			  $id=$ultimo->cod_orden;?>
			
			<input type="image" src="<?php echo base_url();?>images/iconos/printer.png"  title="Imprimir" border="0" style="width:30px;height:30px" onClick='imprimir(<?php echo $id;?>);'>
				
	<?php	}
			}
		

	}

	public function aprobarCombustible(){
		$this->load->view('headers');
		$this->load->view('principal');
		
		$apOrdenesCombus['ordenesComusb']=$this->movilizacion_model->getOrdenesCombustible();
		$this->load->view('movilizacion/aprobarOrdenesCombustible',$apOrdenesCombus);
	}

	public function listarOrdenesCombustible(){
		$this->load->view('headers');
		$this->load->view('principal');
			
		$despOrdenesCombus= array('ordenesComusb'=>$this->movilizacion_model->getListadoOrdenesCombus(0,0));
							

		$this->load->view('movilizacion/listarOrdenesCombustible',$despOrdenesCombus);
	
	}

	public function despacharCombustible($cod_orden){
		$datos['numero_orden']=$cod_orden;
		$this->load->view('movilizacion/despachoCombustible',$datos);

	}

	public function update_ordenesCombustible(){
		echo "Hora salida ".$this->input->post('hora_salida');
		echo " Hora Retorno".$this->input->post('hora_retorno');


		$cantidad_despachada=$this->input->post('cantidad_despachada');
		$cod_orden = $this->input->post('cod_orden');
		$datosUpdate=$this->movilizacion_model->updateOrdenesCombustible($cod_orden, $cantidad_despachada, '1');
		if($datosUpdate){
			echo "Se actualizado Correctamente";
	
		 }
		
	}

	public function asignacionVehiculoChofer(){

		$cod_vehiculo=$this->input->post('codigo');
		$chofer=$this->talleres_model->buscarOperador($cod_vehiculo);

		if($chofer){
			foreach ($chofer->result() as $row ) {?>
				<input  type="text" name='chofer' id='chofer' class='form-control' value="<?php echo $row->nombres;?>" readonly />
				<input  type="hidden" name='cod_chofer' id='cod_chofer' class='form-control' value="<?php echo $row->cod_chofer; ?>" readonly />
				<input  type="hidden" name='cod_vehi' id='cod_vehi' class='form-control' value="<?php echo $cod_vehiculo;?>" readonly />
			<?php }

		}
	}

	public function eliminar_solicitud(){
		$codigo =$this->input->post('codigo');
		$datos=$this->movilizacion_model->deleteSolicitd($codigo);


	}

	public function reporte_movilizacion_view(){
		$this->load->view('headers');
		$this->load->view('principal');
		$opcionesBusqueda = array(
			'departamento'=>$this->movilizacion_model->obtenerCriteriosBusqueda_movilizacion(1),
			'solicitante'=>$this->movilizacion_model->obtenerCriteriosBusqueda_movilizacion(2),
			'vehiculo'=>$this->movilizacion_model->obtenerCriteriosBusqueda_movilizacion(3),
			'conductor'=>$this->movilizacion_model->obtenerCriteriosBusqueda_movilizacion(4));

	
		$this->load->view('reportes/reporte_movilizacion',$opcionesBusqueda);

	}

	public function reporte_movilizacion_view_sescion(){

		$datam = array(
			'fecha_desdem'=>$this->input->post('fecha_desde'),
			'fecha_hastam'=>$this->input->post('fecha_hasta'),
			'departamentom'=>$this->input->post('departamento'),
			'vehiculom'=>$this->input->post('vehiculo'),
			'conductorm'=>$this->input->post('conductor'),
			'solicitantem'=>$this->input->post('solicitante'));


			$this->session->set_userdata($datam);
			$this->busquedaReporte();



	}

	public function busquedaReporte(){

			
	$movilizacion= array('busqueda'=>$this->movilizacion_model->getReporteBusqueda(0,0) );
				    

	$this->load->view('reportes/list_movilizacion', $movilizacion);
	
		
	}

	public function reporte_excel_movilizacion(){

			$lista['busqueda'] = $this->movilizacion_model->getReporteBusqueda(0,0);
			$this->load->view('reportes_excel/reporte_movilizacion_excel', $lista);
	}

	public function reporte_combustible_view(){
		$this->load->view('headers');
		$this->load->view('principal');
		$busqueda= array('vehiculo'=>$this->movilizacion_model->obtenerCriteriosBusqueda_combustible(1),
						'conductor'=>$this->movilizacion_model->obtenerCriteriosBusqueda_combustible(2));

		$this->load->view('reportes/provision_combustible', $busqueda);
	}

	public function busqueda_reporte_combustibleSesion(){
		
	$datap = array(
		'fecha_desdep'=>$this->input->post('fecha_desde'),
		'fecha_hastap'=>$this->input->post('fecha_hasta'),
		'vehiculop'=>$this->input->post('vehiculo'),
		'conductorp'=>$this->input->post('conductor'));

			$this->session->set_userdata($datap);
			$this->busqueda_reporte_combustible();

	

	}
	public function busqueda_reporte_combustible(){

		$provision_combustible = array('busqueda'=>$this->movilizacion_model->getReporteBusquedaCombustible(0,0),
							'paginacion'=>$this->pagination->create_links());
		$this->load->view('reportes/lista_privision_combustible', $provision_combustible);

	}

	public function reporte_combutible_Excel(){

		$datos['control_mantenimiento_excel']=$this->talleres_model->getReporteBusqueda(0,0);
		$this->load->view('reportes_excel/reporte_control_mantenimiento_excel', $datos);
	}

	public function cargarCanton(){

	$canton =$this->input->post('codigo');
	echo $canton;?>
	<option value="0">--Seleccione--</option>	
	<?php if($canton=='LOJA'){
			$cantones = $this->movilizacion_model->cargarCantonesParroquias(1,$canton);

			if($cantones){?>
				
				
				<?php foreach ($cantones->result() as $canton) {?>

					<option value="<?php echo $canton->nombre;?>"><?php echo $canton->nombre;?></option>	
					
				<?php }
			}
	} else{?>

		<option value="<?php echo $canton;?>"><?php echo $canton;?></option>
	<?php } 

	}

	public function cargarParroquia(){

	$parroquia =$this->input->post('codigo');
	$canton =$this->input->post('provincia');?>
	<option value="0">--Seleccione--</option>
	<?php if($canton=='LOJA'){
					$cantones = $this->movilizacion_model->cargarCantonesParroquias(2,$parroquia);

				if($cantones){?>
					
						<?php foreach ($cantones->result() as $parroquia) {?>

							<option value="<?php echo $parroquia->nombre;?>"><?php echo $parroquia->nombre;?></option>	
			
					<?php }
				}
			}
			else{?>

		<option value="<?php echo $canton;?>"><?php echo $canton;?></option>
	<?php } 


	}

		public function reporte_excel_combutible(){
		$datos['combustibles_excel']=$this->movilizacion_model->getReporteBusquedaCombustible(0,0);
		$this->load->view('reportes_excel/excel_combustibles', $datos);

	}

	
	
}
