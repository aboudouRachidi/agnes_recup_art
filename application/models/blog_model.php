<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blog_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
 
    /**
     * Permet de compter le nombre de données dans la table blog pour la pagination
     * @return nombre
     */
    public function total_blog() {
    	return $this->db->count_all("blog");
    }
    
    /**
     * Permet de recuperer les données de la table blog
     * @param $limit,$start
     * @return tableau $data['blog'] par page
     */
	public function getAll_blogs($limit,$start)
	{//SELECT * FROM `blog` LIMIT 0, 2
		
		$this->db->limit($limit,$start);
		$this->db->order_by('date','DESC');
		
		$Query = $this->db->get("blog");
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $blogs)
			{
				$data[] = $blogs;
			}
			
			return $data;
		}
		return false;
	}
	
	/**
	 * Permet de recuperer l'année des articles du blog pour mettre en place l'archivage
	 * @return tableau $data['blogAnnee']
	 */
	public function getAll_DateArchives()
	{

		$Query =  $this->db->query('SELECT extract(year FROM date) AS blogDate
				FROM `blog` WHERE extract(year FROM date) GROUP BY extract(year FROM date) 
				ORDER BY extract(year FROM date) DESC');
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $DateArchives)
			{
				$data[] = $DateArchives;
			}
				
			return $data;
		}
	}
	
	/**
	 * Permet de recuperer les données de la table blog par date
	 * @param $date à trouver dans la base de données
	 * @return tableau $data['blog'] par date
	 */
	public function getAll_Archives($date)
	{
		//$this->db->limit($limit,$start);
		$this->db->where('year(date) = '.$date);
		
		$Query = $this->db->get('blog');
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $archives)
			{
				$data[] = $archives;
			}
			
			return $data;
		}
	}
	
}
