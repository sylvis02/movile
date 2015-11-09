<?php if(! defined('BASEPATH')) exit ('No direct script acess allowed');

class Administracion_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
        $this->db_b2 =$this->load->database('conexion_D',true);

	}

	function getlisvehiculosConductores($per_page, $desde){
		if($query=$this->db->query("SELECT * FROM obtener_vehiculos_cohofer_list(".$per_page.",".$desde.")as(cod_vehiculo integer, tipo character varying, marca character varying, num_vehiculo character varying, placa character varying,condicion_real character varying, asignado_chof character, nombres text);"))
		{
			return $query->result();
        }else{return false; }
	}

	function getChoferDisponible(){
		if($query=$this->db->get("obtener_chofer_disponible() as (cod_chofer integer,nombres text);"))
		{
			return $query;
        }else{return false; }
	}

	function getVehiculo($cod_vehiculo){
	
		$query = $this->db->get("obtener_unvehiculo_select(".$cod_vehiculo.");");
		if($query->num_rows() > 0){ 
			return $query;
		}
		else{ return false;}
	}

	function asignarChofer($data){
		echo $data[0];
		echo $data[1];
		echo $data[2];
		echo $data[3];
		echo $data[4];
		echo $data[5];
		echo $data[6];
	
		if($query=$this->db->query("SELECT insertar_asig_chofer_vehiculo('".$data[0]."','".$data[1]."', '".$data[2]."', ".$data[3].",".$data[4].",'".$data[5]."','".$data[6]."');"))
		{
			return $query;
        	}else{return false; }

	}

	function update_asig_chofer_vehiculo($cod_vehiculo){
		if($query=$this->db->query("select actualizar_vehiculos_chof(".$cod_vehiculo.");"))
		{
			return $query;
        }
        else{return false; }
	}

	function update_asig_chofer_chofer($cod_chofer){
		if($query=$this->db->query("select actualizar_chofer_vehi(".$cod_chofer.");"))
		{
			return $query;
        }
        else{return false; }
	}

	function getAsignar_vehiculo($cod_vehiculo){
		if($query=$this->db->get("obtener_asig_chofer_vehiculo_select(".$cod_vehiculo.") as (fecha_asig date, cod_chofer integer, descripcion text, acta_entrega character varying, revision_asig character, nombres text );"))
		{
			return $query;
        }
        else{return false; }
	}

	function actu_asignar_chofer($data){
		
		if($query=$this->db->query("select actualizar_asig_chofer_vehiculo($data[0],'$data[1]','$data[2]', '$data[3]');"))
		{
			return $query;
        }
        else{return false; }
	}

	function delete_asig_chofer_vehiculo($cod_vehiculo){

		if($query=$this->db->get("eliminar_asig_chofer_vehiculo(".$cod_vehiculo.");"))
		{
			return $query;
        }
        else{return false; }
	}

	function getTipos_vehiculos(){

		if($query=$this->db->get("tipo_vehiculos_list_select()as(cod_tipo bigint, nombre_tipo character varying, desc_tipo character varying,  tipo character varying);"))
		{
			return $query;
        }else{return false; }
	}

	function getVehiculosTipo(){

    	if($query=$this->db->get("vehi_tipo_list_select()as(id_veh_tipo integer, tipo character varying);"))
		{
			return $query;
        }else{return false; }
	}

	function insertTipo_Vehiculo($data){
		if($query=$this->db->query("select tipo_vehiculo_insert('$data[0]','$data[1]',$data[2]);"))
		{
			return $query;
        }
        else{return false; }
	}

	function deleteTipoVehiculo($cod_tipo){
		if($query=$this->db->query("select tipo_vehiculo_delete(".$cod_tipo.");"))
		{
			 return $query;
        }
        else{ return false; }

	}

	function getTipoVehiculos($codigo){
		$query = $this->db->get("untipo_vehiculo_select(".$codigo.");");
		if($query->num_rows() > 0){ 
			return $query;
		}
		else{ return false;}


	}
	function updateTipoVehiculos($data){
		if($query=$this->db->query("select tipo_vehiculo_update($data[0],'$data[1]','$data[2]', $data[3]);"))
		{
			return $query;
        }
        else{return false; }
	}


	function getCombustibles(){

		if($query = $this->db->get("obtener_combustible()"))
        {
            return $query;
        }else{
            return false;
        }

	}
	
	function deleteCombustible($codigoC){


		if($query = $this->db->query("select eliminar_combustible(".$codigoC.")"))
        {
            return $query;
        }else{
            return false;
        }
	}

	function getActu_combustible($codigoCo){

		if($query = $this->db->get("obtener_combustible_id(".$codigoCo.")"))
        {
            return $query;
        }else{
            return false;
        }


	}

	function update_combustible_fin($codigo,$nombre,$precio){
	if($query = $this->db->query("select actualizar_combustible(".$codigo.", '".strtoupper($nombre)."', ".$precio.");"))
        {
            return $query;
        }else{
            return false;
        }

	}

	function getInsertarCombustibles($nombre_c,$precio_c){


	if($query=$this->db->query("select insertar_combustible('".strtoupper($nombre_c)."',".$precio_c.");"))
	     {
    	       return  $this->db->insert_id(); 
         }else{
         	   return false;
         }
	}

	function getGasolineras(){
		if($query=$this->db->get("obtener_gasolineras()"))
	     {
    	       return  $query; 
         }else{
         	   return false;
         }
	}

	function getInsertarGasolinera($nombre_gasolinera){

		if($query=$this->db->query("select insertar_gasolinera('".strtoupper($nombre_gasolinera)."');"))
	     {
    	       return  $this->db->insert_id(); 
         }else{
         	   return false;
         }
	}
	function deleteGasolinera($cod_gasolinera){
		if($query = $this->db->query("select eliminar_gasolinera(".$cod_gasolinera.")"))
        {
            return $query;
        }else{
            return false;
        }

	}
	function getActu_Gasolinera($codigo_id){
		if($query=$this->db->get("obtener_gasolineras_id(".$codigo_id.")"))
	     {
    	       return  $query; 
         }else{
         	   return false;
         }
	}

	function update_gasolinera_fin($codigo,$nombre){

		if($query = $this->db->query("select actualizar_gasolinera(".$codigo.", '".strtoupper($nombre)."');"))
        {
            return $query;
        }else{
            return false;
        }
	}

    function getTipo_Licencia(){

        if($query=$this->db->get("obtener_tipo_licencia()"))
         {
               return  $query; 
         }else{
               return false;
         }   
    }

    function deleteTlicencia($cod_tlicencia){
        if($query = $this->db->query("select eliminar_tipo_licencia(".$cod_tlicencia.")"))
        {
            return $query;
        }else{
            return false;
        }
    }

    function getTipo_licencia_id($codigoTipoLi){
        if($query = $this->db->get("obtener_tipo_licencia_id(".$codigoTipoLi.")"))
        {
            return $query;
        }else{
            return false;
        }

    }

    function update_tipo_licencia_fin($codigoT,$nombreT){
        if($query = $this->db->query("select actualizar_tipo_licencia(".$codigoT.", '".strtoupper($nombreT)."');"))
        {
            return $query;
        }else{
            return false;
        }
    }
   

    function getInsertarTipoLicencia($nombre_t){
        if($query=$this->db->query("select insertar_tipo_licencia('".strtoupper($nombre_t)."');"))
         {
               return  $this->db->insert_id(); 
         }else{
               return false;
         }
    }

