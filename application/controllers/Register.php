<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    function __construct(){
        parent::__construct();
    }
	function index()
	{
		if($this->session->userdata('auth') || $this->session->userdata('logged')){
			
			redirect('compte');
			
		}else{
		
		$this->form_validation->set_rules('nom','Nom','trim|required|xss_clean');
		$this->form_validation->set_rules('prenom','Prenom','trim|required|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|required|xss_clean|valid_email|callback_check_email');
		$this->form_validation->set_rules('mdp','Mot de passe','trim|required|xss_clean|min_length[6]');
		$this->form_validation->set_rules('confirm_mdp','Comfirmer mot de passe','trim|required|xss_clean|callback_check_mdp');
		
		if ($this->form_validation->run()){
			$data = array(
					'nom' =>$this->input->post('nom'),
					'prenom' =>$this->input->post('prenom'),
					'email' =>$this->input->post('email'),
					'mdp' =>hash('sha256',$this->input->post('mdp')),
			);
			
			$this->Register_model->new_register($data);
			$mesg = $this->load->view('EmailBienvenue',$data,true);
			$this->email->from('aboud976@live.fr', 'RecupArt');
			$this->email->to($this->input->post('email'),'Inscription');
			$this->email->subject('Inscription RecupArt');
			$this->email->message($mesg);
			
			$this->email->send();
			$data = $this->session->set_flashdata('info','L\'inscription a été prise en compte un email vous a été envoyer à l\'adresse '.'<b> '.$this->input->post('email').'</b>');
			//$info['success'] = 'Inscription réussie';
			
			if($this->Register_model->check_id($this->input->post('email')))
			{
			redirect(base_url('compte',$data));
			}
			
		}else{
			$data['title'] = 'Créer un compte';
			$data['categories'] = $this->products_model->getAll_categories();
			$data['materiaux'] = $this->products_model->getAll_materiau();
			$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
			
			$this->load->view('includes/header',$data);
			$this->load->view('includes/menu',$data);
			$this->load->view('register');
			$this->load->view('includes/footer',$data);
		}
		
		}
	}
	
	//fonction de call back
	function check_email(){
		
		if($this->input->post('email')){
			
			$this->db->select('id_client');
			$this->db->from('client');
			$this->db->where('email',$this->input->post('email'));
			if($this->db->count_all_results()>0){
				
				$this->form_validation->set_message('check_email', 'Cet email est déjà utilisé');
				
				return false;
				
			}else{
				
				return true;
			}
		}
	}
	
	function check_mdp(){
	
		if(hash('sha256',$this->input->post('mdp')) !== hash('sha256',$this->input->post('confirm_mdp'))){
	
			$this->form_validation->set_message('check_mdp', 'Les mots de passe ne correspondent pas');
	
			return false;
	
		}else{
	
			return true;
		}
	}
}
