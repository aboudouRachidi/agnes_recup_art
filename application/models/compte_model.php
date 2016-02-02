<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compte_model extends CI_Model {

    function __construct(){
    	
        parent::__construct();
        
    }
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
	
	public function getOrder_detail($id)
	{
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
	
	public function DeleteOrder($id){
		$tables = array('detail_commande','commande');
		$this->db->where('id_commande', $id);
		$this->db->delete($tables);

	}
	
}
