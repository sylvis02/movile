
<?php if(! defined('BASEPATH')) exit ('No direct script acess allowed');

class Usuario_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();

	}
	function getUsuarios($data){
		if($data['usuario']!=null && $data['clave']!=null){
			$query = $this->db->get_where('usuarios', array('login_usu' =>$data['usuario'], 'passwd'=>$data['clave']), TRUE);
			if($query->num_rows() > 0) {return $query;}
			else{ return false;}
		}else {return false; }
	}


	function getAllUsuarios(){
		$query = $this->db->get('obtener_usuarios_select()');
		if($query->num_rows() > 0) return $query;
		else return false;

	}
	function getMenus(){
		$query = $this->db->get('obtener_menus_select()');
		if($query->num_rows() > 0) return $query;
		else return false;

	}
	function getSubmenus($codigo){
		if($query=$this->db->get("obtener_submenus(".$codigo.")as(id_submenu integer,  nom_sub character varying);"))
		{
			return $query;
        }else{return false; }
	}

	function getRolPermiso($id_usuario){
		if($query=$this->db->get("obtener_rolpermiso_select(".$id_usuario.");"))
		{
			return $query;
        }else{return false; }

	}
	function insertUsuario($data){
		
		$tammano=count($data[3]);
		$descripcion=$data[3];
		$cont=0;
		$datoPermiso="{";
		for($i=0; $i<$tammano; $i++){
      		if($i>0){
      			$datoPermiso.=",";
      		}
	 		 $datoPermiso.=$descripcion[$i];
	  		
      		}
		$datoPermiso.="}";
		if($query=$this->db->query("SELECT insertar_usuario('$data[0]','$data[1]','$data[2]', '".$datoPermiso."'::integer[]);"))
		{
			return $query;
        	}else{return false; }
	}

	function getObtenerUsuarioRol($codigo){
	
		if($query=$this->db->get("obtener_usuario_rolpermiso_list(".$codigo.")as (id_uduario integer, nombre_usu character varying, login_usu character varying, passwd character varying,  id_submenu integer, cod_rol_permiso integer );"))
		{
			return $query;
        }else{return false; }
	}

	function obtener_usuario($codigo){

		$query = $this->db->query("SELECT * FROM obtener_usuario(".$codigo.");");
		if($query->num_rows() > 0) {
			return $query;
		}else{ 
			return false;
		}

	}

	function elimnarUsuario($codigo){
	
		if($query=$this->db->query("select eliminar_usuarios(".$codigo.");"))
		{
			return $query;
		}
        else{return false; }
	}

	function actualizarUsuario($data){

		$tammano=count($data[4]);
		$descripcion=$data[4];
		$cont=0;
		$datoPermiso="{";
		for($i=0; $i<$tammano; $i++)
      	{
      		if($i>0){
      			$datoPermiso.=",";
      		}
	 		 $datoPermiso.=$descripcion[$i];
	  		
      }
		$datoPermiso.="}";
		if($query=$this->db->query("select actualizar_usuario($data[0],'$data[1]','$data[2]','$data[3]', '".$datoPermiso."'::integer[]);"))
		{
			return $query;
        }
        else{return false; }
		
	}

	function getActividadesUsuarios($fecha_desde, $fecha_hasta){
	if($query=$this->db->get("obtener_tbl_audit_list('".$fecha_desde."','".$fecha_hasta."')as(nombre_tabla character varying, operacion character, valor_anterior text, valor_nuevo text,fecha date, usuario character varying, id_audit integer );"))
         {
               return  $query; 
         }else{
               return false;
         }    
	}


	function getbusquedaavanzada($per_page, $desde){
		$fecha_desde =  $this->session->userdata('fecha_desde');
		$fecha_hasta = $this->session->userdata('fecha_hasta');
	
		
		$query = $this->db->query("SELECT * FROM  obtener_busquedaavanzadatblaudit('".$fecha_desde."','".$fecha_hasta."',0, ".$per_page.", ".$desde.")as(nombre_tabla character varying, operacion character, valor_anterior text, valor_nuevo text, fecha date, usuario character varying, id_audit integer);");
		if($query->num_rows() > 0){ 
			return $query->result();
		}
		else{ return false;}


	}



	
}

