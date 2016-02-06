<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    function __construct(){
        parent::__construct();
    }
    
    /**
     * Permet tous les produits
     */
	public function index()
	{
		$data['title'] = 'Produits';
		
		$config['base_url'] = base_url('products/index');
		$config['total_rows'] = $this->products_model->total_products();
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] = 5;
		$config['num_links'] = 2;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link_open'] = 'first';
		$config['last_link_open'] = 'last';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['next_link'] = '>>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<<';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#top">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		if($this->uri->segment(3) == ""){
				
			$page = 0;
				
		}elseif ($this->uri->segment(3)==2){
		
			$page = 1 * $config['per_page'];
				
		}else{
				
			$page = ($this->uri->segment(3)*$config['per_page']-$config['per_page']) ;
		}
		
		$data['produits'] = $this->products_model->getAll_products($config['per_page'],$page);
		
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
	
	/**
	 * Permet de lister les produits par materiau
	 */
	public function materialProducts()
	{
		$data['title'] = 'Produits par materiaux : '.$this->uri->segment(3);
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
	
	/**
	 * Permet de lister les produits par catégorie
	 */
	public function categoryProducts()
	{
		$data['title'] = 'Produits par catégorie : '.$this->uri->segment(3);
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
	
	/**
	 * Permet de lister les produits par tag couleur
	 */
	public function TagsCouleursProducts()
	{
		$data['title'] = 'Produits par tags : '.$this->uri->segment(3);
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
	
	/**
	 * Permet de lister les produits par tag materiau
	 */
	public function TagsMateriauxProducts()
	{
		$data['title'] = 'Produits par tags : '.$this->uri->segment(3);
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
	
	/**
	 * Permet de lister les produits par ordre alphabétique
	 */
	public function orderByName()
	{
		$config['base_url'] = base_url('products/orderByName/index');
		$config['total_rows'] = $this->products_model->total_products();
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] = 5;
		$config['num_links'] = 2;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link_open'] = 'first';
		$config['last_link_open'] = 'last';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['next_link'] = '>>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<<';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#top">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		if($this->uri->segment(4) == ""){
		
			$page = 0;
		
		}elseif ($this->uri->segment(4)==2){
		
			$page = 1 * $config['per_page'];
		
		}else{
		
			$page = ($this->uri->segment(4)*$config['per_page']-$config['per_page']) ;
		}
		
		$data['title'] = 'Produits';
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['produits'] = $this->products_model->orderByName($config['per_page'],$page);
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
	
	/**
	 * Permet de lister les produits par prix - au + 
	 */
	public function orderByPrice()
	{
		$config['base_url'] = base_url('products/orderByPrice/index');
		$config['total_rows'] = $this->products_model->total_products();
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] = 5;
		$config['num_links'] = 2;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link_open'] = 'first';
		$config['last_link_open'] = 'last';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['next_link'] = '>>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<<';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#top">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		if($this->uri->segment(4) == ""){
		
			$page = 0;
		
		}elseif ($this->uri->segment(4)==2){
		
			$page = 1 * $config['per_page'];
		
		}else{
		
			$page = ($this->uri->segment(4)*$config['per_page']-$config['per_page']) ;
		}
		
		$data['title'] = 'Produits';
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['produits'] = $this->products_model->orderByPrice($config['per_page'],$page);
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
