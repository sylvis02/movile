<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* CodeIgniter Access_library Class
*
* Esta clases permite determina el acceso del usuario al sistema
*
* @package CodeIgniter
* @subpackage Libraries
* @category Libraries
*/

class CI_Access_library {


	public function __construct($config = array()){

		$this->CI =& get_instance();
	}

	public function check_logged_in(){

		if ($this->CI->session->userdata('logged_in') != TRUE){

			redirect(base_url(), 'refresh');
			exit();
		}else{}


	}


}

