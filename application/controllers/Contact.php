<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    function __construct(){
        parent::__construct();
    }
	public function index()
	{
		$data['title'] = 'Contact';
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
		$data['mentionsLivraison'] = $this->Accueil_model->getLivraison();
		$data['mentionsCGU'] = $this->Accueil_model->getCGU();
		$data['mentionsCGV'] = $this->Accueil_model->getCGV();
		
		$this->load->view('includes/header',$data);
		$this->load->view('includes/menu',$data);
		$this->load->view('contact');
		$this->load->view('includes/footer',$data);
	
	}

	/**
	 * Permet d'envoyer le message 
	 */
	public function sendMessage(){
		
		$data = array(
				'email' =>$this->input->post('email'),
		);
			
		
		$mesg = $this->load->view('EmailContact',$data,true);
		$this->email->from($this->input->post('email'));
		$this->email->to('ofcl-aboud976@live.fr','Contact');
		$this->email->subject($this->input->post('objet'));
		$this->email->message($mesg);
		
		if($this->email->send()){
			$data = $this->session->set_flashdata('info','Votre message a bien été envoyé');
			redirect(base_url('contact',$data));
		}else{
		$data = $this->session->set_flashdata('info','Echec de l\'envoi du message');
		redirect(base_url('contact',$data));
		}
	}
}
