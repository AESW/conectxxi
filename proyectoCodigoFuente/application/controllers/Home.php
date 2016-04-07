<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Sanitize.php');


class Home extends CI_Controller {
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        /*Necesario para validaciones de formulario, sanitizar variables $_POST y $_GET*/
        $this->load->helper('email');
        $this->load->library('form_validation');
        $this->Sanitize = new Sanitize();
        
        /*Mandar llamar modelos que requieran de actividades de BD*/
        $this->load->model('User');
        
    }
    
	public function index()
	{
		$this->SessionL->validarSesionHome();
		$dataHeader = array(
			"titulo" => "Inicio de sesión"
		);
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('login/login');
		$this->load->view('includes/footer');
	}
	
	public function login(){
		$this->SessionL->validarSesionHome();
		$dataHeader = array(
			"titulo" => "Inicio de sesión"
		);
		$data = array();
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			
		} else {
			
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			
			$result = $this->User->login($data);
			if ($result == TRUE) {

				$username = $this->input->post('username');
				$result = $this->User->read_user_information($username);
				if ($result != false) {
					$session_data = array(
						'username' => $result[0]->RFC,
						'email' => $result[0]->correoUsuario,
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					redirect('panel');
				}
			} else {
				$data = array(
					'error_message' => 'Usuario o contraseña no válida'
				);
				
			}
		}
		
		$this->load->view('includes/header' , $dataHeader);
		$this->load->view('login/login' , $data);
		$this->load->view('includes/footer');
	}
	
	public function logout(){
		 $this->SessionL->cerrarSesion();
	}
	
}
