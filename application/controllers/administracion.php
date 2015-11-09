<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administracion extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('administracion_model');
		$this->load->model('conductores_model');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('url');
	
	}

	public function index(){

		$this->load->view('headers');		
		$this->load->view('principal');	
	}
	public function listadoUsuarios(){
		$this->load->view('headers');		
		$this->load->view('principal');	
		$datos['usuarios']=$this->usuario_model->getAllUsuarios();
		$this->load->view('administracion/usuarios', $datos);
	}

	public function view_asignarChofer(){

       		$cat_image_name = $_FILES["userfile"]["name"];
 
		$image_path = realpath(APPPATH . '../pdfs');

		$config['upload_path'] = $image_path ;
		$config['allowed_types']='pdf|doc|xls|docx|xlsx';
		$this->load->library('upload',$config);
		$this->upload->do_upload();
		$file_data=$this->upload->data();
		
		$destino = $file_data['file_name'];					
		date_default_timezone_set('UTC');
		$newDate = date("Y-m-d", strtotime($this->input->post('fechaAsignar')));
		$data = array(
			  $newDate,
			 $this->input->post('descripcion'),
			 '1',
			 $this->input->post('cod_chofer'),
			 $this->input->post('cod_vehiculo'),
			 $cat_image_name,
			 $this->input->post('revision')
			);
		
		echo $newDate;
		echo $this->input->post('descripcion');
		echo $this->input->post('cod_chofer');
		echo $this->input->post('cod_vehiculo');
		echo $cat_image_name;	
		echo $this->input->post('revision');
	
		$insertar=$this->administracion_model->asignarChofer($data);
		if($insertar){
			$update_vehiculo = $this->administracion_model->update_asig_chofer_vehiculo( $this->input->post('cod_vehiculo'));
			$update_chofer=$this->administracion_model->update_asig_chofer_chofer( $this->input->post('cod_chofer'));
		}
		
	}
	public function actualizar_vehiculo(){
		$cat_image_name = $_FILES["userfile"]["name"];
 
		$image_path = realpath(APPPATH . '../images');

		$config['upload_path'] = $image_path;
		$config['allowed_types']='jpg|jpeg|gif|png';
		$this->load->library('upload',$config);
		$this->upload->do_upload();
		$file_data=$this->upload->data();
		$name=$file_data['file_name'];
		$codigoVe=$this->input->post('codigoVehiculo');
		$dato=array($this->input->post('combustible'),
			$this->input->post('estado_pertenencia'),
			$this->input->post('num_vehiculo'),
			$this->input->post('casa_comercial'),
			$this->input->post('pais_origen'),
			$this->input->post('tonelaje'),
			$this->input->post('tipo'),
			$this->input->post('notificaciones_talleres'),
			$this->input->post('fecha_vencimiento_matricula'),
			$this->input->post('fecha_vencimiento_soat'),			
			$name,
			$name,
			$this->input->post('tipo_vehiculo'));
			$guardar=$this->administracion_model->get_actualizar_vehiculo_id($dato,$codigoVe);
 	}


	public function agregarUsuario(){
		$menu="";
		$dato_menu = $this->usuario_model->getMenus();
		
		foreach ($dato_menu->result() as $key) { 
			$menu.="<div class='row'><div class='col-sm-9'>";

			$menu.="<b>".$key->nom_menu."</b><div class='row'>";
			$dato_sub = $this->usuario_model->getSubmenus($key->id_menus);
				
			foreach ($dato_sub->result() as $sub) {	
						
					$menu.= "<div class='col-md-6'><input type='checkbox' name='menu[]' value='".$sub->id_submenu." '>".$sub->nom_sub."</div>";
						
					
				
			}
			$menu.="</div></div></div>";
		}
		
		$datos['menu_sub']= $menu;
		$this->load->view('administracion/nuevoUsuario', $datos);

	}

	public function saveUsuarioAdmin(){
	
		$data= array(
			$this->input->post('nombre'),
			$this->input->post('usuario'),
			md5($this->input->post('password')),
			$this->input->post('menu'));

		$insert= $this->usuario_model->insertUsuario($data);
				
	}

	public function eliminarUsuario (){
		$cod_usuario = $this->input->post('codigo_usu');
		$eliminar = $this->usuario_model->elimnarUsuario($cod_usuario);
		
	}

	public function actu_usuario_view($codigo){

		$datosUsuarios=$this->usuario_model->getObtenerUsuarioRol($codigo);
		$rol_permiso = array();
		$menu="";
		$dato_menu = $this->usuario_model->getMenus();
		$i=0;

		foreach ($datosUsuarios->result() as $rol) {
			$rol_permiso[$i]= $rol->id_submenu;
			$i++;
		}

		foreach ($dato_menu->result() as $key) { 
			$menu.="<div class='row'><div class='col-sm-9'>";

			$menu.="<b>".$key->nom_menu."</b><div class='row'>";
			$dato_sub = $this->usuario_model->getSubmenus($key->id_menus);
				
			foreach ($dato_sub->result() as $sub) {	
							
					if(in_array($sub->id_submenu, $rol_permiso)){
						
						$menu.= "<div class='col-md-6'><input type='checkbox' name='menu[]' value='".$sub->id_submenu."' checked>".$sub->nom_sub."</div>";
					}else{
						$menu.= "<div class='col-md-6'><input type='checkbox' name='menu[]' value='".$sub->id_submenu." '>".$sub->nom_sub."</div>";
					}
				
			}
			$menu.="</div></div></div>";
		}
		
		$datos['menu_sub']= $menu ;
		$datos['usuarios']=$this->usuario_model->obtener_usuario($codigo);

		$this->load->view('administracion/actu_usuario_view', $datos);
	
	}

	public function actualizar_usuario(){
		$data= array(
			$this->input->post('id_uduario'),
			$this->input->post('nombre'),
			$this->input->post('usuario'),
			md5($this->input->post('password')),
			$this->input->post('menu'));

		$actualizar = $this->usuario_model->actualizarUsuario($data);
	}

	public function ListaActividadesUsuarios(){
		$this->load->view('headers');		
		$this->load->view('principal');	
		$this->load->view('administracion/actividades_usuarios');
	
	}
	public function guardarSescion(){
		 date_default_timezone_set('UTC');
    		$fecha_desde=date("d/m/Y",strtotime($this->input->post('fecha_desde')));
		$fecha_hasta=date("d/m/Y",strtotime($this->input->post('fecha_hasta')));
		$data= array(
			'fecha_desde'=>$fecha_desde,
			'fecha_hasta'=>$fecha_hasta);
		
		$this->session->set_userdata($data);
		$this->vistaTabla();
	}
	public function vistaTabla(){

	//paginacion		
		$lista['tbl_audit'] = $this->usuario_model->getbusquedaavanzada(0,0);
		$desde= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config['base_url']= base_url().'administracion/vistaTabla/';
		$config['total_rows']=count($lista['tbl_audit']);
		$config['per_page']=6;
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
		$paginacion=$this->pagination->create_links();

		$tbl_audit = array('actividades_usuarios'=>$this->usuario_model->getbusquedaavanzada($config['per_page'],$desde),
							'paginacion'=>$this->pagination->create_links());
		$this->load->view('administracion/lista_vista', $tbl_audit);
		
	}

	public function reporte_excel_actividadesusuarios(){

		$datos['actividades_usuarios']=$this->usuario_model->getbusquedaavanzada(0,0);
		$this->load->view('reportes_excel/actividades_usuarios', $datos);

	}
	public function obtenerActividades(){

		$obtener=$this->usuario_model->getActividadesUsuarios($this->input->post('fecha_desde'), $this->input->post('fecha_hasta'));
		
		foreach ($obtener->result() as $item) {?>
			<tr><td><?php echo $item->nombre_tabla;?></td>
				<td><?php echo $item->operacion;?></td>
				<td><?php echo $item->fecha;?></td>
				<td><?php echo $item->usuario;?></td>
				<td><?php echo $item->id_audit;?></td>
			</tr>
		

		<?php }

	}

	public function listadoVehiculos_conductores(){
		
		$this->load->view('headers');		
		$this->load->view('principal');	

		$dato = array('datos'=>$this->administracion_model->getlisvehiculosConductores(0,0)
					  );
		$this->load->view('administracion/listado_vehiculo_chofer',$dato);
	}

	public function asignar_chofer($cod_vehiculo){

		$datos=array('chofer'=>$this->administracion_model->getChoferDisponible(),
					 'vehiculo'=>$this->administracion_model->getVehiculo($cod_vehiculo),
					 'cod_vehiculo'=>$cod_vehiculo);

		$this->load->view('administracion/asignar_chofer',$datos);
	}

	public function visualizar_asignar_chofer($cod_vehiculo){

		$datos['vehiculo']=$this->administracion_model->getVehiculo($cod_vehiculo);
		$datos['asignar_vehiculo']=$this->administracion_model->getAsignar_vehiculo($cod_vehiculo);
		$datos['cod_vehiculo']=$cod_vehiculo;

		$this->load->view('administracion/actu_asignar_chofer', $datos);
	}

	public function actu_asignar_choferfin(){
		$cat_image_name = $_FILES["userfile"]["name"];
 
		$image_path = realpath(APPPATH . '../pdfs');

		$config['upload_path'] = $image_path ;
		$config['allowed_types']='pdf|doc|xls|docx|xlsx';
		$this->load->library('upload',$config);
		$this->upload->do_upload();
		$file_data=$this->upload->data();	
		
		$data = array(
			$this->input->post('cod_vehiculo'),
			$cat_image_name,
			$this->input->post('descripcion'),
			$this->input->post('revision'));

		$update= $this->administracion_model->actu_asignar_chofer($data);
	}

	public function eliminar_asignar_chofer(){
		$cod_vehiculo = $this->input->post('cod_veh');
		$delete= $this->administracion_model->delete_asig_chofer_vehiculo($cod_vehiculo);
	}

	public function tipos_vehiculos(){
		$tipos_vehiculos['tipos_vehiculo']=$this->administracion_model->getTipos_vehiculos();
		$this->load->view('administracion/ListadoTpoVehiculo', $tipos_vehiculos);	
	}

	public function agre_tipoVehiculo(){
		$datos['vehi_tipo']=$this->administracion_model->getVehiculosTipo();
		$this->load->view('administracion/nuevo_tipo_vehiculo', $datos);

	}

	public function save_tipoVehiculo(){

		$data = array(
			$this->input->post('nombre_tipo'),
			$this->input->post('descripcion'),
			$this->input->post('vehi_tipo'));
		

		$insertar=$this->administracion_model->insertTipo_Vehiculo($data);

	}

	public function eliminar_tipoVehiculo(){
		$codigo = $this->input->post('codigo');
		$delete = $this->administracion_model->deleteTipoVehiculo($codigo);


	}


	public function actualizar_view_tipoVehiculo(){
		$codigo = $this->input->post('codigo');
		$datos['cod_tipo']=$codigo;
		$datos['vehi_tipo']=$this->administracion_model->getVehiculosTipo();
		$datos['tipo_vehiculo'] = $this->administracion_model->getTipoVehiculos($codigo);
		$this->load->view('administracion/actu_tipo_vehiculo', $datos);


	}
	public function update_tipoVehiculo(){
	$data = array(
			$this->input->post('cod_tipo'),
			$this->input->post('nombre_tipo'),
			$this->input->post('descripcion'),
			$this->input->post('vehi_tipo'));
		$update=$this->administracion_model->updateTipoVehiculos($data);

	}
	
	public function ListCombustibles(){
		$this->load->view('headers');
		$this->load->view('principal');

		$admCombutibles['adminisCombu']=$this->administracion_model->getCombustibles();
		$this->load->view('administracion/ListCombustibles',$admCombutibles);
	}
	public function eliminar_combustible(){
		$codigo=$this->input->post('codigo');
		$datos=$this->administracion_model->deleteCombustible($codigo);
	}
	public function actualizar_combustible(){
		$codigo=$this->input->post('codigo');
		$datos['actu_combustible1']=$this->administracion_model->getActu_combustible($codigo);
		$this->load->view('administracion/actu_combustible', $datos);
	}
	public function actu_combustible_fin(){
		$codigo = $this->input->post('cod_g');
		$precio=$this->input->post('precio');
		$nombre=$this->input->post('combustible');
		$datos=$this->administracion_model->update_combustible_fin($codigo,$nombre,$precio);
	}
	public function insertar_combustibles(){
		
		$this->load->view('administracion/insertar_combustible');
	}
	public function insertarFinCombustibles(){
		$nombre_c=$this->input->post('nombre');
		$precio_c=$this->input->post('precio');
		$insertar_combustible_fin=$this->administracion_model->getInsertarCombustibles($nombre_c,$precio_c);
		
	}
