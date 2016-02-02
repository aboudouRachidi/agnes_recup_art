<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    function __construct(){
        parent::__construct();
    }
	public function index()
	{
		$data['title'] = 'Produits';
		$data['produits'] = $this->products_model->getAll_products();
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['tagsCouleurs'] = $this->products_model->getTags_Couleurs();
		$data['tagsMateriaux'] = $this->products_model->getTags_materiaux();
		$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
		$data['mentionsLivraison'] = $this->Accueil_model->getLivraison();
		$data['mentionsCGU'] = $this->Accueil_model->getCGU();
		$data['mentionsCGV'] = $this->Accueil_model->getCGV();
		$data['sliderProducts'] = $this->products_model->getAll_sliderProducts();
		
		$this->load->view('includes/header',$data);
		$this->load->view('includes/menu',$data);
		$this->load->view('products',$data);
		$this->load->view('includes/slider',$data);
		$this->load->view('includes/footer',$data);
	}
	
	public function materialProducts()
	{
		$data['title'] = 'Produits par materiaux';
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['produits'] = $this->products_model->materialProducts($this->uri->segment(4));
		$data['tagsCouleurs'] = $this->products_model->getTags_Couleurs();
		$data['tagsMateriaux'] = $this->products_model->getTags_materiaux();
		$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
		$data['mentionsLivraison'] = $this->Accueil_model->getLivraison();
		$data['mentionsCGU'] = $this->Accueil_model->getCGU();
		$data['mentionsCGV'] = $this->Accueil_model->getCGV();
		$data['sliderProducts'] = $this->products_model->getAll_sliderProducts();

		$this->load->view('includes/header',$data);
		$this->load->view('includes/menu',$data);
		$this->load->view('products',$data);
		$this->load->view('includes/slider',$data);
		$this->load->view('includes/footer',$data);
	}
	
	public function categoryProducts()
	{
		$data['title'] = 'Produits par catégorie';
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['produits'] = $this->products_model->categoryProducts($this->uri->segment(4));
		$data['tagsCouleurs'] = $this->products_model->getTags_Couleurs();
		$data['tagsMateriaux'] = $this->products_model->getTags_materiaux();
		$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
		$data['mentionsLivraison'] = $this->Accueil_model->getLivraison();
		$data['mentionsCGU'] = $this->Accueil_model->getCGU();
		$data['mentionsCGV'] = $this->Accueil_model->getCGV();
		$data['sliderProducts'] = $this->products_model->getAll_sliderProducts();
		
		$this->load->view('includes/header',$data);
		$this->load->view('includes/menu',$data);
		$this->load->view('products',$data);
		$this->load->view('includes/slider',$data);
		$this->load->view('includes/footer',$data);
	}
	
	public function TagsCouleursProducts()
	{
		$data['title'] = 'Produits par tags';
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['produits'] = $this->products_model->tagsCouleurProducts($this->uri->segment(3));
		$data['tagsCouleurs'] = $this->products_model->getTags_Couleurs();
		$data['tagsMateriaux'] = $this->products_model->getTags_materiaux();
		$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
		$data['mentionsLivraison'] = $this->Accueil_model->getLivraison();
		$data['mentionsCGU'] = $this->Accueil_model->getCGU();
		$data['mentionsCGV'] = $this->Accueil_model->getCGV();
		$data['sliderProducts'] = $this->products_model->getAll_sliderProducts();
	
		$this->load->view('includes/header',$data);
		$this->load->view('includes/menu',$data);
		$this->load->view('products',$data);
		$this->load->view('includes/slider',$data);
		$this->load->view('includes/footer',$data);
	}
	
	public function TagsMateriauxProducts()
	{
		$data['title'] = 'Produits par catégorie';
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['produits'] = $this->products_model->tagsMateriauxProducts($this->uri->segment(3));
		$data['tagsCouleurs'] = $this->products_model->getTags_Couleurs();
		$data['tagsMateriaux'] = $this->products_model->getTags_materiaux();
		$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
		$data['mentionsLivraison'] = $this->Accueil_model->getLivraison();
		$data['mentionsCGU'] = $this->Accueil_model->getCGU();
		$data['mentionsCGV'] = $this->Accueil_model->getCGV();
		$data['sliderProducts'] = $this->products_model->getAll_sliderProducts();
	
		$this->load->view('includes/header',$data);
		$this->load->view('includes/menu',$data);
		$this->load->view('products',$data);
		$this->load->view('includes/slider',$data);
		$this->load->view('includes/footer',$data);
	}
	
	public function orderByName()
	{
		$data['title'] = 'Produits';
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['produits'] = $this->products_model->orderByName();
		$data['tagsCouleurs'] = $this->products_model->getTags_Couleurs();
		$data['tagsMateriaux'] = $this->products_model->getTags_materiaux();
		$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
		$data['mentionsLivraison'] = $this->Accueil_model->getLivraison();
		$data['mentionsCGU'] = $this->Accueil_model->getCGU();
		$data['mentionsCGV'] = $this->Accueil_model->getCGV();
		$data['sliderProducts'] = $this->products_model->getAll_sliderProducts();
	
		$this->load->view('includes/header',$data);
		$this->load->view('includes/menu',$data);
		$this->load->view('products',$data);
		$this->load->view('includes/slider',$data);
		$this->load->view('includes/footer',$data);
	}
	
	public function orderByPrice()
	{
		$data['title'] = 'Produits';
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['produits'] = $this->products_model->orderByPrice();
		$data['tagsCouleurs'] = $this->products_model->getTags_Couleurs();
		$data['tagsMateriaux'] = $this->products_model->getTags_materiaux();
		$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
		$data['mentionsLivraison'] = $this->Accueil_model->getLivraison();
		$data['mentionsCGU'] = $this->Accueil_model->getCGU();
		$data['mentionsCGV'] = $this->Accueil_model->getCGV();
		$data['sliderProducts'] = $this->products_model->getAll_sliderProducts();
	
		$this->load->view('includes/header',$data);
		$this->load->view('includes/menu',$data);
		$this->load->view('products',$data);
		$this->load->view('includes/slider',$data);
		$this->load->view('includes/footer',$data);
	}
}
