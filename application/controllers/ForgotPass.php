<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgotPass extends CI_Controller {

    function __construct(){
        parent::__construct();
    }
	public function index()
	{
		$data['title'] = 'Mot de passe oublié';

		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
		$data['mentionsLivraison'] = $this->Accueil_model->getLivraison();
		$data['mentionsCGU'] = $this->Accueil_model->getCGU();
		$data['mentionsCGV'] = $this->Accueil_model->getCGV();
				
		$this->load->view('includes/header');
		$this->load->view('includes/menu',$data);
		$this->load->view('forgotPass',$data);
		$this->load->view('includes/footer');
	}
}
