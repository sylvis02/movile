<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imprimir extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('movilizacion_model');
		$this->load->model('talleres_model');
		$this->load->helper('url');
	}
	public function index()
	{
		
	}

	public function salvo_conducto($codigo){
	
		$datos['salvo_conducto'] = $this->movilizacion_model->getAllMovilizacion($codigo);
		$this->load->view('imprimir/salvo_conducto',$datos);
	}
	public function solicitud($codigo){
               
               $datos['solicitud'] = $this->movilizacion_model->getAllMovilizacion($codigo);
               $this->load->view('imprimir/solicitud_movilizacion',$datos);
       }

	public function orden_combustible($codigo){


		$datos['orden_combustible']=$this->movilizacion_model->getOrdenes_Combustible($codigo);
		$this->load->view('imprimir/orden_combustible', $datos);
	}

	public function imprimirsolicitud_mantenimiento()
	{
		
    	
		$codigo = $this->input->post('cod_mantenimientoImprimir');
		
		$datos['solicitud_mantenimiento'] = $this->talleres_model->getMantenimiento($codigo);
		$datos['repuestos']=$this->talleres_model->getRepuesto($codigo);
		$this->load->view('imprimir/solicitud_talleres',$datos);
	}
	public function nota_repuestos()
	{
    	
		$codigo = $this->input->post('cod_mantenimientoImprimir');
		$datos['solicitud_mantenimiento'] = $this->talleres_model->getMantenimiento($codigo);
		$datos['repuestos']=$this->talleres_model->getRepuesto($codigo);
		$this->load->view('imprimir/nota_repuestos',$datos);
	}

}