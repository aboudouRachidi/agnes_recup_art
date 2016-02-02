<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    function __construct(){
    	
        parent::__construct();
    }

    
	function check_id($email,$mdp)
	{
		$this->db->where('email',$email);
		$this->db->where('mdp',hash('sha256',$mdp));
		
		$query = $this->db->get('client');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $user)
			{
				$this->session->set_userdata(
						'auth',
						array(
								'id'   => $user->id_client,
								'email' => $user->email,
								'logged'=>true
						)
						);
			return true;

			}

		}
	}
	
	function getAll($id){
		
		$this->db->where('id_client = '.$id);
		$Query = $this->db->get('client');
		if($Query->num_rows()>0)
		{
			foreach ($Query->result() as $users)
			{
				$data[] = $users;		
			}
			return $data;
		}		
	}
}
/*	function check_id($email,$mdp)
	{
		$this->db->where('email',$email);
		$this->db->where('mdp',sha1($mdp));
		
		$query = $this->db->get('client');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $user)
			{
				$this->session->set_userdata(
						'auth',
						array(
								'id'   => $user->id_client,
								'nom' => $user->nom,
								'prenom' => $user->prenom,
								'email' => $user->email,
								'telephone' => $user->telephone,
								'mdp' => $user->mdp,
								'adresseD' => $user->adresse_domicile,
								'cpD' => $user->code_postale_domicile,
								'villeD' => $user->ville_domicile,
								'adresseL' => $user->adresse_livraison,
								'cpL' => $user->code_postale_livraison,
								'villeL' => $user->ville_livraison,
								'logged'=>true
						)
						);
			return true;

			}

		}
	}
*/
