<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class galerie_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
	public function getAll_galeries()
	{
		$Query = $this->db->get("galerie");
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $galeries)
			{
				$data[] = $galeries;
			}
			
			return $data;
		}
	}
	
}
