<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    
    
	/**
	 * Permet de recuperer le texte du mention legale
	 * @return tableau $data['mentionLegales']
	 */
	public function getMentionLegale()
	{
		$this->db->where('titre = "mention-legale"');
		$Query = $this->db->get("mention");
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $mentionsLegales)
			{
				$data[] = $mentionsLegales;
			}
				
			return $data;
		}
	}
	
	/**
	 * Permet de recuperer le texte de la livraison
	 * @return tableau $data['livraisons']
	 */
	public function getLivraison()
	{
		$this->db->where('titre = "livraison"');
		$Query = $this->db->get("mention");
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $mentionsLivraisons)
			{
				$data[] = $mentionsLivraisons;
			}
	
			return $data;
		}
	}

	/**
	 * Permet de recuperer le texte du CGV
	 * @return tableau $data['CGV']
	 */
	public function getCGV()
	{
		$this->db->where('titre = "condition-generale-vente"');
		$Query = $this->db->get("mention");
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $mentionsCGV)
			{
				$data[] = $mentionsCGV;
			}
	
			return $data;
		}
	}
	
	/**
	 * Permet de recuperer le texte du CGU
	 * @return tableau $data['CGU']
	 */
	public function getCGU()
	{
		$this->db->where('titre = "Terme-condition-utilisation"');
		$Query = $this->db->get("mention");
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $mentionsCGU)
			{
				$data[] = $mentionsCGU;
			}
	
			return $data;
		}
	}
	
	/**
	 * Permet de recuperer les messages défilant
	 * @return tableau $data['message']
	 */
	public function getMessageDefilant()
	{
		$Query = $this->db->get("message_defilant");
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $messagedefilant)
			{
				$data[] = $messagedefilant;
			}
	
			return $data;
		}
	}
	
	/*
	 * Permet d'inserer un abonné à la newsletter
	 */
	public function new_subscriber($data){
		$this->db->insert('abonne',$data);
	}
}
