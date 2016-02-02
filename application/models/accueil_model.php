<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
	public function getMentionLegale()
	{
		$this->db->where('titre = "mention"');
		$Query = $this->db->get("mention");
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $mentionsLegales)
			{
				$data[] = $mentionsLegales;
			}
				
			return $data;
		}
	}
	
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
	
	public function new_subscriber($data){
		$this->db->insert('abonne',$data);
	}
}
