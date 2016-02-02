<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

    function __construct(){
        parent::__construct();
    }
	public function index()
	{
		$data['title'] = 'Agenda';
		$config['base_url'] = base_url('agenda/index');
		$config['total_rows'] = $this->agenda_model->total_agenda();
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] = 4;
		$config['num_links'] = 4;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link_open'] = 'last';
		$config['last_link_open'] = 'first';
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
		
		$data['agenda'] = $this->agenda_model->getAll_agenda($config['per_page'],$page);
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['DateArchives'] = $this->agenda_model->getAll_DateArchives();
		$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
		$data['mentionsLivraison'] = $this->Accueil_model->getLivraison();
		$data['mentionsCGU'] = $this->Accueil_model->getCGU();
		$data['mentionsCGV'] = $this->Accueil_model->getCGV();
		
		$this->load->view('includes/header',$data);
		$this->load->view('includes/menu',$data);
		$this->load->view('agenda',$data);
		$this->load->view('includes/footer',$data);
	}
	
	public function archive(){
	
		$data['title'] = 'Agenda : Archives - '.$this->uri->segment(3);
		
		$data['agenda'] = $this->agenda_model->getAll_Archives($this->uri->segment(3));

	
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['DateArchives'] = $this->agenda_model->getAll_DateArchives();
		$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
		$data['mentionsLivraison'] = $this->Accueil_model->getLivraison();
		$data['mentionsCGU'] = $this->Accueil_model->getCGU();
		$data['mentionsCGV'] = $this->Accueil_model->getCGV();
	
		$this->load->view('includes/header',$data);
		$this->load->view('includes/menu',$data);
		$this->load->view('agenda',$data);
		$this->load->view('includes/footer',$data);
	}
}