function getReg_Vehiculo($per_page, $desde){
         $query= $this->db->query("SELECT * FROM obtener_reg_vehiculo(".$per_page.",".$desde.")AS (placa CHARACTER VARYING,cod_vehiculo INTEGER, marca CHARACTER VARYING, modelo CHARACTER VARYING, motor CHARACTER VARYING, chasis CHARACTER VARYING, color CHARACTER VARYING, tonelaje double precision,
                 num_vehiculo CHARACTER VARYING, ano_fabricacion CHARACTER VARYING, fecha_adquision  character varying, precio_adq numeric, condicion_real CHARACTER VARYING, tipo character varying, nombre_gasolina text);");
         if($query->num_rows() > 0){
         
               return  $query->result(); 
         }else{
               return false;
         }    
    }

function get_select_combustibleRegVehciulo(){
        if($query=$this->db->get("obtener_combustible()"))
         {
               return  $query; 
         }else{
               return false;
         }  
    }
function get_select_estado_actual(){
       if($query=$this->db->get("obtener_estado_actual_vehiculo()"))
         {
               return  $query; 
         }else{
               return false;
         } 
    }
    function get_select_veh_tipo(){
        if($query=$this->db->get("obtener_veh_tipo()"))
         {
               return  $query; 
         }else{
               return false;
         } 
    }
 
    function getreg_insert_vehiculo(){

        if($query=$this->db->get("obtener_placa_vehiculo() AS (placa CHARACTER VARYING(30));"))
         {
               return  $query; 
         }else{
               return false;
         }       
    }

    function get_select_placa_bd2(){
        $na1="'NA'";
        $na2="'N/A'";   
        $query = $this->db_b2->query('SELECT distinct placa_vehiculo, id_bien FROM "BIEN_VEHICULO" WHERE placa_vehiculo!='.$na2.'AND placa_vehiculo !='.$na1);
         if($query->num_rows()>0){return $query;
         }else{return false;}   
    }

    function buscarDatosenBienesVehiculo1($codigoVe){
         $this->db_b2->select('*');
         $this->db_b2->from('"BIEN_VEHICULO"');
         $this->db_b2->where('placa_vehiculo',$codigoVe);
         $query = $this->db_b2->get();
         if($query->num_rows()>0){return $query;
         }else{return false;}  
    }

    function buscarDatosenBienesVehiculo($codigobien){
          $this->db_b2->select('*');
         $this->db_b2->from("BIEN");
         $this->db_b2->where("id_bien",$codigobien);
         $query = $this->db_b2->get();
         if($query->num_rows()>0){return $query;
         }else{return false;}
    }
