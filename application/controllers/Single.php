<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Single extends CI_Controller {

    function __construct(){
        parent::__construct();
    }
	public function index()
	{
		$data['title'] = 'Produit : '.$this->uri->segment(3);
		$data['produit'] = $this->single_model->show_single($this->uri->segment(4));
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['produits'] = $this->products_model->tagsCouleurProducts($this->uri->segment(3));
		$data['tagsCouleurs'] = $this->products_model->getTags_Couleurs();
		$data['tagsMateriaux'] = $this->products_model->getTags_materiaux();
		$data['produit_couleurs'] = $this->single_model->getAll_produit_couleurs($this->uri->segment(4));
		$data['produit_materiaux'] = $this->single_model->getAll_produit_materiaux($this->uri->segment(4));
		$data['photos_produit'] = $this->single_model->getAll_photos_produit($this->uri->segment(4));
		$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
		$data['mentionsLivraison'] = $this->Accueil_model->getLivraison();
		$data['mentionsCGU'] = $this->Accueil_model->getCGU();
		$data['mentionsCGV'] = $this->Accueil_model->getCGV();
		$data['sliderProducts'] = $this->products_model->getAll_sliderProducts();
		
		$this->load->view('includes/header',$data);
		$this->load->view('includes/menu',$data);
		$this->load->view('single',$data);
		$this->load->view('includes/slider',$data);
		$this->load->view('includes/footer',$data);
	}
}
