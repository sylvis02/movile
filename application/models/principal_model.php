<?php if(! defined('BASEPATH')) exit ('No direct script acess allowed');

class Principal_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->db_b =$this->load->database('conexion_B',true);

	}

	function getVehiculos(){
		$this->db->select('*');
		$this->db->from('vehiculos');
		$this->db->join('tipo_vehiculo','vehiculos.cod_tipo=tipo_vehiculo.cod_tipo');
		$this->db->join('combustible','vehiculos.cod_gasolina=combustible.cod_gasolina');
		
		$query = $this->db->get();

   		if($query->num_rows()>0){ return $query;
		 }else{return false;}
	
	}

	function getProvicion_Combustible(){
		$this->db->select('*');
		$this->db->from('ordenes_combustible');
		$this->db->join('vehiculos','ordenes_combustible.cod_vehiculo=vehiculos.cod_vehiculo');
		$this->db->join('chofer','ordenes_combustible.cod_chofer=chofer.cod_chofer');
		$this->db->join('movilizacion','ordenes_combustible.cod_movilizacion=movilizacion.cod_movilizacion');
		$this->db->join('tipo_vehiculo','vehiculos.cod_tipo = tipo_vehiculo.cod_tipo');
		$this->db->join('combustible','vehiculos.cod_gasolina=combustible.cod_gasolina');
		$query = $this->db->get();

   		if($query->num_rows()>0){ return $query;
		 }else{return false;}
	

	}

	function getAllMantenimiento_Preventivo(){

		$this->db->select('*');
		$this->db->from('mantenimiento_preventivo');
		$query = $this->db->get();

   		if($query->num_rows()>0){ return $query;
		 }else{return false;}

	}
	
	function getProvicion_Combustible_Detalle(){
		$this->db->select('nombre_gasolina, precio');
		$this->db->select_sum('cantidad_asignada');
		
		$this->db->from('ordenes_combustible');
		$this->db->join('vehiculos','ordenes_combustible.cod_vehiculo=vehiculos.cod_vehiculo');
		$this->db->join('chofer','ordenes_combustible.cod_chofer=chofer.cod_chofer');
		$this->db->join('movilizacion','ordenes_combustible.cod_movilizacion=movilizacion.cod_movilizacion');
		$this->db->join('tipo_vehiculo','vehiculos.cod_tipo = tipo_vehiculo.cod_tipo');
		$this->db->join('combustible','vehiculos.cod_gasolina=combustible.cod_gasolina');
		$this->db->group_by(array('nombre_gasolina', 'precio'));

		$query = $this->db->get();

   		if($query->num_rows()>0){ return $query;
		 }else{return false;}
	
	}
	
		function getConductores(){
		$this->db->select('*');
		$this->db->from('chofer');
		$this->db->join('licencia_tipo','chofer.cod_licencia=licencia_tipo.cod_licencia');
		$query = $this->db->get();

   		if($query->num_rows()>0){ return $query;
		 }else{return false;}
	
	}

	function getMovilizacion(){
		$this->db->select('*');
		$this->db->from('chofer');
		
		$this->db->join('movilizacion','chofer.cod_chofer=movilizacion.cod_chofer');
		$this->db->join('vehiculos','movilizacion.cod_vehiculo=vehiculos.cod_vehiculo');
		$this->db->join('tipo_vehiculo','vehiculos.cod_tipo=tipo_vehiculo.cod_tipo');
		$this->db->join('ordenes_combustible','movilizacion.cod_movilizacion=ordenes_combustible.cod_movilizacion');
		$this->db->join('combustible','ordenes_combustible.cod_gasolina=combustible.cod_gasolina');
		$this->db->order_by('nombres', 'desc'); 
		$query = $this->db->get();

   		if($query->num_rows()>0){ return $query;
		 }else{return false;}
	

	}

	function getBuscarClaseRepuesto(){
		
		 $this->db_b->select('*');
		 $this->db_b->from('clase_material');
		 $query1 = $this->db_b->get();
		 if($query1->num_rows()>0){return $query1;
		 }else{return false;}
	}

	function getBuscarClaseRepuestoporVehiculo($codigo){
		 $this->db_b->select('*');
		 $this->db_b->from('admmaterial');
		 $this->db_b->join('stock','admmaterial.MATID = stock.MATID');
		 $this->db_b->where('CLAID',$codigo);

		 $query1 = $this->db_b->get();

		 if($query1->num_rows()>0){return $query1;
		 }else{return false;}
	}

	function getClaseMaterial(){
		
		 $this->db_b->select('a.MATCODIGO, a.MATNOMBRE');
		 $this->db_b->from('admmaterial a, clase_material c');
		 $this->db_b->where('a.CLAID = c.CLAID');
		 $query1 = $this->db_b->get();

		 if($query1->num_rows()>0){return $query1;
		 }else{return false;}
	}	

	function getRepuestosExcel(){
		 $this->db_b->select('a.MATCODIGO, a.MATNOMBRE, c.CLANOMBRE, c.CLADESCRIPCION, c.CLATIPO');
		 $this->db_b->from('admmaterial a, clase_material c');
		 $this->db_b->where('a.CLAID = c.CLAID');
		 $query1 = $this->db_b->get();

		 if($query1->num_rows()>0){return $query1;
		 }else{return false;}
	}

	function getKilometrajeMan($codigo){
		
		 $this->db->select('kilometraje, cod_mantenimiento');
		 $this->db->from('mantenimiento_vehiculos');
		 $this->db->where('cod_vehiculo',$codigo);
		 $query = $this->db->get();
		 if($query->num_rows()>0){return $query;
		 }else{return false;}
	}

	function getKilometrajeMan_preve($kilo,$cod_gasolina1,$tipo_vehiculo1){
	
		$query = $this->db->query("SELECT * from obtener_mantenimiento_preventivo(".$kilo.",".$cod_gasolina1.",".$tipo_vehiculo1.") as (descripcion character varying);");
		 if($query->num_rows()>0){return $query;
		 }else{return false;}
	}
	
	function getControlMantenimiento_excel(){
		 if($query = $this->db->get('mantenimiento_select()AS(cod_mantenimiento INTEGER, fecha CHARACTER VARYING(20), detalle TEXT, motivo CHARACTER VARYING(100), kilometraje INTEGER, placa CHARACTER VARYING(30), marca CHARACTER VARYING(50), modelo CHARACTER VARYING(80), nombres TEXT);'))
        	{ 
			return $query;
           
        	} else{
            		return false;
        	}
    }


}