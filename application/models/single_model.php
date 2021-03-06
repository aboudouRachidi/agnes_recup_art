<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Single_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    
    /**
     * Permet de lister la fiche produit avec 'sa catégorie' selon le parametre
     * @param $id le produit à recuperer dans la base de données
     * @return $produit le produit
     */
	public function show_single($id)
	{
		$this->db->where('produit.id_categorie = categorie.id_categorie');
		$this->db->where('id_produit',$id);
		$Query=$this->db->get('produit,categorie');
		if($Query->num_rows() > 0){
			$produit = $Query->row();
			return $produit;
		}
		
	}
	
	/**
	 * Permet de lister la fiche produit avec 'ses couleurs' selon le parametre
	 * @param $id le produit à recuperer dans la base de données
	 * @return $data les couleurs du produit
	 */
	public function getAll_produit_couleurs($id)
	{
		$SELECT ='SELECT couleur,code_couleur FROM `couleur`,`produit_couleur`,`produit`
					WHERE produit_couleur.id_couleur = couleur.id_couleur
					AND produit_couleur.id_produit = produit.id_produit
					AND	produit_couleur.id_produit = '.$id;
		$Query = $this->db->query($SELECT);
	
		foreach ($Query->result() as $produit_couleurs)
		{
			$data[] = $produit_couleurs;
		}
	
		return $data;
	}
	
	/**
	 * Permet de lister la fiche produit avec 'ses materiaux' selon le parametre
	 * @param $id le produit à recuperer dans la base de données
	 * @return $data les materiaux du produit
	 */
	public function getAll_produit_materiaux($id)
	{
		$SELECT ='SELECT nom_materiaux FROM `materiaux`,`produit_materiaux`,`produit`
					WHERE produit_materiaux.id_materiaux = materiaux.id_materiaux
					AND produit_materiaux.id_produit = produit.id_produit
					AND	produit_materiaux.id_produit = '.$id;
		$Query = $this->db->query($SELECT);
	
		foreach ($Query->result() as $produit_materiaux)
		{
			$data[] = $produit_materiaux;
		}
	
		return $data;
	}
	
	/**
	 * Permet de lister la fiche produit avec 'ses photos' selon le parametre
	 * @param $id le produit à recuperer dans la base de données
	 * @return $data les photos du produit
	 */
	public function getAll_photos_produit($id)
	{
		$SELECT ='SELECT * FROM `produit`,`photo_produit`
					WHERE photo_produit.id_produit = produit.id_produit
					AND	photo_produit.id_produit = '.$id;
		$Query = $this->db->query($SELECT);
		if($Query->num_rows() > 0 ){
		foreach ($Query->result() as $photos_produit)
		{
			$data[] = $photos_produit;
		}
			return $data;
		}
	}
}