//---fin administracion
//---Gasolinera--------
	public function listadoGasolineras(){
		$this->load->view('headers');
		$this->load->view('principal');

		$gasolineras['gasolineras_select']=$this->administracion_model->getGasolineras();
		$this->load->view('administracion/ListadoGasolineras',$gasolineras);
	}
	public function insertar_gasolinera(){
		$this->load->view('administracion/insertar_gasolinera');
	}
	public function insertarFinGasolinera(){
		$nombre_g=$this->input->post('nombreGa');
		$insertar_gasolineras_fin=$this->administracion_model->getInsertarGasolinera($nombre_g);
		
	}
	public function eliminar_gasolinera(){
	    $codigo=$this->input->post('codigo');
		$datos=$this->administracion_model->deleteGasolinera($codigo);	
	}
	public function actualizar_gasolinera(){
		$codigo=$this->input->post('codigo');
		$datos['actu_gasolinera1']=$this->administracion_model->getActu_Gasolinera($codigo);
		$this->load->view('administracion/actu_gasolinera', $datos);
	}
	public function actu_gasolinera_fin(){
		$codigo = $this->input->post('cod_gasolinera');
		$nombre=$this->input->post('nomG');
		$datos=$this->administracion_model->update_gasolinera_fin($codigo,$nombre);
			
	}
