<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

    function __construct(){
        parent::__construct();
    }
	public function index()
	{
		$data['title'] = 'Panier';
		$data['categories'] = $this->products_model->getAll_categories();
		$data['materiaux'] = $this->products_model->getAll_materiau();
		$data['mentionsLegales'] = $this->Accueil_model->getMentionLegale();
		
		$this->load->view('includes/header',$data);
		$this->load->view('includes/menu',$data);
		$this->load->view('checkout');
		$this->load->view('includes/footer',$data);
	}
	
	 function add()
	{
		$data = array(
		        'id'      => $this->input->post('id_produit'),
		        'qty'     => 1,
		        'price'   => $this->input->post('prix'),
		        'name'    => $this->input->post('nom_produit'),
				'picture' => $this->input->post('photo_principale'),
				'fraisLivraison' => $this->input->post('frais_livraison'),
				'typeLivraison' => $this->input->post('type_livraison')
				
		);

			$this->cart->insert($data);
			redirect('checkout');
		
	}
	
	function update(){
		$data = array(
			'rowid' => $this->input->post('rowid'),
			'qty' => $this->input->post('qty')
		);
		
		$this->cart->update($data);
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function delete(){
		$data = array(
				'rowid' => $this->uri->segment(3),
				'qty' =>0
		);
	
		$this->cart->update($data);
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function emptyCart(){

		$this->cart->destroy();
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	
	function connect(){
		$this->form_validation->set_rules('email','Email','trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('mdp','Mot de passe','trim|required|xss_clean');
		
		if($this->form_validation->run())
		{
			//$this->load->model('Login_model');
				
			if($this->Login_model->check_id($this->input->post('email'),$this->input->post('mdp')))
			{
				$data['users'] = $this->Login_model->getAll($_SESSION['auth']['id']);
				$data = $this->session->set_flashdata('info','Vous pouvez conntinuer votre commande');
				redirect('checkout',$data);
		
			}else{
				$data = $this->session->set_flashdata('info','Mauvais identifiants'.'
						<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Reessayer ?</button>');
				redirect('checkout',$data);
			}
		}
	}
	
	function orderDelivry(){
		if($this->session->userdata('auth') || $this->session->userdata('logged')){
		
			$this->form_validation->set_rules('adresseLivraison','Adresse Livraison','trim|required|xss_clean');
			$this->form_validation->set_rules('codePostaleLivraison','Code Postale Livraison','trim|required|xss_clean');
			$this->form_validation->set_rules('villeLivraison','Ville Livraison','trim|required|xss_clean');
			
			if ($this->form_validation->run()){
				/*if($this->input->post('adresseLivraison') == "" && $this->input->post('codePostaleLivraison') == "" && $this->input->post('villeLivraison') == "")
				 {
			
				 }*/
				$data = array(
						'adresse_livraison' =>$this->input->post('adresseLivraison'),
						'code_postale_livraison' =>$this->input->post('codePostaleLivraison'),
						'ville_livraison' =>$this->input->post('villeLivraison'),
				);
			
				$this->Compte_model->update_client($_SESSION['auth']['id'],$data);
				$data = $this->session->set_flashdata('info', 'Modification(s) effectuée(s)');
				redirect(base_url('checkout/orderRecap'),$data);
				
			}else{
				
				$data['title'] = 'Adresse de livraison';
				$data['users'] = $this->Login_model->getAll($_SESSION['auth']['id']);
				
				$this->load->view('includes/header',$data);
				$this->load->view('commande/adresse',$data);
				$this->load->view('commande/footer');
			}
		
		
		}else{
			
			$data = $this->session->set_flashdata('info','Veuillez vous connecté pour enregistrer votre commande '.'
					<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">Se connecter</button>');
			redirect(base_url('checkout',$data));
			
		}
		
		//si le panier est vide on redirige au panier
		if(!$this->cart->contents()){
			redirect(base_url('checkout'));
		}
		
	}
	
	function orderRecap(){
		
		if($this->session->userdata('auth') || $this->session->userdata('logged')){
		$data['title'] = 'Recapitulatif';
		$data['users'] = $this->Login_model->getAll($_SESSION['auth']['id']);
		$this->load->view('includes/header',$data);
		$this->load->view('commande/recapitulatif',$data);
		$this->load->view('commande/footer');
		
		
		
		}else{
			
			$data = $this->session->set_flashdata('info','Veuillez vous connecté pour enregistrer votre commande'.'
					<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">Se connecter</button>');
			redirect(base_url('checkout',$data));
			
		}
		
		//si le panier est vide on redirige au panier
		if(!$this->cart->contents()){
			redirect(base_url('checkout'));
		}
	
	}
	
	function saveOrder(){
		
		$this->load->model('checkout_model');
		
		
		$order = array(
				'date_commande' => date('Y-m-d'),
				'total' => $this->cart->total(),
				'id_client' => $_SESSION['auth']['id']
		);
		
		$ord_id = $this->checkout_model->insert_order($order);
		
		if ($cart = $this->cart->contents()):
		foreach ($cart as $item):
		$order_detail = array(
				'id_commande' => $ord_id,
				'id_produit' => $item['id'],
				'quantite' => $item['qty'],
				'prix' => $item['price']
		);
		
		// Insert product imformation with order detail, store in cart also store in database.
		
		$cust_id = $this->checkout_model->insert_order_detail($order_detail);
		endforeach;
		endif;
		$data = $this->session->set_flashdata('info','Votre commande a été enregistrer');
		redirect(base_url('checkout/orderValidation'));
	}
	
	function orderValidation(){
		
		if($this->session->userdata('auth') || $this->session->userdata('logged')){
			
			$data['users'] = $this->Login_model->getAll($_SESSION['auth']['id']);
			$data['title'] = 'Envoi de commande';
			$this->load->view('includes/header',$data);
			$this->load->view('commande/validation',$data);
			$this->load->view('commande/footer');
			

		}else{
			
			$data = $this->session->set_flashdata('info','Veuillez vous connecté pour enregistrer votre commande'.'
					<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">Se connecter</button>');
			redirect(base_url('checkout',$data));
		}
		
		//si le panier est vide on redirige au panier
		if(!$this->cart->contents()){
			redirect(base_url('checkout'));
		}
	}
	
	function sendOrder(){
		
		if($this->session->userdata('auth') || $this->session->userdata('logged')){	
			$data = array(
					'email' =>$this->input->post('email'),
			);
					
	
				$mesg = $this->load->view('EmailCommande',$data,true);
				$this->email->from('aboud976@live.fr','RecupArt');
				$this->email->to($_SESSION['auth']['email'],'Commande');
				$this->email->subject('Commande RecupArt');
				$this->email->message($mesg);
					
				if($this->email->send()){
	
				
				$data = $this->session->set_flashdata('info','La commande a été envoyer à l\'adresse '.'<b> '.$_SESSION['auth']['email'].'</b>');
				//$info['success'] = 'Inscription réussie';
				$data['title'] = 'Envoi de commande';
				$this->load->view('includes/header',$data);
				$this->load->view('commande/validation',$data);
				$this->load->view('commande/footer');
				
				}else{
					
				$data = $this->session->set_flashdata('info','La commande n\'a pas été envoyer à l\'adresse '.'<b> '.$_SESSION['auth']['email'].'</b> réessayer ?');
				$data['title'] = 'Envoi de commande';
				
				$this->load->view('includes/header',$data);
				$this->load->view('commande/validation',$data);
				$this->load->view('commande/footer');
				}
			}else{
					
				$data = $this->session->set_flashdata('info','Veuillez vous connecté pour enregistrer votre commande'.'
					<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">Se connecter</button>');
				redirect(base_url('checkout',$data));
			}
	}
}
