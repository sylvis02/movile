<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
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
		$this->load->model('usuario_model');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index(){

		$this->load->view('headers');	
		$this->load->view('welcome_message');
	}

	public function com_login(){

		$data = array(

				'usuario'=>$this->input->post('login'),
				'clave'=>md5($this->input->post('passwd'))
			);

		$res['usuarios']=$this->usuario_model->getUsuarios($data);
	   	if($res['usuarios']==false){
			redirect('','refresh',$res); 
		}else{
			 $nombre_usus="";
	   		 $id_usuario;
			foreach ($res['usuarios']->result() as $usuario) {
				$nombre_usus= $usuario->nombre_usu;
				$id_usuario = $usuario->id_uduario;
			}

			$session = array(
            'username'  => $nombre_usus,
            'id_usuario'  => $id_usuario,
            'login_ok' => TRUE

            );
            
			$this->session->set_userdata($session);
			$this->load->view('headers');
			redirect('principal', 'refresh');

			//redirect('principal', 'refresh',$res); 
			
		}
	}

	public function logout(){
 		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
        exit();
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
