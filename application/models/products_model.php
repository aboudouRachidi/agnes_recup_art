<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
 
    /**
     * Permet de compter le nombre de données dans la table produit pour la pagination
     * @return nombre
     */
    public function total_products() {
    	return $this->db->count_all("produit");
    }
    
    /**
     * Permet de recuperer les produits 
     * @return tableau $data['produits'] contenant les données
     */
	public function getAll_products($limit,$start)
	{		
		$this->db->limit($limit,$start);
		$Query = $this->db->get("produit");
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $produits)
			{
				$data[] = $produits;
			}
			
			return $data;
		}
	}
	
	/**
	 * Permet de recuperer les derniers produits
	 * @return tableau $data['produits'] contenant les données
	 */
	public function getAll_lastProducts()
	{
		$this->db->from("produit");
		$this->db->order_by('id_produit','DESC');
		$this->db->limit(9);
		$Query = $this->db->get();
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $lastProducts)
			{
				$data[] = $lastProducts;
			}
				
			return $data;
		}
	}
	
	/**
	 * Permet de recuperer les produits pour le slider
	 * @return tableau $data['sliderProduits'] contenant les données
	 */
	public function getAll_sliderProducts()
	{
		$this->db->from("produit,slider");
		$this->db->where('slider.id_produit = produit.id_produit');

		$Query = $this->db->get();
		if($Query->num_rows() >= 3 ){
			foreach ($Query->result() as $sliderProduits)
			{
				$data[] = $sliderProduits;
			}
			return $data;
		}
	}
	
	/**
	 * Permet de recuperer les categories
	 * @return tableau $data['categories'] contenant les données
	 */
	public function getAll_categories()
	{
		$Query = $this->db->get("categorie");
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $categories)
			{
				$data[] = $categories;
			}
				
			return $data;
		}
	}
	
	/**
	 * Permet de recuperer les materiaux
	 * @return tableau $data['materiaux'] contenant les données
	 */
	public function getAll_materiau()
	{
		$Query = $this->db->get("materiaux");
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $materiaux)
			{
				$data[] = $materiaux;
			}
	
			return $data;
		}
	}
	
	/**
	 * Permet de recuperer les produits par materiau
	 * @param $id materiau associer au produit à trouver dans la base de données 
	 * @return tableau $data['produits'] contenant les données
	 */
	public function materialProducts($id)
	{
		$this->db->where('produit_materiaux.id_materiaux = materiaux.id_materiaux
						AND produit.id_produit = produit_materiaux.id_produit
						AND produit_materiaux.id_materiaux = '.$id);
		$Query = $this->db->get('produit,produit_materiaux,materiaux');
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $produits)
			{
				$data[] = $produits;
			}
			
			return $data;
		}
	}
	
	/**
	 * Permet de recuperer les produits par categorie
	 * @param $id categorie associer à un produit à trouver dans la base de données
	 * @return tableau $data['produits'] contenant les données
	 */
	public function categoryProducts($id)
	{
		$this->db->where('produit.id_categorie = categorie.id_categorie 
						AND categorie.id_categorie = '.$id);
		$Query = $this->db->get('produit,categorie');
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $produits)
			{
				$data[] = $produits;
			}
				
			return $data;
		}
	}
	
	/**
	 * Permet de recuperer les produits par tagsCouleurs
	 * @param $tags couleur associer à un produit à trouver dans la base de données
	 * @return tableau $data['produits'] contenant les données
	 */
	public function tagsCouleurProducts($tags)
	{
		$this->db->where('produit_couleur.id_couleur = couleur.id_couleur
						AND produit_couleur.id_produit = produit.id_produit AND couleur.couleur = "'.$tags.'"');
		$Query = $this->db->get('produit,couleur,produit_couleur');
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $produits)
			{
				$data[] = $produits;
			}
	
			return $data;
		}
	}
	
	/**
	 * Permet de recuperer les produits par tagsMateriau
	 * @param $tags materiau associer à un produit à trouver dans la base de données
	 * @return tableau $data['produits'] contenant les données
	 */
	public function tagsMateriauxProducts($tags)
	{
		$this->db->where('produit_materiaux.id_materiaux = materiaux.id_materiaux
						AND produit.id_produit = produit_materiaux.id_produit AND materiaux.nom_materiaux= "'.$tags.'"');
		$Query = $this->db->get('produit,produit_materiaux,materiaux');
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $produits)
			{
				$data[] = $produits;
			}
	
			return $data;
		}
	}
	
	/**
	 * Permet de trier les produits par nom
	 * @return tableau $data['produits'] contenant les données
	 */
	public function orderByName($limit,$start)
	{
		$this->db->limit($limit,$start);
		$this->db->from("produit");
		$this->db->order_by("nom_produit");
		$Query = $this->db->get();
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $produits)
			{
				$data[] = $produits;
			}
			
			return $data;
		}
	}
	
	/**
	 * Permet de trier les produits par prix - au +
	 * @return tableau $data['produits'] contenant les données
	 */
	public function orderByPrice($limit,$start)
	{
		$this->db->limit($limit,$start);
		$this->db->from("produit");
		$this->db->order_by("prix");
		$Query = $this->db->get();
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $produits)
			{
				$data[] = $produits;
			}
			
			return $data;
		}
	}
	
	/**
	 * Permet de recuperer les tagsCouleur
	 * @return tableau $data['tagsCouleurs'] contenant les données
	 */
	public function getTags_Couleurs()
	{
		$this->db->from("couleur");
		$this->db->order_by('couleur', 'RANDOM');
		$this->db->limit(12);
		$Query = $this->db->get();
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $tagsCouleurs)
			{
				$data[] = $tagsCouleurs;
			}
	
			return $data;
		}
	}
	
	/**
	 * Permet de recuperer les tagsMateriaux
	 * @return tableau $data['tagsMateriaux'] contenant les données
	 */
	public function getTags_Materiaux()
	{
		$this->db->from("materiaux");
		$this->db->order_by('nom_materiaux', 'RANDOM');
		$this->db->limit(5);
		$Query = $this->db->get();
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $tagsMateriaux)
			{
				$data[] = $tagsMateriaux;
			}
	
			return $data;
		}
	}
}
