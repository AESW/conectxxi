<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SessionL extends CI_Model {
	
	public function User() {
        parent::__construct();
    }
	
	function validarSesion(){
		if (!isset($this->session->userdata['logged_in'])):
			redirect('/');
		endif;
	}
	
	function validarSesionHome(){
		if (isset($this->session->userdata['logged_in'])):
			redirect('panel');
		endif;
	}
	
	function cerrarSesion(){
		$this->session->unset_userdata('logged_in', $sess_array);
		redirect('/');
	}
	
	
	
	
}