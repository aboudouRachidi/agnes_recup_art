<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compte extends CI_Controller {

    function __construct(){
    	
        parent::__construct();
        
    }
    
	public function index()
	{
		if($this->session->userdata('auth') || $this->session->userdata('logged')){
			
			$data['title'] = 'Espace client '.$_SESSION['auth']['email'];
			$data['categories'] = $this->products_model->getAll_categories();
			$data['materiaux'] = $this->products_model->getAll_materiau();
			$data['users'] = $this->Login_model->getAll($_SESSION['auth']['id']);
			$data['orders'] = $this->Compte_model->getOrder($_SESSION['auth']['id']);
			$data['ordersWait'] = $this->Compte_model->getOrderWait($_SESSION['auth']['id']);
			$data['ordersFinish'] = $this->Compte_model->getOrderFinish($_SESSION['auth']['id']);
			$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
			
			$this->load->view('includes/header',$data);
			$this->load->view('includes/menu',$data);
			$this->load->view('compte',$data);
			$this->load->view('includes/footer',$data);
		
		
		}else{
		
			redirect(base_url());
		}
	}

	function update(){
		
		$this->form_validation->set_rules('nom','Nom','trim|required|xss_clean');
		$this->form_validation->set_rules('prenom','Prenom','trim|required|xss_clean');
		$this->form_validation->set_rules('telephone','Telephone','trim|xss_clean');
		$this->form_validation->set_rules('adressePostale','Adresse Postale','trim|xss_clean');
		$this->form_validation->set_rules('codePostale','Code Postale','trim|xss_clean');
		$this->form_validation->set_rules('villePostale','Ville','trim|xss_clean');
		$this->form_validation->set_rules('adresseLivraison','Adresse Livraison','trim|xss_clean');
		$this->form_validation->set_rules('codePostaleLivraison','Code Postale Livraison','trim|xss_clean');
		$this->form_validation->set_rules('villeLivraison','Ville Livraison','trim|xss_clean');
		
		if ($this->form_validation->run()){
			$data = array(
					'nom' =>$this->input->post('nom'),
					'prenom' =>$this->input->post('prenom'),
					'telephone' =>$this->input->post('telephone'),
					'adresse_domicile' =>$this->input->post('adresseDomicile'),
					'code_postale_domicile' =>$this->input->post('codePostaleDomicile'),
					'ville_domicile' =>$this->input->post('villeDomicile'),
					'adresse_livraison' =>$this->input->post('adresseLivraison'),
					'code_postale_livraison' =>$this->input->post('codePostaleLivraison'),
					'ville_livraison' =>$this->input->post('villeLivraison'),

			);
			
			$this->Compte_model->update_client($_SESSION['auth']['id'],$data);
			
			$data = $this->session->set_flashdata('info', 'Modification(s) effectuée(s)');
			redirect('compte',$data);
		}else{
			
			$data['title'] = 'Espace client '.$_SESSION['auth']['email'];
			$data['categories'] = $this->products_model->getAll_categories();
			$data['materiaux'] = $this->products_model->getAll_materiau();
			$data['users'] = $this->Login_model->getAll($_SESSION['auth']['id']);
			$data['collapseGC'] = $this->session->set_flashdata('collapseGC', 'in');
			$data['orders'] = $this->Compte_model->getOrder($_SESSION['auth']['id']);
			$data['ordersWait'] = $this->Compte_model->getOrderWait($_SESSION['auth']['id']);
			$data['ordersFinish'] = $this->Compte_model->getOrderFinish($_SESSION['auth']['id']);
			$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
			$ordersDetails = $this->Compte_model->getOrder_detail($this->uri->segment(3));
			
			$this->load->view('includes/header',$data);
			$this->load->view('includes/menu',$data);
			$this->load->view('compte',$data);
			$this->load->view('includes/footer',$data);
		}
	}
	
	function updatePassword(){
	
		$this->form_validation->set_rules('mdpActuel','Mot de passe','trim|required|xss_clean|callback_check_mdpActuel');
		$this->form_validation->set_rules('nouveauMdp','Mot de passe','trim|required|xss_clean|min_length[6]|callback_check_mdpActuel_Nouveau');
		$this->form_validation->set_rules('confirmMdp','Comfirmer mot de passe','trim|required|xss_clean|callback_check_mdp');
	
		if ($this->form_validation->run()){
			$nouveauMdp = array(
					'mdp' =>hash('sha256',$this->input->post('nouveauMdp')),
			);
				
			$this->Compte_model->update_mdp($_SESSION['auth']['id'],$nouveauMdp);
			$data = $this->session->set_flashdata('info', 'Modification effectuée');
			redirect('compte',$data);
		}else{
			
			$data['categories'] = $this->products_model->getAll_categories();
			$data['materiaux'] = $this->products_model->getAll_materiau();
			$data['users'] = $this->Login_model->getAll($_SESSION['auth']['id']);
			$data['collapseMP'] = $this->session->set_flashdata('collapseMP', 'in');
			$data['orders'] = $this->Compte_model->getOrder($_SESSION['auth']['id']);
			$data['ordersWait'] = $this->Compte_model->getOrderWait($_SESSION['auth']['id']);
			$data['ordersFinish'] = $this->Compte_model->getOrderFinish($_SESSION['auth']['id']);
			$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
			$ordersDetails = $this->Compte_model->getOrder_detail($this->uri->segment(3));
			
			$data['title'] = 'Espace client '.$_SESSION['auth']['email'];
			$this->load->view('includes/header',$data);
			$this->load->view('includes/menu',$data);
			$this->load->view('compte',$data);
			$this->load->view('includes/footer',$data);
		}
	}
	
	function orderDetail(){
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['users'] = $this->Login_model->getAll($_SESSION['auth']['id']);
		$data['ordersDetails'] = $this->Compte_model->getOrder_detail($this->uri->segment(3));
		$data['title'] = 'Details de la commande';
		
		$this->load->view('includes/header',$data);
		$this->load->view('includes/menu',$data);
		$this->load->view('detailsCommande',$data);
		$this->load->view('includes/footer');
	}
	
	function cancelOrder(){
		/*$data = array(
				'id_commande' => $this->uri->segment(3),
				
		);
		*/
		
		$this->Compte_model->DeleteOrder($this->uri->segment(3));
		$data = $this->session->set_flashdata('info', 'Commande annulé');
		redirect($_SERVER['HTTP_REFERER'],$data);		

	}
	
	function logout(){
		$this->session->unset_userdata('auth');
		$this->session->unset_userdata('logged');
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
	//fonction de call back
	function check_mdpActuel(){
	
		if($this->input->post('mdpActuel')){
				
			$this->db->select('mdp');
			$this->db->where('id_client',$_SESSION['auth']['id']);
			$Query = $this->db->get('client');
			$row = $Query->row_array();
			
			if($row['mdp'] !== hash('sha256',$this->input->post('mdpActuel'))){
	
				$this->form_validation->set_message('check_mdpActuel', 'Le mot de passe actuel ne correspond pas !');
	
				return false;
	
			}else{
	
				return true;
			}
		}
	}
	
	function check_mdpActuel_Nouveau(){
	
	if ($this->input->post('nouveauMdp')){
			$this->db->select('mdp');
			$this->db->where('id_client',$_SESSION['auth']['id']);
			$Query = $this->db->get('client');
			$row = $Query->row_array();
				
			if($row['mdp'] == hash('sha256',$this->input->post('nouveauMdp'))){
			
				$this->form_validation->set_message('check_mdpActuel_Nouveau', 'Le nouveau mot de passe doit être différent du mot de passe actuel !');
			
				return false;
				
			}else{
				
				return true;
			}
		}
	}
	
	function check_mdp(){
	
		if(hash('sha256',$this->input->post('nouveauMdp')) !== hash('sha256',$this->input->post('confirmMdp'))){
	
			$this->form_validation->set_message('check_mdp', 'Les mots de passe ne correspondent pas !');
	
			return false;
		
		}else{
	
			return true;
		}
	}		
}
