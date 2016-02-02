<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class agenda_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    
    public function total_agenda() {
    	
    	return $this->db->get('agenda')->num_rows();
    }
    
	public function getAll_agenda($limit,$start)
	{
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
