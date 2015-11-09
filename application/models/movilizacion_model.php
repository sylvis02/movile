<?php if(! defined('BASEPATH')) exit ('No direct script acess allowed');

class Movilizacion_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->db_c=$this->load->database('conexion_C',true);
	}


	function buscarEmpleado($cedula){
		$this->db_c->select('empleado.nombre, empleado.apellido, cargo.descripcion,departamento.descripcion');
		$this->db_c->from('empleado');
		$this->db_c->join('cargo', 'cargo.carg_id  = empleado.carg_id');
		$this->db_c->join('departamento', 'departamento.depa_id  = empleado.depa_id');
		$this->db_c->where('cedula', $cedula);
		$query=$this->db_c->get();
		 if($query->num_rows() > 0){ 
			return $query;
		 }else{
			return false;
		}
	}

	function getEmpleados(){
		$this->db_c->select('nombre, apellido, cedula');
		$this->db_c->from('empleado');
		$query = $this->db_c->get();
		 if($query->num_rows() > 0){ 
			return $query;
		 }else{return false;}


	}

	function agregarSolicitud($data){
	
		$query = $this->db->query("SELECT * FROM movilizacion_insert('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."',".$data[6].",'".$data[7]."',".$data[8].",'".$data[9]."','".$data[10]."','".$data[11]."' );");
		if($query->num_rows() > 0){ 
			return $query;
		}
		else{ return false;}

		
	}

	function getSolicitudes(){
		$query = $this->db->get('obtener_solicitud_movilizacion();');
		if($query->num_rows() > 0){ return $query;
		}else{ return false;}
	}

	function getOrdenesMovi(){
		 $query = $this->db->get_where('movilizacion', array('aprobado' => "0", 'estado'=>"1"));
		 if($query->num_rows() > 0){return $query;
		 }else{ return false; }
	}

	function getEstadoSolicitudes(){
		 $usuario=$this->session->userdata('username');
		
		 $this->db->select('*');
         	 $this->db->from('movilizacion');
		 $this->db->join('vehiculos', 'vehiculos.cod_vehiculo = movilizacion.cod_vehiculo');
		 $this->db->join('chofer', 'chofer.cod_chofer = movilizacion.cod_chofer'); 
         	 $this->db->where('solicitante',$usuario);
         	 $query=$this->db->get();

         	if($query->num_rows() > 0){ return $query;
		 }else{return false;}
	}
	function cargarCantonesParroquias($opcion, $codigo){
		$query = $this->db->get("obtener_parroquias_cantones(".$opcion.",'".$codigo."')as(nombre character varying, codigo integer);");

		if($query->num_rows() > 0){
			
			return $query ;
		}
		else{ 
			
			return false;
		}


	}
	function elimnarMovilizacion($codigo){
		if($query=$this->db->query("select eliminar_movilizacion(".$codigo.");"))
		{
			return $query;
		}
       			 else{return false; }
	

	}

	function getProvincias(){
		$query = $this->db->get('provincia');
		if($query->num_rows() > 0){ return $query;
		}else{ return false;}

	}

	function getCantones(){

		$query = $this->db->get('canton');
		if($query->num_rows() > 0){ return $query;
		}else{ return false;}
	}

	function getParroquias(){

		$query = $this->db->get('parroquias');
		if($query->num_rows() > 0){ return $query;
		}else{ return false;}
	}


	function getMovilizacion($codigo){

		$query = $this->db->get("movilizacion_select(".$codigo.");");
		if($query->num_rows() > 0){
			return $query;
		}
		else{ return false;}
	}
	function actualizarMovilizacion($data){

		if($query=$this->db->query("select actualizar_movilizacion($data[0],'$data[1]','$data[2]', '$data[3]','$data[4]', '$data[5]', '$data[6]', $data[7], '$data[8]',$data[9] );"))
		{
			return $query;
        	} else{return false; }
	}

	function getAllMovilizacion($codigo){
		
		$query = $this->db->get("obtener_movili_veh_chof(".$codigo.");");
		if($query->num_rows() > 0){
			
			return $query ;
		}
		else{ 
			
			return false;
		}
	}

	function updateMovilizacion($data){

		if($query=$this->db->query("select aprobar_movilizacion($data[0],$data[1],$data[2], '$data[3]','$data[4]', '$data[5]');"))
		{
			return $query;
        	}else{return false; }

	}
	function estadoMovilizacion($codigo, $data){
		$this->db->where('cod_movilizacion', $codigo);
		return $this->db->update('movilizacion', $data);

	}

	function getGasolineras(){
		$query = $this->db->get('gasolinera');
		if($query->num_rows() > 0){ return $query;
		}else{ return false;}
	}

	function getPartidasCombustible(){
		$query = $this->db->get('partidas');
		if($query->num_rows() > 0){ return $query;
		}else{ return false;}
	}

	function getChofer($codigo){
		$query = $this->db->get_where('chofer', array('cod_chofer'=>$codigo));
		if($query->num_rows() > 0){ return $query;
		}else{ return false;}

	}
	function getVehiculos($codigo){
		
		$this->db->select('*');
		$this->db->from('vehiculos');
		$this->db->join('tipo_vehiculo', 'vehiculos.cod_tipo = tipo_vehiculo.cod_tipo');
		$this->db->where('cod_vehiculo',$codigo);
		$query = $this->db->get();
		if($query->num_rows() > 0){ return $query;
		}else{ return false;}
	}

	function getCombustible($codigo){
		$this->db->select('*');
		$this->db->from('combustible');
		$this->db->join('vehiculos', 'vehiculos.cod_gasolina = combustible.cod_gasolina');
		$this->db->where('cod_vehiculo',$codigo);
		$query = $this->db->get();

		if($query->num_rows() > 0){ return $query;
		}else{ return false;}
	}

	function ultimoidCombustible(){

		$this->db->select_max('cod_orden');
		$this->db->from('ordenes_combustible');
		$consulta= $this->db->get();

		if($consulta->num_rows()>0){
		return $consulta;
		}else{return false;}
	}



	function agregarOrdenesCombustible($data){
	
		return $this->db->insert('ordenes_combustible', $data);	
		
	}

	function actuarMoviCombustible($codigo, $data){
	
		$this->db->where('cod_movilizacion', $codigo);
		return $this->db->update('movilizacion', $data);
		
	}
	
 	function getVehiculosDisponibles($codigo, $opcion){

 		$query = $this->db->get("obtener_vehiculos_disponibles(".$codigo.",".$opcion.")as(cod_vehiculo integer, marca character varying, placa character varying, num_vehiculo character varying);");
		if($query->num_rows() > 0){ 
			return $query;
		}
		else{ return false;}
	}

	function deleteSolicitd($codigo){
		$this->db->where('cod_movilizacion',$codigo);
		return $this->db->delete('movilizacion');
	}


	function getOrdenesCombustible(){
		$this->db->select('*');
		$this->db->from('movilizacion');
		$this->db->join('vehiculos','movilizacion.cod_vehiculo = vehiculos.cod_vehiculo'); 
		$this->db->join('chofer','movilizacion.cod_chofer = chofer.cod_chofer');
   	    	$this->db->where('combu_asig','0');
   	    	$this->db->where('aprobado','1');
   		$query = $this->db->get();

   		if($query->num_rows()>0){ return $query;
		 }else{return false;}
	}

	function getListadoOrdenesCombus($per_page, $desde){
		
		$query = $this->db->query("SELECT * FROM obtener_ordenes_combustible_list(".$per_page.",".$desde.")as(cod_orden integer, fecha character varying, nombres text,vehiculo text, cantidad_asignada double precision);");
		if($query->num_rows() > 0){ 
		
			return $query->result();
		}
		else{ return false;}
	}


	function getOrdenes_Combustible($codigo){

		$query = $this->db->query("SELECT * FROM ordenes_combustible_select(".$codigo.")as( cod_orden integer, fecha character varying, cantidad_asignada double precision, km_salida numeric, km_retorno numeric, nombres text, num_vehiculo character varying, placa character varying, marca character varying, modelo character varying, destino text, nombre_gasolinera character varying, nombre_gasolina text, descripcion character varying);");
		if($query->num_rows() > 0){ 
			return $query;
		}
		else{ return false;}
	}

	function updateOrdenesCombustible($codigo,$cantidad_despachada,$despachada){
		if($query=$this->db->query("select ordenes_combustibleUpdate(".$codigo.",".$cantidad_despachada.",'".$despachada."');"))
		{
			return $query;
        }else{return false; }
	}

	// criterios de busqueda para el reporte de movilizacion 

	function obtenerCriteriosBusqueda_movilizacion($codigo){
		//busca departamento
		if ($codigo == 1){
			$query = $this->db->get("obtener_criteriosBusquedaMovilizacion(1)as(departamento character varying);");
			if($query->num_rows() > 0){ 
				return $query;
			}
			else{ return false;}
		}if ($codigo==2){
			$query = $this->db->get("obtener_criteriosBusquedaMovilizacion(2) as (solicitante  character varying);");
			if($query->num_rows() > 0){ 
				return $query;
			}
			else{ return false;}
			

		}if ($codigo==3){
			$query = $this->db->get("obtener_criteriosBusquedaMovilizacion(3)as (cod_vehiculo integer, vehiculo text);");
			if($query->num_rows() > 0){ 
				return $query;
			}
			else{ return false;}
			
		}if ($codigo==4){
			$query = $this->db->get("obtener_criteriosBusquedaMovilizacion(4)as (cod_chofer integer, nombres text);");
			if($query->num_rows() > 0){ 
				return $query;
			}
			else{ return false;}
			
		}
	}


	function getReporteBusqueda($per_page, $desde){

		  	$fecha_desdem= $this->session->userdata('fecha_desdem');
			$fecha_hastam=$this->session->userdata('fecha_hastam');
			$departamentom=$this->session->userdata('departamentom');
			$vehiculom=$this->session->userdata('vehiculom');
			$conductorm=$this->session->userdata('conductorm');
			$solicitantem=$this->session->userdata('solicitantem');

		$query = $this->db->query("SELECT * FROM  obtener_busquedaAvanzadaMovilizacion('".$fecha_desdem."','".$fecha_hastam."', '".$departamentom."', ".$vehiculom.", ".$conductorm.",'".$solicitantem."',".$per_page.",".$desde.")as(cod_movilizacion integer, fecha_salida character varying, fecha_llegada character varying, departamento character varying, solicitante character varying,  tipo character varying, marca character varying, num_vehiculo character varying, destino character varying, hora_salida time, hora_retorno time,motivo text, nombres text);");
		if($query->num_rows() > 0){ 
			return $query->result();
		}
		else{ return false;}

	}

	function obtenerCriteriosBusqueda_combustible($codigo){

		if ($codigo==1){
			$query = $this->db->get("obtener_criteriosbusquedacombustible(1)as (cod_vehiculo integer, vehiculo text);");
			if($query->num_rows() > 0){ 
				return $query;
			}
			else{ return false;}
			
		}if ($codigo==2){
			$query = $this->db->get("obtener_criteriosbusquedacombustible(2)as (cod_chofer integer, nombres text);");
			if($query->num_rows() > 0){ 
				return $query;
			}
			else{ return false;}
			
		}
	}

	function getReporteBusquedaCombustible($per_page, $desde){
			$fecha_desdep =  $this->session->userdata('fecha_desdep');
		$fecha_hastap = $this->session->userdata('fecha_hastap');
		$vehiculop =$this->session->userdata('vehiculop');	
		$conductorp =$this->session->userdata('conductorp');	

		$query = $this->db->query("SELECT * FROM  obtener_busquedaavanzadacombustible('".$fecha_desdep."','".$fecha_hastap."', ".$vehiculop.", ".$conductorp.",".$per_page.",".$desde.")as(cod_orden integer, fecha character varying, nombres text, num_vehiculo character varying, tipo character varying, destino text, km_salida numeric, cantidad_asignada double precision, precio numeric, nombre_gasolina text, valor double precision);");
		if($query->num_rows() > 0){ 
			return $query->result();
		}
		else{ return false;}
	}


}
