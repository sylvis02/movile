<?php if(! defined('BASEPATH')) exit ('No direct script acess allowed');

// Se realiza todas las consultas respectivas a lo que es el modulo talleres

class Conductores_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
       		$this->db_d =$this->load->database('conexion_C',true);
       
        
	}

    function get_conductores_bd1($per_page, $desde){
        if($query = $this->db->query("SELECT * from obtener_conductores(".$per_page.",".$desde.") as (cod_chofer integer, cedula character varying, nombres text, correo text, denominacion_cargo character varying);"))
        {
            return $query->result();
        }else{
            return false;
        }
    }

    function get_conductores(){
        
         $this->db_d->select('*');
         $this->db_d->from('empleado e, cargo c');
         $this->db_d->where('e.carg_id=c.carg_id ');
         $query = $this->db_d->get();
         if($query->num_rows()>0){return $query;
         }else{return false;}  
    }

    function get_conductor_bd1(){
          if($query = $this->db->query("SELECT * from obtener_conductor_db1() as (cedula character varying);"))
        {
            return $query;
        }else{
            return false;
        }
                
    }


    function get_conductor_bd2(){
	
	
        $query = $this->db_d->query("SELECT cedula, nombre, apellido FROM empleado e, cargo c, departamento d WHERE e.carg_id=c.carg_id AND e.depa_id=d.depa_id AND c.descripcion IN ('CONDUCTOR DE VEHICULOS LIVIANOS Y PESADOS', 'CHOFER DE PREFECTURA')");
         if($query->num_rows()>0){return $query;
         }else{return false;}   

	
    }

    function get_nombres_apellidos($cedula){
        $query = $this->db_d->query("SELECT cedula, nombre, apellido from empleado where cedula='".$cedula."'");
         if($query->num_rows()>0){return $query;
         }else{return false;}   
    }
    function buscarDatosConductores($codigo1){
          $query = $this->db_d->query("SELECT empleado.cedula, empleado.nombre,empleado.apellido, empleado.correo, cargo.descripcion as cargo, departamento.descripcion as departamento  from empleado, cargo, departamento where empleado.carg_id=cargo.carg_id and empleado.depa_id=departamento.depa_id
                 and empleado.cedula='".$codigo1."'");
         if($query->num_rows()>0){return $query;
         }else{return false;}   
    }
    function get_licencia(){
          $query = $this->db->query("SELECT * from obtener_tipo_licencia();");
         if($query->num_rows()>0){return $query;
         }else{return false;} 
    }
    function get_insertar_conductor($dato){
  
         $query = $this->db->query("SELECT insertar_conductor('".$dato[0]." ".$dato[1]."','".$dato[2]."','".$dato[3]."','".$dato[4]."','".$dato[5]."','".$dato[6]."',".$dato[7].",'".$dato[8]."','".$dato[9]."','".$dato[10]."','".$dato[11]."');");
         if($query->num_rows()>0){return $query;
         }else{return false;} 
    }

    function eliminar_conductor($codigoChofer){
        if($query = $this->db->query("SELECT eliminar_conductor(".$codigoChofer.")"))
        {
            return $query;
        }else{
            return false;
        }
    }

    function extaer_datos_chofer($codigoChofer){
      if($query = $this->db->query("SELECT * FROM obtener_conductor_id(".$codigoChofer.")AS(cod_chofer integer, cedula character varying, nombres text, novedades character varying, departamento text, denominacion_cargo character varying, correo text, telefono character varying, bancoun character varying, tipocuenta character varying, numcuenta character varying, nombre_licencia text);"))
        {
            return $query;
        }else{
            return false;
        }   
    }

    function actualizar_conductor($dato,$codigoChofer){
        if($query = $this->db->query("SELECT actualizar_chofer(".$codigoChofer.", '".strtoupper($dato[0])."', ".$dato[1].", '".strtoupper($dato[2])."', '".strtoupper($dato[3])."', '".strtoupper($dato[4])."','".strtoupper($dato[5])."','".strtoupper($dato[6])."','".$dato[7]."');"))
        {
            return $query;
        }else{
            return false;
        }   
    }

    
}