//---fin gasolinera----
//---tipo licencia-----
	public function listadoTipoLicencia(){

		$this->load->view('headers');
		$this->load->view('principal');
		$datos['tipo_licencia1']=$this->administracion_model->getTipo_Licencia();
		$this->load->view('administracion/ListadoTipoLicencia', $datos);
		
	}
	public function eliminar_Tlicencia(){
		$codigo=$this->input->post('codigo');
		$datos=$this->administracion_model->deleteTlicencia($codigo);
	}
	public function actualizar_Tlicencia(){
		$codigo=$this->input->post('codigo');
		$datos['actu_tipolicencia1']=$this->administracion_model->getTipo_licencia_id($codigo);
		$this->load->view('administracion/actu_tipo_licencia_fin', $datos);	
	}
	public function actu_tipo_licencia_fin(){
		$codigo = $this->input->post('cod_licencia');
		$nombre=$this->input->post('nomT');
		$datos=$this->administracion_model->update_tipo_licencia_fin($codigo,$nombre);
	}
	public function insertar_Tlicencia(){
		$this->load->view('administracion/insertar_tipo_licencia');
	}
	public function insertarFinTipoLicencia(){
		$nombre_t=$this->input->post('nombreTi');
		
		$insertar_tipo_gasolina_fin=$this->administracion_model->getInsertarTipoLicencia($nombre_t);
			
	}
