<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class agenda_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    
    /**
     * Permet de compter le nombre de données dans la table agenda pour la pagination
     * @return nombre
     */
    public function total_agenda() {
    	
    	return $this->db->get('agenda')->num_rows();
    }
    
    /**
     * Permet de recuperer les données de la table agenda
     * @param $limit,$start
     * @return tableau $data['agenda'] par page
     */
	public function getAll_agenda($limit,$start)
	{//SELECT * FROM `blog` LIMIT 0, 2
		
		$this->db->limit($limit,$start);
		$this->db->order_by("date_debut","DESC");
		
		$this->db->from("agenda");

		$Query = $this->db->get();
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $agenda)
			{
				$data[] = $agenda;
			}
			
			return $data;
		}
	}
	
	/**
	 * Permet de recuperer l'année des événement de l'agenda pour mettre en place l'archivage
	 * @return tableau $data['agendaAnnee']
	 */
	public function getAll_DateArchives()
	{
	
		$Query =  $this->db->query('SELECT extract(year FROM date_debut) AS agendaDate
				FROM `agenda` WHERE extract(year FROM date_debut) GROUP BY extract(year FROM date_debut)
				ORDER BY extract(year FROM date_debut) DESC');
		
		if($Query->num_rows() > 0 ){
			
			foreach ($Query->result() as $DateArchives)
			{
				$data[] = $DateArchives;
			}
	
			return $data;
		}
	}
	
	/**
	 * Permet de recuperer les données de la table agenda par date
	 * @param $date à trouver dans la base de données
	 * @return tableau $data['agenda'] par date
	 */
	public function getAll_Archives($date)
	{

		$this->db->where('year(date_debut) = '.$date);
	
		$Query = $this->db->get('agenda');
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $archives)
			{
				$data[] = $archives;
			}
				
			return $data;
		}
	}
	
}
