<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->clear_cache();
       
    }
    

	public function index()
	{
		$data['title'] = 'Accueil';
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['messageDefilant'] = $this->Accueil_model->getMessageDefilant();
		$data['lastProducts'] = $this->products_model->getAll_lastProducts();
		$data['sliderProducts'] = $this->products_model->getAll_sliderProducts();
		$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
		$data['mentionsLivraison'] = $this->Accueil_model->getLivraison();
		$data['mentionsCGU'] = $this->Accueil_model->getCGU();
		$data['mentionsCGV'] = $this->Accueil_model->getCGV();
		
		$this->load->view('includes/header',$data);
		$this->load->view('includes/menu',$data);
		$this->load->view('accueil',$data);
		$this->load->view('includes/slider',$data);
		$this->load->view('includes/footer',$data);
	}
	
	public function newsubscribe()
	{
		$this->form_validation->set_rules('email','Email','trim|required|xss_clean|valid_email|callback_check_email');
	
		if($this->form_validation->run()){
				$data = array(
						'email' =>$this->input->post('email')
	
				);
					
				$this->Accueil_model->new_subscriber($data);
	
				$data = $this->session->set_flashdata('info','L\'inscription a été prise en compte');
				
				redirect($_SERVER['HTTP_REFERER'],$data);
			}else{
			$data = $this->session->set_flashdata('erreur','Cet email <b class="btn btn-danger btn-md">'.$this->input->post('email').'</b> est déjà utilisé');
				
			redirect($_SERVER['HTTP_REFERER'],$data);
		}
	}

	//fonction de call back
	/**
	 * Permet de verifier si l'adresse email saisi pour abonnement newsletter existe déjà
	 * @return true ou false
	 */
	function check_email(){
	
		if($this->input->post('email')){
				
			$this->db->select('id_abonne');
			$this->db->from('abonne');
			$this->db->where('email',$this->input->post('email'));
			if($this->db->count_all_results()>0){
	
				$this->form_validation->set_message('check_email', 'Cet email est déjà utilisé');
	
				return false;
	
			}else{
	
				return true;
			}
		}
	}
	
	function clear_cache()
	{
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
	}
}
