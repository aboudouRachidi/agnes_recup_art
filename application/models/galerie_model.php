<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class galerie_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    
    public function total_galerie(){
    	return $this->db->count_all("galerie");
    }
    
	public function getAll_galeries($limit,$start)
	{
		$this->db->limit($limit,$start);
		
		$Query = $this->db->get("galerie");
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $galeries)
			{
				$data[] = $galeries;
			}
			
			return $data;
		}
	}
	
	public function getAll_SliderGalerie()
	{
		$Query = $this->db->get("galerie");
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $SliderGaleries)
			{
				$data[] = $SliderGaleries;
			}
				
			return $data;
		}
	}
	
	
}