//---fin tipo licencia-

	
//---reg vehiculo------
	public function listaVehiculosFinan(){
		$this->load->view('headers');
		$this->load->view('principal');

			

	    $datos2 = array('recoge'=> $this->administracion_model->getReg_Vehiculo(0, 0),
	    				'placa_bd2'=>$this->administracion_model->get_placa_bd2());
		$this->load->view('administracion/ListaVehiculosFinan', $datos2);	
	
	}

	public function insertar_reg_vehiculo(){
        	$vehiculo_diferente=  array();
       	 	$vehiculo_bien=  array();
        	$cont=0;
        	$datos2['recoge']=$this->administracion_model->getreg_insert_vehiculo();        

       		foreach ($datos2['recoge']->result() as $key ) {
            		$vehiculo_bien[$cont]=$key->placa;;
            		$cont++;
        	}
        	$tamano= count($vehiculo_bien);
        	$i=0;
        
	$datos2['vehiculos_bien']=$this->administracion_model->get_select_placa_bd2();  
    
        	if($datos2['vehiculos_bien']){
		foreach ($datos2['vehiculos_bien']->result() as $value) {
		    if(in_array($value->placa_vehiculo, $vehiculo_bien)){
		    }else{
		        $vehiculo_diferente[$i]=$value->placa_vehiculo;
		        $i++;
		    }
		}
	}
        	$datos2['vehiculos']=$vehiculo_diferente;   
        	$datos2['combustibledatos']=$this->administracion_model->get_select_combustibleRegVehciulo();
        	$datos2['estado_actual']=$this->administracion_model->get_select_estado_actual();
        	$datos2['veh_tipo']=$this->administracion_model->get_select_veh_tipo();
    
        	$this->load->view('administracion/insertar_reg_vehiculo_fin',$datos2);  
    	}

    	public function buscarDatosenBienes(){
		$codigo1=$this->input->post('codigodatos');
    		$nuevos_datosBienesVehiculos['datosBienesV'] = $this->administracion_model->buscarDatosenBienesVehiculo1($codigo1);
			foreach ($nuevos_datosBienesVehiculos['datosBienesV']->result() as $datosBienesVehiculos){
					$clase_vehiculo1=$datosBienesVehiculos->clase_vehiculo;
					$placa_vehiculo1=$datosBienesVehiculos->placa_vehiculo;
					$anio_fabricacion_vehiculo1=$datosBienesVehiculos->anio_fabricacion_vehiculo;
					$color_primario_vehiculo1=$datosBienesVehiculos->color_primario_vehiculo;
					$chasis_vehiculo1=$datosBienesVehiculos->chasis_vehiculo;
					$motor_vehiculo1=$datosBienesVehiculos->motor_vehiculo;
					$costo_adquision_vehiculo1=$datosBienesVehiculos->costo_adquisicion_vehiculo;
				 ?>	
				 <table class='table'>
				<tr>
					<td>PRECIO ADQUISION</td>	
					<td><b><input type='text' name='costo_adquision_vehiculo' id="costo_adquision_vehiculo" value='<?php echo $costo_adquision_vehiculo1;?>' class="form-control" readonly/></b></td>			
					<td>CHASIS</td>
					<td><b><input type='text' name='chasis_vehiculo' id="chasis_vehiculo" value="<?php echo $chasis_vehiculo1;?>" class="form-control" readonly/></b></td>
				</tr>
				<tr>
					<td>MOTOR</td>
					<td><b><input type='text' name='motor_vehiculo' id="motor_vehiculo" value="<?php echo $motor_vehiculo1;?>" class="form-control" readonly/></b></td>
					<td>TIPO VEHICULO</td>	
					<td><b><input type='text' name='clase_vehiculo' id="clase_vehiculo" value="<?php echo $clase_vehiculo1;?>" class="form-control" readonly/></b></td>
				</tr>
				<tr>
					<td>PLACA</td>	
					<td><b><input type='text' name='placa_vehiculo' id="placa_vehiculo" value="<?php echo $placa_vehiculo1;?>" class="form-control" readonly/></b></td>			
					<td>AÑO FABRICACION</td>	
					<td><b><input type='text' name='anio_fabricacion_vehiculo' id="anio_fabricacion_vehiculo" value="<?php echo $anio_fabricacion_vehiculo1;?>" class="form-control" readonly/></b></td>
				</tr>
				<tr>
					<td>COLOR</td>	
					<td><b><input type='text' name='color_primario_vehiculo' id="color_primario_vehiculo" value="<?php echo $color_primario_vehiculo1;?>" class="form-control" readonly/></b></td>
					
				</tr><?php
			$codigo_id_bien=$datosBienesVehiculos->id_bien;
				$nuevos_datosBienes['datosBienes'] = $this->administracion_model->buscarDatosenBienesVehiculo($codigo_id_bien);
			
			if($nuevos_datosBienes['datosBienes']){
				foreach ($nuevos_datosBienes['datosBienes']->result() as $datosBienesV){
					$codigo_catalogo_bien1=$datosBienesV->codigo_catalogo_bien;
					$modelo_caracteristicas_bien1=$datosBienesV->modelo_caracteristicas_bien;
					$estado_bien1=$datosBienesV->estado_bien;
					$marca_raza_otros_bien1=$datosBienesV->marca_raza_otros_bien;
					$fecha_bien1=$datosBienesV->fecha_bien;
					$serie_identificacion_bien1=$datosBienesV->serie_identificacion_bien;
					$novedades="DESCRIPCION: ".$datosBienesV->descripcion_tipo_bien."\n OBSERVACION: ".$datosBienesV->observacion_baja_bien;
				 	$tipo_comprobante_bien1=$datosBienesV->tipo_comprobante_bien;
				 ?>	
				
				<tr>
					<td>CODIGO DEL BIEN</td>
					<td><b><input type='text' name='codigo_catalogo_bien' id="codigo_catalogo_bien" value="<?php echo  $codigo_catalogo_bien1;?>" class="form-control" readonly/></td></b></td>
					<td>CONDICION REAL</td>	
					<td><b><input type='text' name='estado_bien' id="estado_bien" value="<?php echo $estado_bien1;?>" class="form-control" readonly/></b></td>
				</tr>
				<tr>
					
					<td>MODELO</td>
					<td><b><input type='text' name='modelo_caracteristicas_bien' id="modelo_caracteristicas_bien" value="<?php echo $modelo_caracteristicas_bien1;?>" class="form-control" readonly/></b></td>
					<td>MARCA</td>
					<td><b><input type='text' name='marca_raza_otros_bien' id="marca_raza_otros_bien" value="<?php echo $marca_raza_otros_bien1;?>" class="form-control" readonly/></b></td>
				</tr>
				<tr>
					
					<td>SERIE</td>
					<td><b><input type='text' name='serie_identificacion_bien' id="serie_identificacion_bien" value="<?php echo $serie_identificacion_bien1;?>" class="form-control" readonly/></b></td>
					<td>NOVEDADES</td>
					<td><b><input type='text' name='novedades' id="novedades" value="<?php echo $novedades;?>" class="form-control" readonly/></b></td>
				</tr>
				<tr>
					<td>TIPO COMPROBANTE</td>
					<td><b><input type='text' name='tipo_comprobante_bien' id="tipo_comprobante_bien" value="<?php echo $tipo_comprobante_bien1;?>" class="form-control" readonly/></b></td>
					<td>FECHA ADQUISICON</td>
					<td><b><input type='text' name='fecha_bien' id="fecha_bien" value="<?php echo $fecha_bien1;?>" class="form-control" readonly/></b></td>
				</tr>
				<?php
			}
			
		?>
		
				</table>
				<?php
			}
		}
	}
	public function buscarDatosenBienesVehiculo($codigobien){
         	$this->db_b2->select('*');
         	$this->db_b2->from("BIEN");
         	$this->db_b2->where("id_bien",$codigobien);
         	$query = $this->db_b2->get();
         	if($query->num_rows()>0){return $query;
         	}else{return false;}
	}

	public function insertarFin_Reg_Vehiculo(){	
	        $estado_pertenencia1=$this->input->post('estado_pertenencia');
		$num_vehiculo1=$this->input->post('num_vehiculo');
		$pais_origen1=$this->input->post('pais_origen');
		$tonelaje1=$this->input->post('tonelaje');
		$rendimiento_galon1=$this->input->post('rendimiento_galon');
		$tipo1=$this->input->post('tipo');
		$fecha_vencimiento_soat1=$this->input->post('fecha_vencimiento_soat');
		$fecha_vencimiento_matricula1=$this->input->post('fecha_vencimiento_matricula');
		$notificaciones_talleres1=$this->input->post('notificaciones_talleres');
		$casa_comercial1=$this->input->post('casa_comercial');
		$codigo_catalogo_bien1=$this->input->post('codigo_catalogo_bien');
		$estado_bien1=$this->input->post('estado_bien');
		$modelo_caracteristicas_bien1=$this->input->post('modelo_caracteristicas_bien');
		$marca_raza_otros_bien1=$this->input->post('marca_raza_otros_bien');
		$serie_identificacion_bien1=$this->input->post('serie_identificacion_bien');
		$novedades1=$this->input->post('novedades');
		$tipo_comprobante_bien1=$this->input->post('tipo_comprobante_bien');
		$fecha_bien1=$this->input->post('fecha_bien');
		$costo_adquision_vehiculo1=$this->input->post('costo_adquision_vehiculo');
		$chasis_vehiculo1=$this->input->post('chasis_vehiculo');
		$motor_vehiculo1=$this->input->post('motor_vehiculo');
		$clase_vehiculo1=$this->input->post('clase_vehiculo');
		$placa_vehiculo1=$this->input->post('placa_vehiculo');
		$anio_fabricacion_vehiculo1=$this->input->post('anio_fabricacion_vehiculo');
		$color_primario_vehiculo1=$this->input->post('color_primario_vehiculo');
		
       		$cat_image_name = $_FILES["userfile"]["name"];
 
		$image_path = realpath(APPPATH . '../images');

		$config['upload_path'] = $image_path ;
		$config['allowed_types']='jpg|jpeg|gif|png';
		$this->load->library('upload',$config);
		$this->upload->do_upload();
		$file_data=$this->upload->data();

		$combustible1=$this->input->post('combustible');  

        	$imagensi = $cat_image_name;
		$nombre_imagen= $cat_image_name;
	
        	$insertar_tipo_reg_vehiculo=$this->administracion_model->getInsertarFinRegVehiculo($combustible1,$estado_pertenencia1,
			$num_vehiculo1,$pais_origen1,$tonelaje1,$rendimiento_galon1,
			$fecha_vencimiento_soat1,$fecha_vencimiento_matricula1,$imagensi,
			$nombre_imagen,$codigo_catalogo_bien1,$estado_bien1,$modelo_caracteristicas_bien1,
			$marca_raza_otros_bien1,$serie_identificacion_bien1,$novedades1,
			$tipo_comprobante_bien1,$fecha_bien1,$costo_adquision_vehiculo1,
			$chasis_vehiculo1,$motor_vehiculo1,$clase_vehiculo1,$placa_vehiculo1,
			$anio_fabricacion_vehiculo1,$color_primario_vehiculo1, $notificaciones_talleres1,$casa_comercial1,$tipo1);
     
	}

	public function eliminar_reg_vehiculo(){
		$codigo=$this->input->post('codigo');
		$datos=$this->administracion_model->deletereg_vehiculo($codigo);	
	
	}

	public function actualizar_reg_vehiculo(){
		$codigoVehicu=$this->input->post('codigoVehiculo');
		$datos['actu_reg_vehiculo1']=$this->administracion_model->getreg_vehiculo_id($codigoVehicu);
		$datos['estado_actual']=$this->administracion_model->get_select_estado_actual();
		$datos['combustibledatos']=$this->administracion_model->get_select_combustibleRegVehciulo();
		$datos['veh_tipo']=$this->administracion_model->get_select_veh_tipo();
		$this->load->view('administracion/actu_reg_vehiculo_fin', $datos);	
	}
	

	//fin vehiculo//
