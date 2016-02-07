<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compte_model extends CI_Model {

    function __construct(){
    	
        parent::__construct();
        
    }
    
    /**
     * Permet de mettre à jour les données de la table client selon les parametres
     * @param $id client à trouver dans la base de données, $data données à modifier
     */
	public function update_client($id,$data)
	{
		$this->db->where('id_client', $id);
		$this->db->update('client', $data);
		// Produces:
		//
		//      UPDATE mytable
		//      SET title = '{$title}', name = '{$name}', date = '{$date}'
		//  
	}
	
	/**
	 * Permet de mettre à jour le champ mot de passe de la table client selon les parametres
	 * @param $id client à trouver dans la base de données, $mdp le mot de passe à modifier 
	 */	
	public function update_mdp($id,$mdp)
	{
		
		$this->db->where('id_client', $id);
		$this->db->update('client', $mdp);
		// Produces:
		//
		//      UPDATE mytable
		//      SET title = '{$title}', name = '{$name}', date = '{$date}'
		//      WHERE id = $id
	}
	
	/**
	 * Permet de recuperer les commandes en cours d'un client
	 * @param $id client à trouver dans la base de données
	 * @return tableau $data['commande'] contenant les données
	 */
	public function getOrder($id)
	{
		$this->db->where('commande.id_client = client.id_client AND client.id_client = '.$id);
		$this->db->where('etat = 1');
		$Query = $this->db->get('commande,client');
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $orders)
			{
				$data[] = $orders;
			}
			
			return $data;
		}
	}
	
	/**
	 * Permet de recuperer les commandes en attente d'un client
	 * @param $id client à trouver dans la base de données
	 * @return tableau $data['commandeW'] contenant les données
	 */
	public function getOrderWait($id)
	{
		$this->db->where('commande.id_client = client.id_client AND client.id_client = '.$id);
		$this->db->where('etat = 0');
		$Query = $this->db->get('commande,client');
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $ordersWait)
			{
				$data[] = $ordersWait;
			}
				
			return $data;
		}
	}
	
	/**
	 * Permet de recuperer les commandes terminées d'un client
	 * @param $id client à trouver dans la base de données
	 * @return tableau $data['commandeF'] contenant les données
	 */
	public function getOrderFinish($id)
	{
		$this->db->where('commande.id_client = client.id_client AND client.id_client = '.$id);
		$this->db->where('etat > 1');
		$Query = $this->db->get('commande,client');
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $ordersFinish)
			{
				$data[] = $ordersFinish;
			}
				
			return $data;
		}
	}
	
	/**
	 * Permet de recuperer les détails d'une commande
	 * @param $id commande à trouver dans la base de données
	 * @return tableau $data['commande'] contenant les données
	 */
	public function getOrder_detail($id,$id_client)
	{
		$this->db->where('commande.id_client = '.$id_client);
		$this->db->where('commande.id_client = client.id_client AND detail_commande.id_commande = commande.id_commande
				AND produit.id_produit = detail_commande.id_produit AND commande.id_commande = '.$id);
		$Query = $this->db->get('commande,client,detail_commande,produit');
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $ordersDetails)
			{
				$data[] = $ordersDetails;
			}
	
			return $data;
		}
	}
	
	/**
	 * Permet de supprimer une commande en attente d'un client
	 * @param $id commande à trouver dans la base de données
	 */
	public function DeleteOrder($id,$id_client){
		//on verifie si la commande appartient à l'utilisateur on return true sinon false 
		$Query =  $this->db->query('SELECT id_client FROM `commande`
				WHERE commande.id_commande = '.$id. ' AND id_client = '.$id_client);
		
		if($Query->num_rows() > 0 ){
			
			$tables = array('detail_commande','commande');
			$this->db->where('id_commande', $id);
			$this->db->delete($tables);
			
			return true;//true
			
		}else{
			
			return false;//false
		}

	}
	
}
