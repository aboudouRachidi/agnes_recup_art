<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
    	
        parent::__construct();
        
    }
    
	public function index()
	
	{
		if($this->session->userdata('auth') || $this->session->userdata('logged')){
			
			redirect(base_url('compte'));
			
		}
			
			$this->form_validation->set_rules('email','Email','trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('mdp','Mot de passe','trim|required|xss_clean');
		
		if($this->form_validation->run())
		{
			//$this->load->model('Login_model');
			
			if($this->Login_model->check_id($this->input->post('email'),$this->input->post('mdp')))
			{
				
				$data['users'] = $this->Login_model->getAll($_SESSION['auth']['id']);
				redirect('compte',$data);
				
			}else{
				$data['title'] = 'Erreur connexion';
				$info['error'] = 'Mauvais identifiants';
				$data['categories'] = $this->products_model->getAll_categories();
				$data['materiaux'] = $this->products_model->getAll_materiau();
				$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
				
				$this->load->view('includes/header',$data);
				$this->load->view('includes/menu',$data);
				$this->load->view('login',$info);
				$this->load->view('includes/footer',$data);
			}
	
		}else{
			$data['title'] = 'Connexion';
			$data['categories'] = $this->products_model->getAll_categories();
			$data['materiaux'] = $this->products_model->getAll_materiau();
			$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
			
			$this->load->view('includes/header',$data);
			$this->load->view('includes/menu',$data);
			$this->load->view('login');
			$this->load->view('includes/footer',$data);
			}
		
	}	
}