function getInsertarFinRegVehiculo($combustible1,$estado_pertenencia1,$num_vehiculo1,$pais_origen1,$tonelaje1,
        $rendimiento_galon1,$fecha_vencimiento_soat1,$fecha_vencimiento_matricula1,$imagen_frontal2,
        $imagen_lateral1,$codigo_catalogo_bien1,$estado_bien1,$modelo_caracteristicas_bien1,$marca_raza_otros_bien1,
        $serie_identificacion_bien1,$novedades1,$tipo_comprobante_bien1,$fecha_bien1,$costo_adquision_vehiculo1,
        $chasis_vehiculo1,$motor_vehiculo1,$clase_vehiculo1,$placa_vehiculo1,$anio_fabricacion_vehiculo1,
        $color_primario_vehiculo1,$notificaciones_talleres1,$casa_comercial1,$tipo1){
       
        $num_vehiculo2="'".$num_vehiculo1."'";
        $pais_origen2="'".$pais_origen1."'";
        $fecha_vencimiento_soat2="'".$fecha_vencimiento_soat1."'";
        $fecha_vencimiento_matricula2="'".$fecha_vencimiento_matricula1."'";
        $codigo_catalogo_bien2="'".$codigo_catalogo_bien1."'";
        $estado_bien2="'".$estado_bien1."'";
        $modelo_caracteristicas_bien2="'".$modelo_caracteristicas_bien1."'";
        $marca_raza_otros_bien2="'".$marca_raza_otros_bien1."'";
        $serie_identificacion_bien2="'".$serie_identificacion_bien1."'";
        $novedades2="'".$novedades1."'";
        $tipo_comprobante_bien2="'".$tipo_comprobante_bien1."'";
        $fecha_bien2="'".$fecha_bien1."'";
        $chasis_vehiculo2="'".$chasis_vehiculo1."'";
        $motor_vehiculo2="'".$motor_vehiculo1."'";
        $clase_vehiculo2="'".$clase_vehiculo1."'";
        $placa_vehiculo2="'".strtoupper($placa_vehiculo1)."'";
        $anio_fabricacion_vehiculo2="'".$anio_fabricacion_vehiculo1."'";
        $color_primario_vehiculo2="'".$color_primario_vehiculo1."'";
        $notificaciones_talleres2="'".$notificaciones_talleres1."'";
        $casa_comercial2="'".$casa_comercial1."'";
        
        if($query=$this->db->query("select insertar_vehiculo(".$estado_pertenencia1.",".$combustible1.", ".$placa_vehiculo2.", ".$tipo_comprobante_bien2.",".$casa_comercial2.",
            ".$pais_origen2.",".$marca_raza_otros_bien2.",".$modelo_caracteristicas_bien2.", ".$motor_vehiculo2.",".$chasis_vehiculo2.",".$color_primario_vehiculo2.",".$tonelaje1.",
            ".$num_vehiculo2.",".$serie_identificacion_bien2.",".$anio_fabricacion_vehiculo2.",".$costo_adquision_vehiculo1.",
            ".$rendimiento_galon1.", ".$codigo_catalogo_bien2.", '".$imagen_frontal2."','".$imagen_lateral1."', ".$novedades2.",".$notificaciones_talleres2.",
            ".$fecha_vencimiento_matricula2.",".$fecha_vencimiento_soat2.",".$estado_bien2.", ".$clase_vehiculo2.",".$fecha_bien2.",".$tipo1.");"))
         {
            return  $this->db->insert_id(); 
         }else{
               return false;
         }
    
    }
    function get_placa_bd2(){
        $na1="'NA'";
        $na2="'N/A'"; 
        $habilitado="'HABILITADO'";   
        
        $query = $this->db_b2->query('SELECT  distinct bv.placa_vehiculo FROM "BIEN" b, "BIEN_VEHICULO" bv WHERE b.id_bien=bv.id_bien AND b.reutilizable_bien='.$habilitado.' AND bv.placa_vehiculo!='.$na2.'AND bv.placa_vehiculo !='.$na1);
         if($query->num_rows()>0){return $query;
         }else{return false;}   
    }
        function deletereg_vehiculo($codigo_reg){
        if($query = $this->db->query("select eliminar_reg_vehiculo(".$codigo_reg.")"))
        {
            return $query;
        }else{
            return false;
        }
    }
    function getVehiculos($per_page, $desde){

        $query = $this->db->query("SELECT  * from obtener_vehiculos(".$per_page.",".$desde.") as (tipo character varying, marca character varying, num_vehiculo character varying, placa character varying, nombre_gasolina text, novedades character varying, notificaciones_talleres character varying, condicion_real character varying, fecha_mat character varying, fecha_soat character varying );");

        if($query->num_rows()>0){ return $query->result();
         }else{return false;}
    
    }
    function getreg_vehiculo_id($codigoV){


     if($query=$this->db->query("SELECT * from obtener_reg_vehiculo_id(".$codigoV.")as (rendimiento_galon numeric, placa CHARACTER VARYING,cod_vehiculo INTEGER, marca CHARACTER VARYING, modelo CHARACTER VARYING, motor CHARACTER VARYING, chasis CHARACTER VARYING, color CHARACTER VARYING, tonelaje double precision, num_vehiculo CHARACTER VARYING, ano_fabricacion CHARACTER VARYING, fecha_adquisicion character varying, precio_adq numeric, condicion_real CHARACTER VARYING, tipo character varying, nombre_gasolina text, descripcion text, casa character varying, pais character varying, fecha_soat character varying, fecha_mat character varying, notificaciones_talleres character varying, cod_vehiculo2 character varying, serie character varying, novedades character varying, factura character varying,vehiculo_tipo character varying,imagen_vehiculo character varying)"))
         {
               return  $query; 
         }else{
               return false;
         }   
    }
    function get_actualizar_vehiculo_id($dato,$codigoVe){
      
        if($query = $this->db->query("SELECT actualizar_vehiculo(".$codigoVe.",".$dato[0].",".$dato[1].",'".strtoupper($dato[2])."','".strtoupper($dato[3])."','".strtoupper($dato[4])."',".$dato[5].",".$dato[6].",'".strtoupper($dato[7])."','".strtoupper($dato[8])."','".strtoupper($dato[9])."','".$dato[10]."','".$dato[11]."','".$dato[12]."');"))
        {
            return $query;
        }else{
            return false;
        }
    }
    function getConductores($per_page, $desde){
      
        $query = $this->db->query("SELECT  * from obtener_conductores(0,0) as (cod_chofer integer,cedula character varying, nombre text, correo text,denominacion_cargo character varying)");

        if($query->num_rows()>0){ return $query->result();
         }else{return false;}
    
    }

    function getMatriculaSoat(){
        $this->db->select('*');
        $this->db->from('vehiculos');
        $query = $this->db->get();

        if($query->num_rows()>0){ return $query;
         }else{return false;}
    
    }

     function get_novedades($per_page,$desde){
        $query = $this->db->query("SELECT * from obtener_novedades(".$per_page.",".$desde.") as (cod_vehiculo integer, placa character varying, modelo character varying, marca character varying, novedades character varying, notificaciones_talleres character varying);");

        if($query->num_rows()>0){ return $query->result();
         }else{return false;}
    }
  function getVehiculos_matsoat(){
         $query = $this->db->query("SELECT * from obtener_matriculas();");

        if($query->num_rows()>0){ return $query;
         }else{return false;}
    }
}
