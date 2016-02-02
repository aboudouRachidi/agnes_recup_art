<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galerie extends CI_Controller {

    function __construct(){
        parent::__construct();
    }
	public function index()
	{
		$data['title'] = 'Galerie';
		$data['galeries'] = $this->galerie_model->getAll_galeries();
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
		
		$this->load->view('includes/header',$data);
		$this->load->view('includes/menu',$data);
		$this->load->view('includes/slider_galerie',$data);
		$this->load->view('galerie',$data);
		$this->load->view('includes/footer',$data);
	}
}
