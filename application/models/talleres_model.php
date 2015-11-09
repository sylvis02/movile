<?php if(! defined('BASEPATH')) exit ('No direct script acess allowed');

// Se realiza todas las consultas respectivas a lo que es el modulo talleres

class Talleres_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->db_b =$this->load->database('conexion_B',true);
	}

	function buscarvehiculoPlaca($codigo){

		$query=$this->db->query("SELECT * from obtener_vehiculo_placa('".$codigo."') as (cod_vehiculo integer, marca character varying, modelo character varying, motor character varying, veh_tipo character varying, placa character varying, num_vehiculo character varying, chasis character varying, ano_fabricacion character varying,  nombres text, cod_chofer integer, kilometraje integer, combustible numeric,cod_gasolina bigint, nombre_gasolina text, vehiculo_tipo character varying, id_veh_tipo integer);");

		if($query->num_rows() > 0){ return $query;
		}else{ return false;}
	}
	function getplacas(){
		$query = $this->db->query("SELECT placa FROM vehiculos");
		if($query->num_rows() > 0){ 
			return $query;
		}
		else{ return false;}
	}
	

	function buscarvehiculoNumvehiculo($codigo){

		$this->db->select('*');
		$this->db->from('vehiculos');
		$this->db->where('num_vehiculo',$codigo);
		$query = $this->db->get();

		if($query->num_rows() > 0){ return $query;
		}else{ return false;}
	}
	function buscarexistencia($codigoBu){
		$query=$this->db->query("SELECT placa from vehiculos where placa='".strtoupper($codigoBu)."'");

		if($query->num_rows() > 0){ return $query;
		}else{ return false;}
	}

	function getPreventivo($per_page, $desde){
	
	    $query=$this->db->query("SELECT * FROM obtener_plan_preventivo(".$per_page.",".$desde.")");
	    
	    if($query->num_rows() > 0)
        {
            return $query->result();
        }else{
            return false;
        }
	}

	function getBuscarClaseRepuesto(){
		$name1= array('REPUESTOS COMPUTADOR', 'REPUESTOS MOTOCICLETAS');
		$name= array('REPUESTOS', 'LUBRICANTES');		

		$this->db_b->select('*');
		$this->db_b->from('clase_material');
	        $this->db_b->where_in('CLATIPO', $name);
		$this->db_b->where('CLANOMBRE !=','REPUESTOS COMPUTADOR');
		$this->db_b->where('CLANOMBRE !=','REPUESTOS MOTOCICLETAS');
		 $query1 = $this->db_b->get();
		 if($query1->num_rows()>0){return $query1;
		 }else{return false;}
	}

	function buscarOperador($cod_vehiculo){
		$this->db->select('*');
		$this->db->from('chofer');
		$this->db->join('asig_chofer_vehiculo', 'chofer.cod_chofer=asig_chofer_vehiculo.cod_chofer');
		$this->db->where('asig_chofer_vehiculo.cod_vehiculo',$cod_vehiculo);
		$query = $this->db->get();
		if($query->num_rows() > 0){ return $query;
		}else{ return false;}
	}
	function actu_tipo($ti,$cod_vehiculo){
		$query=$this->db->query("UPDATE vehiculos SET vehiculo_tipo=".$ti." WHERE cod_vehiculo = ".$cod_vehiculo."; ");	
	}
	function getTipos(){
		$this->db->select('*');
		$this->db->from('veh_tipo');

		$query = $this->db->get();

		if($query->num_rows() > 0){ return $query;
		}else{ return false;}
	}
	
	function agregar_mantenimiento($fecha,$detalle,$motivo,$cod_chofer,$cod_vehiculo,$trabajo_realizado,$kilometraje,$codigo1){

		$fecha1=(String) $fecha;
		$detalle1=(String) $detalle;
		 $motivo1=(String) $motivo;
		 $cod_chofer1=(integer) $cod_chofer;
		 $cod_vehiculo1=(integer) $cod_vehiculo;
		 $trabajo_realizado1=(String) $trabajo_realizado;
		$kilometraje1=(integer) $kilometraje;
		$codigo2=(integer) $codigo1;
		
		if($query=$this->db->query("SELECT funci_guardar_mantenimiento('".$fecha1."','".$detalle1."','".$motivo1."',".$cod_chofer1.",".$cod_vehiculo1.",'".$trabajo_realizado1."',".$kilometraje1.",".$codigo2.");"))
	     {
    	       return  $this->db->insert_id(); 
         }else{
         	   return false;
         }


	}
	


	
	function agregar_respuesto($data){

		$query=$this->db->insert('historial_ordenes',$data);
		if($query){ return  $this->db->insert_id(); 
		}else{return false;}
	}

	function getMantenimiento($codigo){
		
		
		$this->db->select('*');
		$this->db->from('mantenimiento_vehiculos');
		$this->db->join('vehiculos','vehiculos.cod_vehiculo=mantenimiento_vehiculos.cod_vehiculo');
		$this->db->join('chofer','chofer.cod_chofer=mantenimiento_vehiculos.cod_chofer');
	        $this->db->where('cod_mantenimiento',$codigo);
	   
		$query = $this->db->get();
	    if($query->num_rows() > 0){ return $query;
		}else{ return false;}
	}


	function getIdUltimo(){
		
		$this->db->select_max('cod_mantenimiento');
		$this->db->from('mantenimiento_vehiculos');
		$query = $this->db->get();
	 if($query->num_rows() > 0){ return $query;
		}else{ return false;}
	}





	function getRepuesto($codigo){
		
		$this->db->select('*');
		$this->db->from('historial_ordenes');
		$this->db->where('cod_mantenimiento',$codigo);
		$query = $this->db->get();
	    if($query->num_rows() > 0){ return $query;
		}else{ return false;}
	}

	function getHistorialVehiculo( $per_page, $desde){
		
		$codigohistorial=$this->session->userdata('codigo_historial');

		if($query = $this->db->query("SELECT * FROM obtener_mantenimiento_vehiculos('".$codigohistorial."', ".$per_page.",".$desde.")AS(fecha character varying, detalle text, motivo character varying, kilometraje integer, cod_vehiculo integer, km_recorrido numeric,id_man_preven integer);"))
        {
            return $query->result();
        }else{
            return false;
        }

	}

	function getControlMantenimiento($codigo){
		//echo $codigo; exit();
		$this->db->select('*');
	    $this->db->from('mantenimiento_vehiculos m, mantenimiento_preventivo');
	    $this->db->join('vehiculos','vehiculos.cod_vehiculo = m.cod_vehiculo');
	    $this->db->join('mantenimiento_preventivo','mantenimiento_preventivo..id_man_preven = m.id_man_preven');
		$this->db->where('vehiculos.placa',$codigo);
	
		$query = $this->db->get();
		 if($query->num_rows()>0){return $query;
		 }else{return false;}

	}
	function getMarca(){
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('vehiculos');  
		$query = $this->db->get();
	    if($query->num_rows() > 0){ return $query;
		}else{ return false;}
	}

	function getModelo($codigo){
		$this->db->distinct();
		$this->db->select('modelo');
		$this->db->from('vehiculos'); 
		$this->db->where('cod_vehiculo',$codigo);

		$query = $this->db->get();
	    if($query->num_rows() > 0){ return $query;
		}else{ return false;}
	}
	
	function getvehiculo_modelo($codigo){

		$this->db->select('num_vehiculo');
		$this->db->from('vehiculos'); 
		$this->db->where('modelo',$codigo); 
		$query = $this->db->get();
		if($query->num_rows() > 0){ return $query;
		}else{ return false;}
	}
	
	function agregar_mantenimiento_Preventivo($data){

		$query=$this->db->insert('mantenimiento_preventivo',$data);
		if($query){ return  $this->db->insert_id(); 
		}else{return false;}
	}

	function getPlan_preven($codigo){
		$this->db->select('*');
		$this->db->from('mantenimiento_preventivo'); 
		$this->db->where('id_man_preven',$codigo);
		$query = $this->db->get();
		if($query->num_rows() > 0){ return $query;
		}else{ return false;}

	}
	function getPlan_preven_nombre($stri){
		
		$this->db->select('id_man_preven');

		$this->db->from('mantenimiento_preventivo'); 
		$this->db->like('descripcion',$stri,'after');
		$query = $this->db->get();
		if($query->num_rows() > 0){ 
			return $query;
		}else{ return false;}

	}



	function deletePlan_preven($codigo){
		$this->db->where('id_man_preven',$codigo);
		return $this->db->delete('mantenimiento_preventivo');

	}

	function update_plan_preven($codigo,$data){

		$this->db->where('id_man_preven', $codigo);
		return $this->db->update('mantenimiento_preventivo', $data);

	}

	function buscarkiloanterios($cod_vehiculo){

		$this->db->select('*');
		$this->db->from('ordenes_combustible'); 
		$this->db->where('cod_vehiculo',$cod_vehiculo);
		$query = $this->db->get();
		if($query->num_rows() > 0){ return $query;
		}else{ return false;}
	}

	function getRepuestosUtilizados($codigo_historial){

		if($query = $this->db->get("repuestos_historial_select(".$codigo_historial.")AS(cantidad DOUBLE PRECISION, repuesto TEXT);"))
        {
            return $query;
        }else{
            return false;
        }
	}

	//obtiene criterio de busqueda para el reporte control de mantenimiento
	function obtenerCriteriosBusqueda_mantenimiento($codigo){

		if ($codigo==1){
			$query = $this->db->get("obtener_criteriosbusquedamantenimiento(1)as (cod_vehiculo integer, vehiculo text);");
			if($query->num_rows() > 0){ 
				return $query;
			}
			else{ return false;}
			
		}if ($codigo==2){
			$query = $this->db->get("obtener_criteriosbusquedamantenimiento(2)as (cod_chofer integer, nombres text);");
			if($query->num_rows() > 0){ 
				return $query;
			}
			else{ return false;}
			
		}
	}
	function getReporteBusqueda($per_page, $desde){

		$fecha_desdec =  $this->session->userdata('fecha_desdec');
		$fecha_hastac = $this->session->userdata('fecha_hastac');
		$tipoc =$this->session->userdata('tipoc');
		$vehiculoc =$this->session->userdata('vehiculoc');	
		$conductorc =$this->session->userdata('conductorc');		

		$query = $this->db->query("SELECT * FROM  obtener_busquedaavanzadamantenimiento('".$fecha_desdec."','".$fecha_hastac."', '".$tipoc."', ".$vehiculoc.", ".$conductorc.",".$per_page.",".$desde.")as(cod_mantenimiento integer, fecha character varying, tipo character varying, vehiculo character varying,num_vehiculo character varying, motivo character varying,  kilometraje integer, detalle text, nombres text);");
		if($query->num_rows() > 0){ 
			return $query->result();
		}
		else{ return false;}
       
	}
	
	function getReporteBusquedaCombustible($per_page, $desde){

		
		$fecha_desdec =  $this->session->userdata('fecha_desdep');
		
		$fecha_hastac = $this->session->userdata('fecha_hastap');

		
		$vehiculoc =$this->session->userdata('vehiculop');	
		
		$conductorc =$this->session->userdata('conductorp');	
	

		
		$query = $this->db->query("SELECT * from obtener_busquedaavanzadacombustible('".$fecha_desdec."', '".$fecha_hastac."',".$vehiculoc.",".$conductorc.", ".$per_page.",".$desde.") as (cod_orden integer, fecha character varying, nombres text, num_vehiculo character varying, destino character varying, km_salida numeric, cantidad_asignada double precision, precio numeric, nombre_gasolina text, valor double precision);");
		
		if($query->num_rows() > 0){ 
			
			return $query->result();
		
		}
		else{ return false;}
       
	
	}

	


}
