<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    function __construct(){
        parent::__construct();
    }
	public function index()
	{
		$data['title'] = 'Blog';
		$config['base_url'] = base_url('blog/index');
		$config['total_rows'] = $this->blog_model->total_blog();
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] = 4;
		$config['num_links'] = 4;
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

		
		$data['blogs'] = $this->blog_model->getAll_blogs($config['per_page'],$page);
		
		
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['DateArchives'] = $this->blog_model->getAll_DateArchives();
		$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
		$data['mentionsLivraison'] = $this->Accueil_model->getLivraison();
		$data['mentionsCGU'] = $this->Accueil_model->getCGU();
		$data['mentionsCGV'] = $this->Accueil_model->getCGV();

		$this->load->view('includes/header',$data);
		$this->load->view('includes/menu',$data);
		$this->load->view('blog',$data);
		$this->load->view('includes/footer',$data);
	}
	
	public function archive(){
		
		$data['title'] = 'Blog : Archives - '.$this->uri->segment(3);
		/*$config['base_url'] = base_url('blog/archive/'.$this->uri->segment(3));
		$config['total_rows'] = $this->blog_model->total_blogArchives($this->uri->segment(3));
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] = 4;
		$config['num_links'] = 4;
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
		*/
		$data['blogs'] = $this->blog_model->getAll_Archives($this->uri->segment(3)/*,$config['per_page'],$page*/);
		//$data['pagination'] = $this->pagination->create_links();
		
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['DateArchives'] = $this->blog_model->getAll_DateArchives();
		$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
		$data['mentionsLivraison'] = $this->Accueil_model->getLivraison();
		$data['mentionsCGU'] = $this->Accueil_model->getCGU();
		$data['mentionsCGV'] = $this->Accueil_model->getCGV();
		
		$this->load->view('includes/header',$data);
		$this->load->view('includes/menu',$data);
		$this->load->view('blog',$data);
		$this->load->view('includes/footer',$data);
	}
}