//----Conductores----
	public function cargar_conductores(){
		$this->load->view('headers');
		$this->load->view('principal');	
		
		
	
	
		$datos= array('conductores'=>$this->conductores_model->get_conductores_bd1(0,0));

		$this->load->view('administracion/listar_conductores', $datos);

			
	}
	public function insertar_Conductor(){
		$conductor_diferente=  array();
		$conductor_nom_ape=  array();
		$conductor_bd1=  array();
		$cont=0;
		$datos2['recepta_conductor']=$this->conductores_model->get_conductor_bd1();		
		foreach ($datos2['recepta_conductor']->result() as $key ) {
			$conductor_bd1[$cont]=$key->cedula;;
			$cont++;
		}
		$tamano= count($conductor_bd1);
		$i=0;
		$j=0;
		$datos2['conuctor_bd2']=$this->conductores_model->get_conductor_bd2();		
		foreach ($datos2['conuctor_bd2']->result() as $value) {
			if(in_array($value->cedula, $conductor_bd1)){
			}else{
				$conductor_diferente[$i]=$value->cedula;
			
				$i++;
				
			}
		}
		$datos2['cedula']=$conductor_diferente;
		$datos2['licencia']=$this->conductores_model->get_licencia();
		$this->load->view('administracion/insertar_conductores', $datos2);	
	}
	public function buscarDatosConductoresFulltime(){
		$codigo1=$this->input->post('codigoConductor');
    		$nuevos_datosConductores['datosConductores'] = $this->conductores_model->buscarDatosConductores($codigo1);
			foreach ($nuevos_datosConductores['datosConductores']->result() as $datosConductoresFulltime){
					
				 ?>	
				<table class='table'>
				<tr>
					<td>NOMBRES</td>	
					<td><b><input type='text' name='nombres' id="nombres" value="<?php echo $datosConductoresFulltime->nombre;?>" class="form-control" readonly/></b></td>			
					<td>APELLIDOS</td>
					<td><b><input type='text' name='apellidos' id="apellidos" value="<?php echo $datosConductoresFulltime->apellido;?>" class="form-control" readonly/></b></td>
					<td>CEDULA</td>
					<td><b><input type='text' name='cedula' id="cedula" value="<?php echo $datosConductoresFulltime->cedula;?>" class="form-control" readonly/></b></td>
				</tr>
				<tr>
					<td>CORREO</td>
					<td><b><input type='text' name='correo' id="correo" value="<?php echo $datosConductoresFulltime->correo;?>" class="form-control" readonly/></b></td>
					<td>DEPARTAMENTO</td>	
					<td><b><input type='text' name='departamento' id="departamento" value="<?php echo $datosConductoresFulltime->departamento;?>" class="form-control" readonly/></b></td>
					<td>CARGO</td>	
					<td><b><input type='text' name='cargo' id="cargo" value="<?php echo $datosConductoresFulltime->cargo;?>" class="form-control" readonly/></b></td>			
				</tr>
				</table>
				<?php
			}
	}
	public function insertar_conductor_final(){
		//echo $this->input->post('nombres');

		$dato=array(
			$this->input->post('nombres'),
			$this->input->post('apellidos'),
			$this->input->post('cedula'),
			$this->input->post('correo'),
			$this->input->post('departamento'),
			$this->input->post('cargo'),
			$this->input->post('telefono'),
			$this->input->post('licencia'),
			$this->input->post('novedades'),
			$this->input->post('nombre_banco'),
			$this->input->post('tipo_cuenta'),
			$this->input->post('numero_cuenta'));
			$guardar=$this->conductores_model->get_insertar_conductor($dato);
 
	}
	public function eliminar_Condutor(){
		$codigoChofer=$this->input->post('codigoChofer');
		$datos=$this->conductores_model->eliminar_conductor($codigoChofer);	
	}
	public function actualizar_Conductor(){
		$codigoChofer=$this->input->post('codigoChofer');
		$datos['actualizar_conductor1']=$this->conductores_model->extaer_datos_chofer($codigoChofer);
		$datos['licencia']=$this->conductores_model->get_licencia();
		$this->load->view('administracion/actualizar_Conductor',$datos);	
	}
	public function actualizar_conductor_final(){
		$codigoChofer=$this->input->post('codigoChofer');
		$dato=array(
			$this->input->post('telefono'),
			$this->input->post('licencia'),
			$this->input->post('novedades'),
			$this->input->post('nombre_banco'),
			$this->input->post('tipo_cuenta'),
			$this->input->post('numero_cuenta'),
			$this->input->post('departamento'),
			$this->input->post('correo'));
			$guardar=$this->conductores_model->actualizar_conductor($dato,$codigoChofer);
	}
	//fin 

	public function reporte_vehiculos(){

		$this->load->view('headers');
		$this->load->view('principal');
		
		$lista['combustible'] = $this->administracion_model->getVehiculos(0,0);
		$desdec= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	
		$config['base_url']= base_url().'administracion/reporte_vehiculos/';
		$config['total_rows']=count($lista['combustible']);
		$config['per_page']=10;
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


		$repVe = array('vehiculo'=>$this->administracion_model->getVehiculos($config['per_page'],$desdec),
						'paginacion'=>$this->pagination->create_links());

		$this->load->view('reportes/inventario_vehiculos',$repVe);

	}

	public function reporte_condutores(){

		$this->load->view('headers');
		$this->load->view('principal');

		$lista['conductor'] = $this->administracion_model->getConductores(0,0);
		$desdec= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	
		$config['base_url']= base_url().'administracion/reporte_condutores/';
		$config['total_rows']=count($lista['conductor']);
		$config['per_page']=10;
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
		$repCon = array('conductor'=>$this->administracion_model->getConductores($config['per_page'],$desdec),
				'paginacion'=>$this->pagination->create_links());
		$this->load->view('reportes/reportes_conductores',$repCon);

	}

	public function Mat_Soat_Excel(){
		date_default_timezone_get('UTC');
    	$fecha_act=date("d/m/Y");
    	$fechagu="";
		$repMaSo['mat_soat']=$this->administracion_model->getMatriculaSoat();
		$repMaSo['fechaactual']=date("d/m/Y");
		$this->load->view('reportes_excel/reporte_mat_soat_excel',$repMaSo);

	}

	public function reporte_matriculaSoat(){
		$this->load->view('headers');
		$this->load->view('principal');
		date_default_timezone_set('UTC');
	    	$fecha_act=date("d/m/Y");

    		$lista['combustible'] = $this->administracion_model->getVehiculos(0,0);
		$desdec= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	
		$config['base_url']= base_url().'administracion/reporte_matriculaSoat/';
		$config['total_rows']=count($lista['combustible']);
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

		$repMaSo=array('mat_soat'=>$this->administracion_model->getVehiculos($config['per_page'],$desdec),
				'paginacion'=>$this->pagination->create_links(),
				'fechaactual'=>date("d/m/Y"));

		$this->load->view('reportes/matricula_soat',$repMaSo);

	}
	//controllers
	//reporte noverdades

	public function reporte_novedades(){
		$this->load->view('headers');
		$this->load->view('principal');

	    	$lista['combustible'] = $this->administracion_model->get_novedades(0,0);
		$desdec= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	
		$config['base_url']= base_url().'administracion/reporte_novedades/';
		$config['total_rows']=count($lista['combustible']);
		$config['per_page']=5;
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

		$notificaciones=array('notificaciones_vehiculos'=>$this->administracion_model->get_novedades($config['per_page'],$desdec),
				'paginacion'=>$this->pagination->create_links());
		$this->load->view('reportes/reporte_novedades',$notificaciones);
	}
	public function reporte_excel_novedades(){
		
		$datos['novedades']=$this->administracion_model->get_novedades(0,0);
		$this->load->view('reportes_excel/excel_novedades', $datos);		
	}

	public function reportes_excel_vehiculos(){
		$repVe = array('vehiculo'=>$this->administracion_model->getVehiculos(0,0));
		$this->load->view('reportes_excel/excel_vehiculos',$repVe);
	}

	public function reportes_excel_conductores(){
		$repCon = array('conductor'=>$this->administracion_model->getConductores(0,0));
		$this->load->view('reportes_excel/excel_conductores',$repCon);
	}


	public function info(){
		$this->load->view('headers');
		$this->load->view('principal');
		
		$this->load->view('info');
	}





}
